var menu = document.querySelectorAll('.item-menu') ;

function selectLink() {
    menu.forEach((item) =>
        item.classList.remove('ativo')
    );
    this.classList.add('ativo')
}

menu.forEach((item)=> item.addEventListener('click', selectLink))

//Expandir o menu

var btnExp = document.querySelector('#btn-exp');
var menuSide = document.querySelector('.menu-lateral');

btnExp.addEventListener('click' , function(){
    menuSide.classList.toggle('expandir')
})