//Дана строка, содержащая число в римской нумерации. 
//Напишите функцию функцию romeToDec(str), 
//принимающую параметром строку
//и возвращающую число. 
//Задайте строку и выведите в консоль результат.

function romeToDec(str){
    const romanNumerals = {
        'I': 1,
        'V': 5,
        'X': 10,
        'L': 50,
        'C': 100,
        'D': 500,
        'M': 1000
    }

    let result = 0

    for(let i = 0;i<str.length;i++){
        const current = romanNumerals[str[i]]
        const next = romanNumerals[str[i+1]]

        if(next && current < next){
            result -= current
        }else{
            result += current
        }
    }
    return result
}

const readline = require('readline-sync')
const a = readline.question('Enter rome number: ')
console.log('Result: ', romeToDec(a))