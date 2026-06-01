let number = 15
let taskResult

if(number % 3 === 0 && number % 5 === 0){
    taskResult = 'FizzBuzz'
}else if(number % 5 === 0){
    taskResult = 'Buzz'
}else if(number % 3 === 0){
    taskResult = 'Fizz'
}

console.log(taskResult)