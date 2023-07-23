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



function calculateTotal(){
  var adultInput = document.getElementById('adult').value;
  var childrenInput = document.getElementById('children').value;
  var seniorPWDInput = document.getElementById('seniorPWD').value;
  
  
  var adultPrice = document.getElementById('Adult.price').value;
  var childrenPrice = document.getElementById('Child.price').value;
  var seniorPWDPrice = document.getElementById('PWD.price').value;
  var cottagePrice = document.getElementById('cottagetype').value;
  var totalCost = document.getElementById('totalCost');
  var downPayment = document.getElementById('downPayment');

  var tcpost = document.getElementById('tcPost');
  var dpPost = document.getElementById('dpPost');
  
  adultTotal = adultInput * adultPrice;
  childrenTotal = childrenInput * childrenPrice;
  seniorTotal = seniorPWDInput * seniorPWDPrice;
  cottageTotal = parseInt(cottagePrice);


  totalCost.textContent = "₱" + (cottageTotal + adultTotal + childrenTotal + seniorTotal);
  downPayment.textContent = "₱" + ((cottageTotal + adultTotal + childrenTotal + seniorTotal) * 0.2);

  tcpost.value = totalCost.textContent;
  dpPost.value = downPayment.textContent;
}

