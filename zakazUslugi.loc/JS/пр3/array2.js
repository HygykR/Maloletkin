let groceries = ['чай', 'шпроты', 'печенье', 'сахар', 'чипсы'];
let shoppingList = groceries[0];

for (let i = 1; i < groceries.length; i++) {
    shoppingList = shoppingList + ', ' + groceries[i];
}

console.log(shoppingList)