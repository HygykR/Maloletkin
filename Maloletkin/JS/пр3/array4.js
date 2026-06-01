const readline = require('readline')
const rl = readline.createInterface({
    input: process.stdin,
    output: process.stdoun
})
rl.question("Числа через пробел: ", (input) => {
    let numbers = input.split(" ").map(x => +x)
    let freq = {}
    for(let n of numbers){
        freq[n] = (freq[n] || 0) + 1
    }
    let bestNum = null
    let bestCount = 0
    for(let n in freq){
        let num = Number(n)
        let cnt = freq[n]
        if(cnt > bestCount || (cnt === bestCount && num < bestNum)){
            bestCount = cnt
            bestNum = num
        }
    }
    console.log("Наиболее частое: ", bestNum)
    rl.close
})