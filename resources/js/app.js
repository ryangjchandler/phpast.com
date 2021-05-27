import 'alpinejs'
import JSONFormatter from 'json-formatter-js'
import CodeMirror from 'codemirror'
import 'codemirror/mode/php/php';
import 'codemirror/lib/codemirror.css';

window.ASTExplorer = function () {
    return {
        init() {
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

                    'Cmd-Enter': async () => {
                        await this.generate()

                        this.format()
                    }
                })
            } else {
                editor.setOption('extraKeys', {
                    'Ctrl-Enter': async () => {
                        await this.generate()

                        this.format()
                    },
                })
            }
        },
        format() {
            this.$refs.json.textContent = ''

            if (this.error !== null) {
                this.$refs.json.classList.add('text-red-600', 'text-xs', 'font-medium', 'font-mono')
                this.$refs.json.textContent = this.error
            } else {
                const formatter = new JSONFormatter(this.ast, 2, {
                    hoverPreviewEnabled: true
                });

                this.$refs.json.appendChild(formatter.render())
            }
        }
    }
}
