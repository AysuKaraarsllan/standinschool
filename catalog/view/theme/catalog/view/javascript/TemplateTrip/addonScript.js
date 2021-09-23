/*! Customized Jquery from Punit Korat.  punit@templatetrip.com  : www.templatetrip.com
Authors & copyright (c) 2016: TemplateTrip - Webzeel Services(addonScript). */
/*! NOTE: This Javascript is licensed under two options: a commercial license, a commercial OEM license and Copyright by Webzeel Services - For use Only with TemplateTrip Themes for our Customers*/
function contentwidth() {
	colsWidth = $('#column-right, #column-left').length;
	if($( window ).width() > 1199) {
		$( "#content" ).addClass( "Cwidth" );
		if (colsWidth == 2) {
			$('.Cwidth').css('width', '58%');
		} else if (colsWidth == 1) {
			$('.Cwidth').css('width', '80%');
		} else {
			$('.Cwidth').css('width', '100%');
		}
	} else {
		$("#content").removeClass("Cwidth");
		$('#content').removeAttr("style");
	} 
}
$(document).ready(function(){contentwidth();});
$(window).resize(function() {contentwidth();});

$(document).ready(function() {
	
		$(".user-info a.dropdown-toggle").click(function(){
			$( ".account-link-toggle" ).slideToggle( "2000" );
			$(".header-cart-toggle").slideUp("slow");
			$(".language-toggle").slideUp("slow");
			$(".currency-toggle").slideUp("slow");
	  	});
			
		$("#cart button.dropdown-toggle").click(function(){
			$( ".header-cart-toggle" ).slideToggle( "2000" );														 
		   	$(".account-link-toggle").slideUp("slow");
			$(".language-toggle").slideUp("slow");
			$(".currency-toggle").slideUp("slow");
			$('.ttsearchtoggle').parent().removeClass("active");
			$('.ttsearchtoggle').hide('fast');
   	    });
		
		$("#form-currency button.dropdown-toggle").click(function(){
			$( ".currency-toggle" ).slideToggle( "2000" );	
			$(".language-toggle").slideUp("slow");
			$(".account-link-toggle").slideUp("slow");
			$(".header-cart-toggle").slideUp("slow");
			$('.ttsearchtoggle').parent().removeClass("active");
			$('.ttsearchtoggle').hide('fast');
			
    	});
		
        $("#form-language button.dropdown-toggle").click(function(){
			$( ".language-toggle" ).slideToggle( "2000" );																  
			$(".currency-toggle").slideUp("fast");
			$(".account-link-toggle").slideUp("slow");
			$(".header-cart-toggle").slideUp("slow");
			$('.ttsearchtoggle').parent().removeClass("active");
			$('.ttsearchtoggle').hide('fast');
       	});
		
	$(".option-filter .list-group-items a").click(function() {
		$(this).toggleClass('collapsed').next('.list-group-item').slideToggle();
	});

	$( "#content" ).addClass( "left-column" );
	
	$("ul.breadcrumb li:nth-last-child(1) a").addClass('last-breadcrumb').removeAttr('href');

	$("#column-left .products-list .product-thumb, #column-right .products-list .product-thumb").unwrap();
	$("#column-left .list-products .product-thumb, #column-right .list-products .product-thumb").unwrap();

	$("#content > h1, .account-wishlist #content > h2, .account-address #content > h2, .account-download #content > h2").first().addClass("page-title");
	
	$("#content > .page-title").wrap("<div class='page-title-wrapper'></div>");
	$(".page-title-wrapper").append($("ul.breadcrumb"));
	$(".page-title-wrapper").prependTo($(".header-content-title .container"));
	
	$('#column-left .product-thumb .image, #column-right .product-thumb .image').attr('class', 'image col-xs-5 col-sm-4 col-md-4');
	$('#column-left .product-thumb .thumb-description, #column-right .product-thumb .thumb-description').attr('class', 'thumb-description col-xs-7 col-sm-8 col-md-8');

		$('#content .row > .product-list .product-thumb .image').attr('class', 'image col-xs-5 col-sm-5 col-md-3');
		$('#content .row > .product-list .product-thumb .thumb-description').attr('class', 'thumb-description col-xs-7 col-sm-7 col-md-9');
		$('#content .row > .product-grid .product-thumb .image').attr('class', 'image col-xs-12');
		$('#content .row > .product-grid .product-thumb .thumb-description').attr('class', 'thumb-description col-xs-12');

		$('select.form-control').wrap("<div class='select-wrapper'></div>");
		$('input[type="checkbox"]').wrap("<span class='checkbox-wrapper'></span>");
		$('input[type="checkbox"]').attr('class','checkboxid');
		$('input[type="radio"]').wrap("<span class='radio-wrapper'></span>");
		$('input[type="radio"]').attr('class','radioid');
		
		$('#column-left .products-list .btn-cart').removeAttr('data-original-title');
		
		$( "#ttcmsrightbanner" ).appendTo( ".top-column .row" );
		$( "#ttcmsservices" ).appendTo( ".top-column .container" );
		$( "#ttcmspaymentlogo" ).appendTo( ".footer-container .container" );
		
/*-------start go to top---------*/		
	$( "body" ).append( "<div class='backtotop-img'><div class='goToTop ttbox'></div></div>" );
	$( "body" ).append( "<div id='goToTop' title='Top' class='goToTop ttbox-img'></div>" );
	$("#goToTop").hide();
/*-------end go to top---------*/		
/*---------------------- Inputtype Js Start -----------------------------*/
$('.checkboxid').change(function(){
if($(this).is(":checked")) {
$(this).addClass("chkactive");
$(this).parent().addClass('active');
} else {
$(this).removeClass("chkactive");
$(this).parent().removeClass('active');
}
});

$(function() {
var $radioButtons = $('input[type="radio"]');
$radioButtons.click(function() {
$radioButtons.each(function() {
$(this).parent().toggleClass('active', this.checked);
});
});
});
/*---------------------- Inputtype Js End -----------------------------*/

/*------------- Slider -Loader Js Strat ---------------*/
$(window).load(function() 
{ 
$(".ttloading-bg").fadeOut("slow");
})
/*------------- Slider -Loader Js End ---------------*/

/* Slider Load Spinner */
$(window).load(function() { 
	$(".slideshow-panel .ttloading-bg").removeClass("ttloader");
});

 /* --------------- Start Sticky-header JS ---------------*/		 
	function header() {	
	 if (jQuery(window).width() > 1199){
		 if (jQuery(this).scrollTop() > 100)
			{    
				jQuery('.full-header').addClass("fixed");
				jQuery('.common-home #top-column .content-top .left-main-menu').prependTo(".full-header > .container");
				jQuery('.left-main-menu').prependTo(".full-header > .container");
				 
			}else{
			 jQuery('.full-header').removeClass("fixed");
			 jQuery('.common-home .full-header > .container .left-main-menu').prependTo("#top-column > .container .content-top");
			 jQuery('.full-header > .container .left-main-menu').prependTo("#column-left");
			}
		} else {
		  jQuery('.full-header').removeClass("fixed");
		  jQuery('.common-home .full-header > .container .left-main-menu').prependTo("#top-column > .container .content-top");
			 jQuery('.full-header > .container .left-main-menu').prependTo("#column-left");
		  }
	}
	 
	$(document).ready(function(){header();});
	jQuery(window).resize(function() {header();});
	jQuery(window).scroll(function() {header();});
		 
/* --------------- End Sticky-header JS ---------------*/



/* ----------- SmartBlog Js Start ----------- */
	 var ttblog = $("#ttsmartblog-carousel");
      ttblog.owlCarousel({
		 autoPlay : true,
     	 items :4, //10 items above 1000px browser width
     	 itemsDesktop : [1599,3], 
     	 itemsDesktopSmall : [991,2], 
     	 itemsTablet: [767,2], 
     	 itemsMobile : [480,1],
		 navigation: true,
		 pagination: false
      });

      // Custom Navigation Events

      $(".ttblog_next").click(function(){
        ttblog.trigger('owl.next');
      })
      $(".ttblog_prev").click(function(){
        ttblog.trigger('owl.prev');
      })
 /* ----------- SmartBlog Js End ----------- */
/*----------------- Testimonial Js Start ------------------------*/
	var tttestimonial = $("#tttestimonial-carousel");
    tttestimonial.owlCarousel({
        autoPlay: true,
        pagination: true,
        paginationNumbers: false,
        items: 1, //10 items above 1000px browser width
        itemsDesktop: [1200, 1],
        itemsDesktopSmall: [991, 1],
        itemsTablet: [767, 1],
        itemsMobile: [480, 1]
    });
    // Custom Navigation Events
    $(".tttestimonial_next").click(function() {
        tttestimonial.trigger('owl.next');
    })

    $(".tttestimonial_prev").click(function() {
        tttestimonial.trigger('owl.prev');
    })
/*----------------- Testimonial Js End ------------------------*/
/* -----------Start carousel For TT-Services ----------- */

    var ttservices = $("#ttcmsservices .ttcmsservice");
    ttservices.owlCarousel({
        autoPlay: 2000,
        stopOnHover: true,
		pagination: false,
        items: 5, //10 items above 1000px browser width
        itemsDesktop: [1199, 3],
        itemsDesktopSmall: [991, 3],
        itemsTablet: [767, 3],
        itemsMobile: [480, 1]
    });

/* -----------End carousel For TT-Services ----------- */
/* -----------Start carousel For TT-Services ----------- */

    var ttfooterservices = $("#ttcmsfooterservice .ttcmsservice-content");
    ttfooterservices.owlCarousel({
        autoPlay: 2000,
        stopOnHover: true,
        pagination: false,
        items: 5, //10 items above 1000px browser width
        itemsDesktop: [1199, 5],
        itemsDesktopSmall: [991, 3],
        itemsTablet: [767, 3],
        itemsMobile: [480, 2]
    });

/* -----------End carousel For TT-Services ----------- */

/*-------------------------- Countdown js start ------------------------------ */
$('.tt-special-countdown .product-thumb').each(function(){
var $desc = jQuery(this).find('.thumb-description .progress');
var $qty = jQuery(this).find('.quantity');
var $pbar = jQuery(this).find('.progress-bar');
var $progress = $desc;
var $progressBar = $pbar;
var $quantity = $qty.html();
var currentWidth = parseInt($progressBar.css('width'));
var allowedWidth = parseInt($progress.css('width'));
var addedWidth = currentWidth + parseInt($quantity);
if (addedWidth > allowedWidth) {
addedWidth = allowedWidth;
}
var progress = (addedWidth / allowedWidth) * 100;
$progressBar.animate({width: progress + '%' }, 100);
});


$('#content .image-additional img').on('click',function(event) {
    var img_wrap = $(this).closest( ".countdown-images" );
    $(img_wrap).find('.special-image img').attr('src',$(event.target).data('image-large-src'));
    $('.selected').removeClass('selected');
    $(event.target).addClass('selected');
    $(img_wrap).find('.product-image img').prop('src', $(event.currentTarget).data('image-large-src'));
});

$('#content .tt-special-countdown .special-countdown.products-carousel').owlCarousel({
	items:2,
	itemsDesktop: [1399,1],
	itemsDesktopSmall: [991,1],
	itemsTablet: [767,1],
	itemsMobile: [480,1],
	navigation: true,
	autoPlay: false,
	pagination: false
});
$('#column-right .tt-special-countdown .special-countdown.products-carousel').owlCarousel({
	items:2,
	itemsDesktop: [1199,1],
	itemsDesktopSmall: [991,1],
	itemsTablet: [767,1],
	itemsMobile: [480,1],
	navigation: true,
	autoPlay: true,
	stopOnHover  : true,
	pagination: false
});
$('#column-left .tt-special-countdown .special-countdown.products-carousel').owlCarousel({
	items:2,
	itemsDesktop: [1199,1],
	itemsDesktopSmall: [991,1],
	itemsTablet: [767,1],
	itemsMobile: [480,1],
	navigation: true,
	autoPlay: true,
	stopOnHover  : true,
	pagination: false
});
$('#content .special-additional-images').owlCarousel({
	items: 2,
	itemsDesktop: [1199,2],
	itemsDesktopSmall: [991,2],
	itemsTablet: [767,2],
	itemsMobile: [480,2],
	autoPlay: false,
	navigation: true,
	pagination: false
});

// Custom Navigation Events
$(".additional-next").click(function(){
	$(".additional-images").trigger('owl.next');
})
$(".additional-prev").click(function(){
	$(".additional-images").trigger('owl.prev');
})
$(".additional-images-container .customNavigation").addClass('owl-navigation');

$("#column-left .tt-special-countdown .item-countdown, #column-right .tt-special-countdown .item-countdown").each(function() {
    $(this).insertAfter($(this).parent().parent().parent().find(".button-group"));
});
/*-------------------------- Countdown js End ------------------------------ */
/*-------------------------- latest js Start ------------------------------ */
$('.bestseller-carousel .product-thumb').each(function(){
var $desc = jQuery(this).find('.thumb-description .progress');
var $qty = jQuery(this).find('.quantity');
var $pbar = jQuery(this).find('.progress-bar');
var $progress = $desc;
var $progressBar = $pbar;
var $quantity = $qty.html();
var currentWidth = parseInt($progressBar.css('width'));
var allowedWidth = parseInt($progress.css('width'));
var addedWidth = currentWidth + parseInt($quantity);
if (addedWidth > allowedWidth) {
addedWidth = allowedWidth;
}
var progress = (addedWidth / allowedWidth) * 100;
$progressBar.animate({width: progress + '%' }, 100);
});

var ttbestsellerproduct = $("#content .bestseller-carousel .bestseller-items.products-carousel");
    ttbestsellerproduct.owlCarousel({
	items:4,
    itemsDesktop : [1299,3],
    itemsDesktopSmall : [1199,3],
    itemsTablet: [767,2],
    itemsMobile : [480,1],
	navigation: true,
	pagination: false
});

var ttcategorytab = $("#content .TT-cat-carousel .TTcategory-tab.products-carousel");
    ttcategorytab.owlCarousel({
	items:3,
    itemsDesktop : [1599,3],
    itemsDesktopSmall : [1199,2],
    itemsTablet: [544,1],
    itemsMobile : [480,1],
	navigation: true,
	pagination: false
});


var cat_feature = $(".category-feature.tt-carousel");
      cat_feature.owlCarousel({
     	 autoPlay : true,
		 pagination : false,
     	 items : 7, //10 items above 1000px browser width
     	 itemsDesktop : [1600,5], 
     	 itemsDesktopSmall : [991,3], 
     	 itemsTablet: [767,3],
     	 itemsMobile : [480,1] 
});

      // Custom Navigation Events
	  $(".ttfcat_prev").click(function(){
        cat_feature.trigger('owl.prev');
      })
      $(".ttfcat_next").click(function(){
        cat_feature.trigger('owl.next');
      })

var ttrelatedproduct = $(".related-carousel .related-items.products-carousel");
    ttrelatedproduct.owlCarousel({
	items:4,
    itemsDesktop : [1199,3],
    itemsDesktopSmall : [991,3],
    itemsTablet: [767,2],
    itemsMobile : [480,1],
	navigation: true,
	pagination: false
});
/*-------------------------- latest js End ------------------------------ */
// Carousel Counter
	colsCarousel = $('#column-right, #column-left').length;
	if (colsCarousel == 2) {
		ci=3;
	} else if (colsCarousel == 1) {
		ci=5;
	} else {
		ci=6;
}
// product Carousel
$("#content .products-list .products-carousel").owlCarousel({
	items: 5,
	itemsDesktop : [1599,4], 
	itemsDesktopSmall : [1199,3], 
	itemsTablet: [767,2],
	itemsMobile : [480,1],
	navigation: true,
	pagination: false
});

$(".customNavigation .next").click(function(){
	$(this).parent().parent().find(".products-carousel").trigger('owl.next');
})
$(".customNavigation .prev").click(function(){
	$(this).parent().parent().find(".products-carousel").trigger('owl.prev');
})
$(".products-list .customNavigation").addClass('owl-navigation');

/* ---------------- start Templatetrip link more menu ----------------------*/
	var max_link = 4;
	var items = $('#tttoplink_block ul li');
	var surplus = items.slice(max_link, items.length);
	surplus.wrapAll('<li class="more_menu tttoplink"><ul class="top-link clearfix">');
	$('.more_menu').prepend('<a href="#" class="level-top">More</a>');
	$('.more_menu').mouseover(function(){
	$(this).children('ul').addClass('shown-link');
	})
	$('.more_menu').mouseout(function(){
	$(this).children('ul').removeClass('shown-link');
	});
	
/* ---------------- End Templatetrip link more menu ----------------------*/
/*-----------start menu toggle ------------*/
	$('.left-main-menu .TT-panel-heading').click(function() { 
		$('.left-main-menu .TT-panel-heading').toggleClass('active'); 
		$('.left-main-menu ul.dropmenu').slideToggle("2000"); 
	});  
	
/*-----------End menu toggle ------------*/
/* ---------------- start Templatetrip more menu ----------------------*/
		if($(document).width() <= 1599){
		var max_elem = 5;
		}  
		else if ($(document).width() >= 1599){
		var max_elem = 8;
		}
		var menu = $('.main-category-list .menu-category ul.dropmenu > li');	
		if ( menu.length > max_elem ) {
		$('.main-category-list .menu-category ul.dropmenu').append('<li class="more"><div class="more-menu"><span class="categories">More</span></div></li>');
		}
		
		$('.main-category-list .menu-category ul.dropmenu .more-menu').click(function() {
		if ($(this).hasClass('active')) {
		menu.each(function(j) {
		if ( j >= max_elem ) {
		$(this).slideUp(200);
		}
		});
		$(this).removeClass('active');
		$('.more-menu').html('<span class="categories">More</span>');
		} else {
		menu.each(function(j) {
		if ( j >= max_elem  ) {
		$(this).slideDown(200);
		}
		});
		$(this).addClass('active');
		$('.more-menu').html('<span class="categories">Less</span>');
		}
		});
		
		menu.each(function(j) {
		if ( j >= max_elem ) { 
		$(this).css('display', 'none');
		}
		});
/* ---------------- End Templatetrip more menu ----------------------*/

/* ---------------- start ontheme sub cat more menu ----------------------*/
 	$('.tt-category-featured .content > .caption .cat-sub > ul').each(function(){		
		var subcat = $(this).find('li');	
		var max_link = 5;	
		if ( subcat.length > max_link ) {
		$(this).append('<li class="more"><div class="more-menu"><span class="categories">More</span></div></li>');
		}
			subcat.each(function(j) {
			if ( j >= max_link ) { 
				$(this).css('display', 'none');
				$(this).addClass('disable');
			}
			});
		});
		
 		$('.tt-category-featured .content > .caption .cat-sub > ul .more-menu').each(function() {
		var subcatd = $(this).parent().parent().find('li.disable');
		var max_link = 2;
		var subcat = $(this).parent().parent().find('li');
		$(this).click(function() {
		if ($(this).hasClass('active')) {
		subcat.each(function(j) {
		if ( j >= max_link ) {
			if(subcat.hasClass('disable')){
			subcatd.slideUp(200);
			}
		}
		});
		$(this).removeClass('active');
		$(this).html('<span class="categories">More</span>');
		} else {
		subcat.each(function(j) {
		if ( j >= max_link  ) {
			subcat.slideDown(200);
		}
		});
		$(this).addClass('active');
		$(this).html('<span class="categories">Less</span>');
		}
		});				
		});
/* ---------------- End ontheme sub cat more menu ----------------------*/

/* Go to Top JS START */
	$(function () {
		$(window).scroll(function () {
			if ($(this).scrollTop() > 150) {
				$('.goToTop').fadeIn();
			} else {
				$('.goToTop').fadeOut();
			}
		});
	
		// scroll body to 0px on click
		$('.goToTop').click(function () {
			$('body,html').animate({
				scrollTop: 0
			}, 1000);
			return false;
		});
	});
	/* Go to Top JS END */

	/* Active class in Product List Grid START */
	/* Active class in Product List Grid START */
	$('#list-view').click(function() {
		$('#grid-view').removeClass('active');
		$('#list-view').addClass('active');
		$('#content .row > .product-list .product-thumb .image').attr('class', 'image col-xs-5 col-sm-4 col-md-3');
		$('#content .row > .product-list .product-thumb .thumb-description').attr('class', 'thumb-description col-xs-7 col-sm-8 col-md-9');
		//$(".product-layout.product-list .product-thumb .button-group .btn-cart").removeAttr('data-original-title'); /* for remove tooltrip */
	});
	$('#grid-view').click(function() {
		$('#list-view').removeClass('active');
		$('#grid-view').addClass('active');
		$('#content .row > .product-grid .product-thumb .image').attr('class', 'image col-xs-12');
		$('#content .row > .product-grid .product-thumb .thumb-description').attr('class', 'thumb-description col-xs-12');
		//$(".product-layout.product-grid .product-thumb .button-group .btn-cart").attr('data-original-title','Add to cart');/* for add tooltrip */	
	});
	if (localStorage.getItem('display') == 'list') {
		$('#list-view').addClass('active');
	} else {
		$('#grid-view').addClass('active');
	}
	/* Active class in Product List Grid END */

});
// Documnet.ready() over....
/* FilterBox - Responsive Content*/
function optionFilter(){
	if ($(window).width() <= 991) {
		$('#column-left .option-filter-box').appendTo('.row #content .category-description');
		$('#column-right .option-filter-box').appendTo('.row #content .category-description');
	} else {
		$('.row #content .category-description .option-filter-box').appendTo('#column-left .option-filter');
		$('.row #content .category-description .option-filter-box').appendTo('#column-right .option-filter');
	}
}
$(document).ready(function(){ optionFilter(); });
$(window).resize(function(){ optionFilter(); });
/*category filter js*/

function footerToggle() {
	
	if($( window ).width() < 992) {
		$("footer .footer-column h5").addClass( "toggle" );
		$("footer .footer-column ul").css( 'display', 'none' );
		$("footer .footer-column.active ul").css( 'display', 'block' );
		$("footer .footer-column h5.toggle").unbind("click");
		$("footer .footer-column h5.toggle").click(function() {
			$(this).parent().toggleClass('active').find('ul.list-unstyled').slideToggle( "fast" );
		});
		
		$("#ttcmsfooter .about-title").addClass( "toggle" );
		$("#ttcmsfooter .list-unstyled").css( 'display', 'none' );
		$("#ttcmsfooter .list-unstyled.active").css( 'display', 'block' );
		$("#ttcmsfooter .about-title.toggle").unbind("click");
		$("#ttcmsfooter .about-title.toggle").click(function() {
		$(this).parent().toggleClass('active').find('.list-unstyled').slideToggle( "fast" );
			
		});
		
		$("#column-left .panel-heading").addClass( "toggle" );
		$("#column-left .list-group").css( 'display', 'none' );
		$("#column-left .panel-default.active .list-group").css( 'display', 'block' );
		$("#column-left .panel-heading.toggle").unbind("click");
		$("#column-left .panel-heading.toggle").click(function() {
		$(this).parent().toggleClass('active').find('.list-group').slideToggle( "fast" );
		});
		
		$("#column-left .box-heading").addClass( "toggle" );
		$("#column-left .products-carousel").css( 'display', 'none' );
		$("#column-left .products-list.active .products-carousel").css( 'display', 'block' );
		$("#column-left .box-heading.toggle").unbind("click");
		$("#column-left .box-heading.toggle").click(function() {
		$(this).parent().toggleClass('active').find('.products-carousel').slideToggle( "fast" );
		});
		
		$("#ttcmstestimonial .title_block").addClass( "toggle" );
		$("#ttcmstestimonial .tttestimonial-content").css( 'display', 'none' );
		$("#ttcmstestimonial .tttestimonial-inner.active .tttestimonial-content").css( 'display', 'block' );
		$("#ttcmstestimonial .title_block.toggle").unbind("click");
		$("#ttcmstestimonial .title_block.toggle").click(function() {
		$(this).parent().toggleClass('active').find('.tttestimonial-content').slideToggle( "fast" );
		});
				
		$("#column-right .panel-heading").addClass( "toggle" );
		$("#column-right .list-group").css( 'display', 'none' );
		$("#column-right .panel-default.active .list-group").css( 'display', 'block' );
		$("#column-right .panel-heading.toggle").unbind("click");
		$("#column-right .panel-heading.toggle").click(function() {
		$(this).parent().toggleClass('active').find('.list-group').slideToggle( "fast" );
		});
		
		$("#column-right .box-heading").addClass( "toggle" );
		$("#column-right .products-carousel").css( 'display', 'none' );
		$("#column-right .products-list.active .products-carousel").css( 'display', 'block' );
		$("#column-right .box-heading.toggle").unbind("click");
		$("#column-right .box-heading.toggle").click(function() {
		$(this).parent().toggleClass('active').find('.products-carousel').slideToggle( "fast" );
		});
		
	} else {
		$("#ttcmsfooter .about-title.toggle").unbind("click");
		$("#ttcmsfooter .about-title").removeClass( "toggle" );
		$("#ttcmsfooter .list-unstyled").css( 'display', 'block' );
		
		$("footer .footer-column h5.toggle").unbind("click");
		$("footer .footer-column h5").removeClass('toggle');
		$("footer .footer-column ul.list-unstyled").css('display', 'block');
		
		$("#column-left .panel-heading").unbind("click");
		$("#column-left .panel-heading").removeClass( "toggle" );
		$("#column-left .list-group").css( 'display', 'block' );

		$("#column-left .box-heading").unbind("click");
		$("#column-left .box-heading").removeClass( "toggle" );
		$("#column-left .products-carousel").css( 'display', 'block' );
		
		$("#ttcmstestimonial .title_block").unbind("click");
		$("#ttcmstestimonial .title_block").removeClass( "toggle" );
		$("#ttcmstestimonial .tttestimonial-content").css( 'display', 'block' );
				
		$("#column-right .panel-heading").unbind("click");
		$("#column-right .panel-heading").removeClass( "toggle" );
		$("#column-right .list-group").css( 'display', 'block' );

		$("#column-right .box-heading").unbind("click");
		$("#column-right .box-heading").removeClass( "toggle" );
		$("#column-right .products-carousel").css( 'display', 'block' );
	}
}

$(document).ready(function() {footerToggle();});
$(window).resize(function() {footerToggle();});

/* Category List - Tree View */
function categoryListTreeView() {
	$(".category-treeview li.category-li").find("ul").parent().prepend("<div class='list-tree'></div>").find("ul").css('display','none');

	$(".category-treeview li.category-li.category-active").find("ul").css('display','block');
	$(".category-treeview li.category-li.category-active").toggleClass('active');
}
$(document).ready(function() {categoryListTreeView();});


/* Category List - TreeView Toggle */
function categoryListTreeViewToggle() {
	$(".category-treeview li.category-li .list-tree").click(function() {
		$(this).parent().toggleClass('active').find('ul').slideToggle();
	});
}
$(document).ready(function() {categoryListTreeViewToggle();});

function menuToggle() {
	if($( window ).width() < 992) {
		//$('#column-left .left-main-menu').prependTo('.header-bottom-block .container');
		$('.main-category-list').insertBefore('.header-content-title');
		$('.header-right').insertAfter('.main-category-list .cat-menu');
		//$(".main-category-list .menu-category ul.dropmenu").css('display', 'none');
		
		$(".main-category-list ul.dropmenu li.TT-Sub-List > i").remove();
		$(".main-category-list ul.dropmenu .dropdown-menu ul li.dropdown-inner > i").remove();

		$(".main-category-list ul.dropmenu > li.TT-Sub-List > a").after("<i class='fa fa-angle-down'></i>");
		$(".menu-category > li.TT-Sub-List .dropdown-inner ul > li.dropdown a.single-dropdown").after("<i class='fa fa-angle-down'></i>");
		
		$(".main-category-list .TT-panel-heading").unbind("click");
		$('.main-category-list .TT-panel-heading').click(function(){
			$(this).parent().toggleClass('TTactive').find('ul.dropmenu').slideToggle( "fast" );
		});
		$(".main-category-list ul.dropmenu > li.TT-Sub-List > i").unbind("click");
		$(".main-category-list ul.dropmenu > li.TT-Sub-List > i").click(function() {
			$(this).parent().toggleClass("active").find("ul").first().slideToggle();
		});
		
		$(".menu-category > li.TT-Sub-List .dropdown-inner ul > li.dropdown > i").unbind("click");
		$(".menu-category > li.TT-Sub-List .dropdown-inner ul > li.dropdown > i").click(function() {
			$(this).parent().toggleClass("active").find(".dropdown-menu").slideToggle();
		});
	}
	else {
		//$('.header-bottom-block .left-main-menu').prependTo('#column-left');
		$('.common-home .main-category-list').prependTo('#top-column .container .content-top');
		$('body:not(.common-home) .main-category-list').prependTo('#column-left');
		$('.header-right').insertAfter('.full-header .container .search');
		$('#top-column .content-top .left-main-menu .header-right').appendTo('.full-header .container');
		$(".menu-category > li.TT-Sub-List .dropdown-inner ul > li.dropdown > i").unbind("click");
		$(".main-category-list").removeClass('ttactive');
		//$(".main-category-list .menu-category ul.dropmenu").css('display', 'block');
		$(".menu-category ul.dropmenu li.TT-Sub-List > i").remove();
		$(".menu-category > li.TT-Sub-List .dropdown-inner ul > li.dropdown > i").remove();
	}
}
$(document).ready(function() {menuToggle();});
$( window ).resize(function(){menuToggle();});






/* Animate effect on Review Links - Product Page */
$(".product-total-review, .product-write-review").click(function() {
    $('html, body').animate({ scrollTop: $(".product-tabs").offset().top }, 1000);
});

function responsivecolumn()
{
	if ($(window).width() <= 991)
	{
		$('#page > .container > .row > #column-left').appendTo('#page > .container > .row');
		$('#page > .container > .row > #column-right').appendTo('#page > .container > .row');
	}
	else if($(window).width() >= 992)
	{
		$('#page > .container > .row > #column-left').prependTo('#page > .container > .row');
		$('#page > .container > .row > #column-right').appendTo('#page > .container > .row');
	}
}
$(window).resize(function(){responsivecolumn();});
$(window).ready(function(){responsivecolumn();});
/*category filter js end*/

