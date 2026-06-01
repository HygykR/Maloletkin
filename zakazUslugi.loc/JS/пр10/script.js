let canvas = document.querySelector('#canvas')
let context = canvas.getContext('2d')

context.fillStyle = 'red'
context.fillRect(500, 250, 50, 50)

context.fillStyle = 'blue'
context.fillRect(570, 250, 50, 50)

context.fillStyle = 'green'
context.fillRect(430, 320, 50, 50)

context.fillStyle = 'black'
context.fillRect(570, 320, 50, 50)

context.fillStyle = 'yellow'
context.fillRect(430, 390, 50, 50)

context.fillStyle = 'violet'
context.fillRect(500, 390, 50, 50)

context.fillStyle = 'black'
context.fillRect(400, 500, 300, 300)
context.strokeStyle = 'white'
context.strokeRect(400, 500, 300, 300)

context.save()
context.translate(550, 650)
context.rotate(45 * Math.PI / 180)
context.fillStyle = 'white'
context.fillRect(-100, -100, 200, 200)
context.strokeStyle = 'white'
context.strokeRect(-100, -100, 200, 200)
context.restore()

context.save()
context.translate(550, 650)
context.rotate(45 * Math.PI / 180)
context.fillStyle = 'black'
context.fillRect(-60, -60, 120, 120)
context.strokeStyle = 'white'
context.strokeRect(-60, -60, 120, 120)
context.restore()
