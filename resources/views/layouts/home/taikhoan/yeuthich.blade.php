<div class="body__account__right__favourite" id="body__account__right__favourite"
                    style="padding: 15px; background-color: white; width: 1160px; border-radius: 5px">
                    <div class="body__account__right__favourite__top" style="display: flex;">
                        <div style="width: 70%;">
                            <Strong style="font-size: 20px;">Danh Sách Yêu Thích</Strong>
                        </div>
                        <div style="display: flex;">
                            <div style="margin-right: 15px;;">
                                <a href="" style="text-decoration: none">VinGroup</a>
                            </div>
                            <div style="margin-right: 15px;">
                                <a href="" style="text-decoration: none">Lịch sử</a>
                            </div>
                            <div style="margin-right: 15px;">
                                <a href="" style="text-decoration: none;color:gray;">Tìm hiểu</a>
                            </div>
                        </div>
                    </div>
                    <div class="body__account__right__favourite__search" style="margin: 10px 0px 15px 0px;display: flex; height: 100px; background-color: #eff1f4; padding: 20px;justify-content: center;" >
                        <p style="margin-top: 5px; padding-top: 12px;">Tìm Kiếm</p>
                        <div style="margin-left: 10px;padding-top: 12px;"><input type="text" placeholder="Hãy nhập tên sản phẩm..." style="width: 400px;height: 40px;border: solid 1px rgb(231, 227, 227);border-radius: 5px;"></div>
                        <div style="padding-top:12px;"><button style="background-color: #372fc5; color: white; margin-left: 10px; border: none; border-radius: 5px; height: 40px; width: 60px;">Search</button></div>
                    </div>
                    <div class="body__account__right__favourite__top" style="display: flex;">
                    @if(empty($favorite))
                        <p style="margin-top: 5px; padding-top: 12px;">Bạn chưa yêu thích sản phẩm nào.</p>
                    @endif
                    @foreach($favorite as $item)
                        <div class="body__account__right__favourite__top__img">
                            <a href=""><img src="{{ asset('img/' . $item->avt) }}" alt="" width="80px" height="80px"
                                    style="border: solid 1px gray;"></a>
                        </div>
                       
                        <div class="body__account__right__favourite__detail" style="margin-left: 15px;width: 780px;">
                            <div>
                                <span>{{$item->name}}</span>
                            </div>
                            <div>
                                <span style="color: gray; font-size: 12px;">{{$item->time}}</span>
                            </div>
                            <div style="color: rgb(99, 215, 81); border: solid 1px  rgb(99, 215, 81); width: 150px;">
                                <span style="font-size: 13px;">Trả hàng miễn phí 7 ngày</span>
                            </div>

                        </div>
                        <div class="body__account__right__favourite__top__price"
                            style="width: 280px; text-align: center;padding: 40px; ">
                           <button style="color:black;"> <a href="{{ route('home.detail', ['slug' => $item->slug, 'id' => $item->id]) }}" style="text-decoration: none;">Xem Chi Tiết</a></button>
                        </div>
                        @endforeach
                    </div>
                    <hr>
                </div>