<?php include 'inc/header.php'; ?>

	<div class="container">
		<?php echo form_open("admin/createmoderator", ['class'=>'form-horizontal']); ?>

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

		<h3>Admin Moderator</h3>
		<hr>
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label for="username" class="col-md-3 control-label">Username</label>
					<div class="col-md-9">
						<?php echo form_input([ 'name'=>'username',
																		'class'=>'form-control',
																		'value'=>set_value('username'),
																		'placeholder'=>'Username'
																	]); ?>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<?php echo form_error('username', '<div class="text-danger">', '</div>'); ?>
			</div>
		</div>

		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label for="collegename" class="col-md-3 control-label">College Name</label>
					<select class="col-md-9" name="college_id">
						<option value="">Select</option>
						<?php if (count($colleges)): ?>
							<?php foreach ($colleges as $college): ?>
								<option value=<?php echo $college->college_id ?>><?php echo $college->collegename ?></option>
							<?php endforeach; ?>
						<?php endif; ?>
					</select>
				</div>
			</div>
			<div class="col-md-6">
				<?php echo form_error('college_id', '<div class="text-danger">', '</div>'); ?>
			</div>
		</div>

		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label for="email" class="col-md-3 control-label">Email</label>
					<div class="col-md-9">
						<?php echo form_input([ 'name'=>'email',
																		'class'=>'form-control',
																		'value'=>set_value('email'),
																		'placeholder'=>'Email'
																	]); ?>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<?php echo form_error('email', '<div class="text-danger">', '</div>'); ?>
			</div>
		</div>

		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label for="" class="col-md-3 control-label">Gender</label>
					<select class="col-md-9" name="gender">
						<option value="">Select</option>
						<option value="male">Male</option>
						<option value="female">Female</option>
					</select>
				</div>
			</div>
			<div class="col-md-6">
				<?php echo form_error('gender', '<div class="text-danger">', '</div>'); ?>
			</div>
		</div>

		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label for="role_id" class="col-md-3 control-label">Role</label>
					<select class="col-md-9" name="role_id">
						<option value="">Select</option>
						<?php if(count($roles)): ?>
							<?php foreach ($roles as $role): ?>
							<option value=<?php echo $role->role_id; ?>><?php echo $role->rolename; ?></option>
							<?php endforeach; ?>
						<?php endif; ?>
					</select>
				</div>
			</div>
			<div class="col-md-6">
				<?php echo form_error('role_id', '<div class="text-danger">', '</div>'); ?>
			</div>
		</div>

		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label for="password" class="col-md-3 control-label">Password</label>
					<div class="col-md-9">
						<?php echo form_password([ 'name'=>'password',
																		'class'=>'form-control',
																		'placeholder'=>'Password'
																	]); ?>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<?php echo form_error('password', '<div class="text-danger">', '</div>'); ?>
			</div>
		</div>

		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label for="confpwd" class="col-md-3 control-label">Confirm Password</label>
					<div class="col-md-9">
						<?php echo form_password([ 'name'=>'confpwd',
																		'class'=>'form-control',
																		'placeholder'=>'Confirm Password'
																	]); ?>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<?php echo form_error('confpwd', '<div class="text-danger">', '</div>'); ?>
			</div>
		</div>

		<button type="submit" class="btn btn-primary">Add Moderator</button>
		<?php echo anchor("admin/dashboard", "Back", ['class'=>'btn btn-primary']); ?>

		<?php echo form_close(); ?>
	</div>

<?php include 'inc/footer.php'; ?>
