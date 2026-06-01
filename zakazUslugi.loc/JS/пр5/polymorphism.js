class Shape {
    constructor(x, y) {
        this.x = x
        this.y = y
    }
    
    move(x, y) {
        this.x += x
        this.y += y
        console.log('Фигура переместилась.')
    }
    
    perimeter() {
        return null
    }
    
    area() {
        return null
    }
    
    toString() {
        return 'Shape'
    }
}

class Rectangle extends Shape {
    constructor(x, y, width, height) {
        super(x, y)
        this.width = width
        this.height = height
    }
    
    perimeter() {
        return 2 * (this.width + this.height)
    }
    
    area() {
        return this.width * this.height
    }
    
    toString() {
        return 'Rectangle'
    }
}

class Square extends Rectangle {
    constructor(x, y, length) {
        super(x, y, length, length)
        this.length = length
    }
    
    toString() {
        return 'Square'
    }
}

class Circle extends Shape {
    constructor(x, y, radius) {
        super(x, y)
        this.radius = radius
    }
    
    perimeter() {
        return 2 * Math.PI * this.radius
    }
    
    area() {
        return Math.PI * this.radius * this.radius
    }
    
    toString() {
        return 'Circle'
    }
}

class Triangle extends Shape {
    constructor(x, y, sideA, sideB, sideC) {
        super(x, y)
        this.sideA = sideA
        this.sideB = sideB
        this.sideC = sideC
    }
    
    perimeter() {
        return this.sideA + this.sideB + this.sideC
    }
    
    area() {
        const p = this.perimeter() / 2
        return Math.sqrt(p * (p - this.sideA) * (p - this.sideB) * (p - this.sideC))
    }
    
    toString() {
        return 'Triangle'
    }
}

const rectangle = new Rectangle(10, 10, 5, 3)
const square = new Square(20, 20, 4)
const circle = new Circle(30, 30, 5)
const triangle = new Triangle(40, 40, 3, 4, 5)

const shapes = [rectangle, square, circle, triangle]

console.log('Информация о фигурах:')
console.log('----------------------')

shapes.forEach(shape => {
    console.log(`Тип: ${shape.toString()}`)
    console.log(`Периметр: ${shape.perimeter().toFixed(2)}`)
    console.log(`Площадь: ${shape.area().toFixed(2)}`)
    console.log('----------------------')
})

console.log('Проверка move():')
rectangle.move(5, 5)
console.log(`Новые координаты прямоугольника: (${rectangle.x}, ${rectangle.y})`)