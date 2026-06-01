function election(arr) {
    let trueCount = 0;
    
    for (let i = 0; i < arr.length; i++) {
        if (arr[i] === true) {
            trueCount++;
        }
    }
    
    return trueCount > arr.length / 2;
}
console.log(election([true, true, false, false, false]))