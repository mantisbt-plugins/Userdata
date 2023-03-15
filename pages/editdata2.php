<?php
require_once( 'core.php' );
require_api( 'api_token_api.php' );
require_api( 'authentication_api.php' );
require_api( 'current_user_api.php' );
require_api( 'database_api.php' );
require_api( 'html_api.php' );

auth_ensure_user_authenticated();
auth_reauthenticate();

current_user_ensure_unprotected();

layout_page_header( lang_get( 'plugin_Userdata_custom' ) );
layout_page_begin();
print_account_menu( 'editdata2.php' );
$t_user_id = auth_get_current_user_id();
?>

<div class="col-md-12 col-xs-12">
	<div class="space-10"></div>

<div id="user-custom-fields" class="form-container">
	<form action="<?php echo plugin_page( 'add_data2' ) ?>"  method="post" >
		<input type="hidden" name="user_id" value="<?php echo $t_user_id  ?>">

<tr><div class="widget-box widget-color-blue2">
<div class="widget-header widget-header-small">
	<h4 class="widget-title lighter">
		<i class="ace-icon fa fa-text-width"></i>
		<?php echo lang_get( 'plugin_Userdata_title' ) . ': ' . lang_get( 'plugin_Userdata_userdata' ) ?>
	</h4>
</div>
<div class="widget-body">
<div class="widget-main no-padding">
<div class="table-responsive"> 
<table class="table table-bordered table-condensed table-striped"> 
<td colspan=2 class="row-category"><div align="left"><a name="userdata_record"></a>
</div>
</td>
</tr>
<tr class="row-category">
<td><div><b><?php echo plugin_lang_get( 'fieldname' ); ?></b></div></td>
<td><div><b><?php echo plugin_lang_get( 'value' ); ?></b></div</td>
</tr>

<?PHP
# Pull all definition entries 
$query = "SELECT * FROM {plugin_Userdata_fields} ORDER BY userdata_seq";
$result = db_query($query);
while ($row = db_fetch_array($result)) {
	$name	= $row['userdata_name'];
	$id		= $row['userdata_id' ];
	$pub		= $row['userdata_public' ];
	$fieldname	= 'Name';
	$fieldname	.= $id;
	// do we have a values for this field
	$query2 = "SELECT userdata_value FROM {plugin_Userdata_data} where userdata_id=$id and user_id=$t_user_id";
	$result2 = db_query($query2);
	if ( db_num_rows( $result2 ) > 0 ){
		$row2 = db_fetch_array($result2);
		$value = $row2['userdata_value'];
	} else {
		$value ="";
	}
	?>
	<tr>
	<td><div align="left">
	<?PHP echo $name ; ?>
	</div></td>
	<td><div>
	<?php 
	if  ( OFF == plugin_config_get( 'userdata_self_maintain' ) ){ 
		echo $value;
	} else {
		 if ( $pub == 1 ) {
			?>
			<input name="<?php echo $fieldname ?>" type="text" size=50 maxlength=50 value="<?php echo $value ?>" >
		<?php
		} else { 
			echo $value;
		}
	} ?>
	</div>
	</tr>
	<?php
}	 
?>
<td><input name="Submit" type="submit" value="<?php echo lang_get( 'submit' ) ?>"></td>
</tr>
</table>
</div>
</div>
</div>
</div>
</form>
</div>
<?php

echo '</div>';
layout_page_end();