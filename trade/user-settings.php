<?php require_once "inc/header.php"; 
if($_SESSION['admin']['role'] == "user"):
?>
<div class="main-panel">
          <div class="content-wrapper">
<div class="row" align="center">
	<div class="col-md-6">
	<div class="card">
		<p>User Photo</p>
		<a class="btn btn-danger" href="">Verify Account</a>
	</div>
	<h3>User Information</h3>
	<table class="table" align="center">
		<tr>
			<td>Username</td>
			<td>Username</td>
		</tr>
		<tr>
			<td>Full name</td>
			<td>Username</td>
		</tr>
		<tr>
			<td>Address</td>
			<td>Username</td>
		</tr>
		<tr>
			<td>Payment Methods</td>
			<td>Username</td>
		</tr>
		<tr>
			<td>Refferal Address</td>
			<td>Username</td>
		</tr>
	</table>
</div>
	<div class="col-md-6">
		<br><br>
		<h3>Refferal Info</h3>
		<br>
	<table class="table" align="center">
		<tr align="center">
			<td>Lvl-1</td>
			<td>Lvl-2</td>
			<td>lvl-3</td>
		</tr>
		<tr align="center">
			<td>Lvl-1-id</td>
			<td>Lvl-2-id</td>
			<td>lvl-3-id</td>
		</tr>
	</table>
	</div>
</div>


<?php endif; ?>
<?php require_once "inc/footer.php"; ?>