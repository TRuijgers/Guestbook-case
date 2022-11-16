"use strict"

let deleteBtns = document.querySelectorAll('deleteMessage');
const messageDiv = document.getElementById('messages');
const emojiBox = document.getElementById('emojiBox');

window.addEventListener('load', () => {
    messageDiv.addEventListener('click', (event) => {
        if (event.target.tagName == 'BUTTON' && 
            event.target.classList.contains('deleteMessage')) {
            messageDiv.removeChild(event.target.closest('div'));
            deleteMessage(event.target.parentElement.lastChild.textContent);
        }
    });

    let iconCode;
    for (let i = 128512; i <= 128581; i++ ) {
        iconCode = `&#${i};`;
        createEmoji(emojiBox, iconCode);
    }
});

async function deleteMessage(message) {
    let formData = new FormData();
    formData.append('delete', message);
    
    await fetch(new Request('http://guestbook.local/guestbook/requestApi.php',
     {
        method: 'POST',
        credentials: 'same-origin',
        body: formData,
        
    })).then(response => console.log(response));
}

function createEmoji(parent, icon) {
    let span = document.createElement('span');
    span.innerHTML = icon;
    parent.appendChild(span);
}