let N = 10
let arr = []
let index = 0

for(let num = 2; num <= N; num++){
    let isPrime = true
    for(let d = 2; d < num; d++){
        if(num % d ===0){
            isPrime = false
        }
    }
    if(isPrime){
        arr[index] = num
        index += 1
    }
}
console.log(arr)