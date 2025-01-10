<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tiki Clone Header</title>
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <!-- ------------- -->
  <link rel="stylesheet" href="{{asset('css/dangnhap.css')}}">
  <link rel="stylesheet" href="{{asset('css/dangky.css')}}">
  <!-- <link rel="stylesheet" href="{{asset('css/popup.css')}}"> -->
  <link rel="stylesheet" href="{{asset('css/lienhe.css')}}">
  <link rel="stylesheet" href="{{asset('css/headerr.css')}}">
  <script src="{{ asset('js/carousel.js') }}"></script>
  <script src="{{ asset('js/headerr.js') }}"></script>
  <script src="{{ asset('js/search.js') }}"></script>

</head>
<!-- Header -->
<header class="header">
  <div class="header-container">
    <!-- Logo -->
    <a href="{{ route('home.index') }}">
      <div class="logo">
        <img style="padding: 5px 10px 0px 30px;height: 94px; width: 250px;" src="{{ asset('images/logo.png') }}"
          alt="Logo">
      </div>
    </a>
    <!-- Search bar -->
    <div class="search-bar">
      <input type="text" id="search-input" placeholder="Giá siêu rẻ">
      <button id="search-btn">Tìm kiếm</button>
      <div class="header-icons">
        <a href="{{ route('home.index') }}"><i class="fas fa-home"></i> Trang chủ</a>

        @if (session()->has('user') && session('user')->name === 'Admin')
      <a href="{{ route('admin.dashboard') }}">
        <i class="fas fa-user-cog"></i> Admin
      </a>
    @else
    <a href="{{ route('home.index') }}">
      <i class="fas fa-user-cog"></i> Admin
    </a>
  @endif

        <div class="button-lienhe">
          @if (session()->has('user'))
        <div class="dropdown">
        <a class="dropdown-toggle" id="userDropdown" onclick="toggleDropdown()">
          <i class="fas fa-user"></i> {{ session('user')->name }}
        </a>
        <div id="dropdownMenu" class="dropdown-menu">
          <a href="#">Thông tin tài khoản</a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: inline;">
          @csrf
          <button type="submit"
            style="background: none; border: none; color: blue; cursor: pointer; text-decoration: underline;">
            Đăng xuất
          </button>
          </form>
        </div>
        </div>
      @else
      <a onclick="showPopuplogin('loginPopup')">
      <i class="fas fa-user"></i> Tài khoản
      </a>
    @endif
        </div>
        <a href="{{route('giohang.giohang')}}"><i class="fas fa-shopping-cart"></i> <span
            class="cart-count">0</span></a>
      </div>
      <div id="search-results" class="search-results"></div>

    </div>
  </div>
  <!-- Navigation links -->
  <div>
    <div class="nav-links">
      <div style="color:#003EA1; margin-top:6px "
        class="UniversalFreeShipPlus__UniversalFreeShipPlusContentStyled-sc-3h4via-2 BHgRB">Cam kết</div>
      <div class="feature-item">
        <img src="https://salt.tikicdn.com/ts/upload/96/76/a3/16324a16c76ee4f507d5777608dab831.png" alt="100% hàng thật"
          width="20" height="20">
        <div href="" class="feature-text">100% hàng thật</div>
      </div>
      <div class="divider"></div>
      <div class="feature-item">
        <img src="https://salt.tikicdn.com/ts/upload/11/09/ec/456a2a8c308c2de089a34bbfef1c757b.png"
          alt="Freeship mọi đơn" width="20" height="20">
        <div class="feature-text">Freeship mọi đơn</div>
      </div>
      <div class="divider"></div>
      <div class="feature-item">
        <img src="https://salt.tikicdn.com/ts/upload/0b/f2/19/c03ae8f46956eca66845fb9aaadeca1e.png"
          alt="Hoàn 200% nếu hàng giả" width="20" height="20">
        <div class="feature-text">Hoàn 200% nếu hàng giả</div>
      </div>
      <div class="divider"></div>
      <div class="feature-item">
        <img src="https://salt.tikicdn.com/ts/upload/3a/f4/7d/86ca29927e9b360dcec43dccb85d2061.png"
          alt="30 ngày đổi trả" width="20" height="20">
        <div class="feature-text">30 ngày đổi trả</div>
      </div>
      <div class="divider"></div>
      <div class="feature-item">
        <img src="https://salt.tikicdn.com/ts/upload/87/98/77/fc33e3d472fc4ce4bae8c835784b707a.png" alt="Giao nhanh 2h"
          width="20" height="20">
        <div class="feature-text">Giao nhanh 2h</div>
      </div>
      <div class="divider"></div>
      <div class="feature-item">
        <img src="https://salt.tikicdn.com/ts/upload/6a/81/06/0675ef5512c275a594d5ec1d58c37861.png" alt="Giá siêu rẻ"
          width="20" height="20">
        <div class="feature-text">Giá siêu rẻ</div>
      </div>
      <div style="display: flex; gap: 4px; padding-inline: 6px; align-items: center;">
        <picture class="webpimg-container">
          <source type="image/webp"
            srcset="https://salt.tikicdn.com/ts/upload/11/09/ec/456a2a8c308c2de089a34bbfef1c757b.png"><img
            class="WebpImg__StyledImg-sc-h3ozu8-0 fWjUGo title-img-1"
            src="https://salt.tikicdn.com/ts/upload/11/09/ec/456a2a8c308c2de089a34bbfef1c757b.png" alt="icon-1"
            width="20" height="20"
            srcset="https://salt.tikicdn.com/ts/upload/11/09/ec/456a2a8c308c2de089a34bbfef1c757b.png">
        </picture>
        <div style="color: rgb(39, 39, 42); font-size: 12px; font-weight: 500; white-space: nowrap;">Freeship mọi đơn
        </div>
      </div>

      <div class="local">
        <div class="location-info">
          <i class="fas fa-map-marker-alt"></i>
          <span>Giao đến: <a href="#">Q. 1, P. Bến Nghé, Hồ Chí Minh</a></span>
        </div>
      </div>
    </div>
  </div>
  @include('dangnhap.Login')
  @include('lienhe.khlienhe')
  @include('dangnhap.dangky', ['random' => $random ?? '...'])

  <!-- @yield('content') -->
</header>
</header>