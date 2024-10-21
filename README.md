# Userdata plugin for MantisBT

- Version 2.30
- Copyright 2024 Cas Nuy

- Released under the [GPL v3 license](http://opensource.org/licenses/GPL-3.0).


## Description

This plugin allows to allocate one or more additional fields for each user.
In addition the sequence of the fields can be set and of each field one can define if it can be maintained by the user him/her self.
The data will be shown in the bug_view page in readonly mode (this is the data of the Reporter)

Maintenance is done via the user administration.
Upon deleting a user, all corresponding data is deleted also.

In case you want to show the data within the view_user_page ,
please add the following lines to view_user_page.php just before "layout_page_end();"
- event_signal( 'EVENT_USER_PAGE',  $f_user_id ); 

## Requirements

- MantisBT 2.0.0

## Installation

Copy the Userdata directory into the plugins folder of your installation.
After copying to your webserver :
- Start Mantis as administrator
- Select manage
- Select manage Plugins
- Select Install behind Userdata 2.30
- Once installed, click on the plugin-name for further configuration.

## Configuration

- userdata_show_inline		=	ON	// Should we show userdata inline when viewing an issue or not
- userdata_show_account		=	ON 	// Should we show userdata on the My Account page or not
- userdata_show_user		=	ON	// Should we show userdata on the View_user page or not
- userdata_show_empty		=	OFF	// Should we show userdata without content or not
- userdata_self_maintain	=	OFF 	// Should we allow users to maintain their data or not

## Import data option

You can import data for users from the config page.
Please the provided csv file in the docs directory.
Mke sure that the topline contains a general fieldname.
In case you defined 9 fields, topline consists of 10 columns with a title (order the values by the sequence provided in the config).
First column must contain the username.
Please set the correct column separator	, select your file and click on "import".
That is all.

## Support

File bug reports and submit questions on the
[GitHub issues tracker](http://github.com/mantisbt-plugins/Userdata/issues).

## Credits

Thanks to Damian Regad for reviewing and pointing out the areas for improvement in order to adhere fully to MantisBT standards.
Dutch translation, thanks to Hugo Vonk
