const articles = document.querySelector('.articles')

const card = document.createElement('li')

const header = document.createElement('h2')
header.textContent = 'Статья о JS'
card.appendChild(header)

const img = document.createElement('img')
img.src = 'JS.png'
img.alt = 'Хороший язык программирования'
img.width = 150
card.appendChild(img)

const text = document.createElement('p')
text.textContent = 'То с плюсом сложит он успех, То вызовет нежданный Ошибку в коде. Тут как тут Свои приводит типы. «Зачем? Зачем?» — мы все поймем, Когда прочтем асинхрон. Он в браузере живет,Стучит по клавишам умело. «Hello, World!» он подает, Чтоб в веб влюбиться смело.'
card.appendChild(header)

card.appendChild(text)
articles.appendChild(card)



const card1 = document.createElement('li')

const header1 = document.createElement('h2')
header1.textContent = 'Статья о HTML'
card1.appendChild(header1)

const img1 = document.createElement('img')
img1.src = 'HTML.png'
img1.alt = 'Язык разметки'
img1.width = 275
card1.append(img1)

const text1 = document.createElement('p')
text1.textContent = 'HTML — это основа любого сайта. Он создает структуру страницы: заголовки, абзацы, изображения и ссылки. Без него интернет был бы просто набором текста. Изучение HTML — первый шаг к созданию собственного веб-сайта!'
card1.appendChild(text1)

articles.appendChild(card1)