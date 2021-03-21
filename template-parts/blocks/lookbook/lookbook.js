jQuery(".tags span").on("click", function() {
    var tag = jQuery(this).attr('class');
    jQuery('.masonry-item:not(.tags)').removeClass('show-masonry-item').addClass('hide-masonry-item');
    jQuery('.masonry-item.' + tag).addClass('show-masonry-item').show();
    $grid.masonry('layout');
});


var $grid = jQuery('.masonry').masonry({
    itemSelector: '.masonry__item',
    columnWidth: '.masonry__sizer',
    percentPosition: true
})

$grid.masonry('layout');


// Almost 1 on 1 copy of https://www.w3schools.com/howto/howto_js_lightbox.asp
function openModal() {
    document.getElementById("lookbookModal").style.display = "block";
}

function closeModal() {
    document.getElementById("lookbookModal").style.display = "none";
}

var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
    showSlides(slideIndex += n);
}

function currentSlide(n) {
    showSlides(slideIndex = n);
}

function showSlides(n) {
    var i;
    var slides = document.getElementsByClassName("lookbookModal__slides");
    if (n > slides.length) { slideIndex = 1 }
    if (n < 1) { slideIndex = slides.length }
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }
    slides[slideIndex - 1].style.display = "block";
}