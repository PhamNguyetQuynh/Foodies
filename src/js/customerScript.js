document.addEventListener('DOMContentLoaded', function () {
    const userIcon = document.querySelector('#userIcon');
    const userHoverBox = document.querySelector('.accountHover');

    userIcon.addEventListener('click', function () {
        userHoverBox.classList.toggle('active');
    });
});
