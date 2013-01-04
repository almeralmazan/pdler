jQuery(document).ready(function() {
		//console.log($(window).width());
		$bgs = $('.bgs');
		
		var height = $(window).height();
		var width = $(window).width();
		
		init();
				
		
		
		//cache window object
		$window = $(window);
		$window.resize(function(e) {
			console.log($window.width());
			//change content sizes
			var height = $window.height();
			var width = $window.width();
			
			var marginleft = (width - 800) / 2;
			$('.parallax-cont').width(width);
			$('#content-wrapper').width( ((800) + (marginleft*2)) * 7 );
			/* $('.content').css('margin-left', marginleft)
			$('.content').css('margin-right', marginleft); */
			$('.content').width((800) + (marginleft*2));
			$('.bgs div').css('width', ((800) + (marginleft*2)) * 7);
			$('.bgs div').css('height', '100%');
			$('.bgs').css('height', '100%');
			animateNavPointer(offset);
			
			if(width <= 480) {
				$('header nav ul').css('width', width + "");
				$('header nav ul li').width(width);
				navigationAdjustments() ;
			} else {
				$('header nav ul li').css('width', 'auto');
			}
		});

		$("html").mousemove(function(e){
			pageX = e.pageX - ($(window).width() / 2);
			pageY = e.pageY - ($(window).height() / 2);
			
			newvalueX = (15 / width) * pageX * -1;
			newvalueY = (15 / height) * pageY * -1;
			$('.bg-1').css('background-position', newvalueX +"px " + newvalueY + "px");
			
			newvalueX = (25 / width) * pageX * -1;
			newvalueY = (25 / height) * pageY * -1;
			$('.bg-2').css('background-position', newvalueX +"px " + newvalueY + "px");
			
			newvalueX = (5 / width) * pageX * -1;
			newvalueY = (5 / height) * pageY * -1;
			$('.bg-3').css('background-position', newvalueX +"px " + newvalueY + "px");
			
			newvalueX = (-25 / width) * pageX * -1;
			newvalueY = (-25 / height) * pageY * -1;
			$('.bg-4').css('background-position', newvalueX +"px " + newvalueY + "px");
		});
		
		//margin for both left and right of container
		//$('section.content').css('margin-left', 200);
		
		var offset = 0;
		$('#nav-pointer').css('left', $('[data-target="home"]').offset().left + 70);
		
		$('nav').find('li a').each(function() {
			$this = $(this);
			id = $this.attr('data-target');
			
			$this.click(function(e) {
				id = $(this).attr('data-target');
				os = $(this).attr('data-offset');
				
				//animate Conten
				animateContent(os);
				
				prevOffSet = offset;
				
				//change offset
				offset = $(this).attr('data-offset');		
				
				//animate nav pointer/slider
				animateNavPointer(offset);
				e.preventDefault();
			});
		});
		
		/* $('nav #nav-pointer').mousedown(function(e) {
			console.log(e);
			$(this).offset({top: 32, left: e.pageX});
		}); */
	
		function init() {
			var marginleft = (width - 800) / 2;
			$('.parallax-cont').width(width);
			$('#content-wrapper').width( ((800) + (marginleft*2)) * 7 );
			/* $('.content').css('margin-left', marginleft)
			$('.content').css('margin-right', marginleft); */
			$('.content').width((800) + (marginleft*2));
			$('.bgs div').css('width', ((800) + (marginleft*2)) * 7);
			$('.bgs div').css('height', '100%');
			$('.bgs').css('height', '100%');
			
			if(width <= 480) {
				$('header nav ul').css('width', width + "px");
				$('header nav ul li').width(width);
				navigationAdjustments() ;
				
				//find all content that is floated and unfloat it
				$('.content-full div.fright').removeClass('fright').width(300);
			}else {
				$('header nav ul').css('width', '');
				$('header nav ul li').css('width', 'auto');
			}
			
		}
	
		//for navigation
		function navigationAdjustments() {
			console.log('adjust');
			$('#pull').click(function(e) {
				e.preventDefault();
				$('header nav ul').slideToggle();
			});
			$('header nav ul').find('li').each(function() {
				$(this).click(function() {
					$('header nav ul').slideToggle();
				});
			});
		}
		
		function animateNavPointer(offset) {
			//console.log(offset);
			var animSpeed = 1200;
			switch(parseInt(offset)) {
				case 0:
					$('#nav-pointer').animate(
						{
							left: $('[data-target="home"]').offset().left + 70
						},
						animSpeed,
						'jswing'
					);
					break;
				case 1: 
					$('#nav-pointer').animate(
						{
							left: $('[data-target="features"]').offset().left + 70
						},
						animSpeed,
						'jswing'
					);
					break;
				case 2:
					$('#nav-pointer').animate(
						{
							left: $('[data-target="download"]').offset().left + 70
						},
						animSpeed,
						'jswing'
					);
					break;
				case 3: 
					$('#nav-pointer').animate(
						{
							left: $('[data-target="powerpack"]').offset().left + 70
						},
						animSpeed,
						'jswing'
					);
					break;
				case 4: 
					$('#nav-pointer').animate(
						{
							left: $('[data-target="team"]').offset().left + 70
						},
						animSpeed,
						'jswing'
					);
					break;
			}
		}
		
		function animateContent(offset) {
			var arr = {left: (parseInt(offset) * width) * -1};
			var arrB = {left: (parseInt(offset) * 100) * -1};
			var easing = ["easeOutBounce", "easeOutElastic", "easeInOutElastic", "easeOutBack", "easeOutExpo"];
			//add additional animations
			
			switch(parseInt(offset)) {
				case 0:					
					break;
				case 1:
					break;
				case 2:					
					break;
				case 3:
					break;
				case 4:					
					break;
			}
			ease = easing[getRandom(0, 4)];
			$('#content-wrapper').animate(
				arr,
				1000,
				ease,
				function() {
					//console.log();
				}
			);
			$('.bgs .bg-1').animate(
				arrB,
				500 * getRandom(1, 5),
				'jswing',
				function() {
					console.log();
				}
			);
			$('.bgs .bg-2').animate(
				arrB,
				500 * getRandom(1, 5),
				'jswing',
				function() {
					//console.log('animation finished');
				}
			);
			$('.bgs .bg-3').animate(
				arrB,
				500 * getRandom(1, 5),
				'jswing',
				function() {
					//console.log('animation finished');
				}
			);
			$('.bgs .bg-4').animate(
				arrB,
				500 * getRandom(1, 5),
				'jswing',
				function() {
					//console.log('animation finished');
				}
			);
		}
		
		// Returns a random number between min and max
		function getRandom(min, max) {
			return Math.floor(Math.random() * (max - min + 1)) + min;
		}
		
		function moveTo() {
			$('[data-type="sprite"]').each(function() {
				
			});		
		}
	});