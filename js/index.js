const menuItems = document.querySelectorAll('.menu__item');
//remove active class
const removeActiveClass = () => {
  menuItems.forEach(item => {
    item.classList.remove('active');
  })
}
menuItems.forEach(item => {
  item.addEventListener('click', () => {
    // removeActiveClass();
    item.classList.add('active');
  });
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

// humberger menu
let humbergerMenu = document.querySelector('aside');
let humbergerOpenButton = document.querySelector('.open-menu-btn'),
  humbergerCloseButton = document.querySelector('.close-menu-btn');
let profileContainer = document.querySelector('.profile-avatar-container');

humbergerOpenButton.addEventListener('click', () => {
  humbergerMenu.classList.add('active');
  humbergerOpenButton.style.display = "none";
  humbergerCloseButton.style.display = 'inline-block';
  document.querySelector('.header').classList.add('active');
  document.querySelector('.el-first').classList.add('active');
  document.querySelector('.dashboard-container').classList.add('active');
  document.querySelector('.form-control-box').classList.add('width');
  document.querySelector('.content-box-wrapper').classList.add('active');
});
humbergerCloseButton.addEventListener('click', () => {
  humbergerMenu.classList.remove('active');
  humbergerCloseButton.style.display = "none";
  humbergerOpenButton.style.display = 'inline-block';
  document.querySelector('.header').classList.remove('active');
  document.querySelector('.el-first').classList.remove('active');
  document.querySelector('.form-control-box').classList.remove('width');
  document.querySelector('.dashboard-container').classList.remove('active');
});


// loadmore
let loadMoreButton = document.querySelector('.load-more-btn');
let currentItem = 2;

loadMoreButton.onclick = () => {
  let cards = [...document.querySelectorAll('.content-box-wrapper .card')];
  for (var i = currentItem; i < currentItem + 2; i++) {
    cards[i].style.display = 'inline-block';
  }
  currentItem += 2;
  if (currentItem >= cards.length) {
    loadMoreButton.style.display = 'none';
  }
}

