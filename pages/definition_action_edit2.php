<?PHP
$id		= $_REQUEST['edit_id'];
$seq	= $_REQUEST['sequence'];
$pub	= $_REQUEST['public'];
if ($pub == 1) {
	$pub = 1;
} else {
	$pub = 0;
}
$name	= htmlentities($_REQUEST['name'],ENT_COMPAT,'UTF-8');
$query	= "update {plugin_Userdata_fields} set userdata_seq = '$seq', userdata_name = '$name', userdata_public = '$pub' where userdata_id= $id";
db_query($query);
print_header_redirect( 'plugin.php?page=Userdata/userdata_definition' );
