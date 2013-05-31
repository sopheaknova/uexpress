/* SET LOCALIZED VARIABLES */
var columns_title = objectL10n.columns_title;
var columns_inner_title = objectL10n.columns_inner_title;
var elements_title = objectL10n.elements_title;
var list_title = objectL10n.list_title;
var onefourth_title = objectL10n.onefourth_title;
var onefourth_last_title = objectL10n.onefourth_last_title;
var onethird_title = objectL10n.onethird_title;
var onethird_last_title = objectL10n.onethird_last_title;
var onehalf_title = objectL10n.onehalf_title;
var onehalf_last_title = objectL10n.onehalf_last_title;
var twothird_title = objectL10n.twothird_title;
var twothird_last_title = objectL10n.twothird_last_title
var threefourth_title = objectL10n.threefourth_title;
var onefifth_title = objectL10n.onefifth_title;
var onefifth_last_title = objectL10n.onefifth_last_title;
var onefourth_inner_title = objectL10n.onefourth_inner_title;
var onefourth_inner_last_title = objectL10n.onefourth_inner_last_title;
var onethird_inner_title = objectL10n.onethird_inner_title;
var onethird_inner_last_title = objectL10n.onethird_inner_last_title;
var onehalf_inner_title = objectL10n.onehalf_inner_title;
var onehalf_inner_last_title = objectL10n.onehalf_inner_last_title;
var twothird_inner_title = objectL10n.twothird_inner_title;
var threefourth_inner_title = objectL10n.threefourth_inner_title;
var dropcap_title = objectL10n.dropcap_title;
var pullquote_left_title = objectL10n.pullquote_left_title ;
var pullquote_right_title  = objectL10n.pullquote_right_title ;
var divider_title  = objectL10n.divider_title ;
var spacer_title  = objectL10n.spacer_title ;
var tabs_title  = objectL10n.tabs_title;
var toggle_title  = objectL10n.toggle_title;
var image_title  = objectL10n.image_title ;
var testimonial_title  = objectL10n.testimonial_title ;
var gmap_title  = objectL10n.gmap_title ;
var youtube_title  = objectL10n.youtube_title ;
var vimeo_title  = objectL10n.vimeo_title ;
var button_title  = objectL10n.button_title ;
var bigbutton_title  = objectL10n.bigbutton_title ;
var bulletlist_title  = objectL10n.bulletlist_title ;
var starlist_title  = objectL10n.starlist_title ;
var arrowlist_title  = objectL10n.arrowlist_title ;
var itemlist_title  = objectL10n.itemlist_title ;
var checklist_title  = objectL10n.checklist_title ;
var infobox_title  = objectL10n.infobox_title ;
var successbox_title  = objectL10n.successbox_title ;
var warningbox_title  = objectL10n.warningbox_title ;
var errorbox_title  = objectL10n.errorbox_title;
var blog_title  = objectL10n.blog_title;

// Creates a new plugin class and a custom listbox
(function() {
	tinymce.create('tinymce.plugins.shortcodes', {
    createControl : function(n, cm) {
			if(n=='columns'){
				
                var clb = cm.createListBox('columns', {
                     //title : columns_title,
                     title : columns_title,
                     onselect : function(v) { //Option value as parameter
					 
						         tinyMCE.execCommand('mceInsertContent',false,v); 
						                                       
                     }
                });
 
                // Add column values to the list box
                clb.add(onehalf_title, '[col_12][/col_12]');
                clb.add(onehalf_last_title, '[col_12_last][/col_12_last]');
                clb.add(onethird_title, '[col_13][/col_13]');
                clb.add(onethird_last_title, '[col_13_last][/col_13_last]');
                clb.add(onefourth_title, '[col_14][/col_14]');
                clb.add(onefourth_last_title, '[col_14_last][/col_14_last]');
                clb.add(onefifth_title, '[col_15][/col_15]');
                clb.add(onefifth_last_title, '[col_15_last][/col_15_last]');
                clb.add(twothird_title, '[col_23][/col_23]');
				clb.add(twothird_last_title, '[col_23_last][/col_23_last]');
                clb.add(threefourth_title, '[col_34][/col_34]');

                // Return the new list box instance
                return clb;
             }
 
 			/*if(n=='inner_columns'){
				
                var clb = cm.createListBox('inner_columns', {
                     //title : columns_title,
                     title : columns_inner_title,
                     onselect : function(v) { //Option value as parameter
					 
						         tinyMCE.execCommand('mceInsertContent',false,v); 
						                                       
                     }
                });
 
                // Add column values to the list box
                clb.add(onehalf_inner_title, '[col_12_inner][/col_12_inner]');
                clb.add(onehalf_inner_last_title, '[col_12_inner_last][/col_12_inner_last]');
                clb.add(onethird_inner_title, '[col_13_inner][/col_13_inner]');
                clb.add(onethird_inner_last_title, '[col_13_inner_last][/col_13_inner_last]');
                clb.add(onefourth_inner_title, '[col_14_inner][/col_14_inner]');
                clb.add(onefourth_inner_last_title, '[col_14_inner_last][/col_14_inner_last]')
                clb.add(twothird_inner_title, '[col_23_inner][/col_23_inner]');
                clb.add(threefourth_inner_title, '[col_34_inner][/col_34_inner]');

                // Return the new list box instance
                return clb;
             }*/
 
			if(n=='elements'){
				
                var mlb = cm.createListBox('elements', {
                     //title : elements_title,
                     title : elements_title,
                     onselect : function(v) { //Option value as parameter
					 
						         tinyMCE.execCommand('mceInsertContent',false,v);
						                                       
                     }
                });
 
                // Add column values to the list box
                mlb.add('Dropcap', '[dropcap][/dropcap]');
                mlb.add('Pullquote Left', '[pullquote_left][/pullquote_left]');
                mlb.add('Pullquote Right', '[pullquote_right][/pullquote_right]');
                mlb.add('Tabs', '[tabs]'+"\r\n"+'[tab title="your title here"]your content here[/tab]'+"\r\n"+'[/tabs]');
                mlb.add('Toggle', '[toggle title="your title here"]your content here[/toggle]');
                mlb.add('Image', '[image source="" align=""]');
                /*mlb.add('Info Box', '[info][/info]');
                mlb.add('Success Box', '[success][/success]');
                mlb.add('Warning Box', '[warning][/warning]');
                mlb.add('Error Box', '[error][/error]');
                mlb.add('Button', '[button link=""][/button]');*/
                mlb.add('Google Map', '[gmap width="" height="" latitude="" longitude="" zoom="" html="" popup="" marker="yes"]');
                mlb.add('Youtube Video', '[youtube_video id= width="" height=""]');
                mlb.add('Vimeo Video', '[vimeo_video id= width="" height=""]');        
                mlb.add('Page List', '[pagelist parent_page="" num=6 orderby="date" style="3col" readmore_text="VIEW DETAIL"]');
               /* mlb.add('Post List', '[postlist category="" num=4 orderby="date" style="2col" readmore_text="VIEW DETAIL"]');   ;*/ 

                // Return the new list box instance
                return mlb;
             }

			 if(n=='list'){
				
                var mlb = cm.createListBox('list', {
                     //title : elements_title,
                     title : list_title,
                     onselect : function(v) { //Option value as parameter
					 
						         tinyMCE.execCommand('mceInsertContent',false,v);
						                                       
                     }
                });
 
                // Add column values to the list box
                mlb.add(bulletlist_title, '[bulletlist][/bulletlist]');
                mlb.add(starlist_title, '[starlist][/starlist]');
                mlb.add(checklist_title, '[checklist][/checklist]');
                mlb.add(arrowlist_title, '[arrowlist][/arrowlist]');
                mlb.add(itemlist_title, '[itemlist][/itemlist]'); 

                // Return the new list box instance
                return mlb;
             }
       
             
      return null;
		}
	});
 
	// Register plugin
	tinymce.PluginManager.add('shortcodes', tinymce.plugins.shortcodes);
	
})();
