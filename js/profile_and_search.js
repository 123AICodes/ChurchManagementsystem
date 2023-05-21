let closeButton = document.querySelector('.close-btn');
let openButton = document.querySelector('.open-btn');
var mainContainer = document.querySelector('main');
var brandParagraph = document.querySelector('#brand-pgh');
var navbarLinkItem = document.querySelectorAll('.navbar-items a');
let contentContainer = document.querySelector('.content-container');

let humbergerMenu = document.querySelector('aside');
let humbergerOpenButton = document.querySelector('.open-menu-btn'),
  humbergerCloseButton = document.querySelector('.close-menu-btn');
let profileContainer = document.querySelector('.profile-avatar-container');

humbergerOpenButton.addEventListener('click', () => {
  humbergerMenu.classList.add('active');
  humbergerOpenButton.style.display = "none";
  humbergerCloseButton.style.display = 'inline-block';
  document.querySelector('.header').classList.add('active');
  document.querySelector('.header').classList.add('onopen');
  document.querySelector('.main-content').classList.add('onopen');
  document.querySelector('.main-content').classList.add('active');

});
humbergerCloseButton.addEventListener('click', () => {
  humbergerMenu.classList.remove('active');
  document.querySelector('.header').classList.remove('active');
  document.querySelector('.main-content').classList.remove('active');
  document.querySelector('.header').classList.remove('onopen');
  document.querySelector('.main-content').classList.remove('onopen');
  humbergerCloseButton.style.display = "none";
  humbergerOpenButton.style.display = 'inline-block';
});



// close
closeButton.addEventListener('click', () => {
  navbarLinkItem.forEach(item => {
    item.classList.add('shrink');
  });
  mainContainer.classList.add('adjust');
  brandParagraph.classList.add('hide');
  closeButton.style.display = 'none';
  openButton.style.display = 'inline-block';
  contentContainer.classList.remove('active');
})
// close
openButton.addEventListener('click', () => {
  navbarLinkItem.forEach(item => {
    item.classList.remove('shrink');
  });
  mainContainer.classList.remove('adjust');
  brandParagraph.classList.remove('hide');
  openButton.style.display = 'none';
  closeButton.style.display = 'inline-block';
  contentContainer.classList.add('active');
});





// alert and setting container
let notifyContentWrapper = document.querySelector('.notify'),
  messageContentWrapper = document.querySelector('.message-ct'),
  accountDropdown = document.querySelector('.dropdown');
let notifyToggleButton = document.querySelector('.notify-btn'),
  messageToggleButton = document.querySelector('.message-btn'),
  accountToggleButton = document.querySelector('.account-btn');

// search-form
let searchForm = document.querySelector('.form-control-box');
let searchButton = document.querySelector('.small-screen-search-toggle-btn');

searchButton.addEventListener('click', () => {
  searchForm.classList.toggle('active');
  notifyContentWrapper.classList.remove('active');
  messageContentWrapper.classList.remove('active');
  accountDropdown.classList.remove('active');
})

// notifications
notifyToggleButton.addEventListener('click', () => {
  notifyContentWrapper.classList.toggle('active');
  messageContentWrapper.classList.remove('active');
  accountDropdown.classList.remove('active');
  searchForm.classList.remove('active');
});

// messages
messageToggleButton.addEventListener('click', () => {
  messageContentWrapper.classList.toggle('active');
  notifyContentWrapper.classList.remove('active');
  accountDropdown.classList.remove('active');
  searchForm.classList.remove('active');
});

// accout
accountToggleButton.addEventListener('click', () => {
  accountDropdown.classList.toggle('active');
  notifyContentWrapper.classList.remove('active');
  messageContentWrapper.classList.remove('active');
  searchForm.classList.remove('active');
});
