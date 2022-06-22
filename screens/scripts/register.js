const button = document.querySelector("#register-button")

button.addEventListener('click', (e) => {
    const emailRegex = /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/g // deve conter caracteres antes do @, depois do @, pelo menos um ponto e entre 2 a 4 caracteres depois do ponto
    const passwordRegex = /^(?=.*\d)(?=.*[a-zA-Z])\w{8,30}$/g // deve conter pelo menos um número, não ter símbolos e ter entre 8 a 30 caracteres
    const formText = document.querySelector("#form-text")

    let userInfo = {
        email: document.querySelector("#email-input").value.trim(),
        name: document.querySelector("#name-input").value.trim(),
        surname: document.querySelector("#surname-input").value.trim(),
        cpf: document.querySelector("#cpf-input").value.trim(),
        address: document.querySelector("#address-input").value.trim(),
        password: document.querySelector("#password-input").value,
        verifyPassword: document.querySelector("#verify-password-input").value
    }

    e.preventDefault()

    if (userInfo.email === '' ||
        userInfo.name === '' ||
        userInfo.surname === '' ||
        userInfo.cpf === '' ||
        userInfo.address === '' ||
        userInfo.password === '' ||
        userInfo.verifyPassword === '') {
        formText.textContent = 'Você precisa preencher todos os campos'
        return
    }

    if (emailRegex.test(userInfo.email) === false) {
        formText.textContent = 'Digite um e-mail válido'
        return
    }
    
    if (Number(userInfo.cpf) > 99999999999) {    
        formText.textContent = 'Digite um CPF válido'
        return
    }
    
    if (passwordRegex.test(userInfo.password) === false) {
        formText.textContent = 'Sua senha precisa de letras, pelo menos um número, nenhum símbolo e ter entre 8 a 30 caracteres'
        return
    }

    if (userInfo.password === userInfo.verifyPassword) {
        formText.textContent = ''
        document.querySelector('form').submit() // envia para o php
        return
    }
    
    formText.textContent = 'As senhas não correspondem'
})
