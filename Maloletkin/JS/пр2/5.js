let a = 1;
let b = 10;

if (a > b) {
    let temp = a;
    a = b;
    b = temp;
}

let sum = 0;
for (let i = a; i <= b; i++) {
    sum = sum + i;
}

console.log("Сумма = " + sum);