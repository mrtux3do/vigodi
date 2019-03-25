$(document).ready(function(){

	/* start show noti */
	$("body").click(function(){
		$('.cart-noti').hide();
	});

	$("#cart").click(function(event) {
		event.stopPropagation();
		$('.cart-noti').show();
	});
	/* end show noti */


	$(".slide-home").owlCarousel({
		loop:true,
		items: 1,
		autoplay: true,
	});

	$(".slide-product").owlCarousel({
		loop:true,
		items: 4,
		margin: 25,
		autoplay: true,
		dots: false,
		nav: true
	});

	$(".relate-product-slide").owlCarousel({
		loop:true,
		items: 4,
		margin: 25,
		dots: false,
		nav: true,
		slideBy: 4
	});
	relateClasses()
	$(".relate-product-slide").on('translated.owl.carousel', function(event) {
		relateClasses();
	});


	$(".deal-slide").owlCarousel({
		loop:true,
		items: 1,
		//margin: 25,
		//autoplay: true,
		dots: false,
		nav: true
	});

	$(".extra-product").owlCarousel({
		loop:true,
		items: 3,
		//margin: 25,
		//autoplay: true,
		dots: false,
		nav: true,
		// nestedItemSelector: true
	});

	$(".slide-new-product").owlCarousel({
		loop:true,
		items: 1,
		dots: false,
		nav: true,		
	});

	checkClasses();
	$(".extra-product").on('translated.owl.carousel', function(event) {
		checkClasses();
	});


	$(".slide-trend-product").owlCarousel({
		loop:true,
		items: 3,
		dots: false,
		nav: true,
		slideBy: 3
	});
	trendClasses();
	$(".slide-trend-product").on('translated.owl.carousel', function(event) {
		trendClasses();
	});

	$("#sort-category").on('click', function(){
		if($(".item-categories:first").is( ":hidden" )){
			$(".item-categories").slideDown("slow");			
		} else{
			$(".item-categories").slideUp("slow");
		}
	});

	$("body").click(function(){
		$("#account").slideUp("slow");
	});

	$("#myaccount").on('click',function(){
		event.stopPropagation();
		$("#account").slideDown("slow");
	});

	$('.product-deal #count-down').countdown('2020/10/20').on('update.countdown', function(event) {
		var $this = $(this).html(event.strftime(''
			+ '<div> <span>%-w</span> <p> week%!w </p> </div>'
			+ '<div> <span>%-d</span> <p> day%!d </p> </div>'
			+ '<div> <span>%H</span> <p> hr </p> </div>'
			+ '<div> <span>%M</span> <p> min </p> </div>'
			+ '<div> <span>%S</span> <p> sec </p> </div>'));
		});

	//Click login show popup
	$('.btn-popup').on('click', function(){
		$('.login-popup').show();
	});


	//Click close popup
	$('#btn-close').on('click', function(){
		$('.login-popup').hide();
	});

	$('.hbh').hover(function(){
		if($(".sub-menu-hbh:first").is( ":hidden" )){
			$(".sub-menu-hbh").slideDown("slow");			
		} else{
			$(".sub-menu-hbh").hide();
		}		
	});

	$('.hln').hover(function(){
		if($(".sub-menu-hln:first").is( ":hidden" )){
			$(".sub-menu-hln").slideDown("slow");			
		} else{
			$(".sub-menu-hln").hide();
		}		
	});

	$('#plus').on('click', function(){
		var quantity = $('#input-quantity').val();
		quantity = parseInt(quantity) + 1;
		$('#input-quantity').val(quantity);
	});

	$('#minus').on('click', function(){
		var quantity = $('#input-quantity').val();
		if(quantity >= 2){
			quantity = parseInt(quantity) - 1;
			$('#input-quantity').val(quantity);			
		}
	});



});

//Add class first item and last item
function checkClasses(){
	var total = $('.extra-product .owl-stage .owl-item.active').length;
	
	$('.extra-product .owl-stage .owl-item').removeClass('firstActiveItem lastActiveItem');
	
	$('.extra-product .owl-stage .owl-item.active').each(function(index){
		if (index === 0) {
			// this is the first one
			$(this).addClass('firstActiveItem');
		}
		if (index === total - 1 && total>1) {
			// this is the last one
			$(this).addClass('lastActiveItem');
		}
	});
}

function trendClasses(){
	var total = $('.slide-trend-product .owl-stage .owl-item.active').length;
	
	$('.slide-trend-product .owl-stage .owl-item').removeClass('firstActiveItem lastActiveItem');
	
	$('.slide-trend-product .owl-stage .owl-item.active').each(function(index){
		if (index === 0) {
			// this is the first one
			$(this).addClass('firstActiveItem');
		}
		if (index === total - 1 && total>1) {
			// this is the last one
			$(this).addClass('lastActiveItem');
		}
	});
}

function relateClasses(){
	var total = $('.relate-product-slide .owl-stage .owl-item.active').length;
	
	$('.relate-product-slide .owl-stage .owl-item').removeClass('firstActiveItem lastActiveItem');
	
	$('.relate-product-slide .owl-stage .owl-item.active').each(function(index){
		if (index === 0) {
			// this is the first one
			$(this).addClass('firstActiveItem');
		}
		if (index === total - 1 && total>1) {
			// this is the last one
			$(this).addClass('lastActiveItem');
		}
	});
}


function imageZoom(imgID, resultID) {
	var img, lens, result, cx, cy;
	img = document.getElementById(imgID);
	result = document.getElementById(resultID);
	/* Create lens: */
	lens = document.createElement("DIV");
	lens.setAttribute("class", "img-zoom-lens");
	/* Insert lens: */
	img.parentElement.insertBefore(lens, img);
	/* Calculate the ratio between result DIV and lens: */
	cx = result.offsetWidth / lens.offsetWidth;
	cy = result.offsetHeight / lens.offsetHeight;
	/* Set background properties for the result DIV */
	result.style.backgroundImage = "url('" + img.src + "')";
	result.style.backgroundSize = (img.width * cx) + "px " + (img.height * cy) + "px";
	result.style.display = 'none';
	/* Execute a function when someone moves the cursor over the image, or the lens: */
	lens.addEventListener("mousemove", moveLens);
	lens.addEventListener("mouseout", hideResult);
	img.addEventListener("mousemove", moveLens);
	img.addEventListener("mouseout", hideResult);
	/* And also for touch screens: */
	// lens.addEventListener("touchmove", moveLens);
	// img.addEventListener("touchmove", moveLens);
	// lens.addEventListener("touchend", hideResult);
	// img.addEventListener("touchend", hideResult);

	function hideResult(){
		result.style.display = 'none';
	}

	function moveLens(e) {
		result.style.display = 'block';
		var pos, x, y;
		/* Prevent any other actions that may occur when moving over the image */
		//e.preventDefault();
		/* Get the cursor's x and y positions: */
		pos = getCursorPos(e);
		/* Calculate the position of the lens: */
		x = pos.x - (lens.offsetWidth / 2);
		y = pos.y - (lens.offsetHeight / 2);
		/* Prevent the lens from being positioned outside the image: */
		if (x > img.width - lens.offsetWidth) {x = img.width - lens.offsetWidth;}
		if (x < 0) {x = 0;}
		if (y > img.height - lens.offsetHeight) {y = img.height - lens.offsetHeight;}
		if (y < 0) {y = 0;}
		/* Set the position of the lens: */
		lens.style.left = x + "px";
		lens.style.top = y + "px";
		/* Display what the lens "sees": */
		result.style.backgroundPosition = "-" + (x * cx) + "px -" + (y * cy) + "px";
	}
	function getCursorPos(e) {
		var a, x = 0, y = 0;
		e = e || window.event;
		/* Get the x and y positions of the image: */
		a = img.getBoundingClientRect();
		/* Calculate the cursor's x and y coordinates, relative to the image: */
		x = e.pageX - a.left;
		y = e.pageY - a.top;
		/* Consider any page scrolling: */
		x = x - window.pageXOffset;
		y = y - window.pageYOffset;
		return {x : x, y : y};
	}
}

