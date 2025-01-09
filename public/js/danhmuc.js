document.addEventListener("DOMContentLoaded", function () {
    const categoryItems = document.querySelectorAll(".category-item");

    categoryItems.forEach((item) => {
        item.addEventListener("click", function () {
            const slug = this.getAttribute("data-slug");
            fetch(`/categories/${slug}`)
                .then((response) => response.json())
                .catch((error) => {
                    console.error("bị lỗi nè", error);
                });
        });
    });
});
