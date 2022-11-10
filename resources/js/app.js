import 'alpinejs'
import JSONFormatter from 'json-formatter-js'
import CodeMirror from 'codemirror'
import 'codemirror/mode/php/php';
import 'codemirror/lib/codemirror.css';

window.ASTExplorer = function ({ route, source }) {
    return {
        route,
        source,
        ast: null,
        init() {
            const params = new URLSearchParams(window.location.search)

            if (params.has('c')) {
                this.source = atob(params.get('c'))
            }

            const editor = CodeMirror(this.$refs.editor, {
                value: this.source,
                mode: 'php',
                lineNumbers: true,
            })

            editor.on('change', () => {
                this.source = editor.getDoc().getValue()
            })

            if (navigator.userAgent.indexOf('Mac OS X') !== -1) {
                editor.setOption('extraKeys', {
                    'Cmd-S': () => {
                        this.save()
                        this.format()
                    },
                    'Cmd-Enter': async () => {
                        await this.generate()
                    }
                })
            } else {
                editor.setOption('extraKeys', {
                    'Ctrl-S': () => {
                        this.save()
                        this.format()
                    },
                    'Ctrl-Enter': async () => {
                        await this.generate()

                        this.format()
                    },
                })
            }
        },
        async generate() {
            return fetch(this.route, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="token"]').content,
                    'Content-Type': 'application/json',
                    'Accept': 'application/json'
                },
                body: JSON.stringify({
                    code: this.source,
                })
            })
                .then(response => response.json())
                .then(ast => {
                    this.ast = ast
                    this.format()
                })
        },
        save() {
            let params = new URLSearchParams(window.location.search)

            params.set('c', btoa(this.source))

            window.location.search = params.toString();
        },
        format() {
            this.$refs.json.textContent = ''

            const formatter = new JSONFormatter(this.ast, 2, {
                hoverPreviewEnabled: true
            });

            this.$refs.json.appendChild(formatter.render())
        }
    }
}
