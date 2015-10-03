$(function(){
	$("li:first-child").addClass("first");
	$("li:last-child").addClass("last");	

	$('.sf-menu').superfish({ 
		delay:       500,                           
		animation:   {opacity:'show',height:'show'}, 
		speed:       'fast',
		autoArrows:  false,
		dropShadows: false,      
	});
	
	$('.mobile_meu').mobileMenu({
		defaultText: 'Navigate to...',	
		className: 'select-menu',
		subMenuDash: '&nbsp;&nbsp;&nbsp;&ndash;'
	});
	
	$('.home_banner > ul').bxSlider({
		auto: true,
		autoControls: true,
		useCSS: false,
		adaptiveHeight: true,
		captions: true
	});


 
  $("#home_blog_slide, #resource_slider").owlCarousel({
      autoPlay: false, //Set AutoPlay to 3 seconds
      items : 4,
      itemsDesktop : [1199,3],
      itemsDesktopSmall : [979,3],
	  navigation : true
 
  });


  $(window).scroll(function(event){
    var st = $(this).scrollTop();
    if($('#headertop').hasClass('fix')){
      var headerheight=$('header').height();
      if(st > headerheight){
        $('#headertop').addClass('fixed');
      }else{
        $('#headertop').removeClass('fixed');
      }
    }
    if(st > 700){
      $('#scrolltop').addClass('fix');
    }else{
      $('#scrolltop').removeClass('fix');
    }
  });
	
	
});










