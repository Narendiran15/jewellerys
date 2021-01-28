<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
#error_reporting(E_ALL); ini_set('display_errors', '1');

class Mail_model extends My_Model
{
	public function __construct()
	{
		parent::__construct();
		error_reporting(0);
	}

     public function send_contact_mail($new_array) {
		$newsid = '1';$message='';
		$template_values = $this->mail_model->get_template_details ( $newsid );  
        if(count($template_values)==1){ 
		$template_values=$template_values[0];
		$adminnewstemplateArr = array (
				'email_title' => $this->config->item ( 'site_name' ),
				'name' => $new_array['name'],
				'subject_message' =>$new_array['subject'],
				'email' =>$new_array['email'],
				'body' => $new_array['body'],
				'site_name' => $this->config->item ( 'site_name' ),
				'logo' => $this->data['logo']
		);
		extract ( $adminnewstemplateArr );
		$subject =strtr( $template_values ['subject'],array('{$name}'=>$new_array["name"],'{$email}'=>$new_array["email"]));
		$message .= '<!DOCTYPE HTML>
			<html>
			<head>
			<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
			<meta name="viewport" content="width=device-width"/>
			<title>' . $template_values ['subject'] . '</title>
			<body>';
		include ('./email/email' . $newsid . '.php');

		$message .= '</body>
			</html>';

		$sender_name = $this->config->item ( 'site_name' );
		$sender_email = $this->config->item ( 'admin_email' );
        
		$email_values = array (
				'mail_type' => 'html',
				'from_mail_id' => $sender_email,
				'mail_name' => $sender_name,
				'to_mail_id' => $sender_email,
				'subject_message' => $subject,
				'cc_mail_id' => '',
				'bcc_mail_id' => $template_values ['bcc'],
				'body_messages' => $message
		);
        #echo '<pre>'; print_r($email_values);die;
		$email_send_to_common = $this->mail_model->common_email_send ( $email_values );
        }
		
	}
	
	public function common_mail_withoutTemplate($email,$usermessage,$sub) {
		$message='';
		$adminnewstemplateArr = array (
				'email_title' => $this->config->item ( 'site_name' ),
				'message' => $message,				
				'site_name' => $this->config->item ( 'site_name' ),
				'logo' => $this->data['logo']
		);
		extract ( $adminnewstemplateArr );
		$message .= '<!DOCTYPE HTML>
			<html>
			<head>
			<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
			<meta name="viewport" content="width=device-width"/>
			<title></title>
			<body>';
		$message.=$usermessage;

		$message .= '</body>
			</html>';

		$sender_name = $this->config->item ( 'site_name' );
		$sender_email = $this->config->item ( 'admin_email' );
        
		$email_values = array (
				'mail_type' => 'html',
				'from_mail_id' => $sender_email,
				'mail_name' => $sender_name,
				'to_mail_id' => $email,
				'subject_message' =>$sub ,
				'cc_mail_id' => '',
				'bcc_mail_id' => '',
				'body_messages' => $message
		);
       
		$email_send_to_common = $this->mail_model->common_email_send ( $email_values );
        
	}
	

    
	public function send_newsletter_mail($new_array) {
		ini_set('max_execution_time', 0);
		if($new_array["user_type"]=="1"){
			$newsletter_user=$this->mail_model->get_all_details(NEWSLETTER,array()); 
			foreach($newsletter_user->result() as $nuser){
			$subject = 'From: ' . $new_array["subject"];
			$message="";
			$message = '<!DOCTYPE HTML>
				<html>
				<head>
				<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
				<meta name="viewport" content="width=device-width"/>
				<title>' . $new_array["subject"] . '</title>
				<body>'.$new_array["detail"];
			

			$message .= '</body>
				</html>';

			$sender_name = $this->config->item ( 'site_name' );
			$sender_email = $this->config->item ( 'smtp_user' )==""?$this->config->item ( 'admin_email' ):$this->config->item ( 'smtp_user' );

			$email_values = array (
					'mail_type' => 'html',
					'from_mail_id' => $sender_email,
					'mail_name' => $sender_name,
					'to_mail_id' => $nuser->email,
					'subject_message' => $new_array ['subject'],
					'cc_mail_id' => '',
					'body_messages' => $message
			);
		    #echo '<pre>'; print_r($email_values);
			$email_send_to_common = $this->mail_model->common_email_send ( $email_values );
			}
        }
		if($new_array["user_type"]=="0"){
			$newsletter_user=$this->mail_model->get_all_details(USERS,array()); 
			foreach($newsletter_user->result() as $nuser){
			$subject = 'From: ' . $new_array["subject"];
			$message="";
			$message = '<!DOCTYPE HTML>
				<html>
				<head>
				<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
				<meta name="viewport" content="width=device-width"/>
				<title>' . $new_array["subject"] . '</title>
				<body>'.$new_array["detail"];
			

			$message .= '</body>
				</html>';

			$sender_name = $this->config->item ( 'site_name' );
			$sender_email = $this->config->item ( 'smtp_user' )==""?$this->config->item ( 'admin_email' ):$this->config->item ( 'smtp_user' );

			$email_values = array (
					'mail_type' => 'html',
					'from_mail_id' => $sender_email,
					'mail_name' => $sender_name,
					'to_mail_id' => $nuser->email,
					'subject_message' => $new_array ['subject'],
					'cc_mail_id' => '',
					'body_messages' => $message
			);
		    #echo '<pre>'; print_r($email_values);
			$email_send_to_common = $this->mail_model->common_email_send ( $email_values );
			}
        }
		else{
			$emails=$new_array['specific_users'];
			if(!empty($emails)){ foreach($emails as $email){
			$message="";
			$subject = 'From: ' . $new_array["subject"];
			$message .= '<!DOCTYPE HTML>
				<html>
				<head>
				<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
				<meta name="viewport" content="width=device-width"/>
				<title>' . $new_array["subject"] . '</title>
				<body>'.$new_array["detail"];
			

			$message .= '</body>
				</html>';

			$sender_name = $this->config->item ( 'site_name' );
			$sender_email = $this->config->item ( 'smtp_user' )==""?$this->config->item ( 'admin_email' ):$this->config->item ( 'smtp_user' );

			$email_values = array (
					'mail_type' => 'html',
					'from_mail_id' => $sender_email,
					'mail_name' => $sender_name,
					'to_mail_id' => $email,
					'subject_message' => $new_array ['subject'],
					'cc_mail_id' => '',
					'body_messages' => $message
			);
		    #echo '<pre>'; print_r($email_values);
			$email_send_to_common = $this->mail_model->common_email_send ( $email_values );
			}
			}
		}
		
	}
	 
	 public function send_login_confirmation($email,$password,$company_name) {
		
		$newsid = '2';$message='';
		$template_values = $this->landing_model->get_template_details ( $newsid );  
        if(count($template_values)==1){ 
		$template_values=$template_values[0];
		$adminnewstemplateArr = array (
				'email_title' => $this->config->item ( 'site_name' ),
				'site_name' => $this->config->item ( 'site_name' ),
				'site_url' => $this->config->item ( 'base_url' ),
				'company_name' => $company_name,
				'password' => $password,
				'email' => $email,
				'logo' => $this->data['logo']
		);
		extract ( $adminnewstemplateArr );
		$subject = 'From: ' . $this->config->item ( 'email_title' ) . ' - ' . $template_values ['subject'];
		$message .= '<!DOCTYPE HTML>
			<html>
			<head>
			<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
			<meta name="viewport" content="width=device-width"/>
			<title>' . $template_values ['subject'] . '</title>
			<body>';
		include ('./email/email' . $newsid . '.php');

		$message .= '</body>
			</html>';

		$sender_name = $this->config->item ( 'site_name' );
		$sender_email = $this->config->item ( 'admin_email' );

		$email_values = array (
				'mail_type' => 'html',
				'from_mail_id' => $sender_email,
				'mail_name' => $sender_name,
				'to_mail_id' => $email,
				'subject_message' => $template_values ['subject'],
				'cc_mail_id' => '',
				'bcc_mail_id' => $template_values ['bcc'],
				'body_messages' => $message
		);
       
		$email_send_to_common = $this->landing_model->common_email_send ( $email_values );
        }
		
	}
	
	 public function send_registration_user($new_array) {
		$newsid = '3';$message='';
		$template_values = $this->mail_model->get_template_details ( $newsid );  
        if(count($template_values)==1){ 
		$template_values=$template_values[0];
		$adminnewstemplateArr = array (
				'email_title' => $this->config->item ( 'site_name' ),
				'company_name' => $new_array['company_name'],
				'contact_name' =>$new_array['contact_name'],
				'contact_email' => $new_array['contact_email'],
				'city_country' => $new_array['city_country'],
				'phone' =>$new_array['phone'],
				'email' => $new_array['email'],
				'site_name' => $this->config->item ( 'site_name' ),
				'logo' => $this->data['logo']
		);
		extract ( $adminnewstemplateArr );
		$subject = 'From: ' . $this->config->item ( 'email_title' ) . ' - ' . $template_values ['subject'];
		$message .= '<!DOCTYPE HTML>
			<html>
			<head>
			<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
			<meta name="viewport" content="width=device-width"/>
			<title>' . $template_values ['subject'] . '</title>
			<body>';
		include ('./email/email' . $newsid . '.php');

		$message .= '</body>
			</html>';

		$sender_name = $this->config->item ( 'site_name' );
		$sender_email = $this->config->item ( 'admin_email' );
        
		$email_values = array (
				'mail_type' => 'html',
				'from_mail_id' => $sender_email,
				'mail_name' => $sender_name,
				'to_mail_id' => $new_array['contact_email'],
				'subject_message' => $template_values ['subject'],
				'cc_mail_id' => '',
				'bcc_mail_id' => $template_values ['bcc'],
				'body_messages' => $message
		);
       
		$email_send_to_common = $this->mail_model->common_email_send ( $email_values );
        }
		#echo '<pre>'; print_r($email_values);die;
	}
	
	public function send_registration_admin($new_array) {
		$newsid = '4';$message='';
		$template_values = $this->mail_model->get_template_details ( $newsid );  
        if(count($template_values)==1){ 
		$template_values=$template_values[0];
		$adminnewstemplateArr = array (
				'email_title' => $this->config->item ( 'site_name' ),
				'company_name' => $new_array['company_name'],
				'trading_name' => $new_array['trading_name'],
				'contact_name' =>$new_array['contact_name'],
				'contact_email' => $new_array['contact_email'],
				'branches' => $new_array['branches'],
				'hear_about' => $new_array['hear_about'],
				'city_country' => $new_array['city_country'],
				'url' => $new_array['url'],
				'site_name' => $this->config->item ( 'site_name' ),
				'logo' => $this->data['logo']
		);
		extract ( $adminnewstemplateArr );
		$subject = 'From: ' . $this->config->item ( 'email_title' ) . ' - ' . $template_values ['subject'];
		$message .= '<!DOCTYPE HTML>
			<html>
			<head>
			<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
			<meta name="viewport" content="width=device-width"/>
			<title>' . $template_values ['subject'] . '</title>
			<body>';
		include ('./email/email' . $newsid . '.php');

		$message .= '</body>
			</html>';

		$sender_name = $this->config->item ( 'site_name' );
		$sender_email = $this->config->item ( 'admin_email' );
        
		$email_values = array (
				'mail_type' => 'html',
				'from_mail_id' => $sender_email,
				'mail_name' => $sender_name,
				'to_mail_id' => $sender_email,
				'subject_message' => $template_values ['subject'],
				'cc_mail_id' => '',
				'bcc_mail_id' => $template_values ['bcc'],
				'body_messages' => $message
		);
        #echo '<pre>'; print_r($email_values);die;
		$email_send_to_common = $this->mail_model->common_email_send ( $email_values );
        }
		
	}
	
	 
    
  
	
	public function send_reference_request($new_array) {
		$newsid = '5';$message='';
		$template_values = $this->mail_model->get_template_details ( $newsid );  
        if(count($template_values)==1){ 
		$template_values=$template_values[0];
		$adminnewstemplateArr = array (
				'email_title' => $this->config->item ( 'site_name' ),
				'ReferenceJobTitle' =>$new_array['ReferenceJobTitle'],
				'applicant_trade_name' =>$new_array['applicant_trade_name'],
				'applicant_country' =>$new_array['applicant_country'],
				'ReferenceName' =>$new_array['ReferenceName'],
				'reference_email' =>$new_array['email'],
				'ReferenceCompany' =>$new_array['ReferenceCompany'],
				'applicant_primaryContactName' =>$new_array['applicant_primaryContactName'],				
				'site_name' => $this->config->item ( 'site_name' ),
				'url' =>base_url('site/landing/save_reference_request/'.$new_array["id"]),
				'link' =>base_url('site/landing/reference_link/'.$new_array["id"].'/'.urlencode($new_array['email'])),
				'logo' => $this->data['logo']
		);
		extract ( $adminnewstemplateArr );
		$subject =strtr( $template_values ['subject'],array('{$applicant_trade_name}'=>$new_array["applicant_trade_name"],'{$applicant_country}'=>$new_array["applicant_country"]));
		$message .= '<!DOCTYPE HTML>
			<html>
			<head>
			<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
			<meta name="viewport" content="width=device-width"/>
			<title>' . $template_values ['subject'] . '</title>
			<body>';
		include ('./email/email' . $newsid . '.php');

		$message .= '</body>
			</html>';

		$sender_name = $this->config->item ( 'site_name' );
		$sender_email = $this->config->item ( 'admin_email' );
        $message=str_replace('$textarea_box','<textarea name="notes" cols="100" rows="3"></textarea>',$message);
		$email_values = array (
				'mail_type' => 'html',
				'from_mail_id' => $sender_email,
				'mail_name' => $sender_name,
				'to_mail_id' => $new_array['email'],
				'subject_message' => $subject,
				'cc_mail_id' => '',
				'bcc_mail_id' => $template_values ['bcc'],
				'body_messages' => $message
		);
        #echo '<pre>'; print_r($email_values);die;
		$email_send_to_common = $this->mail_model->common_email_send ( $email_values );
        }
		
	}
	
     public function send_reference_request_response($new_array) {
		$newsid = '12';$message='';
		$template_values = $this->mail_model->get_template_details ( $newsid );  
        if(count($template_values)==1){ 
		$template_values=$template_values[0];
		$adminnewstemplateArr = array (
				'email_title' => $this->config->item ( 'site_name' ),
				'company_id' =>$new_array['company_id'],
				'reference_email' =>$new_array['reference_email'],
				'q1' =>$new_array['q1'],
				'q2' =>$new_array['q2'],
				'q3' =>$new_array['q3'],
				'q4' =>$new_array['q4'],
				'q5' =>$new_array['q5'],
				'notes' =>$new_array['notes'],
				'company_name' =>$new_array['company_name'],
				'to_email' =>$new_array['to_email'],				
				'site_name' => $this->config->item ( 'site_name' ),				
				'logo' => $this->data['logo']
		);
		extract ( $adminnewstemplateArr );
		$subject =strtr( $template_values ['subject'],array('{$reference_email}'=>$new_array["reference_email"],'{$company_name}'=>$new_array["company_name"]));
		$message .= '<!DOCTYPE HTML>
			<html>
			<head>
			<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
			<meta name="viewport" content="width=device-width"/>
			<title>' . $template_values ['subject'] . '</title>
			<body>';
		include ('./email/email' . $newsid . '.php');

		$message .= '</body>
			</html>';

		$sender_name = $this->config->item ( 'site_name' );
		$sender_email = $this->config->item ( 'admin_email' );
        $message=str_replace('$textarea_box','<textarea name="notes" cols="100" rows="3"></textarea>',$message);
		$email_values = array (
				'mail_type' => 'html',
				'from_mail_id' => $sender_email,
				'mail_name' => $sender_name,
				'to_mail_id' => $new_array['to_email'],
				'subject_message' => $subject,
				'cc_mail_id' => $new_array['reference_email'],
				'bcc_mail_id' => $template_values ['bcc'],
				'body_messages' => $message
		);
        #echo '<pre>'; print_r($email_values);die;
		$email_send_to_common = $this->mail_model->common_email_send ( $email_values );
        }
		
	}
	
	public function send_office_request_to_admin_mail($new_array) {
		$newsid = '6';$message='';
		$template_values = $this->mail_model->get_template_details ( $newsid );  
        if(count($template_values)==1){ 
		$template_values=$template_values[0];
		$adminnewstemplateArr = array (
				'email_title' => $this->config->item ( 'site_name' ),
				'company_name' => $new_array['company_name'],
				'branch_name' =>$new_array['branch_name'],
				'ip_address' =>$new_array['ip_address'],
				'site_name' => $this->config->item ( 'site_name' ),
				'logo' => $this->data['logo']
		);
		extract ( $adminnewstemplateArr );
		$subject = 'From: ' . $this->config->item ( 'email_title' ) . ' - ' . $template_values ['subject'];
		$message .= '<!DOCTYPE HTML>
			<html>
			<head>
			<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
			<meta name="viewport" content="width=device-width"/>
			<title>' . $template_values ['subject'] . '</title>
			<body>';
		include ('./email/email' . $newsid . '.php');

		$message .= '</body>
			</html>';

		$sender_name = $this->config->item ( 'site_name' );
		$sender_email = $this->config->item ( 'admin_email' );
        
		$email_values = array (
				'mail_type' => 'html',
				'from_mail_id' => $sender_email,
				'mail_name' => $sender_name,
				'to_mail_id' => $sender_email,
				'subject_message' =>strtr($template_values ['subject'], $adminnewstemplateArr) ,
				'cc_mail_id' => '',
				'bcc_mail_id' => $template_values ['bcc'],
				'body_messages' => $message
		);
       
		$email_send_to_common = $this->mail_model->common_email_send ( $email_values );
        }
		
	}
	
	 public function send_admin_news_create($new_array) {
		$newsid = '8';$message='';
		$template_values = $this->mail_model->get_template_details ( $newsid );  
        if(count($template_values)==1){ 
		$template_values=$template_values[0];
		$adminnewstemplateArr = array (
				'email_title' => $this->config->item ( 'site_name' ),
				'author' => $new_array['author'],
				'title' =>$new_array['title'],
				'company_name' =>$new_array['company_name'],
				'author_email' =>$new_array['author_email'],
				'post_type' =>$new_array['post_type']=="0"?"Member News.":"Industry News.",
				'post_date' =>$new_array['post_date'],				
				'site_name' => $this->config->item ( 'site_name' ),
				'logo' => $this->data['logo']
		);
		extract ( $adminnewstemplateArr );
		$subject =strtr( $template_values ['subject'],array('{$company_name}'=>$new_array["company_name"],'{$title}'=>$new_array["title"]));
		$message .= '<!DOCTYPE HTML>
			<html>
			<head>
			<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
			<meta name="viewport" content="width=device-width"/>
			<title>' . $template_values ['subject'] . '</title>
			<body>';
		include ('./email/email' . $newsid . '.php');

		$message .= '</body>
			</html>';

		$sender_name = $this->config->item ( 'site_name' );
		$sender_email = $this->config->item ( 'admin_email' );
        
		$email_values = array (
				'mail_type' => 'html',
				'from_mail_id' => $sender_email,
				'mail_name' => $sender_name,
				'to_mail_id' => $sender_email,
				'subject_message' => $subject,
				'cc_mail_id' => '',
				'bcc_mail_id' => $template_values ['bcc'],
				'body_messages' => $message
		);
        #echo '<pre>'; print_r($email_values);die;
		$email_send_to_common = $this->mail_model->common_email_send ( $email_values );
        }
		
	}
	public function send_referal_mail_toAdmin($post) {
		
		 $newsid = '10';$message='';
		$template_values = $this->mail_model->get_template_details ( $newsid );  
        if(count($template_values)==1){ 
		$template_values=$template_values[0];
		$adminnewstemplateArr = array (
				'email_title' => $this->config->item ( 'site_name' ),
				'site_name' => $this->config->item ( 'site_name' ),
				'site_url' => $this->config->item ( 'base_url' ),
				'prospect_name' => $post["prospect_contact_name"],
				'prospect_email' => $post["prospect_email"],
				'member_company' => $post["member_company"],
				'member_name' => $post["member_name"],
				'company_prospect' => $post["prospect_company"],				
				'logo' => $this->data['logo']
		);
		extract ( $adminnewstemplateArr );
		$subject = $template_values ['subject'];
		$message .= '<!DOCTYPE HTML>
			<html>
			<head>
			<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
			<meta name="viewport" content="width=device-width"/>
			<title>' . $template_values ['subject'] . '</title>
			<body>';
		include ('./email/email' . $newsid . '.php');

		$message .= '</body>
			</html>';

		$sender_name = $this->config->item ( 'site_name' );
		$sender_email = $this->config->item ( 'admin_email' );

		
       $email_values = array (
				'mail_type' => 'html',
				'from_mail_id' => $sender_email,
				'mail_name' => $sender_name,
				'to_mail_id' => $sender_email,
				'subject_message' => strtr($subject, $adminnewstemplateArr),
				'cc_mail_id' => '',	
				'bcc_mail_id' => $template_values ['bcc'],	
				'body_messages' => $message
		);
        #echo '<pre>'; print_r($email_values);
		$email_send_to_common = $this->landing_model->common_email_send ( $email_values );
		#echo '<pre>'; print_r($email_values);die;
        }
		
	}

    public function send_referal_mail($email,$post) {
		
		 $newsid = '9';$message='';
		$template_values = $this->mail_model->get_template_details ( $newsid );  
        if(count($template_values)==1){ 
		$template_values=$template_values[0];
		$adminnewstemplateArr = array (
				'email_title' => $this->config->item ( 'site_name' ),
				'site_name' => $this->config->item ( 'site_name' ),
				'site_url' => $this->config->item ( 'base_url' ),
				'prospect_name' => $post["prospect_name"],
				'member_company' => $post["member_company"],
				'member_name' => $post["member_name"],
				'company_prospect' => $post["company_prospect"],				
				'logo' => $this->data['logo']
		);
		extract ( $adminnewstemplateArr );
		$subject = $template_values ['subject'];
		$message .= '<!DOCTYPE HTML>
			<html>
			<head>
			<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
			<meta name="viewport" content="width=device-width"/>
			<title>' . $template_values ['subject'] . '</title>
			<body>';
		include ('./email/email' . $newsid . '.php');

		$message .= '</body>
			</html>';

		$sender_name = $this->config->item ( 'site_name' );
		$sender_email = $this->config->item ( 'admin_email' );

		
       $email_values = array (
				'mail_type' => 'html',
				'from_mail_id' => $sender_email,
				'mail_name' => $sender_name,
				'to_mail_id' => $email,
				'subject_message' => strtr($subject, $adminnewstemplateArr),
				'cc_mail_id' => '',	
				'bcc_mail_id' => $template_values ['bcc'],	
				'body_messages' => $message
		);
       
		$email_send_to_common = $this->landing_model->common_email_send ( $email_values );
        }
		
	}

    public function send_contact_enquiry_email($post) {
		$newsid = '11';$message='';
		$template_values = $this->mail_model->get_template_details ( $newsid );  
        if(count($template_values)==1){ 
		$template_values=$template_values[0];
		$adminnewstemplateArr = array (
				'email_title' => $this->config->item ( 'site_name' ),
				"name"=>$post["name"],"job_title"=>$post["job_title"],"company_name"=>$post["company_name"],"messages"=>strip_tags($post['messages']),"city"=>$post['city'],"country"=>$post['country'],"email"=>$post['email'],"phone"=>$post['phone'],"fax"=>$post['fax'],"fax"=>$post['fax'],"subject_msg"=>$post["subject"],"member_name"=>$post["member_name"],"member_email"=>$post["member_email"],
				'site_name' => $this->config->item ( 'site_name' ),
				'logo' => $this->data['logo']
		);
		extract ( $adminnewstemplateArr );
		$subject = 'From: ' . $this->config->item ( 'email_title' ) . ' - ' . $template_values ['subject'];
		$message .= '<!DOCTYPE HTML>
			<html>
			<head>
			<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
			<meta name="viewport" content="width=device-width"/>
			<title>' . $template_values ['subject'] . '</title>
			<body>';
		include ('./email/email' . $newsid . '.php');

		$message .= '</body>
			</html>';

		$sender_name = $this->config->item ( 'site_name' );
		$sender_email = $this->config->item ( 'admin_email' );
        
		$email_values = array (
				'mail_type' => 'html',
				'from_mail_id' => $sender_email,
				'mail_name' => $sender_name,
				'to_mail_id' => $post['member_email'],
				'subject_message' => $template_values ['subject'],
				'cc_mail_id' => '',
				'bcc_mail_id' => $template_values ['bcc'],
				'body_messages' => $message
		);
        #echo "<pre>"; print_r($email_values);die;
		$email_send_to_common = $this->mail_model->common_email_send ( $email_values );
        }
		
	} 	
     
	
	
	 public function send_adv_request($new_array) {
		$newsid = '6';$message='';
		$template_values = $this->mail_model->get_template_details ( $newsid );  
        if(count($template_values)==1){ 
		$template_values=$template_values[0];
		$adminnewstemplateArr = array (
				'email_title' => $this->config->item ( 'site_name' ),
				'company_name' =>$new_array['company_name'],
				'primary_contact' =>$new_array['primary_contact'],
				'ip_address' =>$new_array['ip_address'],
				'site_name' => $this->config->item ( 'site_name' ),
				'logo' => $this->data['logo']
		);
		extract ( $adminnewstemplateArr );
		$subject =strtr( $template_values ['subject'],array('{$name}'=>$new_array["name"],'{$email}'=>$new_array["email"]));
		$message .= '<!DOCTYPE HTML>
			<html>
			<head>
			<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
			<meta name="viewport" content="width=device-width"/>
			<title>' . $template_values ['subject'] . '</title>
			<body>';
		include ('./email/email' . $newsid . '.php');

		$message .= '</body>
			</html>';

		$sender_name = $this->config->item ( 'site_name' );
		$sender_email = $this->config->item ( 'admin_email' );
        
		$email_values = array (
				'mail_type' => 'html',
				'from_mail_id' => $sender_email,
				'mail_name' => $sender_name,
				'to_mail_id' => $sender_email,
				'subject_message' => $subject,
				'cc_mail_id' => '',
				'bcc_mail_id' => $template_values ['bcc'],
				'body_messages' => $message
		);
        #echo '<pre>'; print_r($email_values);die;
		$email_send_to_common = $this->mail_model->common_email_send ( $email_values );
        }
		
	}
	
	
	public function send_user_password_link($name,$email,$link) {
		$newsid = '7';$message='';
		$template_values = $this->mail_model->get_template_details ( $newsid );  
        if(count($template_values)==1){ 
		$template_values=$template_values[0];
		$adminnewstemplateArr = array (
				'email_title' => $this->config->item ( 'site_name' ),
				'site_name' => $this->config->item ( 'site_name' ),
				'name' => $name,
				'link' =>$link,
				'logo' => $this->data['logo']
		);
		extract ( $adminnewstemplateArr );
		$subject = 'From: ' . $this->config->item ( 'email_title' ) . ' - ' . $template_values ['subject'];
		$message .= '<!DOCTYPE HTML>
			<html>
			<head>
			<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
			<meta name="viewport" content="width=device-width"/>
			<title>' . $template_values ['subject'] . '</title>
			<body>';
		include ('./email/email' . $newsid . '.php');

		$message .= '</body>
			</html>';

		$sender_name = $this->config->item ( 'site_name' );
		$sender_email = $this->config->item ( 'admin_email' );

		$email_values = array (
				'mail_type' => 'html',
				'from_mail_id' => $sender_email,
				'mail_name' => $sender_name,
				'to_mail_id' => $email,
				'subject_message' => $template_values ['subject'],
				'cc_mail_id' => '',
				'bcc_mail_id' => $template_values ['bcc'],
				'body_messages' => $message
		);
        #echo "<pre>"; print_r($email_values);
		$email_send_to_common = $this->mail_model->common_email_send ( $email_values );
        }
		
	}
	public function send_invoice_mail($email,$username,$invoice_file,$invoice_no) {
		
		 $newsid = '14';$message='';
		$template_values = $this->mail_model->get_template_details ( $newsid );  
        if(count($template_values)==1){ 
		$template_values=$template_values[0];
		$adminnewstemplateArr = array (
				'email_title' => $this->config->item ( 'site_name' ),
				'site_name' => $this->config->item ( 'site_name' ),
				'site_url' => $this->config->item ( 'base_url' ),
				'company_name' => $username,
				'invoice_url' => base_url().'invoices/'.$invoice_no.".pdf",
				'invoice_no' => $invoice_no,
				'logo' => $this->data['logo']
		);
		extract ( $adminnewstemplateArr );
		$subject = $template_values ['subject'];
		$message .= '<!DOCTYPE HTML>
			<html>
			<head>
			<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
			<meta name="viewport" content="width=device-width"/>
			<title>' . $template_values ['subject'] . '</title>
			<body>';
		include ('./email/email' . $newsid . '.php');

		$message .= '</body>
			</html>';

		$sender_name = $this->config->item ( 'site_name' );
		$sender_email = $this->config->item ( 'admin_email' );

		$email_values = array (
				'mail_type' => 'html',
				'from_mail_id' => $sender_email,
				'mail_name' => $sender_name,
				'to_mail_id' => $email,
				'subject_message' => strtr($subject, $adminnewstemplateArr),
				'cc_mail_id' => '',
				'bcc_mail_id' => $template_values ['bcc'],
				'file' => './invoices/'.$invoice_file,
				'attachment' => 1,
				'body_messages' => $message
		);
        #echo '<pre>';print_r($email_values);die;
		$email_send_to_common = $this->landing_model->common_email_send ( $email_values );
        }
		
	}
	public function send_member_confirmation_mail($company,$email) {
		
		 $newsid = '15';$message='';
		$template_values = $this->mail_model->get_template_details ( $newsid );  
        if(count($template_values)==1){ 
		$template_values=$template_values[0];
		$adminnewstemplateArr = array (
				'email_title' => $this->config->item ( 'site_name' ),
				'site_name' => $this->config->item ( 'site_name' ),
				'site_url' => $this->config->item ( 'base_url' ),
				'company_name' => $company,
				'logo' => $this->data['logo']
		);
		extract ( $adminnewstemplateArr );
		$subject = $template_values ['subject'];
		$message .= '<!DOCTYPE HTML>
			<html>
			<head>
			<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
			<meta name="viewport" content="width=device-width"/>
			<title>' . $template_values ['subject'] . '</title>
			<body>';
		include ('./email/email' . $newsid . '.php');

		$message .= '</body>
			</html>';

		$sender_name = $this->config->item ( 'site_name' );
		$sender_email = $this->config->item ( 'admin_email' );

		
       $email_values = array (
				'mail_type' => 'html',
				'from_mail_id' => $sender_email,
				'mail_name' => $sender_name,
				'to_mail_id' => $email,
				'subject_message' => strtr($subject, $adminnewstemplateArr),
				'cc_mail_id' => '',	
				'bcc_mail_id' => $template_values ['bcc'],	
				'body_messages' => $message
		);
       
		$email_send_to_common = $this->landing_model->common_email_send ( $email_values );
        }
		
	}
	
	
     public function send_advertisinguser_mail($email,$post) {
		
		 $newsid = '8';$message='';
		$template_values = $this->mail_model->get_template_details ( $newsid );  
        if(count($template_values)==1){ 
		$template_values=$template_values[0];
		$adminnewstemplateArr = array (
				'email_title' => $this->config->item ( 'site_name' ),
				'site_name' => $this->config->item ( 'site_name' ),
				'site_url' => $this->config->item ( 'base_url' ),
				'company_name' => $post["company_name"],
				'logo' => $this->data['logo']
		);
		extract ( $adminnewstemplateArr );
		$subject = $template_values ['subject'];
		$message .= '<!DOCTYPE HTML>
			<html>
			<head>
			<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
			<meta name="viewport" content="width=device-width"/>
			<title>' . $template_values ['subject'] . '</title>
			<body>';
		include ('./email/email' . $newsid . '.php');

		$message .= '</body>
			</html>';

		$sender_name = $this->config->item ( 'site_name' );
		$sender_email = $this->config->item ( 'admin_email' );

		
       $email_values = array (
				'mail_type' => 'html',
				'from_mail_id' => $sender_email,
				'mail_name' => $sender_name,
				'to_mail_id' => $email,
				'subject_message' => strtr($subject, $adminnewstemplateArr),
				'cc_mail_id' => '',	
				'bcc_mail_id' => $template_values ['bcc'],	
				'body_messages' => $message
		);
       
		$email_send_to_common = $this->landing_model->common_email_send ( $email_values );
        }
		
	}
	
	
		
	public function send_solication($newsid,$email,$company) {
		$message='';
		$template_values = $this->mail_model->get_template_details ( $newsid );  
        if(count($template_values)==1){ 
		$template_values=$template_values[0];
		$adminnewstemplateArr = array (
				'email_title' => $this->config->item ( 'site_name' ),
				'company' => $company,
				'site_name' => $this->config->item ( 'site_name' ),
				'logo' => $this->data['logo']
		);
		extract ( $adminnewstemplateArr );
		$subject = 'From: ' . $this->config->item ( 'email_title' ) . ' - ' . $template_values ['subject'];
		$message .= '<!DOCTYPE HTML>
			<html>
			<head>
			<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
			<meta name="viewport" content="width=device-width"/>
			<title>' . $template_values ['subject'] . '</title>
			<body>';
		include ('./email/email' . $newsid . '.php');

		$message .= '</body>
			</html>';

		$sender_name = $this->config->item ( 'site_name' );
		$sender_email = $this->config->item ( 'admin_email' );
        
		$email_values = array (
				'mail_type' => 'html',
				'from_mail_id' => $sender_email,
				'mail_name' => $sender_name,
				'to_mail_id' => $email,
				'subject_message' => $template_values ['subject'],
				'cc_mail_id' => '',
				'bcc_mail_id' => $template_values ['bcc'],
				'body_messages' => $message
		);
        #echo '<pre>'; print_r($email_values);
		$email_send_to_common = $this->mail_model->common_email_send ( $email_values );
        }
		
	}
	
     
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 

	public function send_search_contact_mail($new_array) {
		$newsid = '6';$message='';
		$template_values = $this->mail_model->get_template_details ( $newsid );  
		$user=$this->mail_model->get_all_details(USERS,array("id"=>$new_array["user_id"]))->row();
		$sender_name = $user->username;
		$sender_email = $user->email;
        if(count($template_values)==1){ 
		$template_values=$template_values[0];
		$adminnewstemplateArr = array (
				'email_title' => $this->config->item ( 'site_name' ),
				'message_admin' =>$new_array['message'],
				'receiver_name' =>$sender_name,
				'name' => $new_array['contact_name'],
				'phone' =>$new_array['phone'],
				'email' => $new_array['email'],
				'site_name' => $this->config->item ( 'site_name' ),
				'logo' => $this->data['logo']
		);
		extract ( $adminnewstemplateArr );
		$subject = 'From: ' . $this->config->item ( 'email_title' ) . ' - ' . $template_values ['subject'];
		$message .= '<!DOCTYPE HTML>
			<html>
			<head>
			<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
			<meta name="viewport" content="width=device-width"/>
			<title>' . $template_values ['subject'] . '</title>
			<body>';
		include ('./email/email' . $newsid . '.php');

		$message .= '</body>
			</html>';

		
        
		$email_values = array (
				'mail_type' => 'html',
				'from_mail_id' => $sender_email,
				'mail_name' => $sender_name,
				'to_mail_id' => $sender_email,
				'subject_message' => $template_values ['subject'],
				'cc_mail_id' => '',
				'bcc_mail_id' => $template_values ['bcc'],
				'body_messages' => $message
		);
        #echo '<pre>'; print_r($new_array);
		$email_send_to_common = $this->mail_model->common_email_send ( $email_values );
        }
		
	}
	public function send_press_release_mail($new_array) {
		$newsid = '2';$message='';
		$template_values = $this->mail_model->get_template_details ( $newsid );  
        if(count($template_values)==1){ 
		$template_values=$template_values[0];
		$adminnewstemplateArr = array (
				'email_title' => $this->config->item ( 'site_name' ),
				'post_date' =>$new_array['post_date'],
				'title' => $new_array['title'],
				'content' =>$new_array['content'],
				'overview' => $new_array['overview'],
				'submitted_by' => $new_array['submitted_by'],
				'submitter_email' => $new_array['submitter_email'],
				'site_name' => $this->config->item ( 'site_name' ),
				'logo' => $this->data['logo']
		);
		extract ( $adminnewstemplateArr );
		$subject = 'From: ' . $this->config->item ( 'email_title' ) . ' - ' . $template_values ['subject'];
		$message .= '<!DOCTYPE HTML>
			<html>
			<head>
			<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
			<meta name="viewport" content="width=device-width"/>
			<title>' . $template_values ['subject'] . '</title>
			<body>';
		include ('./email/email' . $newsid . '.php');

		$message .= '</body>
			</html>';

		$sender_name = $this->config->item ( 'site_name' );
		$sender_email = $this->config->item ( 'admin_email' );
        
		$email_values = array (
				'mail_type' => 'html',
				'from_mail_id' => $sender_email,
				'mail_name' => $sender_name,
				'to_mail_id' => $sender_email,
				'subject_message' => $template_values ['subject'],
				'cc_mail_id' => '',
				'bcc_mail_id' => $template_values ['bcc'],
				'body_messages' => $message
		);
       
		$email_send_to_common = $this->mail_model->common_email_send ( $email_values );
        }
		
	}
	

	public function send_listing_confirmation_mail($company,$email) {
		
		 $newsid = '8';$message='';
		$template_values = $this->mail_model->get_template_details ( $newsid );  
        if(count($template_values)==1){ 
		$template_values=$template_values[0];
		$adminnewstemplateArr = array (
				'email_title' => $this->config->item ( 'site_name' ),
				'site_name' => $this->config->item ( 'site_name' ),
				'site_url' => $this->config->item ( 'base_url' ),
				'company' => $company,
				'logo' => $this->data['logo']
		);
		extract ( $adminnewstemplateArr );
		$subject = $template_values ['subject'];
		$message .= '<!DOCTYPE HTML>
			<html>
			<head>
			<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
			<meta name="viewport" content="width=device-width"/>
			<title>' . $template_values ['subject'] . '</title>
			<body>';
		include ('./email/email' . $newsid . '.php');

		$message .= '</body>
			</html>';

		$sender_name = $this->config->item ( 'site_name' );
		$sender_email = $this->config->item ( 'admin_email' );

		/* $email_values = array (
				'mail_type' => 'html',
				'from_mail_id' => $sender_email,
				'mail_name' => $sender_name,
				'to_mail_id' => $email,
				'subject_message' => strtr($subject, $adminnewstemplateArr),
				'cc_mail_id' => '',
				'bcc_mail_id' => $template_values ['bcc'],
				'file' => './invoices/'.$invoice_file,
				'attachment' => 1,
				'body_messages' => $message
		); */
       $email_values = array (
				'mail_type' => 'html',
				'from_mail_id' => $sender_email,
				'mail_name' => $sender_name,
				'to_mail_id' => $email,
				'subject_message' => strtr($subject, $adminnewstemplateArr),
				'cc_mail_id' => '',	
                'bcc_mail_id' => $template_values ['bcc'],				
				'body_messages' => $message
		);
       
		$email_send_to_common = $this->landing_model->common_email_send ( $email_values );
        }
		
	}
	public function send_update_listing($company,$email,$name) {
		
		 $newsid = '26';$message='';
		$template_values = $this->mail_model->get_template_details ( $newsid );  
        if(count($template_values)==1){ 
		$template_values=$template_values[0];
		$adminnewstemplateArr = array (
				'email_title' => $this->config->item ( 'site_name' ),
				'site_name' => $this->config->item ( 'site_name' ),
				'site_url' => $this->config->item ( 'base_url' ),
				'company' => $company,
				'name' => $name,
				'logo' => $this->data['logo']
		);
		extract ( $adminnewstemplateArr );
		$subject = $template_values ['subject'];
		$message .= '<!DOCTYPE HTML>
			<html>
			<head>
			<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
			<meta name="viewport" content="width=device-width"/>
			<title>' . $template_values ['subject'] . '</title>
			<body>';
		include ('./email/email' . $newsid . '.php');

		$message .= '</body>
			</html>';

		$sender_name = $this->config->item ( 'site_name' );
		$sender_email = $this->config->item ( 'admin_email' );

		
       $email_values = array (
				'mail_type' => 'html',
				'from_mail_id' => $sender_email,
				'mail_name' => $sender_name,
				'to_mail_id' => $email,
				'subject_message' => strtr($subject, $adminnewstemplateArr),
				'cc_mail_id' => '',	
				'bcc_mail_id' => $template_values ['bcc'],	
				'body_messages' => $message
		);
        #echo '<pre>'; print_r($email_values);die;
		$email_send_to_common = $this->landing_model->common_email_send ( $email_values );
        }
		
	}
	
	public function send_promotional_mail($details,$email) {
		
		 $newsid = '27';$message='';
		 $template_values = $this->mail_model->get_template_details ( $newsid );  
        if(count($template_values)==1){ 
		$template_values=$template_values[0];
		$adminnewstemplateArr = array (
				'email_title' => $this->config->item ( 'site_name' ),
				'site_name' => $this->config->item ( 'site_name' ),
				'site_url' => $this->config->item ( 'base_url' ),
				'company' => $details['company'],
				'username' => $details['contact'],
				'logo' => $this->data['logo']
		);
		extract ( $adminnewstemplateArr );
		$subject = $template_values ['subject'];
		$message .= '<!DOCTYPE HTML>
			<html>
			<head>
			<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
			<meta name="viewport" content="width=device-width"/>
			<title>' . $template_values ['subject'] . '</title>
			<body>';
		include ('./email/email' . $newsid . '.php');

		$message .= '</body>
			</html>';

		$sender_name = $this->config->item ( 'site_name' );
		$sender_email = $this->config->item ( 'admin_email' );

		
       $email_values = array (
				'mail_type' => 'html',
				'from_mail_id' => $sender_email,
				'mail_name' => $sender_name,
				'to_mail_id' => $email,
				'subject_message' => strtr($subject, $adminnewstemplateArr),
				'cc_mail_id' => '',	
				'bcc_mail_id' => $template_values ['bcc'],	
				'body_messages' => $message
		);
        #echo '<pre>'; print_r($email_values);die;
		$email_send_to_common = $this->landing_model->common_email_send ( $email_values );
        }
		
	}
	
	
	public function get_all_booking_info($course_id){
		$this->db->select('t.email_notification_teacher as temail_notification,s.email_notification_student as semail_notification,b.*,t.username as tname,s.username as sname,c.course_title,s.email as semail,t.email as temail');
		$this->db->from(BOOKING.' as b');
		$this->db->join(COURSE.' as c','c.course_id=b.course_id');
		$this->db->join(USERS.' as t','t.id=b.teacher_id');
		$this->db->join(USERS.' as s','s.id=b.user_id');
		$this->db->where('b.course_id',$course_id);
		$this->db->where('b.booking_status',"2");
		return $query = $this->db->get();
	}
	
	public function get_all_booking_info_teacher($course_id){
		$this->db->select('b.*,t.username as tname,t.email_notification_teacher as temail_notification,s.email_notification_student as semail_notification,s.username as sname,c.course_title,s.email as semail,t.email as temail');
		$this->db->from(BOOKING.' as b');
		$this->db->join(COURSE.' as c','c.course_id=b.course_id');
		$this->db->join(USERS.' as t','t.id=b.teacher_id');
		$this->db->join(USERS.' as s','s.id=b.user_id');
		$this->db->where('b.course_id',$course_id);
		$this->db->where('b.booking_status',"2");
		$this->db->limit(1);
		return $query = $this->db->get();
	}
	public function get_all_booking_invoice($booking_id){
		$this->db->select('t.email_notification_teacher as temail_notification,s.email_notification_student as semail_notification,b.*,t.username as tname,s.username as sname,c.course_title,s.email as semail,t.email as temail,c.lession_type,c.*,b.no_of_users as booked_user_count');
		$this->db->from(BOOKING.' as b');
		$this->db->join(COURSE.' as c','c.course_id=b.course_id');
		$this->db->join(USERS.' as t','t.id=b.teacher_id');
		$this->db->join(USERS.' as s','s.id=b.user_id');
		$this->db->where('b.booking_id',$booking_id);
		$this->db->limit(1);
		return $query = $this->db->get();
	}
	
	
	
	
	public function send_teacher_notification($course_id) {
		$get_all_booking_info=$this->mail_model->get_all_booking_info_teacher($course_id); 
		if($get_all_booking_info->row()->temail_notification==1){
		$course_name=$get_all_booking_info->row()->course_title;
		$name=$get_all_booking_info->row()->tname;
		$email=$get_all_booking_info->row()->temail;
		$newsid = '3';$message='';
		$template_values = $this->mail_model->get_template_details ( $newsid );  
		if($get_all_booking_info->num_rows()>0){
        if(count($template_values)==1){ 
		$template_values=$template_values[0];
		$adminnewstemplateArr = array (
				'email_title' => $this->config->item ( 'site_name' ),
				'site_name' => $this->config->item ( 'site_name' ),
				'logo' => $this->data['logo'],
				'name' => $name,
				'course_name' => $course_name
		);
		extract ( $adminnewstemplateArr );
		$subject = 'From: ' . $this->config->item ( 'email_title' ) . ' - ' . $template_values ['subject'];
		$message .= '<!DOCTYPE HTML>
			<html>
			<head>
			<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
			<meta name="viewport" content="width=device-width"/>
			<title>' . $template_values ['subject'] . '</title>
			<body>';
		include ('./email/email' . $newsid . '.php');

		$message .= '</body>
			</html>';
		$sender_name = $this->config->item ( 'site_name' );
		$sender_email = $this->config->item ( 'admin_email' );

		$email_values = array (
				'mail_type' => 'html',
				'from_mail_id' => $sender_email,
				'mail_name' => $sender_name,
				'to_mail_id' => $email,
				'subject_message' => $template_values ['subject'],
				'cc_mail_id' => '',
				'body_messages' => $message
		);
       
		$email_send_to_common = $this->mail_model->common_email_send ( $email_values );
        }
		}
		}
		
	}
	
	public function send_user_notification($course_id,$course_title='',$email) {
		$get_all_booking_info=$this->mail_model->get_all_booking_info($course_id);
		$student_email=array();
		if($get_all_booking_info->num_rows()>0){ foreach($get_all_booking_info->result() as $booking_info){
			if($booking_info->semail_notification==1){
			$student_email[]=$booking_info->semail;
			}
			
		}
		#echo "<pre>"; print_r($student_email);die;
        if(!empty($student_email)){
		$ccarray=implode(",",$student_email);	
		
		$name="Student";
		$newsid = '4';$message='';
		$template_values = $this->mail_model->get_template_details ( $newsid );  
		
        if(count($template_values)==1){ 
		$template_values=$template_values[0];
		$adminnewstemplateArr = array (
				'email_title' => $this->config->item ( 'site_name' ),
				'site_name' => $this->config->item ( 'site_name' ),
				'logo' => $this->data['logo'],
				'name' => $name,
				'course_name' => $course_title,
		);
		extract ( $adminnewstemplateArr );
		$subject = 'From: ' . $this->config->item ( 'email_title' ) . ' - ' . $template_values ['subject'];
		$message .= '<!DOCTYPE HTML>
			<html>
			<head>
			<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
			<meta name="viewport" content="width=device-width"/>
			<title>' . $template_values ['subject'] . '</title>
			<body>';
		include ('./email/email' . $newsid . '.php');

		$message .= '</body>
			</html>';

		$sender_name = $this->config->item ( 'site_name' );
		$sender_email = $this->config->item ( 'admin_email' );

		$email_values = array (
				'mail_type' => 'html',
				'from_mail_id' => $sender_email,
				'mail_name' => $sender_name,
				'to_mail_id' => $email,
				'subject_message' => $template_values ['subject'],
				'cc_mail_id' => $ccarray,
				'body_messages' => $message
		);
        
		$email_send_to_common = $this->mail_model->common_email_send ( $email_values );
        }
		
		}
		}	
		
	}
	
	public function send_payment_reciept($booking_id){
		$this->send_payment_reciept_user($booking_id);
		$this->send_payment_reciept_teacher($booking_id);
	}
	
	public function send_payment_reciept_user($booking_id) {
		$get_all_booking_info=$this->mail_model->get_all_booking_invoice($booking_id);
		if($get_all_booking_info->num_rows()>0){
		if($get_all_booking_info->row()->semail_notification==1){		
		$course_name=$get_all_booking_info->row()->course_title;
		$name=$get_all_booking_info->row()->sname;
		$email=$get_all_booking_info->row()->semail;
		$student_count=$get_all_booking_info->row()->booked_user_count;
		$booking_no=$get_all_booking_info->row()->booking_no;
		$transaction_id=$get_all_booking_info->row()->stripe_token;
		if($get_all_booking_info->row()->is_coupon==1){
		  $tot=round($get_all_booking_info->row()->total,2);	
		  $coup_amt=round($get_all_booking_info->row()->coupon_amount,2);	
		  $coup_tot=round($get_all_booking_info->row()->coupon_total,2);	
		  $service_fee=round($get_all_booking_info->row()->service_fee,2);
		  $amount_charged_text="Total amount is $".$tot.'<br/>';
		  $amount_charged_text.="Discount amount is -$".$coup_amt.'<br/>';
		  $amount_charged_text.="Total amount is $".$coup_tot.'<br/>';
		  $total=$coup_tot;
		}
		else{
			$tot=round($get_all_booking_info->row()->total,2);
			 $amount_charged_text="Total amount is $".$tot;
			 $total=$tot;
		}
		$newsid = '5';$message='';
		$table='';
		$table.='<table style="width: 100%; text-align: left;"><tbody><tr><td style="font-weight: bold;">Date</td><td style="font-weight: bold;">Hours</td><td style="/* float: right; */    margin-right: 30px; text-align: right;font-weight:bold;">Price</td></tr>';
		$course_information=json_decode($get_all_booking_info->row()->class_info,true);
		if($get_all_booking_info->row()->lession_type==0){
		$total_session=0;if(!empty($course_information)){
			$time_list_date=array();
			$time_list_time=array();
			foreach ($course_information as $key => $row)
			{
			$time_list_date[$key] = $row['class_date'];
			
			}
			
			array_multisort($time_list_date, SORT_ASC, $course_information);
			
			foreach($course_information as $course_list){
			$date=date("d-m-Y",strtotime($course_list['class_date']));
			$month=date("M",strtotime($course_list['class_date']));
			$day_name=substr(date("D",strtotime($course_list['class_date'])),0,2);
			$course_hour=$this->course_hourse_finder_mail($course_list['class_time']);
			$course_price=$course_hour* $get_all_booking_info->row()->price_per_hour;
			$table.='<tr><td style="">'.$date.'</td><td style="">'.$course_hour.'</td><td style=" margin-right: 30px; text-align: right;">$'.$course_price.'</td></tr>';
			$total_session=$total_session+$course_price;
			}
		}}
		else{
			$session_array=json_decode($get_all_booking_info->row()->booking_info,true);
			$total_session=0;if(!empty($session_array)){
			$time_list_date=array();
			$time_list_time=array();
			foreach ($session_array as $key => $row)
			{
			$time_list_date[$key] = $row['selected_date'];
			
			}
			
			array_multisort($time_list_date, SORT_ASC, $session_array);
				foreach($session_array as $course_list){
			$date=date("d-m-Y",strtotime($course_list['selected_date']));
			$month=date("M",strtotime($course_list['selected_date']));
			$day_name=substr(date("D",strtotime($course_list['selected_date'])),0,2);
			$course_hour=$course_list['hours'];
			$course_price=$course_list['price'];
			$table.='<tr><td style="">'.$date.'</td><td style="">'.$course_hour.'</td><td style=" margin-right: 30px; text-align: right;">$'.$course_price.'</td></tr>';
			$total_session=$total_session+$course_price;
				}
			}
		}
        $table.='</tbody></table>';
		$template_values = $this->mail_model->get_template_details ( $newsid );  	
        if(count($template_values)==1){ 
		$template_values=$template_values[0];
		$adminnewstemplateArr = array (
				'email_title' => $this->config->item ( 'site_name' ),
				'site_name' => $this->config->item ( 'site_name' ),
				'logo' => $this->data['logo'],
				'name' => $name,
				'course_name' => $course_name,
				'amount_charged' => $amount_charged_text,
				'student_count' => $student_count,
				'transaction_id' => $transaction_id,
				'total_session' => "$".$total_session,
				'booked_dates_list' => $table,
				'booking_no' => $booking_no,				
				'total'=>"$".$total
		);
		#echo '<pre>'; print_r($adminnewstemplateArr);
		extract ( $adminnewstemplateArr );
		$subject = 'From: ' . $this->config->item ( 'email_title' ) . ' - ' . $template_values ['subject'];
		$message .= '<!DOCTYPE HTML>
			<html>
			<head>
			<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
			<meta name="viewport" content="width=device-width"/>
			<title>' . $template_values ['subject'] . '</title>
			<body>';
		include ('./email/email' . $newsid . '.php');

		$message .= '</body>
			</html>';

		$sender_name = $this->config->item ( 'site_name' );
		$sender_email = $this->config->item ( 'admin_email' );

		$email_values = array (
				'mail_type' => 'html',
				'from_mail_id' => $sender_email,
				'mail_name' => $sender_name,
				'to_mail_id' => $email,
				'subject_message' => $template_values ['subject'],
				'cc_mail_id' => '',
				'body_messages' => $message
		);
      # echo '<pre>'; print_r($email_values);
		$email_send_to_common = $this->mail_model->common_email_send ( $email_values );
        }		
		}
		}	
		
	}
	public function course_hourse_finder_mail($timing)
	{
		
		define("SECONDS_PER_HOUR", 60*60);
		// Calculate timestamp
		$timing=explode("-",$timing);
		$start= trim($timing[0]);
		$end=trim($timing[1]);
		$date = '03-03-1992';
		$start = strtotime($date." ".$start);
		$stop = strtotime($date." ".$end);
		
		// Diferences
		$difference = $stop - $start;
		
		// Hours
		$hours = round($difference / SECONDS_PER_HOUR, 0, PHP_ROUND_HALF_DOWN);
		
		// Minutes
		$minutes = ($difference % SECONDS_PER_HOUR) / 60;
		return $hours.".".$minutes;
	}
	public function send_payment_reciept_teacher($booking_id) {
		$get_all_booking_info=$this->mail_model->get_all_booking_invoice($booking_id);
		if($get_all_booking_info->num_rows()>0){ 
		if($get_all_booking_info->row()->temail_notification==1){
		$course_name=$get_all_booking_info->row()->course_title;
		$name=$get_all_booking_info->row()->tname;
		$sname=$get_all_booking_info->row()->sname;
		$email=$get_all_booking_info->row()->temail;
		$student_count=$get_all_booking_info->row()->booked_user_count;
		$booking_no=$get_all_booking_info->row()->booking_no;
		$transaction_id=$get_all_booking_info->row()->stripe_token;
		if($get_all_booking_info->row()->is_coupon==1){
		  $tot=round($get_all_booking_info->row()->total,2);	
		  $coup_amt=round($get_all_booking_info->row()->coupon_amount,2);	
		  $coup_tot=round($get_all_booking_info->row()->coupon_total,2);
		  $service_fee=round($get_all_booking_info->row()->service_fee,2);
		  $final=(round($coup_tot,2)-(round($service_fee+$coup_amt,2)));		  
		  $amount_charged_text="Total amount is $".$tot.'<br/>';
		  $amount_charged_text.="Discount amount is -$".$coup_amt.'<br/>';
		  $amount_charged_text.="Servicefee amount is -$".$service_fee.'<br/>';
		  $amount_charged_text.="Total amount is $".$final.'<br/>';
		   $total=round($final,2);
		   $total=round($tot,2);
		}
		else{
			 $tot=round($get_all_booking_info->row()->total,2);	
		     $service_fee=round($get_all_booking_info->row()->service_fee,2);
			 $final=(round($tot,2)-round($service_fee,2));	
			 $amount_charged_text="Total amount is $".$tot.'<br/>';
			 $amount_charged_text.="Servicefee amount is -$".$service_fee.'<br/>';
		     $amount_charged_text.="Total amount is $".$final.'<br/>';
			 $total=round($final,2);
			 $total=round($tot,2);
		}
		$newsid = '6';$message='';
		$table='';
		$table.='<table style="width: 100%; text-align: left;"><tbody><tr><td style="font-weight: bold;">Date</td><td style="font-weight: bold;">Hours</td><td style="/* float: right; */    margin-right: 30px; text-align: right;font-weight:bold;">Price</td></tr>';
		$course_information=json_decode($get_all_booking_info->row()->class_info,true);
		if($get_all_booking_info->row()->lession_type==0){
		$total_session=0;if(!empty($course_information)){
			$time_list_date=array();
			$time_list_time=array();
			foreach ($course_information as $key => $row)
			{
			$time_list_date[$key] = $row['class_date'];
			
			}
			
			array_multisort($time_list_date, SORT_ASC, $course_information);
			
			foreach($course_information as $course_list){
			$date=date("d-m-Y",strtotime($course_list['class_date']));
			$month=date("M",strtotime($course_list['class_date']));
			$day_name=substr(date("D",strtotime($course_list['class_date'])),0,2);
			$course_hour=$this->course_hourse_finder_mail($course_list['class_time']);
			$course_price=$course_hour* $get_all_booking_info->row()->price_per_hour;
			$table.='<tr><td style="">'.$date.'</td><td style="">'.$course_hour.'</td><td style=" margin-right: 30px; text-align: right;">$'.$course_price.'</td></tr>';
			$total_session=$total_session+$course_price;
			}
		}}
		else{
			$session_array=json_decode($get_all_booking_info->row()->booking_info,true);
			$total_session=0;if(!empty($session_array)){
			$time_list_date=array();
			$time_list_time=array();
			foreach ($session_array as $key => $row)
			{
			$time_list_date[$key] = $row['selected_date'];
			
			}
			
			array_multisort($time_list_date, SORT_ASC, $session_array);
				foreach($session_array as $course_list){
			$date=date("d-m-Y",strtotime($course_list['selected_date']));
			$month=date("M",strtotime($course_list['selected_date']));
			$day_name=substr(date("D",strtotime($course_list['selected_date'])),0,2);
			$course_hour=$course_list['hours'];
			$course_price=$course_list['price'];
			$table.='<tr><td style="">'.$date.'</td><td style="">'.$course_hour.'</td><td style=" margin-right: 30px; text-align: right;">$'.$course_price.'</td></tr>';
			$total_session=$total_session+$course_price;
				}
			}
		}
        $table.='</tbody></table>';
		$template_values = $this->mail_model->get_template_details ( $newsid );  
		
        if(count($template_values)==1){ 
		
		$template_values=$template_values[0];
		$adminnewstemplateArr = array (
				'email_title' => $this->config->item ( 'site_name' ),
				'site_name' => $this->config->item ( 'site_name' ),
				'logo' => $this->data['logo'],
				'name' => $name,
				'uname' => $sname,
				'course_name' => $course_name,
				'amount_charged' => $amount_charged_text,
				'student_count' => $student_count,
				'transaction_id' => $transaction_id,
				'total_session' => "$".$total_session,
				'booked_dates_list' => $table,
				'booking_no' => $booking_no,				
				'total'=>"$".$total
		);
		extract ( $adminnewstemplateArr );
		$subject = 'From: ' . $this->config->item ( 'email_title' ) . ' - ' . $template_values ['subject'];
		$message .= '<!DOCTYPE HTML>
			<html>
			<head>
			<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
			<meta name="viewport" content="width=device-width"/>
			<title>' . $template_values ['subject'] . '</title>
			<body>';
		include ('./email/email' . $newsid . '.php');

		$message .= '</body>
			</html>';

		$sender_name = $this->config->item ( 'site_name' );
		$sender_email = $this->config->item ( 'admin_email' );

		$email_values = array (
				'mail_type' => 'html',
				'from_mail_id' => $sender_email,
				'mail_name' => $sender_name,
				'to_mail_id' => $email,
				'subject_message' => $template_values ['subject'],
				'cc_mail_id' => '',
				'body_messages' => $message
		);
       
		$email_send_to_common = $this->mail_model->common_email_send ( $email_values );
        #echo '<pre>'; print_r($email_values);		
		}
		}
		}	
		
	}
	
	
	
	
	public function listing_confirmation_email($name,$title,$course_id,$email) {
		$newsid = '8';$message='';
		$user_check=$this->mail_model->get_all_details(USERS,array("email"=>$email));
		if($user_check->num_rows()>0 && $user_check->row()->email_notification_teacher==1){
		$template_values = $this->mail_model->get_template_details ( $newsid );  
        if(count($template_values)==1){ 
		$template_values=$template_values[0];
		$link=base_url()."course/".$course_id;
		$adminnewstemplateArr = array (
				'email_title' => $this->config->item ( 'site_name' ),
				'site_name' => $this->config->item ( 'site_name' ),
				'name' => $name,
				'title' =>$title,
				'link' =>$link,
				'logo' => $this->data['logo']
		);
		extract ( $adminnewstemplateArr );
		$subject = 'From: ' . $this->config->item ( 'email_title' ) . ' - ' . $template_values ['subject'];
		$message .= '<!DOCTYPE HTML>
			<html>
			<head>
			<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
			<meta name="viewport" content="width=device-width"/>
			<title>' . $template_values ['subject'] . '</title>
			<body>';
		include ('./email/email' . $newsid . '.php');

		$message .= '</body>
			</html>';

		$sender_name = $this->config->item ( 'site_name' );
		$sender_email = $this->config->item ( 'admin_email' );

		$email_values = array (
				'mail_type' => 'html',
				'from_mail_id' => $sender_email,
				'mail_name' => $sender_name,
				'to_mail_id' => $email,
				'subject_message' => $template_values ['subject'],
				'cc_mail_id' => '',
				'bcc_mail_id' => $template_values ['bcc'],
				'body_messages' => $message
		);
       
		$email_send_to_common = $this->mail_model->common_email_send ( $email_values );
        }
		}
		
	}
	
	
	
	    

	
	public function send_feedback($bid)
	{
		try{
		$booking_info = $this->mail_model->task_booking_info ( $bid );
		if($booking_info->row()->tdevice_id!="" && $booking_info->row()->tdevicetype!="")
		{
			if($booking_info->row()->tdevicetype=="ios")
			{
				$msg="You got a feedback from ".$booking_info->row()->ufirst_name;
				$this->push_notification_tasker_ios($booking_info->row()->tdevice_id,$msg,"completed_task");
			}
			else
			{
				$msg="You got a feedback from ".$booking_info->row()->ufirst_name;
				$this->push_notification_tasker_android($booking_info->row()->tdevice_id,$msg,"completed_task");
			}
		}
		}
		catch(Exception $e) { }

	}
	
	 public function send_request_subcategory_mail($new_array) {
		$newsid = '9';$message='';
		$template_values = $this->mail_model->get_template_details ( $newsid );  
        if(count($template_values)==1){ 
		$template_values=$template_values[0];
		$adminnewstemplateArr = array (
				'email_title' => $this->config->item ( 'site_name' ),
				'request_subcategory' =>$new_array['request_cat'],
				'username' => $new_array['username'],
				'site_name' => $this->config->item ( 'site_name' ),
				'logo' => $this->data['logo']
		);
		extract ( $adminnewstemplateArr );
		$subject = 'From: ' . $this->config->item ( 'email_title' ) . ' - ' . $template_values ['subject'];
		$message .= '<!DOCTYPE HTML>
			<html>
			<head>
			<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
			<meta name="viewport" content="width=device-width"/>
			<title>' . $template_values ['subject'] . '</title>
			<body>';
		include ('./email/email' . $newsid . '.php');

		$message .= '</body>
			</html>';

		$sender_name = $this->config->item ( 'site_name' );
		$sender_email = $this->config->item ( 'admin_email' );
        
		$email_values = array (
				'mail_type' => 'html',
				'from_mail_id' => $sender_email,
				'mail_name' => $sender_name,
				'to_mail_id' => $sender_email,
				'subject_message' => $template_values ['subject'],
				'cc_mail_id' => '',
				'body_messages' => $message
		);
       
		$email_send_to_common = $this->mail_model->common_email_send ( $email_values );
        }
		
	}
	
	
	public function send_report_mail($new_array) {
		$newsid = '10';$message='';
		$template_values = $this->mail_model->get_template_details ( $newsid );  
        if(count($template_values)==1){ 
		$template_values=$template_values[0];
		$adminnewstemplateArr = array (
				'email_title' => $this->config->item ( 'site_name' ),
				'report_name' =>$new_array['report_name'],
				'username' => $new_array['username'],
				'course_title' => $new_array['course_title'],
				'course_link' => $new_array['course_link'],
				'site_name' => $this->config->item ( 'site_name' ),
				'logo' => $this->data['logo']
		);
		extract ( $adminnewstemplateArr );
		$subject = 'From: ' . $this->config->item ( 'email_title' ) . ' - ' . $template_values ['subject'];
		$message .= '<!DOCTYPE HTML>
			<html>
			<head>
			<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
			<meta name="viewport" content="width=device-width"/>
			<title>' . $template_values ['subject'] . '</title>
			<body>';
		include ('./email/email' . $newsid . '.php');

		$message .= '</body>
			</html>';

		$sender_name = $this->config->item ( 'site_name' );
		$sender_email = $this->config->item ( 'admin_email' );
        
		$email_values = array (
				'mail_type' => 'html',
				'from_mail_id' => $sender_email,
				'mail_name' => $sender_name,
				'to_mail_id' => $sender_email,
				'subject_message' => $template_values ['subject'],
				'cc_mail_id' => '',
				'body_messages' => $message
		);
       
		$email_send_to_common = $this->mail_model->common_email_send ( $email_values );
        }
		
	}
	public function payment_link_send($email,$username,$teachername,$booking_id,$course_name) {
		$newsid = '11';$message='';
		$template_values = $this->mail_model->get_template_details ( $newsid );  
        if(count($template_values)==1){ 
		$template_values=$template_values[0];
		$adminnewstemplateArr = array (
				'email_title' => $this->config->item ( 'site_name' ),
				'link' =>base_url().'checkout/'.$booking_id,
				'stuent_name' => $username,
				'course_name' => $course_name,
				'teacher_name' => $teachername,
				'site_name' => $this->config->item ( 'site_name' ),
				'logo' => $this->data['logo']
		);
		extract ( $adminnewstemplateArr );
		$subject = 'From: ' . $this->config->item ( 'email_title' ) . ' - ' . $template_values ['subject'];
		$message .= '<!DOCTYPE HTML>
			<html>
			<head>
			<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
			<meta name="viewport" content="width=device-width"/>
			<title>' . $template_values ['subject'] . '</title>
			<body>';
		include ('./email/email' . $newsid . '.php');

		$message .= '</body>
			</html>';

		$sender_name = $this->config->item ( 'site_name' );
		$sender_email = $this->config->item ( 'admin_email' );
        
		$email_values = array (
				'mail_type' => 'html',
				'from_mail_id' => $sender_email,
				'mail_name' => $sender_name,
				'to_mail_id' => $sender_email,
				'subject_message' => $template_values ['subject'],
				'cc_mail_id' => '',
				'bcc_mail_id' => $template_values ['bcc'],
				'body_messages' => $message
		);
       
		$email_send_to_common = $this->mail_model->common_email_send ( $email_values );
        }
		
	}
    public function test_mail() {
		$newsid = '5';$message='';
		$template_values = $this->mail_model->get_template_details ( $newsid );  
        if(count($template_values)==1){ 
		$template_values=$template_values[0];
		$adminnewstemplateArr = array (
				'email_title' => $this->config->item ( 'site_name' ),
				'message_admin' =>$new_array['message'],
				'name' => $new_array['name'],
				'phone' =>$new_array['phone'],
				'email' => $new_array['email'],
				'site_name' => $this->config->item ( 'site_name' ),
				'logo' => $this->data['logo']
		);
		extract ( $adminnewstemplateArr );
		$subject = 'From: ' . $this->config->item ( 'email_title' ) . ' - ' . $template_values ['subject'];
		$message .= '<!DOCTYPE HTML>
			<html>
			<head>
			<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
			<meta name="viewport" content="width=device-width"/>
			<title>' . $template_values ['subject'] . '</title>
			<body>';
		include ('./email/email' . $newsid . '.php');

		$message .= '</body>
			</html>';

		$sender_name = $this->config->item ( 'site_name' );
		$sender_email = $this->config->item ( 'admin_email' );
        
		$email_values = array (
				'mail_type' => 'html',
				'from_mail_id' => $sender_email,
				'mail_name' => $sender_name,
				'to_mail_id' => $sender_email,
				'subject_message' => $template_values ['subject'],
				'cc_mail_id' => '',
				'bcc_mail_id' => $template_values ['bcc'],
				'body_messages' => $message
		);
       
		$email_send_to_common = $this->mail_model->common_email_send ( $email_values );
        }
		
	}
    public function review_remainder($email,$course_name,$reference_list) {
		$newsid = '12';$message='';
		$user_check=$this->mail_model->get_all_details(USERS,array("email"=>$email));
		if($user_check->num_rows()>0 && $user_check->row()->email_notification_teacher==1){
		$template_values = $this->mail_model->get_template_details ( $newsid );  
        if(count($template_values)==1){ 
		$template_values=$template_values[0];
		$link=base_url()."course/".$course_id;
		$adminnewstemplateArr = array (
				'email_title' => $this->config->item ( 'site_name' ),
				'site_name' => $this->config->item ( 'site_name' ),
				'course_name' => $course_name,
				'logo' => $this->data['logo']
		);
		extract ( $adminnewstemplateArr );
		$subject = 'From: ' . $this->config->item ( 'email_title' ) . ' - ' . $template_values ['subject'];
		$message .= '<!DOCTYPE HTML>
			<html>
			<head>
			<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
			<meta name="viewport" content="width=device-width"/>
			<title>' . $template_values ['subject'] . '</title>
			<body>';
		include ('./email/email' . $newsid . '.php');

		$message .= '</body>
			</html>';

		$sender_name = $this->config->item ( 'site_name' );
		$sender_email = $this->config->item ( 'admin_email' );

		$email_values = array (
				'mail_type' => 'html',
				'from_mail_id' => $sender_email,
				'mail_name' => $sender_name,
				'to_mail_id' => $email,
				'subject_message' => $template_values ['subject'],
				'cc_mail_id' => $reference_list,
				'body_messages' => $message
		);
       
		$email_send_to_common = $this->mail_model->common_email_send ( $email_values );
        }
		}
		
	} 	
	
}