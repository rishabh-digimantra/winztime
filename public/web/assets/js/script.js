$(document).ready(function(){
$("button.close").click(function() {
  $('#deliveryModal').modal('hide');
});


// $("#ediClos").click(function() {
//   alert('3d21');
//   $('#deliveryEditModal').modal('hide');
// });
// $("button.close").click(function() {
//   alert('123');
// });

$(".subPopBtn").click(function() {
  $('.subPop').slideToggle().toggleClass('active');
    	// if ($('.subPop').hasClass('active')==false) {
    	// 	$(this).closest('ul').find('.subPop').stop(0,0).slideDown('slow');
     //  setTimeout(function(){ $('.subPop').addClass('active'); }, 1000);
    	// }
      
    });
    // $("body").click(function() {
    //   if ($('.subPop').hasClass('active')==true) {
    //     $('.subPop').hide();
    //     setTimeout(function(){ $('.subPop').removeClass('active'); }, 100);
    //   }
    // });

   function animateElements() {
        $('.progressbar').each(function () {
            var elementPos = $(this).offset().top;
            var topOfWindow = $(window).scrollTop();
            var percent = $(this).find('.circle').attr('data-percent');
           
            var totalcamp = $(this).find('.circle').attr('data-total');
            if(totalcamp=="0"){
              totalcamp=1;
            }
            var campaigntype=$(this).find('.circle').attr('data-type');
            var animate = $(this).data('animate');
            var finalpercent = Math.round((percent/totalcamp)*100);

if(campaigntype=="regular"){
            if (Math.round(finalpercent) >= '0' && finalpercent < '31') {

            	// console.log("< 31-----"+percent+'-----'+totalcamp+'-----'+finalpercent);
            	if (elementPos < topOfWindow + $(window).height() - 30 && !animate) {
            	    $(this).data('animate', true);
            	    $(this).find('.circle').circleProgress({
            	        // startAngle: -Math.PI / 2,
            	        value: percent / totalcamp,
            	        // value: finalpercent / 100,
            	        size : 48,
            	        thickness: 6,
            	        fill: {
            	            color: 'green'
            	        }
            	    }).on('circle-animation-progress', function (event, progress, stepValue) {
                    if(campaigntype=="regular"){
            	        $(this).find('span').text(percent + " Sold");
                    }else{
                         $(this).find('span').text(" Ends in "+  percent);
                    }
            	    }).stop();
            	}
            }
            else if (Math.round(finalpercent) > '30' && finalpercent < '71' ) {

            	// console.log("< 70-----"+percent+'-----'+totalcamp+'-----'+finalpercent);
            	if (elementPos < topOfWindow + $(window).height() - 30 && !animate) {
            	    $(this).data('animate', true);
            	    $(this).find('.circle').circleProgress({
            	        // startAngle: -Math.PI / 2,
            	        value: percent / totalcamp,
            	        // value: finalpercent / 100,
            	        size : 48,
            	        thickness: 6,
            	        fill: {
            	            color: 'yellow'
            	        }
            	    }).on('circle-animation-progress', function (event, progress, stepValue) {
            	        if(campaigntype=="regular"){
                      $(this).find('span').text(percent + " Sold");
                    }else{
                         $(this).find('span').text(" Ends in "+  percent);
                    }
            	    }).stop();
            	}
            }
            else if (finalpercent > '70' && finalpercent < '200') {

            	if (elementPos < topOfWindow + $(window).height() - 30 && !animate) {
            		// console.log("< 100-----"+percent+'-----'+totalcamp+'-----'+finalpercent);
            	    $(this).data('animate', true);
            	    $(this).find('.circle').circleProgress({
            	        // startAngle: -Math.PI / 2,
            	        value: percent / totalcamp,
            	        // value: finalpercent / 100,
            	        size : 48,
            	        thickness: 6,
            	        fill: {
            	            color: 'red'
            	        }
            	    }).on('circle-animation-progress', function (event, progress, stepValue) {
            	     if(campaigntype=="regular"){
                      $(this).find('span').text(percent + " Sold");
                    }else{
                         $(this).find('span').text(" Ends in "+  percent);
                    }
            	    }).stop();
            	}
            }
          }else{

            if(Math.round(percent)=="0"){
              percent=1;
            }
               if (Math.round(percent) >= '0' && Math.round(percent) <= '10') {
                var finalvalue= (100-percent)/100;
                if(percent>100){
                   finalvalue= (percent-100)/100;
                }

              // console.log("< 31-----"+percent+'-----'+totalcamp+'-----'+finalpercent);
              if (elementPos < topOfWindow + $(window).height() - 30 && !animate) {
                  $(this).data('animate', true);
                  $(this).find('.circle').circleProgress({
                      // startAngle: -Math.PI / 2,
                    //value: percent / totalcamp,
                    value:finalvalue,
                      size : 48,
                      thickness: 6,
                      fill: {
                          color: 'red'
                      }
                  }).on('circle-animation-progress', function (event, progress, stepValue) {
                    if(campaigntype=="regular"){
                      $(this).find('span').text(percent + " Sold");
                    }else{
                         $(this).find('span').text(" Ends in "+  percent);
                    }
                  }).stop();
              }
            }
            else if (Math.round(percent) > '10' && Math.round(percent) <= '80' ) {
             var finalvalue= (100-percent)/100;
             if(percent>100){
               finalvalue= (percent-100)/100;
             }


              // console.log("< 70-----"+percent+'-----'+totalcamp+'-----'+finalpercent);
              if (elementPos < topOfWindow + $(window).height() - 30 && !animate) {
                  $(this).data('animate', true);
                  $(this).find('.circle').circleProgress({
                      // startAngle: -Math.PI / 2,
                    value:finalvalue,
                    // value: finalpercent / 100,
                      size : 48,
                      thickness: 6,
                      fill: {
                          color: 'yellow'
                      }
                  }).on('circle-animation-progress', function (event, progress, stepValue) {
                      if(campaigntype=="regular"){
                      $(this).find('span').text(percent + " Sold");
                    }else{
                         $(this).find('span').text(" Ends in "+  percent);
                    }
                  }).stop();
              }
            }
             else if (Math.round(percent) > '80' ) {

var finalvalue= (100-percent)/100;

                if(percent>100){
                   finalvalue= (percent-100)/100;
                }
                if(finalvalue>1){

              finalvalue= (totalcamp-percent)/100;
                }
                console.log(finalvalue)
              if (elementPos < topOfWindow + $(window).height() - 30 && !animate) {
                // console.log("< 100-----"+percent+'-----'+totalcamp+'-----'+finalpercent);
                  $(this).data('animate', true);
                  $(this).find('.circle').circleProgress({
                      // startAngle: -Math.PI / 2,
                     value: finalvalue,
                     // value: finalpercent / 100,
                      size : 48,
                      thickness: 6,
                      fill: {
                          color: 'green'
                      }
                  }).on('circle-animation-progress', function (event, progress, stepValue) {
                   if(campaigntype=="regular"){
                      $(this).find('span').text(percent + " Sold");
                    }else{
                         $(this).find('span').text(" Ends in "+  percent);
                    }
                  }).stop();
              }
            }

          }
           
        });
          
    }

    animateElements();
    $(window).scroll(animateElements);

// progress bar start
// (function ($){

//     $.fn.bekeyProgressbar = function(options){

//         options = $.extend({
//         	animate     : true,
//           animateText : true
//         }, options);

//         var $this = $(this);
//         var totalcamp = $("#totalcamp").val(); 
//         var myAdd = $('.percentIn').html();
      
//         var $progressBar = $this;
//         var $progressCount = $progressBar.find('.ProgressBar-percentage--count');
//         var $circle = $progressBar.find('.ProgressBar-circle');
//         var percentageProgress = $progressBar.attr('data-progress');
//         percentageProgress = 2;
//         var percentageRemaining = (1432 - percentageProgress);
//         var percentageText = $progressCount.parent().attr('data-progress');
      
//         //Calcule la circonfÃ©rence du cercle
//         var radius = $circle.attr('r');
//         var diameter = radius * 2;
//         var circumference = Math.round(Math.PI * diameter);

//         //Calcule le pourcentage d'avancement
//         var percentage =  circumference * percentageRemaining / 1432;

//         $circle.css({
//           'stroke-dasharray' : circumference,
//           'stroke-dashoffset' : percentage
//         })
        
//         //Animation de la barre de progression
//         if(options.animate === true){
//           $circle.css({
//             'stroke-dashoffset' : circumference
//           }).animate({
//             'stroke-dashoffset' : percentage
//           }, 3000 )
//         }
        
//         //Animation du texte (pourcentage)
//         if(options.animateText == true){
 
//           $({ Counter: 0 }).animate(
//             { Counter: percentageText },
//             { duration: 3000,
//              step: function () {
//                $progressCount.html( Math.ceil(this.Counter) + ' Sold' + '<span>' + myAdd + '</span>');
//              }
//             });

//         }else{
//           $progressCount.text( percentageText + '%');
//         }
      
//     };

// })(jQuery);

// $(document).ready(function(){
  
//   $('.ProgressBar--animateNone').bekeyProgressbar({
//     animate : false,
//     animateText : false
//   });
  
//   $('.ProgressBar--animateCircle').bekeyProgressbar({
//     animate : true,
//     animateText : false
//   });
  
//   $('.ProgressBar--animateText').bekeyProgressbar({
//     animate : false,
//     animateText : true
//   });
  
//   $('.ProgressBar--animateAll').bekeyProgressbar();
  
// })


// progress bar end

$(".fancybox").on("click", function(){

        $.fancybox({

          href: this.href,

          type: $(this).data("type")

        }); // fancybox

        return false   

    }); // on



	// $('.banner').ripples({

	// 	resolution: 512,

	// 	dropRadius: 20,

	// 	perturbance: 0.04

	// });



  //   if ($(window).width() <= 767){  

  //   $('#sak').click(function(){

  //     alert("sak"); 

  //   });

  // }

  // $(window).resize(function(){

  if ($(window).width() <= 1024){  

    $('.usrNme').click(function(){

      // console.log('123');

      setTimeout(function() { $('li.usrNme ul').slideToggle("slow");},1000);

      // setTimeout(function() { $('li.usrNme ul').slideToggle("slow");},1000);

      // $('.usrNme ul').addClass('myMenuNamWrp');

      // $('.myMenuNamWrp').toggleClass('myMenuNamWrp2');

      // $('.myMenuNamWrp').slideToggle("slow");

      // $(this).addClass('myMenuNam');

    });

  } 



// });

	

	

    $('.filters_buttons .open').click(function(e) {

      e.preventDefault();

      var type = $(this).closest('li').attr('class');

      $('.filters_wrapper').show(200);

      $('.filters_wrapper ul.' + type).show(200);

      $('.filters_wrapper ul:not(.' + type + ')').hide();

    });



    $('.filters_wrapper .close a').click(function(e) {

      e.preventDefault();

      $('.filters_wrapper').hide(200);

    });

function isotopeFilter(domEl, isoWrapper) {



      var filter = domEl.attr('data-rel');

      isoWrapper.isotope({

        filter: filter

      });



      setTimeout(function() {

        $(window).trigger('resize');

      }, 50);



    }



    // Isotope | Fiters | Click ----------



    $('.isotope-filters .filters_wrapper').find('li:not(.close) a').click(function(e) {

      e.preventDefault();



      var isoWrapper = $('.isotope');

      var filters = $(this).closest('.isotope-filters');

      var parent = filters.attr('data-parent');



      if (parent) {

        parent = filters.closest('.' + parent);

        isoWrapper = parent.find('.isotope').first();

      }



      filters.find('li').removeClass('current-cat');

      $(this).closest('li').addClass('current-cat');



      isotopeFilter($(this), isoWrapper);



      setTimeout(function() {

        $(document).trigger('isotope:arrange');

      }, 500);

    });





    // Isotope | Fiters | Reset ----------



    $('.isotope-filters .filters_buttons').find('li.reset a').click(function(e) {

      e.preventDefault();



      $('.isotope-filters .filters_wrapper').find('li').removeClass('current-cat');

      isotopeFilter($(this), $('.isotope'));

    });

 // Portfolio | Active Category

    function portfolioActive() {

      var el = $('.isotope-filters .filters_wrapper');

      var active = el.attr('data-cat');



      if (active) {

        el.find('li.' + active).addClass('current-cat');

        $('.isotope').isotope({

          filter: '.category-' + active

        });

      }

    }

    portfolioActive();



	$('.srchBtn>a').click(function(){

		var srchdata=$('.searchInput').val();

		if(srchdata==""){

			if(!$(this).closest('.srchBtn').hasClass('active')){

				$('.srchArea').fadeIn();

				$(this).closest('.srchBtn').addClass('active')

			}

			else{

				$('.srchArea').fadeOut();

				$(this).closest('.srchBtn').removeClass('active')

			}

		}

		else{

			// window.location.href=window.location.origin+'/bawabat/?s='+$('.searchInput').val();

		}

	});



	$('.srchInpt').on('click', function () {

		$('.searchBar').toggleClass('active');

		// $('.srchInpt').toggleClass('active');

		// $('.srchSlct').toggleClass('active');

	});



	$('.langBtn1').on('click', function () {

		$('.langBtn2').removeClass('active');

		$('.langBtn1').addClass('active');

	});

	$('.langBtn2').on('click', function () {

		$('.langBtn2').addClass('active');

		$('.langBtn1').removeClass('active');

	});



	$('.header .navigation ul li a').click(function () {

		$('.header .navigation ul li a').removeClass('active');

		$(this).addClass('active');

	});



	$('.toShowPopUp').click(function () {

		$('.overlay').fadeIn();

	});

	$('.toClose').click(function () {

		$('.overlay').fadeOut();

	});



	$('.expandBtn').click(function () {

		$('.hiddenRow').slideToggle();

	});

	

	$("li:first-child").addClass("first");$("li:last-child").addClass("last");$("tr:nth-child(odd), .srvceArea li:nth-child(odd)").addClass("alter");$('[href="#"]').attr("href","javascript:;");now=new Date;thecopyrightYear=now.getYear();if(thecopyrightYear<1900)thecopyrightYear=thecopyrightYear+1900;$("#cur-date").html(thecopyrightYear)

	$('#jqcheck').remove();

	

	//var flagTag = $('.widget-content .language-chooser li.active a').html();

	//$('.flagChng span.lngTrnslt').html(flagTag);

	

	$('.header .flagChng > p').click(function () {

		$(this).closest('.flagChng').find('.widget-content').stop(0,0).slideToggle('slow');

	});

	

	$('.catagryPnl  .catagryArea > ul > li:first-child a').addClass('active');

	$('.catagryArea > ul > li > a').click(function () {

		$('.catagryArea > ul > li ul').stop(0,0).slideUp('slow');

		$('.catagryArea > ul > li > a').removeClass('active');

		$(this).addClass('active').closest('li').find('ul').stop(0,0).slideDown('slow');

	});

	

	var windowHgt = $(window).height();

	$('.videoSection').height(windowHgt);



	$('.header .searchBar button[type="submit"]').click(function () {

		$('.header .searchBar input[type="search"]').stop(0,0).slideToggle('slow');

	});



	$( "#pull" ).click(function() {

		$( "#topMenu" ).slideToggle( "slow");

	});



	$(".tgglBtn").click(function() {

		var ths = $(this)

		if(!ths.hasClass('active')){

			ths.closest('figure').find('figcaption').stop(0,0).slideUp('slow');

			ths.addClass('active');

		}else{

			ths.closest('figure').find('figcaption').stop(0,0).slideDown('slow');

			ths.removeClass('active');

		}

	});



	$('.whatSection ul li').hover(function(){

		var imgSrc = $(this).data('src');

		$(this).closest('.whatSection').css("background-image", imgSrc);

		//alert('ok'); 

	});

	$('.devTab li:first-child a').addClass('active');

	$('.home-section-one .tabsSec .tabArea .tabPnl:first-child').fadeIn();

	$('.devTab li a').click(function () {

		var datSrc = $(this).data('tab');

		$('.devTab li a').removeClass('active');

		$(this).addClass('active');

		$('.tabArea .tabPnl').hide();

		$('.tabArea .tabPnl'+datSrc).fadeIn();

	});

	// $(".progress-bar").loading();

	$(".myLoader").fadeOut()



// 	window.onscroll = function() {myFunction()};



// function myFunction() {

//   var winScroll = document.body.scrollTop || document.documentElement.scrollTop;

//   var height = document.documentElement.scrollHeight - document.documentElement.clientHeight;

//   var scrolled = (winScroll / height) * 100;

//   document.getElementById("myBar").style.width = scrolled + "%";

// }



	//  var $container = $('#container'),

	// 	filters = {};



	// $container.isotope({

	// 	itemSelector : '.gllryArea li',

	// 	masonry: {

	// 		columnWidth: 80

	// 	}

	// });



    // filter buttons

   // $('.filter a').click(function(){

   //    var $this = $(this);

   //    // don't proceed if already selected

   //    if ( $this.hasClass('selected') ) {

   //      return;

   //    }

   

   //    var $optionSet = $this.parents('.filter');

   //    // change selected class

   //    $optionSet.find('.selected').removeClass('selected');

   //    $this.addClass('selected');

   

   //    // store filter value in object

   //    // i.e. filters.color = 'red'

   //    var group = $optionSet.attr('data-filter-group');

   //    filters[ group ] = $this.attr('data-filter-value');

   //    // convert object into array

   //    var isoFilters = [];

   //    for ( var prop in filters ) {

   //      isoFilters.push( filters[ prop ] )

   //    }

   //    var selector = isoFilters.join('');

   //    $container.isotope({ filter: selector });



   //    return false;

   //  });

   $('.fancybox').fancybox({



   	'padding'			: 0,



   	'transitionIn'		: 'fadeIn',



   	'transitionOut'		: 'fadeOut',



   	'type'              : 'image',



   	'autoScale'		: true,



   	'changeFade'        : 0



   });

   



   var wow = new WOW({ boxClass: 'wow', animateClass: 'animated', offset: 50, mobile: false }); wow.init();    





   var acc = document.getElementsByClassName("accordion");



var i;







for (i = 0; i < acc.length; i++) {



  acc[i].addEventListener("click", function() {



    this.classList.toggle("active");



    var panel = this.nextElementSibling;



    if (panel.style.maxHeight) {



      panel.style.maxHeight = null;



    } else {



      panel.style.maxHeight = panel.scrollHeight + "px";



    } 



  });



}

 

   

   $('.devAcrdn ul li:first-child h5').addClass('active');	

   $('.devAcrdn ul li:first-child p').show();	

   $("body").delegate(".devAcrdn ul li h5", "click", function() {		

   	$('.devAcrdn ul li h5').removeClass('active');		

   	$('.devAcrdn ul li p').stop(0,0).slideUp('slow');		

   	$(this).addClass('active').closest('li').find('p').stop(0,0).slideDown('slow');	

   });

});

 function closebtn(){
  $('#deliveryEditModal').modal('hide');

}




$(window).scroll(function(){
 

	if(jQuery('html, body').scrollTop() >= 10){


		$('.header').addClass('scrll');

	}else{

		$('.header').removeClass('scrll');

	}

});





$(window).load(function(){

	$('.cycle-slideshow').on('cycle-before', function (opts) { var slideshow = $(this); var img = slideshow.find('.banner-background').css('background-image'); slideshow.css('background-image', img); });

	var progress = $('#progress'), slideshow = $( '.cycle-slideshow' );

	slideshow.on( 'cycle-initialized cycle-before', function( e, opts ) { progress.stop(true).css( 'width', 0 ); });

	slideshow.on( 'cycle-initialized cycle-after', function( e, opts ) { if ( ! slideshow.is('.cycle-paused') ) progress.animate({ width: '100%' }, opts.timeout, 'linear' ); });

	slideshow.on( 'cycle-paused', function( e, opts ) { progress.stop(); });

	slideshow.on( 'cycle-resumed', function( e, opts, timeoutRemaining ) { progress.animate({ width: '100%' }, timeoutRemaining, 'linear' );});

});

const minus = $('.quantity__minus');

  // const plus = $('.quantity__plus');

  const input = $('.quantity__input');

  // minus.click(function(e) {

  //   e.preventDefault();

  //   var value = input.val();

  //   if (value > 1) {

  //     value--;

  //   }

  //   input.val(value);

  // });

  

  // plus.click(function(e) {

  //   e.preventDefault();

  //   var value = input.val();

  //   value++;

  //   input.val(value);

  // })

 // JavaScript for label effects only

	// $(window).load(function(){

	// 	$(".col-12 input").val("");

		

	// 	$(".input-effect input").focusout(function(){

	// 		if($(this).val() != ""){

	// 			$(this).addClass("has-content");

	// 		}else{

	// 			$(this).removeClass("has-content");

	// 		}

	// 	})

	// });

////// Accordion 

$('.accordion .quest-title.active1').addClass('active');

$('#accordion-1').slideDown(300).addClass('open');

function close_accordion_section() {

jQuery('.accordion .quest-title').removeClass('active');

jQuery('.accordion .quest-content').slideUp(300).removeClass('open');

}

jQuery('.quest-title').click(function(e) {

// Grab current anchor value

var currentAttrValue = jQuery(this).attr('href');

if(jQuery(e.target).is('.active')) {

close_accordion_section();

}else {

close_accordion_section();

// Add active class to section title

jQuery(this).addClass('active');

// Open up the hidden content panel

jQuery('.accordion ' + currentAttrValue).slideDown(300).addClass('open'); 

}

e.preventDefault();

});

////// Accordion end 



// if ($(window).width() > 960) {



// 	particlesJS("particles-js", {

// 		"particles": {

// 			"number": { "value": 80, "density": { "enable": true, "value_area": 1000 }  },

// 			"color": { "value": "#000" },

// 			"shape": { "type": "circle", "stroke": { "width": 0, "color": "#000000" },

// 				"polygon": {  "nb_sides": 3 },

// 				"image": { "src": "img/github.svg", "width": 100, "height": 100  }

// 			},

// 			"opacity": { "value": 0.5, "random": false,

// 				"anim": { "enable": false, "speed": 1, "opacity_min": 0.2, "sync": false }

// 			},

// 			"size": { "value": 3, "random": true,

// 				"anim": { "enable": false, "speed": 40, "size_min": 0.1, "sync": false }

// 			},

// 			"line_linked": { "enable": true, "distance": 250, "color": "#000000", "opacity": 0.2, "width": 1 },

// 			"move": {

// 				"enable": true, "speed": 2, "direction": "none", "random": false, "straight": false, "out_mode": "out", "bounce": false,

// 				"attract": { "enable": false, "rotateX": 600, "rotateY": 1200 }

// 			}

// 		},

// 		"interactivity": { "detect_on": "window",

// 			"events": { 

// 				"onhover": { "enable": true, "mode": "grab" },

// 				"onclick": {  "enable": false, "mode": "push" }, "resize": true

// 				},

// 			"modes": { 

// 				"grab": { "distance": 180, "line_linked": { "opacity": 1 }  },

// 				"bubble": {  "distance": 400, "size": 40, "duration": 2, "opacity": 8, "speed": 3 },

// 				"repulse": { "distance": 200, "duration": 0.4  },

// 				"push": { "particles_nb": 4 },

// 				"remove": { "particles_nb": 2 }

// 			}

// 		},

// 		"retina_detect": true

// });



// }

// var _gsScope="undefined"!=typeof module&&module.exports&&"undefined"!=typeof global?global:this||window;(_gsScope._gsQueue||(_gsScope._gsQueue=[])).push(function(){"use strict";var e=Math.PI/180,t=180/Math.PI,r=/[achlmqstvz]|(-?\d*\.?\d*(?:e[\-+]?\d+)?)[0-9]/gi,n=/(?:(-|-=|\+=)?\d*\.?\d*(?:e[\-+]?\d+)?)[0-9]/gi,o=/(^[#\.]|[a-y][a-z])/gi,i=/[achlmqstvz]/gi,a=/[\+\-]?\d*\.?\d+e[\+\-]?\d+/gi,s=_gsScope._gsDefine.globals.TweenLite,h="MorphSVGPlugin",l=String.fromCharCode(103,114,101,101,110,115,111,99,107,46,99,111,109),f=String.fromCharCode(47,114,101,113,117,105,114,101,115,45,109,101,109,98,101,114,115,104,105,112,47),g=function(e){for(var t=-1!==(window?window.location.href:"").indexOf(String.fromCharCode(103,114,101,101,110,115,111,99,107))&&-1!==e.indexOf(String.fromCharCode(108,111,99,97,108,104,111,115,116)),r=[l,String.fromCharCode(99,111,100,101,112,101,110,46,105,111),String.fromCharCode(99,111,100,101,112,101,110,46,112,108,117,109,98,105,110,103),String.fromCharCode(99,111,100,101,112,101,110,46,100,101,118),String.fromCharCode(99,115,115,45,116,114,105,99,107,115,46,99,111,109),String.fromCharCode(99,100,112,110,46,105,111),String.fromCharCode(103,97,110,110,111,110,46,116,118),String.fromCharCode(99,111,100,101,99,97,110,121,111,110,46,110,101,116),String.fromCharCode(116,104,101,109,101,102,111,114,101,115,116,46,110,101,116),String.fromCharCode(99,101,114,101,98,114,97,120,46,99,111,46,117,107),String.fromCharCode(116,121,109,112,97,110,117,115,46,110,101,116),String.fromCharCode(116,119,101,101,110,109,97,120,46,99,111,109),String.fromCharCode(116,119,101,101,110,108,105,116,101,46,99,111,109),String.fromCharCode(112,108,110,107,114,46,99,111),String.fromCharCode(104,111,116,106,97,114,46,99,111,109),String.fromCharCode(119,101,98,112,97,99,107,98,105,110,46,99,111,109),String.fromCharCode(97,114,99,104,105,118,101,46,111,114,103),String.fromCharCode(99,111,100,101,115,97,110,100,98,111,120,46,105,111),String.fromCharCode(115,116,97,99,107,98,108,105,116,122,46,99,111,109),String.fromCharCode(99,111,100,105,101,114,46,105,111),String.fromCharCode(106,115,102,105,100,100,108,101,46,110,101,116)],n=r.length;-1<--n;)if(-1!==e.indexOf(r[n]))return!0;return t&&window&&window.console&&console.log(String.fromCharCode(87,65,82,78,73,78,71,58,32,97,32,115,112,101,99,105,97,108,32,118,101,114,115,105,111,110,32,111,102,32)+h+String.fromCharCode(32,105,115,32,114,117,110,110,105,110,103,32,108,111,99,97,108,108,121,44,32,98,117,116,32,105,116,32,119,105,108,108,32,110,111,116,32,119,111,114,107,32,111,110,32,97,32,108,105,118,101,32,100,111,109,97,105,110,32,98,101,99,97,117,115,101,32,105,116,32,105,115,32,97,32,109,101,109,98,101,114,115,104,105,112,32,98,101,110,101,102,105,116,32,111,102,32,67,108,117,98,32,71,114,101,101,110,83,111,99,107,46,32,80,108,101,97,115,101,32,115,105,103,110,32,117,112,32,97,116,32,104,116,116,112,58,47,47,103,114,101,101,110,115,111,99,107,46,99,111,109,47,99,108,117,98,47,32,97,110,100,32,116,104,101,110,32,100,111,119,110,108,111,97,100,32,116,104,101,32,39,114,101,97,108,39,32,118,101,114,115,105,111,110,32,102,114,111,109,32,121,111,117,114,32,71,114,101,101,110,83,111,99,107,32,97,99,99,111,117,110,116,32,119,104,105,99,104,32,104,97,115,32,110,111,32,115,117,99,104,32,108,105,109,105,116,97,116,105,111,110,115,46,32,84,104,101,32,102,105,108,101,32,121,111,117,39,114,101,32,117,115,105,110,103,32,119,97,115,32,108,105,107,101,108,121,32,100,111,119,110,108,111,97,100,101,100,32,102,114,111,109,32,101,108,115,101,119,104,101,114,101,32,111,110,32,116,104,101,32,119,101,98,32,97,110,100,32,105,115,32,114,101,115,116,114,105,99,116,101,100,32,116,111,32,108,111,99,97,108,32,117,115,101,32,111,114,32,111,110,32,115,105,116,101,115,32,108,105,107,101,32,99,111,100,101,112,101,110,46,105,111,46)),t}(window?window.location.host:""),c=function(e){_gsScope.console&&console.log(e)},u=function(r,n,o,i,a,s,h,l,f){if(r!==l||n!==f){o=Math.abs(o),i=Math.abs(i);var g=a%360*e,c=Math.cos(g),u=Math.sin(g),p=(r-l)/2,d=(n-f)/2,m=c*p+u*d,C=-u*p+c*d,v=o*o,b=i*i,S=m*m,M=C*C,y=S/v+M/b;1<y&&(v=(o=Math.sqrt(y)*o)*o,b=(i=Math.sqrt(y)*i)*i);var A=s===h?-1:1,x=(v*b-v*M-b*S)/(v*M+b*S);x<0&&(x=0);var w=A*Math.sqrt(x),N=w*(o*C/i),_=w*(-i*m/o),z=(r+l)/2+(c*N-u*_),P=(n+f)/2+(u*N+c*_),T=(m-N)/o,L=(C-_)/i,G=(-m-N)/o,q=(-C-_)/i,I=Math.sqrt(T*T+L*L),Y=T,B=(A=L<0?-1:1)*Math.acos(Y/I)*t;I=Math.sqrt((T*T+L*L)*(G*G+q*q)),Y=T*G+L*q;var V=(A=T*q-L*G<0?-1:1)*Math.acos(Y/I)*t;!h&&0<V?V-=360:h&&V<0&&(V+=360);var X,O,R,j=function(t,r){var n,o,i,a,s,h,l=Math.ceil(Math.abs(r)/90),f=0,g=[];for(t*=e,n=(r*=e)/l,o=4/3*Math.sin(n/2)/(1+Math.cos(n/2)),h=0;h<l;h++)i=t+h*n,a=Math.cos(i),s=Math.sin(i),g[f++]=a-o*s,g[f++]=s+o*a,i+=n,a=Math.cos(i),s=Math.sin(i),g[f++]=a+o*s,g[f++]=s-o*a,g[f++]=a,g[f++]=s;return g}(B%=360,V%=360),F=c*o,H=u*o,D=u*-i,Q=c*i,E=j.length-2;for(X=0;X<E;X+=2)O=j[X],R=j[X+1],j[X]=O*F+R*D+z,j[X+1]=O*H+R*Q+P;return j[j.length-2]=l,j[j.length-1]=f,j}},p=function(e){var t,n,o,i,s,h,l,f,g,p,d,m,C,v=(e+"").replace(a,function(e){var t=+e;return t<1e-4&&-1e-4<t?0:t}).match(r)||[],b=[],S=0,M=0,y=v.length,A=2,x=0;if(!e||!isNaN(v[0])||isNaN(v[1]))return c("ERROR: malformed path data: "+e),b;for(t=0;t<y;t++)if(C=s,isNaN(v[t])?h=(s=v[t].toUpperCase())!==v[t]:t--,o=+v[t+1],i=+v[t+2],h&&(o+=S,i+=M),0===t&&(f=o,g=i),"M"===s)l&&l.length<8&&(b.length-=1,A=0),S=f=o,M=g=i,l=[o,i],x+=A,A=2,b.push(l),t+=2,s="L";else if("C"===s)l||(l=[0,0]),l[A++]=o,l[A++]=i,h||(S=M=0),l[A++]=S+1*v[t+3],l[A++]=M+1*v[t+4],l[A++]=S+=1*v[t+5],l[A++]=M+=1*v[t+6],t+=6;else if("S"===s)"C"===C||"S"===C?(p=S-l[A-4],d=M-l[A-3],l[A++]=S+p,l[A++]=M+d):(l[A++]=S,l[A++]=M),l[A++]=o,l[A++]=i,h||(S=M=0),l[A++]=S+=1*v[t+3],l[A++]=M+=1*v[t+4],t+=4;else if("Q"===s)p=o-S,d=i-M,l[A++]=S+2*p/3,l[A++]=M+2*d/3,h||(S=M=0),p=o-(S+=1*v[t+3]),d=i-(M+=1*v[t+4]),l[A++]=S+2*p/3,l[A++]=M+2*d/3,l[A++]=S,l[A++]=M,t+=4;else if("T"===s)p=S-l[A-4],d=M-l[A-3],l[A++]=S+p,l[A++]=M+d,p=S+1.5*p-o,d=M+1.5*d-i,l[A++]=o+2*p/3,l[A++]=i+2*d/3,l[A++]=S=o,l[A++]=M=i,t+=2;else if("H"===s)i=M,l[A++]=S+(o-S)/3,l[A++]=M+(i-M)/3,l[A++]=S+2*(o-S)/3,l[A++]=M+2*(i-M)/3,l[A++]=S=o,l[A++]=i,t+=1;else if("V"===s)i=o,o=S,h&&(i+=M-S),l[A++]=o,l[A++]=M+(i-M)/3,l[A++]=o,l[A++]=M+2*(i-M)/3,l[A++]=o,l[A++]=M=i,t+=1;else if("L"===s||"Z"===s)"Z"===s&&(o=f,i=g,l.closed=!0),("L"===s||.5<Math.abs(S-o)||.5<Math.abs(M-i))&&(l[A++]=S+(o-S)/3,l[A++]=M+(i-M)/3,l[A++]=S+2*(o-S)/3,l[A++]=M+2*(i-M)/3,l[A++]=o,l[A++]=i,"L"===s&&(t+=2)),S=o,M=i;else if("A"===s){if(m=u(S,M,1*v[t+1],1*v[t+2],1*v[t+3],1*v[t+4],1*v[t+5],(h?S:0)+1*v[t+6],(h?M:0)+1*v[t+7]))for(n=0;n<m.length;n++)l[A++]=m[n];S=l[A-2],M=l[A-1],t+=7}else c("Error: malformed path data: "+e);return b.totalPoints=x+A,b},d=function(e,t){var r,n,o,i,a,s,h,l,f,g,c,u,p,d,m=0,C=e.length,v=t/((C-2)/6);for(p=2;p<C;p+=6)for(m+=v;.999999<m;)r=e[p-2],n=e[p-1],o=e[p],i=e[p+1],a=e[p+2],s=e[p+3],h=e[p+4],l=e[p+5],f=r+(o-r)*(d=1/(Math.floor(m)+1)),f+=((c=o+(a-o)*d)-f)*d,c+=(a+(h-a)*d-c)*d,g=n+(i-n)*d,g+=((u=i+(s-i)*d)-g)*d,u+=(s+(l-s)*d-u)*d,e.splice(p,4,r+(o-r)*d,n+(i-n)*d,f,g,f+(c-f)*d,g+(u-g)*d,c,u,a+(h-a)*d,s+(l-s)*d),p+=6,C+=6,m--;return e},m=function(e){var t,r,n,o,i="",a=e.length,s=100;for(r=0;r<a;r++){for(i+="M"+(o=e[r])[0]+","+o[1]+" C",t=o.length,n=2;n<t;n++)i+=(o[n++]*s|0)/s+","+(o[n++]*s|0)/s+" "+(o[n++]*s|0)/s+","+(o[n++]*s|0)/s+" "+(o[n++]*s|0)/s+","+(o[n]*s|0)/s+" ";o.closed&&(i+="z")}return i},C=function(e){for(var t=[],r=e.length-1,n=0;-1<--r;)t[n++]=e[r],t[n++]=e[r+1],r--;for(r=0;r<n;r++)e[r]=t[r];e.reversed=!e.reversed},v=function(e){var t,r=e.length,n=0,o=0;for(t=0;t<r;t++)n+=e[t++],o+=e[t];return[n/(r/2),o/(r/2)]},b=function(e){var t,r,n,o=e.length,i=e[0],a=i,s=e[1],h=s;for(n=6;n<o;n+=6)i<(t=e[n])?i=t:t<a&&(a=t),s<(r=e[n+1])?s=r:r<h&&(h=r);return e.centerX=(i+a)/2,e.centerY=(s+h)/2,e.size=(i-a)*(s-h)},S=function(e){for(var t,r,n,o,i,a=e.length,s=e[0][0],h=s,l=e[0][1],f=l;-1<--a;)for(t=(i=e[a]).length,o=6;o<t;o+=6)s<(r=i[o])?s=r:r<h&&(h=r),l<(n=i[o+1])?l=n:n<f&&(f=n);return e.centerX=(s+h)/2,e.centerY=(l+f)/2,e.size=(s-h)*(l-f)},M=function(e,t){return t.length-e.length},y=function(e,t){var r=e.size||b(e),n=t.size||b(t);return Math.abs(n-r)<(r+n)/20?t.centerX-e.centerX||t.centerY-e.centerY:n-r},A=function(e,t){var r,n,o=e.slice(0),i=e.length,a=i-2;for(t|=0,r=0;r<i;r++)n=(r+t)%a,e[r++]=o[n],e[r]=o[n+1]},x=function(e,t,r,n,o){var i,a,s,h,l=e.length,f=0,g=l-2;for(r*=6,a=0;a<l;a+=6)h=e[i=(a+r)%g]-(t[a]-n),s=e[i+1]-(t[a+1]-o),f+=Math.sqrt(s*s+h*h);return f},w=function(e,t,r){var n,o,i,a=e.length,s=v(e),h=v(t),l=h[0]-s[0],f=h[1]-s[1],g=x(e,t,0,l,f),c=0;for(i=6;i<a;i+=6)(o=x(e,t,i/6,l,f))<g&&(g=o,c=i);if(r)for(n=e.slice(0),C(n),i=6;i<a;i+=6)(o=x(n,t,i/6,l,f))<g&&(g=o,c=-i);return c/6},N=function(e,t,r){for(var n,o,i,a,s,h,l=e.length,f=99999999999,g=0,c=0;-1<--l;)for(h=(n=e[l]).length,s=0;s<h;s+=6)o=n[s]-t,i=n[s+1]-r,(a=Math.sqrt(o*o+i*i))<f&&(f=a,g=n[s],c=n[s+1]);return[g,c]},_=function(e,t,r,n,o,i){var a,s,h,l,f=t.length,g=0,c=Math.min(e.size||b(e),t[r].size||b(t[r]))*n,u=999999999999,p=e.centerX+o,d=e.centerY+i;for(a=r;a<f&&!((t[a].size||b(t[a]))<c);a++)s=t[a].centerX-p,h=t[a].centerY-d,(l=Math.sqrt(s*s+h*h))<u&&(g=a,u=l);return l=t[g],t.splice(g,1),l},z=function(e,t,r,n){var o,i,a,s,h,l,f,g=t.length-e.length,u=0<g?t:e,p=0<g?e:t,m=0,v="complexity"===n?M:y,x="position"===n?0:"number"==typeof n?n:.8,z=p.length,P="object"==typeof r&&r.push?r.slice(0):[r],T="reverse"===P[0]||P[0]<0,L="log"===r;if(p[0]){if(1<u.length&&(e.sort(v),t.sort(v),u.size||S(u),p.size||S(p),l=u.centerX-p.centerX,f=u.centerY-p.centerY,v===y))for(z=0;z<p.length;z++)u.splice(z,0,_(p[z],u,z,x,l,f));if(g)for(g<0&&(g=-g),u[0].length>p[0].length&&d(p[0],(u[0].length-p[0].length)/6|0),z=p.length;m<g;)u[z].size||b(u[z]),s=(a=N(p,u[z].centerX,u[z].centerY))[0],h=a[1],p[z++]=[s,h,s,h,s,h,s,h],p.totalPoints+=8,m++;for(z=0;z<e.length;z++)o=t[z],i=e[z],(g=o.length-i.length)<0?d(o,-g/6|0):0<g&&d(i,g/6|0),T&&!i.reversed&&C(i),(r=P[z]||0===P[z]?P[z]:"auto")&&(i.closed||Math.abs(i[0]-i[i.length-2])<.5&&Math.abs(i[1]-i[i.length-1])<.5?"auto"===r||"log"===r?(P[z]=r=w(i,o,0===z),r<0&&(T=!0,C(i),r=-r),A(i,6*r)):"reverse"!==r&&(z&&r<0&&C(i),A(i,6*(r<0?-r:r))):!T&&("auto"===r&&Math.abs(o[0]-i[0])+Math.abs(o[1]-i[1])+Math.abs(o[o.length-2]-i[i.length-2])+Math.abs(o[o.length-1]-i[i.length-1])>Math.abs(o[0]-i[i.length-2])+Math.abs(o[1]-i[i.length-1])+Math.abs(o[o.length-2]-i[0])+Math.abs(o[o.length-1]-i[1])||r%2)?(C(i),P[z]=-1,T=!0):"auto"===r?P[z]=0:"reverse"===r&&(P[z]=-1),i.closed!==o.closed&&(i.closed=o.closed=!1));return L&&c("shapeIndex:["+P.join(",")+"]"),P}},P=function(e,t,r,n){var o=p(e[0]),i=p(e[1]);z(o,i,t||0===t?t:"auto",r)&&(e[0]=m(o),e[1]=m(i),"log"!==n&&!0!==n||c('precompile:["'+e[0]+'","'+e[1]+'"]'))},T=function(e,t){var r,n,o,i,a,s,h,l=0,f=parseFloat(e[0]),g=parseFloat(e[1]),c=f+","+g+" ";for(r=.5*t/(.5*(o=e.length)-1),n=0;n<o-2;n+=2){if(l+=r,s=parseFloat(e[n+2]),h=parseFloat(e[n+3]),.999999<l)for(a=1/(Math.floor(l)+1),i=1;.999999<l;)c+=(f+(s-f)*a*i).toFixed(2)+","+(g+(h-g)*a*i).toFixed(2)+" ",l--,i++;c+=s+","+h+" ",f=s,g=h}return c},L=function(e){var t=e[0].match(n)||[],r=e[1].match(n)||[],o=r.length-t.length;0<o?e[0]=T(t,o):e[1]=T(r,-o)},G=function(e,t){var r,o,i,a,s,h,l,f,g,c,u,p,d,m,C,v,b,S,M,y,A,x=e.tagName.toLowerCase(),w=.552284749831;return"path"!==x&&e.getBBox?(h=function(e,t){var r,n=_gsScope.document.createElementNS("http://www.w3.org/2000/svg","path"),o=Array.prototype.slice.call(e.attributes),i=o.length;for(t=","+t+",";-1<--i;)r=o[i].nodeName.toLowerCase(),-1===t.indexOf(","+r+",")&&n.setAttributeNS(null,r,o[i].nodeValue);return n}(e,"x,y,width,height,cx,cy,rx,ry,r,x1,x2,y1,y2,points"),"rect"===x?(a=+e.getAttribute("rx")||0,s=+e.getAttribute("ry")||0,o=+e.getAttribute("x")||0,i=+e.getAttribute("y")||0,c=(+e.getAttribute("width")||0)-2*a,u=(+e.getAttribute("height")||0)-2*s,r=a||s?"M"+(v=(m=(d=o+a)+c)+a)+","+(S=i+s)+" V"+(M=S+u)+" C"+[v,y=M+s*w,C=m+a*w,A=M+s,m,A,m-(m-d)/3,A,d+(m-d)/3,A,d,A,p=o+a*(1-w),A,o,y,o,M,o,M-(M-S)/3,o,S+(M-S)/3,o,S,o,b=i+s*(1-w),p,i,d,i,d+(m-d)/3,i,m-(m-d)/3,i,m,i,C,i,v,b,v,S].join(",")+"z":"M"+(o+c)+","+i+" v"+u+" h"+-c+" v"+-u+" h"+c+"z"):"circle"===x||"ellipse"===x?("circle"===x?f=(a=s=+e.getAttribute("r")||0)*w:(a=+e.getAttribute("rx")||0,f=(s=+e.getAttribute("ry")||0)*w),r="M"+((o=+e.getAttribute("cx")||0)+a)+","+(i=+e.getAttribute("cy")||0)+" C"+[o+a,i+f,o+(l=a*w),i+s,o,i+s,o-l,i+s,o-a,i+f,o-a,i,o-a,i-f,o-l,i-s,o,i-s,o+l,i-s,o+a,i-f,o+a,i].join(",")+"z"):"line"===x?r="M"+(e.getAttribute("x1")||0)+","+(e.getAttribute("y1")||0)+" L"+(e.getAttribute("x2")||0)+","+(e.getAttribute("y2")||0):"polyline"!==x&&"polygon"!==x||(r="M"+(o=(g=(e.getAttribute("points")+"").match(n)||[]).shift())+","+(i=g.shift())+" L"+g.join(","),"polygon"===x&&(r+=","+o+","+i+"z")),h.setAttribute("d",r),t&&e.parentNode&&(e.parentNode.insertBefore(h,e),e.parentNode.removeChild(e)),h):e},q=function(e,t,r){var i,a,h="string"==typeof e;return(!h||o.test(e)||(e.match(n)||[]).length<3)&&((i=h?s.selector(e):e&&e[0]?e:[e])&&i[0]?(a=(i=i[0]).nodeName.toUpperCase(),t&&"PATH"!==a&&(i=G(i,!1),a="PATH"),e=i.getAttribute("PATH"===a?"d":"points")||"",i===r&&(e=i.getAttributeNS(null,"data-original")||e)):(c("WARNING: invalid morph to: "+e),e=!1)),e},I="Use MorphSVGPlugin.convertToPath(elementOrSelectorText) to convert to a path before morphing.",Y=_gsScope._gsDefine.plugin({propName:"morphSVG",API:2,global:!0,version:"0.8.10",init:function(e,t,r,o){var a,s,u,p,d,m,C,v,b;return"function"==typeof e.setAttribute&&(g?("function"==typeof t&&(t=t(o,e)),d="POLYLINE"===(a=e.nodeName.toUpperCase())||"POLYGON"===a,"PATH"===a||d?(s="PATH"===a?"d":"points",("string"==typeof t||t.getBBox||t[0])&&(t={shape:t}),p=q(t.shape||t.d||t.points||"","d"===s,e),d&&i.test(p)?(c("WARNING: a <"+a+"> cannot accept path data. "+I),!1):(p&&((this._target=e).getAttributeNS(null,"data-original")||e.setAttributeNS(null,"data-original",e.getAttribute(s)),(u=this._addTween(e,"setAttribute",e.getAttribute(s)+"",p+"","morphSVG",!1,s,"object"==typeof t.precompile?function(e){e[0]=t.precompile[0],e[1]=t.precompile[1]}:"d"===s?(m=t.shapeIndex,C=t.map||Y.defaultMap,v=t.precompile,C||v||m||0===m?function(e){P(e,m,C,v)}:P):(b=t.shapeIndex,isNaN(b)?L:function(e){L(e),e[1]=function(e,t){if(!t)return e;var r,o,i,a=e.match(n)||[],s=a.length,h="";for("reverse"===t?(o=s-1,r=-2):(o=(2*(parseInt(t,10)||0)+1+100*s)%s,r=2),i=0;i<s;i+=2)h+=a[o-1]+","+a[o]+" ",o=(o+r)%s;return h}(e[1],parseInt(b,10))})))&&(this._overwriteProps.push("morphSVG"),u.end=p,u.endProp=s)),g)):(c("WARNING: cannot morph a <"+a+"> SVG element. "+I),!1)):(window.location.href="http://"+l+f+"?plugin="+h+"&source=codepen",!1))},set:function(e){var t;if(this._super.setRatio.call(this,e),1===e)for(t=this._firstPT;t;)t.end&&this._target.setAttribute(t.endProp,t.end),t=t._next}});Y.pathFilter=P,Y.pointsFilter=L,Y.subdivideRawBezier=d,Y.defaultMap="size",Y.pathDataToRawBezier=function(e){return p(q(e,!0))},Y.equalizeSegmentQuantity=z,Y.convertToPath=function(e,t){"string"==typeof e&&(e=s.selector(e));for(var r=e&&0!==e.length?e.length&&e[0]&&e[0].nodeType?Array.prototype.slice.call(e,0):[e]:[],n=r.length;-1<--n;)r[n]=G(r[n],!1!==t);return r},Y.pathDataToBezier=function(e,t){var r,n,o,i,a,h,l,f,g=p(q(e,!0))[0]||[],c=0;if(f=(t=t||{}).align||t.relative,i=t.matrix||[1,0,0,1,0,0],a=t.offsetX||0,h=t.offsetY||0,"relative"===f||!0===f?(a-=g[0]*i[0]+g[1]*i[2],h-=g[0]*i[1]+g[1]*i[3],c="+="):(a+=i[4],h+=i[5],f&&(f="string"==typeof f?s.selector(f):f&&f[0]?f:[f])&&f[0]&&(a-=(l=f[0].getBBox()||{x:0,y:0}).x,h-=l.y)),r=[],o=g.length,i&&"1,0,0,1,0,0"!==i.join(","))for(n=0;n<o;n+=2)r.push({x:c+(g[n]*i[0]+g[n+1]*i[2]+a),y:c+(g[n]*i[1]+g[n+1]*i[3]+h)});else for(n=0;n<o;n+=2)r.push({x:c+(g[n]+a),y:c+(g[n+1]+h)});return r}}),_gsScope._gsDefine&&_gsScope._gsQueue.pop()(),function(e){"use strict";var t=function(){return(_gsScope.GreenSockGlobals||_gsScope).MorphSVGPlugin};"function"==typeof define&&define.amd?define(["TweenLite"],t):"undefined"!=typeof module&&module.exports&&(require("../TweenLite.js"),module.exports=t())}();

// var _gsScope="undefined"!=typeof module&&module.exports&&"undefined"!=typeof global?global:this||window;(_gsScope._gsQueue||(_gsScope._gsQueue=[])).push(function(){"use strict";var t,e,i,s,r,n,a,o,l,h,_,u,f,c,p,m;_gsScope._gsDefine("TweenMax",["core.Animation","core.SimpleTimeline","TweenLite"],function(t,e,i){var s=function(t){var e,i=[],s=t.length;for(e=0;e!==s;i.push(t[e++]));return i},r=function(t,e,i){var s,r,n=t.cycle;for(s in n)r=n[s],t[s]="function"==typeof r?r.call(e[i],i):r[i%r.length];delete t.cycle},n=function(t,e,s){i.call(this,t,e,s),this._cycle=0,this._yoyo=!0===this.vars.yoyo,this._repeat=this.vars.repeat||0,this._repeatDelay=this.vars.repeatDelay||0,this._dirty=!0,this.render=n.prototype.render},a=1e-10,o=i._internals,l=o.isSelector,h=o.isArray,_=n.prototype=i.to({},.1,{}),u=[];n.version="1.18.3",_.constructor=n,_.kill()._gc=!1,n.killTweensOf=n.killDelayedCallsTo=i.killTweensOf,n.getTweensOf=i.getTweensOf,n.lagSmoothing=i.lagSmoothing,n.ticker=i.ticker,n.render=i.render,_.invalidate=function(){return this._yoyo=!0===this.vars.yoyo,this._repeat=this.vars.repeat||0,this._repeatDelay=this.vars.repeatDelay||0,this._uncache(!0),i.prototype.invalidate.call(this)},_.updateTo=function(t,e){var s,r=this.ratio,n=this.vars.immediateRender||t.immediateRender;e&&this._startTime<this._timeline._time&&(this._startTime=this._timeline._time,this._uncache(!1),this._gc?this._enabled(!0,!1):this._timeline.insert(this,this._startTime-this._delay));for(s in t)this.vars[s]=t[s];if(this._initted||n)if(e)this._initted=!1,n&&this.render(0,!0,!0);else if(this._gc&&this._enabled(!0,!1),this._notifyPluginsOfEnabled&&this._firstPT&&i._onPluginEvent("_onDisable",this),this._time/this._duration>.998){var a=this._totalTime;this.render(0,!0,!1),this._initted=!1,this.render(a,!0,!1)}else if(this._initted=!1,this._init(),this._time>0||n)for(var o,l=1/(1-r),h=this._firstPT;h;)o=h.s+h.c,h.c*=l,h.s=o-h.c,h=h._next;return this},_.render=function(t,e,i){this._initted||0===this._duration&&this.vars.repeat&&this.invalidate();var s,r,n,l,h,_,u,f,c=this._dirty?this.totalDuration():this._totalDuration,p=this._time,m=this._totalTime,d=this._cycle,g=this._duration,v=this._rawPrevTime;if(t>=c-1e-7?(this._totalTime=c,this._cycle=this._repeat,this._yoyo&&0!=(1&this._cycle)?(this._time=0,this.ratio=this._ease._calcEnd?this._ease.getRatio(0):0):(this._time=g,this.ratio=this._ease._calcEnd?this._ease.getRatio(1):1),this._reversed||(s=!0,r="onComplete",i=i||this._timeline.autoRemoveChildren),0===g&&(this._initted||!this.vars.lazy||i)&&(this._startTime===this._timeline._duration&&(t=0),(0>v||0>=t&&t>=-1e-7||v===a&&"isPause"!==this.data)&&v!==t&&(i=!0,v>a&&(r="onReverseComplete")),this._rawPrevTime=f=!e||t||v===t?t:a)):1e-7>t?(this._totalTime=this._time=this._cycle=0,this.ratio=this._ease._calcEnd?this._ease.getRatio(0):0,(0!==m||0===g&&v>0)&&(r="onReverseComplete",s=this._reversed),0>t&&(this._active=!1,0===g&&(this._initted||!this.vars.lazy||i)&&(v>=0&&(i=!0),this._rawPrevTime=f=!e||t||v===t?t:a)),this._initted||(i=!0)):(this._totalTime=this._time=t,0!==this._repeat&&(l=g+this._repeatDelay,this._cycle=this._totalTime/l>>0,0!==this._cycle&&this._cycle===this._totalTime/l&&t>=m&&this._cycle--,this._time=this._totalTime-this._cycle*l,this._yoyo&&0!=(1&this._cycle)&&(this._time=g-this._time),this._time>g?this._time=g:this._time<0&&(this._time=0)),this._easeType?(h=this._time/g,_=this._easeType,u=this._easePower,(1===_||3===_&&h>=.5)&&(h=1-h),3===_&&(h*=2),1===u?h*=h:2===u?h*=h*h:3===u?h*=h*h*h:4===u&&(h*=h*h*h*h),1===_?this.ratio=1-h:2===_?this.ratio=h:this._time/g<.5?this.ratio=h/2:this.ratio=1-h/2):this.ratio=this._ease.getRatio(this._time/g)),p!==this._time||i||d!==this._cycle){if(!this._initted){if(this._init(),!this._initted||this._gc)return;if(!i&&this._firstPT&&(!1!==this.vars.lazy&&this._duration||this.vars.lazy&&!this._duration))return this._time=p,this._totalTime=m,this._rawPrevTime=v,this._cycle=d,o.lazyTweens.push(this),void(this._lazy=[t,e]);this._time&&!s?this.ratio=this._ease.getRatio(this._time/g):s&&this._ease._calcEnd&&(this.ratio=this._ease.getRatio(0===this._time?0:1))}for(!1!==this._lazy&&(this._lazy=!1),this._active||!this._paused&&this._time!==p&&t>=0&&(this._active=!0),0===m&&(2===this._initted&&t>0&&this._init(),this._startAt&&(t>=0?this._startAt.render(t,e,i):r||(r="_dummyGS")),this.vars.onStart&&(0!==this._totalTime||0===g)&&(e||this._callback("onStart"))),n=this._firstPT;n;)n.f?n.t[n.p](n.c*this.ratio+n.s):n.t[n.p]=n.c*this.ratio+n.s,n=n._next;this._onUpdate&&(0>t&&this._startAt&&this._startTime&&this._startAt.render(t,e,i),e||(this._totalTime!==m||r)&&this._callback("onUpdate")),this._cycle!==d&&(e||this._gc||this.vars.onRepeat&&this._callback("onRepeat")),r&&(!this._gc||i)&&(0>t&&this._startAt&&!this._onUpdate&&this._startTime&&this._startAt.render(t,e,i),s&&(this._timeline.autoRemoveChildren&&this._enabled(!1,!1),this._active=!1),!e&&this.vars[r]&&this._callback(r),0===g&&this._rawPrevTime===a&&f!==a&&(this._rawPrevTime=0))}else m!==this._totalTime&&this._onUpdate&&(e||this._callback("onUpdate"))},n.to=function(t,e,i){return new n(t,e,i)},n.from=function(t,e,i){return i.runBackwards=!0,i.immediateRender=0!=i.immediateRender,new n(t,e,i)},n.fromTo=function(t,e,i,s){return s.startAt=i,s.immediateRender=0!=s.immediateRender&&0!=i.immediateRender,new n(t,e,s)},n.staggerTo=n.allTo=function(t,e,a,o,_,f,c){o=o||0;var p,m,d,g,v=0,y=[],T=function(){a.onComplete&&a.onComplete.apply(a.onCompleteScope||this,arguments),_.apply(c||a.callbackScope||this,f||u)},x=a.cycle,b=a.startAt&&a.startAt.cycle;for(h(t)||("string"==typeof t&&(t=i.selector(t)||t),l(t)&&(t=s(t))),t=t||[],0>o&&((t=s(t)).reverse(),o*=-1),p=t.length-1,d=0;p>=d;d++){m={};for(g in a)m[g]=a[g];if(x&&r(m,t,d),b){b=m.startAt={};for(g in a.startAt)b[g]=a.startAt[g];r(m.startAt,t,d)}m.delay=v+(m.delay||0),d===p&&_&&(m.onComplete=T),y[d]=new n(t[d],e,m),v+=o}return y},n.staggerFrom=n.allFrom=function(t,e,i,s,r,a,o){return i.runBackwards=!0,i.immediateRender=0!=i.immediateRender,n.staggerTo(t,e,i,s,r,a,o)},n.staggerFromTo=n.allFromTo=function(t,e,i,s,r,a,o,l){return s.startAt=i,s.immediateRender=0!=s.immediateRender&&0!=i.immediateRender,n.staggerTo(t,e,s,r,a,o,l)},n.delayedCall=function(t,e,i,s,r){return new n(e,0,{delay:t,onComplete:e,onCompleteParams:i,callbackScope:s,onReverseComplete:e,onReverseCompleteParams:i,immediateRender:!1,useFrames:r,overwrite:0})},n.set=function(t,e){return new n(t,0,e)},n.isTweening=function(t){return i.getTweensOf(t,!0).length>0};var f=function(t,e){for(var s=[],r=0,n=t._first;n;)n instanceof i?s[r++]=n:(e&&(s[r++]=n),s=s.concat(f(n,e)),r=s.length),n=n._next;return s},c=n.getAllTweens=function(e){return f(t._rootTimeline,e).concat(f(t._rootFramesTimeline,e))};n.killAll=function(t,i,s,r){null==i&&(i=!0),null==s&&(s=!0);var n,a,o,l=c(0!=r),h=l.length,_=i&&s&&r;for(o=0;h>o;o++)a=l[o],(_||a instanceof e||(n=a.target===a.vars.onComplete)&&s||i&&!n)&&(t?a.totalTime(a._reversed?0:a.totalDuration()):a._enabled(!1,!1))},n.killChildTweensOf=function(t,e){if(null!=t){var r,a,_,u,f,c=o.tweenLookup;if("string"==typeof t&&(t=i.selector(t)||t),l(t)&&(t=s(t)),h(t))for(u=t.length;--u>-1;)n.killChildTweensOf(t[u],e);else{r=[];for(_ in c)for(a=c[_].target.parentNode;a;)a===t&&(r=r.concat(c[_].tweens)),a=a.parentNode;for(f=r.length,u=0;f>u;u++)e&&r[u].totalTime(r[u].totalDuration()),r[u]._enabled(!1,!1)}}};var p=function(t,i,s,r){i=!1!==i,s=!1!==s;for(var n,a,o=c(r=!1!==r),l=i&&s&&r,h=o.length;--h>-1;)a=o[h],(l||a instanceof e||(n=a.target===a.vars.onComplete)&&s||i&&!n)&&a.paused(t)};return n.pauseAll=function(t,e,i){p(!0,t,e,i)},n.resumeAll=function(t,e,i){p(!1,t,e,i)},n.globalTimeScale=function(e){var s=t._rootTimeline,r=i.ticker.time;return arguments.length?(e=e||a,s._startTime=r-(r-s._startTime)*s._timeScale/e,s=t._rootFramesTimeline,r=i.ticker.frame,s._startTime=r-(r-s._startTime)*s._timeScale/e,s._timeScale=t._rootTimeline._timeScale=e,e):s._timeScale},_.progress=function(t,e){return arguments.length?this.totalTime(this.duration()*(this._yoyo&&0!=(1&this._cycle)?1-t:t)+this._cycle*(this._duration+this._repeatDelay),e):this._time/this.duration()},_.totalProgress=function(t,e){return arguments.length?this.totalTime(this.totalDuration()*t,e):this._totalTime/this.totalDuration()},_.time=function(t,e){return arguments.length?(this._dirty&&this.totalDuration(),t>this._duration&&(t=this._duration),this._yoyo&&0!=(1&this._cycle)?t=this._duration-t+this._cycle*(this._duration+this._repeatDelay):0!==this._repeat&&(t+=this._cycle*(this._duration+this._repeatDelay)),this.totalTime(t,e)):this._time},_.duration=function(e){return arguments.length?t.prototype.duration.call(this,e):this._duration},_.totalDuration=function(t){return arguments.length?-1===this._repeat?this:this.duration((t-this._repeat*this._repeatDelay)/(this._repeat+1)):(this._dirty&&(this._totalDuration=-1===this._repeat?999999999999:this._duration*(this._repeat+1)+this._repeatDelay*this._repeat,this._dirty=!1),this._totalDuration)},_.repeat=function(t){return arguments.length?(this._repeat=t,this._uncache(!0)):this._repeat},_.repeatDelay=function(t){return arguments.length?(this._repeatDelay=t,this._uncache(!0)):this._repeatDelay},_.yoyo=function(t){return arguments.length?(this._yoyo=t,this):this._yoyo},n},!0),_gsScope._gsDefine("TimelineLite",["core.Animation","core.SimpleTimeline","TweenLite"],function(t,e,i){var s=function(t){e.call(this,t),this._labels={},this.autoRemoveChildren=!0===this.vars.autoRemoveChildren,this.smoothChildTiming=!0===this.vars.smoothChildTiming,this._sortChildren=!0,this._onUpdate=this.vars.onUpdate;var i,s,r=this.vars;for(s in r)i=r[s],l(i)&&-1!==i.join("").indexOf("{self}")&&(r[s]=this._swapSelfInParams(i));l(r.tweens)&&this.add(r.tweens,0,r.align,r.stagger)},r=1e-10,n=i._internals,a=s._internals={},o=n.isSelector,l=n.isArray,h=n.lazyTweens,_=n.lazyRender,u=_gsScope._gsDefine.globals,f=function(t){var e,i={};for(e in t)i[e]=t[e];return i},c=function(t,e,i){var s,r,n=t.cycle;for(s in n)r=n[s],t[s]="function"==typeof r?r.call(e[i],i):r[i%r.length];delete t.cycle},p=a.pauseCallback=function(){},m=function(t){var e,i=[],s=t.length;for(e=0;e!==s;i.push(t[e++]));return i},d=s.prototype=new e;return s.version="1.18.3",d.constructor=s,d.kill()._gc=d._forcingPlayhead=d._hasPause=!1,d.to=function(t,e,s,r){var n=s.repeat&&u.TweenMax||i;return e?this.add(new n(t,e,s),r):this.set(t,s,r)},d.from=function(t,e,s,r){return this.add((s.repeat&&u.TweenMax||i).from(t,e,s),r)},d.fromTo=function(t,e,s,r,n){var a=r.repeat&&u.TweenMax||i;return e?this.add(a.fromTo(t,e,s,r),n):this.set(t,r,n)},d.staggerTo=function(t,e,r,n,a,l,h,_){var u,p,d=new s({onComplete:l,onCompleteParams:h,callbackScope:_,smoothChildTiming:this.smoothChildTiming}),g=r.cycle;for("string"==typeof t&&(t=i.selector(t)||t),o(t=t||[])&&(t=m(t)),0>(n=n||0)&&((t=m(t)).reverse(),n*=-1),p=0;p<t.length;p++)u=f(r),u.startAt&&(u.startAt=f(u.startAt),u.startAt.cycle&&c(u.startAt,t,p)),g&&c(u,t,p),d.to(t[p],e,u,p*n);return this.add(d,a)},d.staggerFrom=function(t,e,i,s,r,n,a,o){return i.immediateRender=0!=i.immediateRender,i.runBackwards=!0,this.staggerTo(t,e,i,s,r,n,a,o)},d.staggerFromTo=function(t,e,i,s,r,n,a,o,l){return s.startAt=i,s.immediateRender=0!=s.immediateRender&&0!=i.immediateRender,this.staggerTo(t,e,s,r,n,a,o,l)},d.call=function(t,e,s,r){return this.add(i.delayedCall(0,t,e,s),r)},d.set=function(t,e,s){return s=this._parseTimeOrLabel(s,0,!0),null==e.immediateRender&&(e.immediateRender=s===this._time&&!this._paused),this.add(new i(t,0,e),s)},s.exportRoot=function(t,e){null==(t=t||{}).smoothChildTiming&&(t.smoothChildTiming=!0);var r,n,a=new s(t),o=a._timeline;for(null==e&&(e=!0),o._remove(a,!0),a._startTime=0,a._rawPrevTime=a._time=a._totalTime=o._time,r=o._first;r;)n=r._next,e&&r instanceof i&&r.target===r.vars.onComplete||a.add(r,r._startTime-r._delay),r=n;return o.add(a,0),a},d.add=function(r,n,a,o){var h,_,u,f,c,p;if("number"!=typeof n&&(n=this._parseTimeOrLabel(n,0,!0,r)),!(r instanceof t)){if(r instanceof Array||r&&r.push&&l(r)){for(a=a||"normal",o=o||0,h=n,_=r.length,u=0;_>u;u++)l(f=r[u])&&(f=new s({tweens:f})),this.add(f,h),"string"!=typeof f&&"function"!=typeof f&&("sequence"===a?h=f._startTime+f.totalDuration()/f._timeScale:"start"===a&&(f._startTime-=f.delay())),h+=o;return this._uncache(!0)}if("string"==typeof r)return this.addLabel(r,n);if("function"!=typeof r)throw"Cannot add "+r+" into the timeline; it is not a tween, timeline, function, or string.";r=i.delayedCall(0,r)}if(e.prototype.add.call(this,r,n),(this._gc||this._time===this._duration)&&!this._paused&&this._duration<this.duration())for(c=this,p=c.rawTime()>r._startTime;c._timeline;)p&&c._timeline.smoothChildTiming?c.totalTime(c._totalTime,!0):c._gc&&c._enabled(!0,!1),c=c._timeline;return this},d.remove=function(e){if(e instanceof t){this._remove(e,!1);var i=e._timeline=e.vars.useFrames?t._rootFramesTimeline:t._rootTimeline;return e._startTime=(e._paused?e._pauseTime:i._time)-(e._reversed?e.totalDuration()-e._totalTime:e._totalTime)/e._timeScale,this}if(e instanceof Array||e&&e.push&&l(e)){for(var s=e.length;--s>-1;)this.remove(e[s]);return this}return"string"==typeof e?this.removeLabel(e):this.kill(null,e)},d._remove=function(t,i){e.prototype._remove.call(this,t,i);var s=this._last;return s?this._time>s._startTime+s._totalDuration/s._timeScale&&(this._time=this.duration(),this._totalTime=this._totalDuration):this._time=this._totalTime=this._duration=this._totalDuration=0,this},d.append=function(t,e){return this.add(t,this._parseTimeOrLabel(null,e,!0,t))},d.insert=d.insertMultiple=function(t,e,i,s){return this.add(t,e||0,i,s)},d.appendMultiple=function(t,e,i,s){return this.add(t,this._parseTimeOrLabel(null,e,!0,t),i,s)},d.addLabel=function(t,e){return this._labels[t]=this._parseTimeOrLabel(e),this},d.addPause=function(t,e,s,r){var n=i.delayedCall(0,p,s,r||this);return n.vars.onComplete=n.vars.onReverseComplete=e,n.data="isPause",this._hasPause=!0,this.add(n,t)},d.removeLabel=function(t){return delete this._labels[t],this},d.getLabelTime=function(t){return null!=this._labels[t]?this._labels[t]:-1},d._parseTimeOrLabel=function(e,i,s,r){var n;if(r instanceof t&&r.timeline===this)this.remove(r);else if(r&&(r instanceof Array||r.push&&l(r)))for(n=r.length;--n>-1;)r[n]instanceof t&&r[n].timeline===this&&this.remove(r[n]);if("string"==typeof i)return this._parseTimeOrLabel(i,s&&"number"==typeof e&&null==this._labels[i]?e-this.duration():0,s);if(i=i||0,"string"!=typeof e||!isNaN(e)&&null==this._labels[e])null==e&&(e=this.duration());else{if(-1===(n=e.indexOf("=")))return null==this._labels[e]?s?this._labels[e]=this.duration()+i:i:this._labels[e]+i;i=parseInt(e.charAt(n-1)+"1",10)*Number(e.substr(n+1)),e=n>1?this._parseTimeOrLabel(e.substr(0,n-1),0,s):this.duration()}return Number(e)+i},d.seek=function(t,e){return this.totalTime("number"==typeof t?t:this._parseTimeOrLabel(t),!1!==e)},d.stop=function(){return this.paused(!0)},d.gotoAndPlay=function(t,e){return this.play(t,e)},d.gotoAndStop=function(t,e){return this.pause(t,e)},d.render=function(t,e,i){this._gc&&this._enabled(!0,!1);var s,n,a,o,l,u,f,c=this._dirty?this.totalDuration():this._totalDuration,p=this._time,m=this._startTime,d=this._timeScale,g=this._paused;if(t>=c-1e-7)this._totalTime=this._time=c,this._reversed||this._hasPausedChild()||(n=!0,o="onComplete",l=!!this._timeline.autoRemoveChildren,0===this._duration&&(0>=t&&t>=-1e-7||this._rawPrevTime<0||this._rawPrevTime===r)&&this._rawPrevTime!==t&&this._first&&(l=!0,this._rawPrevTime>r&&(o="onReverseComplete"))),this._rawPrevTime=this._duration||!e||t||this._rawPrevTime===t?t:r,t=c+1e-4;else if(1e-7>t)if(this._totalTime=this._time=0,(0!==p||0===this._duration&&this._rawPrevTime!==r&&(this._rawPrevTime>0||0>t&&this._rawPrevTime>=0))&&(o="onReverseComplete",n=this._reversed),0>t)this._active=!1,this._timeline.autoRemoveChildren&&this._reversed?(l=n=!0,o="onReverseComplete"):this._rawPrevTime>=0&&this._first&&(l=!0),this._rawPrevTime=t;else{if(this._rawPrevTime=this._duration||!e||t||this._rawPrevTime===t?t:r,0===t&&n)for(s=this._first;s&&0===s._startTime;)s._duration||(n=!1),s=s._next;t=0,this._initted||(l=!0)}else{if(this._hasPause&&!this._forcingPlayhead&&!e){if(t>=p)for(s=this._first;s&&s._startTime<=t&&!u;)s._duration||"isPause"!==s.data||s.ratio||0===s._startTime&&0===this._rawPrevTime||(u=s),s=s._next;else for(s=this._last;s&&s._startTime>=t&&!u;)s._duration||"isPause"===s.data&&s._rawPrevTime>0&&(u=s),s=s._prev;u&&(this._time=t=u._startTime,this._totalTime=t+this._cycle*(this._totalDuration+this._repeatDelay))}this._totalTime=this._time=this._rawPrevTime=t}if(this._time!==p&&this._first||i||l||u){if(this._initted||(this._initted=!0),this._active||!this._paused&&this._time!==p&&t>0&&(this._active=!0),0===p&&this.vars.onStart&&0!==this._time&&(e||this._callback("onStart")),(f=this._time)>=p)for(s=this._first;s&&(a=s._next,f===this._time&&(!this._paused||g));)(s._active||s._startTime<=f&&!s._paused&&!s._gc)&&(u===s&&this.pause(),s._reversed?s.render((s._dirty?s.totalDuration():s._totalDuration)-(t-s._startTime)*s._timeScale,e,i):s.render((t-s._startTime)*s._timeScale,e,i)),s=a;else for(s=this._last;s&&(a=s._prev,f===this._time&&(!this._paused||g));){if(s._active||s._startTime<=p&&!s._paused&&!s._gc){if(u===s){for(u=s._prev;u&&u.endTime()>this._time;)u.render(u._reversed?u.totalDuration()-(t-u._startTime)*u._timeScale:(t-u._startTime)*u._timeScale,e,i),u=u._prev;u=null,this.pause()}s._reversed?s.render((s._dirty?s.totalDuration():s._totalDuration)-(t-s._startTime)*s._timeScale,e,i):s.render((t-s._startTime)*s._timeScale,e,i)}s=a}this._onUpdate&&(e||(h.length&&_(),this._callback("onUpdate"))),o&&(this._gc||(m===this._startTime||d!==this._timeScale)&&(0===this._time||c>=this.totalDuration())&&(n&&(h.length&&_(),this._timeline.autoRemoveChildren&&this._enabled(!1,!1),this._active=!1),!e&&this.vars[o]&&this._callback(o)))}},d._hasPausedChild=function(){for(var t=this._first;t;){if(t._paused||t instanceof s&&t._hasPausedChild())return!0;t=t._next}return!1},d.getChildren=function(t,e,s,r){r=r||-9999999999;for(var n=[],a=this._first,o=0;a;)a._startTime<r||(a instanceof i?!1!==e&&(n[o++]=a):(!1!==s&&(n[o++]=a),!1!==t&&(n=n.concat(a.getChildren(!0,e,s)),o=n.length))),a=a._next;return n},d.getTweensOf=function(t,e){var s,r,n=this._gc,a=[],o=0;for(n&&this._enabled(!0,!0),r=(s=i.getTweensOf(t)).length;--r>-1;)(s[r].timeline===this||e&&this._contains(s[r]))&&(a[o++]=s[r]);return n&&this._enabled(!1,!0),a},d.recent=function(){return this._recent},d._contains=function(t){for(var e=t.timeline;e;){if(e===this)return!0;e=e.timeline}return!1},d.shiftChildren=function(t,e,i){i=i||0;for(var s,r=this._first,n=this._labels;r;)r._startTime>=i&&(r._startTime+=t),r=r._next;if(e)for(s in n)n[s]>=i&&(n[s]+=t);return this._uncache(!0)},d._kill=function(t,e){if(!t&&!e)return this._enabled(!1,!1);for(var i=e?this.getTweensOf(e):this.getChildren(!0,!0,!1),s=i.length,r=!1;--s>-1;)i[s]._kill(t,e)&&(r=!0);return r},d.clear=function(t){var e=this.getChildren(!1,!0,!0),i=e.length;for(this._time=this._totalTime=0;--i>-1;)e[i]._enabled(!1,!1);return!1!==t&&(this._labels={}),this._uncache(!0)},d.invalidate=function(){for(var e=this._first;e;)e.invalidate(),e=e._next;return t.prototype.invalidate.call(this)},d._enabled=function(t,i){if(t===this._gc)for(var s=this._first;s;)s._enabled(t,!0),s=s._next;return e.prototype._enabled.call(this,t,i)},d.totalTime=function(e,i,s){this._forcingPlayhead=!0;var r=t.prototype.totalTime.apply(this,arguments);return this._forcingPlayhead=!1,r},d.duration=function(t){return arguments.length?(0!==this.duration()&&0!==t&&this.timeScale(this._duration/t),this):(this._dirty&&this.totalDuration(),this._duration)},d.totalDuration=function(t){if(!arguments.length){if(this._dirty){for(var e,i,s=0,r=this._last,n=999999999999;r;)e=r._prev,r._dirty&&r.totalDuration(),r._startTime>n&&this._sortChildren&&!r._paused?this.add(r,r._startTime-r._delay):n=r._startTime,r._startTime<0&&!r._paused&&(s-=r._startTime,this._timeline.smoothChildTiming&&(this._startTime+=r._startTime/this._timeScale),this.shiftChildren(-r._startTime,!1,-9999999999),n=0),i=r._startTime+r._totalDuration/r._timeScale,i>s&&(s=i),r=e;this._duration=this._totalDuration=s,this._dirty=!1}return this._totalDuration}return t&&this.totalDuration()?this.timeScale(this._totalDuration/t):this},d.paused=function(e){if(!e)for(var i=this._first,s=this._time;i;)i._startTime===s&&"isPause"===i.data&&(i._rawPrevTime=0),i=i._next;return t.prototype.paused.apply(this,arguments)},d.usesFrames=function(){for(var e=this._timeline;e._timeline;)e=e._timeline;return e===t._rootFramesTimeline},d.rawTime=function(){return this._paused?this._totalTime:(this._timeline.rawTime()-this._startTime)*this._timeScale},s},!0),_gsScope._gsDefine("TimelineMax",["TimelineLite","TweenLite","easing.Ease"],function(t,e,i){var s=function(e){t.call(this,e),this._repeat=this.vars.repeat||0,this._repeatDelay=this.vars.repeatDelay||0,this._cycle=0,this._yoyo=!0===this.vars.yoyo,this._dirty=!0},r=1e-10,n=e._internals,a=n.lazyTweens,o=n.lazyRender,l=new i(null,null,1,0),h=s.prototype=new t;return h.constructor=s,h.kill()._gc=!1,s.version="1.18.3",h.invalidate=function(){return this._yoyo=!0===this.vars.yoyo,this._repeat=this.vars.repeat||0,this._repeatDelay=this.vars.repeatDelay||0,this._uncache(!0),t.prototype.invalidate.call(this)},h.addCallback=function(t,i,s,r){return this.add(e.delayedCall(0,t,s,r),i)},h.removeCallback=function(t,e){if(t)if(null==e)this._kill(null,t);else for(var i=this.getTweensOf(t,!1),s=i.length,r=this._parseTimeOrLabel(e);--s>-1;)i[s]._startTime===r&&i[s]._enabled(!1,!1);return this},h.removePause=function(e){return this.removeCallback(t._internals.pauseCallback,e)},h.tweenTo=function(t,i){i=i||{};var s,r,n,a={ease:l,useFrames:this.usesFrames(),immediateRender:!1};for(r in i)a[r]=i[r];return a.time=this._parseTimeOrLabel(t),s=Math.abs(Number(a.time)-this._time)/this._timeScale||.001,n=new e(this,s,a),a.onStart=function(){n.target.paused(!0),n.vars.time!==n.target.time()&&s===n.duration()&&n.duration(Math.abs(n.vars.time-n.target.time())/n.target._timeScale),i.onStart&&n._callback("onStart")},n},h.tweenFromTo=function(t,e,i){i=i||{},t=this._parseTimeOrLabel(t),i.startAt={onComplete:this.seek,onCompleteParams:[t],callbackScope:this},i.immediateRender=!1!==i.immediateRender;var s=this.tweenTo(e,i);return s.duration(Math.abs(s.vars.time-t)/this._timeScale||.001)},h.render=function(t,e,i){this._gc&&this._enabled(!0,!1);var s,n,l,h,_,u,f,c,p=this._dirty?this.totalDuration():this._totalDuration,m=this._duration,d=this._time,g=this._totalTime,v=this._startTime,y=this._timeScale,T=this._rawPrevTime,x=this._paused,b=this._cycle;if(t>=p-1e-7)this._locked||(this._totalTime=p,this._cycle=this._repeat),this._reversed||this._hasPausedChild()||(n=!0,h="onComplete",_=!!this._timeline.autoRemoveChildren,0===this._duration&&(0>=t&&t>=-1e-7||0>T||T===r)&&T!==t&&this._first&&(_=!0,T>r&&(h="onReverseComplete"))),this._rawPrevTime=this._duration||!e||t||this._rawPrevTime===t?t:r,this._yoyo&&0!=(1&this._cycle)?this._time=t=0:(this._time=m,t=m+1e-4);else if(1e-7>t)if(this._locked||(this._totalTime=this._cycle=0),this._time=0,(0!==d||0===m&&T!==r&&(T>0||0>t&&T>=0)&&!this._locked)&&(h="onReverseComplete",n=this._reversed),0>t)this._active=!1,this._timeline.autoRemoveChildren&&this._reversed?(_=n=!0,h="onReverseComplete"):T>=0&&this._first&&(_=!0),this._rawPrevTime=t;else{if(this._rawPrevTime=m||!e||t||this._rawPrevTime===t?t:r,0===t&&n)for(s=this._first;s&&0===s._startTime;)s._duration||(n=!1),s=s._next;t=0,this._initted||(_=!0)}else if(0===m&&0>T&&(_=!0),this._time=this._rawPrevTime=t,this._locked||(this._totalTime=t,0!==this._repeat&&(u=m+this._repeatDelay,this._cycle=this._totalTime/u>>0,0!==this._cycle&&this._cycle===this._totalTime/u&&t>=g&&this._cycle--,this._time=this._totalTime-this._cycle*u,this._yoyo&&0!=(1&this._cycle)&&(this._time=m-this._time),this._time>m?(this._time=m,t=m+1e-4):this._time<0?this._time=t=0:t=this._time)),this._hasPause&&!this._forcingPlayhead&&!e){if((t=this._time)>=d)for(s=this._first;s&&s._startTime<=t&&!f;)s._duration||"isPause"!==s.data||s.ratio||0===s._startTime&&0===this._rawPrevTime||(f=s),s=s._next;else for(s=this._last;s&&s._startTime>=t&&!f;)s._duration||"isPause"===s.data&&s._rawPrevTime>0&&(f=s),s=s._prev;f&&(this._time=t=f._startTime,this._totalTime=t+this._cycle*(this._totalDuration+this._repeatDelay))}if(this._cycle!==b&&!this._locked){var w=this._yoyo&&0!=(1&b),P=w===(this._yoyo&&0!=(1&this._cycle)),O=this._totalTime,S=this._cycle,k=this._rawPrevTime,R=this._time;if(this._totalTime=b*m,this._cycle<b?w=!w:this._totalTime+=m,this._time=d,this._rawPrevTime=0===m?T-1e-4:T,this._cycle=b,this._locked=!0,d=w?0:m,this.render(d,e,0===m),e||this._gc||this.vars.onRepeat&&this._callback("onRepeat"),d!==this._time)return;if(P&&(d=w?m+1e-4:-1e-4,this.render(d,!0,!1)),this._locked=!1,this._paused&&!x)return;this._time=R,this._totalTime=O,this._cycle=S,this._rawPrevTime=k}if(this._time!==d&&this._first||i||_||f){if(this._initted||(this._initted=!0),this._active||!this._paused&&this._totalTime!==g&&t>0&&(this._active=!0),0===g&&this.vars.onStart&&0!==this._totalTime&&(e||this._callback("onStart")),(c=this._time)>=d)for(s=this._first;s&&(l=s._next,c===this._time&&(!this._paused||x));)(s._active||s._startTime<=this._time&&!s._paused&&!s._gc)&&(f===s&&this.pause(),s._reversed?s.render((s._dirty?s.totalDuration():s._totalDuration)-(t-s._startTime)*s._timeScale,e,i):s.render((t-s._startTime)*s._timeScale,e,i)),s=l;else for(s=this._last;s&&(l=s._prev,c===this._time&&(!this._paused||x));){if(s._active||s._startTime<=d&&!s._paused&&!s._gc){if(f===s){for(f=s._prev;f&&f.endTime()>this._time;)f.render(f._reversed?f.totalDuration()-(t-f._startTime)*f._timeScale:(t-f._startTime)*f._timeScale,e,i),f=f._prev;f=null,this.pause()}s._reversed?s.render((s._dirty?s.totalDuration():s._totalDuration)-(t-s._startTime)*s._timeScale,e,i):s.render((t-s._startTime)*s._timeScale,e,i)}s=l}this._onUpdate&&(e||(a.length&&o(),this._callback("onUpdate"))),h&&(this._locked||this._gc||(v===this._startTime||y!==this._timeScale)&&(0===this._time||p>=this.totalDuration())&&(n&&(a.length&&o(),this._timeline.autoRemoveChildren&&this._enabled(!1,!1),this._active=!1),!e&&this.vars[h]&&this._callback(h)))}else g!==this._totalTime&&this._onUpdate&&(e||this._callback("onUpdate"))},h.getActive=function(t,e,i){null==t&&(t=!0),null==e&&(e=!0),null==i&&(i=!1);var s,r,n=[],a=this.getChildren(t,e,i),o=0,l=a.length;for(s=0;l>s;s++)r=a[s],r.isActive()&&(n[o++]=r);return n},h.getLabelAfter=function(t){t||0!==t&&(t=this._time);var e,i=this.getLabelsArray(),s=i.length;for(e=0;s>e;e++)if(i[e].time>t)return i[e].name;return null},h.getLabelBefore=function(t){null==t&&(t=this._time);for(var e=this.getLabelsArray(),i=e.length;--i>-1;)if(e[i].time<t)return e[i].name;return null},h.getLabelsArray=function(){var t,e=[],i=0;for(t in this._labels)e[i++]={time:this._labels[t],name:t};return e.sort(function(t,e){return t.time-e.time}),e},h.progress=function(t,e){return arguments.length?this.totalTime(this.duration()*(this._yoyo&&0!=(1&this._cycle)?1-t:t)+this._cycle*(this._duration+this._repeatDelay),e):this._time/this.duration()},h.totalProgress=function(t,e){return arguments.length?this.totalTime(this.totalDuration()*t,e):this._totalTime/this.totalDuration()},h.totalDuration=function(e){return arguments.length?-1!==this._repeat&&e?this.timeScale(this.totalDuration()/e):this:(this._dirty&&(t.prototype.totalDuration.call(this),this._totalDuration=-1===this._repeat?999999999999:this._duration*(this._repeat+1)+this._repeatDelay*this._repeat),this._totalDuration)},h.time=function(t,e){return arguments.length?(this._dirty&&this.totalDuration(),t>this._duration&&(t=this._duration),this._yoyo&&0!=(1&this._cycle)?t=this._duration-t+this._cycle*(this._duration+this._repeatDelay):0!==this._repeat&&(t+=this._cycle*(this._duration+this._repeatDelay)),this.totalTime(t,e)):this._time},h.repeat=function(t){return arguments.length?(this._repeat=t,this._uncache(!0)):this._repeat},h.repeatDelay=function(t){return arguments.length?(this._repeatDelay=t,this._uncache(!0)):this._repeatDelay},h.yoyo=function(t){return arguments.length?(this._yoyo=t,this):this._yoyo},h.currentLabel=function(t){return arguments.length?this.seek(t,!0):this.getLabelBefore(this._time+1e-8)},s},!0),i=180/Math.PI,s=[],r=[],n=[],a={},o=_gsScope._gsDefine.globals,l=function(t,e,i,s){this.a=t,this.b=e,this.c=i,this.d=s,this.da=s-t,this.ca=i-t,this.ba=e-t},h=function(t,e,i,s){var r={a:t},n={},a={},o={c:s},l=(t+e)/2,h=(e+i)/2,_=(i+s)/2,u=(l+h)/2,f=(h+_)/2,c=(f-u)/8;return r.b=l+(t-l)/4,n.b=u+c,r.c=n.a=(r.b+n.b)/2,n.c=a.a=(u+f)/2,a.b=f-c,o.b=_+(s-_)/4,a.c=o.a=(a.b+o.b)/2,[r,n,a,o]},_=function(t,e,i,a,o){var l,_,u,f,c,p,m,d,g,v,y,T,x,b=t.length-1,w=0,P=t[0].a;for(l=0;b>l;l++)c=t[w],_=c.a,u=c.d,f=t[w+1].d,o?(y=s[l],T=r[l],x=(T+y)*e*.25/(a?.5:n[l]||.5),p=u-(u-_)*(a?.5*e:0!==y?x/y:0),m=u+(f-u)*(a?.5*e:0!==T?x/T:0),d=u-(p+((m-p)*(3*y/(y+T)+.5)/4||0))):(p=u-(u-_)*e*.5,m=u+(f-u)*e*.5,d=u-(p+m)/2),p+=d,m+=d,c.c=g=p,c.b=0!==l?P:P=c.a+.6*(c.c-c.a),c.da=u-_,c.ca=g-_,c.ba=P-_,i?(v=h(_,P,g,u),t.splice(w,1,v[0],v[1],v[2],v[3]),w+=4):w++,P=m;(c=t[w]).b=P,c.c=P+.4*(c.d-P),c.da=c.d-c.a,c.ca=c.c-c.a,c.ba=P-c.a,i&&(v=h(c.a,P,c.c,c.d),t.splice(w,1,v[0],v[1],v[2],v[3]))},u=function(t,e,i,n){var a,o,h,_,u,f,c=[];if(n)for(t=[n].concat(t),o=t.length;--o>-1;)"string"==typeof(f=t[o][e])&&"="===f.charAt(1)&&(t[o][e]=n[e]+Number(f.charAt(0)+f.substr(2)));if(0>(a=t.length-2))return c[0]=new l(t[0][e],0,0,t[-1>a?0:1][e]),c;for(o=0;a>o;o++)h=t[o][e],_=t[o+1][e],c[o]=new l(h,0,0,_),i&&(u=t[o+2][e],s[o]=(s[o]||0)+(_-h)*(_-h),r[o]=(r[o]||0)+(u-_)*(u-_));return c[o]=new l(t[o][e],0,0,t[o+1][e]),c},f=function(t,e,i,o,l,h){var f,c,p,m,d,g,v,y,T={},x=[],b=h||t[0];l="string"==typeof l?","+l+",":",x,y,z,left,top,right,bottom,marginTop,marginLeft,marginRight,marginBottom,paddingLeft,paddingTop,paddingRight,paddingBottom,backgroundPosition,backgroundPosition_y,",null==e&&(e=1);for(c in t[0])x.push(c);if(t.length>1){for(y=t[t.length-1],v=!0,f=x.length;--f>-1;)if(c=x[f],Math.abs(b[c]-y[c])>.05){v=!1;break}v&&(t=t.concat(),h&&t.unshift(h),t.push(t[1]),h=t[t.length-3])}for(s.length=r.length=n.length=0,f=x.length;--f>-1;)c=x[f],a[c]=-1!==l.indexOf(","+c+","),T[c]=u(t,c,a[c],h);for(f=s.length;--f>-1;)s[f]=Math.sqrt(s[f]),r[f]=Math.sqrt(r[f]);if(!o){for(f=x.length;--f>-1;)if(a[c])for(p=T[x[f]],g=p.length-1,m=0;g>m;m++)d=p[m+1].da/r[m]+p[m].da/s[m]||0,n[m]=(n[m]||0)+d*d;for(f=n.length;--f>-1;)n[f]=Math.sqrt(n[f])}for(f=x.length,m=i?4:1;--f>-1;)c=x[f],p=T[c],_(p,e,i,o,a[c]),v&&(p.splice(0,m),p.splice(p.length-m,m));return T},c=function(t,e,i){for(var s,r,n,a,o,l,h,_,u,f,c,p=1/i,m=t.length;--m>-1;)for(f=t[m],n=f.a,a=f.d-n,o=f.c-n,l=f.b-n,s=r=0,_=1;i>=_;_++)h=p*_,u=1-h,s=r-(r=(h*h*a+3*u*(h*o+u*l))*h),c=m*i+_-1,e[c]=(e[c]||0)+s*s},p=_gsScope._gsDefine.plugin({propName:"bezier",priority:-1,version:"1.3.5",API:2,global:!0,init:function(t,e,i){this._target=t,e instanceof Array&&(e={values:e}),this._func={},this._round={},this._props=[],this._timeRes=null==e.timeResolution?6:parseInt(e.timeResolution,10);var s,r,n,a,o,h=e.values||[],_={},u=h[0],p=e.autoRotate||i.vars.orientToBezier;this._autoRotate=p?p instanceof Array?p:[["x","y","rotation",!0===p?0:Number(p)||0]]:null;for(s in u)this._props.push(s);for(n=this._props.length;--n>-1;)s=this._props[n],this._overwriteProps.push(s),r=this._func[s]="function"==typeof t[s],_[s]=r?t[s.indexOf("set")||"function"!=typeof t["get"+s.substr(3)]?s:"get"+s.substr(3)]():parseFloat(t[s]),o||_[s]!==h[0][s]&&(o=_);if(this._beziers="cubic"!==e.type&&"quadratic"!==e.type&&"soft"!==e.type?f(h,isNaN(e.curviness)?1:e.curviness,!1,"thruBasic"===e.type,e.correlate,o):function(t,e,i){var s,r,n,a,o,h,_,u,f,c,p,m={},d="cubic"===(e=e||"soft")?3:2,g="soft"===e,v=[];if(g&&i&&(t=[i].concat(t)),null==t||t.length<d+1)throw"invalid Bezier data";for(f in t[0])v.push(f);for(h=v.length;--h>-1;){for(m[f=v[h]]=o=[],c=0,u=t.length,_=0;u>_;_++)s=null==i?t[_][f]:"string"==typeof(p=t[_][f])&&"="===p.charAt(1)?i[f]+Number(p.charAt(0)+p.substr(2)):Number(p),g&&_>1&&u-1>_&&(o[c++]=(s+o[c-2])/2),o[c++]=s;for(u=c-d+1,c=0,_=0;u>_;_+=d)s=o[_],r=o[_+1],n=o[_+2],a=2===d?0:o[_+3],o[c++]=p=3===d?new l(s,r,n,a):new l(s,(2*r+s)/3,(2*r+n)/3,n);o.length=c}return m}(h,e.type,_),this._segCount=this._beziers[s].length,this._timeRes){var m=function(t,e){var i,s,r,n,a=[],o=[],l=0,h=0,_=(e=e>>0||6)-1,u=[],f=[];for(i in t)c(t[i],a,e);for(r=a.length,s=0;r>s;s++)l+=Math.sqrt(a[s]),n=s%e,f[n]=l,n===_&&(h+=l,n=s/e>>0,u[n]=f,o[n]=h,l=0,f=[]);return{length:h,lengths:o,segments:u}}(this._beziers,this._timeRes);this._length=m.length,this._lengths=m.lengths,this._segments=m.segments,this._l1=this._li=this._s1=this._si=0,this._l2=this._lengths[0],this._curSeg=this._segments[0],this._s2=this._curSeg[0],this._prec=1/this._curSeg.length}if(p=this._autoRotate)for(this._initialRotations=[],p[0]instanceof Array||(this._autoRotate=p=[p]),n=p.length;--n>-1;){for(a=0;3>a;a++)s=p[n][a],this._func[s]="function"==typeof t[s]&&t[s.indexOf("set")||"function"!=typeof t["get"+s.substr(3)]?s:"get"+s.substr(3)];s=p[n][2],this._initialRotations[n]=(this._func[s]?this._func[s].call(this._target):this._target[s])||0}return this._startRatio=i.vars.runBackwards?1:0,!0},set:function(t){var e,s,r,n,a,o,l,h,_,u,f=this._segCount,c=this._func,p=this._target,m=t!==this._startRatio;if(this._timeRes){if(_=this._lengths,u=this._curSeg,t*=this._length,r=this._li,t>this._l2&&f-1>r){for(h=f-1;h>r&&(this._l2=_[++r])<=t;);this._l1=_[r-1],this._li=r,this._curSeg=u=this._segments[r],this._s2=u[this._s1=this._si=0]}else if(t<this._l1&&r>0){for(;r>0&&(this._l1=_[--r])>=t;);0===r&&t<this._l1?this._l1=0:r++,this._l2=_[r],this._li=r,this._curSeg=u=this._segments[r],this._s1=u[(this._si=u.length-1)-1]||0,this._s2=u[this._si]}if(e=r,t-=this._l1,r=this._si,t>this._s2&&r<u.length-1){for(h=u.length-1;h>r&&(this._s2=u[++r])<=t;);this._s1=u[r-1],this._si=r}else if(t<this._s1&&r>0){for(;r>0&&(this._s1=u[--r])>=t;);0===r&&t<this._s1?this._s1=0:r++,this._s2=u[r],this._si=r}o=(r+(t-this._s1)/(this._s2-this._s1))*this._prec||0}else e=0>t?0:t>=1?f-1:f*t>>0,o=(t-e*(1/f))*f;for(s=1-o,r=this._props.length;--r>-1;)n=this._props[r],a=this._beziers[n][e],l=(o*o*a.da+3*s*(o*a.ca+s*a.ba))*o+a.a,this._round[n]&&(l=Math.round(l)),c[n]?p[n](l):p[n]=l;if(this._autoRotate){var d,g,v,y,T,x,b,w=this._autoRotate;for(r=w.length;--r>-1;)n=w[r][2],x=w[r][3]||0,b=!0===w[r][4]?1:i,a=this._beziers[w[r][0]],d=this._beziers[w[r][1]],a&&d&&(a=a[e],d=d[e],g=a.a+(a.b-a.a)*o,y=a.b+(a.c-a.b)*o,g+=(y-g)*o,y+=(a.c+(a.d-a.c)*o-y)*o,v=d.a+(d.b-d.a)*o,T=d.b+(d.c-d.b)*o,v+=(T-v)*o,T+=(d.c+(d.d-d.c)*o-T)*o,l=m?Math.atan2(T-v,y-g)*b+x:this._initialRotations[r],c[n]?p[n](l):p[n]=l)}}}),m=p.prototype,p.bezierThrough=f,p.cubicToQuadratic=h,p._autoCSS=!0,p.quadraticToCubic=function(t,e,i){return new l(t,(2*e+t)/3,(2*e+i)/3,i)},p._cssRegister=function(){var t=o.CSSPlugin;if(t){var e=t._internals,i=e._parseToProxy,s=e._setPluginRatio,r=e.CSSPropTween;e._registerComplexSpecialProp("bezier",{parser:function(t,e,n,a,o,l){e instanceof Array&&(e={values:e}),l=new p;var h,_,u,f=e.values,c=f.length-1,m=[],d={};if(0>c)return o;for(h=0;c>=h;h++)u=i(t,f[h],a,o,l,c!==h),m[h]=u.end;for(_ in e)d[_]=e[_];return d.values=m,(o=new r(t,"bezier",0,0,u.pt,2)).data=u,o.plugin=l,o.setRatio=s,0===d.autoRotate&&(d.autoRotate=!0),!d.autoRotate||d.autoRotate instanceof Array||(h=!0===d.autoRotate?0:Number(d.autoRotate),d.autoRotate=null!=u.end.left?[["left","top","rotation",h,!1]]:null!=u.end.x&&[["x","y","rotation",h,!1]]),d.autoRotate&&(a._transform||a._enableTransforms(!1),u.autoRotate=a._target._gsTransform),l._onInitTween(u.proxy,d,a._tween),o}})}},m._roundProps=function(t,e){for(var i=this._overwriteProps,s=i.length;--s>-1;)(t[i[s]]||t.bezier||t.bezierThrough)&&(this._round[i[s]]=e)},m._kill=function(t){var e,i,s=this._props;for(e in this._beziers)if(e in t)for(delete this._beziers[e],delete this._func[e],i=s.length;--i>-1;)s[i]===e&&s.splice(i,1);return this._super._kill.call(this,t)},_gsScope._gsDefine("plugins.CSSPlugin",["plugins.TweenPlugin","TweenLite"],function(t,e){var i,s,r,n,a=function(){t.call(this,"css"),this._overwriteProps.length=0,this.setRatio=a.prototype.setRatio},o=_gsScope._gsDefine.globals,l={},h=a.prototype=new t("css");h.constructor=a,a.version="1.18.3",a.API=2,a.defaultTransformPerspective=0,a.defaultSkewType="compensated",a.defaultSmoothOrigin=!0,h="px",a.suffixMap={top:h,right:h,bottom:h,left:h,width:h,height:h,fontSize:h,padding:h,margin:h,perspective:h,lineHeight:""};var _,u,f,c,p,m,d,g,v=/(?:\-|\.|\b)[\d\.e]+\b/g,y=/(?:\d|\-\d|\.\d|\-\.\d|\+=\d|\-=\d|\+=.\d|\-=\.\d)+/g,T=/(?:\+=|\-=|\-|\b)[\d\-\.]+[a-zA-Z0-9]*(?:%|\b)/gi,x=/(?![+-]?\d*\.?\d+|[+-]|e[+-]\d+)[^0-9]/g,b=/(?:\d|\-|\+|=|#|\.)*/g,w=/opacity *= *([^)]*)/i,P=/opacity:([^;]*)/i,O=/alpha\(opacity *=.+?\)/i,S=/^(rgb|hsl)/,k=/([A-Z])/g,R=/-([a-z])/gi,A=/(^(?:url\(\"|url\())|(?:(\"\))$|\)$)/gi,C=function(t,e){return e.toUpperCase()},D=/(?:Left|Right|Width)/i,M=/(M11|M12|M21|M22)=[\d\-\.e]+/gi,z=/progid\:DXImageTransform\.Microsoft\.Matrix\(.+?\)/i,F=/,(?=[^\)]*(?:\(|$))/gi,X=/[\s,\(]/i,I=Math.PI/180,L=180/Math.PI,N={},E=document,Y=function(t){return E.createElementNS?E.createElementNS("http://www.w3.org/1999/xhtml",t):E.createElement(t)},B=Y("div"),j=Y("img"),U=a._internals={_specialProps:l},V=navigator.userAgent,q=(d=V.indexOf("Android"),g=Y("a"),f=-1!==V.indexOf("Safari")&&-1===V.indexOf("Chrome")&&(-1===d||Number(V.substr(d+8,1))>3),p=f&&Number(V.substr(V.indexOf("Version/")+8,1))<6,c=-1!==V.indexOf("Firefox"),(/MSIE ([0-9]{1,}[\.0-9]{0,})/.exec(V)||/Trident\/.*rv:([0-9]{1,}[\.0-9]{0,})/.exec(V))&&(m=parseFloat(RegExp.$1)),!!g&&(g.style.cssText="top:1px;opacity:.55;",/^0.55/.test(g.style.opacity))),W=function(t){return w.test("string"==typeof t?t:(t.currentStyle?t.currentStyle.filter:t.style.filter)||"")?parseFloat(RegExp.$1)/100:1},Z=function(t){window.console&&console.log(t)},G="",$="",Q=function(t,e){var i,s,r=(e=e||B).style;if(void 0!==r[t])return t;for(t=t.charAt(0).toUpperCase()+t.substr(1),i=["O","Moz","ms","Ms","Webkit"],s=5;--s>-1&&void 0===r[i[s]+t];);return s>=0?(G="-"+($=3===s?"ms":i[s]).toLowerCase()+"-",$+t):null},H=E.defaultView?E.defaultView.getComputedStyle:function(){},K=a.getStyle=function(t,e,i,s,r){var n;return q||"opacity"!==e?(!s&&t.style[e]?n=t.style[e]:(i=i||H(t))?n=i[e]||i.getPropertyValue(e)||i.getPropertyValue(e.replace(k,"-$1").toLowerCase()):t.currentStyle&&(n=t.currentStyle[e]),null==r||n&&"none"!==n&&"auto"!==n&&"auto auto"!==n?n:r):W(t)},J=U.convertToPixels=function(t,i,s,r,n){if("px"===r||!r)return s;if("auto"===r||!s)return 0;var o,l,h,_=D.test(i),u=t,f=B.style,c=0>s;if(c&&(s=-s),"%"===r&&-1!==i.indexOf("border"))o=s/100*(_?t.clientWidth:t.clientHeight);else{if(f.cssText="border:0 solid red;position:"+K(t,"position")+";line-height:0;","%"!==r&&u.appendChild&&"v"!==r.charAt(0)&&"rem"!==r)f[_?"borderLeftWidth":"borderTopWidth"]=s+r;else{if(l=(u=t.parentNode||E.body)._gsCache,h=e.ticker.frame,l&&_&&l.time===h)return l.width*s/100;f[_?"width":"height"]=s+r}u.appendChild(B),o=parseFloat(B[_?"offsetWidth":"offsetHeight"]),u.removeChild(B),_&&"%"===r&&!1!==a.cacheWidths&&((l=u._gsCache=u._gsCache||{}).time=h,l.width=o/s*100),0!==o||n||(o=J(t,i,s,r,!0))}return c?-o:o},tt=U.calculateOffset=function(t,e,i){if("absolute"!==K(t,"position",i))return 0;var s="left"===e?"Left":"Top",r=K(t,"margin"+s,i);return t["offset"+s]-(J(t,e,parseFloat(r),r.replace(b,""))||0)},et=function(t,e){var i,s,r,n={};if(e=e||H(t,null))if(i=e.length)for(;--i>-1;)r=e[i],(-1===r.indexOf("-transform")||Mt===r)&&(n[r.replace(R,C)]=e.getPropertyValue(r));else for(i in e)(-1===i.indexOf("Transform")||Dt===i)&&(n[i]=e[i]);else if(e=t.currentStyle||t.style)for(i in e)"string"==typeof i&&void 0===n[i]&&(n[i.replace(R,C)]=e[i]);return q||(n.opacity=W(t)),s=Vt(t,e,!1),n.rotation=s.rotation,n.skewX=s.skewX,n.scaleX=s.scaleX,n.scaleY=s.scaleY,n.x=s.x,n.y=s.y,Ft&&(n.z=s.z,n.rotationX=s.rotationX,n.rotationY=s.rotationY,n.scaleZ=s.scaleZ),n.filters&&delete n.filters,n},it=function(t,e,i,s,r){var n,a,o,l={},h=t.style;for(a in i)"cssText"!==a&&"length"!==a&&isNaN(a)&&(e[a]!==(n=i[a])||r&&r[a])&&-1===a.indexOf("Origin")&&("number"==typeof n||"string"==typeof n)&&(l[a]="auto"!==n||"left"!==a&&"top"!==a?""!==n&&"auto"!==n&&"none"!==n||"string"!=typeof e[a]||""===e[a].replace(x,"")?n:0:tt(t,a),void 0!==h[a]&&(o=new gt(h,a,h[a],o)));if(s)for(a in s)"className"!==a&&(l[a]=s[a]);return{difs:l,firstMPT:o}},st={width:["Left","Right"],height:["Top","Bottom"]},rt=["marginLeft","marginRight","marginTop","marginBottom"],nt=function(t,e,i){var s=parseFloat("width"===e?t.offsetWidth:t.offsetHeight),r=st[e],n=r.length;for(i=i||H(t,null);--n>-1;)s-=parseFloat(K(t,"padding"+r[n],i,!0))||0,s-=parseFloat(K(t,"border"+r[n]+"Width",i,!0))||0;return s},at=function(t,e){if("contain"===t||"auto"===t||"auto auto"===t)return t+" ";(null==t||""===t)&&(t="0 0");var i,s=t.split(" "),r=-1!==t.indexOf("left")?"0%":-1!==t.indexOf("right")?"100%":s[0],n=-1!==t.indexOf("top")?"0%":-1!==t.indexOf("bottom")?"100%":s[1];if(s.length>3&&!e){for(s=t.split(", ").join(",").split(","),t=[],i=0;i<s.length;i++)t.push(at(s[i]));return t.join(",")}return null==n?n="center"===r?"50%":"0":"center"===n&&(n="50%"),("center"===r||isNaN(parseFloat(r))&&-1===(r+"").indexOf("="))&&(r="50%"),t=r+" "+n+(s.length>2?" "+s[2]:""),e&&(e.oxp=-1!==r.indexOf("%"),e.oyp=-1!==n.indexOf("%"),e.oxr="="===r.charAt(1),e.oyr="="===n.charAt(1),e.ox=parseFloat(r.replace(x,"")),e.oy=parseFloat(n.replace(x,"")),e.v=t),e||t},ot=function(t,e){return"string"==typeof t&&"="===t.charAt(1)?parseInt(t.charAt(0)+"1",10)*parseFloat(t.substr(2)):parseFloat(t)-parseFloat(e)||0},lt=function(t,e){return null==t?e:"string"==typeof t&&"="===t.charAt(1)?parseInt(t.charAt(0)+"1",10)*parseFloat(t.substr(2))+e:parseFloat(t)||0},ht=function(t,e,i,s){var r,n,a,o,l;return null==t?o=e:"number"==typeof t?o=t:(r=360,n=t.split("_"),a=((l="="===t.charAt(1))?parseInt(t.charAt(0)+"1",10)*parseFloat(n[0].substr(2)):parseFloat(n[0]))*(-1===t.indexOf("rad")?1:L)-(l?0:e),n.length&&(s&&(s[i]=e+a),-1!==t.indexOf("short")&&((a%=r)!==a%(r/2)&&(a=0>a?a+r:a-r)),-1!==t.indexOf("_cw")&&0>a?a=(a+9999999999*r)%r-(a/r|0)*r:-1!==t.indexOf("ccw")&&a>0&&(a=(a-9999999999*r)%r-(a/r|0)*r)),o=e+a),1e-6>o&&o>-1e-6&&(o=0),o},_t={aqua:[0,255,255],lime:[0,255,0],silver:[192,192,192],black:[0,0,0],maroon:[128,0,0],teal:[0,128,128],blue:[0,0,255],navy:[0,0,128],white:[255,255,255],fuchsia:[255,0,255],olive:[128,128,0],yellow:[255,255,0],orange:[255,165,0],gray:[128,128,128],purple:[128,0,128],green:[0,128,0],red:[255,0,0],pink:[255,192,203],cyan:[0,255,255],transparent:[255,255,255,0]},ut=function(t,e,i){return 255*(1>6*(t=0>t?t+1:t>1?t-1:t)?e+(i-e)*t*6:.5>t?i:2>3*t?e+(i-e)*(2/3-t)*6:e)+.5|0},ft=a.parseColor=function(t,e){var i,s,r,n,a,o,l,h,_,u,f;if(t)if("number"==typeof t)i=[t>>16,t>>8&255,255&t];else{if(","===t.charAt(t.length-1)&&(t=t.substr(0,t.length-1)),_t[t])i=_t[t];else if("#"===t.charAt(0))4===t.length&&(s=t.charAt(1),r=t.charAt(2),n=t.charAt(3),t="#"+s+s+r+r+n+n),t=parseInt(t.substr(1),16),i=[t>>16,t>>8&255,255&t];else if("hsl"===t.substr(0,3))if(i=f=t.match(v),e){if(-1!==t.indexOf("="))return t.match(y)}else a=Number(i[0])%360/360,o=Number(i[1])/100,l=Number(i[2])/100,r=.5>=l?l*(o+1):l+o-l*o,s=2*l-r,i.length>3&&(i[3]=Number(t[3])),i[0]=ut(a+1/3,s,r),i[1]=ut(a,s,r),i[2]=ut(a-1/3,s,r);else i=t.match(v)||_t.transparent;i[0]=Number(i[0]),i[1]=Number(i[1]),i[2]=Number(i[2]),i.length>3&&(i[3]=Number(i[3]))}else i=_t.black;return e&&!f&&(s=i[0]/255,r=i[1]/255,n=i[2]/255,l=((h=Math.max(s,r,n))+(_=Math.min(s,r,n)))/2,h===_?a=o=0:(u=h-_,o=l>.5?u/(2-h-_):u/(h+_),a=h===s?(r-n)/u+(n>r?6:0):h===r?(n-s)/u+2:(s-r)/u+4,a*=60),i[0]=a+.5|0,i[1]=100*o+.5|0,i[2]=100*l+.5|0),i},ct=function(t,e){var i,s,r,n=t.match(pt)||[],a=0,o=n.length?"":t;for(i=0;i<n.length;i++)s=n[i],r=t.substr(a,t.indexOf(s,a)-a),a+=r.length+s.length,s=ft(s,e),3===s.length&&s.push(1),o+=r+(e?"hsla("+s[0]+","+s[1]+"%,"+s[2]+"%,"+s[3]:"rgba("+s.join(","))+")";return o+t.substr(a)},pt="(?:\\b(?:(?:rgb|rgba|hsl|hsla)\\(.+?\\))|\\B#(?:[0-9a-f]{3}){1,2}\\b";for(h in _t)pt+="|"+h+"\\b";pt=new RegExp(pt+")","gi"),a.colorStringFilter=function(t){var e,i=t[0]+t[1];pt.test(i)&&(e=-1!==i.indexOf("hsl(")||-1!==i.indexOf("hsla("),t[0]=ct(t[0],e),t[1]=ct(t[1],e)),pt.lastIndex=0},e.defaultStringFilter||(e.defaultStringFilter=a.colorStringFilter);var mt=function(t,e,i,s){if(null==t)return function(t){return t};var r,n=e?(t.match(pt)||[""])[0]:"",a=t.split(n).join("").match(T)||[],o=t.substr(0,t.indexOf(a[0])),l=")"===t.charAt(t.length-1)?")":"",h=-1!==t.indexOf(" ")?" ":",",_=a.length,u=_>0?a[0].replace(v,""):"";return _?r=e?function(t){var e,f,c,p;if("number"==typeof t)t+=u;else if(s&&F.test(t)){for(p=t.replace(F,"|").split("|"),c=0;c<p.length;c++)p[c]=r(p[c]);return p.join(",")}if(e=(t.match(pt)||[n])[0],c=(f=t.split(e).join("").match(T)||[]).length,_>c--)for(;++c<_;)f[c]=i?f[(c-1)/2|0]:a[c];return o+f.join(h)+h+e+l+(-1!==t.indexOf("inset")?" inset":"")}:function(t){var e,n,f;if("number"==typeof t)t+=u;else if(s&&F.test(t)){for(n=t.replace(F,"|").split("|"),f=0;f<n.length;f++)n[f]=r(n[f]);return n.join(",")}if(f=(e=t.match(T)||[]).length,_>f--)for(;++f<_;)e[f]=i?e[(f-1)/2|0]:a[f];return o+e.join(h)+l}:function(t){return t}},dt=function(t){return t=t.split(","),function(e,i,s,r,n,a,o){var l,h=(i+"").split(" ");for(o={},l=0;4>l;l++)o[t[l]]=h[l]=h[l]||h[(l-1)/2>>0];return r.parse(e,o,n,a)}},gt=(U._setPluginRatio=function(t){this.plugin.setRatio(t);for(var e,i,s,r,n,a=this.data,o=a.proxy,l=a.firstMPT;l;)e=o[l.v],l.r?e=Math.round(e):1e-6>e&&e>-1e-6&&(e=0),l.t[l.p]=e,l=l._next;if(a.autoRotate&&(a.autoRotate.rotation=o.rotation),1===t||0===t)for(l=a.firstMPT,n=1===t?"e":"b";l;){if((i=l.t).type){if(1===i.type){for(r=i.xs0+i.s+i.xs1,s=1;s<i.l;s++)r+=i["xn"+s]+i["xs"+(s+1)];i[n]=r}}else i[n]=i.s+i.xs0;l=l._next}},function(t,e,i,s,r){this.t=t,this.p=e,this.v=i,this.r=r,s&&(s._prev=this,this._next=s)}),vt=(U._parseToProxy=function(t,e,i,s,r,n){var a,o,l,h,_,u=s,f={},c={},p=i._transform,m=N;for(i._transform=null,N=e,s=_=i.parse(t,e,s,r),N=m,n&&(i._transform=p,u&&(u._prev=null,u._prev&&(u._prev._next=null)));s&&s!==u;){if(s.type<=1&&(c[o=s.p]=s.s+s.c,f[o]=s.s,n||(h=new gt(s,"s",o,h,s.r),s.c=0),1===s.type))for(a=s.l;--a>0;)l="xn"+a,o=s.p+"_"+l,c[o]=s.data[l],f[o]=s[l],n||(h=new gt(s,l,o,h,s.rxp[l]));s=s._next}return{proxy:f,end:c,firstMPT:h,pt:_}},U.CSSPropTween=function(t,e,s,r,a,o,l,h,_,u,f){this.t=t,this.p=e,this.s=s,this.c=r,this.n=l||e,t instanceof vt||n.push(this.n),this.r=h,this.type=o||0,_&&(this.pr=_,i=!0),this.b=void 0===u?s:u,this.e=void 0===f?s+r:f,a&&(this._next=a,a._prev=this)}),yt=function(t,e,i,s,r,n){var a=new vt(t,e,i,s-i,r,-1,n);return a.b=i,a.e=a.xs0=s,a},Tt=a.parseComplex=function(t,e,i,s,r,n,o,l,h,u){i=i||n||"",o=new vt(t,e,0,0,o,u?2:1,null,!1,l,i,s),s+="",r&&pt.test(s+i)&&(s=[i,s],a.colorStringFilter(s),i=s[0],s=s[1]);var f,c,p,m,d,g,T,x,b,w,P,O,S,k=i.split(", ").join(",").split(" "),R=s.split(", ").join(",").split(" "),A=k.length,C=!1!==_;for((-1!==s.indexOf(",")||-1!==i.indexOf(","))&&(k=k.join(" ").replace(F,", ").split(" "),R=R.join(" ").replace(F,", ").split(" "),A=k.length),A!==R.length&&(A=(k=(n||"").split(" ")).length),o.plugin=h,o.setRatio=u,pt.lastIndex=0,f=0;A>f;f++)if(m=k[f],d=R[f],x=parseFloat(m),x||0===x)o.appendXtra("",x,ot(d,x),d.replace(y,""),C&&-1!==d.indexOf("px"),!0);else if(r&&pt.test(m))O=d.indexOf(")")+1,O=")"+(O?d.substr(O):""),S=-1!==d.indexOf("hsl")&&q,m=ft(m,S),d=ft(d,S),b=m.length+d.length>6,b&&!q&&0===d[3]?(o["xs"+o.l]+=o.l?" transparent":"transparent",o.e=o.e.split(R[f]).join("transparent")):(q||(b=!1),S?o.appendXtra(b?"hsla(":"hsl(",m[0],ot(d[0],m[0]),",",!1,!0).appendXtra("",m[1],ot(d[1],m[1]),"%,",!1).appendXtra("",m[2],ot(d[2],m[2]),b?"%,":"%"+O,!1):o.appendXtra(b?"rgba(":"rgb(",m[0],d[0]-m[0],",",!0,!0).appendXtra("",m[1],d[1]-m[1],",",!0).appendXtra("",m[2],d[2]-m[2],b?",":O,!0),b&&(m=m.length<4?1:m[3],o.appendXtra("",m,(d.length<4?1:d[3])-m,O,!1))),pt.lastIndex=0;else if(g=m.match(v)){if(!(T=d.match(y))||T.length!==g.length)return o;for(p=0,c=0;c<g.length;c++)P=g[c],w=m.indexOf(P,p),o.appendXtra(m.substr(p,w-p),Number(P),ot(T[c],P),"",C&&"px"===m.substr(w+P.length,2),0===c),p=w+P.length;o["xs"+o.l]+=m.substr(p)}else o["xs"+o.l]+=o.l||o["xs"+o.l]?" "+d:d;if(-1!==s.indexOf("=")&&o.data){for(O=o.xs0+o.data.s,f=1;f<o.l;f++)O+=o["xs"+f]+o.data["xn"+f];o.e=O+o["xs"+f]}return o.l||(o.type=-1,o.xs0=o.e),o.xfirst||o},xt=9;for((h=vt.prototype).l=h.pr=0;--xt>0;)h["xn"+xt]=0,h["xs"+xt]="";h.xs0="",h._next=h._prev=h.xfirst=h.data=h.plugin=h.setRatio=h.rxp=null,h.appendXtra=function(t,e,i,s,r,n){var a=this,o=a.l;return a["xs"+o]+=n&&o?" "+t:t||"",i||0===o||a.plugin?(a.l++,a.type=a.setRatio?2:1,a["xs"+a.l]=s||"",o>0?(a.data["xn"+o]=e+i,a.rxp["xn"+o]=r,a["xn"+o]=e,a.plugin||(a.xfirst=new vt(a,"xn"+o,e,i,a.xfirst||a,0,a.n,r,a.pr),a.xfirst.xs0=0),a):(a.data={s:e+i},a.rxp={},a.s=e,a.c=i,a.r=r,a)):(a["xs"+o]+=e+(s||""),a)};var bt=function(t,e){e=e||{},this.p=e.prefix&&Q(t)||t,l[t]=l[this.p]=this,this.format=e.formatter||mt(e.defaultValue,e.color,e.collapsible,e.multi),e.parser&&(this.parse=e.parser),this.clrs=e.color,this.multi=e.multi,this.keyword=e.keyword,this.dflt=e.defaultValue,this.pr=e.priority||0},wt=U._registerComplexSpecialProp=function(t,e,i){"object"!=typeof e&&(e={parser:i});var s,r=t.split(","),n=e.defaultValue;for(i=i||[n],s=0;s<r.length;s++)e.prefix=0===s&&e.prefix,e.defaultValue=i[s]||n,new bt(r[s],e)},Pt=function(t){if(!l[t]){var e=t.charAt(0).toUpperCase()+t.substr(1)+"Plugin";wt(t,{parser:function(t,i,s,r,n,a,h){var _=o.com.greensock.plugins[e];return _?(_._cssRegister(),l[s].parse(t,i,s,r,n,a,h)):(Z("Error: "+e+" js file not loaded."),n)}})}};(h=bt.prototype).parseComplex=function(t,e,i,s,r,n){var a,o,l,h,_,u,f=this.keyword;if(this.multi&&(F.test(i)||F.test(e)?(o=e.replace(F,"|").split("|"),l=i.replace(F,"|").split("|")):f&&(o=[e],l=[i])),l){for(h=l.length>o.length?l.length:o.length,a=0;h>a;a++)e=o[a]=o[a]||this.dflt,i=l[a]=l[a]||this.dflt,f&&(_=e.indexOf(f),u=i.indexOf(f),_!==u&&(-1===u?o[a]=o[a].split(f).join(""):-1===_&&(o[a]+=" "+f)));e=o.join(", "),i=l.join(", ")}return Tt(t,this.p,e,i,this.clrs,this.dflt,s,this.pr,r,n)},h.parse=function(t,e,i,s,n,a,o){return this.parseComplex(t.style,this.format(K(t,this.p,r,!1,this.dflt)),this.format(e),n,a)},a.registerSpecialProp=function(t,e,i){wt(t,{parser:function(t,s,r,n,a,o,l){var h=new vt(t,r,0,0,a,2,r,!1,i);return h.plugin=o,h.setRatio=e(t,s,n._tween,r),h},priority:i})},a.useSVGTransformAttr=f||c;var Ot,St,kt,Rt,At,Ct="scaleX,scaleY,scaleZ,x,y,z,skewX,skewY,rotation,rotationX,rotationY,perspective,xPercent,yPercent".split(","),Dt=Q("transform"),Mt=G+"transform",zt=Q("transformOrigin"),Ft=null!==Q("perspective"),Xt=U.Transform=function(){this.perspective=parseFloat(a.defaultTransformPerspective)||0,this.force3D=!(!1===a.defaultForce3D||!Ft)&&(a.defaultForce3D||"auto")},It=window.SVGElement,Lt=function(t,e,i){var s,r=E.createElementNS("http://www.w3.org/2000/svg",t),n=/([a-z])([A-Z])/g;for(s in i)r.setAttributeNS(null,s.replace(n,"$1-$2").toLowerCase(),i[s]);return e.appendChild(r),r},Nt=E.documentElement,Et=(At=m||/Android/i.test(V)&&!window.chrome,E.createElementNS&&!At&&(St=Lt("svg",Nt),Rt=(kt=Lt("rect",St,{width:100,height:50,x:100})).getBoundingClientRect().width,kt.style[zt]="50% 50%",kt.style[Dt]="scaleX(0.5)",At=Rt===kt.getBoundingClientRect().width&&!(c&&Ft),Nt.removeChild(St)),At),Yt=function(t,e,i,s,r,n){var o,l,h,_,u,f,c,p,m,d,g,v,y,T,x=t._gsTransform,b=Ut(t,!0);x&&(y=x.xOrigin,T=x.yOrigin),(!s||(o=s.split(" ")).length<2)&&(c=t.getBBox(),o=[(-1!==(e=at(e).split(" "))[0].indexOf("%")?parseFloat(e[0])/100*c.width:parseFloat(e[0]))+c.x,(-1!==e[1].indexOf("%")?parseFloat(e[1])/100*c.height:parseFloat(e[1]))+c.y]),i.xOrigin=_=parseFloat(o[0]),i.yOrigin=u=parseFloat(o[1]),s&&b!==jt&&(f=b[0],c=b[1],p=b[2],m=b[3],d=b[4],g=b[5],l=_*(m/(v=f*m-c*p))+u*(-p/v)+(p*g-m*d)/v,h=_*(-c/v)+u*(f/v)-(f*g-c*d)/v,_=i.xOrigin=o[0]=l,u=i.yOrigin=o[1]=h),x&&(n&&(i.xOffset=x.xOffset,i.yOffset=x.yOffset,x=i),r||!1!==r&&!1!==a.defaultSmoothOrigin?(l=_-y,h=u-T,x.xOffset+=l*b[0]+h*b[2]-l,x.yOffset+=l*b[1]+h*b[3]-h):x.xOffset=x.yOffset=0),n||t.setAttribute("data-svg-origin",o.join(" "))},Bt=function(t){return!!(It&&t.getBBox&&t.getCTM&&function(t){try{return t.getBBox()}catch(t){}}(t))},jt=[1,0,0,1,0,0],Ut=function(t,e){var i,s,r,n,a,o=t._gsTransform||new Xt;if(Dt?s=K(t,Mt,null,!0):t.currentStyle&&(s=(s=t.currentStyle.filter.match(M))&&4===s.length?[s[0].substr(4),Number(s[2].substr(4)),Number(s[1].substr(4)),s[3].substr(4),o.x||0,o.y||0].join(","):""),i=!s||"none"===s||"matrix(1, 0, 0, 1, 0, 0)"===s,(o.svg||t.getBBox&&Bt(t))&&(i&&-1!==(t.style[Dt]+"").indexOf("matrix")&&(s=t.style[Dt],i=0),r=t.getAttribute("transform"),i&&r&&(-1!==r.indexOf("matrix")?(s=r,i=0):-1!==r.indexOf("translate")&&(s="matrix(1,0,0,1,"+r.match(/(?:\-|\b)[\d\-\.e]+\b/gi).join(",")+")",i=0))),i)return jt;for(r=(s||"").match(v)||[],xt=r.length;--xt>-1;)n=Number(r[xt]),r[xt]=(a=n-(n|=0))?(1e5*a+(0>a?-.5:.5)|0)/1e5+n:n;return e&&r.length>6?[r[0],r[1],r[4],r[5],r[12],r[13]]:r},Vt=U.getTransform=function(t,i,s,n){if(t._gsTransform&&s&&!n)return t._gsTransform;var o,l,h,_,u,f,c=s&&t._gsTransform||new Xt,p=c.scaleX<0,m=Ft&&(parseFloat(K(t,zt,i,!1,"0 0 0").split(" ")[2])||c.zOrigin)||0,d=parseFloat(a.defaultTransformPerspective)||0;if(c.svg=!(!t.getBBox||!Bt(t)),c.svg&&(Yt(t,K(t,zt,r,!1,"50% 50%")+"",c,t.getAttribute("data-svg-origin")),Ot=a.useSVGTransformAttr||Et),(o=Ut(t))!==jt){if(16===o.length){var g,v,y,T,x,b=o[0],w=o[1],P=o[2],O=o[3],S=o[4],k=o[5],R=o[6],A=o[7],C=o[8],D=o[9],M=o[10],z=o[12],F=o[13],X=o[14],I=o[11],N=Math.atan2(R,M);c.zOrigin&&(z=C*(X=-c.zOrigin)-o[12],F=D*X-o[13],X=M*X+c.zOrigin-o[14]),c.rotationX=N*L,N&&(g=S*(T=Math.cos(-N))+C*(x=Math.sin(-N)),v=k*T+D*x,y=R*T+M*x,C=S*-x+C*T,D=k*-x+D*T,M=R*-x+M*T,I=A*-x+I*T,S=g,k=v,R=y),N=Math.atan2(-P,M),c.rotationY=N*L,N&&(v=w*(T=Math.cos(-N))-D*(x=Math.sin(-N)),y=P*T-M*x,D=w*x+D*T,M=P*x+M*T,I=O*x+I*T,b=g=b*T-C*x,w=v,P=y),N=Math.atan2(w,b),c.rotation=N*L,N&&(b=b*(T=Math.cos(-N))+S*(x=Math.sin(-N)),v=w*T+k*x,k=w*-x+k*T,R=P*-x+R*T,w=v),c.rotationX&&Math.abs(c.rotationX)+Math.abs(c.rotation)>359.9&&(c.rotationX=c.rotation=0,c.rotationY=180-c.rotationY),c.scaleX=(1e5*Math.sqrt(b*b+w*w)+.5|0)/1e5,c.scaleY=(1e5*Math.sqrt(k*k+D*D)+.5|0)/1e5,c.scaleZ=(1e5*Math.sqrt(R*R+M*M)+.5|0)/1e5,c.skewX=S||k?Math.atan2(S,k)*L+c.rotation:c.skewX||0,Math.abs(c.skewX)>90&&Math.abs(c.skewX)<270&&(p?(c.scaleX*=-1,c.skewX+=c.rotation<=0?180:-180,c.rotation+=c.rotation<=0?180:-180):(c.scaleY*=-1,c.skewX+=c.skewX<=0?180:-180)),c.perspective=I?1/(0>I?-I:I):0,c.x=z,c.y=F,c.z=X,c.svg&&(c.x-=c.xOrigin-(c.xOrigin*b-c.yOrigin*S),c.y-=c.yOrigin-(c.yOrigin*w-c.xOrigin*k))}else if((!Ft||n||!o.length||c.x!==o[4]||c.y!==o[5]||!c.rotationX&&!c.rotationY)&&(void 0===c.x||"none"!==K(t,"display",i))){var E=o.length>=6,Y=E?o[0]:1,B=o[1]||0,j=o[2]||0,U=E?o[3]:1;c.x=o[4]||0,c.y=o[5]||0,h=Math.sqrt(Y*Y+B*B),_=Math.sqrt(U*U+j*j),u=Y||B?Math.atan2(B,Y)*L:c.rotation||0,f=j||U?Math.atan2(j,U)*L+u:c.skewX||0,Math.abs(f)>90&&Math.abs(f)<270&&(p?(h*=-1,f+=0>=u?180:-180,u+=0>=u?180:-180):(_*=-1,f+=0>=f?180:-180)),c.scaleX=h,c.scaleY=_,c.rotation=u,c.skewX=f,Ft&&(c.rotationX=c.rotationY=c.z=0,c.perspective=d,c.scaleZ=1),c.svg&&(c.x-=c.xOrigin-(c.xOrigin*Y+c.yOrigin*j),c.y-=c.yOrigin-(c.xOrigin*B+c.yOrigin*U))}c.zOrigin=m;for(l in c)c[l]<2e-5&&c[l]>-2e-5&&(c[l]=0)}return s&&(t._gsTransform=c,c.svg&&(Ot&&t.style[Dt]?e.delayedCall(.001,function(){Gt(t.style,Dt)}):!Ot&&t.getAttribute("transform")&&e.delayedCall(.001,function(){t.removeAttribute("transform")}))),c},qt=function(t){var e,i,s=this.data,r=-s.rotation*I,n=r+s.skewX*I,a=1e5,o=(Math.cos(r)*s.scaleX*a|0)/a,l=(Math.sin(r)*s.scaleX*a|0)/a,h=(Math.sin(n)*-s.scaleY*a|0)/a,_=(Math.cos(n)*s.scaleY*a|0)/a,u=this.t.style,f=this.t.currentStyle;if(f){i=l,l=-h,h=-i,e=f.filter,u.filter="";var c,p,d=this.t.offsetWidth,g=this.t.offsetHeight,v="absolute"!==f.position,y="progid:DXImageTransform.Microsoft.Matrix(M11="+o+", M12="+l+", M21="+h+", M22="+_,T=s.x+d*s.xPercent/100,x=s.y+g*s.yPercent/100;if(null!=s.ox&&(T+=(c=(s.oxp?d*s.ox*.01:s.ox)-d/2)-(c*o+(p=(s.oyp?g*s.oy*.01:s.oy)-g/2)*l),x+=p-(c*h+p*_)),v?y+=", Dx="+((c=d/2)-(c*o+(p=g/2)*l)+T)+", Dy="+(p-(c*h+p*_)+x)+")":y+=", sizingMethod='auto expand')",-1!==e.indexOf("DXImageTransform.Microsoft.Matrix(")?u.filter=e.replace(z,y):u.filter=y+" "+e,(0===t||1===t)&&1===o&&0===l&&0===h&&1===_&&(v&&-1===y.indexOf("Dx=0, Dy=0")||w.test(e)&&100!==parseFloat(RegExp.$1)||-1===e.indexOf(e.indexOf("Alpha"))&&u.removeAttribute("filter")),!v){var P,O,S,k=8>m?1:-1;for(c=s.ieOffsetX||0,p=s.ieOffsetY||0,s.ieOffsetX=Math.round((d-((0>o?-o:o)*d+(0>l?-l:l)*g))/2+T),s.ieOffsetY=Math.round((g-((0>_?-_:_)*g+(0>h?-h:h)*d))/2+x),xt=0;4>xt;xt++)O=rt[xt],P=f[O],i=-1!==P.indexOf("px")?parseFloat(P):J(this.t,O,parseFloat(P),P.replace(b,""))||0,S=i!==s[O]?2>xt?-s.ieOffsetX:-s.ieOffsetY:2>xt?c-s.ieOffsetX:p-s.ieOffsetY,u[O]=(s[O]=Math.round(i-S*(0===xt||2===xt?1:k)))+"px"}}},Wt=U.set3DTransformRatio=U.setTransformRatio=function(t){var e,i,s,r,n,a,o,l,h,_,u,f,p,m,d,g,v,y,T,x,b,w,P,O=this.data,S=this.t.style,k=O.rotation,R=O.rotationX,A=O.rotationY,C=O.scaleX,D=O.scaleY,M=O.scaleZ,z=O.x,F=O.y,X=O.z,L=O.svg,N=O.perspective,E=O.force3D;if(!((1!==t&&0!==t||"auto"!==E||this.tween._totalTime!==this.tween._totalDuration&&this.tween._totalTime)&&E||X||N||A||R||1!==M)||Ot&&L||!Ft)k||O.skewX||L?(k*=I,w=O.skewX*I,P=1e5,e=Math.cos(k)*C,r=Math.sin(k)*C,i=Math.sin(k-w)*-D,n=Math.cos(k-w)*D,w&&"simple"===O.skewType&&(v=Math.tan(w),i*=v=Math.sqrt(1+v*v),n*=v,O.skewY&&(e*=v,r*=v)),L&&(z+=O.xOrigin-(O.xOrigin*e+O.yOrigin*i)+O.xOffset,F+=O.yOrigin-(O.xOrigin*r+O.yOrigin*n)+O.yOffset,Ot&&(O.xPercent||O.yPercent)&&(m=this.t.getBBox(),z+=.01*O.xPercent*m.width,F+=.01*O.yPercent*m.height),(m=1e-6)>z&&z>-m&&(z=0),m>F&&F>-m&&(F=0)),T=(e*P|0)/P+","+(r*P|0)/P+","+(i*P|0)/P+","+(n*P|0)/P+","+z+","+F+")",L&&Ot?this.t.setAttribute("transform","matrix("+T):S[Dt]=(O.xPercent||O.yPercent?"translate("+O.xPercent+"%,"+O.yPercent+"%) matrix(":"matrix(")+T):S[Dt]=(O.xPercent||O.yPercent?"translate("+O.xPercent+"%,"+O.yPercent+"%) matrix(":"matrix(")+C+",0,0,"+D+","+z+","+F+")";else{if(c&&((m=1e-4)>C&&C>-m&&(C=M=2e-5),m>D&&D>-m&&(D=M=2e-5),!N||O.z||O.rotationX||O.rotationY||(N=0)),k||O.skewX)k*=I,d=e=Math.cos(k),g=r=Math.sin(k),O.skewX&&(k-=O.skewX*I,d=Math.cos(k),g=Math.sin(k),"simple"===O.skewType&&(v=Math.tan(O.skewX*I),v=Math.sqrt(1+v*v),d*=v,g*=v,O.skewY&&(e*=v,r*=v))),i=-g,n=d;else{if(!(A||R||1!==M||N||L))return void(S[Dt]=(O.xPercent||O.yPercent?"translate("+O.xPercent+"%,"+O.yPercent+"%) translate3d(":"translate3d(")+z+"px,"+F+"px,"+X+"px)"+(1!==C||1!==D?" scale("+C+","+D+")":""));e=n=1,i=r=0}h=1,s=a=o=l=_=u=0,f=N?-1/N:0,p=O.zOrigin,m=1e-6,x=",",b="0",(k=A*I)&&(d=Math.cos(k),o=-(g=Math.sin(k)),_=f*-g,s=e*g,a=r*g,h=d,f*=d,e*=d,r*=d),(k=R*I)&&(v=i*(d=Math.cos(k))+s*(g=Math.sin(k)),y=n*d+a*g,l=h*g,u=f*g,s=i*-g+s*d,a=n*-g+a*d,h*=d,f*=d,i=v,n=y),1!==M&&(s*=M,a*=M,h*=M,f*=M),1!==D&&(i*=D,n*=D,l*=D,u*=D),1!==C&&(e*=C,r*=C,o*=C,_*=C),(p||L)&&(p&&(z+=s*-p,F+=a*-p,X+=h*-p+p),L&&(z+=O.xOrigin-(O.xOrigin*e+O.yOrigin*i)+O.xOffset,F+=O.yOrigin-(O.xOrigin*r+O.yOrigin*n)+O.yOffset),m>z&&z>-m&&(z=b),m>F&&F>-m&&(F=b),m>X&&X>-m&&(X=0)),T=O.xPercent||O.yPercent?"translate("+O.xPercent+"%,"+O.yPercent+"%) matrix3d(":"matrix3d(",T+=(m>e&&e>-m?b:e)+x+(m>r&&r>-m?b:r)+x+(m>o&&o>-m?b:o),T+=x+(m>_&&_>-m?b:_)+x+(m>i&&i>-m?b:i)+x+(m>n&&n>-m?b:n),R||A||1!==M?(T+=x+(m>l&&l>-m?b:l)+x+(m>u&&u>-m?b:u)+x+(m>s&&s>-m?b:s),T+=x+(m>a&&a>-m?b:a)+x+(m>h&&h>-m?b:h)+x+(m>f&&f>-m?b:f)+x):T+=",0,0,0,0,1,0,",T+=z+x+F+x+X+x+(N?1+-X/N:1)+")",S[Dt]=T}};(h=Xt.prototype).x=h.y=h.z=h.skewX=h.skewY=h.rotation=h.rotationX=h.rotationY=h.zOrigin=h.xPercent=h.yPercent=h.xOffset=h.yOffset=0,h.scaleX=h.scaleY=h.scaleZ=1,wt("transform,scale,scaleX,scaleY,scaleZ,x,y,z,rotation,rotationX,rotationY,rotationZ,skewX,skewY,shortRotation,shortRotationX,shortRotationY,shortRotationZ,transformOrigin,svgOrigin,transformPerspective,directionalRotation,parseTransform,force3D,skewType,xPercent,yPercent,smoothOrigin",{parser:function(t,e,i,s,n,o,l){if(s._lastParsedTransform===l)return n;s._lastParsedTransform=l;var h,_,u,f,c,p,m,d,g,v,y=t._gsTransform,T=t.style,x=Ct.length,b=l,w={},P="transformOrigin";if(l.display?(u=K(t,"display"),T.display="block",h=Vt(t,r,!0,l.parseTransform),T.display=u):h=Vt(t,r,!0,l.parseTransform),s._transform=h,"string"==typeof b.transform&&Dt)u=B.style,u[Dt]=b.transform,u.display="block",u.position="absolute",E.body.appendChild(B),_=Vt(B,null,!1),h.svg&&(d=h.xOrigin,g=h.yOrigin,_.x-=h.xOffset,_.y-=h.yOffset,(b.transformOrigin||b.svgOrigin)&&(f={},Yt(t,at(b.transformOrigin),f,b.svgOrigin,b.smoothOrigin,!0),d=f.xOrigin,g=f.yOrigin,_.x-=f.xOffset-h.xOffset,_.y-=f.yOffset-h.yOffset),(d||g)&&(v=Ut(B),_.x-=d-(d*v[0]+g*v[2]),_.y-=g-(d*v[1]+g*v[3]))),E.body.removeChild(B),_.perspective||(_.perspective=h.perspective),null!=b.xPercent&&(_.xPercent=lt(b.xPercent,h.xPercent)),null!=b.yPercent&&(_.yPercent=lt(b.yPercent,h.yPercent));else if("object"==typeof b){if(_={scaleX:lt(null!=b.scaleX?b.scaleX:b.scale,h.scaleX),scaleY:lt(null!=b.scaleY?b.scaleY:b.scale,h.scaleY),scaleZ:lt(b.scaleZ,h.scaleZ),x:lt(b.x,h.x),y:lt(b.y,h.y),z:lt(b.z,h.z),xPercent:lt(b.xPercent,h.xPercent),yPercent:lt(b.yPercent,h.yPercent),perspective:lt(b.transformPerspective,h.perspective)},null!=(m=b.directionalRotation))if("object"==typeof m)for(u in m)b[u]=m[u];else b.rotation=m;"string"==typeof b.x&&-1!==b.x.indexOf("%")&&(_.x=0,_.xPercent=lt(b.x,h.xPercent)),"string"==typeof b.y&&-1!==b.y.indexOf("%")&&(_.y=0,_.yPercent=lt(b.y,h.yPercent)),_.rotation=ht("rotation"in b?b.rotation:"shortRotation"in b?b.shortRotation+"_short":"rotationZ"in b?b.rotationZ:h.rotation-h.skewY,h.rotation-h.skewY,"rotation",w),Ft&&(_.rotationX=ht("rotationX"in b?b.rotationX:"shortRotationX"in b?b.shortRotationX+"_short":h.rotationX||0,h.rotationX,"rotationX",w),_.rotationY=ht("rotationY"in b?b.rotationY:"shortRotationY"in b?b.shortRotationY+"_short":h.rotationY||0,h.rotationY,"rotationY",w)),_.skewX=ht(b.skewX,h.skewX-h.skewY),(_.skewY=ht(b.skewY,h.skewY))&&(_.skewX+=_.skewY,_.rotation+=_.skewY)}for(Ft&&null!=b.force3D&&(h.force3D=b.force3D,p=!0),h.skewType=b.skewType||h.skewType||a.defaultSkewType,(c=h.force3D||h.z||h.rotationX||h.rotationY||_.z||_.rotationX||_.rotationY||_.perspective)||null==b.scale||(_.scaleZ=1);--x>-1;)i=Ct[x],f=_[i]-h[i],(f>1e-6||-1e-6>f||null!=b[i]||null!=N[i])&&(p=!0,n=new vt(h,i,h[i],f,n),i in w&&(n.e=w[i]),n.xs0=0,n.plugin=o,s._overwriteProps.push(n.n));return f=b.transformOrigin,h.svg&&(f||b.svgOrigin)&&(d=h.xOffset,g=h.yOffset,Yt(t,at(f),_,b.svgOrigin,b.smoothOrigin),n=yt(h,"xOrigin",(y?h:_).xOrigin,_.xOrigin,n,P),n=yt(h,"yOrigin",(y?h:_).yOrigin,_.yOrigin,n,P),(d!==h.xOffset||g!==h.yOffset)&&(n=yt(h,"xOffset",y?d:h.xOffset,h.xOffset,n,P),n=yt(h,"yOffset",y?g:h.yOffset,h.yOffset,n,P)),f=Ot?null:"0px 0px"),(f||Ft&&c&&h.zOrigin)&&(Dt?(p=!0,i=zt,f=(f||K(t,i,r,!1,"50% 50%"))+"",(n=new vt(T,i,0,0,n,-1,P)).b=T[i],n.plugin=o,Ft?(u=h.zOrigin,f=f.split(" "),h.zOrigin=(f.length>2&&(0===u||"0px"!==f[2])?parseFloat(f[2]):u)||0,n.xs0=n.e=f[0]+" "+(f[1]||"50%")+" 0px",(n=new vt(h,"zOrigin",0,0,n,-1,n.n)).b=u,n.xs0=n.e=h.zOrigin):n.xs0=n.e=f):at(f+"",h)),p&&(s._transformType=h.svg&&Ot||!c&&3!==this._transformType?2:3),n},prefix:!0}),wt("boxShadow",{defaultValue:"0px 0px 0px 0px #999",prefix:!0,color:!0,multi:!0,keyword:"inset"}),wt("borderRadius",{defaultValue:"0px",parser:function(t,e,i,n,a,o){e=this.format(e);var l,h,_,u,f,c,p,m,d,g,v,y,T,x,b,w,P=["borderTopLeftRadius","borderTopRightRadius","borderBottomRightRadius","borderBottomLeftRadius"],O=t.style;for(d=parseFloat(t.offsetWidth),g=parseFloat(t.offsetHeight),l=e.split(" "),h=0;h<P.length;h++)this.p.indexOf("border")&&(P[h]=Q(P[h])),f=u=K(t,P[h],r,!1,"0px"),-1!==f.indexOf(" ")&&(u=f.split(" "),f=u[0],u=u[1]),c=_=l[h],p=parseFloat(f),y=f.substr((p+"").length),T="="===c.charAt(1),T?(m=parseInt(c.charAt(0)+"1",10),c=c.substr(2),m*=parseFloat(c),v=c.substr((m+"").length-(0>m?1:0))||""):(m=parseFloat(c),v=c.substr((m+"").length)),""===v&&(v=s[i]||y),v!==y&&(x=J(t,"borderLeft",p,y),b=J(t,"borderTop",p,y),"%"===v?(f=x/d*100+"%",u=b/g*100+"%"):"em"===v?(w=J(t,"borderLeft",1,"em"),f=x/w+"em",u=b/w+"em"):(f=x+"px",u=b+"px"),T&&(c=parseFloat(f)+m+v,_=parseFloat(u)+m+v)),a=Tt(O,P[h],f+" "+u,c+" "+_,!1,"0px",a);return a},prefix:!0,formatter:mt("0px 0px 0px 0px",!1,!0)}),wt("backgroundPosition",{defaultValue:"0 0",parser:function(t,e,i,s,n,a){var o,l,h,_,u,f,c="background-position",p=r||H(t,null),d=this.format((p?m?p.getPropertyValue(c+"-x")+" "+p.getPropertyValue(c+"-y"):p.getPropertyValue(c):t.currentStyle.backgroundPositionX+" "+t.currentStyle.backgroundPositionY)||"0 0"),g=this.format(e);if(-1!==d.indexOf("%")!=(-1!==g.indexOf("%"))&&g.split(",").length<2&&((f=K(t,"backgroundImage").replace(A,""))&&"none"!==f)){for(o=d.split(" "),l=g.split(" "),j.setAttribute("src",f),h=2;--h>-1;)d=o[h],_=-1!==d.indexOf("%"),_!==(-1!==l[h].indexOf("%"))&&(u=0===h?t.offsetWidth-j.width:t.offsetHeight-j.height,o[h]=_?parseFloat(d)/100*u+"px":parseFloat(d)/u*100+"%");d=o.join(" ")}return this.parseComplex(t.style,d,g,n,a)},formatter:at}),wt("backgroundSize",{defaultValue:"0 0",formatter:at}),wt("perspective",{defaultValue:"0px",prefix:!0}),wt("perspectiveOrigin",{defaultValue:"50% 50%",prefix:!0}),wt("transformStyle",{prefix:!0}),wt("backfaceVisibility",{prefix:!0}),wt("userSelect",{prefix:!0}),wt("margin",{parser:dt("marginTop,marginRight,marginBottom,marginLeft")}),wt("padding",{parser:dt("paddingTop,paddingRight,paddingBottom,paddingLeft")}),wt("clip",{defaultValue:"rect(0px,0px,0px,0px)",parser:function(t,e,i,s,n,a){var o,l,h;return 9>m?(l=t.currentStyle,h=8>m?" ":",",o="rect("+l.clipTop+h+l.clipRight+h+l.clipBottom+h+l.clipLeft+")",e=this.format(e).split(",").join(h)):(o=this.format(K(t,this.p,r,!1,this.dflt)),e=this.format(e)),this.parseComplex(t.style,o,e,n,a)}}),wt("textShadow",{defaultValue:"0px 0px 0px #999",color:!0,multi:!0}),wt("autoRound,strictUnits",{parser:function(t,e,i,s,r){return r}}),wt("border",{defaultValue:"0px solid #000",parser:function(t,e,i,s,n,a){return this.parseComplex(t.style,this.format(K(t,"borderTopWidth",r,!1,"0px")+" "+K(t,"borderTopStyle",r,!1,"solid")+" "+K(t,"borderTopColor",r,!1,"#000")),this.format(e),n,a)},color:!0,formatter:function(t){var e=t.split(" ");return e[0]+" "+(e[1]||"solid")+" "+(t.match(pt)||["#000"])[0]}}),wt("borderWidth",{parser:dt("borderTopWidth,borderRightWidth,borderBottomWidth,borderLeftWidth")}),wt("float,cssFloat,styleFloat",{parser:function(t,e,i,s,r,n){var a=t.style,o="cssFloat"in a?"cssFloat":"styleFloat";return new vt(a,o,0,0,r,-1,i,!1,0,a[o],e)}});var Zt=function(t){var e,i=this.t,s=i.filter||K(this.data,"filter")||"",r=this.s+this.c*t|0;100===r&&(-1===s.indexOf("atrix(")&&-1===s.indexOf("radient(")&&-1===s.indexOf("oader(")?(i.removeAttribute("filter"),e=!K(this.data,"filter")):(i.filter=s.replace(O,""),e=!0)),e||(this.xn1&&(i.filter=s=s||"alpha(opacity="+r+")"),-1===s.indexOf("pacity")?0===r&&this.xn1||(i.filter=s+" alpha(opacity="+r+")"):i.filter=s.replace(w,"opacity="+r))};wt("opacity,alpha,autoAlpha",{defaultValue:"1",parser:function(t,e,i,s,n,a){var o=parseFloat(K(t,"opacity",r,!1,"1")),l=t.style,h="autoAlpha"===i;return"string"==typeof e&&"="===e.charAt(1)&&(e=("-"===e.charAt(0)?-1:1)*parseFloat(e.substr(2))+o),h&&1===o&&"hidden"===K(t,"visibility",r)&&0!==e&&(o=0),q?n=new vt(l,"opacity",o,e-o,n):((n=new vt(l,"opacity",100*o,100*(e-o),n)).xn1=h?1:0,l.zoom=1,n.type=2,n.b="alpha(opacity="+n.s+")",n.e="alpha(opacity="+(n.s+n.c)+")",n.data=t,n.plugin=a,n.setRatio=Zt),h&&((n=new vt(l,"visibility",0,0,n,-1,null,!1,0,0!==o?"inherit":"hidden",0===e?"hidden":"inherit")).xs0="inherit",s._overwriteProps.push(n.n),s._overwriteProps.push(i)),n}});var Gt=function(t,e){e&&(t.removeProperty?(("ms"===e.substr(0,2)||"webkit"===e.substr(0,6))&&(e="-"+e),t.removeProperty(e.replace(k,"-$1").toLowerCase())):t.removeAttribute(e))},$t=function(t){if(this.t._gsClassPT=this,1===t||0===t){this.t.setAttribute("class",0===t?this.b:this.e);for(var e=this.data,i=this.t.style;e;)e.v?i[e.p]=e.v:Gt(i,e.p),e=e._next;1===t&&this.t._gsClassPT===this&&(this.t._gsClassPT=null)}else this.t.getAttribute("class")!==this.e&&this.t.setAttribute("class",this.e)};wt("className",{parser:function(t,e,s,n,a,o,l){var h,_,u,f,c,p=t.getAttribute("class")||"",m=t.style.cssText;if((a=n._classNamePT=new vt(t,s,0,0,a,2)).setRatio=$t,a.pr=-11,i=!0,a.b=p,_=et(t,r),u=t._gsClassPT){for(f={},c=u.data;c;)f[c.p]=1,c=c._next;u.setRatio(1)}return t._gsClassPT=a,a.e="="!==e.charAt(1)?e:p.replace(new RegExp("(?:\\s|^)"+e.substr(2)+"(?![\\w-])"),"")+("+"===e.charAt(0)?" "+e.substr(2):""),t.setAttribute("class",a.e),h=it(t,_,et(t),l,f),t.setAttribute("class",p),a.data=h.firstMPT,t.style.cssText=m,a.xfirst=n.parse(t,h.difs,a,o)}});var Qt=function(t){if((1===t||0===t)&&this.data._totalTime===this.data._totalDuration&&"isFromStart"!==this.data.data){var e,i,s,r,n,a=this.t.style,o=l.transform.parse;if("all"===this.e)a.cssText="",r=!0;else for(e=this.e.split(" ").join("").split(","),s=e.length;--s>-1;)i=e[s],l[i]&&(l[i].parse===o?r=!0:i="transformOrigin"===i?zt:l[i].p),Gt(a,i);r&&(Gt(a,Dt),(n=this.t._gsTransform)&&(n.svg&&(this.t.removeAttribute("data-svg-origin"),this.t.removeAttribute("transform")),delete this.t._gsTransform))}};for(wt("clearProps",{parser:function(t,e,s,r,n){return(n=new vt(t,s,0,0,n,2)).setRatio=Qt,n.e=e,n.pr=-10,n.data=r._tween,i=!0,n}}),h="bezier,throwProps,physicsProps,physics2D".split(","),xt=h.length;xt--;)Pt(h[xt]);(h=a.prototype)._firstPT=h._lastParsedTransform=h._transform=null,h._onInitTween=function(t,e,o){if(!t.nodeType)return!1;this._target=t,this._tween=o,this._vars=e,_=e.autoRound,i=!1,s=e.suffixMap||a.suffixMap,r=H(t,""),n=this._overwriteProps;var h,c,m,d,g,v,y,T,x,b=t.style;if(u&&""===b.zIndex&&(("auto"===(h=K(t,"zIndex",r))||""===h)&&this._addLazySet(b,"zIndex",0)),"string"==typeof e&&(d=b.cssText,h=et(t,r),b.cssText=d+";"+e,h=it(t,h,et(t)).difs,!q&&P.test(e)&&(h.opacity=parseFloat(RegExp.$1)),e=h,b.cssText=d),e.className?this._firstPT=c=l.className.parse(t,e.className,"className",this,null,null,e):this._firstPT=c=this.parse(t,e,null),this._transformType){for(x=3===this._transformType,Dt?f&&(u=!0,""===b.zIndex&&(("auto"===(y=K(t,"zIndex",r))||""===y)&&this._addLazySet(b,"zIndex",0)),p&&this._addLazySet(b,"WebkitBackfaceVisibility",this._vars.WebkitBackfaceVisibility||(x?"visible":"hidden"))):b.zoom=1,m=c;m&&m._next;)m=m._next;T=new vt(t,"transform",0,0,null,2),this._linkCSSP(T,null,m),T.setRatio=Dt?Wt:qt,T.data=this._transform||Vt(t,r,!0),T.tween=o,T.pr=-1,n.pop()}if(i){for(;c;){for(v=c._next,m=d;m&&m.pr>c.pr;)m=m._next;(c._prev=m?m._prev:g)?c._prev._next=c:d=c,(c._next=m)?m._prev=c:g=c,c=v}this._firstPT=d}return!0},h.parse=function(t,e,i,n){var a,o,h,u,f,c,p,m,d,g,v=t.style;for(a in e)c=e[a],o=l[a],o?i=o.parse(t,c,a,this,i,n,e):(f=K(t,a,r)+"",d="string"==typeof c,"color"===a||"fill"===a||"stroke"===a||-1!==a.indexOf("Color")||d&&S.test(c)?(d||(c=ft(c),c=(c.length>3?"rgba(":"rgb(")+c.join(",")+")"),i=Tt(v,a,f,c,!0,"transparent",i,0,n)):d&&X.test(c)?i=Tt(v,a,f,c,!0,null,i,0,n):(h=parseFloat(f),p=h||0===h?f.substr((h+"").length):"",(""===f||"auto"===f)&&("width"===a||"height"===a?(h=nt(t,a,r),p="px"):"left"===a||"top"===a?(h=tt(t,a,r),p="px"):(h="opacity"!==a?0:1,p="")),g=d&&"="===c.charAt(1),g?(u=parseInt(c.charAt(0)+"1",10),c=c.substr(2),u*=parseFloat(c),m=c.replace(b,"")):(u=parseFloat(c),m=d?c.replace(b,""):""),""===m&&(m=a in s?s[a]:p),c=u||0===u?(g?u+h:u)+m:e[a],p!==m&&""!==m&&(u||0===u)&&h&&(h=J(t,a,h,p),"%"===m?(h/=J(t,a,100,"%")/100,!0!==e.strictUnits&&(f=h+"%")):"em"===m||"rem"===m||"vw"===m||"vh"===m?h/=J(t,a,1,m):"px"!==m&&(u=J(t,a,u,m),m="px"),g&&(u||0===u)&&(c=u+h+m)),g&&(u+=h),!h&&0!==h||!u&&0!==u?void 0!==v[a]&&(c||c+""!="NaN"&&null!=c)?(i=new vt(v,a,u||h||0,0,i,-1,a,!1,0,f,c),i.xs0="none"!==c||"display"!==a&&-1===a.indexOf("Style")?c:f):Z("invalid "+a+" tween value: "+e[a]):(i=new vt(v,a,h,u-h,i,0,a,!1!==_&&("px"===m||"zIndex"===a),0,f,c),i.xs0=m))),n&&i&&!i.plugin&&(i.plugin=n);return i},h.setRatio=function(t){var e,i,s,r=this._firstPT;if(1!==t||this._tween._time!==this._tween._duration&&0!==this._tween._time)if(t||this._tween._time!==this._tween._duration&&0!==this._tween._time||-1e-6===this._tween._rawPrevTime)for(;r;){if(e=r.c*t+r.s,r.r?e=Math.round(e):1e-6>e&&e>-1e-6&&(e=0),r.type)if(1===r.type)if(s=r.l,2===s)r.t[r.p]=r.xs0+e+r.xs1+r.xn1+r.xs2;else if(3===s)r.t[r.p]=r.xs0+e+r.xs1+r.xn1+r.xs2+r.xn2+r.xs3;else if(4===s)r.t[r.p]=r.xs0+e+r.xs1+r.xn1+r.xs2+r.xn2+r.xs3+r.xn3+r.xs4;else if(5===s)r.t[r.p]=r.xs0+e+r.xs1+r.xn1+r.xs2+r.xn2+r.xs3+r.xn3+r.xs4+r.xn4+r.xs5;else{for(i=r.xs0+e+r.xs1,s=1;s<r.l;s++)i+=r["xn"+s]+r["xs"+(s+1)];r.t[r.p]=i}else-1===r.type?r.t[r.p]=r.xs0:r.setRatio&&r.setRatio(t);else r.t[r.p]=e+r.xs0;r=r._next}else for(;r;)2!==r.type?r.t[r.p]=r.b:r.setRatio(t),r=r._next;else for(;r;){if(2!==r.type)if(r.r&&-1!==r.type)if(e=Math.round(r.s+r.c),r.type){if(1===r.type){for(s=r.l,i=r.xs0+e+r.xs1,s=1;s<r.l;s++)i+=r["xn"+s]+r["xs"+(s+1)];r.t[r.p]=i}}else r.t[r.p]=e+r.xs0;else r.t[r.p]=r.e;else r.setRatio(t);r=r._next}},h._enableTransforms=function(t){this._transform=this._transform||Vt(this._target,r,!0),this._transformType=this._transform.svg&&Ot||!t&&3!==this._transformType?2:3};var Ht=function(t){this.t[this.p]=this.e,this.data._linkCSSP(this,this._next,null,!0)};h._addLazySet=function(t,e,i){var s=this._firstPT=new vt(t,e,0,0,this._firstPT,2);s.e=i,s.setRatio=Ht,s.data=this},h._linkCSSP=function(t,e,i,s){return t&&(e&&(e._prev=t),t._next&&(t._next._prev=t._prev),t._prev?t._prev._next=t._next:this._firstPT===t&&(this._firstPT=t._next,s=!0),i?i._next=t:s||null!==this._firstPT||(this._firstPT=t),t._next=e,t._prev=i),t},h._kill=function(e){var i,s,r,n=e;if(e.autoAlpha||e.alpha){n={};for(s in e)n[s]=e[s];n.opacity=1,n.autoAlpha&&(n.visibility=1)}return e.className&&(i=this._classNamePT)&&((r=i.xfirst)&&r._prev?this._linkCSSP(r._prev,i._next,r._prev._prev):r===this._firstPT&&(this._firstPT=i._next),i._next&&this._linkCSSP(i._next,i._next._next,r._prev),this._classNamePT=null),t.prototype._kill.call(this,n)};var Kt=function(t,e,i){var s,r,n,a;if(t.slice)for(r=t.length;--r>-1;)Kt(t[r],e,i);else for(s=t.childNodes,r=s.length;--r>-1;)n=s[r],a=n.type,n.style&&(e.push(et(n)),i&&i.push(n)),1!==a&&9!==a&&11!==a||!n.childNodes.length||Kt(n,e,i)};return a.cascadeTo=function(t,i,s){var r,n,a,o,l=e.to(t,i,s),h=[l],_=[],u=[],f=[],c=e._internals.reservedProps;for(t=l._targets||l.target,Kt(t,_,f),l.render(i,!0,!0),Kt(t,u),l.render(0,!0,!0),l._enabled(!0),r=f.length;--r>-1;)if(n=it(f[r],_[r],u[r]),n.firstMPT){n=n.difs;for(a in s)c[a]&&(n[a]=s[a]);o={};for(a in n)o[a]=_[r][a];h.push(e.fromTo(f[r],i,o,n))}return h},t.activate([a]),a},!0),t=function(t){for(;t;)t.f||t.blob||(t.r=1),t=t._next},(e=_gsScope._gsDefine.plugin({propName:"roundProps",version:"1.5",priority:-1,API:2,init:function(t,e,i){return this._tween=i,!0}}).prototype)._onInitAllProps=function(){for(var e,i,s,r=this._tween,n=r.vars.roundProps.join?r.vars.roundProps:r.vars.roundProps.split(","),a=n.length,o={},l=r._propLookup.roundProps;--a>-1;)o[n[a]]=1;for(a=n.length;--a>-1;)for(e=n[a],i=r._firstPT;i;)s=i._next,i.pg?i.t._roundProps(o,!0):i.n===e&&(2===i.f&&i.t?t(i.t._firstPT):(this._add(i.t,e,i.s,i.c),s&&(s._prev=i._prev),i._prev?i._prev._next=s:r._firstPT===i&&(r._firstPT=s),i._next=i._prev=null,r._propLookup[e]=l)),i=s;return!1},e._add=function(t,e,i,s){this._addTween(t,e,i,i+s,e,!0),this._overwriteProps.push(e)},_gsScope._gsDefine.plugin({propName:"attr",API:2,version:"0.5.0",init:function(t,e,i){var s;if("function"!=typeof t.setAttribute)return!1;for(s in e)this._addTween(t,"setAttribute",t.getAttribute(s)+"",e[s]+"",s,!1,s),this._overwriteProps.push(s);return!0}}),_gsScope._gsDefine.plugin({propName:"directionalRotation",version:"0.2.1",API:2,init:function(t,e,i){"object"!=typeof e&&(e={rotation:e}),this.finals={};var s,r,n,a,o,l,h=!0===e.useRadians?2*Math.PI:360;for(s in e)"useRadians"!==s&&(l=(e[s]+"").split("_"),r=l[0],n=parseFloat("function"!=typeof t[s]?t[s]:t[s.indexOf("set")||"function"!=typeof t["get"+s.substr(3)]?s:"get"+s.substr(3)]()),a=this.finals[s]="string"==typeof r&&"="===r.charAt(1)?n+parseInt(r.charAt(0)+"1",10)*Number(r.substr(2)):Number(r)||0,o=a-n,l.length&&(r=l.join("_"),-1!==r.indexOf("short")&&(o%=h,o!==o%(h/2)&&(o=0>o?o+h:o-h)),-1!==r.indexOf("_cw")&&0>o?o=(o+9999999999*h)%h-(o/h|0)*h:-1!==r.indexOf("ccw")&&o>0&&(o=(o-9999999999*h)%h-(o/h|0)*h)),(o>1e-6||-1e-6>o)&&(this._addTween(t,s,n,n+o,s),this._overwriteProps.push(s)));return!0},set:function(t){var e;if(1!==t)this._super.setRatio.call(this,t);else for(e=this._firstPT;e;)e.f?e.t[e.p](this.finals[e.p]):e.t[e.p]=this.finals[e.p],e=e._next}})._autoCSS=!0,_gsScope._gsDefine("easing.Back",["easing.Ease"],function(t){var e,i,s,r=_gsScope.GreenSockGlobals||_gsScope,n=r.com.greensock,a=2*Math.PI,o=Math.PI/2,l=n._class,h=function(e,i){var s=l("easing."+e,function(){},!0),r=s.prototype=new t;return r.constructor=s,r.getRatio=i,s},_=t.register||function(){},u=function(t,e,i,s,r){var n=l("easing."+t,{easeOut:new e,easeIn:new i,easeInOut:new s},!0);return _(n,t),n},f=function(t,e,i){this.t=t,this.v=e,i&&(this.next=i,i.prev=this,this.c=i.v-e,this.gap=i.t-t)},c=function(e,i){var s=l("easing."+e,function(t){this._p1=t||0===t?t:1.70158,this._p2=1.525*this._p1},!0),r=s.prototype=new t;return r.constructor=s,r.getRatio=i,r.config=function(t){return new s(t)},s},p=u("Back",c("BackOut",function(t){return(t-=1)*t*((this._p1+1)*t+this._p1)+1}),c("BackIn",function(t){return t*t*((this._p1+1)*t-this._p1)}),c("BackInOut",function(t){return(t*=2)<1?.5*t*t*((this._p2+1)*t-this._p2):.5*((t-=2)*t*((this._p2+1)*t+this._p2)+2)})),m=l("easing.SlowMo",function(t,e,i){e=e||0===e?e:.7,null==t?t=.7:t>1&&(t=1),this._p=1!==t?e:0,this._p1=(1-t)/2,this._p2=t,this._p3=this._p1+this._p2,this._calcEnd=!0===i},!0),d=m.prototype=new t;return d.constructor=m,d.getRatio=function(t){var e=t+(.5-t)*this._p;return t<this._p1?this._calcEnd?1-(t=1-t/this._p1)*t:e-(t=1-t/this._p1)*t*t*t*e:t>this._p3?this._calcEnd?1-(t=(t-this._p3)/this._p1)*t:e+(t-e)*(t=(t-this._p3)/this._p1)*t*t*t:this._calcEnd?1:e},m.ease=new m(.7,.7),d.config=m.config=function(t,e,i){return new m(t,e,i)},(d=(e=l("easing.SteppedEase",function(t){t=t||1,this._p1=1/t,this._p2=t+1},!0)).prototype=new t).constructor=e,d.getRatio=function(t){return 0>t?t=0:t>=1&&(t=.999999999),(this._p2*t>>0)*this._p1},d.config=e.config=function(t){return new e(t)},(d=(i=l("easing.RoughEase",function(e){for(var i,s,r,n,a,o,l=(e=e||{}).taper||"none",h=[],_=0,u=0|(e.points||20),c=u,p=!1!==e.randomize,m=!0===e.clamp,d=e.template instanceof t?e.template:null,g="number"==typeof e.strength?.4*e.strength:.4;--c>-1;)i=p?Math.random():1/u*c,s=d?d.getRatio(i):i,"none"===l?r=g:"out"===l?(n=1-i,r=n*n*g):"in"===l?r=i*i*g:.5>i?(n=2*i,r=n*n*.5*g):(n=2*(1-i),r=n*n*.5*g),p?s+=Math.random()*r-.5*r:c%2?s+=.5*r:s-=.5*r,m&&(s>1?s=1:0>s&&(s=0)),h[_++]={x:i,y:s};for(h.sort(function(t,e){return t.x-e.x}),o=new f(1,1,null),c=u;--c>-1;)a=h[c],o=new f(a.x,a.y,o);this._prev=new f(0,0,0!==o.t?o:o.next)},!0)).prototype=new t).constructor=i,d.getRatio=function(t){var e=this._prev;if(t>e.t){for(;e.next&&t>=e.t;)e=e.next;e=e.prev}else for(;e.prev&&t<=e.t;)e=e.prev;return this._prev=e,e.v+(t-e.t)/e.gap*e.c},d.config=function(t){return new i(t)},i.ease=new i,u("Bounce",h("BounceOut",function(t){return 1/2.75>t?7.5625*t*t:2/2.75>t?7.5625*(t-=1.5/2.75)*t+.75:2.5/2.75>t?7.5625*(t-=2.25/2.75)*t+.9375:7.5625*(t-=2.625/2.75)*t+.984375}),h("BounceIn",function(t){return(t=1-t)<1/2.75?1-7.5625*t*t:2/2.75>t?1-(7.5625*(t-=1.5/2.75)*t+.75):2.5/2.75>t?1-(7.5625*(t-=2.25/2.75)*t+.9375):1-(7.5625*(t-=2.625/2.75)*t+.984375)}),h("BounceInOut",function(t){var e=.5>t;return t=1/2.75>(t=e?1-2*t:2*t-1)?7.5625*t*t:2/2.75>t?7.5625*(t-=1.5/2.75)*t+.75:2.5/2.75>t?7.5625*(t-=2.25/2.75)*t+.9375:7.5625*(t-=2.625/2.75)*t+.984375,e?.5*(1-t):.5*t+.5})),u("Circ",h("CircOut",function(t){return Math.sqrt(1-(t-=1)*t)}),h("CircIn",function(t){return-(Math.sqrt(1-t*t)-1)}),h("CircInOut",function(t){return(t*=2)<1?-.5*(Math.sqrt(1-t*t)-1):.5*(Math.sqrt(1-(t-=2)*t)+1)})),u("Elastic",(s=function(e,i,s){var r=l("easing."+e,function(t,e){this._p1=t>=1?t:1,this._p2=(e||s)/(1>t?t:1),this._p3=this._p2/a*(Math.asin(1/this._p1)||0),this._p2=a/this._p2},!0),n=r.prototype=new t;return n.constructor=r,n.getRatio=i,n.config=function(t,e){return new r(t,e)},r})("ElasticOut",function(t){return this._p1*Math.pow(2,-10*t)*Math.sin((t-this._p3)*this._p2)+1},.3),s("ElasticIn",function(t){return-this._p1*Math.pow(2,10*(t-=1))*Math.sin((t-this._p3)*this._p2)},.3),s("ElasticInOut",function(t){return(t*=2)<1?this._p1*Math.pow(2,10*(t-=1))*Math.sin((t-this._p3)*this._p2)*-.5:this._p1*Math.pow(2,-10*(t-=1))*Math.sin((t-this._p3)*this._p2)*.5+1},.45)),u("Expo",h("ExpoOut",function(t){return 1-Math.pow(2,-10*t)}),h("ExpoIn",function(t){return Math.pow(2,10*(t-1))-.001}),h("ExpoInOut",function(t){return(t*=2)<1?.5*Math.pow(2,10*(t-1)):.5*(2-Math.pow(2,-10*(t-1)))})),u("Sine",h("SineOut",function(t){return Math.sin(t*o)}),h("SineIn",function(t){return 1-Math.cos(t*o)}),h("SineInOut",function(t){return-.5*(Math.cos(Math.PI*t)-1)})),l("easing.EaseLookup",{find:function(e){return t.map[e]}},!0),_(r.SlowMo,"SlowMo","ease,"),_(i,"RoughEase","ease,"),_(e,"SteppedEase","ease,"),p},!0)}),_gsScope._gsDefine&&_gsScope._gsQueue.pop()(),function(t,e){"use strict";var i,s,r=t.GreenSockGlobals=t.GreenSockGlobals||t;if(!r.TweenLite){var n,a,o,l,h,_=function(t){var e,i=t.split("."),s=r;for(e=0;e<i.length;e++)s[i[e]]=s=s[i[e]]||{};return s},u=_("com.greensock"),f=1e-10,c=function(t){var e,i=[],s=t.length;for(e=0;e!==s;i.push(t[e++]));return i},p=function(){},m=(i=Object.prototype.toString,s=i.call([]),function(t){return null!=t&&(t instanceof Array||"object"==typeof t&&!!t.push&&i.call(t)===s)}),d={},g=function(e,i,s,n){this.sc=d[e]?d[e].sc:[],d[e]=this,this.gsClass=null,this.func=s;var a=[];this.check=function(o){for(var l,h,u,f,c,p=i.length,m=p;--p>-1;)(l=d[i[p]]||new g(i[p],[])).gsClass?(a[p]=l.gsClass,m--):o&&l.sc.push(this);if(0===m&&s)for(h=("com.greensock."+e).split("."),u=h.pop(),f=_(h.join("."))[u]=this.gsClass=s.apply(s,a),n&&(r[u]=f,c="undefined"!=typeof module&&module.exports,!c&&"function"==typeof define&&define.amd?define((t.GreenSockAMDPath?t.GreenSockAMDPath+"/":"")+e.split(".").pop(),[],function(){return f}):"TweenMax"===e&&c&&(module.exports=f)),p=0;p<this.sc.length;p++)this.sc[p].check()},this.check(!0)},v=t._gsDefine=function(t,e,i,s){return new g(t,e,i,s)},y=u._class=function(t,e,i){return e=e||function(){},v(t,[],function(){return e},i),e};v.globals=r;var T=[0,0,1,1],x=[],b=y("easing.Ease",function(t,e,i,s){this._func=t,this._type=i||0,this._power=s||0,this._params=e?T.concat(e):T},!0),w=b.map={},P=b.register=function(t,e,i,s){for(var r,n,a,o,l=e.split(","),h=l.length,_=(i||"easeIn,easeOut,easeInOut").split(",");--h>-1;)for(n=l[h],r=s?y("easing."+n,null,!0):u.easing[n]||{},a=_.length;--a>-1;)o=_[a],w[n+"."+o]=w[o+n]=r[o]=t.getRatio?t:t[o]||new t};for((o=b.prototype)._calcEnd=!1,o.getRatio=function(t){if(this._func)return this._params[0]=t,this._func.apply(null,this._params);var e=this._type,i=this._power,s=1===e?1-t:2===e?t:.5>t?2*t:2*(1-t);return 1===i?s*=s:2===i?s*=s*s:3===i?s*=s*s*s:4===i&&(s*=s*s*s*s),1===e?1-s:2===e?s:.5>t?s/2:1-s/2},a=(n=["Linear","Quad","Cubic","Quart","Quint,Strong"]).length;--a>-1;)o=n[a]+",Power"+a,P(new b(null,null,1,a),o,"easeOut",!0),P(new b(null,null,2,a),o,"easeIn"+(0===a?",easeNone":"")),P(new b(null,null,3,a),o,"easeInOut");w.linear=u.easing.Linear.easeIn,w.swing=u.easing.Quad.easeInOut;var O=y("events.EventDispatcher",function(t){this._listeners={},this._eventTarget=t||this});(o=O.prototype).addEventListener=function(t,e,i,s,r){r=r||0;var n,a,o=this._listeners[t],_=0;for(null==o&&(this._listeners[t]=o=[]),a=o.length;--a>-1;)n=o[a],n.c===e&&n.s===i?o.splice(a,1):0===_&&n.pr<r&&(_=a+1);o.splice(_,0,{c:e,s:i,up:s,pr:r}),this!==l||h||l.wake()},o.removeEventListener=function(t,e){var i,s=this._listeners[t];if(s)for(i=s.length;--i>-1;)if(s[i].c===e)return void s.splice(i,1)},o.dispatchEvent=function(t){var e,i,s,r=this._listeners[t];if(r)for(e=r.length,i=this._eventTarget;--e>-1;)s=r[e],s&&(s.up?s.c.call(s.s||i,{type:t,target:i}):s.c.call(s.s||i))};var S=t.requestAnimationFrame,k=t.cancelAnimationFrame,R=Date.now||function(){return(new Date).getTime()},A=R();for(a=(n=["ms","moz","webkit","o"]).length;--a>-1&&!S;)S=t[n[a]+"RequestAnimationFrame"],k=t[n[a]+"CancelAnimationFrame"]||t[n[a]+"CancelRequestAnimationFrame"];y("Ticker",function(t,e){var i,s,r,n,a,o=this,_=R(),u=!(!1===e||!S)&&"auto",f=500,c=33,m=function(t){var e,l,h=R()-A;h>f&&(_+=h-c),A+=h,o.time=(A-_)/1e3,e=o.time-a,(!i||e>0||!0===t)&&(o.frame++,a+=e+(e>=n?.004:n-e),l=!0),!0!==t&&(r=s(m)),l&&o.dispatchEvent("tick")};O.call(o),o.time=o.frame=0,o.tick=function(){m(!0)},o.lagSmoothing=function(t,e){f=t||1e10,c=Math.min(e,f,0)},o.sleep=function(){null!=r&&(u&&k?k(r):clearTimeout(r),s=p,r=null,o===l&&(h=!1))},o.wake=function(t){null!==r?o.sleep():t?_+=-A+(A=R()):o.frame>10&&(A=R()-f+5),s=0===i?p:u&&S?S:function(t){return setTimeout(t,1e3*(a-o.time)+1|0)},o===l&&(h=!0),m(2)},o.fps=function(t){return arguments.length?(n=1/((i=t)||60),a=this.time+n,void o.wake()):i},o.useRAF=function(t){return arguments.length?(o.sleep(),u=t,void o.fps(i)):u},o.fps(t),setTimeout(function(){"auto"===u&&o.frame<5&&"hidden"!==document.visibilityState&&o.useRAF(!1)},1500)}),(o=u.Ticker.prototype=new u.events.EventDispatcher).constructor=u.Ticker;var C=y("core.Animation",function(t,e){if(this.vars=e=e||{},this._duration=this._totalDuration=t||0,this._delay=Number(e.delay)||0,this._timeScale=1,this._active=!0===e.immediateRender,this.data=e.data,this._reversed=!0===e.reversed,G){h||l.wake();var i=this.vars.useFrames?Z:G;i.add(this,i._time),this.vars.paused&&this.paused(!0)}});l=C.ticker=new u.Ticker,(o=C.prototype)._dirty=o._gc=o._initted=o._paused=!1,o._totalTime=o._time=0,o._rawPrevTime=-1,o._next=o._last=o._onUpdate=o._timeline=o.timeline=null,o._paused=!1;var D=function(){h&&R()-A>2e3&&l.wake(),setTimeout(D,2e3)};D(),o.play=function(t,e){return null!=t&&this.seek(t,e),this.reversed(!1).paused(!1)},o.pause=function(t,e){return null!=t&&this.seek(t,e),this.paused(!0)},o.resume=function(t,e){return null!=t&&this.seek(t,e),this.paused(!1)},o.seek=function(t,e){return this.totalTime(Number(t),!1!==e)},o.restart=function(t,e){return this.reversed(!1).paused(!1).totalTime(t?-this._delay:0,!1!==e,!0)},o.reverse=function(t,e){return null!=t&&this.seek(t||this.totalDuration(),e),this.reversed(!0).paused(!1)},o.render=function(t,e,i){},o.invalidate=function(){return this._time=this._totalTime=0,this._initted=this._gc=!1,this._rawPrevTime=-1,(this._gc||!this.timeline)&&this._enabled(!0),this},o.isActive=function(){var t,e=this._timeline,i=this._startTime;return!e||!this._gc&&!this._paused&&e.isActive()&&(t=e.rawTime())>=i&&t<i+this.totalDuration()/this._timeScale},o._enabled=function(t,e){return h||l.wake(),this._gc=!t,this._active=this.isActive(),!0!==e&&(t&&!this.timeline?this._timeline.add(this,this._startTime-this._delay):!t&&this.timeline&&this._timeline._remove(this,!0)),!1},o._kill=function(t,e){return this._enabled(!1,!1)},o.kill=function(t,e){return this._kill(t,e),this},o._uncache=function(t){for(var e=t?this:this.timeline;e;)e._dirty=!0,e=e.timeline;return this},o._swapSelfInParams=function(t){for(var e=t.length,i=t.concat();--e>-1;)"{self}"===t[e]&&(i[e]=this);return i},o._callback=function(t){var e=this.vars;e[t].apply(e[t+"Scope"]||e.callbackScope||this,e[t+"Params"]||x)},o.eventCallback=function(t,e,i,s){if("on"===(t||"").substr(0,2)){var r=this.vars;if(1===arguments.length)return r[t];null==e?delete r[t]:(r[t]=e,r[t+"Params"]=m(i)&&-1!==i.join("").indexOf("{self}")?this._swapSelfInParams(i):i,r[t+"Scope"]=s),"onUpdate"===t&&(this._onUpdate=e)}return this},o.delay=function(t){return arguments.length?(this._timeline.smoothChildTiming&&this.startTime(this._startTime+t-this._delay),this._delay=t,this):this._delay},o.duration=function(t){return arguments.length?(this._duration=this._totalDuration=t,this._uncache(!0),this._timeline.smoothChildTiming&&this._time>0&&this._time<this._duration&&0!==t&&this.totalTime(this._totalTime*(t/this._duration),!0),this):(this._dirty=!1,this._duration)},o.totalDuration=function(t){return this._dirty=!1,arguments.length?this.duration(t):this._totalDuration},o.time=function(t,e){return arguments.length?(this._dirty&&this.totalDuration(),this.totalTime(t>this._duration?this._duration:t,e)):this._time},o.totalTime=function(t,e,i){if(h||l.wake(),!arguments.length)return this._totalTime;if(this._timeline){if(0>t&&!i&&(t+=this.totalDuration()),this._timeline.smoothChildTiming){this._dirty&&this.totalDuration();var s=this._totalDuration,r=this._timeline;if(t>s&&!i&&(t=s),this._startTime=(this._paused?this._pauseTime:r._time)-(this._reversed?s-t:t)/this._timeScale,r._dirty||this._uncache(!1),r._timeline)for(;r._timeline;)r._timeline._time!==(r._startTime+r._totalTime)/r._timeScale&&r.totalTime(r._totalTime,!0),r=r._timeline}this._gc&&this._enabled(!0,!1),(this._totalTime!==t||0===this._duration)&&(X.length&&Q(),this.render(t,e,!1),X.length&&Q())}return this},o.progress=o.totalProgress=function(t,e){var i=this.duration();return arguments.length?this.totalTime(i*t,e):i?this._time/i:this.ratio},o.startTime=function(t){return arguments.length?(t!==this._startTime&&(this._startTime=t,this.timeline&&this.timeline._sortChildren&&this.timeline.add(this,t-this._delay)),this):this._startTime},o.endTime=function(t){return this._startTime+(0!=t?this.totalDuration():this.duration())/this._timeScale},o.timeScale=function(t){if(!arguments.length)return this._timeScale;if(t=t||f,this._timeline&&this._timeline.smoothChildTiming){var e=this._pauseTime,i=e||0===e?e:this._timeline.totalTime();this._startTime=i-(i-this._startTime)*this._timeScale/t}return this._timeScale=t,this._uncache(!1)},o.reversed=function(t){return arguments.length?(t!=this._reversed&&(this._reversed=t,this.totalTime(this._timeline&&!this._timeline.smoothChildTiming?this.totalDuration()-this._totalTime:this._totalTime,!0)),this):this._reversed},o.paused=function(t){if(!arguments.length)return this._paused;var e,i,s=this._timeline;return t!=this._paused&&s&&(h||t||l.wake(),i=(e=s.rawTime())-this._pauseTime,!t&&s.smoothChildTiming&&(this._startTime+=i,this._uncache(!1)),this._pauseTime=t?e:null,this._paused=t,this._active=this.isActive(),!t&&0!==i&&this._initted&&this.duration()&&(e=s.smoothChildTiming?this._totalTime:(e-this._startTime)/this._timeScale,this.render(e,e===this._totalTime,!0))),this._gc&&!t&&this._enabled(!0,!1),this};var M=y("core.SimpleTimeline",function(t){C.call(this,0,t),this.autoRemoveChildren=this.smoothChildTiming=!0});(o=M.prototype=new C).constructor=M,o.kill()._gc=!1,o._first=o._last=o._recent=null,o._sortChildren=!1,o.add=o.insert=function(t,e,i,s){var r,n;if(t._startTime=Number(e||0)+t._delay,t._paused&&this!==t._timeline&&(t._pauseTime=t._startTime+(this.rawTime()-t._startTime)/t._timeScale),t.timeline&&t.timeline._remove(t,!0),t.timeline=t._timeline=this,t._gc&&t._enabled(!0,!0),r=this._last,this._sortChildren)for(n=t._startTime;r&&r._startTime>n;)r=r._prev;return r?(t._next=r._next,r._next=t):(t._next=this._first,this._first=t),t._next?t._next._prev=t:this._last=t,t._prev=r,this._recent=t,this._timeline&&this._uncache(!0),this},o._remove=function(t,e){return t.timeline===this&&(e||t._enabled(!1,!0),t._prev?t._prev._next=t._next:this._first===t&&(this._first=t._next),t._next?t._next._prev=t._prev:this._last===t&&(this._last=t._prev),t._next=t._prev=t.timeline=null,t===this._recent&&(this._recent=this._last),this._timeline&&this._uncache(!0)),this},o.render=function(t,e,i){var s,r=this._first;for(this._totalTime=this._time=this._rawPrevTime=t;r;)s=r._next,(r._active||t>=r._startTime&&!r._paused)&&(r._reversed?r.render((r._dirty?r.totalDuration():r._totalDuration)-(t-r._startTime)*r._timeScale,e,i):r.render((t-r._startTime)*r._timeScale,e,i)),r=s},o.rawTime=function(){return h||l.wake(),this._totalTime};var z=y("TweenLite",function(e,i,s){if(C.call(this,i,s),this.render=z.prototype.render,null==e)throw"Cannot tween a null target.";this.target=e="string"!=typeof e?e:z.selector(e)||e;var r,n,a,o=e.jquery||e.length&&e!==t&&e[0]&&(e[0]===t||e[0].nodeType&&e[0].style&&!e.nodeType),l=this.vars.overwrite;if(this._overwrite=l=null==l?W[z.defaultOverwrite]:"number"==typeof l?l>>0:W[l],(o||e instanceof Array||e.push&&m(e))&&"number"!=typeof e[0])for(this._targets=a=c(e),this._propLookup=[],this._siblings=[],r=0;r<a.length;r++)n=a[r],n?"string"!=typeof n?n.length&&n!==t&&n[0]&&(n[0]===t||n[0].nodeType&&n[0].style&&!n.nodeType)?(a.splice(r--,1),this._targets=a=a.concat(c(n))):(this._siblings[r]=H(n,this,!1),1===l&&this._siblings[r].length>1&&J(n,this,null,1,this._siblings[r])):(n=a[r--]=z.selector(n),"string"==typeof n&&a.splice(r+1,1)):a.splice(r--,1);else this._propLookup={},this._siblings=H(e,this,!1),1===l&&this._siblings.length>1&&J(e,this,null,1,this._siblings);(this.vars.immediateRender||0===i&&0===this._delay&&!1!==this.vars.immediateRender)&&(this._time=-f,this.render(Math.min(0,-this._delay)))},!0),F=function(e){return e&&e.length&&e!==t&&e[0]&&(e[0]===t||e[0].nodeType&&e[0].style&&!e.nodeType)};(o=z.prototype=new C).constructor=z,o.kill()._gc=!1,o.ratio=0,o._firstPT=o._targets=o._overwrittenProps=o._startAt=null,o._notifyPluginsOfEnabled=o._lazy=!1,z.version="1.18.3",z.defaultEase=o._ease=new b(null,null,1,1),z.defaultOverwrite="auto",z.ticker=l,z.autoSleep=120,z.lagSmoothing=function(t,e){l.lagSmoothing(t,e)},z.selector=t.$||t.jQuery||function(e){var i=t.$||t.jQuery;return i?(z.selector=i,i(e)):"undefined"==typeof document?e:document.querySelectorAll?document.querySelectorAll(e):document.getElementById("#"===e.charAt(0)?e.substr(1):e)};var X=[],I={},L=/(?:(-|-=|\+=)?\d*\.?\d*(?:e[\-+]?\d+)?)[0-9]/gi,N=function(t){for(var e,i=this._firstPT;i;)e=i.blob?t?this.join(""):this.start:i.c*t+i.s,i.r?e=Math.round(e):1e-6>e&&e>-1e-6&&(e=0),i.f?i.fp?i.t[i.p](i.fp,e):i.t[i.p](e):i.t[i.p]=e,i=i._next},E=function(t,e,i,s){var r,n,a,o,l,h,_,u=[t,e],f=0,c="",p=0;for(u.start=t,i&&(i(u),t=u[0],e=u[1]),u.length=0,r=t.match(L)||[],n=e.match(L)||[],s&&(s._next=null,s.blob=1,u._firstPT=s),l=n.length,o=0;l>o;o++)_=n[o],h=e.substr(f,e.indexOf(_,f)-f),c+=h||!o?h:",",f+=h.length,p?p=(p+1)%5:"rgba("===h.substr(-5)&&(p=1),_===r[o]||r.length<=o?c+=_:(c&&(u.push(c),c=""),a=parseFloat(r[o]),u.push(a),u._firstPT={_next:u._firstPT,t:u,p:u.length-1,s:a,c:("="===_.charAt(1)?parseInt(_.charAt(0)+"1",10)*parseFloat(_.substr(2)):parseFloat(_)-a)||0,f:0,r:p&&4>p}),f+=_.length;return(c+=e.substr(f))&&u.push(c),u.setRatio=N,u},Y=function(t,e,i,s,r,n,a,o){var l,h="get"===i?t[e]:i,_=typeof t[e],u="string"==typeof s&&"="===s.charAt(1),f={t:t,p:e,s:h,f:"function"===_,pg:0,n:r||e,r:n,pr:0,c:u?parseInt(s.charAt(0)+"1",10)*parseFloat(s.substr(2)):parseFloat(s)-h||0};return"number"!==_&&("function"===_&&"get"===i&&(l=e.indexOf("set")||"function"!=typeof t["get"+e.substr(3)]?e:"get"+e.substr(3),f.s=h=a?t[l](a):t[l]()),"string"==typeof h&&(a||isNaN(h))?(f.fp=a,f={t:E(h,s,o||z.defaultStringFilter,f),p:"setRatio",s:0,c:1,f:2,pg:0,n:r||e,pr:0}):u||(f.s=parseFloat(h),f.c=parseFloat(s)-f.s||0)),f.c?((f._next=this._firstPT)&&(f._next._prev=f),this._firstPT=f,f):void 0},B=z._internals={isArray:m,isSelector:F,lazyTweens:X,blobDif:E},j=z._plugins={},U=B.tweenLookup={},V=0,q=B.reservedProps={ease:1,delay:1,overwrite:1,onComplete:1,onCompleteParams:1,onCompleteScope:1,useFrames:1,runBackwards:1,startAt:1,onUpdate:1,onUpdateParams:1,onUpdateScope:1,onStart:1,onStartParams:1,onStartScope:1,onReverseComplete:1,onReverseCompleteParams:1,onReverseCompleteScope:1,onRepeat:1,onRepeatParams:1,onRepeatScope:1,easeParams:1,yoyo:1,immediateRender:1,repeat:1,repeatDelay:1,data:1,paused:1,reversed:1,autoCSS:1,lazy:1,onOverwrite:1,callbackScope:1,stringFilter:1},W={none:0,all:1,auto:2,concurrent:3,allOnStart:4,preexisting:5,true:1,false:0},Z=C._rootFramesTimeline=new M,G=C._rootTimeline=new M,$=30,Q=B.lazyRender=function(){var t,e=X.length;for(I={};--e>-1;)t=X[e],t&&!1!==t._lazy&&(t.render(t._lazy[0],t._lazy[1],!0),t._lazy=!1);X.length=0};G._startTime=l.time,Z._startTime=l.frame,G._active=Z._active=!0,setTimeout(Q,1),C._updateRoot=z.render=function(){var t,e,i;if(X.length&&Q(),G.render((l.time-G._startTime)*G._timeScale,!1,!1),Z.render((l.frame-Z._startTime)*Z._timeScale,!1,!1),X.length&&Q(),l.frame>=$){$=l.frame+(parseInt(z.autoSleep,10)||120);for(i in U){for(t=(e=U[i].tweens).length;--t>-1;)e[t]._gc&&e.splice(t,1);0===e.length&&delete U[i]}if((!(i=G._first)||i._paused)&&z.autoSleep&&!Z._first&&1===l._listeners.tick.length){for(;i&&i._paused;)i=i._next;i||l.sleep()}}},l.addEventListener("tick",C._updateRoot);var H=function(t,e,i){var s,r,n=t._gsTweenID;if(U[n||(t._gsTweenID=n="t"+V++)]||(U[n]={target:t,tweens:[]}),e&&((s=U[n].tweens)[r=s.length]=e,i))for(;--r>-1;)s[r]===e&&s.splice(r,1);return U[n].tweens},K=function(t,e,i,s){var r,n,a=t.vars.onOverwrite;return a&&(r=a(t,e,i,s)),(a=z.onOverwrite)&&(n=a(t,e,i,s)),!1!==r&&!1!==n},J=function(t,e,i,s,r){var n,a,o,l;if(1===s||s>=4){for(l=r.length,n=0;l>n;n++)if((o=r[n])!==e)o._gc||o._kill(null,t,e)&&(a=!0);else if(5===s)break;return a}var h,_=e._startTime+f,u=[],c=0,p=0===e._duration;for(n=r.length;--n>-1;)(o=r[n])===e||o._gc||o._paused||(o._timeline!==e._timeline?(h=h||tt(e,0,p),0===tt(o,h,p)&&(u[c++]=o)):o._startTime<=_&&o._startTime+o.totalDuration()/o._timeScale>_&&((p||!o._initted)&&_-o._startTime<=2e-10||(u[c++]=o)));for(n=c;--n>-1;)if(o=u[n],2===s&&o._kill(i,t,e)&&(a=!0),2!==s||!o._firstPT&&o._initted){if(2!==s&&!K(o,e))continue;o._enabled(!1,!1)&&(a=!0)}return a},tt=function(t,e,i){for(var s=t._timeline,r=s._timeScale,n=t._startTime;s._timeline;){if(n+=s._startTime,r*=s._timeScale,s._paused)return-100;s=s._timeline}return(n/=r)>e?n-e:i&&n===e||!t._initted&&2*f>n-e?f:(n+=t.totalDuration()/t._timeScale/r)>e+f?0:n-e-f};o._init=function(){var t,e,i,s,r,n=this.vars,a=this._overwrittenProps,o=this._duration,l=!!n.immediateRender,h=n.ease;if(n.startAt){this._startAt&&(this._startAt.render(-1,!0),this._startAt.kill()),r={};for(s in n.startAt)r[s]=n.startAt[s];if(r.overwrite=!1,r.immediateRender=!0,r.lazy=l&&!1!==n.lazy,r.startAt=r.delay=null,this._startAt=z.to(this.target,0,r),l)if(this._time>0)this._startAt=null;else if(0!==o)return}else if(n.runBackwards&&0!==o)if(this._startAt)this._startAt.render(-1,!0),this._startAt.kill(),this._startAt=null;else{0!==this._time&&(l=!1),i={};for(s in n)q[s]&&"autoCSS"!==s||(i[s]=n[s]);if(i.overwrite=0,i.data="isFromStart",i.lazy=l&&!1!==n.lazy,i.immediateRender=l,this._startAt=z.to(this.target,0,i),l){if(0===this._time)return}else this._startAt._init(),this._startAt._enabled(!1),this.vars.immediateRender&&(this._startAt=null)}if(this._ease=h=h?h instanceof b?h:"function"==typeof h?new b(h,n.easeParams):w[h]||z.defaultEase:z.defaultEase,n.easeParams instanceof Array&&h.config&&(this._ease=h.config.apply(h,n.easeParams)),this._easeType=this._ease._type,this._easePower=this._ease._power,this._firstPT=null,this._targets)for(t=this._targets.length;--t>-1;)this._initProps(this._targets[t],this._propLookup[t]={},this._siblings[t],a?a[t]:null)&&(e=!0);else e=this._initProps(this.target,this._propLookup,this._siblings,a);if(e&&z._onPluginEvent("_onInitAllProps",this),a&&(this._firstPT||"function"!=typeof this.target&&this._enabled(!1,!1)),n.runBackwards)for(i=this._firstPT;i;)i.s+=i.c,i.c=-i.c,i=i._next;this._onUpdate=n.onUpdate,this._initted=!0},o._initProps=function(e,i,s,r){var n,a,o,l,h,_;if(null==e)return!1;I[e._gsTweenID]&&Q(),this.vars.css||e.style&&e!==t&&e.nodeType&&j.css&&!1!==this.vars.autoCSS&&function(t,e){var i,s={};for(i in t)q[i]||i in e&&"transform"!==i&&"x"!==i&&"y"!==i&&"width"!==i&&"height"!==i&&"className"!==i&&"border"!==i||!(!j[i]||j[i]&&j[i]._autoCSS)||(s[i]=t[i],delete t[i]);t.css=s}(this.vars,e);for(n in this.vars)if(_=this.vars[n],q[n])_&&(_ instanceof Array||_.push&&m(_))&&-1!==_.join("").indexOf("{self}")&&(this.vars[n]=_=this._swapSelfInParams(_,this));else if(j[n]&&(l=new j[n])._onInitTween(e,this.vars[n],this)){for(this._firstPT=h={_next:this._firstPT,t:l,p:"setRatio",s:0,c:1,f:1,n:n,pg:1,pr:l._priority},a=l._overwriteProps.length;--a>-1;)i[l._overwriteProps[a]]=this._firstPT;(l._priority||l._onInitAllProps)&&(o=!0),(l._onDisable||l._onEnable)&&(this._notifyPluginsOfEnabled=!0),h._next&&(h._next._prev=h)}else i[n]=Y.call(this,e,n,"get",_,n,0,null,this.vars.stringFilter);return r&&this._kill(r,e)?this._initProps(e,i,s,r):this._overwrite>1&&this._firstPT&&s.length>1&&J(e,this,i,this._overwrite,s)?(this._kill(i,e),this._initProps(e,i,s,r)):(this._firstPT&&(!1!==this.vars.lazy&&this._duration||this.vars.lazy&&!this._duration)&&(I[e._gsTweenID]=!0),o)},o.render=function(t,e,i){var s,r,n,a,o=this._time,l=this._duration,h=this._rawPrevTime;if(t>=l-1e-7)this._totalTime=this._time=l,this.ratio=this._ease._calcEnd?this._ease.getRatio(1):1,this._reversed||(s=!0,r="onComplete",i=i||this._timeline.autoRemoveChildren),0===l&&(this._initted||!this.vars.lazy||i)&&(this._startTime===this._timeline._duration&&(t=0),(0>h||0>=t&&t>=-1e-7||h===f&&"isPause"!==this.data)&&h!==t&&(i=!0,h>f&&(r="onReverseComplete")),this._rawPrevTime=a=!e||t||h===t?t:f);else if(1e-7>t)this._totalTime=this._time=0,this.ratio=this._ease._calcEnd?this._ease.getRatio(0):0,(0!==o||0===l&&h>0)&&(r="onReverseComplete",s=this._reversed),0>t&&(this._active=!1,0===l&&(this._initted||!this.vars.lazy||i)&&(h>=0&&(h!==f||"isPause"!==this.data)&&(i=!0),this._rawPrevTime=a=!e||t||h===t?t:f)),this._initted||(i=!0);else if(this._totalTime=this._time=t,this._easeType){var _=t/l,u=this._easeType,c=this._easePower;(1===u||3===u&&_>=.5)&&(_=1-_),3===u&&(_*=2),1===c?_*=_:2===c?_*=_*_:3===c?_*=_*_*_:4===c&&(_*=_*_*_*_),this.ratio=1===u?1-_:2===u?_:.5>t/l?_/2:1-_/2}else this.ratio=this._ease.getRatio(t/l);if(this._time!==o||i){if(!this._initted){if(this._init(),!this._initted||this._gc)return;if(!i&&this._firstPT&&(!1!==this.vars.lazy&&this._duration||this.vars.lazy&&!this._duration))return this._time=this._totalTime=o,this._rawPrevTime=h,X.push(this),void(this._lazy=[t,e]);this._time&&!s?this.ratio=this._ease.getRatio(this._time/l):s&&this._ease._calcEnd&&(this.ratio=this._ease.getRatio(0===this._time?0:1))}for(!1!==this._lazy&&(this._lazy=!1),this._active||!this._paused&&this._time!==o&&t>=0&&(this._active=!0),0===o&&(this._startAt&&(t>=0?this._startAt.render(t,e,i):r||(r="_dummyGS")),this.vars.onStart&&(0!==this._time||0===l)&&(e||this._callback("onStart"))),n=this._firstPT;n;)n.f?n.t[n.p](n.c*this.ratio+n.s):n.t[n.p]=n.c*this.ratio+n.s,n=n._next;this._onUpdate&&(0>t&&this._startAt&&-1e-4!==t&&this._startAt.render(t,e,i),e||(this._time!==o||s||i)&&this._callback("onUpdate")),r&&(!this._gc||i)&&(0>t&&this._startAt&&!this._onUpdate&&-1e-4!==t&&this._startAt.render(t,e,i),s&&(this._timeline.autoRemoveChildren&&this._enabled(!1,!1),this._active=!1),!e&&this.vars[r]&&this._callback(r),0===l&&this._rawPrevTime===f&&a!==f&&(this._rawPrevTime=0))}},o._kill=function(t,e,i){if("all"===t&&(t=null),null==t&&(null==e||e===this.target))return this._lazy=!1,this._enabled(!1,!1);e="string"!=typeof e?e||this._targets||this.target:z.selector(e)||e;var s,r,n,a,o,l,h,_,u,f=i&&this._time&&i._startTime===this._startTime&&this._timeline===i._timeline;if((m(e)||F(e))&&"number"!=typeof e[0])for(s=e.length;--s>-1;)this._kill(t,e[s],i)&&(l=!0);else{if(this._targets){for(s=this._targets.length;--s>-1;)if(e===this._targets[s]){o=this._propLookup[s]||{},this._overwrittenProps=this._overwrittenProps||[],r=this._overwrittenProps[s]=t?this._overwrittenProps[s]||{}:"all";break}}else{if(e!==this.target)return!1;o=this._propLookup,r=this._overwrittenProps=t?this._overwrittenProps||{}:"all"}if(o){if(h=t||o,_=t!==r&&"all"!==r&&t!==o&&("object"!=typeof t||!t._tempKill),i&&(z.onOverwrite||this.vars.onOverwrite)){for(n in h)o[n]&&(u||(u=[]),u.push(n));if((u||!t)&&!K(this,i,e,u))return!1}for(n in h)(a=o[n])&&(f&&(a.f?a.t[a.p](a.s):a.t[a.p]=a.s,l=!0),a.pg&&a.t._kill(h)&&(l=!0),a.pg&&0!==a.t._overwriteProps.length||(a._prev?a._prev._next=a._next:a===this._firstPT&&(this._firstPT=a._next),a._next&&(a._next._prev=a._prev),a._next=a._prev=null),delete o[n]),_&&(r[n]=1);!this._firstPT&&this._initted&&this._enabled(!1,!1)}}return l},o.invalidate=function(){return this._notifyPluginsOfEnabled&&z._onPluginEvent("_onDisable",this),this._firstPT=this._overwrittenProps=this._startAt=this._onUpdate=null,this._notifyPluginsOfEnabled=this._active=this._lazy=!1,this._propLookup=this._targets?{}:[],C.prototype.invalidate.call(this),this.vars.immediateRender&&(this._time=-f,this.render(Math.min(0,-this._delay))),this},o._enabled=function(t,e){if(h||l.wake(),t&&this._gc){var i,s=this._targets;if(s)for(i=s.length;--i>-1;)this._siblings[i]=H(s[i],this,!0);else this._siblings=H(this.target,this,!0)}return C.prototype._enabled.call(this,t,e),!(!this._notifyPluginsOfEnabled||!this._firstPT)&&z._onPluginEvent(t?"_onEnable":"_onDisable",this)},z.to=function(t,e,i){return new z(t,e,i)},z.from=function(t,e,i){return i.runBackwards=!0,i.immediateRender=0!=i.immediateRender,new z(t,e,i)},z.fromTo=function(t,e,i,s){return s.startAt=i,s.immediateRender=0!=s.immediateRender&&0!=i.immediateRender,new z(t,e,s)},z.delayedCall=function(t,e,i,s,r){return new z(e,0,{delay:t,onComplete:e,onCompleteParams:i,callbackScope:s,onReverseComplete:e,onReverseCompleteParams:i,immediateRender:!1,lazy:!1,useFrames:r,overwrite:0})},z.set=function(t,e){return new z(t,0,e)},z.getTweensOf=function(t,e){if(null==t)return[];var i,s,r,n;if(t="string"!=typeof t?t:z.selector(t)||t,(m(t)||F(t))&&"number"!=typeof t[0]){for(i=t.length,s=[];--i>-1;)s=s.concat(z.getTweensOf(t[i],e));for(i=s.length;--i>-1;)for(n=s[i],r=i;--r>-1;)n===s[r]&&s.splice(i,1)}else for(s=H(t).concat(),i=s.length;--i>-1;)(s[i]._gc||e&&!s[i].isActive())&&s.splice(i,1);return s},z.killTweensOf=z.killDelayedCallsTo=function(t,e,i){"object"==typeof e&&(i=e,e=!1);for(var s=z.getTweensOf(t,e),r=s.length;--r>-1;)s[r]._kill(i,t)};var et=y("plugins.TweenPlugin",function(t,e){this._overwriteProps=(t||"").split(","),this._propName=this._overwriteProps[0],this._priority=e||0,this._super=et.prototype},!0);if(o=et.prototype,et.version="1.18.0",et.API=2,o._firstPT=null,o._addTween=Y,o.setRatio=N,o._kill=function(t){var e,i=this._overwriteProps,s=this._firstPT;if(null!=t[this._propName])this._overwriteProps=[];else for(e=i.length;--e>-1;)null!=t[i[e]]&&i.splice(e,1);for(;s;)null!=t[s.n]&&(s._next&&(s._next._prev=s._prev),s._prev?(s._prev._next=s._next,s._prev=null):this._firstPT===s&&(this._firstPT=s._next)),s=s._next;return!1},o._roundProps=function(t,e){for(var i=this._firstPT;i;)(t[this._propName]||null!=i.n&&t[i.n.split(this._propName+"_").join("")])&&(i.r=e),i=i._next},z._onPluginEvent=function(t,e){var i,s,r,n,a,o=e._firstPT;if("_onInitAllProps"===t){for(;o;){for(a=o._next,s=r;s&&s.pr>o.pr;)s=s._next;(o._prev=s?s._prev:n)?o._prev._next=o:r=o,(o._next=s)?s._prev=o:n=o,o=a}o=e._firstPT=r}for(;o;)o.pg&&"function"==typeof o.t[t]&&o.t[t]()&&(i=!0),o=o._next;return i},et.activate=function(t){for(var e=t.length;--e>-1;)t[e].API===et.API&&(j[(new t[e])._propName]=t[e]);return!0},v.plugin=function(t){if(!(t&&t.propName&&t.init&&t.API))throw"illegal plugin definition.";var e,i=t.propName,s=t.priority||0,r=t.overwriteProps,n={init:"_onInitTween",set:"setRatio",kill:"_kill",round:"_roundProps",initAll:"_onInitAllProps"},a=y("plugins."+i.charAt(0).toUpperCase()+i.substr(1)+"Plugin",function(){et.call(this,i,s),this._overwriteProps=r||[]},!0===t.global),o=a.prototype=new et(i);o.constructor=a,a.API=t.API;for(e in n)"function"==typeof t[e]&&(o[n[e]]=t[e]);return a.version=t.version,et.activate([a]),a},n=t._gsQueue){for(a=0;a<n.length;a++)n[a]();for(o in d)d[o].func||t.console.log("GSAP encountered missing dependency: com.greensock."+o)}h=!1}}("undefined"!=typeof module&&module.exports&&"undefined"!=typeof global?global:this||window);

// TweenMax.set('#circlePath', {

//   attr: {

//     r: document.querySelector('#mainCircle').getAttribute('r')

//   }

// })

// MorphSVGPlugin.convertToPath('#circlePath');



// var xmlns = "http://www.w3.org/2000/svg",

//   xlinkns = "http://www.w3.org/1999/xlink",

//   select = function(s) {

//     return document.querySelector(s);

//   },

//   selectAll = function(s) {

//     return document.querySelectorAll(s);

//   },

//   mainCircle = select('#mainCircle'),

//   mainContainer = select('#mainContainer'),

//   car = select('#car'),

//   mainSVG = select('.mainSVG'),

//   mainCircleRadius = Number(mainCircle.getAttribute('r')),

//   //radius = mainCircleRadius,

//   numDots = mainCircleRadius / 2,

//   step = 360 / numDots,

//   dotMin = 0,

//   circlePath = select('#circlePath')



// //

// //mainSVG.appendChild(circlePath);

// TweenMax.set('svg', {

//   visibility: 'visible'

// })

// TweenMax.set([car], {

//   transformOrigin: '50% 50%'

// })

// TweenMax.set('#carRot', {

//   transformOrigin: '0% 0%',

//   rotation:30

// })



// var circleBezier = MorphSVGPlugin.pathDataToBezier(circlePath.getAttribute('d'), {

//   offsetX: -20,

//   offsetY: -5

// })







//console.log(circlePath)

// var mainTl = new TimelineMax();



// function makeDots() {

//   var d, angle, tl;

//   for (var i = 0; i < numDots; i++) {



//     d = select('#puff').cloneNode(true);

//     mainContainer.appendChild(d);

//     angle = step * i;

//     TweenMax.set(d, {

//       //attr: {

//       x: (Math.cos(angle * Math.PI / 180) * mainCircleRadius) + 400,

//       y: (Math.sin(angle * Math.PI / 180) * mainCircleRadius) + 300,

//       rotation: Math.random() * 360,

//       transformOrigin: '50% 50%'

//         //}

//     })



//     tl = new TimelineMax({

//       repeat: -1

//     });

//     tl

//       .from(d, 0.2, {

//         scale: 0,

//         ease: Power4.easeIn

//       })

//       .to(d, 1.8, {

//         scale: Math.random() + 2,

//         alpha: 0,

//         ease: Power4.easeOut

//       })



//     mainTl.add(tl, i / (numDots / tl.duration()))

//   }

//   var carTl = new TimelineMax({

//     repeat: -1

//   });

//   carTl.to(car, tl.duration(), {

//     bezier: {

//       type: "cubic",

//       values: circleBezier,

//       autoRotate: true

//     },

//     ease: Linear.easeNone

//   })

//   mainTl.add(carTl, 0.05)

// }



// makeDots();

// mainTl.time(120);

// TweenMax.to(mainContainer, 20, {

//   rotation: -360,

//   svgOrigin: '400 300',

//   repeat: -1,

//   ease: Linear.easeNone

// });

// mainTl.timeScale(1.1)