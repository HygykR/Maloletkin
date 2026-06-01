console.log('Задание 1 (с приватными свойствами)')

const animalsData = [
  ['волк', 60, 'мясо'],
  ['заяц', 55, 'трава'],
  ['гепард', 110, 'мясо'],
  ['зебра', 65, 'трава'],
  ['медведь', 45, 'мед']
];

class Animal {
  #name
  #speed
  #food
  
  constructor(name, speed, food) {
    this.#name = name
    this.#speed = speed
    this.#food = food
  }
  
  getName() {
    return this.#name
  }
  
  getSpeed() {
    return this.#speed
  }
  
  getFood() {
    return this.#food
  }
  
  setName(name) {
    this.#name = name
  }
  
  setSpeed(speed) {
    this.#speed = speed
  }
  
  setFood(food) {
    this.#food = food
  }

  run() {
    console.log(`${this.#name} бегает со скоростью ${this.#speed} км/ч`)
  }

  eat() {
    console.log(`${this.#name} ест ${this.#food}`)
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

console.log('Задание 2 (с приватными свойствами)')

class Calculator {
  #a
  #b
  
  constructor() {
    this.#a = 0
    this.#b = 0
  }
  
  getA() {
    return this.#a
  }
  
  getB() {
    return this.#b
  }
  
  setA(value) {
    this.#a = value
  }
  
  setB(value) {
    this.#b = value
  }

  read() {
    const readline = require('readline')
    const rl = readline.createInterface({
      input: process.stdin,
      output: process.stdout
    })

    return new Promise((resolve) => {
      rl.question('Введите первое число: ', (answer1) => {
        this.#a = Number(answer1)
        
        rl.question('Введите второе число: ', (answer2) => {
          this.#b = Number(answer2)
          rl.close()
          resolve()
        })
      })
    })
  }

  sum() {
    return this.#a + this.#b
  }

  mul() {
    return this.#a * this.#b
  }

  pow() {
    return Math.pow(this.#a, this.#b)
  }
}

console.log('Задание 3 (с приватными свойствами)')

class Ladder {
  #step
  
  constructor() {
    this.#step = 0
  }
  
  getStep() {
    return this.#step
  }
  
  setStep(value) {
    this.#step = value < 0 ? 0 : value
  }
  
  showStep() {
    console.log(this.#step)
    return this
  }
  
  up(steps = 1) {
    this.#step += steps
    return this
  }
  
  down(steps = 1) {
    this.#step -= steps
    if (this.#step < 0) this.#step = 0
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

console.log('Демонстрация работы геттеров и сеттеров')

console.log('1. Животные:')
const wolf = animals[0]
console.log('Текущие значения:')
console.log('Имя:', wolf.getName())
console.log('Скорость:', wolf.getSpeed())
console.log('Еда:', wolf.getFood())

console.log('Изменяем значения через сеттеры:')
wolf.setName('волчище')
wolf.setSpeed(65)
wolf.setFood('мясо и рыба')
console.log('Новые значения через геттеры:')
console.log('Имя:', wolf.getName())
console.log('Скорость:', wolf.getSpeed())
console.log('Еда:', wolf.getFood())

console.log('2. Калькулятор:')
const calc = new Calculator()
console.log('Текущие значения a и b:', calc.getA(), calc.getB())
calc.setA(15)
calc.setB(3)
console.log('Новые значения через сеттеры: a =', calc.getA(), 'b =', calc.getB())
console.log('Сумма:', calc.sum())
console.log('Произведение:', calc.mul())
console.log('Степень:', calc.pow())

console.log('3. Лестница:')
const ladder3 = new Ladder()
console.log('Текущая ступенька:', ladder3.getStep())
ladder3.setStep(10)
console.log('После setStep(10):', ladder3.getStep())
ladder3.setStep(-5)
console.log('После setStep(-5) (должно быть 0):', ladder3.getStep())

const calculator = new Calculator()
calculator.read().then(() => {
  console.log('Результаты:')
  console.log("Sum = " + calculator.sum())
  console.log("Mul = " + calculator.mul())
  console.log("Pow = " + calculator.pow())
})