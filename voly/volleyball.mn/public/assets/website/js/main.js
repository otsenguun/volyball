jQuery(function($){
	'use strict';

	$(window).on('scroll',function()
		{
			if($(this).scrollTop()>120)
			{
				$('.navbar-area').addClass("is-sticky");
			}
			else
				{
					$('.navbar-area').removeClass("is-sticky");
				}
		});

jQuery('.mean-menu').meanmenu({meanScreenWidth:"1199"});
$(".others-option-for-responsive .dot-menu").on("click",function()
	{
		$(".others-option-for-responsive .container .container").toggleClass("active");
	});
$('.video-slides').owlCarousel(
	{
		loop:true,
		nav:true,
		dots:false,
		autoplayHoverPause:true,
		autoplay:true,margin:30,
		navText:["<i class='fas fa-chevron-left'></i>","<i class='fas fa-chevron-right'></i>"],
		responsive:{0:{items:1,},576:{items:1,},768:{items:2,},1200:{items:3,}}
	});

$('.business-news-slides').owlCarousel(
	{
		loop:true,
		nav:true,
		dots:false,
		autoplayHoverPause:true,
		autoplay:true,
		margin:30,
		navText:["<i class='fas fa-chevron-left'></i>","<i class='fas fa-chevron-right'></i>"],
		responsive:{0:{items:1,},576:{items:2,},768:{items:2,},1200:{items:2,},}
	});
$('.health-news-slides').owlCarousel(
	{
		loop:true,
		nav:true,
		dots:false,
		autoplayHoverPause:true,
		autoplay:true,
		margin:30,
		navText:["<i class='fas fa-chevron-left'></i>","<i class='fas fa-chevron-right'></i>"],
		responsive:{0:{items:1,},576:{items:1,},768:{items:2,},1200:{items:2,}}
	});
function callbackFunction(resp)
	{
		if(resp.result==="success"){formSuccessSub();}
		else{formErrorSub();}
	}
function formSuccessSub()
	{
		$(".newsletter-form")[0].reset();
		submitMSGSub(true,"Thank you for subscribing!");
		setTimeout(function(){$("#validator-newsletter").addClass('hide');},4000)
	}
function formErrorSub()
	{
		$(".newsletter-form").addClass("animated shake");
		setTimeout(function()
			{
				$(".newsletter-form").removeClass("animated shake");
			},1000)
	}
function submitMSGSub(valid,msg)
	{
		if(valid){var msgClasses="validation-success";}
		else{var msgClasses="validation-danger";}
		$("#validator-newsletter").removeClass().addClass(msgClasses).text(msg);
	}
$(function(){$(window).on('scroll',function()
	{
		var scrolled=$(window).scrollTop();
		if(scrolled>600)$('.go-top').addClass('active');
		if(scrolled<600)$('.go-top').removeClass('active');
	});
	$('.go-top').on('click',function()
		{
			$("html, body").animate({scrollTop:"0"},500);
		});
	});
$('.sports-slider').owlCarousel(
	{
		loop:true,
		nav:true,
		dots:false,
		autoplayHoverPause:true,
		autoplay:true,
		items:1,
		margin:30,
		navText:["<i class='fas fa-chevron-left'></i>","<i class='fas fa-chevron-right'></i>"],
		responsive:{0:{items:1,},576:{items:2,},768:{items:1,},1200:{items:1,}}
	});
$('.tech-slider').owlCarousel(
	{
		loop:true,
		nav:true,
		dots:false,
		autoplayHoverPause:true,
		autoplay:true,
		items:1,
		margin:30,
		navText:["<i class='fas fa-chevron-left'></i>","<i class='fas fa-chevron-right'></i>"],
		responsive:{0:{items:1,},576:{items:2,},768:{items:1,},1200:{items:1,}}
	});
$('.breaking-news-slides').owlCarousel(
	{
		loop:true,
		nav:false,
		dots:false,
		autoplayHoverPause:true,
		autoplay:true,
		animateOut:"slideOutDown",
		animateIn:"flipInX",
		items:1,
		margin:30,
		navText:["<i class='fas fa-chevron-left'></i>","<i class='fas fa-chevron-right'></i>"],
	});
$('.main-news-slides').owlCarousel(
	{
		loop:true,
		nav:true,
		dots:false,
		autoplayHoverPause:true,
		autoplay:true,
		margin:30,
		navText:["<i class='fas fa-chevron-left'></i>","<i class='fas fa-chevron-right'></i>"],
		responsive:{0:{items:1,},576:{items:1,},768:{items:2,},1200:{items:3,}}
	});
	$(function(){$('.accordion').find('.accordion-title').on('click',function()
			{
				$(this).toggleClass('active');$(this).next().slideToggle('fast');
				$('.accordion-content').not($(this).next()).slideUp('fast');
				$('.accordion-title').not($(this)).removeClass('active');
			});
	});
	function makeTimer()
		{
			var endTime=new Date("September 20, 3000 17:00:00 PDT");
			var endTime=(Date.parse(endTime))/1000;
			var now=new Date();
			var now=(Date.parse(now)/1000);
			var timeLeft=endTime-now;
			var days=Math.floor(timeLeft/86400);
			var hours=Math.floor((timeLeft-(days*86400))/3600);
			var minutes=Math.floor((timeLeft-(days*86400)-(hours*3600))/60);
			var seconds=Math.floor((timeLeft-(days*86400)-(hours*3600)-(minutes*60)));
			if(hours<"10"){hours="0"+hours;}
			if(minutes<"10"){minutes="0"+minutes;}
			if(seconds<"10"){seconds="0"+seconds;}
			$("#days").html(days+"<span>Days</span>");
			$("#hours").html(hours+"<span>Hours</span>");
			$("#minutes").html(minutes+"<span>Minutes</span>");
			$("#seconds").html(seconds+"<span>Seconds</span>");
		}
	setInterval(function(){makeTimer();},0);
	$(window).on('load',function()
		{
			$('.preloader').fadeOut();
			$('.preloader-area').addClass('preloader-deactivate');
		});
}(jQuery));

