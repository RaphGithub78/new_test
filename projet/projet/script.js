$(document).ready(function(){
    var $carrousel = $('#carrousel');
    var $img = $('#carrousel ul li');
    var indexImg = $img.length - 1;
    var i = 0;

    $('.next').click(function(){
        i = (i === indexImg) ? 0 : (i + 1);
        updateCarrousel();
    });

    $('.prev').click(function(){
        i = (i === 0) ? indexImg : (i - 1);
        updateCarrousel();
    });

    function updateCarrousel() {
        $img.removeClass('active');
        $img.eq(i).addClass('active');
    }

    function slideImg(){
        setInterval(function(){
            i = (i === indexImg) ? 0 : (i + 1);
            updateCarrousel();
        }, 4000);
    }

    // Appeler slideImg() pour démarrer le carrousel
    slideImg();
});
