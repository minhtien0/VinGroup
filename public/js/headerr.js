function toggleDropdown() {
    const dropdown = document.querySelector('.dropdown');
    dropdown.classList.toggle('active');
}

// Ẩn dropdown khi nhấn ngoài
document.addEventListener('click', function (event) {
    const dropdown = document.querySelector('.dropdown');
    const isClickInside = dropdown.contains(event.target);

    if (!isClickInside) {
        dropdown.classList.remove('active');
    }
});
