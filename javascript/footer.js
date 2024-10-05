// footer.js
window.onload = function() {
    fetch('footer.html')
    .then(response => response.text())
    .then(data => {
        document.body.insertAdjacentHTML('beforeend', data);
    })
    .catch(error => console.log('Error al cargar el footer:', error));
}
