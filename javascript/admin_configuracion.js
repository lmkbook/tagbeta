document.getElementById('personalization-form').addEventListener('submit', function(event) {
    event.preventDefault();
    alert('Configuración de personalización guardada.');
    // Aquí puedes agregar la lógica para guardar los cambios en la configuración de personalización
});

document.getElementById('legal-form').addEventListener('submit', function(event) {
    event.preventDefault();
    alert('Políticas legales guardadas.');
    // Aquí puedes agregar la lógica para guardar los cambios en las políticas legales
});

document.getElementById('roles-form').addEventListener('submit', function(event) {
    event.preventDefault();
    alert('Configuración de roles guardada.');
    // Aquí puedes agregar la lógica para guardar los cambios en la gestión de roles
});

document.getElementById('security-form').addEventListener('submit', function(event) {
    event.preventDefault();
    alert('Configuración de seguridad guardada.');
    // Aquí puedes agregar la lógica para guardar los cambios en la configuración de seguridad
});
