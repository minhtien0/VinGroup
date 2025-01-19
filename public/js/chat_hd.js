function toggleChat() {
    const chat = document.querySelector('.chat-container');
    if (chat.style.display === 'none' || !chat.style.display) {
      chat.style.display = 'flex';
    } else {
      chat.style.display = 'none';
    }
  }
  
  function sendMessage() {
    const messageInput = document.getElementById('chatMessage');
    const messagesContainer = document.querySelector('.chat-messages');
  
    const messageText = messageInput.value.trim();
    if (messageText !== '') {
      // Tạo một phần tử tin nhắn
      const messageElement = document.createElement('div');
      messageElement.textContent = messageText;
      messageElement.style.marginBottom = '10px';
      messageElement.style.padding = '10px';
      messageElement.style.background = '#007bff';
      messageElement.style.color = '#fff';
      messageElement.style.borderRadius = '8px';
  
      // Thêm tin nhắn vào khung
      messagesContainer.appendChild(messageElement);
  
      // Xóa nội dung input
      messageInput.value = '';
      messagesContainer.scrollTop = messagesContainer.scrollHeight; // Tự động cuộn xuống
    }
  }
  