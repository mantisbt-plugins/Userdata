<?php
class UserdataPlugin extends MantisPlugin {

	function register() {
		$this->name			= plugin_lang_get( 'title' );
		$this->description	= plugin_lang_get( 'description' );
		$this->version		= '2.06';
		$this->requires		= array( 'MantisCore'       => '2.0.0 ', );
		$this->author		= 'Cas Nuy';
		$this->contact		= 'Cas-at-nuy.info';
		$this->url			= 'http://www.nuy.info';
		$this->page			= 'config';
	}


 	function init() {
		// Delete data when user is deleted, so we need to add event to the system
		// See the install.txt for instructions which files(2) to adjust
		event_declare('EVENT_ACCOUNT_DELETED');
		// view data for user_page
		// See the install.txt for instructions which file to adjust
		event_declare('EVENT_USER_PAGE');
		// define the hooks
		plugin_event_hook( 'EVENT_MENU_ACCOUNT', 'account_menu' );
		plugin_event_hook( 'EVENT_USER_PAGE', 'show_data2' );
	 	plugin_event_hook( 'EVENT_VIEW_BUG_EXTRA', 'show_data' );
		plugin_event_hook( 'EVENT_MANAGE_USER_PAGE', 'edit_data' );
		plugin_event_hook( 'EVENT_ACCOUNT_DELETED', 'remove_data' );
	}

	function config() {
		return array( 'userdata_show_inline'	=> ON, 'userdata_show_empty'	=> OFF, 'userdata_self_maintain'	=> ON, 'userdata_show_account'	=> ON, 'userdata_show_user'	=> ON,);
	}

	function account_menu(){
		if( ON == plugin_config_get( 'userdata_show_account' ) ) {
			return array( '<a href="' . plugin_page( 'editdata2' ) . '">' . plugin_lang_get( 'custom' ) .  '</a>', );	
		}
	}
 	function show_data($p_event,$t_issue ) {
		if( ON == plugin_config_get( 'userdata_show_inline' ) ) {
			//get value for the reporter
			$query = "SELECT reporter_id FROM {bug} where id=$t_issue";
			$result = db_query($query);
			$row = db_fetch_array($result);
			$t_user_id = $row['reporter_id'];
		include 'plugins/Userdata/pages/showdata.php';
		}
	}
	
	function show_data2($p_event,$t_user_id ) {
		if( ON == plugin_config_get( 'userdata_show_user' ) ) {
			include 'plugins/Userdata/pages/showdata.php';
		}
	}

 	function edit_data( $p_event,$p_user_data ) {
		$t_user_id = $p_user_data;
 		include 'plugins/Userdata/pages/editdata.php';
	}

	function remove_data( $p_event,$f_user_id ) {
 		$udata_table	= plugin_table('data');
		$sql = "delete from $udata_table where user_id=$f_user_id";
		$result		= db_query($sql);
	}

	function schema() {
		# version 1.00
		$schema[] = array( 'CreateTableSQL', array( plugin_table( 'fields' ), "
						userdata_id			I       NOTNULL UNSIGNED AUTOINCREMENT PRIMARY,
						userdata_seq		I       DEFAULT NULL,
						userdata_name		C (50)  DEFAULT NULL
						" ) );

		$schema[] =	array( 'CreateTableSQL', array( plugin_table( 'data' ), "
						data_id				I       NOTNULL UNSIGNED AUTOINCREMENT PRIMARY,
						user_id				I       DEFAULT NULL,
						userdata_id			I       DEFAULT NULL,
						userdata_value		C(250)	DEFAULT NULL
						" ) );

					

		# version 1.01
        $schema[] = array('AddColumnSQL', array(plugin_table('fields'), "userdata_public I  default NULL AFTER userdata_name \" '' \""));
	
		return $schema;
	}

}
