let weight = 5
let recommendation

if(weight < 4){
    recommendation = 'Пора перекусить';
}else if(weight <= 5,5){
    recommendation = 'Вес в норме';
}else if(weight > 5,5){
    recommendation = 'Пора на тренировку';
}
console.log(recommendation)