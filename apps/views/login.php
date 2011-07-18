<?php 
	$this->load->view('_components/head');
	$this->load->view('_components/nav');
?>
		<div id="login_wrapper">
			<form class="login_form" method="post" action="user/login<?=((isset($next_url))? '?next_url='.$next_url : '' )?>">
				<h2>Log in</h2>
				<label for="form_user">Username:</label>
				<input type="text" name="user" id="form_user" value="" />
				<label for="form_pass">Password:</label>
				<input type="password" name="pass" id="form_pass" value="" />
				<input type="submit" value="Log in" />
			</form>
		</div>
<?php
	$this->load->view('_components/foot');
?>