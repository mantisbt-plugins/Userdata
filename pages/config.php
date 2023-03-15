<?php
auth_reauthenticate();
access_ensure_global_level( config_get( 'manage_plugin_threshold' ) );
layout_page_header( plugin_lang_get( 'userdata'  ) );
layout_page_begin( 'config_page.php' );
print_manage_menu();
$link=plugin_page('userdata_definition');
$link2 =plugin_page('userdata_cleaning');
?>
<div class="col-md-12 col-xs-12">
<div class="space-10"></div>
<div class="form-container" > 
<br/>
<form action="<?php echo plugin_page( 'config_edit' ) ?>" method="post">
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
<td class="form-title" >
<a href="<?php echo $link ?>"><?php echo plugin_lang_get( 'definition' ) ?></a>
</td><td align="right">
<a href="<?php echo $link2 ?>"><?php echo plugin_lang_get( 'cleaning' ) ?></a>
</td>
</tr>

<tr>
<td class="category" width="60%">
<?php echo plugin_lang_get( 'show_inline' )?>
</td>
<td class="center" width="40%">
<label><input type="radio" name='show_inline'  value="1" <?php echo( ON == plugin_config_get( 'userdata_show_inline' ) ) ? 'checked="checked" ' : ''?>/>
<?php echo plugin_lang_get( 'enabled' )?></label>
<label><input type="radio" name='show_inline' value="0" <?php echo( OFF == plugin_config_get( 'userdata_show_inline' ) )? 'checked="checked" ' : ''?>/>
<?php echo plugin_lang_get( 'disabled' )?></label>
</td>
</tr> 

<tr>
<td class="category" width="60%">
<?php echo plugin_lang_get( 'show_account' )?>
</td>
<td class="center" width="40%">
<label><input type="radio" name='show_account'  value="1" <?php echo( ON == plugin_config_get( 'userdata_show_account' ) ) ? 'checked="checked" ' : ''?>/>
<?php echo plugin_lang_get( 'enabled' )?></label>
<label><input type="radio" name='show_account' value="0" <?php echo( OFF == plugin_config_get( 'userdata_show_account' ) )? 'checked="checked" ' : ''?>/>
<?php echo plugin_lang_get( 'disabled' )?></label>
</td>
</tr> 

<tr>
<td class="category" width="60%">
<?php echo plugin_lang_get( 'show_user' )?>
</td>
<td class="center" width="40%">
<label><input type="radio" name='show_user'  value="1" <?php echo( ON == plugin_config_get( 'userdata_show_user' ) ) ? 'checked="checked" ' : ''?>/>
<?php echo plugin_lang_get( 'enabled' )?></label>
<label><input type="radio" name='show_user' value="0" <?php echo( OFF == plugin_config_get( 'userdata_show_user' ) )? 'checked="checked" ' : ''?>/>
<?php echo plugin_lang_get( 'disabled' )?></label>
</td>
</tr> 

<tr>
<td class="category" width="60%">
<?php echo plugin_lang_get( 'show_empty' )?>
</td>
<td class="center" width="40%">
<label><input type="radio" name='show_empty'  value="1" <?php echo( ON == plugin_config_get( 'userdata_show_empty' ) ) ? 'checked="checked" ' : ''?>/>
<?php echo plugin_lang_get( 'enabled' )?></label>
<label><input type="radio" name='show_empty' value="0" <?php echo( OFF == plugin_config_get( 'userdata_show_empty' ) )? 'checked="checked" ' : ''?>/>
<?php echo plugin_lang_get( 'disabled' )?></label>
</td>
</tr> 

<tr>
<td class="category" width="60%">
<?php echo plugin_lang_get( 'self_maintain' )?>
</td>
<td class="center" width="40%">
<label><input type="radio" name='self_maintain'  value="1" <?php echo( ON == plugin_config_get( 'userdata_self_maintain' ) ) ? 'checked="checked" ' : ''?>/>
<?php echo plugin_lang_get( 'enabled' )?></label>
<label><input type="radio" name='self_maintain' value="0" <?php echo( OFF == plugin_config_get( 'userdata_self_maintain' ) )? 'checked="checked" ' : ''?>/>
<?php echo plugin_lang_get( 'disabled' )?></label>
</td>
</tr> 

</table>
</div>
</div>
<div class="widget-toolbox padding-8 clearfix">
	<input type="submit" class="btn btn-primary btn-white btn-round" value="<?php echo lang_get( 'change_configuration' )?>" />
</div>
</div>
</div>
</form>
</div>
</div>
<?php
layout_page_end();