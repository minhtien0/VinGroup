
    async function sendMessage() {
        const chatBody = document.querySelector('.chat-body');
        const input = document.getElementById('chatInput');
        const message = input.value.trim();
        
        if (message) {
            // Hiển thị tin nhắn người dùng
            const userMessage = document.createElement('div');
            userMessage.className = 'message user';
            userMessage.innerHTML = `<p>${message}</p>`;
            chatBody.appendChild(userMessage);
            chatBody.scrollTop = chatBody.scrollHeight;
            input.value = '';

            // Gửi tin nhắn đến Laravel server để gọi API ChatGPT
            try {
                const response = await fetch('/api/chat', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}' // Thêm CSRF token nếu cần
                    },
                    body: JSON.stringify({ message })
                });

                if (response.ok) {
                    const data = await response.json();
                    const assistantMessage = document.createElement('div');
                    assistantMessage.className = 'message assistant';
                    assistantMessage.innerHTML = `<p>${data.content}</p>`;
                    chatBody.appendChild(assistantMessage);
                    chatBody.scrollTop = chatBody.scrollHeight;
                } else {
                    console.error('Lỗi khi kết nối với ChatGPT');
                }
            } catch (error) {
                console.error('Lỗi:', error);
            }
        }
    }

