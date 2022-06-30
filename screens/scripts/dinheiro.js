const valoresDinheiro = document.querySelectorAll('.valor_dinheiro')

// trocar o ponto do dinheiro por vírgula
for (let pos = 0; pos < valoresDinheiro.length; pos++) {
    let text = valoresDinheiro[pos].textContent
    valoresDinheiro[pos].textContent = text.replace(".", ",")
}