let closeButton = document.querySelector('.close-btn');
let openButton = document.querySelector('.open-btn');
var mainContainer = document.querySelector('main');
var brandParagraph = document.querySelector('#brand-pgh');
const navbarLinkItem = document.querySelectorAll('.navbar-items a');
let cardContainer = document.querySelector('.content-box-wrapper');

// close
closeButton.addEventListener('click', () => {
  navbarLinkItem.forEach(item => {
    item.classList.add('shrink');
  });
  mainContainer.classList.add('adjust');
  cardContainer.classList.add('active');
  brandParagraph.classList.add('hide');
  closeButton.style.display = 'none';
  openButton.style.display = 'inline-block';
})

// open
openButton.addEventListener('click', () => {
  navbarLinkItem.forEach(item => {
    item.classList.remove('shrink');
  });
  mainContainer.classList.remove('adjust');
  brandParagraph.classList.remove('hide');
  cardContainer.classList.remove('active');
  openButton.style.display = 'none';
  closeButton.style.display = 'inline-block';
});
