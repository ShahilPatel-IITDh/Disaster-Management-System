<?php include 'inc/header.php'; ?>

	<div class="container">
		<?php echo form_open("admin/createcollege", ['class'=>'form-horizontal']); ?>

		<?php if ($message = $this->session->flashdata('message')): ?>
			<div class="row">
				<div class="col-md-6">
					<div class="alert alert-success alert-dismissble">
						<button type="button" class="close" data-dismiss="alert">&times;</button>
						<?php echo $message; ?>
					</div>
				</div>
			</div>
		<?php endif; ?>

		<h3>Add College</h3>
		<hr>

		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label for="collegename" class="col-md-3 control-label">College Name</label>
					<div class="col-md-9">
						<?php echo form_input([ 'name'=>'collegename',
																		'class'=>'form-control',
																		'value'=>set_value('collegename'),
																		'placeholder'=>'College Name'
																	]); ?>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<?php echo form_error('collegename', '<div class="text-danger">', '</div>'); ?>
			</div>
		</div>

		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label for="branch" class="col-md-3 control-label">Branch</label>
					<div class="col-md-9">
						<?php echo form_input([ 'name'=>'branch',
																		'class'=>'form-control',
																		'placeholder'=>'Branch'
																	]); ?>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<?php echo form_error('branch', '<div class="text-danger">', '</div>'); ?>
			</div>
		</div>

		<button type="submit" class="btn btn-primary">Add College</button>
		<?php echo anchor("admin/dashboard", "Back", ['class'=>'btn btn-primary']); ?>

		<?php echo form_close(); ?>
	</div>

<?php include 'inc/footer.php'; ?>
