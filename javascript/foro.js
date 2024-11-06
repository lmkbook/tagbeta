
document.addEventListener('DOMContentLoaded', function() {
    const newTopic = JSON.parse(localStorage.getItem('newTopic'));
    if (newTopic) {
        const topicsContainer = document.querySelector('.discussion-topics');
        const newTopicElement = document.createElement('div');
        newTopicElement.classList.add('topic');
        newTopicElement.innerHTML = `
            <h3>${newTopic.title}</h3>
            <p class="description">Descripción: ${newTopic.description}</p>
            <div class="responses">
                <h4>Respuestas:</h4>
                <div class="response">
                    <p><strong>Usuario:</strong> ${newTopic.username}</p>
                    <p><strong>Respuesta:</strong> ${newTopic.response}</p>
                </div>
                <div class="add-response">
                    <textarea placeholder="Añadir una respuesta..."></textarea>
                    <button onclick="addResponse('${newTopic.title}')">Enviar</button>
                </div>
            </div>
        `;
        topicsContainer.appendChild(newTopicElement);
        localStorage.removeItem('newTopic');
    }
});

function addResponse(topicTitle) {
    const responseText = document.querySelector('.add-response textarea').value;
    if (responseText) {
        const responseElement = document.createElement('div');
        responseElement.classList.add('response');
        responseElement.innerHTML = `
            <p><strong>TuUsuario:</strong> ${responseText}</p>
        `;
        const topicElement = document.querySelector(`h3:contains(${topicTitle})`).parentNode;
        topicElement.querySelector('.responses').appendChild(responseElement);
        document.querySelector('.add-response textarea').value = '';
    }
}
