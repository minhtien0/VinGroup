@extends('home.taikhoan.index')
@section('trangthai')
<div class="body__account__right__detailtrangthai" style="background-color: white;">
    <div class="body__account__right__detailtrangthai__top" style="display: flex; padding: 10px 10px 0px 20px;">
        <div>
            <a href="javascript:history.back()" style="color: gray; text-decoration: none;">
                <span><i class="fa-solid fa-angle-left"></i></span>
                <span>BACK</span>
            </a>
        </div>
        <div style="margin-left: auto; text-align: right;">
            <span>Mã Đơn Hàng: {{ $donhang->madon }}</span>
            <span style="margin: 0px 15px 0px 15px;">|</span>
            <span style="color: blue;">
                {{ $donhang->trangthaidonhang }}
            </span>
        </div>
    </div>
    <hr>
    <div class="body__account__right__detailtrangthai__mid" style="margin-top: 50px; display: flex;">
                        @php
                            $states = [
                                'Đơn Hàng Đã Đặt',
                                'Đã Thanh Toán',
                                'Đang Vận Chuyển',
                                'Đã Nhận Hàng',
                                'Hoàn Thành',
                                'Đã Hủy'
                            ];
                        @endphp

                        @foreach ($states as $index => $state)
                            <div style="text-align: center; width: 20%;">
                                <div>
                                    <label style="width: 100px; height: 100px; border: solid 8px {{ $state == $donhang->trangthaidonhang || array_search($donhang->trangthaidonhang, $states) >= $index ? 'blue' : 'gray' }}; text-align: center; border-radius: 50%; color: {{ $state == $donhang->trangthaidonhang || array_search($donhang->trangthaidonhang, $states) >= $index ? 'blue' : 'gray' }};">
                                        <i class="
                                            @if ($state == 'Đơn Hàng Đã Đặt') fa-regular fa-rectangle-list
                                            @elseif ($state == 'Đã Thanh Toán') fa-solid fa-money-bill-1
                                            @elseif ($state == 'Đang Vận Chuyển') fa-solid fa-truck-fast
                                            @elseif ($state == 'Đã Nhận Hàng') fa-solid fa-circle-check
                                            @elseif ($state == 'Hoàn Thành') fa-solid fa-star
                                            @elseif ($state == 'Đã Hủy') fa-solid fa-ban
                                            @endif
                                        " style="padding-top: 20px; font-size: 50px;"></i>
                                    </label>
                                </div>
                                <div>
                                    <p style="margin: 0%;">{{ $state }}</p>
                                    <p style="color: gray;">{{ $donhang->time }}</p>
                                </div>
                            </div>
                        @endforeach
    </div>
    <hr>
    <div class="body__account__right__detailtrangthai__bot" style="display: flex; padding: 0px 20px 0px 20px;">
        <div class="">
            <h3 style="font-size: 20px;">Địa Chỉ Nhận Hàng</h3>
            <p style="margin: 0%;">{{$user->name}}</p>
            <p style="margin: 0%; color: gray;">{{$user->sdt}}</p>
            <p style="margin: 0%; color: gray;">{{$user->address}}</p>
        </div>
        <div class="" style="margin-left: 55%;">
            <div>
                <button style="background-color: #372fc5; color: white; width: 220px; height: 40px; margin-bottom: 15px; border-radius: 5px;">ĐÁNH GIÁ</button>
            </div>
            <div>
                <button style="background-color: transparent; width: 220px; height: 40px; margin-bottom: 15px; border-radius: 5px;">LIÊN HỆ SHOP</button>
            </div>
            <div> 
                <button style="background-color: transparent; width: 220px; height: 40px; margin-bottom: 15px; border-radius: 5px;">MUA LẠI</button>
            </div>
        </div>
    </div>
</div>
@endsection