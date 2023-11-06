import axios from 'axios';
import JSONFormatter from 'json-formatter-js';
import * as monaco from 'monaco-editor'

document.addEventListener('DOMContentLoaded', () => {
    const element = document.getElementById('editor');
    const editor = monaco.editor.create(element, {
        value: "<?php\n\n",
        language: 'php',
        theme: 'vs-dark',
        padding: {
            top: 24,
        },
        fontSize: 14,
        fontFamily: 'Fira Code',
        minimap: {
            enabled: false
        },
    });

    editor.addCommand(monaco.KeyMod.CtrlCmd | monaco.KeyCode.Enter, () => {
        const code = editor.getValue();

        if (window.fathom) {
            fathom.trackEvent('generated ast');
        }

        generate(code);
    })
})

async function generate(code) {
    const output = document.getElementById('output');
    const loader = document.getElementById('loader');
    const errorContainer = document.getElementById('error');
    const errorMessage = document.getElementById('error-message');

    errorContainer.style.display = "none";
    loader.style.display = 'flex';

    axios.post('/api/generate', { code })
        .then(response => response.data)
        .then(({ ast, error = undefined }) => {
            output.innerHTML = "";

            if (error !== undefined) {
                errorMessage.innerText = error;
                errorContainer.style.display = "block";
                loader.style.display = "none";
                return;
            }

            const formatter = new JSONFormatter(ast, 3, {
                hoverPreviewEnabled: false,
            })

            output.innerHTML = '';
            output.appendChild(formatter.render());

            loader.style.display = "none";
        });
}
