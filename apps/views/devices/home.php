<?php 
	$this->load->view('_components/head');
	$this->load->view('_components/nav');
?>
		<div style="display:none">
			<div id="new_notification">
				<h3>Compose Push Notification</h3>
				<label for="notification_body">Notification Message</label>
				<textarea id="notification_body" name="message"></textarea>
				<div class="left">
					<label for="notification_custom_button">"View" button label</label>
					<input type="text" name="button_text" id="notification_custom_button" value="View" />
				</div>
				<div class="right">
					<label for="notification_badge_number">Badge Number Increment</label>
					<input type="text" name="badge_number" id="notification_badge_number" value="1" />
				</div>
				<a class="button">Send</a>
			</div>
		</div>
		<div id="page_wrapper">
			<h2>Devices</h2>
			<?php 
				if(isset($devices) && count($devices) > 0):
			?>
			<div id="left_pane">
				<table id="page_table" class="devices">
					<thead>
						<tr>
							<th></th>
							<th>Device Name</th>
							<th>Device Status</th>
							<th>Device UUID</th>
							<th>Last Used</th>
							<th>Info</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach($devices as $device): ?>
						<tr>
							<td><input name="devices[]" type="checkbox" value="<?=$device->pid?>"></td>
							<td><?=$device->devicename?></td>
							<td><?=$device->status?></td>
							<td><?=$device->deviceuid?></td>
							<td><?=$device->modified?></td>
							<td><a rel="<?=$device->pid?>" class="show_device_info">Show</a></td>
						</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
			<div id="right_pane">
				<h3>Information</h3>
				<p>Out of the total number of <b><?=$counts['total']?></b> devices that have signed up for Push Notifications, <b><?=(($counts['active'] > 0)? $counts['active'] : 'none')?></b> are active and <b><?=(($counts['uninstalled'] > 0)? $counts['uninstalled'] : 'none')?></b> have been deactivated.</p>
				<h3>Bulk Options</h3>
				<form method="post" action="/devices/bulk_actions">
					<input type="hidden" name="devices" class="hidden_device_list" value="" />
					<ul class="options">
						<li><input type="submit" name="action" value="Delete" /></li>
						<li><input type="submit" name="action" value="Activate" /></li>
						<li><input type="submit" name="action" value="Deactivate" /></li>
						<li><a class="devices_send_notification" href="#new_notification">Send Notification</a></li>
					</ul>
				</form>
			</div>
			<?php
				else:
			?>
			
			<?php
				endif;
			?>
		</div>
<?php
	$this->load->view('_components/foot');
?>