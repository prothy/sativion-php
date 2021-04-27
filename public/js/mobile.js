const menu = document.querySelector('.mobilemenu');
const button = document.querySelector('#menu-button')

let isopen = false;

button.addEventListener("click", () => {
    if (!isopen) {
        menu.classList.add('isopen');
        button.style.backgroundImage="url('/assets/mobile/close-outline.svg')";
        isopen = true;
    } else {
        menu.classList.remove('isopen');
        button.style.backgroundImage="url('/assets/mobile/menu-outline.svg')";
        isopen = false;
    }
})