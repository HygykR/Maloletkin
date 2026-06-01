function isPrime(n){
    if(n <= 1) return false
    if(n <= 3) return true
    if(n % 2 === 0 || n % 3 === 0) return false
    for(let i = 5; i * i <= n; i += 6){
        if(n % i === 0 || n % (i + 2) === 0) return false
    }
    return true
}
function nextPrime(n){
    if(n < 2) return 2
    let candidate = n + 1
    while(true){
        if(isPrime(candidate)){
            return candidate
        }
        candidate++
    }
}
console.log(nextPrime(1))