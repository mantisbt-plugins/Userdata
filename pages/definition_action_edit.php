<?php
auth_reauthenticate();
access_ensure_global_level( config_get( 'manage_plugin_threshold' ) );
layout_page_header( lang_get( 'plugin_format_title' ) );
layout_page_begin( );
print_manage_menu();
$reqVar = '_' . $_SERVER['REQUEST_METHOD'];
$form_vars = $$reqVar;
$edit_id = $form_vars['edit_id'] ;
$query = "SELECT * FROM {plugin_Userdata_fields} where userdata_id=$edit_id";
$result = db_query($query);
while ($row = db_fetch_array($result)) {
	$seq	= $row['userdata_seq'];
	$name	= $row['userdata_name'];
	$public	= $row['userdata_public'];
}
?>
<div class="col-md-12 col-xs-12">
<div class="space-10"></div>
<div class="form-container" > 
<br/>
<form action="<?php echo plugin_page( 'definition_action_edit2' ) ?>"  method="post" >
<input type="hidden" name="edit_id" value="<?php echo $edit_id  ?>">
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
<td class="form-title" colspan="2">
<a href="<?php echo $link ?>"><?php echo plugin_lang_get( 'configuration' ) ?></a>
</td>
<td></td>
</tr>

</tr>
<tr>
<td>
<?php echo lang_get( 'plugin_Userdata_title' ) . ': ' . lang_get( 'plugin_Userdata_userdata' ) ?>
</td>
<td></td>
</tr>

<td colspan="4 class="row-category"><div align="left"><a name="userdata_record"></a>
</div>
</td>
</tr>
<tr class="row-category">
<td><div><b><?php echo plugin_lang_get( 'sequence' ); ?></b></div></td>
<td><div><b><?php echo plugin_lang_get( 'fieldname' ); ?></b></div></td>
<td><div><b><?php echo plugin_lang_get( 'public' ); ?></b></div></td>
</tr>

<tr>

<td><div>
<input name="sequence" type="text" size=2 maxlength=2 value="<?php echo $seq?>">
<br><br>
</td>

<td><div>
<input name="name" type="text" size=50 maxlength=50 value="<?php echo $name?>">
</div></td>


<td class="center" width="40%"><div>
<label><input type="checkbox" name='public'  value="<?php echo $public ?>" />
<?php if ($public == 1) { echo "checked='checked'"; } ?>>
<div></td>

<td><input name="Submit" type="submit" value="<?php echo lang_get( 'submit' ) ?>">
</td>

</tr>
</form>

</table>
</div>
</div>

</div>
</div>
</div>
</div>
<?php
layout_page_end( );
