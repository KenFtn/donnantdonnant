const formBesoins = document.querySelectorAll('.formBesoin');

formBesoins.forEach(form => {
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
            url:'/annonces/recherche',
            data: formData
        }).then(response => {
            console.log(response.data);

            /*
            const reverse = response.data.reverse();
            const container = document.querySelector(".annoncesB");
            let url = document.querySelector('.hidden').getAttribute('href');
            console.log(url);


            container.innerHTML = "";
      
            for (var i = 0; i < 4; i++) {
                var annonce = JSON.parse(reverse[i]);
                let newUrl = url.replace(/\/([0-9]+$)/g,"/"+annonce.id);
                container.innerHTML += 
                '<div class="annonce">'+
                    '<div class="head">'+
                        '<img src="./img/jacky.jpg" alt="">'+
                        '<div class="nameStar">'+
                            '<p class="nam">Jacky</p>'+
                            '<div class="my-rating" data-rating="4.2324"></div>'+
                        '</div>'+
                    '</div>'+
                    '<div class="body">'+
                        '<h3>' + annonce.title + '</h3>'+
                        '<p class="descr">' + annonce.desc + '</p>'+
                    '</div>'+
                    '<div class="price">'+
                        '<div class="pricon">'+
                            '<p>' + annonce.price + '</p>'+
                            '<img src="./img/jewel.png" alt="">'+
                        '</div>'+  
                        '<a href="'+ newUrl +'") }}">Voir l\'annonce</a>'+
                    '</div>'+
                '</div>';            
            }
            var divs = document.querySelectorAll('.descr');

            divs.forEach(p => {
                
                if(p.innerHTML.length > 80)
                {
                    p.innerHTML = p.innerHTML.substring(0,80) + '...';          
                }
                
            });
        })*/

            
            
            
            
            
            
            
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
        })

    })
});