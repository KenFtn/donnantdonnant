const formBesoins = document.querySelectorAll('.formBesoin');
const formOffer = document.querySelectorAll('.formOffer');

function ajaks(form, type){
    form.forEach(form => {
        form.addEventListener('submit', function(e){
            e.preventDefault();
            const formData = new FormData(this);
            axios({
                headers: {
                    "Content-Type": "application/json",
                    "X-Requested-With": "XMLHttpRequest",
                    "X-CSRF-Token": document.head.querySelector("[name=csrf-token][content]").content
                },
                method:'post',
                url:'/annonces/'+type,
                data: formData
            }).then(response => {
                console.log(Object.values(response.data));
    
                /*
                const reverse = response.data.reverse();
                */
                const container = document.querySelector(".annoncesB");
                let url = document.querySelector('.hidden').getAttribute('href');
                container.innerHTML = "";
                
                // for (var i = 0; i < 4; i++) {
    
                response.data.foreach(data => {
                    console.log(data.title);
    
                    let newUrl = url.replace(/\/([0-9]+$)/g,"/"+data.id);
                    container.innerHTML += 
                    '<div class="annonce">'+
                        '<div class="head">'+
                            '<img src="./img/jacky.jpg" alt="">'+
                            '<div class="nameStar">'+
                                '<p class="nam">'+ data.user.name +'</p>'+
                                '<div class="my-rating" data-rating="'+ data.user.note +'"></div>'+
                            '</div>'+
                        '</div>'+
                        '<div class="body">'+
                            '<h3>' + data.title + '</h3>'+
                            '<p class="descr">' + data.desc + '</p>'+
                        '</div>'+
                        '<div class="price">'+
                            '<div class="pricon">'+
                                '<p>' + data.price + '</p>'+
                                '<img src="./img/jewel.png" alt="">'+
                            '</div>'+  
                            '<a href="'+ newUrl +'") }}">Voir l\'annonce</a>'+
                        '</div>'+
                    '</div>';            
                });
    
                $(".my-rating").starRating({
                    totalStars: 5,
                    starShape: 'rounded',
                    starSize: 18,
                    emptyColor: 'lightgray',
                    hoverColor: 'red',
                    activeColor: 'orange',
                    useGradient: false,
                    readOnly : true
                });
    
                var divs = document.querySelectorAll('.descr');
    
                divs.forEach(p => {
                    
                    if(p.innerHTML.length > 80)
                    {
                        p.innerHTML = p.innerHTML.substring(0,80) + '...';          
                    }
                     
                });
            })
        })
    });
}    

ajaks(formBesoins, "recherche");
ajaks(formOffer, "offre");