const inputObs = document.querySelector('#input_observacao')
const submitButton = document.querySelector('button')

inputObs.addEventListener('keyup', () => {
    let observacao = document.querySelector('#input_observacao').value
    const counter = document.querySelector('#input-counter')
    
    counter.textContent = 100 - observacao.length
})