<?php

/**
 * XTEC ************ ADDED -> New class message
 * 
 * This class is used to create new mail messages
 * 
 * Basic example of using this class:
 * 
 * 
 * 
 * @author IECISA @mmartinez
 * @version 1.0
 */

    define('TEXTPLAIN', 'text/plain');
	define('TEXTHTML', 'text/html');
	
class message {
	
	/**
	 * Define variables to use
	 */ 
	//Define strings
	private $subject = '', $bodyContent = '', $bodyType = 'text/plain';
	//Define booleans
	private $islogger = false, $debug = false;
	//Define objects
	private $logger;
	//Define arrais
	private $to = array(), $cc = array(), $bcc = array(), $attachfilenames = array(), $attachfilepaths = array(), $attachfilecontents = array(), $attachmimetypes = array(); 
	//Define arrais list
	private $allowed_bodyType = array (TEXTPLAIN,
	                                   TEXTHTML);
	private $alloweb_in = array ('to',
	                             'cc',
	                             'bcc');
	private $error = array('bodyType' => false,
	                       'subject' => false);
	
	/**
	 * Class constructor
	 * 
	 * @param int    $bodyType -> set the body content type (default: TEXTPLAIN, TEXTHTML, other options are discarded)
	 * @param bool   $log      -> 
	 * @param bool   $logdebug ->
	 * @param string $logpath  ->
	 */
	function message ($bodyType = TEXTPLAIN, $log = false, $logdebug = false, $logpath = ''){
		
		//Set logger
		$this->islogger = ($log)? $this->get_logger($logdebug, $logpath) : false;
		
	    if ($this->islogger){
		    $this->logger->add('message.class.php: Loading class...');
		}
		
		//Set bodyType
		$this->set_bodyType($bodyType);
		
	    if ($this->islogger){
			if (in_array(true, $this->error)){
				$this->logger->add('message.class.php: Class loaded with errors');
			}else {
		        $this->logger->add('message.class.php: Class loaded successfull');
			}
		}
	}
	
    /**
	 * Print de log generated by the class
	 * 
	 * @return string -> full string with the log
	 */
	function print_log (){
		
		// check if logger is up and if true print else do nothing
		if ($this->islogger && $log = $this->logger->get_log('<br>')){
		    echo '<br><br><b>Log generated on '.date("d-m-Y H:i:s").':</b><br>'.$log;
		}
		
		return;
	}
	
////////////////////////////////////////////////////////
//////////          SET/GET FUNCTIONS          /////////
////////////////////////////////////////////////////////

	/**
	 * Set adress
	 * 
	 * @param array/string $address -> the address of the email destinataries
	 * @param string       $in      -> type of address (to, cc, bcc)
	 * @return bool                 -> true if all ok or false if not
	 */
	public function set_adress ($adress = null, $in = null){
		
		//check if parameter $to is empty
		if (empty($adress)){
			if ($this->islogger){
				$this->logger->add('message.class.php: set_adress parameter $adress is empty', 'ERROR');
			}
			return false;
		}
		
	    //check if parameter $in is empty
		if (empty($in)){
			if ($this->islogger){
				$this->logger->add('message.class.php: set_adress parameter $in is empty', 'ERROR');
			}
			return false;
		}
		
		//check if parameter $in is in the alloweb list
		if (!in_array($in, $this->alloweb_in)){
			if ($this->islogger){
				$this->logger->add('message.class.php: set_adress parameter $in is not alloweb', 'ERROR');
			}
			return false;
		}
		
		$cnt = 0;
		
		//check if is array or a string
		if (is_array($adress)){
		    //if array, store all elements 
		    if (count($adress)>0){
		    	foreach($adress as $t){
		    		//sanitate
		    		$t = trim($t);
		    		if (strlen($t) == 0){
		    			continue;
		    		}
		    		//store
		    		$this->{$in}[] = $t;
		    		$cnt++;
		    	}
		    } else {
		    	if ($this->islogger){
		    		$this->logger->add('message.class.php: set_adress parameter $adress array is empty', 'ERROR');
		    	}
		    }
		} else {
			//if string, sanitate and store value
			//sanitate
			$adress = trim($adress);
			//store
			if (strlen($adress)>0){
				//store
		    	$this->{$in}[] = $adress;
		    	$cnt++;
			} else {
			    if ($this->islogger){
		    		$this->logger->add('message.class.php: set_adress parameter $adress string is empty', 'ERROR');
		    	}
			}
		}
		
	    //print log
		if ($this->islogger){
			$this->logger->add('message.class.php: set adress to property $'.$in.' OK. Added '.$cnt.' adress');
		}
		//print debug
	    if ($this->debug){
			$this->logger->add('message.class.php: setted property $'.$in.' value is "'.serialize($adress).'"', 'DEBUG');
		}
				
		return true;
	}
	
	/**
	 * Get adress
	 * 
	 * @param string $in -> type of address to get
	 * @return array     -> array with the elements
	 */
	function get_adress ($in = null){
		
	    //check if parameter $in is empty
		if (empty($in)){
			if ($this->islogger){
				$this->logger->add('message.class.php: get_adress parameter $in is empty', 'ERROR');
			}
			return false;
		}
		
		//check if parameter $in is in the alloweb list
		if (!in_array($in, $this->alloweb_in)){
			if ($this->islogger){
				$this->logger->add('message.class.php: get_adress parameter $in is not alloweb', 'ERROR');
			}
			return false;
		}
		
	    //print log
		if ($this->islogger){
			$this->logger->add('message.class.php: get adress of property $'.$in.' OK. Getted '.count($this->{$in}).' adress');
		}
		//print debug
	    if ($this->debug){
			$this->logger->add('message.class.php: getted property $'.$in.' value is "'.serialize($this->{$in}).'"', 'DEBUG');
		}
		
		return $this->{$in};
	}
	
	/**
	 * Set $to
	 * 
	 * @param string/array $to -> the address of the to email destinataries
	 * @return bool            -> true if all ok or false if not
	 */
	function set_to ($to = null){
		
		return $this->set_adress($to, 'to');
	}
	
	/**
	 * Get to
	 * 
	 * @return array -> array with the elements
	 */
	function get_to (){
		
		return $this->get_adress('to');
	}
	
    /**
	 * Set $cc
	 * 
	 * @param string/array $cc -> the address of the cc email destinataries
	 * @return bool            -> true if all ok or false if not
	 */
	function set_cc ($cc = null){
		
		return $this->set_adress($cc, 'cc');
	}
	
	/**
	 * Get cc
	 * 
	 * @return array -> array with the elements
	 */
	function get_cc (){
		
		return $this->get_adress('cc');
	}
	
    /**
	 * Set $bcc
	 * 
	 * @param string/array $bcc -> the address of the bcc email destinataries
	 * @return bool             -> true if all ok or false if not
	 */
	function set_bcc ($bcc = null){
		
		return $this->set_adress($bcc, 'bcc');
	}
	
	/**
	 * Get cc
	 * 
	 * @return array -> array with the elements
	 */
	function get_bcc (){
		
		return $this->get_adress('bcc');
	}

	/**
	 * Set bodyType
	 * 
	 * @param int  $bodyType -> set the body content type
	 * @return bool          -> true if all ok or false if not
	 */
	private function set_bodyType ($bodyType = null){
		
		//Set bodyType error to false
		$this->error['bodyType'] = false;
		
		// Check if parameter $bodyType is passed
		if (empty($bodyType)){
			if ($this->islogger){
				$this->logger->add('message.class.php: set_bodyType parameter is empty', 'ERROR');
			}
			$this->error['bodyType'] = true;
			return false;
		}
		
		// Check if the value passed in $bodyType is in the $allowebBodyType
		if (!in_array($bodyType, $this->allowed_bodyType)){
		    if ($this->islogger){
				$this->logger->add('message.class.php: set_bodyType parameter is not alloweb', 'ERROR');
			}
			$this->error['bodyType'] = true;
			return false;
		} 
		
		//Set bodyType string
		$this->bodyType = $bodyType;
		
		//print log
		if ($this->islogger){
			$this->logger->add('message.class.php: set bodyType OK');
		}
		//print debug
	    if ($this->debug){
			$this->logger->add('message.class.php: bodyType property is "'.$this->bodyType.'"', 'DEBUG');
		}
		
		return true;
	}
	
	/**
	 * Get bodyType
	 * 
	 * @return string -> the bodyType in string
	 */
	function get_bodyType (){
		
		return $this->bodyType;
		
	}
	
	/**
	 * Set subject
	 * 
	 * @param string $str -> subject
	 * @return bool       -> true if all ok or false if not
	 */
	function set_subject ($str = null){
		
	    // Check if parameter $str is passed
		if (empty($str)){
			if ($this->islogger){
				$this->logger->add('message.class.php: set_subject parameter $str is empty', 'ERROR');
			}
			$this->error['subject'] = true;
			return false;
		}
		
		//sanitate
		$str = trim($str);
		
		if (strlen($str) < 1){
			if ($this->islogger){
				$this->logger->add('message.class.php: set_subject parameter $str is length 0', 'ERROR');
			}
			$this->error['subject'] = true;
			return false;
		}
		
		//set $subject string
		$this->subject = $str;
		
	    //print log
		if ($this->islogger){
			$this->logger->add('message.class.php: set subject OK');
		}
		//print debug
	    if ($this->debug){
			$this->logger->add('message.class.php: subject property is "'.$str.'"', 'DEBUG');
		}
		
		return true;
		
	}
	
	/**
	 * Get subject
	 * 
	 * @return string -> the subject in string
	 */
	function get_subject (){
		
		return $this->subject;
		
	}
	
	/**
	 * Set bodyContent
	 * 
	 * @param string $str -> bodyContent
	 * @return bool       -> true if all ok or false if not
	 */
	function set_bodyContent ($str = null){
		
		// Check if parameter $str is passed
		if (empty($str)){
			if ($this->islogger){
				$this->logger->add('message.class.php: set_bodyContent parameter $str is empty', 'ERROR');
			}
			$this->error['bodyContent'] = true;
			return false;
		}
		
		//sanitate
		$str = trim($str);
		
		if (strlen($str) < 1){
			if ($this->islogger){
				$this->logger->add('message.class.php: set_bodyContent parameter $str is length 0', 'ERROR');
			}
			$this->error['bodyContent'] = true;
			return false;
		}
		
		//set $subject string
		$this->bodyContent = $str;
		
	    //print log
		if ($this->islogger){
			$this->logger->add('message.class.php: set bodyContent OK');
		}
		//print debug
	    if ($this->debug){
			$this->logger->add('message.class.php: bodyContent property is "'.$str.'"', 'DEBUG');
		}
		
		return true;
		
	}
	
	/**
	 * Get bodyContent
	 * 
	 * @return string -> the bodyContent in string
	 */
	function get_bodyContent (){
		
		return $this->bodyContent;
		
	}
	
    /**
	 * Set attach file by path on WS Server
	 * 
	 * @param string $name -> the name of the attached file
	 * @param string $path -> the absolute path to the app server where is allocated the attached file
	 * @return bool        -> true if all ok or false if not
	 */
	function set_attachByPathOnWsServer ($name = null, $path = null){
		
		//Check if parameter $name is passed
	    if (empty($name)){
			if ($this->islogger){
				$this->logger->add('message.class.php: set_attachByPathOnWsServer parameter $name is empty', 'ERROR');
			}
			return false;
		}
		
	    //Check if parameter $path is passed
	    if (empty($path)){
			if ($this->islogger){
				$this->logger->add('message.class.php: set_attachByPathOnWsServer parameter $path is empty', 'ERROR');
			}
			return false;
		}
		
		//set all attach array
		$this->attachfilenames[]    = $name;
		$this->attachfilepaths[]    = $path;
		$this->attachfilecontents[] = null;
		$this->attachmimetypes []   = null;
		
	    //print log
		if ($this->islogger){
			$this->logger->add('message.class.php: set_attachByPathOnWsServer OK');
		}
		//print debug
	    if ($this->debug){
			$this->logger->add('message.class.php: attachByPathOnWsServer properties are {$name: "'.$name.'", $path: "'.$path.'"}', 'DEBUG');
		}
		
		return true;
	}
	
	/**
	 * Set attach file by path on the application server
	 * 
	 * @param string $name -> the name of the attached file
	 * @param string $path -> the absolute path to the app server where is allocated the attached file
	 * @return bool        -> true if all ok or false if not
	 */
	function set_attachByPathOnAppServer ($name = null, $path = null){
		
		//Check if parameter $name is passed
	    if (empty($name)){
			if ($this->islogger){
				$this->logger->add('message.class.php: set_attachByPathOnAppServer parameter $name is empty', 'ERROR');
			}
			return false;
		}
		
	    //Check if parameter $path is passed
	    if (empty($path)){
			if ($this->islogger){
				$this->logger->add('message.class.php: set_attachByPathOnAppServer parameter $path is empty', 'ERROR');
			}
			return false;
		}
		
		//set all attach array
		$this->attachfilenames[]    = $name;
		$this->attachfilepaths[]    = null;
		$this->attachfilecontents[] = $path;
		$this->attachmimetypes []   = null;
		
	    //print log
		if ($this->islogger){
			$this->logger->add('message.class.php: set_attachByPathOnAppServer OK');
		}
		//print debug
	    if ($this->debug){
			$this->logger->add('message.class.php: attachByPathOnAppServer properties are {$name: "'.$name.'", $path: "'.$path.'"}', 'DEBUG');
		}
		
		return true;
	}
	
	/**
	 * Set attach file by content
	 * 
	 * @param string $name           -> the name of the attached file
	 * @param string $attachbinary   -> the file to attach in binary mode
	 * @param string $attachmimetype -> the mime.type of the file attached
	 * @return bool                  -> true if all ok or false if not
	 */
	function set_attachByContent ($name = null, $attachbinary = null, $attachmimetype = null){
		
	    //Check if parameter $name is passed
	    if (empty($name)){
			if ($this->islogger){
				$this->logger->add('message.class.php: set_attachByContent parameter $name is empty', 'ERROR');
			}
			return false;
		}
		
	    //Check if parameter $path is passed
	    if (empty($attachbinary)){
			if ($this->islogger){
				$this->logger->add('message.class.php: set_attachByContent parameter $attachbinary is empty', 'ERROR');
			}
			return false;
		}
		
	    //Check if parameter $path is passed
	    if (empty($attachmimetype)){
			if ($this->islogger){
				$this->logger->add('message.class.php: set_attachByContent parameter $attachmimetype is empty', 'ERROR');
			}
			return false;
		}
		
		//set all attach array
		$this->attachfilenames[]    = $name;
		$this->attachfilepaths[]    = null;
		$this->attachfilecontents[] = $attachbinary;
		$this->attachmimetypes []   = $attachmimetype;
		
	    //print log
		if ($this->islogger){
			$this->logger->add('message.class.php: set_attachByPathOnAppServer OK');
		}
		//print debug
	    if ($this->debug){
			$this->logger->add('message.class.php: attachByPathOnAppServer properties are {$name: "'.$name.'", $attachbinary: "'.$attachbinary.'", $attachmimetype: "'.$attachmimetype.'"}', 'DEBUG');
		}
		
		return true;
	}
	/**
	 * Get attach file
	 * 
	 * @return array -> multidimesion array with all the attached content
	 */
	function get_attach (){
		
		return array($this->attachfilenames, $this->attachfilepaths, $this->attachfilecontents, $this->attachmimetypes);
		
	}
	
	/**
	 * Check if isset the logger class, else denie any log
	 * 
	 * @param bool $debug  -> activate debug mode or not
	 * @param string $path -> absolute path where file log wil be stored
	 * @return bool        -> true if logger could be loaded or false if not
	 */
	private function get_logger ($debug = false, $path = ''){
		
		//include log4p class
	    if (!@include_once('log4p.class.php')){
		    $this->logger = false;
		    $this->debug  = false;
		    return false;
		}
		
	    //set default path location
		if (empty($path)){
			//get actuall path
	  		$pwd = dirname(__FILE__);
	  		$pwd = str_replace('\\', '/', $pwd);
	  		//go one folder up
	  		$pwdarray = explode ('/', $pwd);
	  		$pwd = "";
		    for ($i=0;$i<count($pwdarray)-1;$i++){
	  			$pwd .= $pwdarray[$i].'/';
	  		}
			$path = $pwd.'log/mailsender.log';
		}
		
		$this->logger = new log4p(true, $path);
		
		if ($debug){		    	
		    $this->debug = $debug;
		}
		
		return true;
	}
}