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
document.querySelector('.admin-link').addEventListener('click', function (event) {
    const currentUserName = "{{ Auth::user()->name ?? '' }}";
    if (currentUserName !== 'Admin') {
        event.preventDefault(); // Ngăn chặn hành động mặc định
        alert('Bạn không có quyền truy cập trang Quản trị viên.');
    }
});
