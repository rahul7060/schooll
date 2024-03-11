const burger = document.querySelector('.burger')
const navbar = document.querySelector('.navbar')
const leftnav = document.querySelector('.leftnav')
const rightnav = document.querySelector('.rightnav')

// burger.addEventListener('click',show);

// function show(){
//     navbar.style.display = 'flex';
//     navbar.style.top = '0';
// }

// function show(){
//     navbar.style.top = '-100%';
// }

burger.addEventListner('click', ()=>{
    rightnav.classList.toggle('vclass');
    leftnav.classList.toggle('vclass');
    navbar.classList.toggle('hnav');
})