/* function showPopup(popupId) {
    document.getElementById(popupId).style.display = 'flex';
} */
function showPopup() {
    var popup = document.getElementById('chatPopup');
    popup.style.display = "flex";  // Hiển thị popup
}
function closePopup(popupId) {
    document.getElementById(popupId).style.display = 'none';
}

// Xử lý gửi tin nhắn
function sendMessage() {
    const chatBody = document.querySelector('.chat-body');
    const input = document.getElementById('chatInput');
    const message = input.value.trim();
    
    if (message) {
        const userMessage = document.createElement('div');
        userMessage.className = 'message user';
        userMessage.innerHTML = `<p>${message}</p>`;
        chatBody.appendChild(userMessage);

        // Cuộn xuống tin nhắn cuối
        chatBody.scrollTop = chatBody.scrollHeight;

        // Xóa nội dung input
        input.value = '';
        
        // Thêm tin nhắn trả lời giả lập
        setTimeout(() => {
            const assistantMessage = document.createElement('div');
            assistantMessage.className = 'message assistant';
            assistantMessage.innerHTML = `<p>Thông tin của bạn đã được gửi đi.</p>`;
            chatBody.appendChild(assistantMessage);

            // Cuộn xuống tin nhắn cuối
            chatBody.scrollTop = chatBody.scrollHeight;
        }, 1000);
    }
}
