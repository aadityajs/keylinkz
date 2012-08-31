
var $aMailOldHistory = {};
var $aNotificationOldHistory = {};
var $bNoCloseNotify = false;
var bCloseShareHolder = true;

$Behavior.globalThemeInit = function()
{	
	/**
	* ###############################
	* Global functions
	* ###############################
	*/		
	$('#holder_notify ul li').click(function()
	{
		$bNoCloseNotify = true;			
	});	
	
	$('.feed_share_on_item a').click(function()
	{
		bCloseShareHolder = false;		
	});
	
	// body clicks
	$((getParam('bJsIsMobile') ? '#content' : 'body')).click(function()
	{
		$('.action_drop_holder').hide();
		$('.header_bar_drop').removeClass('is_clicked');
		
		if (bCloseShareHolder){
			$('.feed_share_on_holder').hide();
		}		
		
		$('.item_bar_action').parent().find('ul:first').hide();
		$('.item_bar_action').removeClass('item_bar_action_clicked');
		$('.row_edit_bar_holder').hide();
		$('.row_edit_bar_action').removeClass('row_edit_bar_action_clicked');
		
		$('#header_menu_holder ul li ul').removeClass('active');
		$('#header_menu_holder ul li a').removeClass('active');		
		
		if (!$bNoCloseNotify)
		{
			$('#holder_notify ul li').removeClass('is_active');
			$('#holder_notify ul li').find('.holder_notify_drop').hide();		
		}
		
		$bNoCloseNotify = false;
		bCloseShareHolder = true;
		
		$('#section_menu_drop').hide();
		
		$('.welcome_info_holder').hide();
		$('.welcome_quick_link ul li a').removeClass('is_active');
		
		$('.moderation_drop').removeClass('is_clicked');
		$('.moderation_holder ul').hide();
	});		
	
	$('#activity_feed_share_this_one_link').click(function(){
		$('.feed_share_on_holder').toggle();
		return false;
	});
	
	$('#header_menu_holder li a.has_drop_down').click(function()
	{		
		$('#holder_notify ul li').removeClass('is_active');
		$('#holder_notify ul li').find('.holder_notify_drop').hide();		
		
		if ($(this).hasClass('active'))
		{
			$(this).parent().find('ul').removeClass('active'); 
			$(this).removeClass('active');			
		}
		else
		{
			$('#header_menu_holder').find('ul').removeClass('active'); 
			$('#header_menu_holder').find('ul li a').removeClass('active');
			
			$(this).parent().find('ul').addClass('active'); 
			$(this).addClass('active'); 
		}
		
		return false;
	});
	
	$('#header_menu_holder ul li ul li a').click(function()
	{
		$('#header_menu_holder ul li ul').removeClass('active');
		$('#header_menu_holder ul li a').removeClass('active');	
	});
	
	$('#holder_notify ul li a').click(function()
	{		
		var $oParent = $(this).parent();
		var $oChild = $oParent.find('.holder_notify_drop');
		
		$('#header_menu_holder ul li ul').removeClass('active');
		$('#header_menu_holder ul li a').removeClass('active');		
		
		if ($oParent.hasClass('is_active'))
		{
			$oParent.removeClass('is_active');
			$oChild.hide();
		}
		else
		{
			$('#holder_notify ul li').removeClass('is_active');
			$('#holder_notify ul li').find('.holder_notify_drop').hide();
			
			$oParent.addClass('is_active');
			$oChild.show();
			/*
			if ($oChild.find('.holder_notify_drop_data').find('.holder_notify_drop_loader').length > 0)
			{
			*/
				$Core.ajax($(this).attr('rel'), 
				{
					params: 
					{					
						'no_page_update': true	
					},
					success: function($sData)			
					{
						$oChild.find('.holder_notify_drop_data').html($sData);
					}
				});
			/*
			}
			else
			{
				if ($(this).attr('rel') == 'mail.getLatest')
				{
					if (isset($aMailOldHistory))
					{
						for ($iKey in $aMailOldHistory)
						{
							$('#js_mail_read_' + $iKey).find('a:first').removeClass('is_new');
						}
					}
				}
				else if ($(this).attr('rel') == 'notification.getAll')
				{
					if (isset($aNotificationOldHistory))
					{
						for ($iKey in $aNotificationOldHistory)
						{
							$('#js_notification_read_' + $iKey).find('a:first').removeClass('is_new');
						}
					}					
				}
			}
			*/
		}
		
		return false;
	});

	// Hide the left sidebar
	if (empty($('#left').html()))
	{
		$('#main_content').addClass('no_sidebar');
		if (empty($('#right').html()))
		{
			$('#content').removeClass('content_float');
		}
		else
		{
			$('#content').addClass('content4');
			$('#content').removeClass('content2');
			$('#content').removeClass('content3');
		}
		$('#left').remove();
	}	
	
	// Hide the right sidebar
	// if (empty($('#right').html()) || empty(trim(strip_tags($('#right').html()))))
	if (empty($('#right').html()))
	{
		$('#content').removeClass('content3');		
		
		$('#right').remove();
	}			
	
	$('#section_menu_more').click(function()
	{
		$('#section_menu_drop').toggle();
		
		return false;
	});	
	
	/**
	* ###############################
	* Global site search
	* ###############################
	*/		
   $('#header_sub_menu_search_input').before('<div id="header_sub_menu_search_input_value" style="display:none;">' + $('#header_sub_menu_search_input').val() + '</div>');

	$('#header_sub_menu_search_input').focus(function(){		
		$(this).parent().find('#header_sub_menu_search_input').addClass('focus');
		if ($(this).val() == $('#header_sub_menu_search_input_value').html()){
			$(this).val('');
			if ((isset(oModules['friend']) ))
			{
				$Core.searchFriendsInput.init({
				'id': 'header_sub_menu_search',
				'max_search': (getParam('bJsIsMobile') ? 5 : 10),
				'no_build': true,
				'global_search': true,
				'allow_custom': true
				});
				$Core.searchFriendsInput.buildFriends(this);			
			}			
		}
	});	
	
	$('#header_sub_menu_search_input').blur(function(){
		$(this).parent().find('#header_sub_menu_search_input').removeClass('focus');
	});		
	if ((isset(oModules['friend']) ))
	{
		$('#header_sub_menu_search_input').keyup(function(){
			$Core.searchFriendsInput.getFriends(this);
		});
	}	
	/**
	* ###############################
	* Global section search tool
	* ###############################
	*/	
	$('.header_bar_search input').focus(function()
	{
		$(this).parent().find('.header_bar_search_input').addClass('focus');
		$(this).addClass('input_focus');
		
		if ($('.header_bar_search_default').html() == $(this).val())
		{
			$(this).val('');			
		}
	});
	
	$('.header_bar_search input').blur(function()
	{
		$(this).parent().find('.header_bar_search_input').removeClass('focus');
		
		if (empty($(this).val()))
		{
			$(this).val($('.header_bar_search_default').html());
			$(this).removeClass('input_focus');
		}
	});	
	
	$('.header_bar_drop').click(function()
	{
		$('.header_bar_drop').each(function()
		{
			if (!$(this).hasClass('is_clicked'))
			{
				$(this).parents('.header_bar_drop_holder').find('.action_drop_holder').hide();				
			}
		});
		
		if ($(this).hasClass('is_clicked'))
		{
			$(this).parents('.header_bar_drop_holder').find('.action_drop_holder').hide();	
			$(this).removeClass('is_clicked');
		}
		else
		{
			$(this).parents('.header_bar_drop_holder').find('.action_drop_holder').show();
			$('.header_bar_drop').removeClass('is_clicked');
			$(this).addClass('is_clicked');
		}
		
		return false;	
	});		
	
	$('.item_bar_action').click(function()
	{
		$(this).parent().find('ul:first').toggle();
		$(this).blur();
		if ($(this).hasClass('item_bar_action_clicked'))
		{
			$(this).removeClass('item_bar_action_clicked');
		}
		else
		{
			$(this).addClass('item_bar_action_clicked');
		}		
		
		return false;
	});
	
	$('.row_edit_bar_action').click(function()
	{		
		$(this).parents('.row_edit_bar_parent:first').find('.row_edit_bar_holder:first').toggle();
		$(this).blur();
		if ($(this).hasClass('row_edit_bar_action_clicked'))
		{
			$(this).removeClass('row_edit_bar_action_clicked');
		}
		else
		{
			$(this).addClass('row_edit_bar_action_clicked');
		}
		
		return false;
	});	
	
	$('#js_comment_form_holder #text').keydown(function(){$Core.resizeTextarea($(this));});
	$('#js_compose_new_message #message').keydown(function(){$Core.resizeTextarea($(this));});
	
	$('.welcome_quick_link ul li a').click(function(e)
	{
		if ($(this).hasClass('is_active'))
		{
			$(this).parent().find('.welcome_info_holder:first').hide();
			$(this).removeClass('is_active');			
			
			return false;
		}

		if (oCore['core.site_wide_ajax_browsing'] == false)
		{
			if (this.href.indexOf('#') < 0)
			{
				window.location = this.href;
				return false;
			}
			else
			{				
			}
		}
		else
		{
			if (this.href.indexOf('#') > (-1))
			{
			}
			else
			{
				return false;
			}
		}
		var aParts = explode('#', this.href);
		var sTempCacheId = aParts[1].replace('.', '_');
		
		$('.welcome_info_holder').hide();
		$('.welcome_quick_link ul li a').removeClass('is_active');
				
		$(this).addClass('is_active');
		/*
		if ($(this).hasClass('is_cached'))
		{
			$(this).parent().find('.welcome_info_holder:first').show();
			
			return false;
		}
		*/
		$(this).addClass('is_cached');
		
		var sRel = $(this).attr('rel');
		sCustomClass= '';
		if (!empty(sRel)){
			sCustomClass = ' welcome_info_holder_custom';
		}
		
		$(this).parent().append('<div class="welcome_info_holder' + sCustomClass + '"><div class="welcome_info" id="' + sTempCacheId + '"></div></div>');
		
		$.ajaxCall(aParts[1], 'temp_id=' + sTempCacheId, 'GET');
		
		return false;
	});
	
	$('.profile_image').mouseover(function()
	{
		$(this).find('.p_4:first').show();
	});
	
	$('.profile_image').mouseout(function()
	{
		$(this).find('.p_4:first').hide();
	});		
}