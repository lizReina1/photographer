function convertToImage() {
    const container = document.getElementById('qrcode-container');

    if (!container) {
        console.error('No se encontró el contenedor qrcode-container');
        return;
    }

    html2canvas(container).then(canvas => {
        const dataURL = canvas.toDataURL('image/png');

        // Crear un elemento a para realizar la descarga
        const downloadLink = document.createElement('a');
        downloadLink.href = dataURL;

        // Especificar la ruta de descarga relativa a la carpeta "public/images"
        downloadLink.download = 'images/qrcode.png';

        document.body.appendChild(downloadLink);
        downloadLink.click();
        document.body.removeChild(downloadLink);
    }).catch(error => {
        console.error('Error al convertir a imagen:', error);
    });
}

document.getElementById('download-btn').addEventListener('click', convertToImage);
