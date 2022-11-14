"use strict"

let deleteBtns = document.querySelectorAll('deleteMessage');
const messageDiv = document.getElementById('messages');

window.addEventListener('load', () => {
    messageDiv.addEventListener('click', (event) => {
        if (event.target.tagName == 'BUTTON' && 
            event.target.classList.contains('deleteMessage')) {
            messageDiv.removeChild(event.target.closest('div'));
            deleteMessage(event.target.parentElement.lastChild.textContent);
        }
    })
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

