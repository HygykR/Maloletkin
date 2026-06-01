function randomInt(min = 0, max){
    return Math.floor(Math.random()*(max -min + 1)) + min
}
console.log(randomInt(0, 13))