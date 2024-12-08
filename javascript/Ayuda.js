document.querySelectorAll('.video-item').forEach(item => {
    item.addEventListener('click', () => {
        const videoModal = document.getElementById('videoModal');
        const videoPlayer = document.getElementById('videoPlayer');

        // Asignar el video al modal
        videoPlayer.src = item.getAttribute('data-video');
        videoModal.style.display = 'flex';
        videoPlayer.play();
    });
});

// Cerrar el modal
document.getElementById('closeBtn').addEventListener('click', () => {
    const videoModal = document.getElementById('videoModal');
    const videoPlayer = document.getElementById('videoPlayer');

    videoModal.style.display = 'none';
    videoPlayer.pause();
    videoPlayer.src = ""; // Limpiar el video
});

// Búsqueda
document.getElementById('search-button').addEventListener('click', () => {
    const searchText = document.getElementById('search-bar').value.toLowerCase();
    document.querySelectorAll('.video-item').forEach(item => {
        const videoText = item.textContent.toLowerCase();
        item.style.display = videoText.includes(searchText) ? 'block' : 'none';
    });
});

