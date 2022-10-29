<?php include 'inc/header.php'; ?>

	<div class="container">
		<h3>All Moderators
			<div class="float-right">
				<?php echo anchor("welcome/logout", 'Logout', ['class'=>'btn btn-primary btn-sm']); ?>
			</div>
		</h3>
		<?php $username = $this->session->userdata('username'); ?>
		<hr>
		<div class="row">
			<table class="table table-hover">
				<thead>
					<tr>
						<th>ID</th>
						<th>User Name</th>
						<th>College</th>
						<th>Email</th>
						<th>Gender</th>
						<th>Branch</th>
					</tr>
				</thead>
				<tbody>
					<?php if (count($moderator)): ?>
						<?php foreach ($moderator as $moderator): ?>
							<tr>
								<td><?php echo $moderator->user_id; ?></td>
								<td><?php echo $moderator->username; ?></td>
								<td><?php echo $moderator->collegename; ?></td>
								<td><?php echo $moderator->email; ?></td>
								<td><?php echo $moderator->gender; ?></td>
								<td><?php echo $moderator->branch; ?></td>
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
