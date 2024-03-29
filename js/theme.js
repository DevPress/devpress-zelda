/*!
 * Script for initializing globally-used functions and libs.
 *
 * @since 1.0.0
 */
 (function($) {

 	var zelda = {

 		// Cache selectors
	 	cache: {
			$document: $(document),
			$window: $(window),
			$primarynavigation: $('.primary-navigation')
		},

		// Init functions
		init: function() {
			this.bindEvents();
		},

		// Bind Elements
		bindEvents: function() {
			var self = this;

			self.navigationInit();

			this.cache.$document.on( 'ready', function() {
				self.fitVidsInit();
				self.commentsInit();
			} );

			this.cache.$window.on( 'resize', self.debounce(
				function() {

					// Remove any inline styles that may have been added to menu
					self.cache.$menu.attr('style','');
					self.cache.$menu.find('.children,.sub-menu').each( function(){
		    			$(this).attr('style','');
					});

					self.cache.$menu.find('.dropdown-toggle').each( function(){
						$(this).removeClass('toggled');
					});

				}, 200 )
			);

		},


		/**
		 * Initialize the mobile menu functionality.
		 *
		 * @since 1.0.0
		 *
		 * @return void
		 */
		navigationInit: function() {

			var self = this;

			if ( ! this.cache.$primarynavigation ) {
				return;
			}

			this.cache.$menutoggle = this.cache.$primarynavigation.find( '.menu-toggle' ).eq(0);
			this.cache.$menu = this.cache.$primarynavigation.find( '.nav-menu' );

			// Add dropdown toggle to display child menu items
			$('.nav-menu > .page_item_has_children, .nav-menu > .menu-item-has-children').append( '<span class="dropdown-toggle" />');

			// When mobile menu is tapped/clicked
			this.cache.$menutoggle.fastClick( function() {
				if ( ! self.cache.$menu.hasClass('toggled') ) {
					self.cache.$menu.fadeToggle( '400', function() {
						self.cache.$menu.addClass('toggled');
					});
				} else {
					self.cache.$menu.fadeToggle( '400', function(){
						self.cache.$menu.removeClass('toggled');
					});
				}
			});

			// When mobile submenu is tapped/clicked
			$('.dropdown-toggle').fastClick( function() {
				var $submenu = $(this).parent().find('.children, .sub-menu'),
					$toggle = $(this);
				if ( ! $(this).hasClass('toggled') ) {
					$submenu.fadeToggle( '400', function() {
						$toggle.addClass('toggled');
					});
				} else {
					$submenu.fadeToggle( '400', function(){
						$toggle.removeClass('toggled');
					});
				}
			});

		},

		// Initialize FitVids
		fitVidsInit: function() {

			// Make sure lib is loaded.
			if (!$.fn.fitVids) {
				return;
			}

			// Run FitVids
			$('.hentry').fitVids();
		},

		// Comments
		commentsInit: function() {
			$('#reply-title').fastClick( function() {
				$('#commentform').fadeToggle();
			});
		},

		/**
		 * Debounce function.
		 *
		 * @since  1.0.0
		 * @link http://remysharp.com/2010/07/21/throttling-function-calls
		 *
		 * @return void
		 */
		debounce: function(fn, delay) {
			var timer = null;
			return function () {
				var context = this, args = arguments;
				clearTimeout(timer);
				timer = setTimeout(function () {
					fn.apply(context, args);
				}, delay);
			};
		}

 	};

 	zelda.init();

 })(jQuery);
