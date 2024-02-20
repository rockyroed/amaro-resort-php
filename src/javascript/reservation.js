 // Initially hide guest details container
document.querySelector('.form-container').classList.add('hidden');

const buttons = document.getElementsByClassName('book-btn');

const resType = document.getElementById('restype');
const rightBook = document.getElementById('right-book');

for(let i = 0; i < buttons.length; i++) {
    buttons[i].addEventListener('click', () => {
        rightBook.classList.remove('background-visible');

    // Toggle visibility of guest details container
    document.querySelector('.right-container').classList.add('hidden');
    document.querySelector('.form-container').classList.remove('hidden');

        const index = i;
        for(let i = 0; i < buttons.length; i++) {
            if(i === index) {
                buttons[i].classList.add('selected');
                var outText = buttons[i].getAttribute('value');
                var sectionName = document.getElementById('section-name');
                sectionName.innerHTML = `${buttons[i].innerHTML} RESERVATION`;
                resType.value = outText;
                console.log(resType.value);
            } else {
                buttons[i].classList.remove('selected');
            }
        }
    })
}