'use strict'

const user = {
    name : 'Иванов',
    birth : 2005,
    sayHello(){
    console.log('Привет! Меня зовут ' + this.name)
    }
}

function User(name, birth){
    this.name = name
    this.birth = birth
    this.sayHello = function(){
        console.log('Привет! Меня зовут ' + this.name)
    }
}
let user1 = new User('Вася', 2007)
let user2 = new User('Петя', 2003)
user1.sayHello()
user2.sayHello()

class User1{
    nаme
    birth 
    constructor(name, birth){
        this.name = name
        this.birth = birth
    }
    sayHello(){
        console.log('Привет! Меня зовут ' + this.name)
    }
}

let user0 = new User1('Петя', 2003)
user0.sayHello()