const alert = document.querySelector('.alert');
document.querySelector('.btn-close-alert').addEventListener('click', () => {
    alert.classList.toggle('alert-fades')
})