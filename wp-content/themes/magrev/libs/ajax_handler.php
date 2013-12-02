<?php

class Ajax_Handler
{
	protected $fields;
	
	function __construct()
	{
		
		add_action('wp_ajax__ajax_callback', array($this, 'ajax_callback') );
		add_action('wp_ajax_nopriv__ajax_callback', array($this, 'ajax_callback') );
	}
	
	function ajax_callback()
	{
		if( $type = kvalue( $_REQUEST, 'type') )
		{
			if( method_exists( $this, $type ) ) $this->$type();
		}
		
		exit('test');
	}
	
	function fw_contact_form_submit()
	{
		$t = $GLOBALS['_webnukes'];
		$t->load('validation_class');
		$settings = $t->get_options('sub_contact_page_settings');
		$recaptcha_opt = $t->get_options('sub_APIs');
		
		/** set validation rules for contact form */
		$t->validation->set_rules('contact_name','<strong>'.__('Name', THEME_NAME).'</strong>', 'required|min_length[4]|max_lenth[30]');
		$t->validation->set_rules('contact_email','<strong>'.__('Email', THEME_NAME).'</strong>', 'required|valid_email');
		//$t->validation->set_rules('contact_subject','<strong>'.__('Subject', THEME_NAME).'</strong>', 'required|min_length[5]');
		$t->validation->set_rules('contact_message','<strong>'.__('Message', THEME_NAME).'</strong>', 'required|min_length[5]');
		
		if( kvalue($settings, 'captcha_status') == 'on')
		{
			$challenge = $_POST['recaptcha_challenge_field'];
			$response = $_POST['recaptcha_response_field'];
			$recaptcha_response = recaptcha_check_answer ($recaptcha_opt['recaptcha_p_key'], $_SERVER['REMOTE_ADDR'], $challenge, $response);
			if( !$recaptcha_response->is_valid )
			{
				$t->validation->_error_array['captcha'] = __('Invalid captcha entered, please try again.', THEME_NAME);
			}
		}
		
		$messages = '';
		
		if($t->validation->run() !== FALSE && empty($t->validation->_error_array))
		{
			$name = $t->validation->post('contact_name');
			$email = $t->validation->post('contact_email');
			$subject = $t->validation->post('contact_subject');
			$message = $t->validation->post('contact_message');
			$contact_to = ( kvalue($settings, 'contact_email') ) ? kvalue($settings, 'contact_email') : get_option('admin_email');
			
			$headers = 'From: '.$name.' <'.$email.'>' . "\r\n";
			wp_mail($contact_to, $subject, $message, $headers);
			
			$message = kvalue($settings, 'success_msg') ? $settings['success_msg'] : sprintf( __('Thank you <strong>%s</strong> for using our contact form! Your email was successfully sent and we will be in touch with you soon.',THEME_NAME), $name);
	
			$messages = '<div class="alert alert-success">'.__('SUCCESS! ', THEME_NAME).$message.'</div>';
								
			if( kvalue($settings, 'redirect_url')){
				wp_redirect(kvalue($settings, 'redirect_url'));exit;
			}
		}else
		{
			 if( is_array( $t->validation->_error_array ) )
			 {
				 foreach( $t->validation->_error_array as $msg )
				 {
					 $messages .= '<div class="alert alert-error">'.__('Error! ', THEME_NAME).$msg.'</div>';
				 }
			 }
		}
		
		echo $messages;exit;
	}
	
	
}


new Ajax_Handler;