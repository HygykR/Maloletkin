let lastNumber = 5
let multiplicationResult = 1

for(let i = 1; i <= lastNumber; i++){
    if(i % 2 === 0){
        multiplicationResult *= i
    }
}
console.log(multiplicationResult)