const readline = require('readline-sync')
const a = readline.question('a: ')
const b = readline.question('b: ')
const c = readline.question('c: ')
const m = readline.question('m: ')
const n = readline.question('n: ')
if(a * m * m + b * m + c == n){
    console.log('Да, пройдет')
}else{
    console.log('Нет, не пройдет')
}