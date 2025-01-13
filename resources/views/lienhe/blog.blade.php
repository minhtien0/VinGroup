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
                <li>Iphone</li>
                <li>Samsum</li>
                <li>Xiaomi</li>
                <li>Google</li>
                <li>Oppo</li>
                <li>Nokia</li>
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
                            <span class="blogspan-size">{{ $categoryIphone->name}}</span>
                        </div>
                        <div class="featured-review" id="featured-products">
                            @foreach ($categoryIphone->products->take(2) as $product)
                                <div class="blogleft-review">
                                    <img src="{{ asset('img/' . $product->avt) }}" alt="{{ $product->name }}">
                                    <div class="review-content">
                                        <h3>{{ $product->name }}</h3>
                                        <h3>{{ $product->blog?->tieude??'chua co tiêu đề' }}</h3>
                                        <h3>{{ $product->blog?->noidung ??"chua co tieu đề"}}</h3>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="pagination">
                            <button id="prev-button">&laquo;</button>
                            <button id="next-button" data-category-id="{{ $categoryIphone->id }}">&raquo;</button>
                        </div>
                    </div>
                    <!-- ///////////////////////////////////// -->
                    <div class="blog-tech-section">
                        <div class="blog-main">
                            <div class="blog-category-main">
                                <span class="blogspan-size">{{ $categoryNokia->name}}</span>
                            </div>
                            <div class="featured-review" id="featured-products">
                                @foreach ($categoryNokia->products->take(2) as $product)
                                    <div class="blogleft-review">
                                        <img src="{{ asset('img/' . $product->avt) }}" alt="{{ $product->name }}">
                                        <div class="review-content">
                                        <h3>{{ $product->name }}</h3>
                                        <h3>{{ $product->blog->tieude }}</h3>
                                        <h3>{{ $product->blog->noidung }}</h3>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="pagination">
                                <button id="prev-button">&laquo;</button>
                                <button id="next-button" data-category-id="{{ $categoryNokia->id }}">&raquo;</button>
                            </div>
                        </div>
                    </div>
                    <!-- ///////////////////////// -->
                </div>
                <div class="blogright-column">
                    <div class="blog-main ">
                        <div class="blog-category-main">
                            <span class="blogspan-size ">{{ $categoryOppo->name}} </span>
                        </div>
                        <div id="featured-products">
                            @foreach ($categoryOppo->products->take(5) as $product)
                                <div class="blog-khung" style="padding: 20px;">
                                    <div class="blog-hinh">
                                        <img src="{{ asset('img/' . $product->avt) }}" alt="{{ $product->name }}">
                                    </div>
                                    <div class="blog-noidung">
                                            <h3 class="blog-tieude">{{ $product->name }}</h3>
                                            <h3 class="blog-tieude">{{ $product->blog->noidung }}</h3>
                                            <h3 class="blog-tieude">{{ $product->blog->tieude }}</h3>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="pagination">
                            <button id="prev-button">&laquo;</button>
                            <button id="next-button" data-category-id="{{ $categoryOppo->id }}">&raquo;</button>
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
                    <span class="blogspan-size ">{{ $categoryGoogle->name}} </span>
                </div>
                <div class="featured-review" id="featured-products">
                    @foreach ($categoryGoogle->products->take(1) as $product)
                        <div class="blogleft-review main-article" >
                            <img src="{{ asset('img/' . $product->avt) }}" alt="{{ $product->name }}">
                            <div class="review-content">
                                <h3>{{ $product->name }}</h3>
                                <h3>{{ $product->blog->tieude }}</h3>
                                <h3>{{ $product->blog->noidung }}</h3>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="pagination">
                    <button id="prev-button">&laquo;</button>
                    <button id="next-button" data-category-id="{{ $categoryGoogle->id }}">&raquo;</button>
                </div>
            </div>

            <!-- Column 2 -->
            <div class="cot">
                <div class="blog-category-main">
                    <span class="blogspan-size ">{{ $categoryXiaomi->name}} </span>
                </div>
                <div class="featured-review" id="featured-products">
                    @foreach ($categoryXiaomi->products->take(1) as $product)
                        <div class="blogleft-review main-article" >
                            <img src="{{ asset('img/' . $product->avt) }}" alt="{{ $product->name }}">
                            <div class="review-content">
                                <h3>{{ $product->name }}</h3>
                                <h3>{{ $product->blog->tieude }}</h3>
                                <h3>{{ $product->blog->noidung }}</h3>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="pagination">
                    <button id="prev-button">&laquo;</button>
                    <button id="next-button" data-category-id="{{ $categoryXiaomi->id }}">&raquo;</button>
                </div>
            </div>

            <!-- Column 3 -->
            <div class="cot">
                <div class="blog-category-main">
                    <span class="blogspan-size ">{{ $categorySamsung->name}} </span>
                </div>
                <div class="featured-review" id="featured-products">
                    @foreach ($categorySamsung->products->take(1) as $product)
                        <div class="blogleft-review main-article" >
                            <img src="{{ asset('img/' . $product->avt) }}" alt="{{ $product->name }}">
                            <div class="review-content">
                                <h3>{{ $product->name }}</h3>
                                <h3>{{ $product->blog->tieude }}</h3>
                                <h3>{{ $product->blog->noidung }}</h3>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="pagination">
                    <button id="prev-button">&laquo;</button>
                    <button id="next-button" data-category-id="{{ $categorySamsung->id }}">&raquo;</button>
                </div>
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
<script src="{{ asset('js/giohang.js') }}"></script>

</html>