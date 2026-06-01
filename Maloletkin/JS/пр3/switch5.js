const readline = require('readline');
const rl = readline.createInterface({
    input: process.stdin,
    output: process.stdout
});

rl.question('Введите натуральное число: ', (input) =>  {
    const num = parseInt(input)
    if (num > 0){
        console.log(`Количество цифр: ${String(num).length}`)
    }else{
        console.log("Введите натуральное число!")
    }
    rl.close
})