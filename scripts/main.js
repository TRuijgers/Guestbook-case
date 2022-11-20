"use strict"

let deleteBtns = document.querySelectorAll('deleteMessage');
const emojiBox = document.getElementById('emojiBox');
const emojiBoxBtn = document.getElementById('emojiBoxBtn');
const message = document.getElementById('summernote');
const messageDiv = document.querySelector('#messages>div');


window.addEventListener('load', () => {
    emojiBox.style.display = 'none';
    messageDiv.addEventListener('click', (event) => {
        if (event.target.tagName == 'BUTTON' && 
            event.target.classList.contains('deleteMessage')) {
            messageDiv.removeChild(event.target.closest('div'));
            deleteMessage(event.target.parentElement.lastChild.textContent);
        }
    });

    emojiBoxBtn.addEventListener('click', () => {
        
        if (emojiBox.style.display == 'none') {
            emojiBox.style.display = 'flex';
        } else {
            emojiBox.style.display = 'none';
        }
    })

    let iconCode;
    for (let i = 128512; i <= 128581; i++ ) {
        iconCode = `&#${i};`;
        createEmoji(emojiBox, iconCode);
    }

    emojiBox.addEventListener('click', (e) => {
        console.log(message.value);
        if ( e.target.tagName == "SPAN") {
            console.log('test');
            message.value += e.target.textContent;
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

function createEmoji(parent, icon) {
    let span = document.createElement('span');
    span.className = "emoji";
    span.innerHTML = icon;
    parent.appendChild(span);
}

