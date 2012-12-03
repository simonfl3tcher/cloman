<a href="<?php echo site_url(); ?>support_packs">Support Packs</a>
<a href="<?php echo site_url(); ?>management/import">Import</a>
<a href="<?php echo site_url(); ?>management/export">Export</a>
<br /><br />
 <ul class="nav nav-tabs">
    <li class="active"><a href="#taskstatuses" data-toggle="tab">Task Statuses</a></li>
    <li><a href="#employees" data-toggle="tab">Employees</a></li>
    <li><a href="#timetracking" data-toggle="tab">Track Time</a></li>
    <li><a href="#me" data-toggle="tab">Me</a></li>
    </ul>
 
	<div class="tab-content">
		<div class="tab-pane active" id="taskstatuses">
			<form action="/management/update_task_statuses" method="post" class="taskstatuses">
				<div class="inputWrapper">
					<?php foreach($task_statuses as $status){ ?>
						<input type="text" name="<?php echo $status['status_id']; ?>[name]" value="<?php echo $status['name']; ?>" /><span><input type="text" name="<?php echo $status['status_id']; ?>[color]" value="<?php echo $status['color']; ?>" class="hexref"/></span><br />
					<?php } ?>
				</div>
				<input type="submit" value="Update" class="btn" />
				<span class="icon plusIconGrey" data-count="0"></span>
			</form>
		</div>
		<div class="tab-pane" id="employees">
			<div class="formContainer">
				<form action="<?php echo site_url(); ?>management/update_users_color" method="post" class="taskstatuses">
					<?php foreach($employee_list as $employees){ ?>
						<div class="employeeSpan"><?php echo $employees['name']; ?></div><span><input type="text" name="<?php echo $employees['user_id']; ?>[color]" value="<?php echo $employees['color']; ?>" class="hexref"/></span><br />
					<?php } ?>
					<input type="submit" value="Update" class="btn" />
				</form>
			</div>

			<div class="formConatinerRight">
				<h2>Add Employee</h2>
				<form action="<?php echo site_url(); ?>management/add_employee" method="post" class="taskstatuses">
					<label>Name</label>
					<input name="name" type="text" placeholder="Name" />
					<label>Email Address</label>
					<input name="email" type="text" placeholder="Email Address" />
					<label>Display Name</label>
					<input name="displayName" type="text" placeholder="Display Name" />
					<label>Colour</label>
					<input name="color" type="text" placeholder="Colour" />
					<label>Password</label>
					<input name="password" type="password" placeholder="Password" />
					<br />
					<input type="submit" value="Add Employee" class="btn" />
				</form>
			</div>
		</div>
		<div class="tab-pane" id="timetracking">
			Send an email at 5 with a reminder to do timesheets ?
		</div>
		<div class="tab-pane" id="me">
			Send an email at 5 with a reminder to do timesheets ?
		</div>
	</div>