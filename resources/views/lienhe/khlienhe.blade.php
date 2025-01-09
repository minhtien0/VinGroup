<!-- Popup Trò Chuyện -->
<div class="popup-overlay" id="chatPopup">
    <div class="chat-popup-content">
        <span class="close-btn" onclick="closePopup('chatPopup')">&times;</span>
        <div class="chat-header">
            <img src="https://example.com/icon.png" class="chat-icon">
            <span>liên hệ</span>
        </div>
        <div class="chat-body">
            <div class="message assistant">
                <p>Xin chào! Mình là trợ lý AI của bạn. Mình sẵn sàng hỗ trợ bạn. ^^</p>
            </div>
            <div class="message user">
                <p>Thực phẩm chức năng nào hỗ trợ giảm cân?</p>
            </div>
            <!-- Các tin nhắn tiếp theo sẽ hiển thị tại đây -->
        </div>
        <div class="chat-footer">
            <input type="text" placeholder="Nhập nội dung chat" id="chatInput">
            <button onclick="sendMessage()">Gửi</button>
        </div>
    </div>
</div>