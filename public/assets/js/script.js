/*----------------------MODAL LOG IN---------------------------*/
let account = document.querySelector('.account');
let modal = document.querySelector('.loginMenuHidden');

account.addEventListener('click', function (){
    modal.classList.toggle('displayBlock');
})
/*--------------------------FIN MODAL LOG IN---------------------------*/

/*--------------------MENU BURGER--------------------------*/
let menuBurger = document.querySelector('.menuBurger'),
    basculant =  document.querySelector('.basculant')

basculant.addEventListener('click', function (event) {
    menuBurger.classList.toggle('active')
})
/*-----------------------FIN MENU BURGER-------------------*/

/*------------------------LISTING PILOT-------------------------------*/
const btnModals = document.getElementsByClassName('btnModal');
const modals = document.getElementsByClassName('modalPilot');
const closeModal = document.getElementsByClassName('closeModal');

//fermeture avec la croix
for(let i = 0 ; i < closeModal.length; i++){
    closeModal[i].addEventListener('click', closeAll)
}

//boucle pour écouter tout mes button d'ouverture modal
for(let i = 0 ; i < btnModals.length ; i++){
    btnModals[i].addEventListener('click', function(){
        //si je click sur un modal déja ouvert je ferme et c'est tout
        if(modals[i].classList.contains("displayNone") == false){
            closeAll();
            //sinon je ferme tout et j'ouvre le modal concerné
        }else{
            closeAll();
            modals[i].classList.toggle('displayNone');
        }
    })
}
//function closeAll
function closeAll(){
    for(let v = 0; v < modals.length; v++){
        modals[v].classList.add('displayNone');
    }
}
/*------------------FIN LISTING PILOT-------------------*/
