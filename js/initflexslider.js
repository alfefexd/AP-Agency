// Profile Seven Slider - Scroller
$(window).load(function() {
    
  $('#profile-carousel').flexslider({
    animation: "slide",
    controlNav: false,
    animationLoop: false,
    slideshow: false,
    itemWidth: 150,
    maxItems: 7,
    asNavFor: '#profile-slider'
  });

  $('#profile-slider').flexslider({
    animation: "slide",
    controlNav: false,
    animationLoop: false,
    slideshow: false,
    smoothHeight: true,
    sync: "#profile-carousel"
  });

  $('#layout6-carousel').flexslider({
    animation: "slide",
    controlNav: false,
    itemWidth: 100,
    animationLoop: false,
    slideshow: false,
    maxItems: 4,
    asNavFor: '#layout6-slider'
  });

  $('#layout6-slider').flexslider({
    animation: "slide",
    directionNav: false,
    controlNav: false,
    animationLoop: false,
    slideshow: false,
    smoothHeight: true,
    sync: "#layout6-carousel"
  });
  $('#videos-carousel').flexslider({
    animation: "slide",
    controlNav: false,
    animationLoop: false,
    slideshow: false,
    itemWidth: 210,
  });  
});
