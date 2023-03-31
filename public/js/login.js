const passwordInput = document.querySelector(".password");

const checkEye = () => {
    const type = passwordInput.getAttribute("type");
    if (type === "password") {
        document.querySelector("#open-eye").style.display = "none";
        document.querySelector("#closed-eye").style.display = "block";
    } else {
        document.querySelector("#open-eye").style.display = "block";
        document.querySelector("#closed-eye").style.display = "none";
    }
};

const showPass = () => {
    if (passwordInput.getAttribute("type") === "password")
        passwordInput.setAttribute("type", "text");
    else passwordInput.setAttribute("type", "password");
    checkEye();
};
const eyeBox = document.querySelector(".eye-box");
eyeBox.addEventListener("click", showPass);
