########################################################
# 	Mantis Bugtracker Add-On
# 	Userdata Version 2.20
#	2022 - 2024 plugin by Cas Nuy www.NUY.info
#	For Mantis 2.x only
########################################################

	This plugin allows to allocate one or more additional fields for each user.
	In addition the sequence of the fields can be set and of each field one can define if it can be maintained by the user him/her self.
	The data will be shown in the bug_view page in readonly mode (this is the data of the Reporter)

	Maintenance is done via the user administration.
	Upon deleting a user, all corresponding data is deleted also.

	In case you want to show the data within the view_user_page ,
	please add the following lines to view_user_page.php just before "layout_page_end();
	// Userdata-plugin
	event_signal( 'EVENT_USER_PAGE',  $f_user_id ); 
	// Userdata-plugin

********************************************************************************************
* Installation                                                                             *
********************************************************************************************
	Copy the Userdata directory into the plugins folder of your installation.
	After copying to your webserver :
	- Start Mantis as administrator
	- Select manage
	- Select manage Plugins
	- Select Install behind Userdata 2.05
	- Once installed, click on the plugin-name for further configuration.

********************************************************************************************
Configuration options                                                                      *
********************************************************************************************
	// Should we show userdata inline when viewing an issue
	userdata_show_inline	=	ON  

	// Should we show userdata on the My Account page
	userdata_show_account	=	ON  

	// Should we show userdata on the View_user page
	userdata_show_user		=	ON  

	// Should we show userdata without content
	userdata_show_empty		=	OFF  

	// Should we allow users to maintain their data
	userdata_self_maintain	=	OFF  
	
********************************************************************************************
License                                                                                    *
********************************************************************************************
	This plugin is distributed under the same conditions as Mantis itself.

********************************************************************************************
Mantis Issues                                                                   *
********************************************************************************************
	https://github.com/mantisbt-plugins/Userdata

********************************************************************************************
Greetings                                                                                  *
********************************************************************************************
	Cas Nuy 
	cas@nuy.info
	http://www.nuy.info/mantis2
