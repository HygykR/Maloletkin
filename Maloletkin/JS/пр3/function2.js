function calculatePressure(density, depth){
    const g = 9.8
    const pressure = density * g * depth
    return Math.round(pressure)
}
console.log(calculatePressure(1000, 1041))