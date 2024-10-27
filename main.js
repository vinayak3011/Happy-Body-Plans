let x = document.getElementById('paralax');
window.addEventListener('scroll', () => {
    let value =window.scrollY;
    x.style.left = value *-1+ 'px';
});
const wrapper = document.querySelector('.wrapper');
const loginLink = document.querySelector('.login-link');
const registerLink = document.querySelector('.register-link');
const pp = document.querySelector('.pp');
const iconClose = document.querySelector('.icon-close');

registerLink.addEventListener('click', ()=>{
    wrapper.classList.add('active');
});
loginLink.addEventListener('click', ()=>{
    wrapper.classList.remove('active'); 
});
pp.addEventListener('click', ()=>{
    wrapper.classList.add('active-pp');
});
iconClose.addEventListener('click', ()=>{
    wrapper.classList.remove('active-pp');
});

function login() {
    const email = document.getElementById("email").value;
    const password = document.getElementById("password").value;
}

function register() {
    const email = document.getElementById("regemail").value;
    const regPassword = document.getElementById("regpassword").value;
    const uname = document.getElementById("uname").value;
}

