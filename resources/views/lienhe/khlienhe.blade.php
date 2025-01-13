<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Liên hệ</title>
    <link rel="stylesheet" href="{{ asset('css/lienhe.css') }}">
</head>

<body>
    <!-- Header -->


    <main>
        <section class="contact-container">
            <h1>Liên hệ</h1>
            <div class="contact-form">
                <form action="{{ route('lienhe.khlienhe') }}" method="POST">
                    @csrf
                    <label for="name">Họ và tên:</label>
                    <input type="text" id="name" name="name" value="{{ $user->name ?? '' }}"
                        placeholder="Nhập họ và tên" required>
                    <label for="sdt">Số điện thoại:</label>
                    <input type="text" id="sdt" name="sdt" value="{{ $user->sdt ?? '' }}"
                            placeholder="Nhập số điện thoại" required>
                    <label for="gmail">Email:</label>
                    <input type="email" id="gmail" name="gmail" value="{{ $user->gmail ?? '' }}"
                                placeholder="Nhập email" required>
                    <label for="message">Nội dung:</label>
                    <textarea id="message" name="message" rows="5" required
                                placeholder="Nhập nội dung"></textarea>
                    <button type="submit">Gửi</button>
                </form>
            </div>
        </section>
    </main>


</body>

</html>