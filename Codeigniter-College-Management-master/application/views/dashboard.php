<?php include 'inc/header.php'; ?>

	<div class="container">
		<h3>Welcome to Dashboard
			<div class="float-right">
				<?php echo anchor("welcome/logout", 'Logout', ['class'=>'btn btn-primary btn-sm']); ?>
			</div>
		</h3>
		<?php $username = $this->session->userdata('username'); ?>
		<h5>Welcome <?php echo "<b>".$username."</b>"; ?></h5>
		<div class="row">
			<?php echo anchor("admin/addcollege", 'Add College', ['class'=>'btn btn-primary btn-sm mx-1']); ?>
			<?php echo anchor("admin/addmoderator", 'Add Moderator', ['class'=>'btn btn-primary btn-sm mx-1']); ?>
			<?php echo anchor("admin/addstudent", 'Add Student', ['class'=>'btn btn-primary btn-sm mx-1']); ?>
		</div>
		<hr>
		<div class="row">
			<table class="table table-hover">
				<thead>
					<tr>
						<th>ID</th>
						<th>College Name</th>
						<th>Username</th>
						<th>Email</th>
						<th>Role</th>
						<th>Gender</th>
						<th>Branch</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php if (count($collegeUsers)): ?>
						<?php foreach ($collegeUsers as $collegeUser): ?>
							<tr>
								<td><?php echo $collegeUser->college_id; ?></td>
								<td><?php echo $collegeUser->collegename; ?></td>
								<td><?php echo $collegeUser->username; ?></td>
								<td><?php echo $collegeUser->email; ?></td>
								<td><?php echo $collegeUser->rolename; ?></td>
								<td><?php echo $collegeUser->gender; ?></td>
								<td><?php echo $collegeUser->branch; ?></td>
								<td><?php echo anchor("admin/viewstudents/{$collegeUser->college_id}", 'View', ['class'=>'btn btn-primary btn-sm mx-1']); ?></td>
							</tr>
						<?php endforeach; ?>
					<?php else: ?>
						<tr>
							<td>
								No Records Found!
							</td>
						</tr>
					<?php endif;?>
				</tbody>
			</table>
		</div>
	</div>

<?php include 'inc/footer.php'; ?>
