<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
error_reporting(-1);
ini_set('max_execution_time', 0);
date_default_timezone_set('Europe/London'); 
class MY_Controller extends CI_Controller {  
	public $privStatus;	
	public $data = array();
	function __construct()
    {
        parent::__construct();
		ob_start();
		//error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
        $this->load->helper('url');
        $this->load->helper('text');		
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
		$this->output->set_header('Pragma: no-cache');
		$this->load->library('session');
		$this->load->model(array('landing_model'));
		$this->load->database();
		$this->db->reconnect();
		define('BASEURL',base_url());
		$this->session->userdata('gsan_comp_id');
        $this->data['logincheck']=$this->checkLogin('U'); 	
        $this->data['logcheck']=$this->checkLogin('U'); 
        /*fb and gmail*/
        $this->load->library('facebook'); 
		include_once APPPATH."libraries/google-api-php-client/Google_Client.php";
		include_once APPPATH."libraries/google-api-php-client/contrib/Google_Oauth2Service.php";
		$clientId = $this->config->item('gmail_client_id');
        $clientSecret = $this->config->item('gmail_client_secret');
		$redirectUrl = $this->config->item('gmail_redirect_url');
		$gClient = new Google_Client();
        $gClient->setApplicationName('Login to gmtechindia.com');
        $gClient->setClientId($clientId);
        $gClient->setClientSecret($clientSecret);
        $gClient->setRedirectUri($redirectUrl);
        $google_oauthV2 = new Google_Oauth2Service($gClient);
		$this->data['gmail_link']=$gClient->createAuthUrl();
		$this->data['fb_link']=$this->facebook->getLoginUrl(array('display' => 'popup',
                'redirect_uri' => base_url('site/student/fb_response'), 
                'scope' => array("email") ));		
        /*fb and gmail*/		
        if($this->config->item('site_logo')!=''){
			$this->data['logo'] = base_url()."images/site/logo/".$this->config->item('site_logo');
		}
		else
		{
			$this->data['logo']=base_url()."images/site/logo/logo.png"; 	
        
		}
		#$this->data['logo']=base_url()."images/hobbysvglogo.jpg"; 	
		 if($this->checkLogin('U')!=''){
			$this->data['company_details'] = $this->db->query('select * from '.COMPANY.' where `id`="'.$this->checkLogin('U').'"');
			$uid=$this->checkLogin('U');
			
			
		}
		
		if($this->checkLogin('A')!='')
		{
			$id=$this->checkLogin('A');
			$this->data['previllage']=$this->session->userdata('rentmate_session_prev');
			if($id==1){ $this->data['prev']=1;}else{ $this->data['prev']=0;}
		}
		 $this->data['newslettersession_id']=$newslettersession_id=session_id();		
		 $this->session->set_userdata(array("newslettersession_id"=>$newslettersession_id));
				
					
		
		
			
		   
		
        
		$this->data['cms_row1']=$this->landing_model->get_all_details(CMS,array('status'=>'Active','footer_order'=>'row1','footer_menu_status'=>"1"));
		//$this->data['cms_row2']=$this->landing_model->get_all_details(CMS,array('status'=>'Active','footer_order'=>'services','footer_menu_status'=>"1"));
		//$this->data['cms_row3']=$this->landing_model->get_all_details(CMS,array('status'=>'Active','footer_order'=>'row3'));
		$this->data['country_list']=$this->landing_model->get_all_details(COUNTRY,array(),array("field"=>'name','type'=>'asc'));
		$this->data['admin_settings']=$this->landing_model->get_all_details(ADMIN_SETTINGS,array('id'=>'1'));
		$this->data['general_info']=$this->landing_model->get_all_details(FOOTER,array('id'=>1))->row();
		$this->data['admin_currency_symbol']="$";
		
		
		 $this->data['lang_key']=$this->session->userdata('pictuslang_key');
	}
    public function currencyCode()
	{
	 
		
		 $ip = $_SERVER['REMOTE_ADDR'];

		#$ip = '115.118.170.1'; //IND

		#$ip = '146.185.28.59'; //UK
		 
		$host = "http://www.geoplugin.net/php.gp?ip=$ip";
		 
		 if ( ini_get('allow_url_fopen') ) 
		 {
				$response = file_get_contents($host, 'r');	
		}
			 
		 $data = unserialize($response);

		return $data['geoplugin_currencyCode'];
	
	}	
    public function checkLogin($type=''){
    	if ($type == 'A'){
    		return $this->session->userdata('gmtech_admin_id');
    	}else if ($type == 'N'){
    		return $this->session->userdata('fc_session_admin_name');
    	}else if ($type == 'M'){
    		return $this->session->userdata('fc_session_admin_email');
    	}else if ($type == 'P'){
    		return $this->session->userdata('gm_session_prev');
    	}else if ($type == 'U'){
			$user_check = $this->landing_model->get_all_details(USERS,array('company_id'=>$this->session->userdata('glsn_comp_id')));
			if($user_check->num_rows() > 0){
    		return $this->session->userdata('glsn_comp_id');
			}
			else
				$this->session->unset_userdata('glsn_comp_id');
    	}else if ($type == 'T'){
    		return $this->session->userdata('fc_session_temp_id');
			
    	}
    }
    
    /**
     * 
     * This function set the error message and type in session
     * @param string $type
     * @param string $msg
     */
    public function setErrorMessage($type='',$msg=''){
    	($type == 'success') ? $msgVal = 'message-green' : $msgVal = 'message-red';
		$this->session->set_flashdata('sErrMSGType', $msgVal);
		$this->session->set_flashdata('sErrMSG', $msg);
    }
    public function saveEmailBasedOnType($type='',$email=''){
    	$check_exist=$this->landing_model->get_all_details(MAILING_LIST,array("email"=>$email));
		if($check_exist->num_rows()==1){
			$mailarray=array();
			if($type==1){
				$mailarray["member"]="1";
			}
			else if($type==2){
				$mailarray["public"]="1";
			}
			else if($type==3){
				$mailarray["reference"]="1";
			}
			else if($type==4){
				$mailarray["port_estimates"]="1";
			}
			$this->landing_model->update_details(MAILING_LIST,$mailarray,array("id"=>$check_exist->row()->id));	
		}
		else{
			$mailarray=array();
			if($type==1){
				$mailarray["member"]="1";
				$mailarray["email"]=$email;
				$mailarray["created_at"]=time();
				$mailarray["updated_at"]=time();
			}
			else if($type==2){
				$mailarray["public"]="1";
				$mailarray["email"]=$email;
				$mailarray["created_at"]=time();
				$mailarray["updated_at"]=time();
			}
			else if($type==3){
				$mailarray["reference"]="1";
				$mailarray["email"]=$email;
				$mailarray["created_at"]=time();
				$mailarray["updated_at"]=time();
			}
			else if($type==4){
				$mailarray["port_estimates"]="1";
				$mailarray["email"]=$email;
				$mailarray["created_at"]=time();
				$mailarray["updated_at"]=time();
			}
			$this->landing_model->simple_insert(MAILING_LIST,$mailarray);
		}
    }
   /**
    * 
    * This function check the admin privileges
    * @param String $name	->	Management Name
    * @param Integer $right	->	0 for view, 1 for add, 2 for edit, 3 delete
    */ 
   public function check_prev($name='',$right=''){
   		if(!empty(unserialize($this->data['previllage']))){extract(unserialize($this->data['previllage']));} 
			if($this->data['prev']==1 || (!empty(${$name}) && in_array('0',${$name}))){
			  return TRUE;
			}
			else
			{
				return FALSE;
			}
   }
   
   /**
    * 
    * Generate random string
    * @param Integer $length
    */
   public function get_rand_str($length='6'){
		return substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);
   }
   
   /**
    * 
    * Unsetting array element
    * @param Array $productImage
    * @param Integer $position
    */
	public function setPictureProducts($productImage,$position){
		unset($productImage[$position]);
		return $productImage;
	}
	
	/**
	 * 
	 * Resize the image
	 * @param int target_width
	 * @param int target_height
	 * @param string image_name
	 * @param string target_path
	 */
	 public function imageResizeWithSpace($box_w,$box_h,$userImage,$savepath){
			$thumb_file = $savepath.$userImage;
			
			list($w, $h, $type, $attr) = getimagesize($thumb_file);
			
				//print_r($box_w);die;
				$size=getimagesize($thumb_file);
			    switch($size["mime"]){
			        case "image/jpeg":
            			$img = imagecreatefromjpeg($thumb_file); //jpeg file
			        break;
			        case "image/gif":
            			$img = imagecreatefromgif($thumb_file); //gif file
				      break;
			      case "image/png":
			          $img = imagecreatefrompng($thumb_file); //png file
			      break;
				
				  default:
				        $im=false;
				    break;
				}
				
			$new = imagecreatetruecolor($box_w, $box_h);
			if($new === false) {
				//creation failed -- probably not enough memory
				return null;
			}
			$whiteColorIndex = imagecolorexact($new,255,255,255);
			$whiteColor = imagecolorsforindex($new,$whiteColorIndex);
			imagecolortransparent($new,$whiteColor);
		
			$fill = imagecolorallocate($new, 064, 064, 064);
			imagefill($new, 0, 0, $fill);
		
			//compute resize ratio
			$hratio = $box_h / imagesy($img);
			$wratio = $box_w / imagesx($img);
			$ratio = min($hratio, $wratio);
		
			if($ratio > 1.0)
				$ratio = 1.0;
		
			//compute sizes
			$sy = floor(imagesy($img) * $ratio);
			$sx = floor(imagesx($img) * $ratio);
		
			$m_y = floor(($box_h - $sy) / 2);
			$m_x = floor(($box_w - $sx) / 2);
		
			if(!imagecopyresampled($new, $img,
				$m_x, $m_y, //dest x, y (margins)
				0, 0, //src x, y (0,0 means top left)
				$sx, $sy,//dest w, h (resample to this size (computed above)
				imagesx($img), imagesy($img)) //src w, h (the full size of the original)
			) {
				//copy failed
				imagedestroy($new);
				return null;
				
			}
			imagedestroy($i);
			imagejpeg($new, $thumb_file, 90);
			
	}
	public function imageResizeWithSpace1($box_w,$box_h,$userImage,$savepath){
			
			
			
			 $thumb_file = $savepath.$userImage;
			
			 $dist_file = $savepath.'/thumb/'.$userImage;
			 
			 
			 
			$config['source_image']    = $dist_file;
			$config['wm_text'] = 'Rentals';
			$config['wm_type'] = 'text';
			$config['wm_font_path'] = './GILSANUB.TTF';
			$config['wm_font_size']    = '22';
			$config['wm_font_color'] = 'e9b9b9';
			$config['wm_vrt_alignment'] = 'middle';
			$config['wm_hor_alignment'] = 'center';
			$config['wm_padding'] = '0';
			$this->image_lib->initialize($config); 
			$this->image_lib->watermark();
			 
			 
			 
			 
			 
			 
			 
			 
				
			list($w, $h, $type, $attr) = getimagesize($thumb_file);
				
				$size=getimagesize($thumb_file);
			    switch($size["mime"]){
			        case "image/jpeg":
            			$img = imagecreatefromjpeg($thumb_file); //jpeg file
			        break;
			        case "image/gif":
            			$img = imagecreatefromgif($thumb_file); //gif file
				      break;
			      case "image/png":
			          $img = imagecreatefrompng($thumb_file); //png file
			      break;
				
				  default:
				        $im=false;
				    break;
				}
				
			$new = imagecreatetruecolor($box_w, $box_h);
			if($new === false) {
				//creation failed -- probably not enough memory
				return null;
			}
		
		
			$fill = imagecolorallocate($new, 255, 255, 255);
			imagefill($new, 0, 0, $fill);
		
			//compute resize ratio
			$hratio = $box_h / imagesy($img);
			$wratio = $box_w / imagesx($img);
			$ratio = min($hratio, $wratio);
		
			if($ratio > 1.0)
				$ratio = 1.0;
		
			//compute sizes
			$sy = floor(imagesy($img) * $ratio);
			$sx = floor(imagesx($img) * $ratio);
		
			$m_y = floor(($box_h - $sy) / 2);
			$m_x = floor(($box_w - $sx) / 2);
		
			if(!imagecopyresampled($new, $img,
				$m_x, $m_y, //dest x, y (margins)
				0, 0, //src x, y (0,0 means top left)
				$sx, $sy,//dest w, h (resample to this size (computed above)
				imagesx($img), imagesy($img)) //src w, h (the full size of the original)
			) {
				//copy failed
				imagedestroy($new);
				return null;
				
			}
			imagedestroy($i);
			imagejpeg($new, $dist_file, 99);
	}
	/**
	 * 
	 * Resize the image
	 * @param int target_width
	 * @param int target_height
	 * @param string image_name
	 * @param string target_path
	 */
	public function imageResizeWithSpaceold($box_w,$box_h,$userImage,$savepath){
			
			$thumb_file = $savepath.$userImage;
				
			list($w, $h, $type, $attr) = getimagesize($thumb_file);
				
				$size=getimagesize($thumb_file);
			    switch($size["mime"]){
			        case "image/jpeg":
            			$img = imagecreatefromjpeg($thumb_file); //jpeg file
			        break;
			        case "image/gif":
            			$img = imagecreatefromgif($thumb_file); //gif file
				      break;
			      case "image/png":
			          $img = imagecreatefrompng($thumb_file); //png file
			      break;
				
				  default:
				        $im=false;
				    break;
				}
				
			$new = imagecreatetruecolor($box_w, $box_h);
			if($new === false) {
				//creation failed -- probably not enough memory
				return null;
			}
		
		
			$fill = imagecolorallocate($new, 255, 255, 255);
			imagefill($new, 0, 0, $fill);
		
			//compute resize ratio
			$hratio = $box_h / imagesy($img);
			$wratio = $box_w / imagesx($img);
			$ratio = min($hratio, $wratio);
		
			if($ratio > 1.0)
				$ratio = 1.0;
		
			//compute sizes
			$sy = floor(imagesy($img) * $ratio);
			$sx = floor(imagesx($img) * $ratio);
		
			$m_y = floor(($box_h - $sy) / 2);
			$m_x = floor(($box_w - $sx) / 2);
		
			if(!imagecopyresampled($new, $img,
				$m_x, $m_y, //dest x, y (margins)
				0, 0, //src x, y (0,0 means top left)
				$sx, $sy,//dest w, h (resample to this size (computed above)
				imagesx($img), imagesy($img)) //src w, h (the full size of the original)
			) {
				//copy failed
				imagedestroy($new);
				return null;
				
			}
			imagedestroy($i);
			imagejpeg($new, $thumb_file, 99);
			
	}
	
	public function watermarkimages($uploaddir,$image_name){
			$masterURL =$uploaddir.$image_name;
			header('content-type: image/jpeg');
			$path = base_url().'images/logo/'.$this->config->item('watermark');
			$watermark = imagecreatefrompng('images/watermark3.png');
			$watermark_width = imagesx($watermark);
			$watermark_height = imagesy($watermark);
			$image = imagecreatetruecolor($watermark_width, $watermark_height);
			$image = imagecreatefromjpeg($masterURL);
			$size = getimagesize($masterURL);
			$dest_x = $size[0] - $watermark_width - 5;
			$dest_y = $size[1] - $watermark_height - 500;
			imagecopymerge($image, $watermark, $dest_x, $dest_y,0, 0, $watermark_width, $watermark_height,20);
			imagejpeg($image, $masterURL);
	}

	/**
	 * 
	 * Resize the image
	 * @param int target_width
	 * @param int target_height
	 * @param string image_name
	 * @param string target_path
	 */
	public function imageResizeWithSpaceCity($box_w,$box_h,$userImage,$savepath){
			$thumb_file = $savepath.$userImage;
			$dist_file = $savepath.'/thumb/'.$userImage;
			list($w, $h, $type, $attr) = getimagesize($thumb_file);
				$size=getimagesize($thumb_file);
			    switch($size["mime"]){
			        case "image/jpeg":
            			$img = imagecreatefromjpeg($thumb_file); //jpeg file
			        break;
			        case "image/gif":
            			$img = imagecreatefromgif($thumb_file); //gif file
				      break;
			      case "image/png":
			          $img = imagecreatefrompng($thumb_file); //png file
			      break;
				
				  default:
				        $im=false;
				    break;
				}
			$new = imagecreatetruecolor($box_w, $box_h);
			if($new === false) {
				return null;
			}
			$fill = imagecolorallocate($new, 000, 000, 000);
			imagefill($new, 0, 0, $fill);
			$hratio = $box_h / imagesy($img);
			$wratio = $box_w / imagesx($img);
			$ratio = min($hratio, $wratio);
			if($ratio > 1.0)
				$ratio = 1.0;
			$sy = floor(imagesy($img) * $ratio);
			$sx = floor(imagesx($img) * $ratio);
			$m_y = floor(($box_h - $sy) / 2);
			$m_x = floor(($box_w - $sx) / 2);
			if(!imagecopyresampled($new, $img,
				$m_x, $m_y, //dest x, y (margins)
				0, 0, //src x, y (0,0 means top left)
				$sx, $sy,//dest w, h (resample to this size (computed above)
				imagesx($img), imagesy($img)) //src w, h (the full size of the original)
			) {
				imagedestroy($new);
				return null;
			}
			imagedestroy($i);
			imagejpeg($new, $dist_file, 99);
	}

	public function ImageCompress($source_url, $destination_url, $quality=50){
		$info = getimagesize($source_url);
		$savePath = $source_url;
		if ($info['mime'] == 'image/jpeg') $image = imagecreatefromjpeg($savePath);
		elseif ($info['mime'] == 'image/gif') $image = imagecreatefromgif($savePath);
		elseif ($info['mime'] == 'image/png') $image = imagecreatefrompng($savePath);
		imagejpeg($image, $savePath, $quality);
	}

	public function getImageShape($width, $height, $target_file){
		list($w, $h) = getimagesize($target_file);
		if($w==$width && $h==$height){
			$option="exact";
		}else if($w>$h){
			$option="landscape";
		}else if($w<$h){
			$option="portrait";
		}else{
			$option="crop";
		}
		return $option;
	}
	
	/*--Push Notification for IOS--*/
	
	public function push_notification_user_ios($deviceId,$message){
		if($deviceId!=""){
			$this->load->library('Apns');
			$this->apns->send_push_message_user($deviceId,$message); 
		}
	}
	public function push_notification_tasker_ios($deviceId,$message){ 
		if($deviceId!=""){
			$this->load->library('Apns'); 
			$this->apns->send_push_message_tasker($deviceId,$message);  
		}
	}
	public function push_notification_user_android($deviceId,$message){
		if($deviceId!=""){
			$this->sendPushNotificationToAndroid($deviceId,$message);
		}
	}
	public function push_notification_tasker_android($deviceId,$message){
		if($deviceId!=""){
			$this->sendPushNotificationToAndroid($deviceId,$message);
		}
	}
	
	/*--Push Notification for IOS--*/
	
	/**
     * This function send the notification for Anriod
     * @param string $registration_ids
     * @param string $message 
     * */
    public function sendPushNotificationToAndroid($registration_ids, $message) {
		
        //Google cloud messaging GCM-API url
       $url = 'https://android.googleapis.com/gcm/send';
        $fields = array(
            'registration_ids' => $registration_ids,
            'data' => $message,
        );
		// Google Cloud Messaging GCM API Key
	 	define("GOOGLE_API_KEY", "AIzaSyBnTCgx2aoEn2zN-1x46Sk9QWeUCqF7EqQ"); 		
        $headers = array(
            'Authorization: key=' . GOOGLE_API_KEY,
            'Content-Type: application/json'
        );
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
        $result = curl_exec($ch);
        if ($result === FALSE) {
            die('Curl failed: ' . curl_error($ch));
        }
        curl_close($ch);
        //var_dump($result);die;
        return $result;
    } 
	
	
/* 	 function sendPushNotificationToAndroid($registatoin_ids, $message) {
		//Google cloud messaging GCM-API url
        $url = 'https://android.googleapis.com/gcm/send';
        $fields = array(
            'registration_ids' => $registatoin_ids,
            'data' => $message,
        );
		// Google Cloud Messaging GCM API Key
		define("GOOGLE_API_KEY", "AIzaSyBnTCgx2aoEn2zN-1x46Sk9QWeUCqF7EqQ"); 		
        $headers = array(
            'Authorization: key=' . GOOGLE_API_KEY,
            'Content-Type: application/json'
        );
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);	
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
        $result = curl_exec($ch);				
        if ($result === FALSE) {
            die('Curl failed: ' . curl_error($ch));
        }
        curl_close($ch);
		//var_dump($result);die;
        return $result;
    }
	  */
	public function ImageResizeWithCrop($width, $height, $thumbImage, $savePath){
		
		$thumb_file = $savePath.$thumbImage;
		
		$newimgPath = base_url().$savePath.$thumbImage;
		
		/* Get original image x y*/
		list($w, $h) = getimagesize($thumb_file);
		$size=getimagesize($thumb_file);
		/* calculate new image size with ratio */
		$ratio = max($width/$w, $height/$h);
		$h = ceil($height / $ratio);
		$x = ($w - $width / $ratio) / 2;
		$w = ceil($width / $ratio);
		/* new file name */
		$path = $savePath.$thumbImage;
		/* read binary data from image file */
		
		$imgString = file_get_contents($newimgPath);
		/* create image from string */
		$image = imagecreatefromstring($imgString);
		$tmp = imagecreatetruecolor($width, $height);
		imagecopyresampled($tmp, $image, 0, 0, $x, 0, $width, $height, $w, $h); 
	
		/* Save image */
		switch ($size["mime"]) {
			case 'image/jpeg':
				imagejpeg($tmp, $path, 100);
				break;
			case 'image/png':
				imagepng($tmp, $path, 0);
				break;
			case 'image/gif':
				imagegif($tmp, $path);
				break;
			default:
				exit;
			break;
		}
		return $path;
		/* cleanup memory */
		imagedestroy($image);
		imagedestroy($tmp);
	}
	
	public function resize_imageby_siva($image_data,$n_w,$n_h){
		$this->load->library('image_lib');
		$w = $image_data['image_width']; // original image's width
		$h = $image_data['image_height']; // original images's height
	/* 
		$n_w = 273; // destination image's width
		$n_h = 246; // destination image's height
	 */
		$source_ratio = $w / $h;
		$new_ratio = $n_w / $n_h;
		if($source_ratio != $new_ratio){

			$config['image_library'] = 'gd2';
			$config['source_image'] = $image_data['image_name'];
			$config['maintain_ratio'] = FALSE;
			if($new_ratio > $source_ratio || (($new_ratio == 1) && ($source_ratio < 1))){
				$config['width'] = $w;
				$config['height'] = round($w/$new_ratio);
				$config['y_axis'] = round(($h - $config['height'])/2);
				$config['x_axis'] = 0;

			} else {

				$config['width'] = round($h * $new_ratio);
				$config['height'] = $h;
				$size_config['x_axis'] = round(($w - $config['width'])/2);
				$size_config['y_axis'] = 0;

			}

			$this->image_lib->initialize($config);
			$this->image_lib->crop();
			$this->image_lib->clear();
		}
		$config['image_library'] = 'gd2';
		$config['source_image'] = $image_data['image_name'];
		$config['new_image'] = $image_data['image_dest'];
		$config['maintain_ratio'] = TRUE;
		$config['width'] = $n_w;
		$config['height'] = $n_h;
		$this->image_lib->initialize($config);

		if (!$this->image_lib->resize()){

		   # echo $this->image_lib->display_errors();

		} else {

			#echo "done";

		}
    }
	
	public function captcha_refresh(){
		
		$this->load->helper('captcha');
		$values = array(
		'word' => '',
		'word_length' => 4,
		'img_path' => './images/captcha/',
		'img_url' => base_url() .'images/captcha/',
		'font_path' => base_url() . 'css/fonts/PoppinsRegular.ttf',
		'img_width' => '150',
		'img_height' => 50,
		'expiration' => 7200,
		'pool' => '012345678901234567890123456789',
		);
		$data = create_captcha($values);
		return $data;

	}
	
	function createThumbnail($image_name,$new_width,$new_height,$uploadDir,$moveToDir)
    {
    $path = $uploadDir . '/' . $image_name;

    $mime = getimagesize($path);

    if($mime['mime']=='image/png') { 
        $src_img = imagecreatefrompng($path);
    }
    if($mime['mime']=='image/jpg' || $mime['mime']=='image/jpeg' || $mime['mime']=='image/pjpeg') {
        $src_img = imagecreatefromjpeg($path);
    }   

    $old_x          =   imageSX($src_img);
    $old_y          =   imageSY($src_img);

    /* if($old_x > $old_y) 
    {
        $thumb_w    =   $new_width;
        //$thumb_h    =   $old_y*($new_height/$old_x);
		$thumb_h    =   $old_y/($old_x*$new_width);
    }

    if($old_x < $old_y) 
    {
        //$thumb_w    =   $old_x*($new_width/$old_y);
		$thumb_w    =   $old_x/($old_y*$new_height);
        $thumb_h    =   $new_height;
    }

    if($old_x == $old_y) 
    {
        $thumb_w    =   $new_width;
        $thumb_h    =   $new_height;
    } */
	/* $ratio_orig = $old_x/$old_y;

	if ($new_width/$new_height > $ratio_orig) {
	   $new_width = $new_height*$ratio_orig;
	} else {
	   $new_height = $new_width/$ratio_orig;
	} */
	
	$width = imagesx( $src_img );
	$height = imagesy( $src_img );

	if ($width > $height) {
		if($width < $new_width)
			$new_width = $width;
		
		else
		
		$new_width = $new_width;	
		
		
		$divisor = $width / $new_width;
		$new_height = floor( $height / $divisor);
	}
	else {
		
		 if($height < $new_height)
			 $new_height = $height;
		 else
			 $new_height =  $new_height;
		 
		$divisor = $height / $new_height;
		$new_width = floor( $width / $divisor );
	}
	
   // echo $thumb_w; echo $thumb_h;
    $dst_img        =   ImageCreateTrueColor($new_width,$new_height);

    imagecopyresampled($dst_img,$src_img,0,0,0,0,$new_width,$new_height,$old_x,$old_y); 


    // New save location
    $new_thumb_loc = $moveToDir . $image_name;

    if($mime['mime']=='image/png') {
        $result = imagepng($dst_img,$new_thumb_loc,8);
    }
    if($mime['mime']=='image/jpg' || $mime['mime']=='image/jpeg' || $mime['mime']=='image/pjpeg') {
        $result = imagejpeg($dst_img,$new_thumb_loc,80);
    }

    imagedestroy($dst_img); 
    imagedestroy($src_img);

    return $result;
   }
	
	
	
	
	
	
	
	
	
	
	
}
