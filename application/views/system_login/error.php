<?php
$root="http://".$_SERVER['HTTP_HOST'];
?>
<html>
<script type="text/javascript">
    alert('Wrong Username or Password');
	parent.location = "<?=base_url()?>"
</script>
</html>