const closeBtn = document.querySelector('#back_btn_back');

const alertEmptyFields = document.querySelector('.alert_empty_fields');

closeBtn.addEventListener('click', () => {
  alertEmptyFields.classList.remove('alert--visible');
  alertEmptyFields.classList.add('alert--hidden');
});
