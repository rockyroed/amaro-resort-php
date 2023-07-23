const buttons = document.getElementsByClassName('page-btn');
const accountSetting = document.getElementById('accountSettingsContainer');
const bookingHistory = document.getElementById('bookingHistoryContainer');

console.log(accountSetting, bookingHistory);

for(let i = 0; i < buttons.length; i++) {
    buttons[i].addEventListener('click', () => {
        const index = i;
        for(let i = 0; i < buttons.length; i++) {
            if(i === index) {
                buttons[i].classList.add('selected');
            } else {
                buttons[i].classList.remove('selected');
            }
        }

        if(i === 0) {
            bookingHistory.classList.add('shown');
            bookingHistory.classList.remove('hidden');
            accountSetting.classList.add('hidden');
            accountSetting.classList.remove('shown');
        } else {
            accountSetting.classList.add('shown');
            accountSetting.classList.remove('hidden');
            bookingHistory.classList.add('hidden');
            bookingHistory.classList.remove('shown');
        }
    })
}