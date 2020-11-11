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

	//메인 센터소식
	var swiper = new Swiper('#main-center-list', {

		slidesPerView: 4,
		spaceBetween: 17,
		// slidesPerGroup: 4,
		loop: true,
		// loopFillGroupWithBlank: true,
		autoplay: {
			delay: 5000,
			disableOnInteraction: false,
		},
		navigation: {
			nextEl: '#main-center .swiper-button-box .swiper-button-next',
			prevEl: '#main-center .swiper-button-box .swiper-button-prev',
		},
	});

	//메인 사업안내
	var swiper = new Swiper('#main-prod-list', {

		slidesPerView: 3,
		spaceBetween: 140,
		centeredSlides: true,
		loop: true,
		// loopFillGroupWithBlank: true,
		autoplay: {
			delay: 5000,
			disableOnInteraction: false,
		},
		pagination: {
			el: '#main-prod .swiper-pagination',
			clickable: true,
		},
		navigation: {
			nextEl: '#main-prod .swiper-button-box .swiper-button-next',
			prevEl: '#main-prod .swiper-button-box .swiper-button-prev',
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