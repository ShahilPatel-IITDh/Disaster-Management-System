<?php include 'inc/header.php'; ?>

	<div class="container">
		<h3>View Students</h3>
		<hr>
		<div class="row">
			<table class="table table-hover">
				<thead>
					<tr>
						<th>S.No.</th>
						<th>Student Name</th>
						<th>College Name</th>
						<th>Gender</th>
						<th>Email</th>
						<th>Course</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php if (count($students)): ?>
						<?php $i=1; ?>
						<?php foreach ($students as $student): ?>
							<tr>
								<td><?php echo $i; $i++ ?></td>
								<td><?php echo $student->studentname; ?></td>
								<td><?php echo $student->collegename; ?></td>
								<td><?php echo $student->email; ?></td>
								<td><?php echo $student->gender; ?></td>
								<td><?php echo $student->course; ?></td>
								<td><?php echo anchor("admin/editstudent/{$student->id}", 'Edit', ['class'=>'btn btn-primary btn-sm mx-1']); ?>
										<?php echo anchor("admin/deletestudent/{$student->id}", 'Remove', ['class'=>'btn btn-danger btn-sm mx-1']); ?>
								</td>
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
