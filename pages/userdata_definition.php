<?php
auth_reauthenticate();
access_ensure_global_level( config_get( 'manage_plugin_threshold' ) );
layout_page_header( lang_get( 'plugin_format_title' ) );
layout_page_begin( );
print_manage_menu();
$link=plugin_page('config');
?>
<div class="col-md-12 col-xs-12">
<div class="space-10"></div>
<div class="form-container" > 
<br/>
<div class="widget-box widget-color-blue2">
<div class="widget-header widget-header-small">
	<h4 class="widget-title lighter">
		<i class="ace-icon fa fa-text-width"></i>
		<?php echo plugin_lang_get( 'title' ) . ': ' . lang_get( 'plugin_format_config' )?>
	</h4>
</div>
<div class="widget-body">
<div class="widget-main no-padding">
<div class="table-responsive"> 
<table class="table table-bordered table-condensed table-striped"> 
<tr>
<td class="form-title" colspan="3">
<?php
print_link_button( $link, plugin_lang_get( 'configuration' ) );
?>
</td>
<td></td>
</tr>

</tr>
<tr>
<td>
<?php echo lang_get( 'plugin_Userdata_title' ) . ': ' . lang_get( 'plugin_Userdata_userdata' ) ?>
</td>

</tr>

<td colspan="4" class="row-category"><div align="left"><a name="userdata_record"></a>
</div>
</td>
</tr>
<tr class="row-category">
<td><div><b><?php echo plugin_lang_get( 'sequence' ); ?></b></div></td>
<td><div><b><?php echo plugin_lang_get( 'fieldname' ); ?></b></div></td>
<td><div><b><?php echo plugin_lang_get( 'public' ); ?></b></div></td>
<td><div><b><?php echo plugin_lang_get( 'action' ); ?></b></div</td>
</tr>
<?PHP
# Pull all definition entries 
$query = "SELECT * FROM {plugin_Userdata_fields} ORDER BY userdata_seq";
$result = db_query($query);
while ($row = db_fetch_array($result)) {
	$seq = $row['userdata_seq'];
	$name = $row['userdata_name'];
	$public = $row['userdata_public'];	?>
	<tr>
	<td><div align="center">
	<?php echo $seq; ?>
	</div></td>
	<td><div align="center">
	<?PHP echo $name ; ?>
	</div></td>
	<td><div align="center">
	<input type="checkbox" name='public'  value="<?php echo $public ?>"
	<?php if ($public == 1) { echo "checked='checked'"; } ?>>
	</div></td>
	<td><div>
	<?php
	$link2 = "plugin.php?page=Userdata/definition_action_delete.php&delete_id=";
	$link2 .= $row["userdata_id"];
	$link1 = "plugin.php?page=Userdata/definition_action_edit.php&edit_id=";
	$link1 .= $row["userdata_id"] ;
	print_link_button( $link1, lang_get( 'edit' ) );
	print_link_button( $link2, lang_get( 'delete' ) );
?>

	</div></td>
	</tr>
	<?php
}	 
?>
</table>
</div>
</div>

</div>
</div>
</form>
</div>
</div>
<?php
layout_page_end( );
