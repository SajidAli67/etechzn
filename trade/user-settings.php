<?php require_once "inc/header.php";
if ($_SESSION['admin']['role'] == "user") :
	$getData = new GetData();
	$user = $getData->specificItem('tbl_member', 'mId', $_SESSION['admin']['user_id']);
	if(isset($_POST['upload'])){
		if($user[0]['photo']!='None'){
			unlink('../images/user/'.$user[0]['photo']);
		}
		$img = 	$getData->uploadImg($_FILES['profile_img'],'../images/user/');
		$data= array(
			'photo'=>$img
		);
		$update = $getData->table_update('tbl_member',$data,'mId = '.$user[0]['mId']);
		if($update){
			echo "<script>location.replace('user-settings.php')</script>";
		}

	}
?>
	<div class="main-panel">
		<div class="content-wrapper">
			<div class="row" align="center">
				<div class="col-md-6">
					<img src="../images/user/<?= ($user[0]['photo']=='None'?'default.png':$user[0]['photo']) ?>" alt="" id="imgPreview" style="width: 300px; height:300px">
					<div class="card">
						<form action="user-settings.php" method="post" enctype="multipart/form-data">
							<div class="row no-gutters">
								<div class="col-6">
									<input type="file" name="profile_img" id="profile_img" class="btn btn-primary" value="Profile Photo">
								</div>
								<div class="col-6">
									<input type="submit" name="upload" class="btn btn-success btn-block" value="Upload Image">
								</div>
							</div>
						</form>
						<button type="button" class="btn <?= ($user[0]['verify'] == 0) ? 'btn-danger' : 'btn-success' ?> mt-3" data-toggle="modal" data-target="#exampleModal"><?= ($user[0]['verify'] == 0) ? 'Verify Account' : 'Edit' ?></button>
					</div>
					<h3>User Information</h3>
					<table class="table" align="center">
						<tr>
							<td>Username</td>
							<td><?= $user[0]['member_name'] ?></td>
						</tr>
						<tr>
							<td>Full name</td>
							<td><?= $user[0]['member_name'] ?></td>
						</tr>
						<tr>
							<td>Address</td>
							<td><?= $user[0]['address'] ?></td>
						</tr>
						<tr>
							<td>City</td>
							<td><?= $user[0]['member_name'] ?></td>
						</tr>
						<tr>
							<td>Refferal Address</td>
							<td><?= $user[0]['referral_code'] ?></td>
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
							<td><?= $user[0]['lvl_rf_id1'] ?></td>
							<td><?= $user[0]['lvl_rf_id2'] ?></td>
							<td><?= $user[0]['lvl_rf_id3'] ?></td>
						</tr>
					</table>
				</div>
			</div>
			<!-- Modal -->
			<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Verify Account</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<form action="ajax-action/user_verify.php" method="POST" id="user_data">
							<?php print_r($user[0]) ?>
							<input type="hidden" value="<?= $_SESSION['admin']['user_id'] ?>" name="user_id">
							<input type="text" value="<?= $user[0]['verify'] ?>" name="verify">

							<div class="modal-body p-3">
								<div class="form-group">
									<label for="member_name">Member Name</label>
									<input type="text" class="form-control" id="member_name" name="member_name" placeholder="Enter Member Name" value="<?= $user[0]['member_name'] ?>">
								</div>

								<div class="form-check">
									<input type="radio" class="form-check-input" id="gender" name="gender" selected>
									<label for="gender" class="form-check-label">Male</label>
									<input type="radio" class="form-check-input" id="gender" name="gender">
									<label for="gender" class="form-check-label">Female</label>

								</div>

								<div class="form-group">
									<label for="birthday">Birthday</label>
									<input type="date" class="form-control" id="birthday" name="birthday" value="<?= $user[0]['birthday'] ?>">
								</div>

								<div class="form-group">
									<label for="nationality">Nationality</label>
									<input type="text" class="form-control" id="nationality" name="nationality" placeholder="Enter Nationality" value="<?= $user[0]['nationality'] ?>">
								</div>
								<div class="form-group">
									<label for="city">City</label>
									<input type="text" class="form-control" id="city" name="city" placeholder="Enter City" value="<?= $user[0]['city'] ?>">
								</div>
								<div class="form-group">
									<label for="phone">Phone</label>
									<input type="text" class="form-control" id="phone" name="phone" placeholder="Enter Phone Number" value="<?= $user[0]['phone'] ?>">
								</div>
								<div class="form-group">
									<label for="address">Address</label>
									<input type="text" class="form-control" id="address" name="address" placeholder="Enter Address" value="<?= $user[0]['address'] ?>">
								</div>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
								<button type="submit" id="save" class="btn btn-primary">Save changes</button>
							</div>
						</form>
					</div>
				</div>
			</div>

		<?php endif; ?>
		<?php require_once "inc/footer.php"; ?>
		<script>
			$(document).ready(function() {
				$('#save').click(function(e) {
					e.preventDefault();
					var action = $('#user_data').attr('action');
					var data = $('#user_data').serialize();

					$.ajax({
						url: action,
						type: 'post',
						data: data,
						success: function(data) {
							console.log(data)

						}
					})
				})
			})
			$(document).ready(() => {
				$('#profile_img').change(function() {
					const file = this.files[0];
					if (file) {
						let reader = new FileReader();
						reader.onload = function(event) {
							console.log(event.target.result);
							$('#imgPreview').attr('src', event.target.result);
						}
						reader.readAsDataURL(file);
					}
				});
			});
		</script>