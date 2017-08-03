<?php ob_start(); ?>
<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>

<?php
	$current_subject=find_subject_by_id($_GET["subject"],false);
	if(!$current_subject) {
		// subject ID was missing or invalid or
		// subject couldn't be found in database
		redirect_to("manage_content.php");
		ob_end_flush();
	}
	
	$pages_set=find_pages_for_subject($current_subject["id"],false);
	if (mysqli_num_rows($pages_set)>0) {
		$_SESSION["message"]="No es pot esborrar un tema amb pàgines associades.";
		redirect_to("manage_content.php?subject={$current_subject["id"]}");
		ob_end_flush();
	}
	
	$id=$current_subject["id"];
	$query="DELETE FROM subjects WHERE id= {$id} LIMIT 1";	
	$result=mysqli_query($connection,$query);
	
	if ($result && mysqli_affected_rows($connection)==1) {
		// Success
		$_SESSION["message"]="Tema esborrat.";
		redirect_to("manage_content.php");
		ob_end_flush();
	} else {
		// Failure
		$_SESSION["message"]="Error en l'esborrat del tema.";
		redirect_to("manage_content.php?subject={$id}");
		ob_end_flush();	
	}
?>