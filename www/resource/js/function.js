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
		breakpoints: {
			300: {
			slidesPerView: 1.8,
			spaceBetween: 20,
			centeredSlides: true,
			},
			721: {
			slidesPerView: 2,
			spaceBetween: 20,
			},
			1024: {
			slidesPerView: 3,
			spaceBetween: 20,
			},
			1661: {
			slidesPerView: 4,
			spaceBetween: 17,
			},
		}
	});

	//메인 사업안내
	// var swiper = new Swiper('#main-prod-list', {

	// 	slidesPerView: 3,
	// 	spaceBetween: 140,
	// 	centeredSlides: true,
	// 	loop: true,
	// 	// loopFillGroupWithBlank: true,
	// 	autoplay: {
	// 		delay: 5000,
	// 		disableOnInteraction: false,
	// 	},
	// 	pagination: {
	// 		el: '#main-prod .swiper-pagination',
	// 		clickable: true,
	// 	},
	// 	navigation: {
	// 		nextEl: '#main-prod .swiper-button-box .swiper-button-next',
	// 		prevEl: '#main-prod .swiper-button-box .swiper-button-prev',
	// 	},
	// });

	//탑버튼, 퀵메뉴 스크롤
	$(window).scroll(function(){
		var window_h = $(window).scrollTop();
		console.log(window_h);
		if(window_h > 300){
			$("#top").fadeIn(200);
		}else{
			$("#top").fadeOut(200);
		}
		if(window_h > 122){
			$("#quick").css('top',0);
		}else{
			$("#quick").css('top',122);
		}
	});
	$("#top").on("click",function(){
		$("html,body").animate({
			scrollTop:0
		},400);
	});



	//햄버거 버튼
	$(".menu-button").on("click",function(){
        $(this).toggleClass("cross");
        // $("#wrap").toggleClass("on");
        $("nav").toggleClass('on')
    });

	//로캐이션
	var dIdx = $("#sub-bnnr img").data('index');
	// var cTxt = $(".cont-tit h3").text();
	var sIdx = $("#sub-bnnr img").data('index2');
	var nTxt = $("#gnb-sub dl").eq(dIdx-1).find('dd').eq(sIdx-1).find('a').text();
	var tabTxt = $(".tabMenu li.active a").text();
	var $locA = $("#location p a");
	var $tabA = $(".tabMenu p a");
	var $locDl = $("#location dl");
	$locDl.append(
		$('#gnb-sub dl').eq(dIdx-1).find('dd').clone()
	);
	$locA.text(nTxt);
	$locA.on("click",function(){
		$locDl.slideToggle();
	});
	$tabA.text(tabTxt);
	$tabA.on("click",function(){
		$(".tabMenu ul").slideToggle(250);
	});


	//자주하는 질문
	 $(".accordion .item .collapsed").on("click", function () {
		var $item = $(this).parent('.item');
		if ($item.hasClass("active")) {
			$item.removeClass("active").find('.collapsed').attr('title', '열기');
		} else {
			$item.addClass("active").find('.collapsed').attr('title', '닫기');
			$item.siblings().removeClass("active")
		}
	});

});

$(window).on("load resize",function(){
	var win_W = $(window).width();
	if(win_W >= 1201){
		$("#gnb-sub").hide();

		//메인메뉴 on/off
		$("#gnb li a").mouseenter(function(){
			$("#gnb-sub").stop().slideDown(250);
		});
		$("nav").mouseleave(function(){
			$("#gnb-sub").stop().slideUp(250);
		});

		//메인메뉴 hover이벤트
		$("#gnb li").hover(function(){
			var idx = $(this).index();
			$(this).toggleClass('on');
			$("#gnb-sub dl").eq(idx).toggleClass('bg');
			// $("#gnb-sub dl").eq(idx).css({
			// 	backgroundColor:'#f0f0f0'
			// });
		});

		//서브메뉴 hover 이벤트
		$("#gnb-sub dl").hover(function(){
			var idx = $(this).index();
			$(this).toggleClass('bg');
			$("#gnb li").eq(idx).toggleClass('on');
		});
	}else{

		//모바일 메뉴 이벤트
		$("#gnb-sub").show();
		$("#gnb-sub dl dt a").on("click",function(){
			var $this = $(this).parents('dl');
			if($this.prop('class')){
				$this.removeClass('on');
			}else{
				$this.addClass('on').siblings().removeClass('on');
			};
		});
	};

	var sIdx = $("#sub-bnnr img").data('index2');
	var $locDD = $("#location dl dd");
	if(win_W > 1024){
		//로캐이션
		console.log(sIdx);
		$locDD.eq(sIdx-1).on("click",function(){
			$(this).addClass('on');
		});
		$locDD.eq(sIdx-1).trigger('click');
	};
});