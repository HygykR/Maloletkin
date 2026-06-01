function randomIntArray(length, min, max) {
    let arr = [];
    for (let i = 0; i < length; i++) {
        let randomNum = Math.floor(Math.random() * (max - min + 1)) + min;
        arr.push(randomNum);
    }
    return arr;
}

function bubbleSort(array) {
    let sortedArray = array.slice(); 
    let n = sortedArray.length;
    
    for (let i = 0; i < n - 1; i++) {
        for (let j = 0; j < n - i - 1; j++) {
            if (sortedArray[j] > sortedArray[j + 1]) {
                let temp = sortedArray[j];
                sortedArray[j] = sortedArray[j + 1];
                sortedArray[j + 1] = temp;
            }
        }
    }
    return sortedArray;
}

let length = Math.floor(Math.random() * (20 - 10 + 1)) + 10;
let minValue = 0;
let maxValue = 100;

let myArray = randomIntArray(length, minValue, maxValue);

console.log("Исходный массив:", myArray);

let sortedArray = bubbleSort(myArray);

console.log("Отсортированный массив:", sortedArray);
