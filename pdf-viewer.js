document.addEventListener('DOMContentLoaded', function () {
    const pdfViewers = document.querySelectorAll('.pdf-viewer');

    pdfViewers.forEach(viewer => {
        const url = viewer.getAttribute('data-url');
        const container = document.createElement('div');
        container.style.width = '100%';
        container.style.height = '600px';
        viewer.appendChild(container);

        const pdfjsLib = window['pdfjs-dist/build/pdf'];
        pdfjsLib.GlobalWorkerOptions.workerSrc = 'https://mozilla.github.io/pdf.js/build/pdf.worker.js';

        pdfjsLib.getDocument(url).promise.then(pdf => {
            pdf.getPage(1).then(page => {
                const viewport = page.getViewport({ scale: 1.5 });
                const canvas = document.createElement('canvas');
                const context = canvas.getContext('2d');
                canvas.width = viewport.width;
                canvas.height = viewport.height;
                container.appendChild(canvas);

                const renderContext = {
                    canvasContext: context,
                    viewport: viewport
                };
                page.render(renderContext);
            });
        });
    });
});
