const template = document.querySelector('#template')
const content = template.content
const cards = document.querySelector('.cards')

const card = content.cloneNode(true)
card.querySelector('h2').textContent = 'Статья о рыбах'
card.querySelector('img').src = 'image1.jpg'
card.querySelector('p').textContent = 'Содержание статьи о рыбах'
card.querySelector('p').addEventListener('click', function(){
    card.remove()
})
cards.appendChild(card)
