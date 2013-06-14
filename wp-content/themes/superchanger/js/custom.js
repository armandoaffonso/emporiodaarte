
ddsmoothmenu.init({
mainmenuid: "mainMenu", 
orientation: 'h',
classname: 'ddsmoothmenu', 
contentsource: "markup"
});

jQuery(document).ready(function($){

$("<select />").appendTo("#mainMenu");

$("<option />", {
   "selected": "selected",
   "value"   : "",
   "text"    : "Go to..."
}).appendTo("#mainMenu select");

$("#mainMenu a").each(function() {
 var el = $(this);
 $("<option />", {
     "value"   : el.attr("href"),
     "text"    : el.text()
 }).appendTo("#mainMenu select");
});

$("#mainMenu select").change(function() {
  window.location = $(this).find("option:selected").val();
});



$("<select />").appendTo("#menu_box_footer #secondaryMenu");

$("<option />", {
   "selected": "selected",
   "value"   : "",
   "text"    : "Go to..."
}).appendTo("#menu_box_footer #secondaryMenu select");

$("#menu_box_footer #secondaryMenu a").each(function() {
 var el = $(this);
 $("<option />", {
     "value"   : el.attr("href"),
     "text"    : el.text()
 }).appendTo("#menu_box_footer #secondaryMenu select");
});

$("#menu_box_footer #secondaryMenu select").change(function() {
  window.location = $(this).find("option:selected").val();
});


$("#title_box a img, .banner_728_90 img, #feat_area_flex #carousel .slides img, .widget_recent_posts_two img, .banners img, .image_lightbox img, .widget_thumbnail img, .flickr_wrap img, .similar_posts img").hover(function() {
	$(this).stop().animate({
		opacity: 0.7
	}, 300);
},function() {
	$(this).stop().animate({
		opacity: 1
	}, 500);
});		


$("#soc_book img").hover(function() {
	$(this).stop().animate({
		opacity: 1
	}, 200);
},function() {
	$(this).stop().animate({
		opacity: 0.6
	}, 200);
});	

$("#searchsubmit").hover(function() {
	$(this).stop().animate({
		opacity: 0.5
	}, 300);
},function() {
	$(this).stop().animate({
		opacity: 0.9
	}, 300);
});	

$("a[rel^='prettyPhoto']").prettyPhoto();

function mycarousel_initCallback(carousel)
{
 // Disable autoscrolling if the user clicks the prev or next button.
 carousel.buttonNext.bind('click', function() {
 carousel.startAuto(0);
 });

 carousel.buttonPrev.bind('click', function() {
 carousel.startAuto(0);
 });

 // Pause autoscrolling if the user moves with the cursor over the clip.
 carousel.clip.hover(function() {
 carousel.stopAuto();
 }, function() {
 carousel.startAuto();
 });
};

$('.jcarousel-skin-tango').jcarousel({
scroll: 1,
auto: 6,
wrap: 'last',
initCallback: mycarousel_initCallback
});


$(".signin").click(function(e) {
    e.preventDefault();
    $("fieldset#signin_menu").toggle();
    $(".signin").toggleClass("menu-open");
    });

    $("fieldset#signin_menu").mouseup(function() {
    return false
    });
    $(document).mouseup(function(e) {
    if($(e.target).parent("a.signin").length==0) {
    $(".signin").removeClass("menu-open");
    $("fieldset#signin_menu").hide();
    }
});    

$(".login").click(function(e) {
    e.preventDefault();
    $("fieldset#login_menu").toggle();
    $(".login").toggleClass("menu-open");
    });

    $("fieldset#login_menu").mouseup(function() {
    return false
    });
    $(document).mouseup(function(e) {
    if($(e.target).parent("a.login").length==0) {
    $(".login").removeClass("menu-open");
    $("fieldset#login_menu").hide();
    }
}); 

$('.slidewrap').carousel({
	slider: '.car_slider',
	slide: '.car_slide',
	slideHed: '.slidehed',
	nextSlide : '.car_next',
	prevSlide : '.car_prev',
});

$("#toggle a").click(function () {
$("#toggle a").toggle();
});	  

$('a[href=#top]').click(function(){
$('html, body').animate({scrollTop:0}, 'slow');
return false;
});

$(".image_lightbox img").addClass("tip");	
	
});	


(function($){ 
   $(window).load(function(){

   $('#video-gallery').royalSlider({
    arrowsNav: false,
    fadeinLoadedSlide: true,
    controlNavigationSpacing: 0,
    controlNavigation: 'thumbnails',

    thumbs: {
      autoCenter: false,
      fitInViewport: true,
      orientation: 'vertical',
      spacing: 0,
      paddingBottom: 0
    },
    keyboardNavEnabled: true,
    imageScaleMode: 'fill',
    imageAlignCenter:true,
    slidesSpacing: 0,
    loop: false,
    loopRewind: true,
    numImagesToPreload: 3,
    video: {
      autoHideArrows:true,
      autoHideControlNav:false,
      autoHideBlocks: true
    }, 
    autoScaleSlider: true, 
    autoScaleSliderWidth: 960,     
    autoScaleSliderHeight: 450
  });

$('#carousel').flexslider({
animation: "slide",
controlNav: false,
animationLoop: true,
slideshowSpeed: 20000,  
slideshow: true,
itemWidth: 130,
itemMargin: 10,
asNavFor: '.flexslider'
});

$(".flexslider").flexslider({
slideshow: true,
slideshowSpeed: 5000,    
animationLoop: true,
sync: "#carousel",        
animationDuration: 700,  
controlNav: false,
});
   
$('.flexslider_short').flexslider({
slideshow: true,
slideshowSpeed: 4000,         
animationDuration: 700,  
directionNav: true,
controlNav: false
});

$('.flexslider_widget').flexslider({
slideshow: true,
slideshowSpeed: 5000,         
animationDuration: 700,  
directionNav: true,
controlNav: false
});


$(".tags a").hover(function() {
   $(this).animate({ backgroundColor: "#666" }, 200);
},function() {
   $(this).animate({ backgroundColor: "#555" }, 200);
});

$("img.grey").hover(
function() {
$(this).stop().animate({"opacity": "0"}, "slow");
},
function() {
$(this).stop().animate({"opacity": "1"}, "slow");
});	

$("#dyna img[title]").tooltip({
   offset: [10, 2],
   effect: 'slide'
}).dynamic({ bottom: { direction: 'down', bounce: true } });

$(".tip").tipTip({
	maxWidth: "auto", 
	edgeOffset: 10,
	defaultPosition: "top",
});

$("h3.toggler").click(function(){
	$(this).toggleClass("active").next(".toggle_container").slideToggle("fast");
});
	
$('.myToggler').click(function(e){
	$(this).next().slideToggle();
	var sign=$(this).children(':first');
	sign.text(sign.text() == '\uff0b'?'\uff0d':'\uff0b');
	e.preventDefault;
});	
	
$('.su-tabs-nav').delegate('span:not(.su-tabs-current)', 'click', function() {
	$(this).addClass('su-tabs-current').siblings().removeClass('su-tabs-current')
	.parents('.su-tabs').find('.su-tabs-pane').hide().eq($(this).index()).fadeIn('normal');
});
$('.su-tabs-pane').hide();
$('.su-tabs-nav span:first-child').addClass('su-tabs-current');
$('.su-tabs-panes .su-tabs-pane:first-child').show();

$('.acc_container').hide(); 

$('.acc_trigger').click(function(){
	if( $(this).next().is(':hidden') ) { 
		$('.acc_trigger').removeClass('active').next().slideUp();
		$(this).toggleClass('active').next().slideDown(); 
	}
	return false; 
});

$("#home_gallery").PikaChoose({
autoPlay:true, 
speed: 3000,
thumbOpacity:0.7
});
	
})
})(jQuery);
