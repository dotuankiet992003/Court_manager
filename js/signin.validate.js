//validator doc
//https://github.com/validatorjs/validator.js
function onSubmit(e) {
    e.preventDefault();

    let usernameInput = document.querySelector('#username');
    let passwordInput = document.querySelector('#password');
    let form = document.querySelector('#form');

    let usernameValue = usernameInput.value;
    let passwordValue = passwordInput.value;

    // if(!validator.isAlpha(usernameValue)) {
    //     return;
    // } 


    // if(!validator.isLength(passwordValue , {min: 8})) {
    //     return;
    // }

    form.submit();
}