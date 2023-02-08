<?php

class RecaptchaGoogle 
{
	private $_secret ;
	private $_url_api_recaptcha_google;
	private $_recaptchaResponse ; 
	private $_data;
	private $_response;

	public function get_secret(){
		return $this->_secret;
	}

	public function set_secret($secret){
		$this->_secret = $secret;	
	}

	public function get_url_api_recaptcha_google(){
		return $this->_secret;
	}

	public function set_url_api_recaptcha_google($url_api_recaptcha_google){
		$this->_url_api_recaptcha_google = $url_api_recaptcha_google;	
	}

	public function get_recaptchaResponse(){
		return $this->_recaptchaResponse;
	}

	public function set_recaptchaResponse($recaptchaResponse){
		$this->_recaptchaResponse = $recaptchaResponse;	
	}

	public function validaRecapchaGoogle()
	{
	   
	    $this->_data = array('secret' => $this->_secret, 'response' => $this->_recaptchaResponse);
	
	    $ch = curl_init();
	    curl_setopt($ch, CURLOPT_URL, $this->_url_api_recaptcha_google);
	    curl_setopt($ch, CURLOPT_POST, true);
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	    curl_setopt($ch, CURLOPT_POSTFIELDS, $this->_data);
	    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
	    $this->_response = curl_exec($ch);
	    curl_close($ch);
	    return json_decode($this->_response, true);
	    
	}
}