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
                                'Đã Đặt Hàng',
                                'Chờ Thanh Toán',
                                'Đã Thanh Toán',
                                'Đang Đóng Gói',
                                'Đã Đóng Gói',
                                'Đang Giao Hàng',
                                'Chờ Đánh Giá',
                                'Hoàn Thành',
                                'Đã Hủy'
                            ];
                        @endphp

                        @foreach ($states as $index => $state)
                            <div style="text-align: center; width: 20%;">
                                <div>
                                    <label style="width: 100px; height: 100px; border: solid 8px {{ $state == $donhang->trangthaidonhang || array_search($donhang->trangthaidonhang, $states) >= $index ? 'blue' : 'gray' }}; text-align: center; border-radius: 50%; color: {{ $state == $donhang->trangthaidonhang || array_search($donhang->trangthaidonhang, $states) >= $index ? 'blue' : 'gray' }};">
                                        <i class="
                                            @if ($state == 'Đã Đặt Hàng') fa-regular fa-rectangle-list
                                            @elseif ($state == 'Đã Thanh Toán'||$state=='Chờ Thanh Toán') fa-solid fa-money-bill-1
                                            @elseif ($state == 'Đang Giao Hàng'||$state=='Đang Đóng Gói'||$state=='Đã Đóng Gói') fa-solid fa-truck-fast
                                            @elseif ($state == 'Chờ Đánh Giá') fa-solid fa-circle-check
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
        @if($donhang->trangthaidonhang == 'Chờ Đánh Giá')
        <div>
                <button style="background-color: #372fc5; color: white; width: 220px; height: 40px; margin-bottom: 15px; border-radius: 5px;">ĐÁNH GIÁ</button>
            </div>
           
        @elseif($donhang->trangthaidonhang == 'Hoàn Thành')     
        <button style="background-color: transparent; width: 220px; height: 40px; margin-bottom: 15px; border-radius: 5px;" >
                    Mua Lại
        </button>
        @elseif($donhang->trangthaidonhang == 'Đang Giao Hàng')  
        <div>
        <button style="background-color: gray; width: 220px; height: 40px; margin-bottom: 15px; border-radius: 5px;cursor: not-allowed;" onclick="openPopupComfirm()" disabled>
                    Hủy Đơn Hàng
        </button>
        </div>
        @elseif($donhang->trangthaidonhang == 'Đã Hủy')
        
        @else
        <button style="background-color: transparent; width: 220px; height: 40px; margin-bottom: 15px; border-radius: 5px;" onclick="openPopupComfirm()" >
                    Hủy Đơn Hàng
        </button>
        @endif
                                             
            <div>
                <button style="background-color: transparent; width: 220px; height: 40px; margin-bottom: 15px; border-radius: 5px;">LIÊN HỆ SHOP</button>
            </div>
           
            <div> 
           
                
            <!-- Popup -->
            <div id="confirmPopup" class="popup-comfirm" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0,0,0,0.5); z-index: 1000; justify-content: center; align-items: center;">
                <div class="popup-contentcomfirm" style="background: white; padding: 20px; border-radius: 10px; width: 300px; text-align: center;">
                    <p>Bạn có chắc chắn muốn hủy đơn hàng này không?</p>
                    <form action="{{ route('donhang.huydon', ['madon' => $donhang->madon]) }}" method="POST">
                        @csrf
                        <button type="submit" style="background-color: red; color: white; padding: 10px 20px; border: none; border-radius: 5px; margin-right: 10px;">Xác nhận</button>
                        <button type="button" style="background-color: gray; color: white; padding: 10px 20px; border: none; border-radius: 5px;" onclick="closePopupComfirm()">Hủy</button>
                    </form>
                </div>
            </div>
            <script>
                // Hàm mở popup
                function openPopupComfirm() {
                    document.getElementById('confirmPopup').style.display = 'flex';
                }

                // Hàm đóng popup
                function closePopupComfirm() {
                    document.getElementById('confirmPopup').style.display = 'none';
                }
            </script>

            </div>
        </div>
    </div>
</div>
@endsection