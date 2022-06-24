const valoresDinheiro = document.querySelectorAll('.dinheiro')

// trocar o ponto do dinheiro por vírgula
for (let pos = 0; pos < valoresDinheiro.length; pos++) {
    let text = valoresDinheiro[pos].firstElementChild.textContent
    valoresDinheiro[pos].firstElementChild.textContent = text.replace(".", ",")
}