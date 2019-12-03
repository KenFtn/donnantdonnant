require('./bootstrap');
require ('./ajax');
require('./jquery.star-rating-svg');



/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */


$(".my-rating-6").starRating({
    totalStars: 5,
    starShape: 'rounded',
    starSize: 40,
    emptyColor: 'lightgray',
    hoverColor: 'red',
    activeColor: 'red',
    useGradient: false
  });

const menubtn = document.querySelector('.menubtn');
const blanc = document.querySelector('.menumobile');
const noir = document.querySelector('.a');
const noirA = "aActive";
const blancA = "menumobileActive";

menubtn.addEventListener('click', ()=>{
    if(!blanc.classList.contains(blancA))
    {
        blanc.classList.add(blancA);
        setTimeout( ()=> { noir.classList.toggle(noirA);   }, 180); 

    }
    else
    {
        noir.classList.toggle(noirA);   
        setTimeout( () => { blanc.classList.remove(blancA);}, 180);
    }
});