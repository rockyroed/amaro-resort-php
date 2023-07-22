// Function to toggle the profile menu
function toggleProfileMenu() {
  var profileMenu = document.getElementById('profile-menu');
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

// Global click event listener to close the profile menu when clicking outside
document.addEventListener('click', function (event) {
  var profileMenu = document.getElementById('profile-menu');
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
  var profileMenu = document.getElementById('profile-menu');
  mainMenu.style.display =
    mainMenu.style.display === 'block' ? 'none' : 'block';
  profileMenu.style.display = 'none';
}

document.getElementById('menu-bar').addEventListener('click', toggleMainMenu);
