<?php
/**
* @package   Warp Theme Framework
* @author    YOOtheme http://www.yootheme.com
* @copyright Copyright (C) YOOtheme GmbH
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

// get config
$config = $this['system']->config;

// get config xml
$xml     = $this['dom']->create($this['path']->path('template:config.xml'), 'xml');
$warpxml = $this['dom']->create($this['path']->path('warp:warp.xml'), 'xml');

echo '<ul id="config" data-warpversion="'.($warpxml->first('version')->text()).'">';

// render fields
foreach ($xml->find('fields') as $fields) {
	
	// init vars
    $name    = $fields->attr('name');
	$content = '';

	if ($name == 'Profiles') {

		// get profile data
		$profiles = $config->get('profile_data', array('default' => array()));

		// render profiles
		foreach ($profiles as $profile => $values) {
			$content .= $this->render('config:layouts/fields', array('config' => $config, 'fields' => $fields, 'values' => $this['data']->create($values), 'prefix' => "profile_data[$profile]", 'attr' => array('data-profile' => $profile)));
		}

	} else {
		$content = $this->render('config:layouts/fields', array('config' => $config, 'fields' => $fields, 'values' => $config, 'prefix' => 'config', 'attr' => array()));
	}

	printf('<li class="%s" data-name="%s">%s</li>', $name, $name, $content);
}







// render Styling Setting
foreach ($xml->find('tabone') as $tabone) 
 {
	
	// init vars
    $name    = $tabone->attr('name');
	$content = '';

	if ($name == 'Styling') {

		// get profile data
		$Styling = $config->get('profile_data', array('default' => array()));

		// render profiles
		foreach ($Styling as $profile => $values) {
			$content .= $this->render('config:layouts/tabone', array('config' => $config, 'tabone' => $tabone, 'values' => $this['data']->create($values), 'prefix' => "profile_data[$profile]", 'attr' => array('data-profile' => $profile)));}} 
	
	else
	{$content = $this->render('config:layouts/tabone', array('config' => $config, 'tabone' => $tabone, 'values' => $config, 'prefix' => 'config', 'attr' => array()));}
printf('<li class="%s" data-name="%s">%s</li>', $name, $name, $content);}

//Header Setting end



// render Menu Setting
foreach ($xml->find('tabtwo') as $tabtwo) 
 {
	
	// init vars
    $name    = $tabtwo->attr('name');
	$content = '';

	if ($name == 'Menus') {

		// get profile data
		$Menus = $config->get('profile_data', array('default' => array()));

		// render profiles
		foreach ($Menus as $profile => $values) {
			$content .= $this->render('config:layouts/tabtwo', array('config' => $config, 'tabtwo' => $tabtwo, 'values' => $this['data']->create($values), 'prefix' => "profile_data[$profile]", 'attr' => array('data-profile' => $profile)));}} 
	
	else
	{$content = $this->render('config:layouts/tabtwo', array('config' => $config, 'tabtwo' => $tabtwo, 'values' => $config, 'prefix' => 'config', 'attr' => array()));}
printf('<li class="%s" data-name="%s">%s</li>', $name, $name, $content);}

//Menu Setting end








// render Blocks Setting
foreach ($xml->find('tabthree') as $tabthree) 
 {
	
	// init vars
    $name    = $tabthree->attr('name');
	$content = '';

	if ($name == 'Blocks') {

		// get profile data
		$Blocks = $config->get('profile_data', array('default' => array()));

		// render profiles
		foreach ($Blocks as $profile => $values) {
			$content .= $this->render('config:layouts/tabthree', array('config' => $config, 'tabthree' => $tabthree, 'values' => $this['data']->create($values), 'prefix' => "profile_data[$profile]", 'attr' => array('data-profile' => $profile)));}} 
	
	else
	{$content = $this->render('config:layouts/tabthree', array('config' => $config, 'tabthree' => $tabthree, 'values' => $config, 'prefix' => 'config', 'attr' => array()));}
printf('<li class="%s" data-name="%s">%s</li>', $name, $name, $content);}

//Blocks Setting end




// render Modules Setting
foreach ($xml->find('tabfour') as $tabfour) 
 {
	
	// init vars
    $name    = $tabfour->attr('name');
	$content = '';

	if ($name == 'Modules') {

		// get profile data
		$Modules = $config->get('profile_data', array('default' => array()));

		// render profiles
		foreach ($Modules as $profile => $values) {
			$content .= $this->render('config:layouts/tabfour', array('config' => $config, 'tabfour' => $tabfour, 'values' => $this['data']->create($values), 'prefix' => "profile_data[$profile]", 'attr' => array('data-profile' => $profile)));}} 
	
	else
	{$content = $this->render('config:layouts/tabfour', array('config' => $config, 'tabfour' => $tabfour, 'values' => $config, 'prefix' => 'config', 'attr' => array()));}
printf('<li class="%s" data-name="%s">%s</li>', $name, $name, $content);}

//Modules Setting end




// render Typography Setting
foreach ($xml->find('tabfive') as $tabfive) 
 {
	
	// init vars
    $name    = $tabfive->attr('name');
	$content = '';

	if ($name == 'Typography') {

		// get profile data
		$Typography = $config->get('profile_data', array('default' => array()));

		// render profiles
		foreach ($Typography as $profile => $values) {
			$content .= $this->render('config:layouts/tabfive', array('config' => $config, 'tabfive' => $tabfive, 'values' => $this['data']->create($values), 'prefix' => "profile_data[$profile]", 'attr' => array('data-profile' => $profile)));}} 
	
	else
	{$content = $this->render('config:layouts/tabfive', array('config' => $config, 'tabfive' => $tabfive, 'values' => $config, 'prefix' => 'config', 'attr' => array()));}
printf('<li class="%s" data-name="%s">%s</li>', $name, $name, $content);}

//Typography Setting end




// render WoredPress Setting
foreach ($xml->find('tabseven') as $tabseven) 
 {
	
	// init vars
    $name    = $tabseven->attr('name');
	$content = '';

	if ($name == 'Wordpress') {

		// get profile data
		$Wordpress = $config->get('profile_data', array('default' => array()));

		// render profiles
		foreach ($Wordpress as $profile => $values) {
			$content .= $this->render('config:layouts/tabseven', array('config' => $config, 'tabseven' => $tabseven, 'values' => $this['data']->create($values), 'prefix' => "profile_data[$profile]", 'attr' => array('data-profile' => $profile)));}} 
	
	else
	{$content = $this->render('config:layouts/tabseven', array('config' => $config, 'tabseven' => $tabseven, 'values' => $config, 'prefix' => 'config', 'attr' => array()));}
printf('<li class="%s" data-name="%s">%s</li>', $name, $name, $content);}

//Header Setting end





// render Social Setting
foreach ($xml->find('eight') as $eight) 
 {
	
	// init vars
    $name    = $eight->attr('name');
	$content = '';

	if ($name == 'Social') {

		// get profile data
		$Social = $config->get('profile_data', array('default' => array()));

		// render profiles
		foreach ($Social as $profile => $values) {
			$content .= $this->render('config:layouts/eight', array('config' => $config, 'eight' => $eight, 'values' => $this['data']->create($values), 'prefix' => "profile_data[$profile]", 'attr' => array('data-profile' => $profile)));}} 
	
	else
	{$content = $this->render('config:layouts/eight', array('config' => $config, 'eight' => $eight, 'values' => $config, 'prefix' => 'config', 'attr' => array()));}
printf('<li class="%s" data-name="%s">%s</li>', $name, $name, $content);}

//Header Setting end




// render Custom Setting
foreach ($xml->find('tabsix') as $tabsix) 
 {
	
	// init vars
    $name    = $tabsix->attr('name');
	$content = '';

	if ($name == 'Custom') {

		// get profile data
		$Custom = $config->get('profile_data', array('default' => array()));

		// render profiles
		foreach ($Custom as $profile => $values) {
			$content .= $this->render('config:layouts/tabsix', array('config' => $config, 'tabsix' => $tabsix, 'values' => $this['data']->create($values), 'prefix' => "profile_data[$profile]", 'attr' => array('data-profile' => $profile)));}} 
	
	else
	{$content = $this->render('config:layouts/tabsix', array('config' => $config, 'tabsix' => $tabsix, 'values' => $config, 'prefix' => 'config', 'attr' => array()));}
printf('<li class="%s" data-name="%s">%s</li>', $name, $name, $content);}

//Custom Setting end










echo '</ul>';