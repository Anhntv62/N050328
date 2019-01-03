jQuery(document).ready(function($) {    
	var TopFixMenu = $("#fixNav");
	// dùng sự kiện cuộn chuột để bắt thông tin đã cuộn được chiều dài là bao nhiêu.
    $(window).scroll(function(){
    // Nếu cuộn xuống ta đổi vị trí của thanh menu
        if($(this).scrollTop()>50){  
          	TopFixMenu.css('position', 'fixed');	
			TopFixMenu.css('top', '0');	
        }
		else{
		// Dừng lại để ghim lên top
          	TopFixMenu.css('position', 'absolute');
            TopFixMenu.css('top', '50px');
        }
	});
/*----------------sử lý sự kiện menu top nhạc----------------------*//*-----------------------------------------------------*/
	var buttons = document.getElementsByClassName('tablinks');
	var contents = document.getElementsByClassName('tabcontent');
	function showContent(id){
		for (var i = 0; i < contents.length; i++) {
			contents[i].style.display = 'none';
		}
		var content = document.getElementById(id);
		content.style.display = 'block';
	}
	for (var i = 0; i < buttons.length; i++) {
		buttons[i].addEventListener("click", function(){
			var id = this.textContent;
			for (var i = 0; i < buttons.length; i++) {
				buttons[i].classList.remove("active");
			}
			this.className += " active";
			showContent(id);
		});
	}
	showContent('Việt Nam');
/*----------------------------ghim mp3 mini--------------*//*-----------------------------------------------------*/
	var playmusic = $(".playerMini");
	$(window).scroll(function(){
		if($(this).scrollTop()>=300){
			playmusic.fadeIn(500);
		}
		else{
			playmusic.fadeOut(100);
		}
	});
/*----------------show/hidden menu mini-------------------------------------*//*-----------------------------------------------------*/
	var menu = $("#menuBar");
	var showMenu = $(".showMenu");
	var hiddenMenu = $(".hiddenMenu");
	showMenu.click(function(){				
		menu.slideDown("slow", function() {
			showMenu.css('display','none');	
			hiddenMenu.css('display','block');	
		});
	});
	hiddenMenu.click(function(){				
		menu.slideUp("slow", function() {
			hiddenMenu.css('display','none');	
			showMenu.css('display','block');	
		});
	});
/* ------------tạo nút lên top-----------------*//*------------------------------------------------*/
	var topUp = $("#topUp");
	$(window).scroll(function(){
		if($(this).scrollTop() >=1000){
			topUp.fadeIn(750);		
		}
		else{
			topUp.fadeOut(750);
		}
	});
	topUp.click(function(){
		$('body,html').animate({scrollTop: 0}, 500);
	});
/* --------------auto slide/tạo sự kiện trỏ chuột vào slide---------------*//*------------------------------------------------*/
 	var interval = setInterval(autoSlides,3000);
	var indexSlide = 0;
	var $radios = $('[id^="slide-dot"]');
	var radiosLength = $radios.length;
	var dotShow = document.getElementsByClassName('dot-show');
	function autoSlides() {	
		dotShow[indexSlide].classList.remove("active"); // ẩn nút hiện tại
			indexSlide++;
			if(indexSlide >= radiosLength) indexSlide=0;
			$radios.eq(indexSlide).attr('checked', true);
		dotShow[indexSlide].classList.add("active"); // hiện nút theo slide
	} 
	$('.slider-container').mouseenter(function (){
		// khi trỏ vào slide thì dừng lại
		clearInterval(interval);
	});
	$('.slider-container').mouseleave(function (){
		// khi rời con trỏ thì tiếp tục slide
		interval = setInterval(autoSlides,3000);
	});	
	
	// hiển thị box tìm kiếm/login
	$('#btn-tool').click(function(){
		document.getElementById("btn-tool").classList.toggle("change");
		$('#combo-box').toggle("show-items");
	});
});