<?php
$root="http://".$_SERVER['HTTP_HOST'];
?>
<html>
<script type="text/javascript">
    alert('Date Expired!!');
	parent.location = "<?=base_url()?>recruitment/enroll"
</script>
</html>