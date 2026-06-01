function randomIntArray(minLength, maxLength, minValue, maxValue) {
    const length = Math.floor(Math.random() * (maxLength - minLength + 1)) + minLength
    const array = []
    
    for (let i = 0; i < length; i++) {
        const value = Math.floor(Math.random() * (maxValue - minValue + 1)) + minValue
        array.push(value)
    }
    
    return array
}

console.log("Задание 2")
const array1 = randomIntArray(20, 50, 1, 500)

const firstTen = array1.slice(0, 10).join(' ')
const lastElement = array1[array1.length - 1]

console.log(`${firstTen} ...${lastElement}`)
console.log(array1.length)

console.log("Задание 3")
const array2 = randomIntArray(15, 30, 10, 100)
const everySecondElement = []

for (let i = 0; i < array2.length; i += 2) {
    everySecondElement.push(array2[i])
}

console.log("Исходный массив:", array2)
console.log("Каждый второй элемент:", everySecondElement)

console.log("Задание 4")
const array3 = randomIntArray(10, 25, 1, 50)
const evenElements = []

for (let i = 0; i < array3.length; i++) {
    if (array3[i] % 2 === 0) {
        evenElements.push(array3[i])
    }
}

console.log("Исходный массив:", array3)
console.log("Четные элементы:", evenElements)
console.log("Длина массива четных элементов:", evenElements.length)