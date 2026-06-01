/*

Нужно запрограммировать мессенджер. Как должна работать программа:

— Шаблон сообщения находится в теге template с идентификатором message-template.

— В блоке сообщения (класс chat-message) должен быть текст сообщения, кнопка удаления и имя пользователя.

— Новое сообщение добавляется в конец контейнера с классом chat-content.

— Чтобы добавить новое сообщение, нужно ввести текст в поле ввода (элемент с классом chat-form-input) и нажать кнопку «Отправить» (отправляет данные из формы с классом chat-form).

- Чтобы удалить сообщение, нужно кликнуть по кнопке с крестиком (элемент с классом chat-message-button). Эта кнопка появляется при наведении на сообщение.


*/

const chatContent = document.querySelector('.chat-content')
const chatForm = document.querySelector('.chat-form')
const chatInput = document.querySelector('.chat-form-input')
const messageTemplate = document.querySelector('#message-template')

function addMessage(text) {
  const newMessage = messageTemplate.content.cloneNode(true)
  const messageText = newMessage.querySelector('.chat-message-text')
  const deleteButton = newMessage.querySelector('.chat-message-button')
  
  messageText.textContent = text;
  
  deleteButton.addEventListener('click', function() {
    const messageBlock = this.closest('.chat-message')
    messageBlock.remove()
  })
  
  chatContent.appendChild(newMessage)
  chatContent.scrollTop = chatContent.scrollHeight
}

chatForm.addEventListener('submit', function(event) {
  event.preventDefault()
  const messageText = chatInput.value.trim()
  
  if (messageText !== '') {
    addMessage(messageText)
    chatInput.value = ''
  }
})