const form = document.querySelector('.contact-form');

const info = document.querySelector('.msginfo')
const submitbtn = document.getElementById('formsubmit')

const user = document.getElementById('name');
const email = document.getElementById('email');
const message = document.getElementById('message');

submitbtn.addEventListener('click', () => {
    info.className = "msginfo active";
    info.innerHTML = formContent.info;
})

form.addEventListener('submit', (e) => {
    e.preventDefault();

    let timeGate = Date.now();

    let nuffTime = timeGate - startTime > 8000;

    console.log(timeGate, startTime, nuffTime)
    
    let formData = {
        name: user.value,
        email: email.value,
        message: message.value
    }
    console.log(Object.values(formData).every((i) => {return i}))

    if (Object.values(formData).every((i) => {return i}) && nuffTime) {
        let xhr = new XMLHttpRequest();
        xhr.open('POST', "");
        xhr.setRequestHeader('content-type', 'application/json');
        xhr.onload = () => {
            console.log(xhr.responseText);
            if(xhr.responseText === 'success' && nuffTime) {
                info.classList.add('success');
                info.innerHTML = formContent.success;
                // alert('Email sent');
                user.value = "";
                email.value = "";
                message.value = "";
            } else {
                info.classList.add('fail');
                info.innerHTML = formContent.failure;
                // alert("Something went wrong");
            }
        }

        xhr.send(JSON.stringify(formData));
    } else {
        info.classList.add('fail');
        !nuffTime ? info.innerHTML = formContent.toosoon : info.innerHTML = formContent.obligatory;
    }
})