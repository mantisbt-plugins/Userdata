<?php
/*
csv import with columns
ip_lo	start of ragen
ip_hi	end or range
reason	reason for banning 
That's all

*/
auth_reauthenticate();
access_ensure_global_level( config_get( 'manage_plugin_threshold' ) );
layout_page_header( lang_get( 'plugin_format_title' ) );
layout_page_begin( 'config.php' );
print_manage_menu();
$import_file = "";
$link=plugin_page('config');
?>
<div class="col-md-12 col-xs-12">
<div class="space-10"></div>
<div class="form-container" > 
<div class="widget-box widget-color-blue2">
<div class="widget-header widget-header-small">
	<h4 class="widget-title lighter">
		<i class="ace-icon fa fa-text-width"></i>
		<?php echo  plugin_lang_get( 'title' ).': ' . plugin_lang_get( 'importcsv' )?>
	</h4>
</div>
<div class="widget-body">
<div class="widget-main no-padding">
<div class="table-responsive"> 
<table class="table table-bordered table-condensed table-striped"> 
<tr>
<td class="form-title" colspan="5">
<?php
print_link_button( $link, plugin_lang_get( 'configuration' ) );
?>
</td>
<td></td>
</tr>
</tr>
<form method="post" enctype="multipart/form-data" action="<?php echo plugin_page('loadcsv')?> ">
<input type="hidden" name="import_file" value="<?php echo $import_file;  ?>">

    <div align="center">
        <table class="table table-bordered table-condensed table-striped"> 
              <tr>
			    <td class="category" width="15%">
                    <?php echo plugin_lang_get( 'col_sep' ) ?>
                </td>
                <td class="category">
                    <input name="edt_cell_separator" type="text" size="1" maxlength="1" value="," >
                </td>
				 <td><b>
                    <?php echo plugin_lang_get( 'col_sep2' ) ?>
                </b></td>
 
            </tr>
 
            <tr >
            	<td class="category" width="15%">
            		<?php echo lang_get( 'select_file' ) ?>
					<br>
             	</td>
            	<td width="85%" colspan="2">
            		<input type="file" name="import_file" accept=".csv" size="50">
               	</td>
            </tr>
			<tr>
			   <td> 
			   <input type="submit" class="button" value="<?php echo plugin_lang_get( 'importfile' ) ?>" />
			   </td>
			</tr>
        </table>
    </div>
</form>

	
<?php
layout_page_end();