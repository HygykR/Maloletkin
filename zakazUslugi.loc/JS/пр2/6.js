let wordsPerDay = 5;
let days = 1;
let totalWords = 5;

while (totalWords < 250) {
    days++;
    wordsPerDay += 2;
    totalWords += wordsPerDay;
}

console.log("Нужно дней: " + days);
console.log("В последний день выучил: " + wordsPerDay + " слов");
console.log("Всего выучил: " + totalWords + " слов");