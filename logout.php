<?php 
	session_start();
	session_destroy();
?>

	<script language="javascript">
		alert("Anda telah logout");
		document.location="/DSS_Store/";
	</script>