const sendMessage = document.querySelector('#send');

if (sendMessage) {
    sendMessage.addEventListener('click', function () {
        const xhr = new XMLHttpRequest();
        xhr.responseType = 'json';

        const body = {
            message: document.querySelector('#message').value
        };

        document.querySelector('#message').value = '';

        xhr.open('post', '/api/new-message.php');
        xhr.onload = function () {
            if (xhr.status === 400) {
                alert("Aucun enpoint trouvé !");
            }
            else if (xhr.status === 400) {
                alert("Un paramètre est manquant.");
            }
        }
        xhr.send(JSON.stringify(body));
    });
}

