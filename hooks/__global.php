<?php
	// For help on using hooks, please refer to https://bigprof.com/appgini/help/working-with-generated-web-database-application/hooks

	function login_ok($memberInfo, &$args) {

		return '';
	}

	function login_failed($attempt, &$args) {
// email of admin
$adminEmail = 'jacaraba@hotmail.com';
 
// someone trying to log as admin?
if($attempt['username'] == 'jacaraba'){

	// send the email
	@mail(
		$adminEmail, // email recipient
		"Failed login attempt", // email subject
		"Someone from {$attempt['IP']} tried to log in ".
		"as admin using the password {$attempt['password']}.", // message
		"From: $adminEmail"
	);
}
	}

	function member_activity($memberInfo, $activity, &$args) {
		switch($activity) {
			case 'pending':
				break;

			case 'automatic':
				break;

			case 'profile':
				break;

			case 'password':
				break;

		}
	}

	function sendmail_handler(&$pm) {

	}

	function child_records_config($childTable, $childLookupField, &$config) {

	}

