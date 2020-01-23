const backButton = document.querySelector('#cancel_btn');
const closeBtns = document.querySelectorAll('#back_btn_back');

const alertBack = document.querySelector('.alert_cancel');
const alertSucc = document.querySelector('.alert_success_modify');
const alertFailure = document.querySelector('.alert_failure');
const alertNoSections = document.querySelector('.alert_no_sections');
const alertLogToSave = document.querySelector('.alert_log_to_save');

backButton.addEventListener('click', () => {
  alertBack.classList.remove('alert--hidden');
  alertBack.classList.add('alert--visible');
});

closeBtns.forEach(closeBtn => {
  closeBtn.addEventListener('click', () => {
    if (alertBack) {
      alertBack.classList.remove('alert--visible');
      alertBack.classList.add('alert--hidden');
    }
    if (alertSucc) {
      alertSucc.classList.remove('alert--visible');
      alertSucc.classList.add('alert--hidden');
    }
    if (alertFailure) {
      alertFailure.classList.remove('alert--visible');
      alertFailure.classList.add('alert--hidden');
    }
    if (alertNoSections) {
      alertNoSections.classList.remove('alert--visible');
      alertNoSections.classList.add('alert--hidden');
    }
    if (alertLogToSave) {
      console.log('ok');
      alertLogToSave.classList.remove('alert--visible');
      alertLogToSave.classList.add('alert--hidden');
    }
  });
});
