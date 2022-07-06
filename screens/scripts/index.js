const secoes = document.querySelectorAll('.cardapio section')

for (let index = 0; index < secoes.length; index++) {
    secoes[index].firstElementChild.addEventListener('click', () => {
        $(secoes[index].lastElementChild).slideToggle(450)
    })   
}

const produtos = document.querySelectorAll('.produto-wrapper')
    
for (let index = 0; index < produtos.length; index++) {
    produtos[index].addEventListener('click', () => {
        document.querySelector('form').submit()
    })
}