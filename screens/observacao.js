const inputObs = document.querySelector('#input_observacao')

inputObs.addEventListener('keyup', () => {
    const counter = document.querySelector('#input-counter')
    let observacao = document.querySelector('#input_observacao').value
    
    counter.textContent = 100 - observacao.length
})