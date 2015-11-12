/*
 	Theme Name: AIR
	Description: Theme is designed and developed for Egyptian Parliament Watch.
	Version: 2.0
  Date created:
  Date update: 15th October 2015
	Text Domain: africaninternetrights.org
	Author: Kareem Atif
	Author URI: http://kareematif.me
	Email: Kareematif@gmail.com | Twitter: @kareematif
	License: GNU General Public License v2 or later
	License URI: http://www.gnu.org/licenses/gpl-2.0.html

 */
'use strict';
 (function($){
  $(document).on("scroll",function(){
    // Change menu size
    if($(document).scrollTop()>50 && $(window).width() >=940 ){
      $('header').removeClass('expand').addClass('normal');
    }else{
      $('header').removeClass('normal').addClass("expand");
    }
  }).ready(function(){
    if ($(window).width() >=940){
			// Hide Mobile Menu
			$('.menu').find('.menu-mob').removeClass('menu-mob');
		}
		else {
      $('header').removeAttr('class');
			// Show Mobile Menu
			$('.menu').find('.menu-row').removeClass('menu-row');
      $('footer').find('.v-center').removeClass('right left');
      $('.articles .header.v-center').removeClass('v-center');
		}
    // Menu Mobile
		function closeMenu(){
			$('.show-menu-m').removeClass('close-menu-m');
			$('.menu-mob').animate({'left' : '101%'},300).hide();
      $('html').removeClass('locked');

		}
		$('.menu-mob li a').click(closeMenu);
		$('.show-menu-m, .close-menu-m').click(function(){
			if (!$(this).hasClass('close-menu-m')){
				$(this).addClass('close-menu-m');
				$('.menu-mob').show().animate({'left' : '0'},300);
        $('html').addClass('locked');
		}else{
			closeMenu();
		}
		});
    // FRONT -------------------------------------------------------------------
    // List of Declaration articles
    var articles = $('.titles-items');
    articles.owlCarousel({
      autoplay:true,loop:true,items:1,animateIn:true,animateOut:true,autoplayHoverPause:true,
    });
    $('#prev').click(function(){
      articles.trigger('prev.owl.carousel');
    });
    $('#next').click(function(){
      articles.trigger('next.owl.carousel');
    });
    $('.articles h3, #key-principles h5').each(function(i){
      $(this).prepend('<span>' + ( i+1 ) + '. </span>');
    });
    /* Show/hide Articles content
    $('.articles h3').click(function(){
      $(this).parent().siblings('.content').toggle();
    });
    $('.articles .close').click(function(){
      $(this).parent().hide();
    });
    /*$('.titles-items .content').bookblock();*/
    // Endorse form
      /*var endorser = $('section.endorser'),  endorserHeight = endorser.height(), endorserAutoHeight = endorser.css('height' , 'auto').height();
      endorser.height(endorserHeight).animate({'height' : endorserAutoHeight },500).addClass('open');*/
    $('.show-form, .hide-form').click(function(){
      if (!$(this).hasClass('hide-form')){
        $('section.endorser').addClass('open');
        $(this).addClass('hide-form');
      } else {
        $(this).removeClass('hide-form');
        $('section.endorser').removeClass('open');
      }
    });
    $('.form input').focus(function(){
      $('section.endorser').addClass('open');
    });
    // Show Orgnization name when clicked
    var orgname = $('.org-name').parent().parent('.form-field');
    orgname.hide();
    $('.form input[type=radio]').change(function(){
      if(!$('.org input').is(':checked')){
        orgname.hide();
      }else{
        orgname.slideDown(500).show();}
    });
    // Add twitter widget to front page
    var frontTwt = $('.twitter-items .body');
    frontTwt.twittie({
      hashtag: 'AfricanInternetrights',
      template: '<div class="tweet-user">{{user_name}}</div><h6>{{tweet}}</h6><div class="date">{{date}}</div>',
      count: 3,
      loadingText: '<div class="load-tweet"><i class="fa fa-spin fa-circle-o-notch"></i> Loading Tweets</div>',
    });
    // Go to Endorse Form
    $('footer .button.endorse a').on('click', function(e){
        e.preventDefault();
        var endorseForm = $('#endorse-form');
        if ($('body').hasClass('home')){
          $('section.endorser').addClass('open');
          $('html, body').animate({scrollTop: $('section.endorser').offset().top}, 500);
        }else{
          $(endorseForm).show();
          $('body').addClass('blur').prepend('<div class="blur-radial"></div>');
        }
        function closeForm(){
          $(endorseForm).removeAttr('style');
          $('.blur-radial').remove();
          $('body').removeClass('blur');
        }
        $('#endorse-form .close').click(closeForm);
        $(document).keydown(function(e){
    			if (e.keyCode == 27) closeForm(e);
    		});
      });

    // FAQ ---------------------------------------------------------------------
    // FAQ & Contact form list with accordion
    $('#qs-items, #contact-form').accordion({
      header: '.item-title',
      icons: {'header': 'fa fa-angle-down', 'activeHeader': 'fa fa-angle-up'},
      active: false, collapsible:true, heightStyle:'content',
    });
    // ENDORSEMENT -------------------------------------------------------------
    // Filter List
    $('.filters select').change(function(){
      $(this).each(function(){
        var filter = $(this).val();
        if (filter == 'all') {
            $('#lse-items .item-wrap').show();
        } else {
          $('#lse-items .item-wrap').hide();
          $('#lse-items .item-wrap div.' + filter ).parent().show();
        }
      });
      return false;
    });
    // Add twitter to Main Footer section
    var endorseTwt = $('section.footer .twitter-items ul');
    endorseTwt.twittie({
      hashtag: 'AfricanInternetrights',
      template: '<li><div class="tweet-user">{{user_name}}</div><h6>{{tweet}}</h6><div class="date">{{date}}</div></li>',
      count: 3,
      loadingText: '<div class="load-tweet"><i class="fa fa-spin fa-circle-o-notch"></i> Loading Tweets</div>',
    });
    // UPDATES -----------------------------------------------------------------
    // Slider
    var newsSlider = $('.slider-items .body');
    newsSlider.owlCarousel({
      loop:true,items:1,autoplay:true,autoplayTimeout:10000,lazyLoad:true,center:true,
    });
    $('.controls #next').click(function(){
      newsSlider.trigger('next.owl.carousel');
    });
    $('.controls #prev').click(function(){
      newsSlider.trigger('prev.owl.carousel');
    });
    // Date Picker for search
    $( '.ui-datepicker-header a' ).wrapAll( '<div class="controls" />');
    $( "#from" ).datepicker({
      defaultDate: "0",
      numberOfMonths: 1,
      hideIfNoPrevNext: true,
      onClose: function( selectedDate ) {
        $( "#to" ).datepicker( "option", "minDate", selectedDate );
      }
    });
    $( "#to" ).datepicker({
      defaultDate: "+1w",
      numberOfMonths: 1,
      hideIfNoPrevNext: true,
      onClose: function( selectedDate ) {
        $( "#from" ).datepicker( "option", "maxDate", selectedDate );
      }
    });
    //  Updates page with Packery
    var updates = document.querySelector('#updates-items'),
        pckry     = new Packery( updates, {
          'itemSelector':'article','gutter':20,
    });
    /* Load More Updates
    var size_li = $('#updates-items article').size(),
        x=3;
    $('#updates-items article:lt('+x+')').css('display', 'inline-block');
    $('.content-more a').click(function (e) {
      e.preventDefault();
      x= (x+5 <= size_li) ? x+5 : size_li;
      $('#updates-items article:lt('+x+')').css('display', 'inline-block');
   });*/
    // ABOUT -------------------------------------------------------------------
    // Sub navigation to show content
    $('.menu .sub-nav a').click(function(e){
      e.preventDefault();
      var activeLink = $('.menu .sub-nav li.active a').attr('href');
        $('.menu .sub-nav li a').parent('li').removeClass('active');
        $(this).parent('li').addClass('active');
        $(activeLink).addClass('hidden-content');
      var targetContent = $(this).attr('href');
        $(targetContent).removeClass('hidden-content');
    });
    //Content flip

    // List of organizers
    var organizerLogos = $('.org-items ul');
    organizerLogos.owlCarousel({
      loop:true,items:3,margin:10,autoplay:true,autoplayTimeout:2000,autoWidth:true,lazyLoad:true
    });
    $('#prev').click(function(){
      organizerLogos.trigger('prev.owl.carousel');
    });
    $('#next').click(function(){
      organizerLogos.trigger('next.owl.carousel');
    });
    // DECLARATION -------------------------------------------------------------
    /* Add Like/Dislike
    $('ul.vote a').click(function(){
      var vote = $('ul.vote a'),
      post_id = vote.data('post-id');
      $.ajax({
        type: 'post',
        url: ajax_var.url,
        data: 'action=post-vote$nonce='+ajax_var.nonce+'&post_vote=$post_id='+post_id,
        success: function(count){
          if(count != 'already'){
            up.addClass('voted');
            up.siblings('.count').text(count);
          }
        }
      });
      return false;
    }); */
    // CAUTION -------------------------------------------------------------------
    $('a.show-content').click(function(e){
      e.preventDefault();
      var activeLink = $('a.show-content.active').attr('href');
        $('a.show-content').removeClass('active');
        $(this).addClass('active');
        $(activeLink).addClass('hidden-column');
      var targetContent = $(this).attr('href');
        $(targetContent).removeClass('hidden-column');
    });

  });
})(jQuery);
