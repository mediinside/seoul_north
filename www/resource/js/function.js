$(document).ready(function(){
	//메인 슬라이드
	var swiper = new Swiper('#main-slide', {
		loop: true,
		pagination: {
			el: '#main-slide .swiper-pagination',
			clickable: true,
		},
		autoplay: {
			delay: 5000,
			disableOnInteraction: false,
		},
		navigation: {
			nextEl: '#main-slide .swiper-button-next',
			prevEl: '#main-slide .swiper-button-prev',
		},
	});



	//메인메뉴 on/off
	$("#gnb li a").mouseenter(function(){
		$("#gnb-sub").slideDown();
	});
	$("nav").mouseleave(function(){
		console.log('why?');
		$("#gnb-sub").slideUp();
	});
});