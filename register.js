const button = document.querySelector("#register-button")
button.addEventListener('click', (e) => {

    const formText = document.querySelector("#form-text")

    let userInfo = {
        email: document.querySelector("#email-input").value,
        name: document.querySelector("#name-input").value,
        surname: document.querySelector("#surname-input").value,
        cpf: document.querySelector("#cpf-input").value,
        address: document.querySelector("#address-input").value,
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

    if (Number(userInfo.cpf) > 99999999999) {    
        formText.textContent = 'Digite um CPF válido'
        return
    }

    formText.textContent = ''
    
    if (userInfo.password === userInfo.verifyPassword) {
        document.querySelector('form').submit()
    }
    else {
        formText.textContent = 'As senhas não correspondem'
    }
})
