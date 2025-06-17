document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('chat-form');
    const messageInput = document.getElementById('message');
    const responseDiv = document.getElementById('chat-response');

    form.addEventListener('submit', async function (e) {
        e.preventDefault();

        const message = messageInput.value;

        try {
            const res = await fetch('http://127.0.0.1:8001/api/chat', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({ message })
            });

            const data = await res.json();
            responseDiv.textContent = data.response;
        } catch (err) {
            console.error(err);
            responseDiv.textContent = 'Errore nel contattare il chatbot.';
        }
    });
});
