const numbers1 = [1, 2, 3, 4, 5]
const doubled = numbers1.map(function(num) {
  return num * 2
})
console.log('Задание 1:', doubled)

const numbers2 = [1, 2, 3, 4, 5]
const sum = numbers2.reduce(function(acc, num) {
  return acc + num
}, 0)
const product = numbers2.reduce(function(acc, num) {
  return acc * num
}, 1)
const result = [sum, product]
console.log('Задание 2:', result)

const proverbs = [
  'Без труда не выловишь и рыбку из пруда',
  'Семь раз отмерь, один раз отрежь',
  'Тише едешь — дальше будешь'
]
const totalLength = proverbs.reduce(function(acc, str) {
  return acc + str.length
}, 0)
console.log('Задание 3:', totalLength)

const pyramid = ['xxxxx', 'xxxx', 'xxx', 'xx', 'x']
console.log('Задание 4:')
pyramid.forEach(function(line) {
  console.log(line)
})

const users = [
  { id: 1, name: 'Анна', age: 25 },
  { id: 2, name: 'Иван', age: 30 },
  { id: 3, name: 'Мария', age: 17 },
  { id: 4, name: 'Петр', age: 15 }
]

const adultNames = users
  .filter(function(user) {
    return user.age >= 18;
  })
  .map(function(user) {
    return user.name
  })
console.log('Задание 5:', adultNames)

function find(id) {
  return users.find(function(user) {
    return user.id === id
  })
}

const userWithId3 = find(3)
console.log('Задание 6:', userWithId3)