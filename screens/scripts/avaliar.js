const starsDiv = document.querySelector('#estrelas')
const submitButton = document.querySelector('#enviar-nota')

// submitButton.addEventListener('click', (e) => {
//     e.preventDefault()

//     if (submitButton.getAttribute('value') != null) {
//         document.querySelector('form').submit()
//         return
//     }
// })

// não tá mandando pro PHP porque as estrelas não têm um input de radio. temos que adicionar eles

for (let star = 0; star < 5; star++) {
    starsDiv.innerHTML += `<div id="estrela_${star + 1}"><svg width="38" height="38" viewBox="0 0 38 38" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M33.699 13.1033L24.2769 11.734L20.065 3.19511C19.9499 2.96132 19.7607 2.77206 19.5269 2.65702C18.9406 2.36757 18.2281 2.60878 17.9349 3.19511L13.723 11.734L4.30091 13.1033C4.04114 13.1404 3.80364 13.2629 3.62181 13.4484C3.40198 13.6744 3.28084 13.9783 3.28502 14.2936C3.28919 14.6088 3.41834 14.9094 3.64407 15.1295L10.4611 21.7758L8.85052 31.1607C8.81275 31.379 8.83691 31.6036 8.92025 31.8089C9.0036 32.0141 9.1428 32.192 9.32206 32.3222C9.50133 32.4524 9.71349 32.5297 9.93448 32.5455C10.1555 32.5612 10.3765 32.5148 10.5724 32.4113L18.9999 27.9805L27.4275 32.4113C27.6575 32.5338 27.9247 32.5746 28.1808 32.5301C28.8265 32.4187 29.2607 31.8064 29.1493 31.1607L27.5388 21.7758L34.3558 15.1295C34.5413 14.9476 34.6638 14.7101 34.7009 14.4504C34.8011 13.801 34.3484 13.1998 33.699 13.1033Z"></path>
    </svg></div>`
}

for (let star = 0; star < 5; star++) {
    starsDiv.children[star].children[0].style.fill = "#F9DF9C"
    starsDiv.children[star].addEventListener('click', () => {
        let nota = star + 1
        for (let reset = 0; reset < starsDiv.childElementCount; reset++) {
            starsDiv.children[reset].children[0].style.fill = "#F9DF9C" // reinicia a cor das estrelas
        }
        for (let index = 0; index < nota; index++) {
            starsDiv.children[index].children[0].style.fill = "#D79B00"
        }
        submitButton.setAttribute('value', nota)
    })
}