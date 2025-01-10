<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VinGroup Mobile</title>
    <link rel="stylesheet" href="{{ asset('css/dp.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="shnone;84-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="header">
        <div class="header__info" style="background-color:#EFFFF4">
            <a class="header__info__link" href="" style="text-decoration: none; color: black;">
                <span>Học Laravel Cùng</span>
                <span class="highlighted-text">Lữ Cao Tiến</span>
                <span> - Chương Trình Giảng Dạy Hấp Dẫn</span>
                <a id="logoutBtn" href="javascript:void(0);" style="text-decoration: none; color: red; display: none;" onclick="logout()">
                    Đăng Xuất
                </a>
            </a>
        </div>

        <div class="header__infotwo">
            <div class="header__infotwo__top">
                <a style="text-decoration: none;" href="/" data-view-id="header_main_logo" class="tiki-logo"><img
                        src="https://salt.tikicdn.com/ts/upload/0e/07/78/ee828743c9afa9792cf20d75995e134e.png"
                        alt="tiki-logo" width="100" height="50"><br><span
                        style="font-weight: bold; color: #372fc5;">Tốt
                        &amp;
                        Nhanh</span></a>
            </div>
            <div class="header__infotwo__mid">
                <div class="infotwo__mid__top">
                    <div class="infotwo__mid__top__l">
                        <i class="fa-solid fa-magnifying-glass" style="color: gray;"></i>
                        <input type="text" placeholder="Hãy Nhập Tìm Kiếm">
                        <button class="btn__search">Tìm Kiếm</button>
                    </div>
                    <div class="infotwo__mid__top__r">
                        <div class="infotwo__mid__top__r__home">
                            <i class="fas fa-igloo"></i>
                            <span>Trang Chủ</span>
                        </div>
                        <div class="infotwo__mid__top__r__account">
                            <a id="linkDangNhap" onclick="openPopupDangNhap()"
                                style="text-decoration: none; color: gray;">
                                <i class="fa-regular fa-user"></i>
                                <span id="userInfo"></span>
                            </a>


                            <div class="popup-dangnhap" id="popupdangnhap">
                                <div class="popup-contentdangnhap" style="width: 400px; height: 500px;">
                                    <div class="">
                                        <div id="khung" class="text-center bg-light me-3">
                                            <form id="loginForm" action="{{ route('home.login') }}" method="POST"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <div style="display: flex; padding-top: 10px; padding-left: 10px;">
                                                    <p class=""
                                                        style="margin-left: 55px; margin-right: 40%; font-size: 20px; color: black; text-align: center;">
                                                        Đăng Nhập</p>
                                                    <a onclick="closePopupDangNhap()" href="#"
                                                        style="color: red;"><i
                                                            class="fa-solid fa-rectangle-xmark"></i></a>

                                                </div>

                                                <!-- Email/Phone -->
                                                <input type="text" name="login" placeholder="Hãy Nhập SDT/Email..."
                                                    style="margin-bottom: 20px; border: solid 1px rgb(240, 161, 161);"
                                                    id="login" required>
                                                @error('login')
                                                    <p style="color: red;">{{ $message }}</p>
                                                @enderror

                                                <!-- Password -->
                                                <input type="password" name="password" placeholder="Mật Khẩu..."
                                                    style="margin-bottom: 20px; border: solid 1px rgb(240, 161, 161);"
                                                    id="password" required>
                                                @error('password')
                                                    <p style="color: red;">{{ $message }}</p>
                                                @enderror

                                                <!-- Submit -->
                                                <div>
                                                    <button id="min" type="submit"
                                                        class="btn btn-warning text-white">ĐĂNG NHẬP</button>
                                                </div>
                                            </form>
                                            <div id="loginError" style="color: red"></div>

                                            <br>
                                            <div id="text" class="row">
                                                <div class="col p-0 float-start ms-5"><a
                                                        style="text-decoration: none; font-size: 15px;"
                                                        data-bs-toggle="modal" data-bs-target="#myModal"
                                                        href="">Quên mật khẩu?</a></div>
                                                <div class="col  p-0 float-end me-5"><a
                                                        style="text-decoration: none; font-size: 15px;"
                                                        href="">Đăng nhập SMS</a></div>
                                            </div>
                                            <hr>
                                            <button style="width: 120px;" type="button"
                                                class="btn btn-outline-info "><i
                                                    class="fab fa-facebook text-primary"></i><a
                                                    style="text-decoration: none;"
                                                    class="text-decoration-unline text-dark " href="">
                                                    Facebook</a> </button>
                                            <button style="width: 120px;" type="button"
                                                class="btn btn-outline-info "><i
                                                    class="fab fa-google text-danger"></i><a
                                                    style="text-decoration: none;"
                                                    class="text-decoration-unline text-dark " href="">
                                                    Google</a> </button><br><br>
                                            <span class="text-black-50">Bạn là thành viên mới ?</span><span><a
                                                    class="text-danger text-decoration-unline ms-2"
                                                    style="text-decoration: none;" href="">Đăng Ký</a></span>
                                        </div>




                                    </div>
                                </div>
                            </div>

                            <script>
                                function openPopupDangNhap() {
                                    document.getElementById("popupdangnhap").style.display = "flex";
                                }

                                // Hàm đóng popup
                                function closePopupDangNhap() {
                                    document.getElementById("popupdangnhap").style.display = "none";
                                }
                            </script>
                        </div>

                        <script>
                           
                            // Kiểm tra xem người dùng có lưu thông tin trong sessionStorage không
                            
                            const user = JSON.parse(sessionStorage.getItem('user'));
                            if (user && user.id) {
                              
                                // Nếu đã đăng nhập, hiển thị thông tin người dùng
                                document.getElementById('userInfo').innerHTML = `
                                    <a href="/account/thongtin" style="color:gray; text-decoration: none;" >  
                                        <span>${user.name}</span>
                                    </a>
                                `;
                                
                                  // Cập nhật liên kết đăng nhập
                                const linkDangNhap = document.getElementById('linkDangNhap');
                                linkDangNhap.removeAttribute('onclick');
                                document.getElementById('logoutBtn').style.display = 'inline-block';
                               
                            } else {
                                // Nếu chưa đăng nhập, hiển thị liên kết đăng nhập
                                document.getElementById('userInfo').innerHTML =
                                    '<a href="javascript:void(0);" onclick="openPopupDangNhap()" style="color:gray; text-decoration: none;">Tài Khoản</a>';
                                // Đảm bảo rằng liên kết này mở popup đăng nhập
                                const linkDangNhap = document.getElementById('linkDangNhap');
                                linkDangNhap.removeAttribute('href'); // Hủy href để khi chưa đăng nhập thì không có liên kết
                                linkDangNhap.setAttribute('onclick', 'openPopupDangNhap()');
                            }

                            function logout() {
                            // Xóa thông tin người dùng trong sessionStorage
                            sessionStorage.removeItem('user');

                            // Gửi yêu cầu đến server để xóa session
                            fetch("{{ route('logout') }}", {
                                method: "POST",
                                headers: {
                                    "X-CSRF-TOKEN": "{{ csrf_token() }}",
                                },
                            })
                                .then(response => response.json())
                                .then(data => {
                                    if (data.success) {
                                        // Chuyển hướng về trang chủ sau khi đăng xuất thành công
                                        window.location.href = "{{ url('/') }}";
                                    } else {
                                        alert(data.message || "Đăng xuất thất bại.");
                                    }
                                })
                                .catch(error => {
                                    console.error("Lỗi khi đăng xuất:", error);
                                    alert("Có lỗi xảy ra khi đăng xuất.");
                                });
                        }

                        </script>

                        <!-- Form đăng nhập -->
                        <script>
                            document.getElementById('loginForm').addEventListener('submit', function(e) {
                                e.preventDefault(); // Ngăn chặn form reload trang

                                // Lấy dữ liệu từ form
                                const formData = new FormData(this);

                                // Gửi AJAX request
                                fetch(this.action, {
                                        method: 'POST',
                                        headers: {
                                            'X-CSRF-TOKEN': '{{ csrf_token() }}' // CSRF token
                                        },
                                        body: formData
                                    })
                                    .then(response => response.json())
                                    .then(data => {
                                        if (data.success) {

                                            // Cập nhật tên người dùng trong header
                                            document.getElementById('userInfo').innerHTML = `<span>${data.user.name}</span>`;
                                            sessionStorage.setItem('user', JSON.stringify(data.user));
                                            // Đóng popup
                                            closePopupDangNhap();
                                            document.getElementById('logoutBtn').style.display = 'inline-block';

                                        } else {
                                            // Hiển thị lỗi nếu đăng nhập thất bại
                                            document.getElementById('loginError').innerText = data.message;
                                        }
                                    })
                                    .catch(error => console.error('Error:', error));
                            });
                        </script>

                        <div class="infotwo__mid__top__r__shop">
                            <button><i class="fas fa-shopping-bag"></i></button>
                        </div>
                    </div>

                </div>
                <div class="infotwo__mid__bot">
                    <div class="infotwo__mid__bot__l">
                        <a class="underline" href="">Điện Gia Dụng</a>
                        <a class="underline" href="">Xe Cộ</a>
                        <a class="underline" href="">Mẹ Và Bé</a>
                        <a class="underline" href="">Khỏe Đẹp</a>
                        <a class="underline" href="">Nhà Cửa</a>
                        <a class="underline" href="">Sách</a>
                        <a class="underline" href="">Thể Thao</a>
                    </div>
                    <div class="infotwo__mid__bot__r">
                        <i class="fa-solid fa-earth-asia"></i>
                        <span>Giao Đến: </span>
                        <a href="" style="color :black;"> P.Thạnh Xuân, Q.12, TPHCM</a>
                    </div>
                </div>
            </div>
        </div>
        <hr style="margin-top: 0px;margin-bottom: 5px;">
        <div class="header__camket">
            <a class="header__camket__href" href="" style="text-decoration: none;">
                <div class="header__camket__href__l">
                    <Strong style="color: #372fc5; font-weight: bold; font-size: 18px;">Cam Kết</Strong>
                </div>
                <div class="header__camket__href__r">
                    <div class="header__camket__href__r__list">
                        <i class="fa-solid fa-check-double" style="color: #372fc5;"></i>
                        <span style="color: black;">100% Hàng Thật</span>
                    </div>
                    <div class="header__camket__href__r__list">
                        <i class="fa-solid fa-check-double" style="color: #372fc5;"></i>
                        <span style="color: black;">100% Hàng Thật</span>
                    </div>
                    <div class="header__camket__href__r__list">
                        <i class="fa-solid fa-check-double" style="color: #372fc5;"></i>
                        <span style="color: black;">100% Hàng Thật</span>
                    </div>
                    <div class="header__camket__href__r__list">
                        <i class="fa-solid fa-check-double" style="color: #372fc5;"></i>
                        <span style="color: black;">100% Hàng Thật</span>
                    </div>
                    <div class="header__camket__href__r__list">
                        <i class="fa-solid fa-check-double" style="color: #372fc5;"></i>
                        <span style="color: black;">100% Hàng Thật</span>
                    </div>
                    <div class="header__camket__href__r__list">
                        <i class="fa-solid fa-check-double" style="color: #372fc5;"></i>
                        <span style="color: black;">100% Hàng Thật</span>
                    </div>
                </div>
            </a>
        </div>
    </div>
    <div class="duongdan">
        <a href="" style="text-decoration: none;"><span>Trang Chủ</span></a>
        <span> > </span>
        <a href="" style="text-decoration: none;"><span>Bao Cao Su</span></a>
    </div>
    <div class="body-chitiet">
        @yield('content')
    </div>
</body>
<script>
    document.getElementById('loginForm').addEventListener('submit', function(e) {
        e.preventDefault(); // Ngăn chặn form reload trang

        // Lấy dữ liệu từ form
        const formData = new FormData(this);

        // Gửi AJAX request
        fetch(this.action, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}' // CSRF token
                },
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {

                    // Cập nhật tên người dùng trong header
                    document.getElementById('userInfo').innerHTML = `<span>${data.user.name}</span>`;
                    sessionStorage.setItem('user', JSON.stringify(data.user));
                    // Đóng popup
                    closePopupDangNhap();
                    const linkDangNhap = document.getElementById('linkDangNhap');
                    linkDangNhap.href = "{{ route('account.thongtin') }}"; // Thay đổi đường dẫn
                    linkDangNhap.removeAttribute('onclick');
                    document.getElementById('logoutBtn').style.display = 'inline-block';

                } else {
                    // Hiển thị lỗi nếu đăng nhập thất bại
                    document.getElementById('loginError').innerText = data.message;
                }
            })
            .catch(error => console.error('Error:', error));
    });
</script>
