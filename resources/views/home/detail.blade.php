@extends('layouts.home.app')
@section('content')
<div class="body__left">
            <div class="body__left__top">
                <nav class="body__nav">
                    <div class="body__nav__img" width="368" height="368">
                        <img id="main-image" src="{{ asset('img/' . $product->avt) }}" width="430" height="440" alt="Bao cao su Durex Fetherlite Ultima Hộp 12 Bao" >
                    </div>

                    <div class="body__nav__listimg">
                        @foreach ($img as $img_sp)
                        <img src="{{ asset('img/' . $img_sp->imgchitiet) }}" width="60" height="60" alt="Ảnh Chi Tiết" onclick="changeImage(this)">
                        @endforeach
                    </div>
                    <script>
                        function changeImage(thumbnail) {
                            // Lấy hình ảnh chính
                            const mainImage = document.getElementById("main-image");
                            
                            // Thay đổi src của hình ảnh chính thành src của thumbnail được click
                            mainImage.src = thumbnail.src;
                        }

                    </script>
                    <div class="body__nav__dacdiem">
                        <p style="margin-top: 10px;">Đặc Điểm Nổi Bật Của Sản Phẩm</p>
                        <div>
                            <i class="fa-solid fa-circle-check" style="color: blue;"></i>
                            <span style="font-size: 15px;"> Thiết kế siêu mỏng, cảm giác tự nhiên như không đeo.</span>
                        </div>
                        <div>
                            <i class="fa-solid fa-circle-check"></i>
                            <span style="font-size: 15px;"> Kích thước phù hợp với đa số người dùng.</span>
                        </div>
                        <div>
                            <i class="fa-solid fa-circle-check"></i>
                            <span style="font-size: 15px;"> Sản phẩm đạt tiêu chuẩn chất lượng quốc tế ISO
                                4074:2002.</span>
                        </div>
                        <hr>
                        <div>
                            <i class="fa-solid fa-face-smile-beam"></i>
                            <span style="font-size: 15px;"><a href="" style="text-decoration: none; color: black;">Xem
                                    Thêm Ưu
                                    Điểm</a></span>
                            <span style="float: inline-end;">
                                <a href=""><i class="fa-solid fa-angle-right" style="color: gray;"></i></a></span>

                        </div>
                    </div>
                </nav>
                <section class="body__section">
                    <div class="section__info">
                        <div class="section__info__thuonghieu">
                            <div class="section__info__thuonghieu__img" style="margin-bottom:10px;">
                                <img srcset="https://salt.tikicdn.com/ts/upload/94/36/e7/c5297f3fad0a83fb56f98be877904467.png"
                                    width="76" height="20" alt="is_hero" class="styles__StyledImg-sc-p9s3t3-0 hbqSye"
                                    style="width: 76px; height: 20px; opacity: 1;">
                                <img srcset="https://salt.tikicdn.com/ts/ta/b1/3f/4e/cc3d0a2dd751a7b06dd97d868d6afa56.png"
                                    width="114" height="20" alt="return_policy"
                                    class="styles__StyledImg-sc-p9s3t3-0 hbqSye"
                                    style="width: 114px; height: 20px; opacity: 1;">
                                <img srcset="https://salt.tikicdn.com/ts/upload/d7/56/04/b93b8c666e13f49971483596ef14800f.png"
                                    width="89" height="20" alt="is_authentic"
                                    class="styles__StyledImg-sc-p9s3t3-0 hbqSye"
                                    style="width: 89px; height: 20px; opacity: 1;">
                            </div>
                            <span>Thương hiệu: </span>
                            <span style="color: blue;">Durex</span>
                            <h4 style="margin-top:5px ;margin-bottom:10px;">{{$product->name}}</h4>
                        </div>
                        <div class="section__info__rate">
                            <span>4,7</span>
                            <span style="color: yellow;"><i class="fa-solid fa-star"></i><i
                                    class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i
                                    class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i></span>
                            <span>(367)</span>
                            <span>|</span>
                            <span>12k Lượt bán</span>
                        </div>
                        <div class="section__info__gia">
                            <span style="color: rgb(236, 82, 82);">
                                <h1 style="margin: 0px;">{{number_format($product->price)}}<sup >đ</sup></h1>
                            </span>
                            <span>-28%</span>
                            <span style="text-decoration:line-through;">304.000<sup >đ</sup></span>
                            <span><i class="fa-solid fa-circle-info"></i></span>
                            <div style="margin-top:10px;"> <img
                                    srcset="https://salt.tikicdn.com/ts/upload/1c/d0/ac/e89ef64c4a607d248e9e524b69aa1d0c.png"
                                    width="75" height="22" alt="price_badge"
                                    class="styles__StyledImg-sc-p9s3t3-0 hbqSye"
                                    style="width: 75px; height: 22px; opacity: 1;">
                            </div>
                            <div class="storage-options">
                                @foreach ($gigabyte as $gigabyte)
                                <div class="storage-option" onclick="filterColors(this,'{{ $gigabyte->gb }}')">
                                    <span class="storage-size">{{ $gigabyte->gb }}GB</span>
                                    <span class="storage-price">{{ number_format($gigabyte->min_price) }} ₫</span>
                                </div>
                                @endforeach
                            </div>
                            <strong class="mt-1">Hãy lựa chọn màu mà bạn thích</strong>
                            <div id="color-options">
                            @foreach ($options as $option)
                            <div class="option-colors" >   
                                    <div class="color-item" data-gb="{{ $option->gb }}"  style="display: none;">
                                        <div class="option-color" data-price="{{ $option->price }}" onclick="selectOption(this)">
                                            <span class="color-size">{{ $option->color }}</span>
                                            <span class="color-price">{{ number_format($option->price) }} ₫</span>
                                        </div>
                                    </div>
                            </div>
                            @endforeach
                            </div>
                          
                            <script>
                                function filterColors(element,gb) {
                                    const options = document.querySelectorAll('.storage-option');
                                    options.forEach(option => option.classList.remove('selected'));

                                    // Thêm class 'selected' vào tùy chọn được click
                                    element.classList.add('selected');
                                    // Lấy tất cả các tùy chọn màu
                                    const colorItems = document.querySelectorAll('.color-item');

                                    // Ẩn tất cả các tùy chọn màu
                                    colorItems.forEach(item => {
                                        item.style.display = 'none';
                                    });

                                    // Hiển thị các tùy chọn có dung lượng được chọn
                                    colorItems.forEach(item => {
                                        if (item.getAttribute('data-gb') === gb) {
                                            item.style.display = 'block';
                                        }
                                    });
                                }
                            </script>
                        </div>
                    </div>

                    <div class="section__infoship">
                        <div class="section__infoship__top">
                            <div><span style="font-weight: bold;">Thông Tin Vận Chuyển</span></div>
                            <div>
                                <p style="display: inline-block ;">Giao đến Q.1, P.Bến Nghé, Hồ Chí Minh</p>
                                <a href=""
                                    style="text-decoration: none; display: inline-block; color: blue; float: inline-end;">
                                    Đổi</a>
                            </div>

                        </div>
                        <hr>
                        <div class="section__infoship__mid">
                            <div class="section__infoship__mid__logo" style="width: 32px; display: inline-block;"><img
                                    src="https://salt.tikicdn.com/ts/upload/04/da/1e/eac32401f048ffd380e50dfeda2a1c55.png"
                                    alt="" height="16" width="32"></div>
                            <div style="display: inline-block;">
                                Giao hàng siêu tốc 2h
                            </div>
                            <div class="">
                                <span>Trước 10h hôm nay: </span>
                                <span>10.000₫ </span>
                                <span style="text-decoration: line-through;color: gray;margin-left: 10px;">25.000
                                    <sup>đ</sup></span>
                            </div>
                        </div>
                        <hr>
                        <div class="section__infoship__bot">
                            <div class="" style="width: 32px;display: inline-block;"><img
                                    src="https://salt.tikicdn.com/ts/upload/6b/59/d9/783a8f53f8c251dbe5f644df40c21c15.png"
                                    alt="" height="16" width="32"></div>
                            <div style="display: inline-block;">
                                Giao hàng siêu tốc 2h
                            </div>
                            <div class="">
                                <span>13h -> 18h, hôm nay: </span>
                                <span>10.000₫ </span>
                                <span style="text-decoration: line-through;color: gray;margin-left: 10px;">25.000
                                    <sup>đ</sup></span>
                            </div>
                        </div>
                        <hr>
                        <div class="">
                            <div style="flex-wrap: wrap;">
                                <picture class="webpimg-container" style="display: inline-block;">
                                    <source type="image/webp"
                                        srcset="https://salt.tikicdn.com/ts/upload/67/bc/b6/7aed838df704ad50927e343895885e73.png">
                                    <img srcset="https://salt.tikicdn.com/ts/upload/67/bc/b6/7aed838df704ad50927e343895885e73.png"
                                        width="18" height="18" alt="freeship-icon"
                                        class="styles__StyledImg-sc-p9s3t3-0 hbqSye badge"
                                        style="width: 18px; height: 18px; opacity: 1;">
                                </picture>
                                <div class="styles__Text-sc-1yu7xf4-2 kAixiK" style="display: inline-block;">Freeship
                                    10k đơn từ
                                    45k, Freeship 25k đơn từ 100k
                                </div>
                                <div aria-describedby="popup-12" class="style__InfoCircleIcon-sc-zw62h5-0 hgvTYY "
                                    style="display: inline-block;">
                                    <picture class="webpimg-container">
                                        <source type="image/webp"
                                            srcset="https://salt.tikicdn.com/ts/ta/c1/c0/8f/1c42c78c42d4355130fa4a4ef9036892.png">
                                        <img srcset="https://salt.tikicdn.com/ts/ta/c1/c0/8f/1c42c78c42d4355130fa4a4ef9036892.png"
                                            width="16" height="16" alt="info-icon"
                                            class="styles__StyledImg-sc-p9s3t3-0 hbqSye"
                                            style="width: 16px; height: 16px; opacity: 1;">
                                    </picture>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="section__voucher">
                        <div><span style="font-weight: bold;">Voucher</span></div>
                        <div style="margin-top: 10px;">
                            <span>1 Mã Giảm Giá</span>
                            <span style="float: right;"><button class="btn__section__voucher">Giảm 40k</button>
                                <span style=""><a href="" style="color: gray;"><i
                                            class="fa-solid fa-angle-right"></i></a>
                                </span>
                        </div>
                        <div style="margin-top: 10px;"><span>
                            </span>
                        </div>
                    </div>

                    <div class="section__sptuongtu">
                        <div><span style="font-weight: bold;">Sản phẩm tương tự</span></div>
                        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-indicators">
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0"
                                    class="active" aria-current="true" aria-label="Slide 1"></button>
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                                    aria-label="Slide 2"></button>
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                                    aria-label="Slide 3"></button>
                            </div>
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <div class="sptuongtu">
                                        <div class="section__sptuongtu__info">
                                            <div class="section__sptuongtu__info__img">
                                                <img srcset="https://salt.tikicdn.com/cache/280x280/ts/product/1e/25/8f/5e98f7343514e62855d117a54828ad65.jpg 1x, https://salt.tikicdn.com/cache/280x280/ts/product/1e/25/8f/5e98f7343514e62855d117a54828ad65.jpg 2x"
                                                    alt="Bao cao su Durex Kingtex 12 bao"
                                                    class="styles__StyledImg-sc-p9s3t3-0 hbqSye"
                                                    style="width: 100%; height: 100%; opacity: 1;">
                                            </div>
                                            <div class="section__sptuongtu__info__name">
                                                <h2 style="font-size: 15px;">Bao Cao Su Durex Jean</h2>
                                            </div>
                                            <div class="section__sptuongtu__info__rate">
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                            </div>
                                            <div class="section__sptuongtu__info__price">
                                                <span style="">304.000<sup>đ</sup></span>
                                            </div>
                                        </div>
                                        <div class="section__sptuongtu__info">
                                            <div class="section__sptuongtu__info__img">
                                                <img srcset="https://salt.tikicdn.com/cache/280x280/ts/product/1e/25/8f/5e98f7343514e62855d117a54828ad65.jpg 1x, https://salt.tikicdn.com/cache/280x280/ts/product/1e/25/8f/5e98f7343514e62855d117a54828ad65.jpg 2x"
                                                    alt="Bao cao su Durex Kingtex 12 bao"
                                                    class="styles__StyledImg-sc-p9s3t3-0 hbqSye"
                                                    style="width: 100%; height: 100%; opacity: 1;">
                                            </div>
                                            <div class="section__sptuongtu__info__name">
                                                <h2 style="font-size: 15px;">Bao Cao Su Durex Jean</h2>
                                            </div>
                                            <div class="section__sptuongtu__info__rate">
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                            </div>
                                            <div class="section__sptuongtu__info__price">
                                                <span style="">304.000<sup>đ</sup></span>
                                            </div>
                                        </div>
                                        <div class="section__sptuongtu__info">
                                            <div class="section__sptuongtu__info__img">
                                                <img srcset="https://salt.tikicdn.com/cache/280x280/ts/product/1e/25/8f/5e98f7343514e62855d117a54828ad65.jpg 1x, https://salt.tikicdn.com/cache/280x280/ts/product/1e/25/8f/5e98f7343514e62855d117a54828ad65.jpg 2x"
                                                    alt="Bao cao su Durex Kingtex 12 bao"
                                                    class="styles__StyledImg-sc-p9s3t3-0 hbqSye"
                                                    style="width: 100%; height: 100%; opacity: 1;">
                                            </div>
                                            <div class="section__sptuongtu__info__name">
                                                <h2 style="font-size: 15px;">Bao Cao Su Durex Jean</h2>
                                            </div>
                                            <div class="section__sptuongtu__info__rate">
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                            </div>
                                            <div class="section__sptuongtu__info__price">
                                                <span style="">304.000<sup>đ</sup></span>
                                            </div>
                                        </div>
                                        <div class="section__sptuongtu__info">
                                            <div class="section__sptuongtu__info__img">
                                                <img srcset="https://salt.tikicdn.com/cache/280x280/ts/product/1e/25/8f/5e98f7343514e62855d117a54828ad65.jpg 1x, https://salt.tikicdn.com/cache/280x280/ts/product/1e/25/8f/5e98f7343514e62855d117a54828ad65.jpg 2x"
                                                    alt="Bao cao su Durex Kingtex 12 bao"
                                                    class="styles__StyledImg-sc-p9s3t3-0 hbqSye"
                                                    style="width: 100%; height: 100%; opacity: 1;">
                                            </div>
                                            <div class="section__sptuongtu__info__name">
                                                <h2 style="font-size: 15px;">Bao Cao Su Durex Jean</h2>
                                            </div>
                                            <div class="section__sptuongtu__info__rate">
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                            </div>
                                            <div class="section__sptuongtu__info__price">
                                                <span style="">304.000<sup>đ</sup></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="sptuongtu">
                                        <div class="section__sptuongtu__info">
                                            <div class="section__sptuongtu__info__img">
                                                <img srcset="https://salt.tikicdn.com/cache/280x280/ts/product/1e/25/8f/5e98f7343514e62855d117a54828ad65.jpg 1x, https://salt.tikicdn.com/cache/280x280/ts/product/1e/25/8f/5e98f7343514e62855d117a54828ad65.jpg 2x"
                                                    alt="Bao cao su Durex Kingtex 12 bao"
                                                    class="styles__StyledImg-sc-p9s3t3-0 hbqSye"
                                                    style="width: 100%; height: 100%; opacity: 1;">
                                            </div>
                                            <div class="section__sptuongtu__info__name">
                                                <h2 style="font-size: 15px;">Bao Cao Su Durex Jean</h2>
                                            </div>
                                            <div class="section__sptuongtu__info__rate">
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                            </div>
                                            <div class="section__sptuongtu__info__price">
                                                <span style="">304.000<sup>đ</sup></span>
                                            </div>
                                        </div>
                                        <div class="section__sptuongtu__info">
                                            <div class="section__sptuongtu__info__img">
                                                <img srcset="https://salt.tikicdn.com/cache/280x280/ts/product/1e/25/8f/5e98f7343514e62855d117a54828ad65.jpg 1x, https://salt.tikicdn.com/cache/280x280/ts/product/1e/25/8f/5e98f7343514e62855d117a54828ad65.jpg 2x"
                                                    alt="Bao cao su Durex Kingtex 12 bao"
                                                    class="styles__StyledImg-sc-p9s3t3-0 hbqSye"
                                                    style="width: 100%; height: 100%; opacity: 1;">
                                            </div>
                                            <div class="section__sptuongtu__info__name">
                                                <h2 style="font-size: 15px;">Bao Cao Su Durex Jean</h2>
                                            </div>
                                            <div class="section__sptuongtu__info__rate">
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                            </div>
                                            <div class="section__sptuongtu__info__price">
                                                <span style="">304.000<sup>đ</sup></span>
                                            </div>
                                        </div>
                                        <div class="section__sptuongtu__info">
                                            <div class="section__sptuongtu__info__img">
                                                <img srcset="https://salt.tikicdn.com/cache/280x280/ts/product/1e/25/8f/5e98f7343514e62855d117a54828ad65.jpg 1x, https://salt.tikicdn.com/cache/280x280/ts/product/1e/25/8f/5e98f7343514e62855d117a54828ad65.jpg 2x"
                                                    alt="Bao cao su Durex Kingtex 12 bao"
                                                    class="styles__StyledImg-sc-p9s3t3-0 hbqSye"
                                                    style="width: 100%; height: 100%; opacity: 1;">
                                            </div>
                                            <div class="section__sptuongtu__info__name">
                                                <h2 style="font-size: 15px;">Bao Cao Su Durex Jean</h2>
                                            </div>
                                            <div class="section__sptuongtu__info__rate">
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                            </div>
                                            <div class="section__sptuongtu__info__price">
                                                <span style="">304.000<sup>đ</sup></span>
                                            </div>
                                        </div>
                                        <div class="section__sptuongtu__info">
                                            <div class="section__sptuongtu__info__img">
                                                <img srcset="https://salt.tikicdn.com/cache/280x280/ts/product/1e/25/8f/5e98f7343514e62855d117a54828ad65.jpg 1x, https://salt.tikicdn.com/cache/280x280/ts/product/1e/25/8f/5e98f7343514e62855d117a54828ad65.jpg 2x"
                                                    alt="Bao cao su Durex Kingtex 12 bao"
                                                    class="styles__StyledImg-sc-p9s3t3-0 hbqSye"
                                                    style="width: 100%; height: 100%; opacity: 1;">
                                            </div>
                                            <div class="section__sptuongtu__info__name">
                                                <h2 style="font-size: 15px;">Bao Cao Su Durex Jean</h2>
                                            </div>
                                            <div class="section__sptuongtu__info__rate">
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                            </div>
                                            <div class="section__sptuongtu__info__price">
                                                <span style="">304.000<sup>đ</sup></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <div class="sptuongtu">
                                        <div class="section__sptuongtu__info">
                                            <div class="section__sptuongtu__info__img">
                                                <img srcset="https://salt.tikicdn.com/cache/280x280/ts/product/1e/25/8f/5e98f7343514e62855d117a54828ad65.jpg 1x, https://salt.tikicdn.com/cache/280x280/ts/product/1e/25/8f/5e98f7343514e62855d117a54828ad65.jpg 2x"
                                                    alt="Bao cao su Durex Kingtex 12 bao"
                                                    class="styles__StyledImg-sc-p9s3t3-0 hbqSye"
                                                    style="width: 100%; height: 100%; opacity: 1;">
                                            </div>
                                            <div class="section__sptuongtu__info__name">
                                                <h2 style="font-size: 15px;">Bao Cao Su Durex Jean</h2>
                                            </div>
                                            <div class="section__sptuongtu__info__rate">
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                            </div>
                                            <div class="section__sptuongtu__info__price">
                                                <span style="">304.000<sup>đ</sup></span>
                                            </div>
                                        </div>
                                        <div class="section__sptuongtu__info">
                                            <div class="section__sptuongtu__info__img">
                                                <img srcset="https://salt.tikicdn.com/cache/280x280/ts/product/1e/25/8f/5e98f7343514e62855d117a54828ad65.jpg 1x, https://salt.tikicdn.com/cache/280x280/ts/product/1e/25/8f/5e98f7343514e62855d117a54828ad65.jpg 2x"
                                                    alt="Bao cao su Durex Kingtex 12 bao"
                                                    class="styles__StyledImg-sc-p9s3t3-0 hbqSye"
                                                    style="width: 100%; height: 100%; opacity: 1;">
                                            </div>
                                            <div class="section__sptuongtu__info__name">
                                                <h2 style="font-size: 15px;">Bao Cao Su Durex Jean</h2>
                                            </div>
                                            <div class="section__sptuongtu__info__rate">
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                            </div>
                                            <div class="section__sptuongtu__info__price">
                                                <span style="">304.000<sup>đ</sup></span>
                                            </div>
                                        </div>
                                        <div class="section__sptuongtu__info">
                                            <div class="section__sptuongtu__info__img">
                                                <img srcset="https://salt.tikicdn.com/cache/280x280/ts/product/1e/25/8f/5e98f7343514e62855d117a54828ad65.jpg 1x, https://salt.tikicdn.com/cache/280x280/ts/product/1e/25/8f/5e98f7343514e62855d117a54828ad65.jpg 2x"
                                                    alt="Bao cao su Durex Kingtex 12 bao"
                                                    class="styles__StyledImg-sc-p9s3t3-0 hbqSye"
                                                    style="width: 100%; height: 100%; opacity: 1;">
                                            </div>
                                            <div class="section__sptuongtu__info__name">
                                                <h2 style="font-size: 15px;">Bao Cao Su Durex Jean</h2>
                                            </div>
                                            <div class="section__sptuongtu__info__rate">
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                            </div>
                                            <div class="section__sptuongtu__info__price">
                                                <span style="">304.000<sup>đ</sup></span>
                                            </div>
                                        </div>
                                        <div class="section__sptuongtu__info">
                                            <div class="section__sptuongtu__info__img">
                                                <img srcset="https://salt.tikicdn.com/cache/280x280/ts/product/1e/25/8f/5e98f7343514e62855d117a54828ad65.jpg 1x, https://salt.tikicdn.com/cache/280x280/ts/product/1e/25/8f/5e98f7343514e62855d117a54828ad65.jpg 2x"
                                                    alt="Bao cao su Durex Kingtex 12 bao"
                                                    class="styles__StyledImg-sc-p9s3t3-0 hbqSye"
                                                    style="width: 100%; height: 100%; opacity: 1;">
                                            </div>
                                            <div class="section__sptuongtu__info__name">
                                                <h2 style="font-size: 15px;">Bao Cao Su Durex Jean</h2>
                                            </div>
                                            <div class="section__sptuongtu__info__rate">
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                            </div>
                                            <div class="section__sptuongtu__info__price">
                                                <span style="">304.000<sup>đ</sup></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="sptuongtu">
                                        <div class="section__sptuongtu__info">
                                            <div class="section__sptuongtu__info__img">
                                                <img srcset="https://salt.tikicdn.com/cache/280x280/ts/product/1e/25/8f/5e98f7343514e62855d117a54828ad65.jpg 1x, https://salt.tikicdn.com/cache/280x280/ts/product/1e/25/8f/5e98f7343514e62855d117a54828ad65.jpg 2x"
                                                    alt="Bao cao su Durex Kingtex 12 bao"
                                                    class="styles__StyledImg-sc-p9s3t3-0 hbqSye"
                                                    style="width: 100%; height: 100%; opacity: 1;">
                                            </div>
                                            <div class="section__sptuongtu__info__name">
                                                <h2 style="font-size: 15px;">Bao Cao Su Durex Jean</h2>
                                            </div>
                                            <div class="section__sptuongtu__info__rate">
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                            </div>
                                            <div class="section__sptuongtu__info__price">
                                                <span style="">304.000<sup>đ</sup></span>
                                            </div>
                                        </div>
                                        <div class="section__sptuongtu__info">
                                            <div class="section__sptuongtu__info__img">
                                                <img srcset="https://salt.tikicdn.com/cache/280x280/ts/product/1e/25/8f/5e98f7343514e62855d117a54828ad65.jpg 1x, https://salt.tikicdn.com/cache/280x280/ts/product/1e/25/8f/5e98f7343514e62855d117a54828ad65.jpg 2x"
                                                    alt="Bao cao su Durex Kingtex 12 bao"
                                                    class="styles__StyledImg-sc-p9s3t3-0 hbqSye"
                                                    style="width: 100%; height: 100%; opacity: 1;">
                                            </div>
                                            <div class="section__sptuongtu__info__name">
                                                <h2 style="font-size: 15px;">Bao Cao Su Durex Jean</h2>
                                            </div>
                                            <div class="section__sptuongtu__info__rate">
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                            </div>
                                            <div class="section__sptuongtu__info__price">
                                                <span style="">304.000<sup>đ</sup></span>
                                            </div>
                                        </div>
                                        <div class="section__sptuongtu__info">
                                            <div class="section__sptuongtu__info__img">
                                                <img srcset="https://salt.tikicdn.com/cache/280x280/ts/product/1e/25/8f/5e98f7343514e62855d117a54828ad65.jpg 1x, https://salt.tikicdn.com/cache/280x280/ts/product/1e/25/8f/5e98f7343514e62855d117a54828ad65.jpg 2x"
                                                    alt="Bao cao su Durex Kingtex 12 bao"
                                                    class="styles__StyledImg-sc-p9s3t3-0 hbqSye"
                                                    style="width: 100%; height: 100%; opacity: 1;">
                                            </div>
                                            <div class="section__sptuongtu__info__name">
                                                <h2 style="font-size: 15px;">Bao Cao Su Durex Jean</h2>
                                            </div>
                                            <div class="section__sptuongtu__info__rate">
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                            </div>
                                            <div class="section__sptuongtu__info__price">
                                                <span style="">304.000<sup>đ</sup></span>
                                            </div>
                                        </div>
                                        <div class="section__sptuongtu__info">
                                            <div class="section__sptuongtu__info__img">
                                                <img srcset="https://salt.tikicdn.com/cache/280x280/ts/product/1e/25/8f/5e98f7343514e62855d117a54828ad65.jpg 1x, https://salt.tikicdn.com/cache/280x280/ts/product/1e/25/8f/5e98f7343514e62855d117a54828ad65.jpg 2x"
                                                    alt="Bao cao su Durex Kingtex 12 bao"
                                                    class="styles__StyledImg-sc-p9s3t3-0 hbqSye"
                                                    style="width: 100%; height: 100%; opacity: 1;">
                                            </div>
                                            <div class="section__sptuongtu__info__name">
                                                <h2 style="font-size: 15px;">Bao Cao Su Durex Jean</h2>
                                            </div>
                                            <div class="section__sptuongtu__info__rate">
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                            </div>
                                            <div class="section__sptuongtu__info__price">
                                                <span style="">304.000<sup>đ</sup></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <div class="sptuongtu">
                                        <div class="section__sptuongtu__info">
                                            <div class="section__sptuongtu__info__img">
                                                <img srcset="https://salt.tikicdn.com/cache/280x280/ts/product/1e/25/8f/5e98f7343514e62855d117a54828ad65.jpg 1x, https://salt.tikicdn.com/cache/280x280/ts/product/1e/25/8f/5e98f7343514e62855d117a54828ad65.jpg 2x"
                                                    alt="Bao cao su Durex Kingtex 12 bao"
                                                    class="styles__StyledImg-sc-p9s3t3-0 hbqSye"
                                                    style="width: 100%; height: 100%; opacity: 1;">
                                            </div>
                                            <div class="section__sptuongtu__info__name">
                                                <h2 style="font-size: 15px;">Bao Cao Su Durex Jean</h2>
                                            </div>
                                            <div class="section__sptuongtu__info__rate">
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                            </div>
                                            <div class="section__sptuongtu__info__price">
                                                <span style="">304.000<sup>đ</sup></span>
                                            </div>
                                        </div>
                                        <div class="section__sptuongtu__info">
                                            <div class="section__sptuongtu__info__img">
                                                <img srcset="https://salt.tikicdn.com/cache/280x280/ts/product/1e/25/8f/5e98f7343514e62855d117a54828ad65.jpg 1x, https://salt.tikicdn.com/cache/280x280/ts/product/1e/25/8f/5e98f7343514e62855d117a54828ad65.jpg 2x"
                                                    alt="Bao cao su Durex Kingtex 12 bao"
                                                    class="styles__StyledImg-sc-p9s3t3-0 hbqSye"
                                                    style="width: 100%; height: 100%; opacity: 1;">
                                            </div>
                                            <div class="section__sptuongtu__info__name">
                                                <h2 style="font-size: 15px;">Bao Cao Su Durex Jean</h2>
                                            </div>
                                            <div class="section__sptuongtu__info__rate">
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                            </div>
                                            <div class="section__sptuongtu__info__price">
                                                <span style="">304.000<sup>đ</sup></span>
                                            </div>
                                        </div>
                                        <div class="section__sptuongtu__info">
                                            <div class="section__sptuongtu__info__img">
                                                <img srcset="https://salt.tikicdn.com/cache/280x280/ts/product/1e/25/8f/5e98f7343514e62855d117a54828ad65.jpg 1x, https://salt.tikicdn.com/cache/280x280/ts/product/1e/25/8f/5e98f7343514e62855d117a54828ad65.jpg 2x"
                                                    alt="Bao cao su Durex Kingtex 12 bao"
                                                    class="styles__StyledImg-sc-p9s3t3-0 hbqSye"
                                                    style="width: 100%; height: 100%; opacity: 1;">
                                            </div>
                                            <div class="section__sptuongtu__info__name">
                                                <h2 style="font-size: 15px;">Bao Cao Su Durex Jean</h2>
                                            </div>
                                            <div class="section__sptuongtu__info__rate">
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                            </div>
                                            <div class="section__sptuongtu__info__price">
                                                <span style="">304.000<sup>đ</sup></span>
                                            </div>
                                        </div>
                                        <div class="section__sptuongtu__info">
                                            <div class="section__sptuongtu__info__img">
                                                <img srcset="https://salt.tikicdn.com/cache/280x280/ts/product/1e/25/8f/5e98f7343514e62855d117a54828ad65.jpg 1x, https://salt.tikicdn.com/cache/280x280/ts/product/1e/25/8f/5e98f7343514e62855d117a54828ad65.jpg 2x"
                                                    alt="Bao cao su Durex Kingtex 12 bao"
                                                    class="styles__StyledImg-sc-p9s3t3-0 hbqSye"
                                                    style="width: 100%; height: 100%; opacity: 1;">
                                            </div>
                                            <div class="section__sptuongtu__info__name">
                                                <h2 style="font-size: 15px;">Bao Cao Su Durex Jean</h2>
                                            </div>
                                            <div class="section__sptuongtu__info__rate">
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                            </div>
                                            <div class="section__sptuongtu__info__price">
                                                <span style="">304.000<sup>đ</sup></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="sptuongtu">
                                        <div class="section__sptuongtu__info">
                                            <div class="section__sptuongtu__info__img">
                                                <img srcset="https://salt.tikicdn.com/cache/280x280/ts/product/1e/25/8f/5e98f7343514e62855d117a54828ad65.jpg 1x, https://salt.tikicdn.com/cache/280x280/ts/product/1e/25/8f/5e98f7343514e62855d117a54828ad65.jpg 2x"
                                                    alt="Bao cao su Durex Kingtex 12 bao"
                                                    class="styles__StyledImg-sc-p9s3t3-0 hbqSye"
                                                    style="width: 100%; height: 100%; opacity: 1;">
                                            </div>
                                            <div class="section__sptuongtu__info__name">
                                                <h2 style="font-size: 15px;">Bao Cao Su Durex Jean</h2>
                                            </div>
                                            <div class="section__sptuongtu__info__rate">
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                            </div>
                                            <div class="section__sptuongtu__info__price">
                                                <span style="">304.000<sup>đ</sup></span>
                                            </div>
                                        </div>
                                        <div class="section__sptuongtu__info">
                                            <div class="section__sptuongtu__info__img">
                                                <img srcset="https://salt.tikicdn.com/cache/280x280/ts/product/1e/25/8f/5e98f7343514e62855d117a54828ad65.jpg 1x, https://salt.tikicdn.com/cache/280x280/ts/product/1e/25/8f/5e98f7343514e62855d117a54828ad65.jpg 2x"
                                                    alt="Bao cao su Durex Kingtex 12 bao"
                                                    class="styles__StyledImg-sc-p9s3t3-0 hbqSye"
                                                    style="width: 100%; height: 100%; opacity: 1;">
                                            </div>
                                            <div class="section__sptuongtu__info__name">
                                                <h2 style="font-size: 15px;">Bao Cao Su Durex Jean</h2>
                                            </div>
                                            <div class="section__sptuongtu__info__rate">
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                            </div>
                                            <div class="section__sptuongtu__info__price">
                                                <span style="">304.000<sup>đ</sup></span>
                                            </div>
                                        </div>
                                        <div class="section__sptuongtu__info">
                                            <div class="section__sptuongtu__info__img">
                                                <img srcset="https://salt.tikicdn.com/cache/280x280/ts/product/1e/25/8f/5e98f7343514e62855d117a54828ad65.jpg 1x, https://salt.tikicdn.com/cache/280x280/ts/product/1e/25/8f/5e98f7343514e62855d117a54828ad65.jpg 2x"
                                                    alt="Bao cao su Durex Kingtex 12 bao"
                                                    class="styles__StyledImg-sc-p9s3t3-0 hbqSye"
                                                    style="width: 100%; height: 100%; opacity: 1;">
                                            </div>
                                            <div class="section__sptuongtu__info__name">
                                                <h2 style="font-size: 15px;">Bao Cao Su Durex Jean</h2>
                                            </div>
                                            <div class="section__sptuongtu__info__rate">
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                            </div>
                                            <div class="section__sptuongtu__info__price">
                                                <span style="">304.000<sup>đ</sup></span>
                                            </div>
                                        </div>
                                        <div class="section__sptuongtu__info">
                                            <div class="section__sptuongtu__info__img">
                                                <img srcset="https://salt.tikicdn.com/cache/280x280/ts/product/1e/25/8f/5e98f7343514e62855d117a54828ad65.jpg 1x, https://salt.tikicdn.com/cache/280x280/ts/product/1e/25/8f/5e98f7343514e62855d117a54828ad65.jpg 2x"
                                                    alt="Bao cao su Durex Kingtex 12 bao"
                                                    class="styles__StyledImg-sc-p9s3t3-0 hbqSye"
                                                    style="width: 100%; height: 100%; opacity: 1;">
                                            </div>
                                            <div class="section__sptuongtu__info__name">
                                                <h2 style="font-size: 15px;">Bao Cao Su Durex Jean</h2>
                                            </div>
                                            <div class="section__sptuongtu__info__rate">
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                            </div>
                                            <div class="section__sptuongtu__info__price">
                                                <span style="">304.000<sup>đ</sup></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button
                                style="background-color: aqua; border-radius: 20px; height: 25px;width: 25px; float: inline-start; margin-top: 200px;"
                                class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                                data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button
                                style="background-color: aqua; border-radius: 20px; height: 25px;width: 25px; float: inline-start; margin-top: 200px;"
                                class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                                data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    </div>

                    <div class="section__infobaohanh">
                        <div><span style="font-weight: bold;">Thông tin bảo hành</span></div>
                        <div style="margin-top: 10px;"><span>Hướng dẫn bảo hành: </span><span><a href=""
                                    style="text-decoration: none;">Xem chi tiết</a></span></div>
                    </div>

                    <div class="section__chinhsach">
                        <div><span style="font-weight: bold;">An tâm mua sắm</span><span style="float: inline-end;">
                                <a href="" style="color: gray;"><i class="fa-solid fa-angle-right"></i></a></span></div>
                        <div style="margin-top: 10px;"><span><img alt="compensation-icon"
                                    src="https://salt.tikicdn.com/ts/upload/c5/37/ee/76c708d43e377343e82baee8a0340297.png"
                                    height="20" width="20">
                            </span>
                            <span>
                                Được đồng kiểm khi nhận hàng
                            </span>
                        </div>
                        <hr>
                        <div style="margin-top: 10px;"><span><img alt="compensation-icon"
                                    src="https://salt.tikicdn.com/ts/upload/ea/02/b4/b024e431ec433e6c85d4734aaf35bd65.png"
                                    height="20" width="20">
                            </span>
                            <span>
                                Được hoàn tiền 200% nếu là hàng giả.
                            </span>
                        </div>
                        <hr>
                        <div style="margin-top: 10px;"><span><img alt="compensation-icon"
                                    src="https://salt.tikicdn.com/ts/upload/d8/c7/a5/1cd5bd2f27f9bd74b2c340b8e27c4d82.png"
                                    height="20" width="20">
                            </span>
                            <span>
                                Đổi trả miễn phí trong 30 ngày. Được đổi ý.
                            </span>
                        </div>
                    </div>

                    <div class="section__infodetail">
                        <div><span style="font-weight: bold;">Thông tin chi tiết</span></div>
                        <div class="WidgetTitle__WidgetContentRowStyled-sc-12sadap-3 guWvLv"
                            style="display: grid; grid-template-columns: 55% 45%; gap: 4px; margin-top: 10px;"><span
                                style="max-width: 300px; color: rgb(128, 128, 137);">Sản phẩm có được bảo hành
                                không?</span><span
                                class="styles__ProductAttributeValueStyled-sc-vjutbk-0 chhHdv">Không</span>
                        </div>
                        <hr>
                        <div class="WidgetTitle__WidgetContentRowStyled-sc-12sadap-3 guWvLv"
                            style="display: grid; grid-template-columns: 55% 45%; gap: 4px;"><span
                                style="max-width: 300px; color: rgb(128, 128, 137);">Thương hiệu</span><span
                                class="styles__ProductAttributeValueStyled-sc-vjutbk-0 chhHdv">Durex</span>
                        </div>
                        <hr>
                        <div class="WidgetTitle__WidgetContentRowStyled-sc-12sadap-3 guWvLv"
                            style="display: grid; grid-template-columns: 55% 45%; gap: 4px;"><span
                                style="max-width: 300px; color: rgb(128, 128, 137);">Xuất xứ thương hiệu</span><span
                                class="styles__ProductAttributeValueStyled-sc-vjutbk-0 chhHdv">Anh</span>
                        </div>
                        <hr>
                        <div class="WidgetTitle__WidgetContentRowStyled-sc-12sadap-3 guWvLv"
                            style="display: grid; grid-template-columns: 55% 45%; gap: 4px;"><span
                                style="max-width: 300px; color: rgb(128, 128, 137);">Xuất xứ (Made in)</span><span
                                class="styles__ProductAttributeValueStyled-sc-vjutbk-0 chhHdv">Thailand</span>
                        </div>
                        <hr>
                        <div class="WidgetTitle__WidgetContentRowStyled-sc-12sadap-3 guWvLv"
                            style="display: grid; grid-template-columns: 55% 45%; gap: 4px;"><span
                                style="max-width: 300px; color: rgb(128, 128, 137);">Kích thước</span><span
                                class="styles__ProductAttributeValueStyled-sc-vjutbk-0 chhHdv">Hạn sử dụng</span>
                        </div>
                        <hr>
                        <div class="WidgetTitle__WidgetContentRowStyled-sc-12sadap-3 guWvLv"
                            style="display: grid; grid-template-columns: 55% 45%; gap: 4px;"><span
                                style="max-width: 300px; color: rgb(128, 128, 137);">Hạn sử dụng</span><span
                                class="styles__ProductAttributeValueStyled-sc-vjutbk-0 chhHdv">5 năm kể từ ngày sản
                                xuất</span>
                        </div>

                    </div>

                </section>
            </div>
            <div class="body__left__bot">
                <div class="body__comment">
                    <div><span style="font-weight: bold;">Khách Hàng Đánh Giá</span></div>
                    <div style="display: flex; margin-top: 10px;">
                        <div class="body__comment__tongquan">
                            <p>Tổng Quan</p>
                            <div style="display: flex;">
                                <div>
                                    <h2>{{$averageRate}}</h2>
                                </div>
                                <div style="margin-left: 15px; padding-top: 8px;">
                                @for ($i = 1; $i <= 5; $i++)
                                    <span style="color: {{ $i <= $averageRate ? 'yellow' : 'gray' }};">
                                        <i class="fa-solid fa-star"></i>
                                    </span>
                                @endfor
                                </div>
                            </div>
                            <p style="color: gray;">({{$sumrate}} đánh giá )</p>
                            <div>
                            @php
                                $totalComments = array_sum($allRatings);
                            @endphp

                            @foreach($allRatings as $stars => $count)
                                <div style="display: flex; align-items: center; margin-bottom: 5px;">
                                    <!-- Hiển thị số sao -->
                                    <div style="font-size: 12px; margin-right: 10px;">
                                        @for ($i = 1; $i <= 5; $i++)
                                            <span style="color: {{ $i <= $stars ? 'yellow' : 'gray' }};">
                                                <i class="fa-solid fa-star"></i>
                                            </span>
                                        @endfor
                                    </div>

                                    <!-- Thanh hiển thị tỷ lệ -->
                                    <div style="width: 200px; height: 10px; margin-right: 10px; background-color: rgb(245, 240, 240);">
                                        @php
                                            $percentage = $totalComments > 0 ? ($count / $totalComments) * 100 : 0;
                                        @endphp
                                        <div
                                            style="background-color: blue; width: {{ $percentage }}%; height: 100%; border-radius: 3px;">
                                        </div>
                                    </div>

                                    <!-- Số lượng đánh giá -->
                                    <div>
                                        <span style="color: gray;">{{ $count }}</span>
                                    </div>
                                </div>
                            @endforeach
                            </div>
                        </div>
                        <div class="body__comment__tonghop" style="margin-left: 10px;">
                            <div id="ai-chat" class="disclaimer" style="display: flex;"><img alt="icon"
                                    src="https://salt.tikicdn.com/ts/ta/d3/d4/1c/1d4ee6bf8bc9c5795529ac50a6b439dd.png"
                                    width="24" height="24">
                                <div><span style="margin-left: 10px; font-weight: bold;"><a href="">Trợ lý AI</a>
                                    </span> </div>
                                <div style="margin-left: 4px; font-weight: bold;">tổng hợp từ các đánh giá mới nhất
                                </div>
                            </div>
                            <div style="margin-top: 10px;">
                                <div class="body__comment__tonghop__sanpham">
                                    <strong>Về sản phẩm:</strong>
                                    <div>
                                        <span style="color: rgb(72, 194, 92);"><i class="fa-solid fa-plus"></i></span>
                                        <span>Đa số khách hàng đánh giá sản phẩm tốt, chất lượng ok.</span>
                                    </div>
                                    <div>
                                        <span style="color: rgb(72, 194, 92);"><i class="fa-solid fa-plus"></i></span>
                                        <span>Sản phẩm đáng mua, bao bì còn nguyên seal.</span>
                                    </div>
                                    <div>
                                        <span style="color: rgb(72, 194, 92);"><i class="fa-solid fa-plus"></i></span>
                                        <span>Sản phẩm Durex Fetherlite được đánh giá thoải mái và chất lượng.</span>
                                    </div>
                                </div>

                                <div class="body__comment__tonghop__dichvu" style="margin-top: 10px;">
                                    <strong>Về dịch vụ:</strong>
                                    <div>
                                        <span style="color: rgb(72, 194, 92);"><i class="fa-solid fa-plus"></i></span>
                                        <span>Giao hàng nhanh, đóng gói cẩn thận.</span>
                                    </div>
                                    <div>
                                        <span style="color: rgb(72, 194, 92);"><i class="fa-solid fa-plus"></i></span>
                                        <span>Dịch vụ giao hàng kín đáo, hỗ trợ sau bán hàng tốt.</span>
                                    </div>
                                    <div>
                                        <span style="color: rgb(72, 194, 92);"><i class="fa-solid fa-plus"></i></span>
                                        <span>Khách hàng hài lòng với dịch vụ và chất lượng sản phẩm.</span>
                                    </div>
                                </div>
                            </div>

                            <div class="flex flex-between" style="margin-top: 10px;">
                                <div class=" flex flex-between wrapper-icon"><img alt="icon"
                                        src="https://salt.tikicdn.com/ts/ta/6a/2c/6e/125f814f740ad14defbb98b7b49dfa49.png"
                                        width="32" height="32"><img alt="icon"
                                        src="https://salt.tikicdn.com/ts/ta/95/ae/66/2957a823955457b65f6f9150e41b5cb0.png"
                                        width="32" height="32"></div>
                            </div>
                        </div>
                    </div>
                    <hr>
                </div>

                <div class="body__comment__detail">
                    <div class="body__comment__detail__allimg">
                        <strong>Tất cả hình ảnh</strong>
                        <div style="display: flex; margin-top: 10px;">
                            <div class="review-images__img" style="background-image: url('bcs.jpg');">
                            </div>
                            <div class="review-images__img" style="background-image: url('hinh-nen.jpg');">
                            </div>
                            <div class="review-images__img" style="background-image: url('hinh-nen.jpg');">
                            </div>
                            <div class="review-images__img" style="background-image: url('hinh-nen.jpg');">
                            </div>
                            <div class="review-images__img" style="background-image: url('hinh-nen.jpg');">
                            </div>
                            <div class="review-images__img" style="background-image: url('hinh-nen.jpg');">
                            </div>
                            <div class="review-images__img" style="background-image: url('hinh-nen.jpg');">
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="body__comment__detail__loctheo">
                        <strong>Lọc Theo</strong>
                        <div style="display: flex; margin-top: 10px;">
                            <span style="margin-right: 20px;"><button
                                    style="border-radius: 5px; background-color: transparent; border: solid 1px rgb(232, 150, 150);">
                                    Mới Nhất
                                </button>
                            </span>
                            <span style="margin-right: 20px;"><button
                                    style="border-radius: 5px; background-color: transparent; border: solid 1px rgb(232, 150, 150);">
                                    Cũ Nhất
                                </button>
                            </span>
                            <span style="margin-right: 20px;"><button
                                    style="border-radius: 5px; background-color: transparent; border: solid 1px rgb(232, 150, 150);">
                                    Có Hình Ảnh
                                </button>
                            </span>
                            <span style="margin-right: 20px;"><button
                                    style="border-radius: 5px; background-color: transparent; border: solid 1px rgb(232, 150, 150);">
                                    5 Sao
                                </button>
                            </span>
                            <span style="margin-right: 20px;"><button
                                    style="border-radius: 5px; background-color: transparent; border: solid 1px rgb(232, 150, 150);">
                                    4 Sao
                                </button>
                            </span>
                            <span style="margin-right: 20px;"><button
                                    style="border-radius: 5px; background-color: transparent; border: solid 1px rgb(232, 150, 150);">
                                    3 Sao
                                </button>
                            </span>
                            <span style="margin-right: 20px;"><button
                                    style="border-radius: 5px; background-color: transparent; border: solid 1px rgb(232, 150, 150);">
                                    2 Sao
                                </button>
                            </span>
                            <span style="margin-right: 20px;"><button
                                    style="border-radius: 5px; background-color: transparent; border: solid 1px rgb(232, 150, 150);">
                                    1 Sao
                                </button>
                            </span>
                        </div>
                    </div>
                    <hr>
                    <div class="body__comment__detail__user" style="display: flex;">
                        @foreach ($allcomment as $comment)
                        <div class="" style="width: 10%;">
                            <div class="body__comment__detail__user__img" style="background-image: url({{ asset('img/' . $comment->avt) }});">
                            </div>
                        </div>
                        <div class="body__comment__detail__user__content" style="font-size: 15px;">
                            <div class="body__comment__detail__user__content__name">
                                <span style="font-weight: bold;">{{$comment->name}}</span>
                            </div>
                            <div class="body__comment__detail__user__content__rate" data-rate="{{ $comment->rate }}" style="font-size: 12px;">
                                <span style="color: yellow;"><i class="fa-solid fa-star"></i></span>
                                <span style="color: yellow;"><i class="fa-solid fa-star"></i></span>
                                <span style="color: yellow;"><i class="fa-solid fa-star"></i></span>
                                <span style="color: yellow;"><i class="fa-solid fa-star"></i></span>
                                <span style="color: yellow;"><i class="fa-solid fa-star"></i></span>
                            </div>
                            <script>
                                document.addEventListener("DOMContentLoaded", function () {
                                const rates = document.querySelectorAll(".body__comment__detail__user__content__rate");

                                rates.forEach(rateElement => {
                                    const rate = parseInt(rateElement.getAttribute("data-rate"), 10); // Lấy giá trị rate từ data-rate

                                    // Lấy tất cả các ngôi sao trong phần tử hiện tại
                                    const stars = rateElement.querySelectorAll("i");

                                    // Cập nhật màu sắc cho các sao dựa trên giá trị rate
                                    stars.forEach((star, index) => {
                                        if (index < rate) {
                                            star.style.color = "yellow"; // Sao được tô màu
                                        } else {
                                            star.style.color = "lightgray"; // Sao chưa được tô màu
                                        }
                                    });
                                });
                            });

                            </script>
                            <div class="body__comment__detail__user__content__time">
                                <span>{{ \Carbon\Carbon::parse($comment->time)->format('d-m-Y') }}</span>
                            </div>
                            <div>
                                <span style="color: gray;">Chất Lượng Sản Phẩm: </span>
                                <span style="font-weight: bold;">Tốt</span>
                            </div>
                            <div>
                                <span style="color: gray;">Đúng Với Mô Tả: </span>
                                <span style="font-weight: bold;">Đúng</span>
                            </div>
                            <div>
                                <span style="color: gray;">Tính Năng Nổi Bật: </span>
                                <span style="font-weight: bold;">Chụp đêm</span>
                            </div>

                            <div class="body__comment__detail__user__content__text">
                                <span style="color: rgb(38, 31, 31); font-style: italic;">
                                {{$comment->content}}
                                </span>
                            </div>
                            <div class="body__comment__detail__user__content__img"
                                style="display: flex; margin-top: 10px;">
                                <div class="review-images__img" style="background-image: url('bcs.jpg');">
                                </div>
                                <div class="review-images__img" style="background-image: url('hinh-nen.jpg');">
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <hr>
                    <div class="shopee-page-controller product-ratings__page-controller"><button
                            class="shopee-icon-button shopee-icon-button--left "><svg enable-background="new 0 0 11 11"
                                viewBox="0 0 11 11" x="0" y="0" class="shopee-svg-icon icon-arrow-left">
                                <g>
                                    <path
                                        d="m8.5 11c-.1 0-.2 0-.3-.1l-6-5c-.1-.1-.2-.3-.2-.4s.1-.3.2-.4l6-5c .2-.2.5-.1.7.1s.1.5-.1.7l-5.5 4.6 5.5 4.6c.2.2.2.5.1.7-.1.1-.3.2-.4.2z">
                                    </path>
                                </g>
                            </svg></button><button class="shopee-button-no-outline">1</button><button
                            class="shopee-button-no-outline">2</button><button
                            class="shopee-button-solid shopee-button-solid--primary">3</button><button
                            class="shopee-button-no-outline">4</button><button
                            class="shopee-button-no-outline">5</button><button
                            class="shopee-button-no-outline">6</button><button
                            class="shopee-button-no-outline shopee-button-no-outline--non-click">...</button><button
                            class="shopee-icon-button shopee-icon-button--right "><svg enable-background="new 0 0 11 11"
                                viewBox="0 0 11 11" x="0" y="0" class="shopee-svg-icon icon-arrow-right">
                                <path
                                    d="m2.5 11c .1 0 .2 0 .3-.1l6-5c .1-.1.2-.3.2-.4s-.1-.3-.2-.4l-6-5c-.2-.2-.5-.1-.7.1s-.1.5.1.7l5.5 4.6-5.5 4.6c-.2.2-.2.5-.1.7.1.1.3.2.4.2z">
                                </path>
                            </svg></button>
                    </div>
                </div>
            </div>
</div>
        <div class="body__right">
            <aside class="body__aside">
                <div class="body__aside__top">
                    <div class="body__aside__logo">
                        <div class="body__aside__logo__img">
                            <img srcset="https://vcdn.tikicdn.com/cache/w100/ts/seller/d1/3f/ae/13ce3d83ab6b6c5e77e6377ad61dc4a5.jpg 1x, https://vcdn.tikicdn.com/cache/w100/ts/seller/d1/3f/ae/13ce3d83ab6b6c5e77e6377ad61dc4a5.jpg 2x"
                                class="styles__StyledImg-sc-p9s3t3-0 hbqSye logo" width="40" height="40"
                                alt="Tiki Trading"
                                style="border-radius: 50%; min-width: 40px; width: 40px; height: 40px; opacity: 1;">
                        </div>
                        <div class="body__aside__logo__info">
                            <p style="margin: 0px;">Tiki Tranding</p>
                            <span><img
                                    srcset="https://salt.tikicdn.com/cache/w100/ts/upload/6b/25/fb/c288b5bcee51f35f2df0a5f5f03de2e1.png 1x, https://salt.tikicdn.com/cache/w100/ts/upload/6b/25/fb/c288b5bcee51f35f2df0a5f5f03de2e1.png 2x"
                                    class="styles__StyledImg-sc-p9s3t3-0 hbqSye badge-img" alt="seller-badge"
                                    style="width: 72px; height: 20px; min-width: 72px; min-height: 20px; opacity: 1;">
                                <span>4.7</span>
                                <span style="color: yellow;"><i class="fa-solid fa-star"></i></span>
                                <span style="color: gray;">(5.5tr Đánh giá)</span>
                            </span>
                        </div>
                        <div class="body__aside__logo__chat">
                            <a href="">
                                <img alt="chat-tiki-trading"
                                    src="https://salt.tikicdn.com/ts/upload/8b/82/74/cf2c041938ace329ab11fbc38da3275b.png"
                                    height="16" width="16">
                            </a>
                        </div>
                    </div>
                </div>
                <center>
                    <hr style="width: 310px; color: gray; ">
                </center>
                <div class="body__aside__bot">
                    <div class="">
                        <p class="label" style="font-weight: bold;">Số Lượng</p>
                        <div class="quantity-container">
                            <button class="quantity-btn" onclick="decreaseValue()">-</button>
                            <input type="text" id="quantity-input" value="1" class="quantity-input" readonly>
                            <button class="quantity-btn" onclick="increaseValue()">+</button>
                        </div>
                        <script>
                            let selectedPrice = 0; // Biến lưu giá của màu đã chọn
                            // Hàm chọn màu
                            function selectOption(element) {
                                // Xóa class 'selected' khỏi tất cả các tùy chọn
                                const options = document.querySelectorAll('.option-color');
                                options.forEach(option => option.classList.remove('selected'));

                                // Thêm class 'selected' vào tùy chọn được click
                                element.classList.add('selected');

                                // Lấy giá của màu đã chọn từ thuộc tính data-price
                                const price = element.getAttribute('data-price');

                                // Chuyển đổi thành số nguyên và kiểm tra giá trị
                                selectedPrice = price ? parseInt(price) : 0;

                                if (isNaN(selectedPrice)) {
                                    console.error("Lỗi: Giá trị data-price không hợp lệ", price);
                                    selectedPrice = 0;
                                }

                                // Cập nhật tổng giá
                                updateTotalPrice();
                            }
                            function decreaseValue() {
                                const input = document.getElementById('quantity-input');
                                let value = parseInt(input.value);
                                if (value > 1) { // Giới hạn không cho phép giá trị nhỏ hơn 1
                                    value--;
                                    input.value = value;
                                    updateTotalPrice();
                                }
                            }

                            function increaseValue() {
                                const input = document.getElementById('quantity-input');
                                let value = parseInt(input.value);
                                value++;
                                input.value = value;
                                updateTotalPrice();
                            }

                            function updateTotalPrice() {
                                const input = document.getElementById('quantity-input');
                                const totalPriceElement = document.getElementById('total-price');

                                // Lấy số lượng và đảm bảo nó là số
                                const quantity = parseInt(input.value) || 1;

                                // Tính tổng giá = giá màu đã chọn x số lượng
                                const totalPrice = selectedPrice * quantity;

                                // Cập nhật tổng giá vào giao diện
                                totalPriceElement.innerHTML = totalPrice.toLocaleString('vi-VN') + "<sup>đ</sup>";
                            }
                        </script>
                    </div>
                    <div class="">
                        <p class="label" style="font-weight: bold; margin-top: 15px;">Tạm tính</p>
                        <div class="">
                        <span id="total-price" style="font-size: 25px; font-weight: bold;">
                            0<sup>đ</sup>
                        </span>
                        </div>
                    </div>
                    <div class="d-grid gap-2 col-6 mt-3">
                        <button class="btn btn-danger" type="button" style="width: 320px;">Mua ngay</button>
                        <button class="btn btn-primary" type="button"
                            style="background-color: transparent; color: blue;">Thêm giỏ hàng</button>
                            <form id="favoriteForm" data-favorite="{{ $isFavorite ? 'true' : 'false' }}" action="{{ route('favorite.add') }}" method="POST">
                                @csrf
                                <input type="hidden" name="sanpham" value="{{ $product->id }}">
                                <button id="favoriteButton" class="btn btn-primary" type="button"
                                    style="background-color: transparent; color: {{ $isFavorite ? 'red' : 'blue' }}; width: 320px;">
                                    <span id="favoriteText">{{ $isFavorite ? 'Đã Yêu Thích' : 'Thêm Vào Yêu Thích' }}</span>
                                    <i id="favoriteIcon" class="fa-regular fa-heart"></i>
                                </button>
                            </form>
                            <script>
                                document.addEventListener("DOMContentLoaded", function () {
                                const favoriteForm = document.getElementById("favoriteForm");
                                const favoriteButton = document.getElementById("favoriteButton");
                                const favoriteText = document.getElementById("favoriteText");
                                const favoriteIcon = document.getElementById("favoriteIcon");

                                favoriteButton.addEventListener("click", function () {
                                    const formData = new FormData(favoriteForm);

                                    fetch(favoriteForm.action, {
                                        method: "POST",
                                        body: formData,
                                        headers: {
                                            "X-CSRF-TOKEN": document.querySelector('input[name="_token"]').value,
                                        },
                                    })
                                        .then((response) => response.json())
                                        .then((data) => {
                                            if (data.success) {
                                                // Cập nhật giao diện dựa trên trạng thái yêu thích
                                                if (data.isFavorite) {
                                                    favoriteText.textContent = "Đã Yêu Thích";
                                                    favoriteButton.style.color = "red";
                                                } else {
                                                    favoriteText.textContent = "Thêm Vào Yêu Thích";
                                                    favoriteButton.style.color = "blue";
                                                }
                                            } else {
                                                alert(data.message || "Có lỗi xảy ra.");
                                            }
                                        })
                                        .catch((error) => {
                                            console.error("Lỗi:", error);
                                            alert("Không thể thực hiện yêu cầu.");
                                        });
                                });
                            });
                            </script>
                    </div>
                </div>

                <div class="body__aside__quangcao">
                    <div>
                        <a href="" style="color: gray;">
                            <span style="color: gray;text-align: center;">So Sánh 3 Sản Phẩm Khác (Giá Từ: 198.00
                                đ)</span>
                        </a>
                    </div>
                    <div>
                        <div class="custom-slideshow-container">
                            <div class="slideshow">
                                <input type="radio" name="slide" id="slide1" checked>
                                <input type="radio" name="slide" id="slide2">
                                <input type="radio" name="slide" id="slide3">

                                <div class="slides">
                                    <div class="slide" id="slide-1">
                                        <img src="https://salt.tikicdn.com/cache/w720/ts/tka/27/49/5a/c98e35567682a9eb5a63ff5796cc36ec.png"
                                            alt="Slide 1">
                                    </div>
                                    <div class="slide" id="slide-2">
                                        <img src="https://salt.tikicdn.com/cache/w720/ts/tka/7f/0b/d3/95916a0bd08a84d64206ce6ef9e72010.png"
                                            alt="Slide 2">
                                    </div>
                                    <div class="slide" id="slide-3">
                                        <img src="https://salt.tikicdn.com/cache/w720/ts/tka/99/ce/6a/9c0a7990ddba5207da7cc37b85bdc2f0.png"
                                            alt="Slide 3">
                                    </div>
                                </div>

                                <div class="navigation">
                                    <label for="slide1" class="nav-dot"></label>
                                    <label for="slide2" class="nav-dot"></label>
                                    <label for="slide3" class="nav-dot"></label>
                                </div>
                            </div>
                        </div>
                        <script>
                            let currentIndex = 1;
                            const totalSlides = 3; // Tổng số slide
                            const intervalTime = 3000; // 3000ms = 3 giây

                            setInterval(() => {
                                document.getElementById(`slide${currentIndex}`).checked = true;
                                currentIndex++;
                                if (currentIndex > totalSlides) {
                                    currentIndex = 1; // Quay lại slide đầu tiên khi hết các slide
                                }
                            }, intervalTime);
                        </script>
                    </div>
                </div>
            </aside>
        </div>
      
@endsection