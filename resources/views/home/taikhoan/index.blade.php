@extends('layouts.home.app')
@section('content')
<div class="body__account" style="margin-top: 15px; display: flex;">
            <div class="body__account__left" style="width: 180px; background-color: white; padding: 10px;">
                <div class="body__account__left__top" style="display: flex;">
                    <div><a href="">
                            <div class="body__account__left__top__img" style="background-image: url('{{ asset('img/' . $user->avt) }}');">
                            </div>
                        </a></div>
                    <div>
                        <strong>{{ $user->name }}</strong>
                        <span><a href="" style="text-decoration: none; color: gray; font-size: 15px;"><i
                                    class="fa-solid fa-pen"></i> Sửa hồ sơ</a></span>
                    </div>
                </div>
                <hr>
                <div class="body__account__left__bot">
                    <div style="margin-bottom: 10px;">
                        <a href="{{ route('account.donhang') }}" style="text-decoration: none ;color: aquamarine;">
                            <span><i class="fa-regular fa-rectangle-list"></i></span>
                            <span style="color: black;">Đơn Hàng</span>
                        </a>
                    </div>
                    <div style="margin-bottom: 10px;">
                    <a href="{{ route('account.thongtin')}}" style="text-decoration: none;">
                            <span><i class="fa-solid fa-user-shield"></i></span>
                            <span style="color: black;">Tài Khoản Của Tôi</span>
                        </a>
                    </div>
                    <div style="margin-bottom: 10px;">
                        <a href="{{ route('account.voucher') }}" style="text-decoration: none ; color: orange;">
                            <span><i class="fa-solid fa-ticket"></i></span>
                            <span style="color: black;">Voucher</span>
                        </a>
                    </div>
                    <div style="margin-bottom: 10px;">
                        <a href="{{ route('account.yeuthich') }}" style="text-decoration: none ; color: orange;">
                            <span><i class="fa-solid fa-heart" style="color: #74C0FC;"></i></span>
                            <span style="color: black;">DS Yêu Thích</span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="body__account__right" id="body__account__right" style="width: 1160px;   margin-left: 10px;">
            @if(Request::is('account') || Request::is('account/donhang'))
                    @include('layouts.home.taikhoan.donhang')
                 @elseif(Request::is('account/voucher'))
                     @include('layouts.home.taikhoan.voucher')
                    @elseif(Request::is('account/thongtin'))
                        @include('layouts.home.taikhoan.thongtin')
                    @elseif(Request::is('account/yeuthich'))
                        @include('layouts.home.taikhoan.yeuthich')
            @endif
            @yield('trangthai')
            </div>

</div>
@endsection