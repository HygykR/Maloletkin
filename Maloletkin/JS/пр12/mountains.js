const MOUNTAINS = [
    {name: "Kilimanjaro", height: 5895, country: "Tanzania"},
    {name: "Everest", height: 8848, country: "Nepal"},
    {name: "Mount Fuji", height: 3776, country: "Japan"},
    {name: "Mont Blanc", height: 4808, country: "Italy/France"},
    {name: "Vaalserberg", height: 323, country: "Netherlands"},
    {name: "Denali", height: 6168, country: "United States"},
    {name: "Popocatepetl", height: 5465, country: "Mexico"}
];

class TextCell {
    constructor(text) {
        this.text = text.split("\n")
    }
    
    minHeight() {
        return this.text.length
    }
    
    minWidth() {
        let maxLength = 0
        for(let i = 0; i < this.text.length; i++) {
            if(this.text[i].length > maxLength) {
                maxLength = this.text[i].length
            }
        }
        return maxLength
    }
    
    draw(width, height) {
        const result = []
        for(let i = 0; i < height; i++) {
            let line = ""
            if(i < this.text.length) {
                line = this.text[i]
            }
            while(line.length < width) {
                line += " "
            }
            result.push(line)
        }
        return result
    }
}

class UnderlinedCell extends TextCell {
    constructor(text) {
        super(text)
    }
    
    draw(width, height) {
        const content = super.draw(width, height - 1)
        let underline = ""
        for(let i = 0; i < width; i++) {
            underline += "-"
        }
        content.push(underline)
        return content
    }
    
    minHeight() {
        return super.minHeight() + 1
    }
}

class RTextCell extends TextCell {
    constructor(text) {
        super(text)
    }
    
    draw(width, height) {
        const result = []
        for(let i = 0; i < height; i++) {
            let line = ""
            if(i < this.text.length) {
                line = this.text[i]
            }
            while(line.length < width) {
                line = " " + line
            }
            result.push(line)
        }
        return result
    }
}

class FramedCell extends TextCell {
    constructor(text) {
        super(text)
    }
    
    minHeight() {
        return super.minHeight() + 2
    }
    
    minWidth() {
        return super.minWidth() + 2
    }
    
    draw(width, height) {
        const innerWidth = width - 2
        const innerHeight = height - 2
        const innerContent = super.draw(innerWidth, innerHeight)
        const result = []
        
        let topBorder = "┏"
        for(let i = 0; i < innerWidth; i++) {
            topBorder += "━"
        }
        topBorder += "┓"
        result.push(topBorder)
        
        for(let i = 0; i < innerHeight; i++) {
            let line = "┃"
            line += innerContent[i]
            while(line.length < width - 1) {
                line += " "
            }
            line += "┃"
            result.push(line)
        }
        
        let bottomBorder = "┗"
        for(let i = 0; i < innerWidth; i++) {
            bottomBorder += "━"
        }
        bottomBorder += "┛"
        result.push(bottomBorder)
        
        return result
    }
}

function dataTable(data) {
    const headers = Object.keys(data[0])

    const rows = []

    const headerRow = []
    for(let i = 0; i < headers.length; i++) {
        headerRow.push(new UnderlinedCell(headers[i]))
    }
    rows.push(headerRow)

    const maxHeight = Math.max(...data.map(mountain => mountain.height))

    for(let i = 0; i < data.length; i++) {
        const dataRow = []
        for(let j = 0; j < headers.length; j++) {
            const key = headers[j]
            let value = data[i][key]
            
            if(key === "name" && data[i].height === maxHeight) {
                dataRow.push(new FramedCell(String(value)))
            } else if(typeof value === 'number') {
                dataRow.push(new RTextCell(String(value)))
            } else {
                dataRow.push(new TextCell(value))
            }
        }
        rows.push(dataRow)
    }
    
    return rows
}

function rowHeights(rows) {
    return rows.map(function(row) {
        return row.reduce(function(max, cell) {
            return Math.max(max, cell.minHeight())
        }, 0)
    })
}

function colWidths(rows) {
    const widths = []
    for(let i = 0; i < rows[0].length; i++) {
        let maxWidth = 0
        for(let j = 0; j < rows.length; j++) {
            maxWidth = Math.max(maxWidth, rows[j][i].minWidth())
        }
        widths.push(maxWidth)
    }
    return widths
}

function drawRow(row, rowNum, rowHeightsArr, colWidthsArr) {
    const result = []
    const height = rowHeightsArr[rowNum]
    
    for(let lineNum = 0; lineNum < height; lineNum++) {
        let line = ""
        for(let colNum = 0; colNum < row.length; colNum++) {
            const cell = row[colNum]
            const cellLines = cell.draw(colWidthsArr[colNum], height)
            line += cellLines[lineNum] + " "
        }
        result.push(line)
    }
    return result
}

function drawTable(rows) {
    const heights = rowHeights(rows)
    const widths = colWidths(rows)
    
    const result = []
    for(let rowNum = 0; rowNum < rows.length; rowNum++) {
        const rowLines = drawRow(rows[rowNum], rowNum, heights, widths)
        for(let lineNum = 0; lineNum < rowLines.length; lineNum++) {
            result.push(rowLines[lineNum])
        }
    }
    
    return result.join("\n")
}

const rows = dataTable(MOUNTAINS)

console.log(drawTable(rows))