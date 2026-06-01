const readline = require('readline');
const rl = readline.createInterface({
    input: process.stdin,
    output: process.stdout
});

rl.question('Введите номер дня недели (от 1 до 5): ', (answer) => {
    const dayNumber = parseInt(answer);
    
    if (dayNumber >= 1 && dayNumber <= 7) {
        let lessons;
        
        switch (dayNumber) {
            case 1:
                lessons = 7;
                break;
            case 2:
                lessons = 8;
                break;
            case 3:
                lessons = 5;
                break;
            case 4:
                lessons = 8;
                break;
            case 5:
                lessons = 8;
                break;
        }
        
        console.log(`Количество уроков: ${lessons}`);
    } else {
        console.log("Ошибка, введите число от 1 до 5.");
    }
    rl.close();
});