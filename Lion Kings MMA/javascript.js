const openFormBtn = document.getElementById('openFormBtn');
const formPopup = document.getElementById('formPopup');
const closeFormBtn = document.getElementById('closeFormBtn');

const openEditFormBtn = document.getElementById('openEditFormBtn');
const editFormPopup = document.getElementById('edit-formPopup');
const closeEditFormBtn = document.getElementById('closeEditFormBtn');

openFormBtn.addEventListener('click', () => {
  formPopup.style.display = 'block';
});

closeFormBtn.addEventListener('click', () => {
  formPopup.style.display = 'none';
});

openEditFormBtn.addEventListener('click', () => {
  editFormPopup.style.display = 'block';
});

closeEditFormBtn.addEventListener('click', () => {
  editFormPopup.style.display = 'none';
});

const addToCartBtn = document.getElementById('addToCartBtn');
addToCartBtn.addEventListener('click', () => {
  const selectedClass = document.querySelector('input[name="class"]:checked').value;
  const cart = JSON.parse(localStorage.getItem('cart')) || [];
  cart.push(selectedClass);
  localStorage.setItem('cart', JSON.stringify(cart));
  alert('Class added to cart!');
});

function showClass() {
  alert("Please navigate over to Children Class");
}

function showEdit() {
  alert("Please navigate over first empty block");
}