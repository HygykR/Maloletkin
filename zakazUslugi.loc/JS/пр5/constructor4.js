class Animal {
    eat() {
        console.log('Животное ест.');
    }
}

class Bear extends Animal {
    constructor(weight) {
        super();
        this.weight = weight;
    }

    run(speed) {
        console.log(`Медведь бежит со скоростью ${speed} км/ч.`);
    }
}

const bear = new Bear(300);

console.log(bear);

bear.run(15);
bear.eat();

console.log('-------------------');

class Shape {
    constructor(x, y) {
        this.x = x;
        this.y = y;
    }
    
    move(x, y) {
        this.x += x;
        this.y += y;
        console.log('Фигура переместилась.');
    }
}

class Rectangle extends Shape {
    constructor(x, y, width, height) {
        super(x, y);
        this.width = width;
        this.height = height;
    }

    perimeter() {
        return 2 * (this.width + this.height);
    }
}

const rect = new Rectangle(10, 10, 5, 3);
console.log('Периметр прямоугольника:', rect.perimeter());

class Square extends Rectangle {
    constructor(x, y, length) {
        super(x, y, length, length);
        this.length = length;
    }
}

const square = new Square(20, 20, 4);
console.log('Периметр квадрата:', square.perimeter());

class Circle extends Shape {
    constructor(x, y, radius) {
        super(x, y);
        this.radius = radius;
    }

    area() {
        return Math.PI * this.radius * this.radius;
    }
}

const circle = new Circle(30, 30, 5);
console.log('Площадь круга:', circle.area().toFixed(2));

rect.move(5, 5);
console.log('Новые координаты rect:', rect.x, rect.y);