const decrease = document.querySelector('#decrease')
const increase = document.querySelector('#increase')
const quantText = document.querySelector('#numero-quant')
let quant = document.querySelector('#numero-quant').textContent
var increaseCounter, decreaseCounter

decrease.addEventListener('mousedown', () => {
    clearInterval(decreaseCounter)
    clearInterval(increaseCounter)
    if (quant > 1) {
        quant--
        quantText.textContent = quant
        if (quant > 1) {
            decreaseCounter = setInterval(() => {
                quant--
                quantText.textContent = quant
                if (quant == 1) {
                    clearInterval(decreaseCounter)
                }
            }, 400)
        }
    }
})

decrease.addEventListener('mouseup', () => {
    clearInterval(decreaseCounter)
})

increase.addEventListener('mousedown', () => {
    clearInterval(decreaseCounter)
    clearInterval(increaseCounter)
    if (quant < 20) {
        quant++
        quantText.textContent = quant
        if (quant < 20) {
            increaseCounter = setInterval(() => {
                quant++
                quantText.textContent = quant
                if (quant == 20) {
                    clearInterval(increaseCounter)
                }
            }, 400)
        }
    }
})

increase.addEventListener('mouseup', () => {
    clearInterval(increaseCounter)
})