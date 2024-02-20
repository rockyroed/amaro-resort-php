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



function calculateSwimTotal(){
  var adultInput = document.getElementById('adult').value;
  var childrenInput = document.getElementById('children').value;
  var seniorPWDInput = document.getElementById('seniorPWD').value;
  
  
  var adultPrice = document.getElementById('Adult.price').value;
  var childrenPrice = document.getElementById('Child.price').value;
  var seniorPWDPrice = document.getElementById('Senior.price').value;
  var cottagePrice = document.getElementById('cottagetype').value;
  var totalCost = document.getElementById('totalCost');
  var downPayment = document.getElementById('downPayment');
  var totalPax = document.getElementById('totalPax');

  var tcpost = document.getElementById('tcPost');
  var dpPost = document.getElementById('dpPost');
  
  adultTotal = adultInput * adultPrice;
  childrenTotal = childrenInput * childrenPrice;
  seniorTotal = seniorPWDInput * seniorPWDPrice;
  cottageTotal = parseInt(cottagePrice);
  
  totalPax = adultInput + childrenInput + seniorPWDInput;
  totalCost.textContent = "₱" + (cottageTotal + adultTotal + childrenTotal + seniorTotal).toFixed(2);
  downPaymentOriginal = ((cottageTotal + adultTotal + childrenTotal + seniorTotal) * 0.2);
  downPayment.textContent = "₱" + downPaymentOriginal.toFixed(2);

  tcpost.value = totalCost.textContent.replace("₱", "");
  dpPost.value = downPayment.textContent.replace("₱", "");
  totalPax.value = totalPax;
}

function validateAdultPax(){
  var adultInput = document.getElementById('adult').value;
  var childrenInput = document.getElementById('children').value;
  var seniorPWDInput = document.getElementById('seniorPWD').value;
  var maxPax = document.getElementById('room.maxPax').value;

  if(Number(adultInput) < 0) {
    document.getElementById('adult').value = 0;
  } else {
    var totalPax = Number(adultInput) + Number(childrenInput) + Number(seniorPWDInput);
    if(totalPax > maxPax) {
      document.getElementById('adult').value = adultInput - 1;
    }
  }
}

function validateChildrenPax(){
  var adultInput = document.getElementById('adult').value;
  var childrenInput = document.getElementById('children').value;
  var seniorPWDInput = document.getElementById('seniorPWD').value;
  var maxPax = document.getElementById('room.maxPax').value;

  if(Number(childrenInput) < 0) {
    document.getElementById('children').value = 0;
  } else {
    var totalPax = Number(adultInput) + Number(childrenInput) + Number(seniorPWDInput);
    if(totalPax > maxPax) {
      document.getElementById('children').value = childrenInput - 1;
    }
  }
}

function validateSeniorPWDPax(){
  var adultInput = document.getElementById('adult').value;
  var childrenInput = document.getElementById('children').value;
  var seniorPWDInput = document.getElementById('seniorPWD').value;
  var maxPax = document.getElementById('room.maxPax').value;

  if(Number(seniorPWDInput) < 0) {
    document.getElementById('seniorPWD').value = 0;
  } else {
    var totalPax = Number(adultInput) + Number(childrenInput) + Number(seniorPWDInput);
    if(totalPax > maxPax) {
      document.getElementById('seniorPWD').value = seniorPWDInput - 1;
    }
  }
}

function eventPax(){
  var paxNumber = document.getElementById('paxNum').value;
  var maxPax = document.getElementById('event.maxPax').value;
  console.log(paxNumber, maxPax);

  if(Number(paxNumber) < 0) {
    document.getElementById('paxNum').value = 0;
  } else {
    if(Number(paxNumber) > Number(maxPax)) {
      document.getElementById('paxNum').value = Number(maxPax);
    }
  }
}

function computeDays(){
  var checkin = document.getElementById('checkin').value;
  var checkout = document.getElementById('checkout').value;
  var totalCost = document.getElementById('totalCost');
  var downPayment = document.getElementById('downPayment');
  
  var tcpost = document.getElementById('tcPost');
  var dpPost = document.getElementById('dpPost');
  
  if(checkin && checkout) {
    const checkInDate = new Date(checkin);
    const checkOutDate = new Date(checkout);
  
    const timeDiff = checkOutDate - checkInDate;
    console.log(timeDiff);

    if(timeDiff <= 0) {
      document.getElementById('checkout').value = '';
    } else {
      const daysGap = Math.floor(timeDiff / (1000 * 60 * 60 * 24));
      var roomPrice = document.getElementById('room.price').value;
    
      var FinalCost = roomPrice * daysGap;
    
      totalCost.textContent =  "₱" + FinalCost.toFixed(2);
      downPaymentOriginal = FinalCost * 0.2;
      downPayment.textContent = "₱" + downPaymentOriginal.toFixed(2);

      tcpost.value = totalCost.textContent.replace("₱", "");
      dpPost.value = downPayment.textContent.replace("₱", "");
    }
  
  }
}

function doubleEvent(){
  computeDays();
  validateAdultPax();
}

function greyOutPreviousDateSwimming(){
  const currentDate = new Date();
  const year = currentDate.getFullYear();
  const month = String(currentDate.getMonth() + 1).padStart(2, '0'); // Months are zero-based
  const day = String(currentDate.getDate()).padStart(2, '0');
  const currentDateString = `${year}-${month}-${day}`;
  const dateOfVisit = document.getElementById('dateofvisit');
  dateOfVisit.setAttribute('min', currentDateString);
  }

function greyOutPreviousDateRoom(){
  const currentDate = new Date();
  const year = currentDate.getFullYear();
  const month = String(currentDate.getMonth() + 1).padStart(2, '0'); // Months are zero-based
  const day = String(currentDate.getDate()).padStart(2, '0');
  const currentDateString = `${year}-${month}-${day}`;
  const checkInInput = document.getElementById('checkin');
  const checkOutInput = document.getElementById('checkout');
  checkInInput.setAttribute('min', currentDateString);
  checkOutInput.setAttribute('min', currentDateString);
  }

function greyOutPreviousDateEvent(){
  const currentDate = new Date();
  const year = currentDate.getFullYear();
  const month = String(currentDate.getMonth() + 1).padStart(2, '0'); // Months are zero-based
  const day = String(currentDate.getDate()).padStart(2, '0');
  const currentDateString = `${year}-${month}-${day}`;
  const eventDate = document.getElementById('eventDate');
  eventDate.setAttribute('min', currentDateString);
  }

  function calculateEventTotal(){
    var eventPrice = document.getElementById('event.price').value; // problem
    var totalCost = document.getElementById('totalCost');
    var downPayment = document.getElementById('downPayment');

    var tcpost = document.getElementById('tcPost');
    var dpPost = document.getElementById('dpPost');


    var FinalCost = eventPrice;
    
    totalCost.textContent = "₱" + FinalCost.toFixed(2);
    downPaymentOriginal = (FinalCost * 0.2);
    downPayment.textContent = "₱" + downPaymentOriginal.toFixed(2);

    tcpost.value = totalCost.textContent.replace("₱", "");
    dpPost.value = downPayment.textContent.replace("₱", "");
  }