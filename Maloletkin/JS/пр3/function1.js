function checkVehicle(wheels, weight){
    if(wheels === 2 && weight < 100){
        return 'Парковка разрешена'
    }else{
        return 'Вам здесь не место! Мяу!'
    }
}
console.log(checkVehicle(2, 50))