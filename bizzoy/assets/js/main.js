/*
[MAIN.js]


[1] Declaration of functions
 
    2   Sizes for flip cards
    2.1 Swiper

[2] Declaration of variables
[3] Hero header general
    1   Constructor
    1.2 Arrow down link
    2.4 Hero header swiper default
    3.1 Hero header init

[4] Navbar general
    1   Constructor
    1.1 Mobile test
    1.2 Mobile menu
    1.3 Sub menus
    1.4 Navbar search
    1.5 Navbar type

[5] Declaration of constants for main classes
[6] Init main classes
[7] Images Loaded
[8] Sizes flip cards init
[9] Sizes flip cards reinit
[14] Footer type init
[21] Swiper init
[22] 3d-hover for elements init
*/
(function() {
    'use strict';

    jQuery(document).ready(function(jQuery) {
        window.requestAnimationFrame = (function() {
            return window.requestAnimationFrame || window.webkitRequestAnimationFrame || window.mozRequestAnimationFrame || window.oRequestAnimationFrame || window.msRequestAnimationFrame || function(callback) {
                return window.setTimeout(callback, 1000 / 60);
            };
        })();

        /* [1] Declaration of functions */



        /* (2) Sizes for flip cards */
        function sizes_flip_cards(section) {
            let flip_container = section.find('.flip-container');
            let flip_card_img = flip_container.find('img');
            let flip_front = flip_container.find('.front');
            let flip_back = flip_container.find('.back');
            for (let i = 0; i < flip_container.length; i++) {
                let height_img = jQuery(flip_card_img[i]).innerHeight();
                jQuery(flip_container[i]).css('height', height_img);
                jQuery(flip_front[i]).css('height', height_img);
                jQuery(flip_back[i]).css('height', height_img);
            }
        }

        /* (2.1) Swiper */
        function swiper_init() {
            // Swiper team
            let swiper_team = new Swiper('.swiper-team', {
                loop: true,
                speed: 500,
                spaceBetween: 8,
                slidesPerView: 3,
                pagination: {
                    el: '.swiper-pagination-bullets-common',
                    type: 'bullets',
                    clickable: true,
                },
                autoplay: {
                    delay: 2500,
                    disableOnInteraction: true
                },
                breakpoints: {
                    767: {
                        slidesPerView: 2,
                    },
                    450: {
                        slidesPerView: 1,
                        spaceBetween: 0
                    },
                    0: {
                        spaceBetween: 0
                    }
                }
            });

            // Swiper testimonials
            let swiper_testimonials = new Swiper('.swiper-testimonials', {
                speed: 600,
                loop: true,
                effect: 'flip',
                flipEffect: {
                    rotate: 30,
                    slideShadows: false,
                },
                autoplay: {
                    delay: 2500,
                    disableOnInteraction: true
                },
                slidesPerView: 1,
                pagination: {
                    el: '.swiper-pagination-bullets-default',
                    type: 'bullets',
                    clickable: true,
                },
                navigation: {
                    nextEl: '.swiper-button-next-testimonials',
                    prevEl: '.swiper-button-prev-testimonials',
                }
            });
            // Swiper testimonials
            let swiper_testimonials_two = new Swiper('.swiper-testimonials-two', {
                speed: 600,
                loop: true,

                autoplay: {
                    delay: 2500,
                    disableOnInteraction: true
                },
                slidesPerView: 1,
                pagination: {
                    el: '.swiper-pagination-bullets-default',
                    type: 'bullets',
                    clickable: true,
                },
                navigation: {
                    nextEl: '.swiper-button-next-testimonials',
                    prevEl: '.swiper-button-prev-testimonials',
                }
            });
            // Swiper testimonials
            let swiper_testimonials_three = new Swiper('.swiper-testimonials-three', {
                speed: 600,
                loop: true,

                autoplay: {
                    delay: 2500,
                    disableOnInteraction: true
                },
                slidesPerView: 1,
                pagination: {
                    el: '.swiper-pagination-bullets-default',
                    type: 'bullets',
                    clickable: true,
                },
                navigation: {
                    nextEl: '.swiper-button-next-testimonials',
                    prevEl: '.swiper-button-prev-testimonials',
                }
            });
            // Swiper portfolio
            let swiper_portfolio = new Swiper('.swiper-portfolio', {
                slidesPerView: 4,
                spaceBetween: 10,
                loop: true,
                autoplay: {
                    delay: 3000,
                },
                breakpoints: {
                    1199: {
                        slidesPerView: 3,
                    },
                    767: {
                        slidesPerView: 2,
                    },
                    575: {
                        slidesPerView: 1,
                    }
                },
                navigation: {
                    nextEl: '.swiper-button-next-portfolio',
                    prevEl: '.swiper-button-prev-portfolio',
                }
            });

            // Swiper clients
            let swiper_clients = new Swiper('.swiper-clients', {
                slidesPerView: 4,
                loop: true,
                autoplay: {
                    delay: 2000,
                },
                breakpoints: {
                    1199: {
                        slidesPerView: 3,
                    },
                    767: {
                        slidesPerView: 2,
                    },
                    575: {
                        slidesPerView: 1,
                    }
                }
            });

            // Swiper default
            let swiper_default = new Swiper('.swiper-default', {
                loop: true,
                autoplay: {
                    delay: 2000,
                },
                navigation: {
                    nextEl: '.swiper-button-next-portfolio',
                    prevEl: '.swiper-button-prev-portfolio',
                },
                pagination: {
                    el: '.swiper-pagination-bullets-common',
                    type: 'bullets',
                    clickable: true,
                },
            });

            // Swiper post
            let swiper_post = new Swiper('.swiper-post', {
                loop: true,
                autoplay: {
                    delay: 2000,
                },
                pagination: {
                    el: '.swiper-pagination-bullets-default',
                    type: 'bullets',
                    clickable: true,
                },
            });
        }


        /* [2] Declaration of variables */
        // Common constants
        const COMMON = {
            win: window,
            doc: document,
            body: jQuery('body')
        };

        // Viewport sizes
        const VIEWPORT = {
            w: COMMON.win.innerWidth,
            h: COMMON.win.innerHeight
        };

        // ROOT
        let root = COMMON.doc.querySelector(':root');

        // Page width
        let page_width = VIEWPORT.w;

        // Hero header
        let hero_header = jQuery('.hero-header');

        // Main wrapper
        let wrapper = jQuery('#main-wrapper');

        // Footer
        let footer = jQuery('footer');

        // Page loader
        let loader = jQuery('.loader');

        // Mobile breakpoint
        let mobile_point = 992;

        // Start for mobile version template
        let mobile_start = 991;

       

        // Logo light
        let logo_light = jQuery('.logo-light');

        // Logo dark
        let logo_dark = jQuery('.logo-dark');

        // Navbar type
        let navbar_type = 'navbar-fill';

        // Footer type
        let footer_type = 'footer-light';

        // Logo position
        let logo_position = 'logo-left';

        // Flip cards section
        let flip_section = jQuery('.flip-section');

        // Google map wrapper
        let map = jQuery('#map');

        // Progress bar
        let progress_bar = '.progress-bar-skill';

        // Progress bar test variable
        let progress_check = true;

        // Contact form
        let form = jQuery('#ajax-contact');

        // Wrapper for 3d-hover elements
        let hover3d = jQuery('.hover3d-wrapper');

        // Isotope button group
        let button_group = jQuery('.button-group-default');

        // Hero header type
        let hero_type = hero_header.data('section-type');

        // Viewport sizes reinit
        jQuery(COMMON.win).resize(function() {
            VIEWPORT.w = COMMON.win.innerWidth;
            VIEWPORT.h = COMMON.win.innerHeight;
            if ((page_width >= mobile_point && VIEWPORT.w <= mobile_start) || (page_width <= mobile_start && VIEWPORT.w >= mobile_point)) {
                location.reload();
            }
        });

        /* [3] Hero header general */
        class HERO {
            /* (1) Constructor */
            constructor() {
                this.canvas = COMMON.doc.getElementById('canvas-hero');
                this.canvas_header = jQuery('#canvas-parent');
                this.canvas_width = COMMON.win.innerWidth;
                this.canvas_height = this.canvas_header.height();
                this.particles_wrapper = 'canvas-parent';
                this.angle_down = jQuery('.angle-down');
                this.hero_header = jQuery('.hero-header');
                this.youtube_wrapper = this.hero_header.find('.hero-video');
                this.wrapper_slider = '.swiper-hero';
            }


            /* (1.2) Arrow down link */
            _arrow_down() {
                jQuery(this.angle_down).on("click", () => {
                    let top = this.hero_header.height();
                    jQuery('body,html').animate({
                        scrollTop: top
                    }, 1500);
                });
            }

            /* (2.4) Hero header swiper default */
            _swiper_default_header() {
                let swiper = new Swiper(this.wrapper_slider, {
                    loop: true,
                    speed: 600,
                    pagination: {
                        el: '.swiper-pagination-bullets-default',
                        type: 'bullets',
                        clickable: true,
                    },
                    navigation: {
                        nextEl: '.swiper-button-next-default',
                        prevEl: '.swiper-button-prev-default',
                    }
                });
            }

            /* (3.1) Hero header init */
            INIT(hero_type) {
                switch (hero_type) {
                    case 'slider_default':
                        this._swiper_default_header();
                        break;
                   
                }
                this._arrow_down();
            }
        }

        /* [4] Navbar general */
        class NAV {
            /* (1) Constructor */
            constructor() {
                this.root = COMMON.doc.querySelector(':root');
                this.navbar = jQuery('.navbar');
                this.navbar_toggle = this.navbar.find('.hamburger');
                this.menu = this.navbar.find('.navbar-menu');
                this.menu_list = this.menu.find('.navbar-menu-list');
                this.navbar_search = jQuery('.navbar-search');
                this.navbar_search_form = jQuery('.search-form');
                this.navbar_search_button = jQuery('.search-input');
                this.social_side = jQuery('.navbar-additional');
                /* OPTIONAL(DEMO ONLY) START */
                this.toolbar = jQuery('.toolbar');
                this.toolbar_toggle = jQuery('.toolbar-toggle');
                this.navbar_type = jQuery('.header-type');
                this.footer_type = jQuery('.footer__type');
                this.hamburger_type = jQuery('.hamburger__type');
                this.logo_position = jQuery('.logo-position');
                this.color_theme_option = jQuery('.color_scheme');
                this.footer = jQuery('footer');
                /* OPTIONAL(DEMO ONLY) END */
            }

            /* (1.1) Mobile test */
            _mobile_check() {
                if (VIEWPORT.w < mobile_point) {
                    this.navbar.addClass('mobile-menu');
                    this.navbar.removeClass('desktop-menu');
                } else if (VIEWPORT.w >= mobile_point) {
                    this.navbar.removeClass('mobile-menu');
                    this.navbar.addClass('desktop-menu');
                }
            }

            /* (1.2) Mobile menu */
            _mobile_menu() {
                let primary_items = this.menu.find('.menu-primary-item');
                let mobile_items = this.menu.find('.menu-item-has-children');
                let item_count = primary_items.length;
                this._mobile_check();
                jQuery(COMMON.win).resize(() => {
                    this._mobile_check();
                });
                this.navbar_toggle.on('click', () => {
                    this.menu.slideToggle(250);
                    let sub_menus = this.menu.find('.sub-menu');
                    let megamenu = this.menu.find('.megamenu');
                    this.navbar_toggle.toggleClass('is-active');
                    if (!this.navbar_toggle.hasClass('is-active')) {
                        sub_menus.slideUp('fast');
                        megamenu.slideUp('fast');
                        sub_menus.removeClass('active-sub-menu-toggle');
                        megamenu.removeClass('active-sub-menu-toggle');
                        mobile_items.removeClass('active-mobile-menu-toggle');
                    } 
                    /* OPTIONAL(DEMO ONLY) START */
                    this.toolbar.removeClass('active_toolbar');
                    this.toolbar_toggle.removeClass('active_toolbar_toggle');
                    /* OPTIONAL(DEMO ONLY) END */
                });
            }

            /* (1.3) Sub menus */
            _sub_menus() {
                let items_has_children = this.menu.find('.menu-item-has-children');
                let mobile_items = this.menu.find('.menu-item-has-children');
                if (jQuery(COMMON.win).innerWidth() > 992) {
                    items_has_children.hover(function() {
                        let sub_menus = jQuery(this).find('.sub-menu');
                        jQuery(sub_menus[0]).toggleClass('active-sub-menu');
                    }, function() {
                        let sub_menus = jQuery(this).find('.sub-menu');
                        jQuery(sub_menus[0]).toggleClass('active-sub-menu');
                    });
                } else {
                    mobile_items.on('click', function() {
                        let sub_menus = jQuery(this).parent().find('.sub-menu');
                        let mega_menus = jQuery(this).parent().find('.megamenu');
                        let inside_items = jQuery(this).parent().parent().find('.menu-item-has-children');
                        if (!jQuery(this).hasClass('active-mobile-menu-toggle')) {
                            let active_sub_menus = jQuery(this).parent().parent().find('.active-sub-menu-toggle');
                            jQuery(inside_items).removeClass('active-mobile-menu-toggle');
                            jQuery(active_sub_menus).slideUp('fast');
                            jQuery(this).addClass('active-mobile-menu-toggle');
                            jQuery(sub_menus[0]).slideDown('fast');
                            jQuery(sub_menus[0]).addClass('active-sub-menu-toggle');
                            jQuery(mega_menus[0]).slideDown('fast');
                            jQuery(mega_menus[0]).addClass('active-sub-menu-toggle');
                        } else {
                            jQuery(this).parent().find('.sub-menu').slideUp('fast');
                            jQuery(this).parent().find('.megamenu').slideUp('fast');
                            jQuery(this).removeClass('active-mobile-menu-toggle');
                            jQuery(sub_menus).removeClass('active-sub-menu-toggle');
                            jQuery(mega_menus).removeClass('active-sub-menu-toggle');
                        }
                    });
                }
            }

            /* (1.4) Navbar search */
            _navbar_search() {
                let input = this.navbar_search_form.find('input');
                let icon_on = this.navbar_search_button.find('.search-icon');
                let icon_off = this.navbar_search_button.find('.search-times');
                let social_width;
                let width;
                if (this.social_side.length) {
                    social_width = this.social_side.outerWidth(true);
                }

                this.navbar_search_button.on('click', () => {

                    /* OPTIONAL(DEMO ONLY) START */
                    this.social_side.css({
                        'transition': 'all .3s ease-in-out'
                    });
                    this.navbar_search.css({
                        'transition': 'all .3s ease-in-out'
                    });
                    /* OPTIONAL(DEMO ONLY) END */

                    input.toggleClass('active-form');
                    icon_on.toggleClass('icon-off');
                    icon_off.toggleClass('times-active');
                    this.navbar.toggleClass('navbar-additional-disable');
                    width = social_width || 180;
                    if (input.hasClass('active-form')) {
                        if (logo_position === 'logo-left') {
                            input.css({
                                'width': width + 'px',
                                'margin-right': '-' + width + 'px'
                            });
                            this.navbar_search.css({
                                'transform': 'translateX(-' + width + 'px)'
                            });
                            if (!this.social_side.length) {
                                this.menu_list.css({
                                    'margin-right': '200px'
                                });
                            }
                        } else if (logo_position === 'logo-right') {
                            input.css({
                                'width': width + 'px',
                                'margin-left': '-' + (width + 50) + 'px'
                            });
                            this.navbar_search.css({
                                'transform': 'translateX(' + width + 'px)'
                            });
                            if (!this.social_side.length) {
                                this.menu_list.css({
                                    'margin-left': '200px'
                                });
                            }
                        }
                    } else if (!input.hasClass('active-form')) {
                        if (logo_position === 'logo-left') {
                            input.css({
                                'width': '0',
                                'margin-right': '0'
                            });
                            this.navbar_search.css({
                                'transform': 'translateX(0px)'
                            });
                            if (!this.social_side.length) {
                                this.menu_list.css({
                                    'margin-right': '20px'
                                });
                            }
                        } else if (logo_position === 'logo-right') {
                            input.css({
                                'width': '0',
                                'margin-left': '0'
                            });
                            this.navbar_search.css({
                                'transform': 'translateX(0px)'
                            });
                            if (!this.social_side.length) {
                                this.menu_list.css({
                                    'margin-left': '20px'
                                });
                            }
                        }
                    }
                });
            }

            /* (1.5) Navbar type */
            _navbar_type() {
                if (VIEWPORT.w >= mobile_point) {
                    if (jQuery(COMMON.win).scrollTop() >= 100) {
                        this.navbar.addClass(navbar_type);
                        logo_light.css({
                            'display': 'none'
                        });
                        logo_dark.css({
                            'display': 'block'
                        });
                    } else if (jQuery(COMMON.win).scrollTop() < 100) {
                        this.navbar.removeClass(navbar_type);
                        logo_light.css({
                            'display': 'block'
                        });
                        logo_dark.css({
                            'display': 'none'
                        });
                    }
                }
            }

            /* OPTIONAL(DEMO ONLY) START */
            _toolbar() {
                this.toolbar_toggle.on('click', () => {
                    this.toolbar.toggleClass('active_toolbar');
                    this.toolbar_toggle.toggleClass('active_toolbar_toggle');
                });

            }

            _btn_toggle(parent) {
                let btn = parent.find('.option_btn');
                btn.on('click', function() {
                    btn.removeClass('option_btn_active');
                    btn.addClass('option_btn_off');
                    jQuery(this).toggleClass('option_btn_off');
                    jQuery(this).toggleClass('option_btn_active');
                });
            }

            _btn_small_toggle(parent) {
                let btn = parent.find('.option_btn_small');
                btn.on('click', function() {
                    btn.removeClass('option_btn_small_active');
                    btn.addClass('option_btn_small_off');
                    jQuery(this).toggleClass('option_btn_small_off');
                    jQuery(this).toggleClass('option_btn_small_active');
                });
            }

            _header_type_option() {
                this._btn_toggle(this.navbar_type);
                let btn = this.navbar_type.find('.option_btn');
                let navbar = this.navbar;
                btn.on('click', function() {
                    navbar_type = jQuery(this).data('header-type');
                    navbar.removeClass('navbar-fill navbar-fade navbar-small navbar-scroll');
                });
                btn.on('click', () => {
                    this._navbar_type();
                });
            }

            _logo_position_option() {
                this._btn_toggle(this.logo_position);
                let btn = this.logo_position.find('.option_btn');
                let navbar = this.navbar;
                let social = this.social_side;
                let navbar_search = this.navbar_search;
                let input = this.navbar_search_form.find('input');
                let icon_on = this.navbar_search_button.find('.search-icon');
                let icon_off = this.navbar_search_button.find('.search-times');
                btn.on('click', function() {
                    input.removeClass('active-form');
                    icon_on.removeClass('icon-off');
                    icon_off.removeClass('times-active');
                    navbar.removeClass('navbar-additional-disable');
                    input.css({
                        'width': '0',
                        'margin-left': '0',
                        'margin-right': '0',
                    });
                    navbar_search.css({
                        'transform': 'translateX(0px)'
                    });
                    social.css({
                        'transition': 'none'
                    });
                    navbar_search.css({
                        'transition': 'none'
                    });
                    logo_position = jQuery(this).data('logo-position');
                    navbar.removeClass('logo-left logo-right');
                    navbar.addClass(logo_position);
                });
            }

            _footer_type_option() {
                this._btn_toggle(this.footer_type);
                let btn = this.footer_type.find('.option_btn');
                let footer = this.footer;
                btn.on('click', function() {
                    let footer_type = jQuery(this).data('footer-type');
                    footer.removeClass('footer-light footer-dark');
                    jQuery(footer).addClass(footer_type);
                });
            }

            _hamburger_type() {
                this._btn_small_toggle(this.hamburger_type);
                let btn = this.hamburger_type.find('.option_btn_small');
                let toggle = this.navbar_toggle;
                btn.on('click', function() {
                    let type = jQuery(this).data('hamburger');
                    toggle.removeClass();
                    toggle.addClass('hamburger justify-content-center align-items-center');
                    toggle.addClass(type);
                });
            }

            _color_scheme() {
                let color_button = this.color_theme_option.find('div');
                let root = this.root;
                for (let i = 0; i < color_button.length; i++) {
                    let bg_button = jQuery(color_button[i]).data('color-scheme');
                    jQuery(color_button[i]).css({
                        'background-color': bg_button
                    });
                }
                color_button.on('click', function() {
                    color_scheme_color = jQuery(this).data('color-scheme');
                    root.style.setProperty('--primary_color', color_scheme_color);
                    let svg = jQuery('.skills-wrapper svg');
                    let path = jQuery(svg).find('path:eq(-1)');
                    path.attr('stroke', color_scheme_color);
                });
            }

            /* OPTIONAL(DEMO ONLY) END */

            /* Navbar init */
            INIT() {
                this.navbar.addClass(logo_position);
                this._navbar_type();
                jQuery(COMMON.win).scroll(() => {
                    this._navbar_type();
                });
                this._mobile_check();
                this._mobile_menu();
                this._sub_menus();
                this._navbar_search();
                /* OPTIONAL(DEMO ONLY) START */
                this._toolbar();
                this._color_scheme();
                this._logo_position_option();
                this._header_type_option();
                this._footer_type_option();
                this._hamburger_type();
                /* OPTIONAL(DEMO ONLY) END */
            }
        }

        /* [5] Declaration of constants for main classes */
        const HERO_HEADER = new HERO();
        const NAVIGATION = new NAV();

        /* [6] Init main classes */
        HERO_HEADER.INIT(hero_type);
        NAVIGATION.INIT();

        /* [7] Images Loaded */
       
        /* [7] Images Loaded */
         
       jQuery(window).load(function(){
        jQuery('#preloader').fadeOut('slow');
    });

        /* [14] Footer type init */
        footer.addClass(footer_type);

        /* [21] Swiper init */
        swiper_init();

        /* [22] 3d-hover for elements init */
        if (VIEWPORT.w >= mobile_point) {
            if (hover3d.length) {
                jQuery(hover3d).hover3d({
                    selector: ".hover3d-child"
                });
            }
        }
        //DEMO
        jQuery(".anchor-link").on("click", function(event) {
            event.preventDefault();

            let id = jQuery(this).attr('href'),

                top = jQuery(id).offset().top;

            jQuery('body,html').animate({
                scrollTop: top
            }, 1500);
        });

    });

})();