	<div class="space-10"></div>
		<div class="widget-box widget-color-blue2">
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
						<tr class="hidden"></tr>
						<tr><td colspan=2 class="row-category"><div align="left"><a name="userdata_record"></a></td></tr>
					</div>
					<tr class="row-category">
					<td><div><b><?php echo plugin_lang_get( 'fieldname' ); ?></b></div></td>
					<td><div><b><?php echo plugin_lang_get( 'value' ); ?></b></div</td>
					</tr>
			</div>
<?PHP
# Pull all definition entries 
$query = "SELECT * FROM {plugin_Userdata_fields} ORDER BY userdata_seq";
$result = db_query($query);
while ($row = db_fetch_array($result)) {
	$name	= $row['userdata_name'];
	$id		= $row['userdata_id' ];
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
	if( OFF == plugin_config_get( 'userdata_show_empty' ) ) {
		if ( $value == "" ) {
			continue;
		}
	}
?>
			<tr>
			<td><div align="left">
			<?PHP echo $name ; ?>
			</div></td>
			<td><div>
			<?php echo $value ?>
			</div>
			</tr>
<?php
}	 
?>
		</table>
		</div>
	</div>
</div></div>