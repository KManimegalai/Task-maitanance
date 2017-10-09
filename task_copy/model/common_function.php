<?php
	function Sendmail($userDetails,$password)
	{
 
		$to = $userDetails['emailid'];
        $subject = "Password Update Request";
        $mailContent = 'Dear '.$userDetails['name'].', 
       Recently a request was submitted to reset a password for your account. If this was a mistake, just ignore this email and nothing will happen.
        Your reset password:'.$password.'
        Regards,
        dummy';
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $headers .= 'From: saranya@greefitech.com\r\n' . "\r\n";
     	// mail($to,$subject,$mailContent,$header);


		// return $mailContent;

	}

	function sendmsg($task,$employee){
		
		$to = $employee['phoneno'];
        $message = 'Dear '.$task['assignto'].', 
        <br/>Your '.$task["type"].' task details are
        <br/>Name:'.$task["name"].'
        <br/>place:'.$task['address'].'
		<br/>Mobile no:'.$task['phoneno'].'
		<br/>task:'.$task['task'].'
        <br/><br/>Regards,
        <br/>dummy';

        // return $message;
        send_message($to,$message);
       
	}

	function send_message($phone_number,$message){
        $url = 'http://greefitech.siegsms.in/PostSms.aspx';
        $fields_string ="";
        $fields = array( 'userid' =>urlencode('greefitech'), 'pass'=>urlencode('greefitech@123'), 'phone'=>urlencode($phone_number), 'msg'=>urlencode($message));
        //url-ify
        foreach($fields as $key=>$value){
            $fields_string .= $key.'='.$value.'&'; rtrim($fields_string,'&');
        }
        rtrim($fields_string,'&');
        $url_final = $url.'?'.$fields_string;
        $ch = curl_init();
        curl_setopt($ch,CURLOPT_URL,$url_final);
        // curl_setopt($ch,CURLOPT_POST,count($fields));
        // curl_setopt($ch,CURLOPT_POSTFIELDS,$fields_string);
        $result = curl_exec($ch);
        curl_close($ch);

    }
    function create_session($data)
    {
    	$_SESSION['user'] = $data;
    }
    function landing_page_session_check(){
		if(!isset($_SESSION["user"]) || empty($_SESSION["user"])){
			header('location:../index.php');
		}
	}

	function login_page_session_check(){
		if(isset($_SESSION["user"])){
			header('location:view');
		}
	}
