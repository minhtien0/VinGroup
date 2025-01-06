<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Page</title>
    <link rel="stylesheet" href="{{asset('css/blog.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>

<body>
    <!-- Header -->
    <header>
        <div class="blog-header-container">
            <div class="logo">
                <h1>VinGROUP</h1>
            </div>
            <div class="search-bar">
                <input type="text" placeholder="Tìm kiếm...">
                <button><i class="fas fa-search"></i></button>
            </div>
        </div>
        <nav class="blog-navigation">
            <ul>
                <li>MẸ & BÉ</li>
                <li>GIA DỤNG</li>
                <li>SÁCH HAY</li>
                <li>REVIEW SẢN PHẨM</li>
                <li>LÀM ĐẸP</li>
                <li>SỨC KHỎE</li>
                <li>CÔNG NGHỆ</li>
                <li>NHÀ CỬA</li>
                <li>XE ĐẠP & XE MÁY</li>
                <li>XU HƯỚNG</li>
            </ul>
        </nav>
    </header>

    <!-- Main Section -->
    <main>
        <section class="blog-section">
            <div class="blog-container">
                <div class="blogleft-column cart-item-luot">
                    <div class="blog-main ">
                        <div class="blog-category-main">
                            <span class="blogspan-size">REVIEW SẢN PHẨM</span>
                            <ul class="category-tabs">
                                <li>Tất cả</li>
                                <li>Review Công Nghệ</li>
                                <li>Review Mỹ Phẩm</li>
                                <li>Xem thêm</li>
                            </ul>
                        </div>
                        <div class="featured-review">
                            <div class="blogleft-review">
                                <img src="https://novaedu.vn/uploads/news/2020_09/dacnhantam.png" alt="Review Book">
                                <div class="review-content">
                                    <h3>Review sách Lịch sử Việt Nam</h3>
                                    <p>Từ nguôn gốc đến thê kỷ XIX</p>
                                </div>
                            </div>
                            <div class="blogright-review">
                                <div class="featured-review">
                                    <div class="blog-khung">
                                        <div class="blog-hinh">
                                            <img src="https://cdn11.dienmaycholon.vn/filewebdmclnew/DMCL21/Picture//Apro/Apro_product_26631/lau-dien-sunhou_main_993_1020.png.webp"
                                                alt="Nồi lẩu điện đa năng">
                                        </div>
                                        <div class="blog-noidung">
                                            <h3 class="blog-tieude">
                                                <a href="#">Cách sử dụng nồi lẩu điện đa năng an toàn, hiệu quả, bền
                                                    đẹp</a>
                                            </h3>
                                            <p class="blog-ngaythang">31 Tháng Mười, 2024</p>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="pagination">
                            <button>&laquo;</button>
                            <button>&raquo;</button>
                        </div>
                    </div>
                    <!-- ///////////////////////////////////// -->
                    <div class="blog-tech-section">
                        <div class="blog-main">
                            <div class="blog-category-main">
                                <span class="blogspan-size">CÔNG NGHỆ</span>
                                <ul class="tech-tabs">
                                    <li>Tất cả</li>
                                    <li>Máy Tính Để Bàn</li>
                                    <li>Laptop</li>
                                    <li>Điện Thoại</li>
                                    <li>Tablet</li>
                                    <li>Xem thêm</li>
                                </ul>
                            </div>
                            <div class="tech-reviews">
                                <div class="tech-card">
                                    <img src="https://encrypted-tbn0.gstatic.com/shopping?q=tbn:ANd9GcSflBg6qZAbFWYqdxLZ15yGHRJwGycHoWZ3r_cyQRe5Hl9sqo2AbvSLPqQP5-E0g1ybRT43ezn8uyjWaXnlACH6YJwB7PlP2UysPCk8Obeyz85r1HJVS6xFyw" alt="Intel Core">
                                    <div class="tech-content">
                                        <span class="badge">Công Nghệ</span>
                                        <h3>Core là gì? So sánh sự khác nhau giữa Core i3, i5, i7, i9</h3>
                                    </div>
                                </div>
                                <div class="tech-card">
                                    <img src="https://laptopkhanhtran.vn/pic/product/lenovo-th_637908068153774783_HasThumb.jpg" alt="Laptop Mini">
                                    <div class="tech-content">
                                        <span class="badge">Công Nghệ</span>
                                        <h3>Bỏ túi 5+ mẫu laptop mini nhỏ gọn, bàn đẹp và cấu hình mạnh</h3>
                                    </div>
                                </div>
                                <div class="tech-card">
                                    <img src="https://fixfactor.co.uk/wp-content/uploads/2021/03/alex-knight-j4uuKnN43_M-unsplash.jpg" alt="Laptop Black Screen">
                                    <div class="tech-content">
                                        <span class="badge">Công Nghệ</span>
                                        <h3>Máy tính bị màn hình đen: Nguyên nhân và cách khắc phục hiệu quả</h3>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="pagination">
                                <button>&laquo;</button>
                                <button>&raquo;</button>
                            </div>
                        </div>
                    </div>
                    <!-- ///////////////////////// -->
                </div>
              <div class="blogright-column">
                <div class="blog-main ">
                    <div class="blog-category-main">
                        <span class="blogspan-size ">Kết nối </span>
                    </div>
                    <div class="social-links">
                        <div class="social-item">
                            <i class="fab fa-facebook"></i>
                            <span>3,190,435 Fans</span>
                            <button>LIKE</button>
                        </div>
                        <div class="social-item">
                            <i class="fab fa-instagram"></i>
                            <span>153,000 Followers</span>
                            <button>FOLLOW</button>
                        </div>
                        <div class="social-item">
                            <i class="fab fa-twitter"></i>
                            <span>144,900 Followers</span>
                            <button>FOLLOW</button>
                        </div>
                        <div class="social-item">
                            <i class="fab fa-youtube"></i>
                            <span>387,000 Subscribers</span>
                            <button>SUBSCRIBE</button>
                        </div>
                    </div>
                    <h2>CHỦ ĐỀ XU HƯỚNG TÌM KIẾM HOT</h2>
                    <p>
                        Iphone, cellphones, tgdd, Nhà sách Fahasa, còn bao nhiêu ngày nữa đến tết 2025...
                    </p>
                    <p>Mặc quần áo cho trẻ sơ sinh theo nhiệt độ, nguyên tắc mặc quần áo cho trẻ sơ sinh...</p>

                </div>
                <div class="blog-main ">
                  <div class="blog-category-main">
                      <span class="blogspan-size ">Bài viết nỗi bật </span>
                  </div>

                  <div class="blog-khung" style="padding: 20px;">
                    <div class="blog-hinh">
                        <img src="https://cdn11.dienmaycholon.vn/filewebdmclnew/DMCL21/Picture//Apro/Apro_product_26631/lau-dien-sunhou_main_993_1020.png.webp"
                            alt="Nồi lẩu điện đa năng">
                    </div>
                    <div class="blog-noidung">
                        <h3 class="blog-tieude">
                            <a href="#">Cách sử dụng nồi lẩu điện đa năng an toàn, hiệu quả, bền
                                đẹp</a>
                        </h3>
                        <p class="blog-ngaythang">31 Tháng Mười, 2024</p>
                    </div>
                </div>
                <div class="blog-khung" style="padding: 20px;">
                  <div class="blog-hinh">
                      <img src="https://cdn11.dienmaycholon.vn/filewebdmclnew/DMCL21/Picture//Apro/Apro_product_26631/lau-dien-sunhou_main_993_1020.png.webp"
                          alt="Nồi lẩu điện đa năng">
                  </div>
                  <div class="blog-noidung">
                      <h3 class="blog-tieude">
                          <a href="#">Cách sử dụng nồi lẩu điện đa năng an toàn, hiệu quả, bền
                              đẹp</a>
                      </h3>
                      <p class="blog-ngaythang">31 Tháng Mười, 2024</p>
                  </div>
              </div>
              <div class="blog-khung" style="padding: 20px;">
                <div class="blog-hinh">
                    <img src="https://cdn11.dienmaycholon.vn/filewebdmclnew/DMCL21/Picture//Apro/Apro_product_26631/lau-dien-sunhou_main_993_1020.png.webp"
                        alt="Nồi lẩu điện đa năng">
                </div>
                <div class="blog-noidung">
                    <h3 class="blog-tieude">
                        <a href="#">Cách sử dụng nồi lẩu điện đa năng an toàn, hiệu quả, bền
                            đẹp</a>
                    </h3>
                    <p class="blog-ngaythang">31 Tháng Mười, 2024</p>
                </div>
            </div>
              </div>
              </div>
            </div>
        </section>
      <!-- //////////////////////////////// -->
      <section class="blog-three-column">
        <!-- Column 1 -->
        <div class="cot">
          <div class="blog-category-main">
            <span class="blogspan-size ">Thời trang </span>
          </div>
          <div class="main-article">
            <img src="https://tiki.vn/blog/wp-content/uploads/2023/01/bang-mau-phoi-do-1-768x576.jpg" alt="Fashion">
            <h3>Mệnh Hỏa mặc đồ màu gì hợp phong thủy, thu hút tài may mắn, tài lộc?</h3>
            <p>Huy Lê - 9 Tháng Mười Một, 2023</p>
          </div>
          <ul class="sub-articles">
            <li>
              <a href="#">Mệnh Kim hợp màu gì? Người mệnh Kim mặc đồ màu gì may mắn, tài lộc</a>
              <p>8 Tháng Mười Một, 2023</p>
            </li>
          </ul>
        </div>
      
        <!-- Column 2 -->
        <div class="cot">
          <div class="blog-category-main">
            <span class="blogspan-size ">Xe máy & Xe đạp </span>
        </div>
          <div class="main-article">
            <img src="https://tiki.vn/blog/wp-content/uploads/2023/12/cac-loai-xe-may-768x461.jpg" alt="Bikes">
            <h3>Các loại xe máy mới ra mắt năm 2023 được ưa chuộng nhất</h3>
            <p>25 Tháng Mười Hai, 2023</p>
          </div>
          <ul class="sub-articles">
            <li>
              <a href="#">Bảng giá xe máy - Khuyến mãi mới nhất năm 2023</a>
              <p>25 Tháng Mười Hai, 2023</p>
            </li>
          </ul>
        </div>
      
        <!-- Column 3 -->
        <div class="cot">
          <div class="blog-category-main">
            <span class="blogspan-size ">Thuốc </span>
        </div>
          <div class="main-article">
            <img src="https://tiki.vn/blog/wp-content/uploads/2024/10/put-out-la-gi-thumb-768x551.jpg" alt="Self Growth">
            <h3>Thuốc lá</h3>
            <p> 30 Tháng Mười, 2024</p>
          </div>
          <ul class="sub-articles">
            <li>
              <a href="#">Thuốc lá</a>
              <p>21 Tháng Chín, 2024</p>
            </li>
            
            
          </ul>
        </div>
      </section>
      

      <!-- //////////////////////////////// -->
    </main>

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="footer-content">
                <p>© 2024 VinGROUP Blog. All are friends.</p>
                <p>Hotline: 0356311164</p>
            </div>
        </div>
    </footer>
</body>

</html>