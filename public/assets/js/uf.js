
// Función que reciba la respuesta entregada desde el controller
// y se muestra la información de la UF en el HTML
function getUf() {
    fetch('/api/uf')
        .then(response => response.json())
        .then(data => {
            console.log('DATA: ', data);
            const ufDiv = document.getElementById('uf');
            const fechaSpan = document.getElementById('uf-fecha');
            if (data.success) {
                const valorCLP = new Intl.NumberFormat('es-CL', {
                    style: 'currency',
                    currency: 'CLP',
                    minimumFractionDigits: 2
                }).format(data.uf.valor);

                const fecha = new Date(data.uf.fecha);
                const fechaFormateada = fecha.toLocaleDateString('es-CL');

                ufDiv.innerText = `${valorCLP} CLP`;
                fechaSpan.innerText = `Actualizado al ${fechaFormateada}`;
            } else {
                ufDiv.innerText = 'No se pudo obtener la UF';
                fechaSpan.innerText = '';
            }
        })
        .catch(error => console.error('Error al obtener la UF:', error));
}

document.addEventListener('DOMContentLoaded', getUf);
