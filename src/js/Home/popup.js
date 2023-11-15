const button = document.querySelector('button');
const popup = document.querySelector('.popup-wrapper');

//Abrindo Popup
button.addEventListener('click' , () => {
    popup.style.display = 'block'
})

//Fechando Popup
popup.addEventListener('click', event => {
    const classNameofClickedElement = event.target.classList[0];
    const className = ['popup-close' , 'popup-wrapper'];  
    const closePopup = className.some(className => 
        className === classNameofClickedElement );

    if(closePopup){
           popup.style.display = 'none';
    }


})