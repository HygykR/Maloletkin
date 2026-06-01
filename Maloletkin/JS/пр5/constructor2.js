console.log('Задание 1')

const animalsData = [
  ['волк', 60, 'мясо'],
  ['заяц', 55, 'трава'],
  ['гепард', 110, 'мясо'],
  ['зебра', 65, 'трава'],
  ['медведь', 45, 'мед']
];

class Animal {
  constructor(name, speed, food) {
    this.name = name
    this.speed = speed
    this.food = food
  }

  run() {
    console.log(`${this.name} бегает со скоростью ${this.speed} км/ч`)
  }

  eat() {
    console.log(`${this.name} ест ${this.food}`)
  }
}

const animals = []

for (let i = 0; i < animalsData.length; i++) {
  const animal = new Animal(animalsData[i][0], animalsData[i][1], animalsData[i][2])
  animals.push(animal)
}

console.log('Объекты животных')
console.log(animals)

console.log('Методы животных')
for (let i = 0; i < animals.length; i++) {
  console.log(`Животное ${i + 1}:`)
  animals[i].run()
  animals[i].eat()
}

console.log('Задание 2')

class Calculator {
  constructor() {
    this.a = 0
    this.b = 0
  }

  read() {
    const readline = require('readline')
    const rl = readline.createInterface({
      input: process.stdin,
      output: process.stdout
    })

    return new Promise((resolve) => {
      rl.question('Введите первое число: ', (answer1) => {
        this.a = Number(answer1)
        
        rl.question('Введите второе число: ', (answer2) => {
          this.b = Number(answer2)
          rl.close()
          resolve()
        })
      })
    })
  }

  sum() {
    return this.a + this.b
  }

  mul() {
    return this.a * this.b
  }

  pow() {
    return Math.pow(this.a, this.b)
  }
}

console.log('Задание 3')

class Ladder {
  constructor() {
    this.step = 0
  }
  
  showStep() {
    console.log(this.step)
    return this
  }
  
  up(steps = 1) {
    this.step += steps
    return this
  }
  
  down(steps = 1) {
    this.step -= steps
    if (this.step < 0) this.step = 0
    return this
  }
}

console.log('Проверка работы лестницы:')
const ladder = new Ladder()

ladder.showStep()
ladder.up(2)
ladder.up(3)
ladder.showStep()
ladder.down(4)
ladder.showStep()

console.log('Цепочка вызовов: ')
const ladder2 = new Ladder()
ladder2.up(5).down(2).showStep()

const calculator = new Calculator()
calculator.read().then(() => {
  console.log('Результаты:')
  console.log("Sum = " + calculator.sum())
  console.log("Mul = " + calculator.mul())
  console.log("Pow = " + calculator.pow())
})