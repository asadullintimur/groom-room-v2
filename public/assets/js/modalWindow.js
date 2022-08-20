const modalWindowDiv = document.body.querySelector("#modalWindowDiv");
const registerBtn = document.body.querySelector("#registerBtn");
const loginBtn = document.body.querySelector("#loginBtn");
const registerForm = document.body.querySelector("#registerForm");
const loginForm = document.body.querySelector("#loginForm");
const closeBtns = document.body.querySelectorAll(".close-btn");


//functions
function openModalWindow() {
    modalWindowDiv.style.display = "flex";
}

function closeModalWindow() {
    modalWindowDiv.style.display = "none";
}

function openRegisterForm() {
    registerForm.style.display = "flex";
}

function closeRegisterForm() {
    registerForm.style.display = "none";
}

function openLoginForm() {
    loginForm.style.display = "flex";
}

function closeLoginForm() {
    loginForm.style.display = "none";
}

//listeners
[registerBtn, loginBtn].forEach(btn => {
    btn.addEventListener("click", openModalWindow)
})

closeBtns.forEach(btn => {
    btn.addEventListener("click", () => {
        closeModalWindow()
    })
})

registerBtn.addEventListener("click", () => {
    openRegisterForm()
    closeLoginForm()
})

loginBtn.addEventListener("click", () => {
    openLoginForm()
    closeRegisterForm()
})







