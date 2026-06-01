const readline = require('readline')
const rl = readline.createInterface({
    input: process.stdin,
    output: process.stdout
})

rl.question('введите число от 1 до 99: ', k => {
    k = +k
    for (let i = 100; i <= 999; i++) {
        let a = Math.floor(i / 100)
        let b = Math.floor(i / 10) % 10
        let c = i % 10
        if (a + b + c === k)
        console.log(i)
    }
    rl.close()
})