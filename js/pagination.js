/* *********Table Pagination************** */
var tbody = document.querySelector('tbody');
var pageUI = document.querySelector('.pagination');
var itemShow = document.querySelector('#itemperpage');
var tr = document.querySelectorAll('tr');
var emptyBox = [];
var index = 1;
var itemPerPage = 11;

// item per page
for (let i = 0; i < tr.length; i++) {
  emptyBox.push(tr[i]);
};
itemShow.onchange = giveTrPerPage;

function giveTrPerPage() {
  itemPerPage = Number(this.value);
  displayPage(itemPerPage);
  // pagination button generator func
  pageGenerator(itemPerPage);
  // getElement function
  getElement(itemPerPage);
}
function displayPage(limit) {
  tbody.innerHTML = '';
  for (let i = 0; i < limit; i++) {
    tbody.appendChild(emptyBox[i]);
  };
  const pageNumber = pageUI.querySelectorAll('.list');
  pageNumber.forEach(number => number.remove())
}
displayPage(itemPerPage);

// generating pagination buttons
function pageGenerator(getItem) {
  const num_of_tr = emptyBox.length;
  if (num_of_tr <= getItem) {
    pageUI.style.display = 'none';
  }
  else {
    pageUI.style.display = 'flex';
    const num_of_page = Math.ceil(num_of_tr / getItem);
    for (let i = 1; i <= num_of_page; i++) {
      const li = document.createElement('li');
      li.className = 'list';
      const a = document.createElement('a');
      a.href = '#';
      a.innerHTML = i;
      a.setAttribute('data-page', i);
      li.appendChild(a);
      pageUI.insertBefore(li, pageUI.querySelector('.next'));
    };
  }
}
pageGenerator(itemPerPage);


// adding active class to current pagination
let pageLink = pageUI.querySelectorAll('a');
let lastPage = pageLink.length - 2;

function pageRunner(page, items, lastPage, active) {
  for (button of page) {
    button.onclick = e => {
      const page_num = e.target.getAttribute('data-page');
      const page_mover = e.target.getAttribute('id');
      if (page_num != null) {
        index = page_num;
      }
      else {
        if (page_mover == 'next') {
          index++;
          if (index >= lastPage) {
            index = lastPage;
          }
        }
        else {
          index--;
          if (index <= 1) {
            index = 1;
          }
        }
      }
      pageMaker(index, items, active);
    }
  }
}
var pageLi = pageUI.querySelectorAll('.list');
pageLi[0].classList.add('active');
pageRunner(pageLink, itemPerPage, lastPage, pageLi);

// get current active button on pagination change
function getElement(val) {
  let pagelink = pageUI.querySelectorAll('a');
  let lastpage = pagelink.length - 2;
  let pageli = pageUI.querySelectorAll('.list');
  pageli[0].classList.add('active');
  // adding active class to current pagination
  pageRunner(pagelink, val, lastpage, pageli);
}

// applying page on click
function pageMaker(index, item_per_page, activePage) {
  const start = item_per_page * index;
  const end = start + item_per_page;
  const current_page = emptyBox.slice((start - item_per_page), (end - item_per_page));
  tbody.innerHTML = '';
  for (let i = 0; i < current_page.length; i++) {
    let item = current_page[i];
    tbody.appendChild(item);
  }
  Array.from(activePage).forEach((e) => {
    e.classList.remove('active');
  });
  activePage[index - 1].classList.add('active');
}