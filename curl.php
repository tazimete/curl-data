<?php

	function getHTML($url,$timeout)
	{
			error_reporting(0);
		   $ch = curl_init($url); // initialize curl with given url
		   //curl_setopt($ch, CURLOPT_HEADER, 1); 
		   //curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER["HTTP_USER_AGENT"]); // set  useragent
		   curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // write the response to a variable
		   curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout); // max. seconds to execute
		   return curl_exec($ch);
	}

	//$url = 'http://www.bbc.com/news';
	$url = 'http://www.independent.co.uk/';
	//$url = 'http://www.independent.co.uk/voices/donald-trump-refugees-anne-frank-turned-its-back-a7436241.html';

	$html=getHTML($url,10);
	$dom = new DOMDocument();
	$dom->loadHTML( $html );
	$dom->saveHTML();
	//print_r($dom); exit;
	//echo $dom->textContent;  

	$titles = $dom->getElementsByTagName('h1');
	foreach ($titles as $title) {
		echo $title->nodeValue."<br/> <br/>";
	}

	