$(document).ready( function() {

	$(".coverflow").flipster({

			style: 'carousel',

			spacing: -0.5,

	 nav: false,

	 start:'center',

	 scrollwheel: false,
     autoplay: true,
	 loop: true,
   





	});

	

  });
$('.summit-slider').owlCarousel({

    loop:true,
    margin:10,
	 autoplay:true,
    autoplayTimeout:5000,

    nav:false,
   center:true,
    dots:false,

    responsive:{

        0:{

            items:1

        },

        600:{

            items:2

        },

        1000:{

            items:3

        }

    }

})
$('#banner').owlCarousel({

    loop:true,

    margin:10,

    nav:false,

    dots:false,

    responsive:{

        0:{

            items:1

        },

        600:{

            items:1

        },

        1000:{

            items:1

        }

    }

})

             

$('.top_guru').owlCarousel({

   loop:true,
   margin:35,

    nav:true,
	 autoplay:true,
    autoplayTimeout:5000,
    autoplayHoverPause:true,

    navText:["<img src='images/arrow-left.png'>","<img src='images/arrow-right.png'>"],

    dots:false,

    center:true,

    responsive:{

        0:{

            items:1

        },

        600:{

            items:2

        },

        1000:{

            items:3

        }

    }

})
	  