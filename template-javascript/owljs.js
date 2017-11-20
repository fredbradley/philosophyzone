jQuery(document).ready(function($) {
 
  $("#owl-demo").owlCarousel({
    navigation : false,
    navDots: true,
    items : 6, //10 items above 1000px browser width
      itemsDesktop : [1500,5], //5 items between 1000px and 901px
      itemsDesktopSmall : [1080,4], // betweem 900px and 601px
      itemsTablet: [860,3], //2 items between 600 and 0
      itemsMobile : [645,2], // itemsMobile disabled - inherit from itemsTablet option
      autoPlay: true
  });
 
});

