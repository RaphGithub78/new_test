let mediaRecorder;
let audioChunks = [];

const startRecordingButton = document.getElementById('startRecording');
const stopRecordingButton = document.getElementById('stopRecording');
const audioPlayBack = document.getElementById('audioPlayBack');
const sendAudioButton = document.getElementById('sendAudio');
const audioInput = document.getElementById('audio');
const recordingStatus = document.getElementById('recordingStatus');
const sendingStatus = document.getElementById('sendingStatus');

// Ajout du conteneur pour les messages de succès/erreur
const messageContainer = document.createElement('div');
messageContainer.id = 'messageContainer';
document.body.appendChild(messageContainer);

startRecordingButton.addEventListener('click', async () => {
    recordingStatus.style.display = 'block';
    const stream = await navigator.mediaDevices.getUserMedia({ audio: true });
    mediaRecorder = new MediaRecorder(stream);

    mediaRecorder.start();
    startRecordingButton.disabled = true;
    stopRecordingButton.disabled = false;

    mediaRecorder.addEventListener('dataavailable', event => {
        audioChunks.push(event.data);
    });

    mediaRecorder.addEventListener('stop', () => {
        recordingStatus.style.display = 'none';
        const audioBlob = new Blob(audioChunks);
        const audioUrl = URL.createObjectURL(audioBlob);
        const audio = new Audio(audioUrl);
        audio.controls = true;
        audioPlayBack.appendChild(audio);

        const reader = new FileReader();
        reader.readAsDataURL(audioBlob);
        reader.onloadend = () => {
            const base64String = reader.result;
            audioInput.value = base64String;
            sendAudioButton.disabled = false;
        };
    });
});

stopRecordingButton.addEventListener('click', () => {
    mediaRecorder.stop();
    startRecordingButton.disabled = false;
    stopRecordingButton.disabled = true;
});

sendAudioButton.addEventListener('click', (event) => {
    event.preventDefault();
    sendingStatus.style.display = 'block';

    const formData = new FormData();
    formData.append('audio', audioInput.value);

    const requeteAjax = new XMLHttpRequest();
    requeteAjax.open('POST', 'voice_message_handler.php');
    requeteAjax.onload = function () {
        sendingStatus.style.display = 'none';
        const response = JSON.parse(this.responseText);
        displayMessage(response.message, response.status);
    };
    requeteAjax.onerror = function () {
        sendingStatus.style.display = 'none';
        displayMessage('Une erreur s\'est produite lors de l\'envoi du message vocal.', 'error');
    };
    requeteAjax.send(formData);
});

function displayMessage(message, status) {
    const messageElement = document.createElement('div');
    messageElement.className = `message ${status}`;
    messageElement.textContent = message;
    messageContainer.appendChild(messageElement);

    setTimeout(() => {
        messageElement.remove();
    }, 5000);
}
