let age = 5
let ageGroup

if(age <= 1){
    ageGroup = 'Котята'
}else if(age <= 3){
    ageGroup = 'Молодые коты'
}else if(age <= 7){
    ageGroup = 'Коты средних лет'
}else if(age > 7){
    ageGroup = 'Почетные коты'
}
console.log(ageGroup)