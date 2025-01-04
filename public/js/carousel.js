let currentIndex = 0;

function showSlide(index) {
    const slides = document.querySelectorAll('.carousel-item');
    if (index >= slides.length) {
        currentIndex = 0;
    } else if (index < 0) {
        currentIndex = slides.length - 1;
    } else {
        currentIndex = index;
    }
    const offset = -currentIndex * 100; // Dịch chuyển 100% mỗi lần, hiển thị hai ảnh trong item
    document.querySelector('.carousel-inner').style.transform = `translateX(${offset}%)`;
}

function nextSlide() {
    showSlide(currentIndex + 1);
}

function prevSlide() {
    showSlide(currentIndex - 1);
}

// Auto slide every 3 seconds
setInterval(() => {
    nextSlide();
}, 3000);
function scrollProductCarousel(direction) {
    const carousel = document.getElementById("productCarousel");
    const scrollAmount = 150*2; // Số pixel cuộn mỗi lần nhấn nút
    carousel.scrollBy({
        left: direction * scrollAmount,
        behavior: "smooth"
    });
}


/* popup trang chu */
function showPopup(popupId) {
    document.getElementById(popupId).style.display = 'block';
    const overlay = document.createElement('div');
    overlay.className = 'overlay';
    document.body.appendChild(overlay);
    overlay.addEventListener('click', () => {
        closePopup(popupId);
        document.body.removeChild(overlay);
    });
}

function closePopup(popupId) {
    document.getElementById(popupId).style.display = 'none';
    const overlay = document.querySelector('.overlay');
    if (overlay) {
        document.body.removeChild(overlay);
    }
}
function showPopup(popupId) {
    document.getElementById(popupId).style.display = 'block';
}

function closePopup(popupId) {
    document.getElementById(popupId).style.display = 'none';
}

function handleKeyPress(event) {
    if (event.key === "Enter") {
        sendMessageToGPT();
    }
}

//sổ danh sách danh mục ra
function toggleCategory(categoryId) {
    const category = document.getElementById(categoryId);
    const arrow = category.previousElementSibling.querySelector('.arrow');

    if (category.classList.contains('hidden')) {
        category.classList.remove('hidden');
        arrow.textContent = '▲'; // Thay đổi biểu tượng khi mở
    } else {
        category.classList.add('hidden');
        arrow.textContent = '▼'; // Thay đổi biểu tượng khi đóng
    }
}
function toggleCategory(categoryId) {
    const category = document.getElementById(categoryId);
    category.classList.toggle('hidden');
}
// Hiển thị popup khi trang được tải
window.onload = function () {
    const popup = document.getElementById('product-popup');
    popup.classList.remove('hidden');
};

// Hàm đóng popup
function closePopup() {
    const popup = document.getElementById('product-popup');
    popup.classList.add('hidden');
}
function showPopup(popupId) {
    const popup = document.getElementById(popupId);
    if (popup) {
      popup.classList.remove('hidden');
    }
  }
  
  // Đóng popup
  function closePopup(popupId) {
    const popup = document.getElementById(popupId);
    if (popup) {
      popup.classList.add('hidden');
    }
  }