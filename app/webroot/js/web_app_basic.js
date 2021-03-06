$(document).ready(function(){
	var pathname = window.location.protocol + "//" + window.location.host;

	/* start show noti */
	$("body").click(function(){
		$('.cart-noti').hide();
	});

	$("#cart").click(function(event) {
		event.stopPropagation();
		var no = $("#cart span").html();
		console.log(no);
		if (no == 0) {
			$('.cart-noti').show();
		} else {
			location.href = pathname + "/products/cart";
		}		
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
		// margin: 25,
		dots: false,
		nav: true,
		slideBy: 4,
		responsive:{
			0: {
				items: 2
			},
			1200:{
				items: 4
			}
		}
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
		slideBy: 3,
		responsive:{
			0: {
				items: 2
			},
			1200: {
				items: 4
			}
		}
	});
	trendClasses();
	$(".slide-trend-product").on('translated.owl.carousel', function(event) {
		trendClasses();
	});

	$("#sort-category").hover(function(){
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
	//list cart
	$('.cart-minus').on('click', function(){
		var quantity = $(this).next().val();
		var cart_product_id = $(".cart-minus").parents(".quantity-product").attr("cart_product_id");

		if(quantity >= 2){
			quantity = parseInt(quantity) - 1;
			$(this).next().val(quantity);
			updateCart(cart_product_id, quantity);			
		}
	});

	//list cart
	$('.cart-plus').on('click', function(){
		var quantity = $(this).prev().val();
		var cart_product_id = $(".cart-plus").parents(".quantity-product").attr("cart_product_id");
		quantity = parseInt(quantity) + 1;
		$(this).prev().val(quantity);
		updateCart(cart_product_id, quantity);			
	});

	//delete cart
	$('.btn-del-cart').on('click', function(){
		var cart_product_id = $(this).parents(".quantity-product").attr("cart_product_id");

		$.ajax({
	        method: 'POST',
	        url: pathname + '/Ajax/deleteCart/',
	        dataType: 'json',
	        data: {
	            cart_product_id: cart_product_id,
	            },
	        success: function(response) {
	            console.log(response)
	            if (response.status == true) {       
	            	$(".cart-total").text(response.total);      
	                location.href = pathname + "/products/cart";
	            }
	        },
	        error: function(xhr, status, err) {
	            console.log(xhr);
	            console.log(status);
	            console.log(err);
	        },
	    });
	})

	$('.filter-hbh').on('click', function(){
		$(".sub-hbh").show();			
	});

	$('.filter-hln').on('click', function(){
		$(".sub-hln").show();			
	});

	$('.custom-range').on('change', function(){
		var value = $(this).val();
		$('#val-price').text(value/1000 + "K");
	});


	$('.btn-checkout-ok').on('click', function(){
		$('.popup-cart').show();
	});

	$('.btn-back').on('click', function(){
		window.location.href = location.protocol + "//" + document.domain;
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

function updateCart(cart_product_id, value) {
	var pathname = window.location.protocol + "//" + window.location.host;

	$.ajax({
        method: 'POST',
        url: pathname + '/Ajax/updateCart/',
        dataType: 'json',
        data: {
            cart_product_id: cart_product_id,
            number: value
            },
        success: function(response) {
            console.log(response)
            if (response.status == true) {  
            	$("#cart-number").text(response.cart_number);             
                $(".cart-total").text(response.total);
            }
        },
        error: function(xhr, status, err) {
            console.log(xhr);
            console.log(status);
            console.log(err);
        },
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


window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    document.getElementById("myBtn").style.display = "block";
  } else {
    document.getElementById("myBtn").style.display = "none";
  }
}

// // When the user clicks on the button, scroll to the top of the document
function topFunction() {
	$('html,body').animate({
		scrollTop: 0
	}, 700);
}
