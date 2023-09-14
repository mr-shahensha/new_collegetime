<?php
$url=$_REQUEST['url'];
if (!unlink($url)) 
{
?>
<script>
alert('Error deleting Image URL 404');  
</script>  
<?php
} 
else 
{?>
<script>
alert('Image Deleted'); 
$('#unlnk').load(document.URL +  ' #unlnk');
</script>    
<?php
}
?>