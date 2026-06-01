let canvas = document.querySelector('#canvas')
let context = canvas.getContext('2d')

context.fillStyle = 'black'
context.fillRect(0, 0, 800, 800)

context.fillStyle = 'red'
context.fillRect(200, 450, 400, 100)

context.fillStyle = 'blue'
context.fillRect(200, 350, 400, 100)

context.fillStyle = 'white'
context.fillRect(200, 250, 400, 100)