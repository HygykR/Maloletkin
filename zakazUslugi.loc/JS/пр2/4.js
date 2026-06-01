let X = 0;
let a = 2;
let b = 3;
let c = 4;

let Y;

if (X < 0) {
    Y = a + b;
} else if (X > 0) {
    Y = c / b;
} else {
    Y = c * (a + 2 * b);
}

console.log("Y = " + Y);