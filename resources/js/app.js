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
        },
        format() {
            const formatter = new JSONFormatter(this.ast, 2, {
                hoverPreviewEnabled: true
            });

            this.$refs.json.appendChild(formatter.render())
        }
    }
}
