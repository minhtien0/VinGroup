// General Popup Show Function
function showPopup(popupId) {
    const popup = document.getElementById(popupId);
    popup.style.display = 'flex';
}

// General Popup Close Function
function closePopup(popupId) {
    const popup = document.getElementById(popupId);
    popup.style.display = 'none';
}

// Close popup when clicking outside of it
window.onclick = function (event) {
    const loginPopup = document.getElementById('loginPopup');
    const registerPopup = document.getElementById('DKpopup-overlay');

    if (event.target === loginPopup) {
        loginPopup.style.display = 'none';
    }
    if (event.target === registerPopup) {
        registerPopup.style.display = 'none';
    }
};

// Toggle Password Visibility
document.querySelectorAll('.password-eye').forEach((eyeIcon) => {
    eyeIcon.addEventListener('click', function () {
        const passwordField = this.previousElementSibling;
        if (passwordField.type === 'password') {
            passwordField.type = 'text';
            this.classList.add('active');
        } else {
            passwordField.type = 'password';
            this.classList.remove('active');
        }
    });
});
