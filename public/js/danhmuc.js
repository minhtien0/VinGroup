document.addEventListener("DOMContentLoaded", function () {
    const categoryItems = document.querySelectorAll(".category-item");

    categoryItems.forEach((item) => {
        item.addEventListener("click", function () {
            const name = this.getAttribute("data-id");
            fetch(`/categories/${name}`)
                .then((response) => response.json())
                .catch((error) => {
                    console.error("bị lỗi nè", error);
                });
        });
    });
});
//lấy tên trong bảng danh mục con (child_categori)
