<div class="body__account__right__detailuser" style="display: flex;padding: 20px; background-color: white; width: 1160px; border-radius: 5px">
                        <div class="body__account__right__detailuser__left"
                            style="width: 60%; border-right: solid 1px  rgb(207, 205, 205);">
                            
                            <p>Thông Tin Cá Nhân</p>
                            <div style="display: flex;">
                                <div class="avt" style="width: 112px; height: 140px; margin-right: 20px;">
                                <label class="avt__view"
                                    style="height: 112px; width: 112px; border: solid 2px blue; border-radius: 50%; text-align: center;  cursor: pointer;">
                                    <input type="file" accept="image/*" class="file-input" onchange="previewImage(event)" style="display:none;" />
                                    <img style="width: 100%; height: 100%; border-radius: 50%; object-fit: cover;" 
                                        src="{{ asset('img/' . $user->avt) }}" 
                                        alt="avatar" class="default">
                                </label>
                                </div>
                                <script>
                                    function previewImage(event) {
                                        const file = event.target.files[0];
                                        const reader = new FileReader();

                                        reader.onload = function (e) {
                                            const img = document.querySelector('.avt__view img');
                                            img.src = e.target.result; // Thay đổi src của ảnh thành ảnh mới
                                        };

                                        if (file) {
                                            reader.readAsDataURL(file); // Đọc tệp để hiển thị
                                        }
                                    }

                                </script>
                                <div class="name">
                                    <div class="name__control" style="height: 35px; margin-bottom: 35px;">
                                        <div style="display: inline-block; width: 25%;">
                                            <span>Họ Tên</span>
                                        </div>
                                        <span><input type="text" style="" value="{{ $user->name }}"></span>
                                    </div>
                                    <div class="name__control" style="height: 35px; margin-bottom: 35px;">
                                        <div style="display: inline-block; width: 25%;">
                                            <span>Địa Chỉ </span>
                                        </div>
                                        <span><input type="text" style="" value="{{ $user->address }}"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="name__control" style="height: 35px; margin-bottom: 35px;">
                                <div style="display: inline-block; width: 15%;">
                                    <span>Ngày Sinh:</span>
                                </div>
                                <span>
                                    <select class="select-dropdown" name="day" id="day">
                                        <option value="" disabled selected>Ngày</option>
                                        <!-- Tạo danh sách ngày -->
                                        <script>
                                            for (let i = 1; i <= 31; i++) {
                                                document.write(`<option value="${i}">${i}</option>`);
                                            }
                                        </script>
                                    </select>

                                    <select class="select-dropdown" name="month" id="month">
                                        <option value="" disabled selected>Tháng</option>
                                        <!-- Tạo danh sách tháng -->
                                        <script>
                                            for (let i = 1; i <= 12; i++) {
                                                document.write(`<option value="${i}">Tháng ${i}</option>`);
                                            }
                                        </script>
                                    </select>

                                    <select class="select-dropdown" name="year" id="year">
                                        <option value="" disabled selected>Năm</option>
                                        <!-- Tạo danh sách năm -->
                                        <script>
                                            const currentYear = new Date().getFullYear();
                                            for (let i = currentYear; i >= currentYear - 100; i--) {
                                                document.write(`<option value="${i}">${i}</option>`);
                                            }
                                        </script>
                                    </select>
                                </span>
                            </div>

                            <div class="name__control" style="height: 35px; margin-bottom: 35px;">
                                <div style="display: inline-block; width: 15%;">
                                    <span>Giới Tính:</span>
                                </div>
                                <div style="display: inline-block;">
                                    <input type="radio" id="option1" name="options" checked>
                                    <label for="option1">Nam</label>

                                    <input type="radio" id="option2" name="options">
                                    <label for="option2">Nữ</label>

                                    <input type="radio" id="option3" name="options">
                                    <label for="option3">Khác</label>
                                </div>
                            </div>

                            <div class="name__control" style="height: 35px; margin-bottom: 35px;">
                                <div style="display: inline-block; width: 15%;">
                                    <span></span>
                                </div>
                                <div style="display: inline-block;">
                                    <button
                                        style="background-color: #1c80ea; border-radius: 5px; color: white; width: 175px; height: 40px;">
                                        Lưu Thay Đổi
                                    </button>
                                </div>
                            </div>

                        </div>
                        <div class="body__account__right__detailuser__right" style="margin-left: 20px; width: 40%;">
                            <div class="body__account__right__detailuser__right__sdt">
                                <p>Số điện thoại và Email</p>
                                <div style="display: flex; margin-bottom: 15px;">
                                    <div style="display: flex; width: 80%;">
                                        <i class="fa-solid fa-phone"
                                            style="margin-top: 15px; margin-right: 10px; color: gray;"></i>
                                        <div>
                                            <span>Số điện thoại</span>
                                            <p>{{ $user->sdt }}</p>
                                        </div>
                                    </div>
                                    <div style="padding-top: 10px ;">
                                        <button
                                            style="float: inline-end; background-color: transparent; border: solid 1px blue; border-radius: 5px; color: blue;">
                                            Cập Nhật
                                        </button>
                                    </div>
                                </div>
                                <div style="display: flex; margin-bottom: 15px;">
                                    <div style="display: flex; width: 80%;">
                                        <i class="fa-regular fa-envelope"
                                            style="margin-top: 15px; margin-right: 10px; color: gray;"></i>
                                        <div>
                                            <span>Email</span>
                                            <p>{{ $user->gmail }}</p>
                                        </div>
                                    </div>
                                    <div style="padding-top: 10px ;">
                                        <button
                                            style="float: inline-end; background-color: transparent; border: solid 1px blue; border-radius: 5px; color: blue;">
                                            Cập Nhật
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="body__account__right__detailuser__right__baomat">
                                <p>Thiết Lập Bảo Mật</p>
                                <div style="display: flex; margin-bottom: 15px;">
                                    <div style="display: flex; width: 80%;">
                                        <i class="fa-solid fa-lock"
                                            style="margin-top: 5px; margin-right: 10px; color: gray;"></i>
                                        <div>
                                            <span>Đổi Mật Khẩu</span>
                                        </div>
                                    </div>
                                    <div style="padding-top: 10px ;">
                                        <button
                                            style="float: inline-end; background-color: transparent; border: solid 1px blue; border-radius: 5px; color: blue;">
                                            Cập Nhật
                                        </button>
                                    </div>
                                </div>
                                <div style="display: flex; margin-bottom: 15px;">
                                    <div style="display: flex; width: 80%;">
                                        <i class="fa-solid fa-trash"
                                            style="margin-top: 5px; margin-right: 10px; color: gray;"></i>
                                        <div>
                                            <span>Xóa Tài Khoản</span>
                                        </div>
                                    </div>
                                    <div style="padding-top: 10px ;">
                                        <button
                                            style="float: inline-end; background-color: transparent; border: solid 1px blue; border-radius: 5px; color: blue;">
                                            Cập Nhật
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="body__account__right__detailuser__right__lienket">
                                <p>Liên Kết Mạng Xã Hội</p>
                                <div style="display: flex; margin-bottom: 15px;">
                                    <div style="display: flex; width: 80%;">
                                        <i class="fa-brands fa-facebook"
                                            style="margin-top: 5px; margin-right: 10px; color: gray; color: blue;"></i>
                                        <div>
                                            <span>Facebook</span>
                                        </div>
                                    </div>
                                    <div style="padding-top: 10px ;">
                                        <button
                                            style="float: inline-end; background-color: transparent; border: solid 1px blue; border-radius: 5px; color: blue;">
                                            Cập Nhật
                                        </button>
                                    </div>
                                </div>
                                <div style="display: flex; margin-bottom: 15px;">
                                    <div style="display: flex; width: 80%;">
                                        <i class="fa-brands fa-square-instagram"
                                            style="margin-top: 5px; margin-right: 10px; color: gray; color: rgb(200, 68, 6);"></i>
                                        <div>
                                            <span>Instagram</span>
                                        </div>
                                    </div>
                                    <div style="padding-top: 10px ;">
                                        <button
                                            style="float: inline-end; background-color: transparent; border: solid 1px blue; border-radius: 5px; color: blue;">
                                            Cập Nhật
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
 </div>
