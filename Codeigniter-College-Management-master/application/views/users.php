<?php include 'inc/header.php'; ?>

	<div class="container">
		<h3>Welcome to Dashboard Moderator
			<div class="float-right">
				<?php echo anchor("welcome/logout", 'Logout', ['class'=>'btn btn-primary btn-sm']); ?>
			</div>
		</h3>
		<?php $username = $this->session->userdata('username'); ?>
		<h5>Welcome <?php echo "<b>".$username."</b>"; ?></h5>
		<hr>
		<div class="row">
			<table class="table table-hover">
				<thead>
					<tr>
						<th>ID</th>
						<th>Student name</th>
						<th>College Name</th>
						<th>Email</th>
						<th>Gender</th>
						<th>Course</th>
						<!-- <th>Action</th> -->
					</tr>
				</thead>
				<tbody>
					<?php if (count($students)): ?>
						<?php foreach ($students as $student): ?>
							<tr>
								<td><?php echo $student->id; ?></td>
								<td><?php echo $student->studentname; ?></td>
								<td><?php echo $student->collegename; ?></td>
								<td><?php echo $student->email; ?></td>
								<td><?php echo $student->gender; ?></td>
								<td><?php echo $student->course; ?></td>
								<!-- <td><?php //echo anchor("admin/viewstudents/{$collegeUser->college_id}", 'View', ['class'=>'btn btn-primary btn-sm mx-1']); ?></td> -->
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
