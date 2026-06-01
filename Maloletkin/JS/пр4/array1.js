const readline = require('readline-sync')
function inputArray(isInt = false) {
    let arr = []
    let i = 0
    while (true) {
        let input = readline.question('Enter number (empty to finish): ')
        if (input.trim() === '') {
            break
        }
        let num = +input
        if (typeof num !== 'number' || num !== num || input.trim() === '') {
            console.log('Error: enter valid number! ' + (isInt ? 'целое ' : '') + 'число!')
        } else if (isInt) {
            let intPart = +input.split('.')[0]
            if (intPart === num) {
                arr[i++] = num
            } else {
                console.log('Error: enter integer!')
            }
        } else {
            arr[i++] = num
        }
    }
    return arr
}

function maxInTheArray(arr) {
    let i = 0
    while (arr[i] !== undefined) {
        i++
    }
    if (i === 0) {
        return false
    }
    let max = arr[0]
    for (let j = 1; j < i; j++) {
        if (arr[j] > max) {
            max = arr[j]
        }
    }
    return max
}

function minInTheArray(arr) {
    let i = 0
    while (arr[i] !== undefined) {
        i++
    }
    if (i === 0) {
        return false
    }
    let min = arr[0]
    for (let j = 1; j < i; j++) {
        if (arr[j] < min) {
            min = arr[j]
        }
    }
    return min
}

function meanTwoDigit(arr) {
    let sum = 0
    let count = 0
    let i = 0
    while (arr[i] !== undefined) {
        let val = arr[i]
        let absVal = val < 0 ? -val : val
        if (absVal >= 10 && absVal <= 99) {
            sum += val
            count++
        }
        i++
    }
    return count > 0 ? sum / count : false
}

function transformArray(arr) {
    let result = []
    let j = 0
    let i = 0
    while (arr[i] !== undefined) {
        let val = arr[i]
        if (val > 0) {
            result[j++] = val * val
        } else if (val < 0) {
            result[j++] = -val
        } else {
            result[j++] = 0
        }
        i++
    }
    return result
}

let floats = inputArray(false);
let transformed = transformArray(floats)
console.log('Исходный:', floats)
console.log('Преобразованный:', transformed)