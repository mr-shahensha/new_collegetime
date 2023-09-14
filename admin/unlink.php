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
show(); 
</script>    
<?php
}
?>