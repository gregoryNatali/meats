const decrease = document.querySelector('#decrease')
const increase = document.querySelector('#increase')
const quantText = document.querySelector('#numero-quant')
let quant = document.querySelector('#numero-quant').textContent

decrease.addEventListener('click', () => {
    if (quant > 1) {
        quant--
        quantText.textContent = quant
    }
})

increase.addEventListener('click', () => {
    if (quant < 20) {
        quant++
        quantText.textContent = quant
    }
})



decrease.addEventListener('mousedown', () => {
    if (quant > 1) {
        quant--
        quantText.textContent = quant
    }
})

decrease.addEventListener('mouseup', () => {
    if (quant > 1) {
        quant--
        quantText.textContent = quant
    }
})

increase.addEventListener('mousedown', () => {
    if (quant < 20) {
        start()
    }
})

increase.addEventListener('mouseup', () => {
    end()
})



function start() {
    counter = setInterval(function() {
        quantText.textContent = quant
        quant++
    }, 200);
}

function end() {
    clearInterval(counter)
}