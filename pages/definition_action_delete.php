<?PHP
$reqVar = '_' . $_SERVER['REQUEST_METHOD'];
$form_vars = $$reqVar;
$delete_id = $form_vars['delete_id'] ;
# Deleting definition
# Need to add check on available data
$query = "DELETE FROM {plugin_Userdata_fields} WHERE userdata_id = $delete_id";        
db_query($query);
print_header_redirect( 'plugin.php?page=Userdata/userdata_definition' );