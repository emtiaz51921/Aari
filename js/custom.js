/*
 * Theme name: Aari
 * This is a custom js file to hold all the customized functions
 */

(function ($) {
	$( document ).ready(
		function () {


			$('#nav-toggle').on('focus', function(){
				$('#nav-toggle').trigger('click');
			});


			//initiate colorbox

			$( 'a[href*=".jpg"], a[href*=".jpeg"], a[href*=".png"], a[href*=".gif"]' ).colorbox(
				{
					transition:'elastic',
					speed 	:350,
					rel: 'gallery',
					opacity:.85,
					closeButton: true,
					scalePhotos: true,
					maxWidth: '90%',
					maxHeight: '90%',

					title: function() {
						return $( this ).find( 'img' ).attr( 'alt' );
					}
				}
			);


			function headerController() {
				$( ".header-controller .icon , #topSidebar .icon" ).on(
					"click",
					function () {
						var e = $( ".header-controller .icon , #topSidebar .icon" ),
						t     = $( "body" );
						e.toggleClass( "icon--active" ), e.hasClass( "icon--active" ) ? t.css( "overflow", "hidden" ) : t.css( "overflow", "" ), $( "#topSidebar .sidebar" ).toggleClass( "sidebar-width" ), $( "#mainContent" ).toggleClass( "sidebar-margin-left" ), $( this ).addClass( "animated rubberBand" ).one(
							"webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend",
							function () {
								$( this ).removeClass( "animated rubberBand" )
							}
						)
					}
				), $( ".sidebar-overlay" ).on(
					"click",
					function () {
							$( ".header-controller .icon" ).click()
					}
				)
			}

			function dropdoenMenu() {

				$( "a.dropdown-toggle" ).on(
					"click",
					function (e) {
						if ($next = $( this ).next(), $next.hasClass( "dropdown-left" ) || $next.hasClass( "dropdown-right" )) {
							return $next.toggleClass( "show" ), ! 1
						}
					}
				)


			}

			function navInSidebar() {
				var e = $( "#nav .navbar-collapse" ).html();
				(e    = $( "#topSidebar .navbar .navbar-collapse" ).html( e )).find( ".animated" ).removeClass( "animated" ).removeClass( "fadeInUp" ).removeClass( "fadeInLeft" ).addClass( "slideDown" ), dropdoenMenu()
			}

			function fixeDropdowns() {

				$( ".dropdown-menu" ).on(
					"mouseenter",
					function () {
						var e = $( this );
						e.offset().left + e.width() + e.find( "li:first" ).width() < $( "body" ).width() ? e.find( ".dropdown-menu" ).removeClass( "dropdown-right" ).addClass( "dropdown-left" ).removeClass( "fadeInRight" ).addClass( "fadeInLeft" ) : e.find( ".dropdown-menu" ).removeClass( "dropdown-left" ).addClass( "dropdown-right" ).removeClass( "fadeInLeft" ).addClass( "fadeInRight" )
					}
				)

			}

			function getProgress(e) {
				for ($text = "", $x = 0; $x < e; $x++) {
					$per = 100 / e, $text += '<div class="progress" data-index="' + $x + '" style="width: ' + $per + '%">\n                <div class="progress-bar"></div>\n            </div>';
				}
				return $text
			}

			function setCoverBackground() {
				$( ".cover-bg, section" ).each(
					function () {
						var e = $( this ).attr( "data-image-src" );
						void 0 !== e && ! 1 !== e && $( this ).css( "background-image", "url(" + e + ")" )
					}
				)
			}



			function scrollAnimate() {
				$( 'a[href*="#"]:not( [href="#content"], a.comment-reply-link, a.search-trigger )' ).on(
					"click",
					function () {
						if (location.pathname.replace( /^\//, "" ) == this.pathname.replace( /^\//, "" ) || location.hostname == this.hostname) {
							var e = $( this.hash );
							if ("#header" === $( this ).attr( "href" )) {
								return $( "html,body" ).animate(
									{
										scrollTop: 0
									},
									1e3
								), ! 1;
							}
							if ((e = e.length ? e : $( "[name=" + this.hash.slice( 1 ) + "]" )).length) {
								return $( "html,body" ).animate(
									{
										scrollTop: e.offset().top - 75
									},
									1e3
								), ! 1
							}
						}
					}
				)
			}



			function textSearch() {
				$( ".search-trigger" ).on(
					"click",
					function (e) {
						e.preventDefault(), $( ".search-wrap" ).animate(
							{
								opacity: "toggle"
							},
							500
						), $( ".nav-search, #search-close" ).addClass( "open" )

						$(".main-search-input").focus();
					}
				), $( ".search-close" ).on(
					"click",
					function (e) {
							e.preventDefault(), $( ".search-wrap" ).animate(
								{
									opacity: "toggle"
								},
								500
							), $( ".nav-search, #search-close" ).removeClass( "open" )
					}
				), $( document.body ).on(
					"click",
					function (e) {
							$( ".search-wrap" ).fadeOut( 200 ), $( ".nav-search, #search-close" ).removeClass( "open" )
					}
				), $( ".search-trigger, .main-search-input" ).on(
					"click",
					function (e) {
							e.stopPropagation()
					}
				)
			}

			function mouseParallax() {
				function e(e, t, o) {
					var a = $( ".to_top" )[0].getBoundingClientRect(),
						n = e.pageX - a.left,
						r = e.pageY - a.top,
						i = window.pageYOffset || document.documentElement.scrollTop;
					TweenMax.to(
						t,
						.3,
						{
							x: (n - a.width / 2) / a.width * o,
							y: (r - a.height / 2 - i) / a.width * o,
							ease: Power2.easeOut
						}
					)
				}
				$( ".to_top" ).on(
					"mouseleave",
					function (e) {
						TweenMax.to(
							this,
							.3,
							{
								scale: 1
							}
						), TweenMax.to(
							".icon-circle, #to-top",
							.3,
							{
								scale: 1,
								x: 0,
								y: 0
							}
						)
					}
				), $( ".to_top" ).on(
					"mouseenter",
					function (e) {
							TweenMax.to(
								this,
								.3,
								{
									transformOrigin: "0 0",
									scale: 1
								}
							), TweenMax.to(
								".icon-circle",
								.3,
								{
									scale: 1.2
								}
							)
					}
				), $( ".to_top" ).on(
					"mousemove",
					function (t) {
							! function (t) {
								e( t, ".icon-circle", 60 ), e( t, "#to-top", 40 )
							}(t)
					}
				)
			}

			function hoverPlayVideo() {
				TweenMax.set(
					".play-circle-01",
					{
						rotation: 90,
						transformOrigin: "center"
					}
				), TweenMax.set(
					".play-circle-02",
					{
						rotation: -90,
						transformOrigin: "center"
					}
				), TweenMax.set(
					".play-perspective",
					{
						xPercent: -2,
						scale: .08,
						transformOrigin: "center 41%",
						perspective: 1
						}
				), TweenMax.set(
					".play-video",
					{
						visibility: "hidden",
						opacity: 0
						}
				), TweenMax.set(
					".play-triangle",
					{
						transformOrigin: "left center",
						transformStyle: "preserve-3d",
						rotationY: 10,
						scaleX: 2
						}
				);
				const e = new TimelineMax(
					{
						paused: ! 0
					}
				).to(
					".play-circle-01",
					.7,
					{
						opacity: .1,
						rotation: "+=360",
						strokeDasharray: "456 456",
						ease: Power1.easeInOut
					},
					0
				).to(
					".play-circle-02",
					.7,
					{
						opacity: .1,
						rotation: "-=360",
						strokeDasharray: "411 411",
						ease: Power1.easeInOut
						},
					0
				),
					t   = document.querySelector( ".play-button" );
				null !== t && (t.addEventListener( "mouseover", () => e.play() ), t.addEventListener( "mouseleave", () => e.reverse() ))
			}

			function ogatoSlider() {
				var e = $( "#ogato_slider" ),
					t = $( ".ogato-overloy-img" ),
					o = $( ".ogato" ),
					a = ".ogato-item",
					n = ($( ".ogato-active" ), 1),
					r = new TimelineMax(),
					i = new TimelineMax();
				if (0 === e.length) {
					return ! 1;
				}
				$( window ).on(
					"load",
					function () {
						i.fromTo(
							t.find( ".progress" ),
							10,
							{
								width: "0"
							},
							{
								width: "100%",
								onComplete: function () {
									n = n < o.length ? n : 0, current_item = $( o[n] ), $src = current_item.find( a ).attr( "data-image-src" ), TweenMax.fromTo(
										t,
										.5,
										{
											y: -200,
											backgroundImage: "url(" + $src + ")"
										},
										{
											y: 0
										}
									), TweenMax.to(
										t.find( ".ogato-carousel" ),
										.5,
										{
											left: current_item.offset().left + 10,
											top: current_item.offset().top + 10
										},
										.9
									), n++, i.restart()
								}
							}
						)
					}
				), o.on(
					"mouseover",
					function () {
							var e = $( this );
							i.pause(), e.hasClass( "ogato-active" ) || (bgSlider = e.find( a ), $( ".ogato-active" ).removeClass( "ogato-active" ), e.addClass( "ogato-active" ), function (e) {
								bgSlider = e.find( a ), $top = e.offset().top, $height = e.height(), $width = e.width(), r.reverse().timeScale( 1.5 ), (r = new TimelineMax()).set(
									bgSlider,
									{
										position: "absolute",
										opacity: 0,
										top: $top + "px",
										left: "auto",
										height: $height + "px",
										width: $width + "px",
										"z-index": -1
									}
								).fromTo(
									bgSlider,
									.2,
									{
										autoAlpha: 0
									},
									{
										autoAlpha: 1
									}
								).to(
									bgSlider,
									.7,
									{
										autoAlpha: 1,
										left: 0,
										top: 0,
										width: "100%",
										height: "100%"
									}
								)
							}(e, bgSlider))
					}
				), e.on(
					"mouseleave",
					function () {
							r.reverse().timeScale( 1 ), $( ".ogato-active" ).removeClass( "ogato-active" ), i.resume()
					}
				)
			}

			function shareSocialIcon() {
				var e = null;
				$( ".socials-wrap" ).on(
					"click",
					function () {
						var t = (e = $( this )).find( ".socials" ),
						o     = e.find( ".socials-text" ),
						a     = e.find( ".socials-icon" );
						"none" === t.css( "display" ) ? (t.css(
							{
								opacity: "1",
								display: "inline-block"
							}
						), o.css(
							{
								transform: "translate(36px, -34px)"
							}
						), a.css(
							{
								transform: "translate(-150px) scale(1.09) "
							}
						), a.find( "i" ).attr( "class", "fa fa-times" )) : (t.css(
							{
								opacity: "",
								display: ""
							}
						), o.css(
							{
								transform: ""
							}
						), a.css(
							{
								transform: "",
								opacity: ""
							}
						), a.find( "i" ).attr( "class", "fa fa-share-alt" ))
					}
				)
			}
			! function (e) {
				"use strict";
				e( window );
				setCoverBackground(), scrollAnimate(), headerController(), navInSidebar(), fixeDropdowns(), textSearch(), mouseParallax(), e( window ).on(
					"load",
					function () {
						//scrollEffect()
					}
				)
			}(jQuery);

		/*
		** Search box cursor pointer
		*/



		}
	);
})( jQuery );
