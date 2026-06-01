const readline = require('readline');
const rl = readline.createInterface({
    input: process.stdin,
    output: process.stdout
});

rl.question('Введите последнюю цифру числа (от 0 до 9): ', (answer) => {
    const lastDigit = parseInt(answer);
    
    if (lastDigit >= 0 && lastDigit <= 9) {
        let squareLastDigit;
        
        switch (lastDigit) {
            case 0:
            case 1:
            case 5:
            case 6:
                squareLastDigit = lastDigit;
                break;
            case 2:
            case 8:
                squareLastDigit = 4;
                break;
            case 3:
            case 7:
                squareLastDigit = 9;
                break;
            case 4:
                squareLastDigit = 6;
                break;
            case 9:
                squareLastDigit = 1;
                break;
        }
        
        console.log(`Последняя цифра числа: ${lastDigit}`);
        console.log(`Последняя цифра квадрата числа: ${squareLastDigit}`);
    } else {
        console.log("Ошибка! Введите цифру от 0 до 9.");
    }
    
    rl.close();
});