<div class="body__account__right__task" style="display: flex; background-color: white;">
                    <div class="body__account__right__task__btn"
                        style="width: 20%; height: 45px;text-align: center; padding: 10px;">
                        <a href="" style="text-decoration: none; " onclick="showContent('all', event)">Tất cả</a>
                    </div>
                    <div class="body__account__right__task__btn"
                        style="width: 20%; height: 45px;text-align: center; padding: 10px;">
                        <a href="" style="text-decoration: none; " onclick="showContent('chothanhtoan', event)">Chờ
                            Thanh Toán</a>
                    </div>
                    <div class="body__account__right__task__btn"
                        style="width: 20%; height: 45px;text-align: center; padding: 10px;">
                        <a href="" style="text-decoration: none; " onclick="showContent('shipping', event)">Đang
                            Vận Chuyển</a>
                    </div>
                    <div class="body__account__right__task__btn"
                        style="width: 20%; height: 45px;text-align: center; padding: 10px;">
                        <a href="" style="text-decoration: none; " onclick="showContent('danggiaohang', event)">Đang
                            Giao Hàng</a>
                    </div>
                    <div class="body__account__right__task__btn"
                        style="width: 20%; height: 45px;text-align: center; padding: 10px;">
                        <a href="" style="text-decoration: none; " onclick="showContent('hoanthanh', event)">Hoàn
                            Thành</a>
                    </div>
                </div>
                <div class="body__account__right__search"
                    style="margin-top: 10px; background-color: rgb(207, 205, 205); width: 1160px; border-radius: 5px">
                    <div style="padding: 5px;">
                        <i style="margin-left: 10px;" class="fa-solid fa-magnifying-glass"></i>
                        <input type="text" placeholder="Tìm kiếm theo ID, Tên sản phẩm...">
                    </div>
                </div>

                <script>
                    // Hàm để hiển thị nội dung theo từng tab
                    function showContent(tab, event) {
                        event.preventDefault();
                        const contentDiv = document.getElementById('body__account__right__product');
                        let contentHtml = ''; // Nội dung sẽ thay đổi dựa trên tab

                        switch (tab) {
                            case 'all':
                                contentHtml = `
                                  <div class="body__account__right__product__top" style="display: flex;">
                        <div class="body__account__right__product__top__img">
                            <a href=""><img src="bcs.jpg" alt="" width="80px" height="80px"
                                    style="border: solid 1px gray;"></a>
                        </div>
                        <div class="body__account__right__product__detail" style="margin-left: 15px;width: 780px;">
                            <div>
                                <span>Máy Sấy Tóc 2 Chiều Ion</span>
                            </div>
                            <div>
                                <span style="color: gray;">Phân Loại: </span>
                                <span>Đen</span>
                            </div>
                            <div>
                                <span style="color: gray;">Số Lượng: </span>
                                <span>1</span>
                            </div>
                            <div>
                                <span style="color: gray; font-size: 12px;">25-05-2024</span>
                            </div>
                            <div style="color: rgb(99, 215, 81); border: solid 1px  rgb(99, 215, 81); width: 150px;">
                                <span style="font-size: 13px;">Trả hàng miễn phí 7 ngày</span>
                            </div>

                        </div>
                        <div class="body__account__right__product__top__price"
                            style="width: 280px; text-align: center;padding: 40px; ">
                            <span style="color: gray; text-decoration: line-through;"><sup>đ</sup>490.000</span>
                            <span style="color: #372fc5; margin-left: 10px;"><sup>đ</sup>360.000</span>
                        </div>
                    </div>
                    <hr>
                    <div class="body__account__right__product__bot">
                        <div class="body__account__right__product__bot__price" style="margin-left: 82%;">
                            <span>Thành Tiền: </span>
                            <span style="color: rgb(33, 9, 243); font-size: 25px;"><sup>đ</sup>360.000</span>
                        </div>
                        <div class="body__account__right__product__bot__btn" style="display: flex; margin-top: 20px;">
                            <div><span><a href=""
                                        style="color: blue; text-decoration: none; margin-right: 635px; font-size: 13px;">Đánh
                                        giá ngay nhận 200xu</a></span>
                                <p><a href=""
                                        style="color: gray;; text-decoration: none; margin-right: 635px; font-size: 13px;">Đánh
                                        giá ghi nhận ý kiến</a></p>
                            </div>
                            <div>
                                <button>Đánh giá</button>
                                <button style="margin-left: 15px;">Mua lại</button>
                            </div>
                        </div>
                    </div>
                                `;
                                break;
                            case 'chothanhtoan':
                                contentHtml = `
                                @foreach($donhang as $item)
                                    <div class="body__account__right__product__top" style="display: flex;">
                                        <!-- Hình ảnh sản phẩm -->
                                        <div class="body__account__right__product__top__img">
                                            <a href="#"><img src="{{ asset('img/' . $item->avt) }}" alt="{{ $item->name }}" width="80px" height="80px" style="border: solid 1px gray;"></a>
                                        </div>

                                        <!-- Thông tin chi tiết sản phẩm -->
                                        <div class="body__account__right__product__detail" style="margin-left: 15px; width: 780px;">
                                            <div>
                                                <span style="color: gray;">Tên Thiết Bị: </span>
                                                <span>{{ $item->name }}</span>
                                            </div>
                                            <div>
                                                <span style="color: gray;">Màu Sắc: </span>
                                                <span>{{ $item->color }}</span>
                                            </div>
                                             <div>
                                                <span style="color: gray;">Dung Lượng: </span>
                                                <span>{{ $item->gb }} GB</span>
                                            </div>
                                            <div>
                                                <span style="color: gray;">Số Lượng: </span>
                                                <span>{{ $item->soluong }}</span>
                                            </div>
                                            <div>
                                                <span style="color: gray; font-size: 12px;">{{ \Carbon\Carbon::parse($item->time)->format('d-m-Y') }}</span>
                                            </div>
                                            <div style="color: rgb(99, 215, 81); border: solid 1px  rgb(99, 215, 81); width: 150px;">
                                                <span style="font-size: 13px;">Trả hàng miễn phí 7 ngày</span>
                                            </div>
                                        </div>

                                        <!-- Giá của sản phẩm -->
                                        <div class="body__account__right__product__top__price" style="width: 280px; text-align: center; padding: 40px;">
                                            <span style="color: gray; text-decoration: line-through;"><sup>đ</sup>{{ number_format($item->price * 1.2, 0, ',', '.') }}</span>
                                            <span style="color: #372fc5; margin-left: 10px;"><sup>đ</sup>{{ number_format($item->price, 0, ',', '.') }}</span>
                                        </div>
                                    </div>

                                    <!-- Tổng tiền của đơn hàng -->
                                    <hr>
                                    <div class="body__account__right__product__bot">
                                        <div class="body__account__right__product__bot__price" style="margin-left: 82%;">
                                            <span>Thành Tiền: </span>
                                            <span style="color: rgb(33, 9, 243); font-size: 25px;"><sup>đ</sup>{{ number_format($item->total_price, 0, ',', '.') }}</span>
                                        </div>
                                        <div class="body__account__right__product__bot__btn" style="display: flex; margin-top: 20px;">
                                            <div>
                                                <span>
                                                    <a href="#" style="color: blue; text-decoration: none; margin-right: 635px; font-size: 13px;">Đánh giá ngay nhận 200xu</a>
                                                </span>
                                                <p>
                                                    <a href="#" style="color: gray; text-decoration: none; margin-right: 635px; font-size: 13px;">Đánh giá ghi nhận ý kiến</a>
                                                </p>
                                            </div>
                                            <div>
                                                <button>Đánh giá</button>
                                                <button style="margin-left: 15px;">Mua lại</button>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                `;
                                break;
                            case 'shipping':
                                contentHtml = `
                                 <div class="body__account__right__product__trangthai" style="display: flex;">
                        <div class="shop">
                            <button style="background-color: transparent; border: 1px solid rgb(236, 232, 232); color: blue;">Xem Thông Tin Shop</button>
                        </div>
                        <div class="trangthai" style="margin-left: 70%;">
                            <a href="" style="text-decoration: none;">Đang Vận Chuyển</a>
                        </div>
                    </div>
                    <hr>
                    <div class="body__account__right__product__top" style="display: flex;">
                        <div class="body__account__right__product__top__img">
                            <a href=""><img src="bcs.jpg" alt="" width="80px" height="80px"
                                    style="border: solid 1px gray;"></a>
                        </div>
                        <div class="body__account__right__product__detail" style="margin-left: 15px;width: 780px;">
                            <div>
                                <span>Máy Sấy Tóc 2 Chiều Ion</span>
                            </div>
                            <div>
                                <span style="color: gray;">Phân Loại: </span>
                                <span>Đen</span>
                            </div>
                            <div>
                                <span style="color: gray;">Số Lượng: </span>
                                <span>1</span>
                            </div>
                            <div>
                                <span style="color: gray; font-size: 12px;">25-05-2024</span>
                            </div>
                            <div style="color: rgb(99, 215, 81); border: solid 1px  rgb(99, 215, 81); width: 150px;">
                                <span style="font-size: 13px;">Trả hàng miễn phí 7 ngày</span>
                            </div>

                        </div>
                        <div class="body__account__right__product__top__price"
                            style="width: 280px; text-align: center;padding: 40px; ">
                            <span style="color: gray; text-decoration: line-through;"><sup>đ</sup>490.000</span>
                            <span style="color: #372fc5; margin-left: 10px;"><sup>đ</sup>360.000</span>
                        </div>
                    </div>
                    <hr>
                    <div class="body__account__right__product__bot">
                        <div class="body__account__right__product__bot__price" style="margin-left: 82%;">
                            <span>Thành Tiền: </span>
                            <span style="color: rgb(33, 9, 243); font-size: 25px;"><sup>đ</sup>360.000</span>
                        </div>
                        <div class="body__account__right__product__bot__btn" style="display: flex; margin-top: 20px;">
                            <div><span><a href=""
                                        style="color: blue; text-decoration: none; margin-right: 635px; font-size: 13px;">Đánh
                                        giá ngay nhận 200xu</a></span>
                                <p><a href=""
                                        style="color: gray;; text-decoration: none; margin-right: 635px; font-size: 13px;">Đánh
                                        giá ghi nhận ý kiến</a></p>
                            </div>
                            <div>
                                <button>Đánh giá</button>
                                <button style="margin-left: 15px;">Hủy Đơn Hàng</button>
                            </div>
                        </div>
                    </div>
                                `;
                                break;
                            case 'delivered':
                                contentHtml = '<h3>Đã Giao Hàng</h3><p>Danh sách đơn hàng đã giao hàng.</p>';
                                break;
                            case 'hoanthanh':
                                contentHtml = `
                                 @foreach($donhangcomplete as $item)
                                    <div class="body__account__right__product__top" style="display: flex;">

                                        <!-- Hình ảnh sản phẩm -->
                                        <div class="body__account__right__product__top__img">
                                            <a href="#"><img src="{{ asset('img/' . $item->avt) }}" alt="{{ $item->name }}" width="80px" height="80px" style="border: solid 1px gray;"></a>
                                        </div>
                                        <!-- Thông tin chi tiết sản phẩm -->
                                        <div class="body__account__right__product__detail" style="margin-left: 15px; width: 780px;">
                                            <div>
                                                <span style="color: gray;">Tên Thiết Bị: </span>
                                                <span>{{ $item->name }}</span>
                                            </div>
                                            <div>
                                                <span style="color: gray;">Màu Sắc: </span>
                                                <span>{{ $item->color }}</span>
                                            </div>
                                             <div>
                                                <span style="color: gray;">Dung Lượng: </span>
                                                <span>{{ $item->gb }} GB</span>
                                            </div>
                                            <div>
                                                <span style="color: gray;">Số Lượng: </span>
                                                <span>{{ $item->soluong }}</span>
                                            </div>
                                            <div>
                                                <span style="color: gray; font-size: 12px;">{{ \Carbon\Carbon::parse($item->time)->format('d-m-Y') }}</span>
                                            </div>
                                            <div style="color: rgb(99, 215, 81); border: solid 1px  rgb(99, 215, 81); width: 150px;">
                                                <span style="font-size: 13px;">Trả hàng miễn phí 7 ngày</span>
                                            </div>
                                        </div>

                                        <!-- Giá của sản phẩm -->
                                        <div class="body__account__right__product__top__price" style="width: 280px; text-align: center; padding: 40px;">
                                            <span style="color: gray; text-decoration: line-through;"><sup>đ</sup>{{ number_format($item->price * 1.2, 0, ',', '.') }}</span>
                                            <span style="color: #372fc5; margin-left: 10px;"><sup>đ</sup>{{ number_format($item->price, 0, ',', '.') }}</span>
                                        </div>
                                    </div>

                                    <!-- Tổng tiền của đơn hàng -->
                                    <hr>
                                    <div class="body__account__right__product__bot">
                                        <div class="body__account__right__product__bot__price" style="margin-left: 82%;">
                                            <span>Thành Tiền: </span>
                                            <span style="color: rgb(33, 9, 243); font-size: 25px;"><sup>đ</sup>{{ number_format($item->total_price, 0, ',', '.') }}</span>
                                        </div>
                                        <div class="body__account__right__product__bot__btn" style="display: flex; margin-top: 20px;">
                                            <div>
                                                <span>
                                                    <a href="#" style="color: blue; text-decoration: none; margin-right: 635px; font-size: 13px;">Đánh giá ngay nhận 200xu</a>
                                                </span>
                                                <p>
                                                    <a href="#" style="color: gray; text-decoration: none; margin-right: 635px; font-size: 13px;">Đánh giá ghi nhận ý kiến</a>
                                                </p>
                                            </div>
                                            <div>
                                            @if($item->trangthaidonhang == 'Chờ Đánh Giá')
                                                <button onclick="openPopupDanhGia()">Đánh giá</button>
                                            @else                                            
                                                <button type="button" style="background-color: gray; color: white; text-align: center; width: 140px; height: 35px; border: none; cursor: not-allowed;" disabled>
                                                    Đã Đánh Giá
                                                </button>
                                            @endif
                                                <button style="margin-left: 15px;">Mua lại</button>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                `;
                                break;
                            case 'voucher':
                                contentHtml = '<h3>Kho voucher</h3><p>Danh sách voucher đã hoàn thành.</p>';
                                break;
                            default:
                                contentHtml = '<p>Chọn một tab để xem nội dung đơn hàng.</p>';
                        }

                        // Thay đổi nội dung của `div#content`
                        contentDiv.innerHTML = contentHtml;
                    }
                </script>
                <form action="{{ route('rates.add') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="popup-danhgia" id="popupdanhgia">
                    <div class="popup-contentdanhgia" style="width: 440px;">
                        <div style="font-size: 20px; margin-bottom: 10px;"> Đánh Giá Sản Phẩm <i class="fa-regular fa-face-smile-wink" style="color:  rgb(17, 75, 200);"></i></div>
                        <div>
                        @foreach($donhangcomplete as $item)
                            <div class="productrate" style="display: flex;">
                                <!-- Hình ảnh sản phẩm -->
                                <input type="hidden" name="sanpham" value="{{ $item->id }}" required> 
                                <div class="productrate-img">
                                    <a href="#"><img src="{{ asset('img/' . $item->avt) }}" alt="{{ $item->name }}" width="80px" height="80px" style="border: solid 1px gray;"></a>
                                </div>

                                <!-- Thông tin chi tiết sản phẩm -->
                                <div class="productrate-detail" style="margin-left: 15px; width: 780px;">
                                    <div>
                                        <span style="color: gray;">Tên Thiết Bị: </span>
                                        <span>{{ $item->name }}</span>
                                    </div>
                                    <div>
                                        <span style="color: gray;">Màu Sắc: </span>
                                        <span>{{ $item->color }}</span>
                                    </div>
                                    <div>
                                        <span style="color: gray;">Dung Lượng: </span>
                                        <span>{{ $item->gb }} GB</span>
                                    </div>
                                    <div>
                                        <span style="color: gray;">Số Lượng: </span>
                                        <span>{{ $item->soluong }}</span>
                                    </div>
                                    <div>
                                        <span style="color: gray; font-size: 12px;">{{ \Carbon\Carbon::parse($item->time)->format('d-m-Y') }}</span>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            <div class="starrate" style="display: flex;">
                                <p>Chất Lượng Sản Phẩm: </p>
                                <div class="stars">
                                    <i class="fa-solid fa-star" data-value="1"></i>
                                    <i class="fa-solid fa-star" data-value="2"></i>
                                    <i class="fa-solid fa-star" data-value="3"></i>
                                    <i class="fa-solid fa-star" data-value="4"></i>
                                    <i class="fa-solid fa-star" data-value="5"></i>
                                </div>
                                <p class="rating-text" ></p>
                                <input type="hidden" name="rate" id="rate" value="" required>
                            </div>
                            <script>
                                document.addEventListener("DOMContentLoaded", function() {
                                    const stars = document.querySelectorAll(".stars i");
                                    const ratingText = document.querySelector(".rating-text");
                                    const rateInput = document.getElementById("rate");
                                    const ratingMessages = ["Rất tệ", "Tệ", "Bình thường", "Tốt", "Rất tốt"];

                                    stars.forEach((star, index) => {
                                        star.addEventListener("click", () => {
                                            // Xóa trạng thái active cho tất cả các sao
                                            stars.forEach(s => s.classList.remove("active"));

                                            // Thêm trạng thái active cho các sao tương ứng
                                            for (let i = 0; i <= index; i++) {
                                                stars[i].classList.add("active");
                                            }

                                            // Hiển thị thông báo đánh giá
                                            ratingText.textContent = ratingMessages[index];
                                            rateInput.value = index + 1;
                                        });
                                    });
                                });
                            </script>
                            <div class="contentate ">
                                <label for="comment ">Nhận Xét:</label><br>
                                <textarea name="content" style="width: 400px; resize: none; margin-top: 10px;" rows="5" placeholder="Nhập nhận xét" required></textarea>
                                <div class="review-section">
                                    <div style="margin-top: 10px;">
                                        <span>
                                            <button id="add-image-btn" style="border: solid 1px rgb(17, 75, 200); color: rgb(17, 75, 200); margin-right: 5px;">
                                                <i class="fa-solid fa-camera"></i> Thêm Hình Ảnh
                                            </button>
                                        </span>
                                        <span>
                                            <button id="add-video-btn" style="border: solid 1px rgb(17, 75, 200); color: rgb(17, 75, 200);">
                                                <i class="fa-solid fa-video"></i> Thêm Video
                                            </button>
                                        </span>
                                    </div>
                                    <input type="file" id="file-input" accept="image/*" style="display: none;">
                                    <div class="media-container" style="display: flex; margin-top: 10px; gap: 10px;"></div>
                                </div>
                            </div>
                            <div style="float: inline-end; margin-top: 20px; ">
                                <button onclick="closePopupDanhGia() " style="background-color: transparent; color: black; text-align: center; width: 140px; height: 35px; ">
                                Trở Lại
                                 </button>
                                <button type="submit" style="background-color: rgb(17, 75, 200); color: rgb(255, 255, 255); text-align: center; width: 140px; height: 35px; border: none;">
                                        Đánh Giá
                                </button>
                                   
                            </div>
                        </div>
                    </div>
                </div>
                </form>
                <script>
        function openPopupDanhGia() {
            document.getElementById("popupdanhgia").style.display = "flex";
        }

        // Hàm đóng popup
        function closePopupDanhGia() {
            document.getElementById("popupdanhgia").style.display = "none";
        }
        document.addEventListener("DOMContentLoaded", function() {
            const maxImages = 4;
            const mediaContainer = document.querySelector(".media-container");
            const addImageBtn = document.getElementById("add-image-btn");
            const fileInput = document.getElementById("file-input");

            // Hàm tạo và thêm ảnh
            function createImageItem(file) {
                if (mediaContainer.children.length >= maxImages) {
                    alert("Bạn chỉ được thêm tối đa 4 hình ảnh.");
                    return;
                }

                const mediaItem = document.createElement("div");
                mediaItem.classList.add("media-item");

                const img = document.createElement("img");
                img.src = URL.createObjectURL(file); // Tạo URL từ tệp ảnh

                const deleteBtn = document.createElement("button");
                deleteBtn.classList.add("delete-btn");
                deleteBtn.innerHTML = "&times;";
                deleteBtn.addEventListener("click", () => {
                    mediaContainer.removeChild(mediaItem); // Xóa ảnh
                });

                mediaItem.appendChild(img);
                mediaItem.appendChild(deleteBtn);
                mediaContainer.appendChild(mediaItem);
            }

            // Khi nhấn nút "Thêm Hình Ảnh"
            addImageBtn.addEventListener("click", () => {
                fileInput.click(); // Mở hộp chọn file
            });

            // Xử lý khi chọn file
            fileInput.addEventListener("change", (event) => {
                const files = Array.from(event.target.files);
                files.forEach((file) => {
                    if (file.type.startsWith("image/")) {
                        createImageItem(file);
                    } else {
                        alert("Chỉ được chọn tệp hình ảnh.");
                    }
                });
                fileInput.value = ""; // Reset input để có thể chọn lại cùng file
            });
        });
    </script>



                <div class="body__account__right__product" id="body__account__right__product"
                    style="margin-top: 10px;padding: 15px; background-color: white; width: 1160px; border-radius: 5px">
                    <div class="body__account__right__product__top" style="display: flex;">
                        <div class="body__account__right__product__top__img">
                            <a href=""><img src="bcs.jpg" alt="" width="80px" height="80px"
                                    style="border: solid 1px gray;"></a>
                        </div>
                        <div class="body__account__right__product__detail" style="margin-left: 15px;width: 780px;">
                            <div>
                                <span>Máy Sấy Tóc 2 Chiều Ion</span>
                            </div>
                            <div>
                                <span style="color: gray;">Phân Loại: </span>
                                <span>Đen</span>
                            </div>
                            <div>
                                <span style="color: gray;">Số Lượng: </span>
                                <span>1</span>
                            </div>
                            <div>
                                <span style="color: gray; font-size: 12px;">25-05-2024</span>
                            </div>
                            <div style="color: rgb(99, 215, 81); border: solid 1px  rgb(99, 215, 81); width: 150px;">
                                <span style="font-size: 13px;">Trả hàng miễn phí 7 ngày</span>
                            </div>

                        </div>
                        <div class="body__account__right__product__top__price"
                            style="width: 280px; text-align: center;padding: 40px; ">
                            <span style="color: gray; text-decoration: line-through;"><sup>đ</sup>490.000</span>
                            <span style="color: #372fc5; margin-left: 10px;"><sup>đ</sup>360.000</span>
                        </div>
                    </div>
                    <hr>
                    <div class="body__account__right__product__bot">
                        <div class="body__account__right__product__bot__price" style="margin-left: 82%;">
                            <span>Thành Tiền: </span>
                            <span style="color: rgb(33, 9, 243); font-size: 25px;"><sup>đ</sup>360.000</span>
                        </div>
                        <div class="body__account__right__product__bot__btn" style="display: flex; margin-top: 20px;">
                            <div><span><a href=""
                                        style="color: blue; text-decoration: none; margin-right: 635px; font-size: 13px;">Đánh
                                        giá ngay nhận 200xu</a></span>
                                <p><a href=""
                                        style="color: gray;; text-decoration: none; margin-right: 635px; font-size: 13px;">Đánh
                                        giá ghi nhận ý kiến</a></p>
                            </div>
                            <div>
                                <button>Đánh giá</button>
                                <button style="margin-left: 15px;">Mua lại</button>
                            </div>
                        </div>
                    </div>
                </div>