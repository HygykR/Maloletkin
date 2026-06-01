var cardsData = [
  {
    inStock: true,
    imgUrl: 'gllacy/choco.jpg',
    text: 'Сливочно-кофейное с кусочками шоколада',
    price: 310,
    isHit: true,
    specialOffer: 'Двойная порция сиропа бесплатно!'
  },
  {
    inStock: false,
    imgUrl: 'gllacy/lemon.jpg',
    text: 'Сливочно-лимонное с карамельной присыпкой',
    price: 125,
    isHit: false
  },
  {
    inStock: true,
    imgUrl: 'gllacy/cowberry.jpg',
    text: 'Сливочное с брусничным джемом',
    price: 170,
    isHit: false
  },
  {
    inStock: true,
    imgUrl: 'gllacy/cookie.jpg',
    text: 'Сливочное с кусочками печенья',
    price: 250,
    isHit: false
  },
  {
    inStock: true,
    imgUrl: 'gllacy/creme-brulee.jpg',
    text: 'Сливочное крем-брюле',
    price: 190,
    isHit: false
  }
];


function renderCards(data) {
  const goodsList = document.querySelector('.goods');
  goodsList.innerHTML = '';
  
  for (let i = 0; i < data.length; i++) {
    const card = data[i];
    
    const good = document.createElement('li');
    good.className = 'good';
    
    if (card.inStock) {
      good.classList.add('good--available');
    } else {
      good.classList.add('good--unavailable');
    }
    
    if (card.isHit) {
      good.classList.add('good--hit');
    }
    
    const title = document.createElement('h2');
    title.className = 'good__description';
    title.textContent = card.text;
    
    const image = document.createElement('img');
    image.className = 'good__image';
    image.src = card.imgUrl;
    image.alt = card.text;
    
    const price = document.createElement('p');
    price.className = 'good__price';
    price.textContent = card.price + '₽/кг';
    
    good.appendChild(image);
    good.appendChild(title);
    good.appendChild(price);
    
    if (card.isHit && card.specialOffer) {
      const offer = document.createElement('p');
      offer.className = 'good__special-offer';
      offer.textContent = card.specialOffer;
      good.appendChild(offer);
    }
    
    goodsList.appendChild(good);
  }
}

renderCards(cardsData);

/* Техническое задание

Мяу! Помнишь магазин мороженого? Нужно создать карточки товаров, основываясь на данных, полученных с сервера.

Данные — массив объектов cardsData, один элемент соответствует одному товару. У каждого объекта есть следующие свойства:

- inStock — доступность товара. Если значение true — товар доступен (для такого продукта верстальщик подготовил класс good--available), если false — продукта нет в наличии (товар с классом good--unavailable).
- imgUrl — ссылка на изображение товара.
- text — название продукта.
- price — цена.
- isHit — является ли товар хитом продаж. Если значение true — продукт «хитовый». Для такого товара подготовлен класс good--hit.
- specialOffer — специальное предложение, которое есть только у хита продаж. Должно находиться в абзаце с классом good__special-offer и быть самым последним дочерним элементом в карточке.

Вот пример вёрстки одной карточки в каталоге:

<ul class="goods">
  <li class="good">
    <h2 class="good__description">Сливочно-кофейное с кусочками шоколада</h2>
    <img class="good__image" src="gllacy/choco.jpg" alt="Сливочно-кофейное с кусочками шоколада">
    <p class="good__price">110₽/кг</p>
  </li>
  ...
</ul>

Обрати внимание, что текст в атрибуте alt у изображения должен быть таким же, как и название товара.

Создай функцию renderCards, которая будет принимать на вход массив данных, вызови её, передав cardsData, и отрисуй на странице карточки мороженого.

*/