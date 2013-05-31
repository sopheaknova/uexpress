
/***************************************************
	     ADDITIONAL CODE FOR CLIENT CAROUSEL
***************************************************/

function mycarousel_initCallback(carousel)
{
    // Disable autoscrolling if the user clicks the prev or next button.
    carousel.buttonNext.bind('click', function() {
        carousel.startAuto(0);
    });

    carousel.buttonPrev.bind('click', function() {
        carousel.startAuto(0);
    });

    // Pause autoscrolling if the user moves with the cursor over the clip.
    carousel.clip.hover(function() {
        carousel.stopAuto();
    }, function() {
        carousel.startAuto();
    });
};

jQuery(document).ready(function($){
	jQuery('#client-carousel').jcarousel({
        auto: 5,
        wrap: 'last',
        initCallback: mycarousel_initCallback
    });
});


/***************************************************
	     ADDITIONAL CODE FOR FONT EMBEDED
***************************************************/
jQuery(document).ready(function($){	
	Cufon.replace('.jqueryslidemenu>ul>li>a', { fontFamily: 'Vegur Regular', hover: true });
});

/***************************************************
	     ADDITIONAL CODE FOR CONTACT FORM
***************************************************/
jQuery(document).ready(function($){	

/* Contact Form Processing */  
  $('#buttonsend').click( function() {
	
		var name    = $('#contactname').val();
		var subject = $('#contactsubject').val();
		var email   = $('#contactemail').val();
		var message = $('#contactmessage').val();
		var siteurl = $('#siteurl').val();
		var sendto = $('#sendto').val();		
		
		$('.loading').fadeIn('fast');
		
		if (name != "" && subject != "" && email != "" && message != "")
			{

				$.ajax(
					{
						url: siteurl+'/sendemail.php',
						type: 'POST',
						data: "name=" + name + "&subject=" + subject + "&email=" + email + "&message=" + message+ "&sendto=" + sendto,
						success: function(result) 
						{
							$('.loading').fadeOut('fast');
							if(result == "email_error") {
								$('#contactemail').next('.require').text(' !');
							} else {
								$('#contactname, #contactsubject, #contactemail, #contactmessage').val("");
								$('.success-message').show().fadeOut(8000, function(){ $(this).remove(); });	
							}
						}
					}
				);
				return false;
				
			} 
		else 
			{
				$('.loading').fadeOut('fast');
				if(name == "") $('#contactname').next('.require').text(' !');
				if(subject == "") $('#contactsubject').next('.require').text(' !');
				if(email == "" ) $('#contactemail').next('.require').text(' !');
				if(message == "") $('#contactmessage').next('.require').text(' !');
				return false;
			}
	});
	
	$('#contactname, #contactsubject, #contactemail,#contactmessage').focus(function(){
		$(this).next('.require').text(' *');
	});
	
/* Whitepage Form Processing */	
	$('#buttonsendwhitepage').click( function() {
		var name    = $('#whitepagename').val();
		var subject = $('#whitepagesubject').val();
		var email   = $('#whitepageemail').val();
		var siteurl = $('#siteurl').val();
		var sendto = $('#sendto').val();
		
		var subscribesubject = new Array();
		$("input[name='subscribesubject']:checked").each(function(i) {
				subscribesubject.push($(this).val());
		});
		
		$('.loading').fadeIn('fast');
		
		if (name != "" && email != "" && subject != "")
			{				
				$.ajax(
					{
						url: siteurl+'/sendmail-whitepage.php',
						type: 'POST',
						data: "name=" + name + "&subject" + subject + "&email=" + email + "&sendto=" + sendto + "&subscribesubject=" + subscribesubject,
						success: function(result) 
						{
							$('.loading').fadeOut('fast');
							if(result == "email_error") {
								$('#whitepageemail').next('.require').text(' !');
							} else {
								$('#whitepagename, #whitepageemail').val("");
								$('#whitepageform').find(':checked').each(function() {
								   $(this).removeAttr('checked');
								});
								$('.success-message').show().fadeOut(8000, function(){ $(this).remove(); });	
							}
						}
					}
				);
					
				return false;
				
			}
			
		else 
			{
				$('.loading').fadeOut('fast');
				if(name == "") $('#whitepagename').next('.require').text(' !');
				if(email == "" ) $('#whitepageemail').next('.require').text(' !');
				return false;
			}	
	});
	
	$('#whitepagename, #whitepageemail').focus(function(){
		$(this).next('.require').text(' *');
	});
	
	
});		

/***************************************************
	     ADDITIONAL CODE FOR LAYOUT
***************************************************/
jQuery(document).ready(function($){	
	
	// Add over to show background on description box
	$('.mainbox').hover(
      function () {
        $(this).addClass("round-box-gray");
      }, 
      function () {
        $(this).removeClass("round-box-gray");
      }
    );
	
	// Add Home icon on main menu
	$('#myslidemenu>ul>li:first-child>a').addClass("homeicon");
	
	// Remove dush line in last li of footer menu
	$('.footer-menu ul li:last-child').css("background", "none");
	
	// Run Toggle shortcode
	$(".toggle_title").toggle(
		function(){
			$(this).addClass('toggle_active');
			$(this).siblings('.toggle_content').slideDown("fast");
		},
		function(){
			$(this).removeClass('toggle_active');
			$(this).siblings('.toggle_content').slideUp("fast");
		}
	);
	
	// Run Tab shortcode
	$(".tabs_container").each(function(){
		$("ul.tabs",this).tabs("div.panes > div", {tabs:'li',effect: 'fade', fadeOutSpeed: -400});
	});
	$(".mini_tabs_container").each(function(){
		$("ul.mini_tabs",this).tabs("div.panes > div", {tabs:'li',effect: 'fade', fadeOutSpeed: -400});
	});
	$.tools.tabs.addEffect("slide", function(i, done) {
		this.getPanes().slideUp();
		this.getPanes().eq(i).slideDown(function()  {
			done.call();
		});
	});
	
	// Find tag IMG doens't have class
	$('.single_article_content img:not([class])').wrap("<div class='custom-boximg round-box'></div>");
	$('img.alignleft').css({ "margin-top":"0" }).removeClass('alignleft').wrap("<div class='custom-boximg alignleft round-box'></div>").parent().css({ "float":"left", "margin-right":"12px" });
	$('img.alignright').css({ "margin-top":"0" }).removeClass('alignright').wrap("<div class='custom-boximg alignright round-box'></div>").parent().css({ "float":"right", "margin-left":"12px" });
	$('img.aligncenter').css({ "margin-top":"0" }).removeClass('aligncenter').wrap("<div class='custom-boximg aligncenter round-box'></div>").parent().css({ "margin-left":"auto", "margin-right":"auto" });
	$('img.alignnone').css({ "margin-top":"0" }).removeClass('alignnone').wrap("<div class='custom-boximg alignnone round-box'></div>");
	
	// Add style and prettyPhoto on last cols of footer sidebar
	$('#footer .footerbox:last img').wrap("<div class='imgbox'></div>").attr("rel", "prettyPhoto");
});	





