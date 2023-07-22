const buttons = document.getElementsByClassName('book-btn');

for(let i = 0; i < buttons.length; i++) {
    buttons[i].addEventListener('click', () => {
        const index = i;
        for(let i = 0; i < buttons.length; i++) {
            if(i === index) {
                buttons[i].classList.add('selected');
                var sectionName = document.getElementById('section-name');
                sectionName.innerHTML = `${buttons[i].innerHTML} RESERVATION`;
            } else {
                buttons[i].classList.remove('selected');
            }
        }
    })
}