 // Initially hide guest details container
document.querySelector('.form-container').classList.add('hidden');

const buttons = document.getElementsByClassName('book-btn');

const resType = document.getElementById('restype');
const rightBook = document.getElementById('right-book');

for(let i = 0; i < buttons.length; i++) {
    buttons[i].addEventListener('click', () => {

    // Toggle visibility of guest details container
    document.querySelector('.right-container').classList.add('hidden');
    document.querySelector('.form-container').classList.remove('hidden');
    document.querySelector('.right-book').style.background = 'none';
    document.querySelector('.left-book').style.background = 'linear-gradient(rgba(0, 0, 0, 0.2), rgba(0, 0, 0, 0.60)) center/cover no-repeat, url("../css/page-images/1Swimming.png") center/cover no-repeat';
    document.querySelector('.left-book').style.color = 'white';


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