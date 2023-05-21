let notifyButton = document.querySelector('.notify-btn');
let notifyContainer = document.querySelector('.notify-container');
let messageButton = document.querySelector('.message-btn');
let messageContainer = document.querySelector('.message-container');
let accountButton = document.querySelector('.account-btn');
let accountDropdown = document.querySelector('.dropdown');

let searchToggleButton = document.querySelector('.small-screen-search-toggle-btn');
let formContainer = document.querySelector('.form-control-box');

// notifications
notifyButton.addEventListener('click', () => {
  notifyContainer.classList.toggle('active');
  messageContainer.classList.remove('active');
  accountDropdown.classList.remove('active');
  formContainer.classList.remove('active');
})
// messages
messageButton.addEventListener('click', () => {
  messageContainer.classList.toggle('active');
  notifyContainer.classList.remove('active');
  accountDropdown.classList.remove('active');
  formContainer.classList.remove('active');
})
// account profile
accountButton.addEventListener('click', () => {
  accountDropdown.classList.toggle('active');
  notifyContainer.classList.remove('active');
  messageContainer.classList.remove('active');
  formContainer.classList.remove('active');
})
// search
searchToggleButton.addEventListener('click', () => {
  formContainer.classList.toggle('active');
  accountDropdown.classList.remove('active');
  notifyContainer.classList.remove('active');
  messageContainer.classList.remove('active');
})

