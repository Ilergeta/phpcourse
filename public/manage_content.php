<?php ob_start(); ?>
<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>

<?php $layout_context="admin"; ?>
<?php include("../includes/layout/header.php"); ?>	

<?php find_selected_page(); ?>

<div id="main">
		<div id="navigation">
			<br>
			<a href="admin.php">&laquo; Menu principal</a><br>
			<?php echo navigation($current_subject,$current_page); ?>
			<br>
			<a href="new_subject.php">+ Afegeix un tema</a>
		</div>
	<div id="page">
		<?php  echo message(); ?>
		<?php ob_end_flush(); ?>
		<h2>Administrador de contingut</h2>
		<p>Welcome to the admin area.</p>
		<?php if ($current_subject) { ?>
			<h3> Gestor de temes </h3>
			<?php echo "Nom del menu: ".htmlentities($current_subject["menu_name"]); ?> <br>
			Posició: <?php echo $current_subject["position"]; ?> <br>
			Visible: <?php echo $current_subject["visible"]==1? 'si' : 'no'; ?> <br>
			<br>			
			<a href="edit_subject.php?subject=<?php echo urlencode($current_subject["id"]); ?>" > Edita tema </a>
		<?php } elseif ($current_page) { ?>
			<h3> Gestor de pàgines </h3>
			<?php echo "Nom de la pàgina: ".htmlentities($current_page["menu_name"]); ?> <br>
			Posició: <?php echo $current_page["position"]; ?> <br>
			Visible: <?php echo $current_page["visible"]==1? 'si' : 'no'; ?> <br>
			<br>
			Contingut:<br>
			<div class="view-content">
				<?php echo htmlentities($current_page["content"]); ?>
			</div>
			<br>
		<?php } else { ?>
			<p> Si us plau, tria un tema o una pàgina </p>
		<?php } ?>
	</div>
</div>
<?php include("../includes/layout/footer.php") ?>