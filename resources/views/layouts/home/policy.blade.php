@include('layouts.home.header')
<!DOCTYPE html>
<html lang="vi">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chính Sách Bảo Hành</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
        }

        .policy-header {
            text-align: center;
            padding: 20px;
            background-color: #007bff;
            color: white;
        }

        .policy-header h1 {
            margin: 0;
            font-size: 2rem;
        }

        .policy-container {
            max-width: 1200px;
            margin: 20px auto;
            padding: 20px;
            background: #fff;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        .policy-container h2 {
            color: #d9534f;
            border-left: 5px solid #d9534f;
            padding-left: 10px;
        }

        .policy-table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }

        .policy-table th, .policy-table td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }

        .policy-table th {
            background-color: #f2f2f2;
            font-weight: bold;
        }

        .policy-note {
            font-size: 0.9rem;
            color: #555;
            margin: 20px 0;
        }

        .policy-footer {
            background-color: #007bff;
            color: white;
            text-align: center;
            padding: 10px 0;
            margin-top: 20px;
        }

        .policy-footer a {
            color: #fff;
            text-decoration: underline;
        }

        /* Section for brand selection */
        .brand-section {
            margin: 20px auto;
            text-align: center;
        }

        .brand-section h2 {
            font-size: 1.5rem;
            margin-bottom: 10px;
        }

        .brand-grid {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 15px;
        }

        .brand-item {
            width: 100px;
            text-align: center;
        }

        .brand-item img {
            max-width: 70px;
            height: 90px;
        }

        .brand-item p {
            margin: 5px 0;
            font-size: 0.9rem;
        }
    </style>
</head>
<body>
    <div class="policy-header">
        <h1>Chính Sách Bảo Hành</h1>
        <p>Cam kết mang đến trải nghiệm mua sắm an toàn và tiện lợi nhất.</p>
    </div>

    <div class="policy-container">
        <h2>I. Đổi mới 30 ngày miễn phí</h2>
        <table class="policy-table">
            <thead>
                <tr>
                    <th>Loại sản phẩm</th>
                    <th>Đổi mới miễn phí</th>
                    <th>Quy định nhập lại, trả lại</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Máy Mới</td>
                    <td>30 ngày</td>
                    <td>
                        Trong 30 ngày: Nhập lại 90% trên giá mua ban đầu<br>
                        Sau 30 ngày: Thỏa thuận
                    </td>
                </tr>
                <tr>
                    <td>Máy Cũ</td>
                    <td>30 ngày</td>
                    <td>
                        Trong 30 ngày: Nhập lại 50% trên giá mua ban đầu<br>
                        Sau 30 ngày: Thỏa thuận
                    </td>
                </tr>
                <tr>
                    <td>Phụ kiện</td>
                    <td>15 ngày</td>
                    <td>Không áp dụng nhập lại<br>Hỗ trợ đổi mới nếu lỗi nhà sản xuất</td>
                </tr>
            </tbody>
        </table>

        <h2>II. Bảo hành tiêu chuẩn</h2>
        <p>
        <div class="policy-container">
        <h2>   Chính Sách Bảo Hành Cơ Bản</h2>
        <table class="policy-table">
            <thead>
                <tr>
                    <th>Loại Sản Phẩm</th>
                    <th>Thời Gian Bảo Hành</th>
                    <th>Điều Kiện Bảo Hành</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Điện thoại di động</td>
                    <td>12 - 24 tháng</td>
                    <td>Không bị rơi vỡ, không bị ngấm nước, còn tem bảo hành.</td>
                </tr>
                <tr>
                    <td>Điện thoại di động</td>
                    <td>6 - 12 tháng</td>
                    <td>Không bị hỏng hóc do ngoại lực, còn đầy đủ hóa đơn mua hàng.</td>
                </tr>
                <tr>
                    <td>Điện thoại di động</td>
                    <td>3 - 6 tháng</td>
                    <td>Không có dấu hiệu sử dụng sai mục đích, còn trong thời gian bảo hành.</td>
                </tr>
            </tbody>
        </table>
        <div class="policy-note">
            (*) Lỗi phần cứng từ nhà sản xuất sẽ được hỗ trợ bảo hành miễn phí tại trung tâm ủy quyền.
        </div>
        

        <div class="content flex-1 text-sm xl:text-base xl:mt-5" data-v-06b1bc72=""><div data-v-06b1bc72="" data-v-1852dedf=""><p class="ql-align-justify">Vin Group có dịch vụ giao hàng tận nơi trên toàn quốc, áp dụng cho khách mua hàng trên Website, Fanpage và gọi điện thoại vào Hotline của Vin. Đơn hàng sẽ được chuyển phát đến địa chỉ khách hàng cung cấp thông qua đơn vị vận chuyển trung gian là GIAO HÀNG TIẾT KIỆM hoặc 247EXPRESS. Đặc biệt, thông tin hóa đơn dán bên ngoài kiện hàng luôn luôn có logo cô gái của thương hiệu để nhận biết các sản phẩm là chính hãng.</p><p class="ql-align-justify"><br></p><p class="ql-align-justify"><strong>1.&nbsp;Chính sách giá</strong></p><p class="ql-align-justify">a. Giá sản phẩm niêm yết tại Website là giá đã bao gồm thuế theo quy định pháp luật hiện hành, phí đóng gói và các chi phí khác liên quan đến việc mua hàng trừ các chi phí phát sinh khác được xác nhận qua Hotline hoặc Email của Vin và được sự chấp thuận của khách hàng trong quá trình xác nhận đơn đặt hàng, giao nhận hàng hoá.</p><p class="ql-align-justify"><br></p><p class="ql-align-justify"><strong>2.&nbsp;Phí vận chuyển:</strong></p><p class="ql-align-justify">a.&nbsp;Với hóa đơn từ 99.000 VNĐ: miễn phí vận chuyển toàn quốc.</p><p class="ql-align-justify">b.&nbsp;Với hóa đơn dưới 99.000 VNĐ: phí vận chuyển mặc định là 30.000 VNĐ áp dụng toàn quốc.</p><p class="ql-align-justify"><br></p><p class="ql-align-justify"><strong>3.&nbsp;Thời gian giao hàng:</strong></p><p class="ql-align-justify">a.&nbsp;Đơn hàng nội thành TP.HCM: Thời gian giao hàng là 2-3 ngày sau khi đặt hàng.</p><p class="ql-align-justify">b.&nbsp;Đơn hàng ở ngoại thành TP.HCM và các tỉnh thành khác: Thời gian là 2-5 ngày đối với khu vực trung tâm tỉnh thành phố và 5-6 ngày đối với khu vực huyện, xã, thị trấn…</p><p class="ql-align-justify">c.&nbsp;Tuy nhiên, vẫn có những giới hạn và sự chậm trễ do nguyên nhân khách quan như lễ, tết, địa chỉ nhận hàng khó tìm, sự chậm trễ từ dịch vụ chuyển phát,…Vin mong quý khách thông cảm vì những lý do ngoài sự chi phối của chúng tôi.</p><p class="ql-align-justify">d.&nbsp;Trường hợp có sự chậm trễ khi giao hàng xảy ra, Vin sẽ thông báo ngay đến bạn đồng thời sẽ tiếp tục giao hàng hoặc hỗ trợ huỷ đơn hàng nếu bạn muốn. Chúng tôi sẽ không chịu trách nhiệm do việc giao hàng chậm trễ trừ trách nhiệm hoàn trả tiền nếu bạn đã thanh toán mà chưa nhận được sản phẩm.</p><p class="ql-align-justify"><br></p><p class="ql-align-justify"><strong>4.&nbsp;Quy trình giao nhận, đổi trả, bảo hành sản phẩm:</strong></p><p class="ql-align-justify">a.&nbsp;Trong quá trình giao nhận hàng, nếu quý khách không có mặt trong đợt nhận hàng thì đơn vị vận chuyển sẽ liên lạc lại với quý khách để hẹn thời gian giao lại hàng (đối đa 2 lần hẹn). Sau 2 lần hẹn giao lại nhưng vẫn không giao thành công thì đơn vị vận chuyển sẽ hoàn hàng về cho Vin và chúng tôi sẽ hoàn trả các chi phí mà bạn đã thanh toán trong vòng 15 ngày làm việc.</p><p class="ql-align-justify">b.&nbsp;Trường hợp việc giao và nhận hàng không thành công do không thể liên lạc được với quý khách trong vòng 3 ngày, đơn vị vận chuyển sẽ hoàn hàng về lại cho Vin và chúng tôi sẽ thông báo đến bạn qua thông tin liên lạc mà bạn đã cung cấp về việc hủy đơn hàng đồng thời hoàn trả các chi phí mà bạn đã thanh toán trong vòng 15 ngày làm việc.</p><p class="ql-align-justify">c.&nbsp;Khi nhận sản phẩm, quý khách vui lòng kiểm tra kỹ tính nguyên vẹn, số lượng sản phẩm theo đơn đặt hàng trước khi nhận. Việc bạn ký xác nhận hoặc ảnh chụp nhận hàng của bạn do đơn vị vận chuyển thu thập trong quá trình giao nhận là chứng từ xác minh chúng tôi đã hoàn thành nghĩa vụ giao hàng đúng với đơn đặt hàng sau khi được bạn kiểm tra ngoại quan.</p><p class="ql-align-justify">d.&nbsp;Đơn vị vận chuyển có trách nhiệm giao hàng và thu thập các chứng từ trong quá trình giao nhận như chữ ký xác nhận hoặc ảnh chụp nhận hàng của khách hàng và lưu trữ theo quy định của pháp luật. Chúng tôi cam kết dùng mọi biện pháp nhằm bảo mật những chứng từ, hình ảnh chúng tôi thu thập của khách hàng và chỉ sử dụng cho mục đích lưu trữ, giải quyết khiếu nại, hỗ trợ khách hàng hoặc các mục đích được cho là đúng pháp luật và cần thiết mà không sử dụng cho mục đích thương mại hay vụ lợi khác.</p><p class="ql-align-justify">e.&nbsp;Quý khách cần quay lại video mở hàng và kiểm tra chất lượng sản phẩm để làm bằng chứng trong trường hợp muốn liên hệ lại với Vin nhằm đổi, trả, bảo hành sản phẩm hoặc khiếu nại các vấn đề liên quan đến sản phẩm mà bạn đã mua.</p><p class="ql-align-justify">f.&nbsp;Vin chỉ nhận đổi trả, bảo hành sản phẩm khi lỗi đến từ nhà sản xuất hoặc do quá trình vận chuyển. Chúng tôi sẽ liên lạc với bạn để hướng dẫn qui cách đóng gói hàng hoàn trả đồng thời thông báo đơn vị thu hồi và gửi sản phẩm tương đương để bổ sung, thay thế theo chính sách giao hàng quy định như trên tính từ ngày nhận được yêu cầu đổi trả, bảo hành sản phẩm, đồng thời chúng tôi sẽ chi trả chi phí vận chuyển cho việc đổi trả, bảo hành này. Lưu ý, chúng tôi chỉ hỗ trợ đổi trả hàng với điều kiện yêu cầu đổi trả không quá 03 ngày kể từ ngày bạn nhận được hàng. Thời gian xử lý hoàn trả, bảo hành được thực hiện tối đa trong vòng 14 ngày tính từ ngày nhận được yêu cầu của bạn.</p><p class="ql-align-justify">g.&nbsp;Đơn hàng của bạn sẽ được đóng gói theo tiêu chuẩn của Vin. Ngoài tiêu chuẩn gói hàng theo quy định, nếu bạn có nhu cầu đóng gói kiện hàng theo yêu cầu đặc biệt khác, vui lòng liên hệ với chúng tôi và chi trả thêm phí theo thoả thuận.</p><p class="ql-align-justify">h.&nbsp;Quý khách có thể thanh toán khi nhận hàng (COD) hoặc có thể chọn phương thức thanh toán trực tuyến qua cổng thanh toán Alepay hoặc Ví Momo theo hướng dẫn tại Mục “Hướng dẫn mua hàng” được công bố trên website.</p><p class="ql-align-justify">i.&nbsp;Mọi thông tin về việc thay đổi hay hủy bỏ đơn hàng, quý khách cần thông báo sớm để chúng tôi có thể hủy hoặc chỉnhh sửa đơn hàng cho bạn kịp thời.</p><p class="ql-align-justify">j.&nbsp;Để kiểm tra mọi thông tin liên quan đến đơn hàng hoặc tình trạng đơn hàng của quý khách, xin vui lòng nhắn tin vào Fanpage, gửi Email hoặc gọi số Hotline và cung cấp tên, số điện thoại hoặc mã đơn hàng để được chúng tôi kiểm tra và hỗ trợ sớm nhất.</p><p class="ql-align-justify"><br></p><p class="ql-align-justify"><strong>5.&nbsp;Thông tin liên lạc</strong></p><p class="ql-align-justify">Quý khách vui lòng liên hệ với chúng tôi trong trường hợp có thắc mắc, cần sự hỗ trợ và phản hồi qua các kênh sau:</p><p class="ql-align-justify">• Fanpage: https://www.facebook.com/VinVietnamOfficial</p><p class="ql-align-justify">• Hotline: 0909056131 (9:00-18:00 từ thứ 2 đến thứ 6)</p><p class="ql-align-justify">• Email: cskh@Vigroup.com</p></div></div>
        <br>
            <h2>II. Quy chế hoạt động sàn giao dịch thương mại điện tử.</h2>
            <br>
            <div class="content flex-1 text-sm xl:text-base xl:mt-5">
    <div>
        <p class="ql-align-justify"><strong>1. Sàn giao dịch thương mại điện tử là gì?</strong></p>
        <p class="ql-align-justify">Theo khoản 9 Điều 3 Nghị định 52/2013/NĐ-CP, sàn giao dịch thương mại điện tử là website thương mại điện tử cho phép các thương nhân, tổ chức, cá nhân không phải chủ sở hữu website có thể tiến hành một phần hoặc toàn bộ quy trình mua bán hàng hóa, dịch vụ trên đó.</p>
        <p class="ql-align-justify">Sàn giao dịch thương mại điện tử trong Nghị định 52/2013/NĐ-CP không bao gồm các website giao dịch chứng khoán trực tuyến.</p>

        <p class="ql-align-justify"><strong>2. Các hình thức hoạt động sàn giao dịch thương mại điện tử</strong></p>
        <p class="ql-align-justify">Các hình thức hoạt động của sàn giao dịch thương mại điện tử bao gồm:</p>
        <ul class="ql-align-justify">
            <ul>(i) Website cho phép người tham gia được mở các gian hàng để trưng bày, giới thiệu hàng hóa hoặc dịch vụ;</ul>
            <ul>(ii) Website cho phép người tham gia được mở tài khoản để thực hiện quá trình giao kết hợp đồng với khách hàng;</ul>
            <ul>(iii) Website có chuyên mục mua bán, trên đó cho phép người tham gia đăng tin mua bán hàng hóa và dịch vụ;</ul>
            <ul>(iv) Mạng xã hội có một trong các hình thức hoạt động quy định tại điểm (i), (ii), (iii) và người tham gia trực tiếp hoặc gián tiếp trả phí cho việc thực hiện các hoạt động đó.</ul>
        </ul>

        <p class="ql-align-justify">(Khoản 2 Điều 35 Nghị định 52/2013/NĐ-CP, được sửa đổi khoản 15 Điều 1 Nghị định 85/2021/NĐ-CP)</p>

        <p class="ql-align-justify"><strong>3. Quy chế hoạt động sàn giao dịch thương mại điện tử</strong></p>
        <p class="ql-align-justify">Quy chế hoạt động của sàn giao dịch thương mại điện tử phải được thể hiện trên trang chủ của website.</p>
        <p class="ql-align-justify">
            Cụ thể tại khoản 2 Điều 38 Nghị định 52/2013/NĐ-CP (được sửa đổi tại điểm a khoản 17 và bổ sung tại điểm b khoản 17 Điều 1 Nghị định 85/2021/NĐ-CP), quy chế hoạt động sàn giao dịch thương mại điện tử phải bao gồm các nội dung sau:
        </p>
        <ul class="ql-align-justify">
            <ul>Quyền và nghĩa vụ của thương nhân, tổ chức cung cấp dịch vụ sàn giao dịch thương mại điện tử;</ul>
            <ul>Quyền và nghĩa vụ của người sử dụng dịch vụ sàn giao dịch thương mại điện tử;</ul>
            <ul>Mô tả quy trình giao dịch đối với từng hình thức tổ chức hoạt động, bao gồm quy trình giao nhận hàng hóa (nếu có);</ul>
            <ul>Hoạt động rà soát và thẩm quyền xử lý của thương nhân, tổ chức cung cấp dịch vụ sàn giao dịch thương mại điện tử khi phát hiện các hành vi kinh doanh vi phạm pháp luật;</ul>
            <ul>Giới hạn trách nhiệm của thương nhân, tổ chức cung cấp dịch vụ sàn giao dịch thương mại điện tử trong những giao dịch thực hiện trên sàn;</ul>
            <ul>Các quy định về an toàn thông tin, cơ chế kiểm tra, giám sát để đảm bảo việc cung cấp thông tin và quản lý thông tin trên sàn;</ul>
            <ul>Cơ chế giải quyết khiếu nại, tranh chấp giữa các bên liên quan đến giao dịch trên sàn;</ul>
            <ul>Chính sách bảo vệ thông tin cá nhân của người sử dụng dịch vụ;</ul>
            <ul>Biện pháp xử lý các hành vi xâm phạm quyền lợi người tiêu dùng;</ul>
            <ul>Chính sách đổi trả, hoàn tiền và quy trình xử lý tương ứng.</ul>
        </ul>
        <p class="ql-align-justify">Trong trường hợp có thay đổi về một trong các nội dung nêu trên, thương nhân phải thông báo trước 5 ngày trước khi áp dụng.</p>
    </div>
</div>

    </div>
        </p>
        
    </div>
    

    <div class="brand-section">
        <h2>Chọn hãng cần tìm điểm bảo hành</h2>
        <div class="brand-grid">
            <div class="brand-item">
                <img src="data:image/jpeg;base64,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" alt="Apple">
                <p>Apple</p>
            </div>
            <div class="brand-item">
                <img src="data:image/png;base64,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" alt="Samsung">
                <p>Samsung</p>
            </div>
            <div class="brand-item">
                <img src="data:image/png;base64,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" alt="Sony">
                <p>Sony</p>
            </div>
            <div class="brand-item">
                <img src="data:image/jpeg;base64,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" alt="Asus">
                <p>Asus</p>
            </div>
            <div class="brand-item">
                <img src="data:image/png;base64,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    " alt="Dell">
                <p>Dell</p>
            </div>
        </div>
    </div>

    <div class="policy-footer">
        <p>Liên hệ: <a href="mailto:support@example.com">nguyenhuydong789@gmail.com</a> hoặc 0909056131</p>
        <p>&copy; 2025 VinGroup . All rights reserved.</p>
    </div>
</body>
</html>
