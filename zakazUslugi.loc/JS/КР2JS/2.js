//Кондитерская фабрика выпускает конфеты. Конфеты могут продаваться на развес или упаковками, 
//поэтому каждые конфеты имеют две цены - за кг и за упаковку.
//Создайте массив из объектов, в которых хранится следующая информация:
//наименование, артикул(уникальное целое число), цена за килограмм, вес в упаковке, цена за упаковку
//Вывести в консоль информацию о тех конфетах, которые имеют цену за кг от 300 до 500р.  
//Напишите функцию getArrayCandy(arr, minPrice, maxPrice), принимающую параметром массив, 
//минимальную и максимальную цену,возращающую новый массив объектов. Новый массив содержит
//объекты с такими свойствами: наименование, вес в упаковке, цена за упаковку, 
//увеличение цены упакованных конфет. (Упакованные конфеты
//обычно стоят дороже, чем конфеты на развес. Посчитайте увеличение цены у упакованных
//конфет в процентах от развесных(проценты округлить до десятых).)
//Используя эту функцию выведите требуемую информацию. 
//Входной и выходной массивы создайте по образцу.
/* пример входного массива
let arr = [{
  title: 'Мишка',
  art: 10002512,
  price: 350,
  weight: 500,
  priceForPack: 190,
  }
]
Результ работы функции - массив объектов с такими полями (образец)
{
  title: 'Мишка',
  weight: 500,
  priceForPack: 190,
  priceInc: 8.6 
 }
*/

let candies = [
    {
        title: 'Мишка',
        art: 10002512,
        price: 350,
        weight: 500,
        priceForPack: 190,
    },
    {
        title: 'Белка',
        art: 10002513,
        price: 280,
        weight: 400,
        priceForPack: 120,
    },
    {
        title: 'Красная шапочка',
        art: 10002514,
        price: 450,
        weight: 600,
        priceForPack: 290,
    },
    {
        title: 'Мармелад',
        art: 10002515,
        price: 520,
        weight: 300,
        priceForPack: 170,
    },
    {
        title: 'Птичье молоко',
        art: 10002516,
        price: 380,
        weight: 350,
        priceForPack: 145,
    }
];

function getArrayCandy(arr, minPrice, maxPrice) {
    const filteredCandies = arr.filter(candy => 
        candy.price >= minPrice && candy.price <= maxPrice
    );

    const result = filteredCandies.map(candy => {
        const pricePerGram = candy.price / 1000;
        const calculatedPackPrice = pricePerGram * candy.weight;
        const priceInc = ((candy.priceForPack - calculatedPackPrice) / calculatedPackPrice * 100).toFixed(1);
        
        return {
            title: candy.title,
            weight: candy.weight,
            priceForPack: candy.priceForPack,
            priceInc: parseFloat(priceInc)
        };
    });
    
    return result;
}

console.log('Конфеты с ценой за кг от 300 до 500р:');
const resultCandies = getArrayCandy(candies, 300, 500);
console.log(resultCandies);