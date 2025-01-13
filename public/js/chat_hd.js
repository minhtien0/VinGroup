// Mở/Đóng Chat
function toggleChat() {
    const chatBody = document.getElementById('chat-body');
    chatBody.classList.toggle('hidden');
}

// Gửi Tin Nhắn
function sendMessage() {
    const input = document.getElementById('chat-input');
    const message = input.value.trim();
    const chatMessages = document.getElementById('chat-messages');

    if (message) {
        // Hiển thị tin nhắn người dùng
        const userMessage = document.createElement('div');
        userMessage.classList.add('message', 'user-message');
        userMessage.innerText = message;
        chatMessages.appendChild(userMessage);

        // Cuộn xuống tin nhắn mới
        chatMessages.scrollTop = chatMessages.scrollHeight;

        // Xử lý gửi tin nhắn lên server
        sendMessageToServer(message);

        // Xóa nội dung input
        input.value = '';
    }
}

// Gửi tin nhắn tới server qua Ajax
async function sendMessageToServer(message) {
    try {
        const response = await fetch('/chat/send', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            },
            body: JSON.stringify({ message: message }),
        });

        if (response.ok) {
            const data = await response.json();

            // Hiển thị tin nhắn từ Admin
            if (data.reply) {
                const chatMessages = document.getElementById('chat-messages');
                const adminMessage = document.createElement('div');
                adminMessage.classList.add('message', 'admin-message');
                adminMessage.innerText = data.reply;
                chatMessages.appendChild(adminMessage);

                // Cuộn xuống tin nhắn mới
                chatMessages.scrollTop = chatMessages.scrollHeight;
            }
        }
    } catch (error) {
        console.error('Lỗi khi gửi tin nhắn:', error);
    }
}
