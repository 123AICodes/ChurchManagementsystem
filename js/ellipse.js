// ellipsis button
let actionBox = document.querySelector('.action-box'),
  actionBox1 = document.querySelector('.yth-bx'),
  actionBox2 = document.querySelector('.up-bx');
let ellipsisButton = document.querySelector('.ell-btn'),
  ellipsisButton1 = document.querySelector('.yth-btn'),
  ellipsisButton2 = document.querySelector('.up-btn');


ellipsisButton.addEventListener('click', () => {
  actionBox.classList.toggle('active');
})
ellipsisButton1.addEventListener('click', () => {
  actionBox1.classList.toggle('active');
});
ellipsisButton2.addEventListener('click', () => {
  actionBox2.classList.toggle('active');
});


