<?php

/**
 * This class manages email sending
 * 
 * @copyright KASalgado 2010 - 2012
 * @author Kleber Salgado
 * @version 1.1
 */
class SendEmail {
	
	CONST DEFAULT_EMAIL_FROM = 'info@spanischkurs-berlin.de';
	CONST DEFAULT_EMAIL_TO = 'info@spanischkurs-berlin.de';
	CONST DEFAUTL_TEMPLATE = 'monitorHTML';
	
	/**
	 * Create a language object
	 */
	protected $_lang;
	
	
	/**
	 * Run as first
	 */
	public function __construct() {
		$objLanguages = new Languages();
		$this->_lang = $objLanguages->classXML( 'scripts.xml' );
	}
	
	
	/**
	 * Load the template and send email, verifing if was successfull
	 * @param array $params possible keys are
	 * <ul>
	 *  	<li><i>subject</i> email subject</li>
	 *  	<li><i>message</i> email message</li>  
	 *  	<li><i>info</i> additional information from message</li>
	 * 		<li><i>email(optional)</i> email address to be sent</li>
	 * 		<li><i>copy(optional)</i> email address for the hidden copy</li>
	 *  	<li><i>tpl</i> template name to be load</li>
	 *  </ul>
	 * @return true false according to the sending
	 */
	public function sendTemplate( $params ) {
		$infoText = '';
		$send = true;
		
		$tags = array( '[subject]', '[message]' );
		$content = array( $params['subject'], nl2br( $params['message'] ) );
		
		$pathTpl = APPLICATION_PATH . '/utils/emails/' . $params['tpl'] . '.txt';
		$codeHTML = file_get_contents( $pathTpl );
		
		if( isset( $params['info'] ) ) {
			foreach( $params['info'] as $title => $info )
				$infoText .= '<div><span class="markText">' . $this->_lang->$title . '</span>: ' . $info . '</div>';
				
			$tags[] = '[info]';
			$content[] = $infoText;
		}
		
		// Put subject and message
		$finalHTML = str_replace( $tags, $content, $codeHTML );
		
		$header  = 'MIME-Version: 1.0' . "\r\n";
		$header .= 'Content-type: text/html; charset=utf-8' . "\r\n";
		$header .= 'From: ' . self::DEFAULT_EMAIL_FROM . "\r\n";
		if( isset( $params['copy'] ) ) $header .= 'Bcc: ' . $params['copy'] . "\r\n";
		
		$objUrls = new URLs();
		$serverName = $objUrls->getServer();
		if( $serverName != 'localhost' ) $send = mail( $params['email'], $params['subject'], $finalHTML, $header );
		
		return $send ? true : false;
	}
}