<?php
	$user = $this->quickauth->user();
	$logged_in = $this->quickauth->logged_in();
	$nav_items = array();
	if(!$logged_in) {
		$nav_items['Log In'] = array('/', false);
	} else {
		$nav_items['Dashboard'] = array('/', false);
		$nav_items['Devices'] = array('/devices', false);
		$nav_items['Messages'] = array('/messages', false);
		$nav_items['Log Out'] = array('/logout', false);
	}
	
	if(isset($current_page) && isset($nav_items[$current_page]))
		$nav_items[$current_page][1] = true;
	
	
	
	if(!$logged_in)
		return;
?>

<div id="side_nav">
	<div class="top_box">
		<label for="nav_search">
			<input type="text" name="nav_search" class="search_field" id="nav_search" placeholder="Search" value="" />
			<a class="text_cross"></a>
		</label>
		<p class="account_text">Logged in as <b><?=$user->first_name.' '.$user->last_name.' ('.$user->username.')'?></b></p>
	</div>
	<ul class="tabs">
	<?php foreach($nav_items as $tab_name => $nav_item): ?>
		<li<?=(($nav_item[1])? ' class="current"' : '')?>><a href="<?=$nav_item[0]?>"><?=$tab_name?></a></li>
	<?php endforeach; ?>
	</ul>
</div>