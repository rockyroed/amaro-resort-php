// Function to toggle the account menu
function toggleProfileMenu() {
    var profileMenu = document.getElementById('account-menu');
    var mainMenu = document.getElementById('navbar');
    profileMenu.style.display =
      profileMenu.style.display === 'block' ? 'none' : 'block';
    if (!(window.innerWidth > 700)) {
      mainMenu.style.display = 'none';
    }
  }
  
  // Add an event listener to the user button
  document
    .getElementById('user-button')
    .addEventListener('click', toggleProfileMenu);
  
  // Global click event listener to close the account menu when clicking outside
  document.addEventListener('click', function (event) {
    var profileMenu = document.getElementById('account-menu');
    var userIcon = document.getElementById('user');
    var mainMenu = document.getElementById('navbar');
    var mainMenuIcon = document.getElementById('main-menu');
    if (
      event.target !== profileMenu &&
      event.target !== userIcon &&
      event.target !== mainMenuIcon
    ) {
      profileMenu.style.display = 'none';
      if (!(window.innerWidth > 700)) {
        mainMenu.style.display = 'none';
      }
    }
  });
  
  document
    .getElementById('user-button')
    .addEventListener('click', toggleProfileMenu);
  
  // Main Menu
  function toggleMainMenu() {
    var mainMenu = document.getElementById('navbar');
    var profileMenu = document.getElementById('account-menu');
    mainMenu.style.display =
      mainMenu.style.display === 'block' ? 'none' : 'block';
    profileMenu.style.display = 'none';
  }
  
  document.getElementById('menu-bar').addEventListener('click', toggleMainMenu);

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