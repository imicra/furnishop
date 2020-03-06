(function( $ ) {

    "use strict";

    //Preloader for Slider
    $(window).on('load', function() {
        $('.tp-loader').fadeOut(500);
        $('.slider-slide').css({'opacity':'1'});
    });

    $( document ).ready( function() {

        var color__interactive = '#d4af37',
        color__main_secondary = '#fdd900',
        color__main_primary = '#3cc76c',
        color__main_black = '#333534';

        var front_page = $( 'body' ).hasClass( 'furnishop-front-page' );

        //responsive menu
        $('.menu-toggle').on('click', function(){
            $(this).closest('header').toggleClass('opened');
        });

        $('.close-menu').on('click', function(){
            $('header.opened').removeClass('opened');
        });

        //Mini Cart
        if($(window).width() > 992) {
            $('.site-header-cart').on('mouseenter', function() {
                $(this).find('.widget_shopping_cart').fadeIn(200);
                $(this).find('a').css('color', color__interactive);
                $(this).find('i').css('color', color__main_secondary);
            })
            .on('mouseleave', function() {
                $(this).find('.widget_shopping_cart').fadeOut(150);
                $(this).find('a').css('color', color__main_primary);
                $(this).find('i').css('color', color__main_black);
            });
        } else {
            $('.site-header-cart').on('click', '.shopping-bag-item', function(e){
                e.preventDefault();
                $(this).parent().find('.widget_shopping_cart').slideToggle();
            });
        }

//        $(window).on('resize', function() {
//            if($(window).width() < 992) {
//                $('.site-header-cart').on('mouseenter mouseleave', function() {
//                    $(this).find('.widget_shopping_cart').attr('style', function(i, style) {
//                        return style.replace(/display[^;]+;?/g, '');
//                    });
//                });
//            } else {
//                $('.site-header-cart').on('mouseenter', function() {
//                    $(this).find('.widget_shopping_cart').fadeIn(200);
//                })
//                .on('mouseleave', function() {
//                    $(this).find('.widget_shopping_cart').fadeOut(150);
//                });
//                $('.site-header-cart').on('click', '.shopping-bag-item', function(){
//                    false;
//                });
//            }
//        });

        //Header account
        //experiment
        $('.woocommerce-block_account').on('mouseenter', '.account-icon', function() {
            $(this).parent().find('.account-contents').fadeIn(200);
        })
        .on('mouseleave', function() {
            $(this).parent().find('.account-contents').fadeOut(150);
        });

        //work
        $('.woocommerce-account').on('click', '.account-icon', function(e){
            e.preventDefault();
            $(this).parent().find('.account-contents').slideToggle();
	});

        //Shop Catalog menu
        $('.catalog-menu .menu-item-has-children a:first').on('click', function(e){
            e.preventDefault();
            e.stopPropagation();
            $(this).parent().find('.sub-menu li a').on('click', function(e){
               e.stopPropagation();
            });
            $(this).parent().find('.sub-menu').slideToggle();
            //$(this).parents('.catalog-menu').toggleClass('opened');
	});

        if( front_page === false ) {
            $(window).click(function() {
               $('.catalog-menu .sub-menu').slideUp();
            });
        }

        //Search
        $(".search-toggle").click(function(){
            if ($('.search-toggle i').hasClass('fa-search')) {
                $('.search-toggle i').removeClass('fa-search');
                $('.search-toggle i').addClass('fa-times');
                $(this).parent('.header-search').find('.serch-header__widget').fadeIn(200);
            } else {
                $('.search-toggle i').removeClass('fa-times');
                $('.search-toggle i').addClass('fa-search');
                $(this).parent('.header-search').find('.serch-header__widget').fadeOut(150);
            }
        });

        $(window).on('resize', function() {
            if($(window).width() > 576) {
                $('.serch-header__widget').css('display', 'block');
            } else {
                $('.serch-header__widget').css('display', 'none');
                if ($('.search-toggle i').hasClass('fa-times')) {
                    $('.search-toggle i').removeClass('fa-times');
                    $('.search-toggle i').addClass('fa-search');
                }
            }
        });

        //Footer widgets navigation slide
        if($(window).width() < 768) {
            $('.footer-nav .widget-title').on('click', function() {
                $(this).parent().find('ul').slideToggle();
                $(this).toggleClass('opened');
            });
        }

        $(window).on('resize', function() {
            if($(window).width() > 768) {
            	$('.footer-nav .widget-title').off('click');
	            $('.footer-nav ul.menu').css('display', 'block');
	        } else {
	        	$('.footer-nav ul.menu').css('display', 'none');
	        }
        });

        //Shop Filter toggle
        $('.shop-filters-link').on('click', function(e){
            e.preventDefault();
            $(this).parent().next('.toolbar-hidden').slideToggle().toggleClass('visible');
            $(this).toggleClass('filters-open');
	});

        /* ---------------------------------------------------------------------------
         * Swiper
         * --------------------------------------------------------------------------- */
        //Swiper for Slider
        var gallerySwiper = new Swiper('.swiper-container__slider', {
            slidesPerView: 'auto',
            speed: 1000,
            autoplay: 9000,
            autoplayDisableOnInteraction: false,
            autoplayStopOnLast: false,
            loop: true,
            effect: 'fade',
            nextButton: '.button-next',
            prevButton: '.button-prev',
            pagination: '.slider-pagination',
            paginationClickable: true,
            grabCursor: false,
            simulateTouch: false,
            breakpoints: {
                768: {
                    effect: 'slide',
                    grabCursor: true,
                    simulateTouch: true,
                    allowTouchMove: true,
                }
            }
        });

        //Swiper for carousel
        var gallerySwiper = new Swiper('.swiper-container__carousel', {
            slidesPerView: 'auto',
            speed: 500,
            loop: false,
            nextButton: '.button-next',
            prevButton: '.button-prev',
            grabCursor: false,
            simulateTouch: false,
            breakpoints: {
                768: {
                    grabCursor: true,
                    simulateTouch: true,
                    allowTouchMove: true,
                }
            }
        });

        /* ---------------------------------------------------------------------------
         * fancyBox
         * --------------------------------------------------------------------------- */
        $('.fancyboxModal').fancybox({
            autoResize:true,
            padding: 0,
            openEffect  : 'fade',
            closeEffect : 'fade',
            nextEffect  : 'none',
            prevEffect  : 'none',
            fitToView : false,
            maxWidth: '100%',
            scrolling : "no",
            helpers: {
                media : {},
                overlay: {
                    locked: false,
                    css : {
                        'background' : 'rgba(0, 0, 0, 0.1)'
                    }
                }
            },
            tpl: {
                closeBtn : '<a class="fancybox-item fancybox-close modal-widget-close" href="javascript:;"></a>'
            }
        });

        /* ---------------------------------------------------------------------------
         * Masked Input Plugin
         * --------------------------------------------------------------------------- */
        if(typeof $.mask !== 'undefined'){
            $.mask.definitions['~']='[+-]';
            $('.form-group .tel').mask('+7 (999) 999-99-99');
        }

        /* ---------------------------------------------------------------------------
         * SweetAlert
         * --------------------------------------------------------------------------- */
        //Cntact Form 7
        var wpcf7Elm = document.querySelector( '.wpcf7' );

        wpcf7Elm.addEventListener( 'wpcf7mailsent', function( event ) {
            if ( '228' == event.detail.contactFormId ) {
                swal({
                    title: "Спасибо!",
                    text: "Мы перезвоним Вам в ближайшее время.",
                    button: "OK!",
                    timer: 3000,
                });
                $.fancybox.close();
            }
        }, false );

        //Add to cart buttons
        var btn_loop = $( 'ul.products li.product .add_to_cart_button' ),
        btn_single = $( '.single-product form.cart .single_add_to_cart_button' );

        btn_loop.on( 'click', function() {
            swal({
                title: "Товар добавлен в корзину",
                button: "Продолжить",
            });
        });

        btn_single.on( 'click', function() {
            if( btn_single.hasClass('disabled') ) {
                return false;
            } else {
                swal({
                    title: "Товар добавлен в корзину",
                    button: "Продолжить",
                });
            }
        });

        /* ---------------------------------------------------------------------------
         * By One Click
         * --------------------------------------------------------------------------- */
        $("#by_one_click_modal form").submit(function() {
            $.ajax({
                type: "POST",
                url: fsAjax.ajaxurl,
                data: {
                    'action' : 'by_one_click_form',
                    'post_id': $( '.by_one_click' ).data( 'post_id' ),
                    'tel' : $( '#by_one_click_modal .form-group .tel' ).val(),
                    'name' : $( '#by_one_click_modal .form-group .name' ).val()
                },
                beforeSend:function(xhr) {
                    $( '#by_one_click_modal form :submit' ).val( 'Отправка...' ).prop('disabled', true);
                }
            }).done(function() {
                $(this).find("input").val("");
                swal({
                    title: "Спасибо!",
                    text: "Мы перезвоним Вам в ближайшее время.",
                    button: "OK!",
                    timer: 3000,
                });
                $.fancybox.close();
                $("#by_one_click_modal form").trigger("reset");
                $( '#by_one_click_modal form :submit' ).val( 'Купить в один клик' ).prop('disabled', false);
            });
            return false;
	});

        /* ---------------------------------------------------------------------------
         * Woocommerce
         * --------------------------------------------------------------------------- */
        /**
        * Output price for variable product
        */
        // Update price according to variable price
        if ($('form.variations_form').length !== 0) {
            var form = $('form.variations_form');
            var variable_product_price = '';
            var init_price = $('.summary p.price').html();

            setInterval(function() {
                if ($('.single_variation_wrap span.price span.amount').length !== 0) {
                    if ($('.single_variation_wrap span.price span.amount').text() !== variable_product_price) {
                        variable_product_price = $('.single_variation_wrap span.price').text();
                        $('.summary p.price').text(variable_product_price)
                        .html($('.summary p.price').html().replace( /(Р)/g, '<span class="woocommerce-Price-currencySymbol">$1</span>' ));
                    }
                }
            }, 500);

            $( 'a.reset_variations' ).click( function() {
                $('.summary p.price').html( '' );
                $('.summary p.price').html( init_price );
            });
        }

     });

})( jQuery );
