function searchPosts() {
    const searchQuery = document.getElementById('search-bar').value.toLowerCase();
    const rows = document.querySelectorAll('.post-list tbody tr');

    rows.forEach(row => {
        const id = row.cells[0].textContent.toLowerCase();
        const user = row.cells[2].textContent.toLowerCase();
        const status = row.cells[3].textContent.toLowerCase();

        if (id.includes(searchQuery) || user.includes(searchQuery) || status.includes(searchQuery)) {
            row.style.display = '';
        } else {
            row.style.display = 'none';
        }
    });
}

function approvePost(postId) {
    alert(`Publicación con ID: ${postId} aprobada.`);
    // Aquí puedes realizar la acción para aprobar la publicación
}

function rejectPost(postId) {
    alert(`Publicación con ID: ${postId} rechazada.`);
    // Aquí puedes realizar la acción para rechazar la publicación
}

function editPost(postId) {
    alert(`Editar publicación con ID: ${postId}`);
    // Aquí puedes redirigir a una página de edición o abrir un modal para editar la publicación
}

function deletePost(postId) {
    if (confirm(`¿Estás seguro de que deseas eliminar la publicación con ID: ${postId}? Esta acción no se puede deshacer.`)) {
        alert(`Publicación eliminada con ID: ${postId}`);
        // Aquí puedes realizar la acción para eliminar la publicación del sistema
    }
}
