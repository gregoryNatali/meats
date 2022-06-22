const starsDiv = document.querySelector('#estrelas')

for (let star = 0; star < starsDiv.childElementCount; star++) {
    starsDiv.children[star].style.fill = "#F9DF9C"
    starsDiv.children[star].addEventListener('click', () => {
        let nota = star + 1
        for (let reset = 0; reset < starsDiv.childElementCount; reset++) {
            starsDiv.children[reset].style.fill = "#F9DF9C"
        }
        for (let index = 0; index < nota; index++) {
            starsDiv.children[index].style.fill = "#D79B00"
        }
    })
}