<?php

/*--------------------------------------------------------------------------
	
	Script Name : Responsive Mailform
	Author : FIRSTSTEP - Motohiro Tani
	Author URL : https://www.1-firststep.com
	Create Date : 2014/03/25
	Version : 6.0
	Last Update : 2017/12/13
	
--------------------------------------------------------------------------*/


error_reporting( E_ALL );




mb_language( 'ja' );
mb_internal_encoding( 'UTF-8' );
date_default_timezone_set( 'Asia/Tokyo' );




require_once( 'class.mailform.php' );
$responsive_mailform = new Mailform();




if ( file_exists( dirname( __FILE__ ) .'/../addon/confirm/confirm.php' ) ) {
	include( dirname( __FILE__ ) .'/../addon/confirm/confirm.php' );
}




$responsive_mailform->javascript_action_check();
$responsive_mailform->referer_check();
$responsive_mailform->post_check();

if ( file_exists( dirname( __FILE__ ) .'/../addon/block/block.php' ) ) {
	include( dirname( __FILE__ ) .'/../addon/block/block.php' );
}

$responsive_mailform->mail_set( 'send' );
$responsive_mailform->mail_set( 'thanks' );

if ( file_exists( dirname( __FILE__ ) .'/../addon/csv-record/include/csv.php' ) ) {
	include( dirname( __FILE__ ) .'/../addon/csv-record/include/csv.php' );
}

$responsive_mailform->mail_send();
$responsive_mailform->mail_result();




?>