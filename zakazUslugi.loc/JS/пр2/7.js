let a = 12;
let b = 18;
let max = a > b ? a : b;

while (true) {
    if (max % a === 0 && max % b === 0) {
        console.log("НОК = " + max);
        break;
    }
    max++;
}