let liquids = ['вода', 'молоко', 'сок', 'чай', 'йогурт'];
let fruits = ['киви', 'банан', 'персик', 'манго', 'груша', 'ананас'];
let greens = ['мята', 'шпинат', 'руккола', 'петрушка', 'базилик'];

let chosenLiquid = 1;
let chosenFruit = 3;
let chosenGreen = 2;

let order = 'Основа — ' + liquids[chosenLiquid - 1] + ', фрукт — ' + fruits[chosenFruit - 1] + ', зелень — ' + greens[chosenGreen - 1];

console.log(order)