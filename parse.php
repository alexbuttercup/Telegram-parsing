<?php
/*
Plugin Name: Get Melbet Link
Description: Get Current Melbet refferal link. Use shortcode [getMelbetLink] to get current link
Version: 1.0
Author: Alex Rusin
Author URI: https://netcats.link/
License: GPLv2 or later
Text Domain: melbet-link
*/
include 'madeline.php';

	//get data from API
	$MadelineProto = new \danog\MadelineProto\API('session.madeline');
	$MadelineProto->start();

	$messages_Messages = $MadelineProto->messages->getHistory(['peer' => '@melbetpartners', 'offset_id' => 0, 'offset_date' => 0, 'add_offset' => 0, 'limit' => 1, 'max_id' => 99999999, 'min_id' => 0 ]);
	$linkCell = $messages_Messages['messages'][0]['message'];

	//declaring variables and regexp
	$neededLink = 'http';
	$link_pattern = '~http.*?[.][a-z][a-z][a-z]?~i';

	//checking does link exist
	if(preg_match_all($link_pattern, $linkCell, $matches, PREG_PATTERN_ORDER)) { 
		if(strpos($linkCell, "http") !== false) {
			$reflink = $matches[0][0];
			echo '<a class="but-melbet" href="'.$reflink.'/L?tag=s_300047m_1107c_1&site=300047&ad=1107" rel="nofollow">Получить бонус Мелбет</a>';
			/*echo '<pre style="background-color: green">';
			print_r($matches);
			echo '</pre>';*/
		}
	}
	else {
		echo '<a class="but-melbet" href="#" rel="nofollow">Ссылка недоступна. Пожалуйста, попробуйте позднее</a>';
	}
?>