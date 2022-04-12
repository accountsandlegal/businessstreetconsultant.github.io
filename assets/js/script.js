;(function ($, window, document, undefined) {
	'use strict';

	if (typeof fitVids === 'function') {
		$('body').fitVids({ignore: '.vimeo-video, .youtube-simple-wrap iframe, .iframe-video.for-btn iframe, .post-media.video-container iframe'});
	}

	/*=================================*/
	/* PAGE CALCULATIONS */
	/*=================================*/
	/**
	 *
	 * PageCalculations function
	 * @since 1.0.0
	 * @version 1.0.0
	 * @var winW
	 * @var winH
	 * @var winS
	 * @var pageCalculations
	 * @var onEvent
	 **/
	if (typeof pageCalculations !== 'function') {

		var winW, winH, winS, pageCalculations, onEvent = window.addEventListener;

		pageCalculations = function (func) {

			winW = window.innerWidth;
			winH = window.innerHeight;
			winS = document.body.scrollTop;

			if (!func) return;

			onEvent('load', func, true); // window onload
			onEvent('resize', func, true); // window resize
			onEvent("orientationchange", func, false); // window orientationchange

		}; // end pageCalculations

		pageCalculations(function () {
			pageCalculations();
		});
	}


	$(window).on('load', function () {
		if ($('.famulus-preloader').length) {
			$('.famulus-preloader').fadeOut(400);
		}

		wpc_add_img_bg('.js-bg');
	});

	function calcPaddingMainWrapper() {

		if ($('.famulus-footer').length) {
			var footer = $('.famulus-footer');
			var paddValue = footer.outerHeight();

			footer.bind('heightChange', function () {
				$('body').css('padding-bottom', paddValue);

			});

			footer.trigger('heightChange');
		}
	}

	function wpc_add_img_bg(img_sel, parent_sel) {
		if (!img_sel) {
			return false;
		}

		var $parent, $imgDataHidden, _this;
		$(img_sel).each(function () {
			_this = $(this);
			$imgDataHidden = _this.data('s-hidden');
			$parent = _this.closest(parent_sel);
			$parent = $parent.length ? $parent : _this.parent();
			$parent.css('background-image', 'url(' + this.src + ')').addClass('s-back-switch');
			if ($imgDataHidden) {
				_this.css('visibility', 'hidden');
				_this.show();
			} else {
				_this.hide();
			}
		});
	}

	function adminBarPositionFix() {
		if ($('#wpadminbar').length) {
			$('#wpadminbar').css('position', 'fixed');
		}
	}

	function errorPageHeight() {
		if ($('.famulus-error--wrap').length) {
			var footerH = $('.famulus-footer').length ? $('.famulus-footer').outerHeight() : 0,
				headerH = $('.famulus-header--wrap').length ? $('.famulus-header--wrap').outerHeight() : 0,
				errorH = $(window).height() - footerH - headerH;

			$('.famulus-error--wrap').outerHeight(errorH);
		}
	}

	function singleBlogTitle() {
		if ($('.famulus-blog--single__title').length && $('.aheto-header').length ) {
			var element = $('.famulus-blog--single__title');
			var str = element.text(),
				array = str.split(" "),
				lastword = '';
			for (var $i = Math.round((array.length) / 2); $i <= array.length - 1; $i++) {
				lastword += ' ' + array[$i];
			}
			var fix = str.replace(lastword, "<span>" + lastword + "</span>");
			element.html(fix);
		}
	}
	function blogIsotope() {
		if ($('.famulus-blog--isotope').length) {
			$('.famulus-blog--isotope').each(function () {
				var self = $(this);
				self.isotope({
					itemSelector: '.famulus-blog--post',
					layoutMode: 'masonry',
					masonry: {
						columnWidth: '.famulus-blog--post'
					}
				});
			});
		}
	}

	$(window).on('load resize orientationchange', function () {
		blogIsotope();
		calcPaddingMainWrapper();
		adminBarPositionFix();
		errorPageHeight();
		singleBlogTitle();
		accesibilityMenu();
	});


	function accesibilityMenu() {
		$('.menu-item-has-children a').focus( function () {
			$(this).siblings('.sub-menu').addClass('focused');
		}).blur(function(){
			$(this).siblings('.sub-menu').removeClass('focused');
		});
		// Sub Menu
		$('.sub-menu a').focus( function () {
			$(this).parents('.sub-menu').addClass('focused');
		}).blur(function(){
			$(this).parents('.sub-menu').removeClass('focused');
		});
	}
})(jQuery, window, document);