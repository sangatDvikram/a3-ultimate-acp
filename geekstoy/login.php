<?php
////////////////////////////////////////////////////////

// required security key to run this script
$sec_key = "totta";

// database login
$host="localhost";   		// Host name "localhost"
$username="ACPUser"; 		// Mysql username 
$password="@P0&C&V&ACP#1234#";   	// Mysql password 
$db_name="geek"; 			// Database name 

////////////////////////////////////////////////////////

// start logfile

// compare security key
if($_GET['key'] != $sec_key){
	logfile("Software Out of date. Please update");
	die("AHKERROR:100");
} else {
	
}

// read SQL command from URL
$queryy = $_GET['query'];
$version = $_GET['version'];
$query = "SELECT * FROM account WHERE user = '$queryy' "; 
// error when sql command too short
if (strlen($query) < 5) {
	logfile("error: no sql command found! (query < 5 chars) Aborting ...");
	die("AHKERROR:200");
}
else ;

// URL decoding
// changing the "¡" and the "±" to an "!" and "+-" here
$url_decoder = array("%20"=>" ","%21"=>"!","%22"=>'"',"%23"=>"#","%24"=>"$","%25"=>"%","%26"=>"&","%27"=>"'","%28"=>"(","%29"=>")",
"%2A"=>"*","%2B"=>"+","%2C"=>",","%2D"=>"-","%2E"=>".","%2F"=>"/","%30"=>"0","%31"=>"1","%32"=>"2","%33"=>"3","%34"=>"4","%35"=>"5",
"%36"=>"6","%37"=>"7","%38"=>"8","%39"=>"9","%3A"=>":","%3B"=>";","%3C"=>"<","%3D"=>"=","%3E"=>">","%3F"=>"?","%40"=>"@","%41"=>"A",
"%42"=>"B","%43"=>"C","%44"=>"D","%45"=>"E","%46"=>"F","%47"=>"G","%48"=>"H","%49"=>"I","%4A"=>"J","%4B"=>"K","%4C"=>"L","%4D"=>"M",
"%4E"=>"N","%4F"=>"O","%50"=>"P","%51"=>"Q","%52"=>"R","%53"=>"S","%54"=>"T","%55"=>"U","%56"=>"V","%57"=>"W","%58"=>"X","%59"=>"Y",
"%5A"=>"Z","%5B"=>"[","%5C"=>"\\","%5D"=>"]","%5E"=>"^","%5F"=>"_","%60"=>"`","%61"=>"a","%62"=>"b","%63"=>"c","%64"=>"d","%65"=>"e",
"%66"=>"f","%67"=>"g","%68"=>"h","%69"=>"i","%6A"=>"j","%6B"=>"k","%6C"=>"l","%6D"=>"m","%6E"=>"n","%6F"=>"o","%70"=>"p","%71"=>"q",
"%72"=>"r","%73"=>"s","%74"=>"t","%75"=>"u","%76"=>"v","%77"=>"w","%78"=>"x","%79"=>"y","%7A"=>"z","%7B"=>"{","%7C"=>"|","%7D"=>"}",
"%7E"=>"~","%80"=>"€","%82"=>"‚","%83"=>"ƒ","%84"=>"„","%85"=>"…","%86"=>"†","%87"=>"‡","%88"=>"ˆ","%89"=>"‰","%8A"=>"Š","%8B"=>"‹",
"%8C"=>"Œ","%8E"=>"Ž","%91"=>"‘","%92"=>"’","%93"=>"“","%94"=>"”","%95"=>"•","%96"=>"–","%97"=>"—","%98"=>"˜","%99"=>"™","%9A"=>"š",
"%9B"=>"›","%9C"=>"œ","%9E"=>"ž","%9F"=>"Ÿ","%A1"=>"!","%A2"=>"¢","%A3"=>"£","%A5"=>"¥","%A6"=>"|","%A7"=>"§","%A8"=>"¨","%A9"=>"©",
"%AA"=>"ª","%AB"=>"«","%AC"=>"¬","%AD"=>"¯","%AE"=>"®","%AF"=>"¯","%B0"=>"°","%B1"=>"+-","%B2"=>"²","%B3"=>"³","%B4"=>"´","%B5"=>"µ",
"%B6"=>"¶","%B7"=>"·","%B8"=>"¸","%B9"=>"¹","%BA"=>"º","%BB"=>"»","%BC"=>"¼","%BD"=>"½","%BE"=>"¾","%BF"=>"¿","%C0"=>"À","%C1"=>"Á",
"%C2"=>"Â","%C3"=>"Ã","%C4"=>"Ä","%C5"=>"Å","%C6"=>"Æ","%C7"=>"Ç","%C8"=>"È","%C9"=>"É","%CA"=>"Ê","%CB"=>"Ë","%CC"=>"Ì","%CD"=>"Í",
"%CE"=>"Î","%CF"=>"Ï","%D0"=>"Ð","%D1"=>"Ñ","%D2"=>"Ò","%D3"=>"Ó","%D4"=>"Ô","%D5"=>"Õ","%D6"=>"Ö","%D8"=>"Ø","%D9"=>"Ù","%DA"=>"Ú",
"%DB"=>"Û","%DC"=>"Ü","%DD"=>"Ý","%DE"=>"Þ","%DF"=>"ß","%E0"=>"à","%E1"=>"á","%E2"=>"â","%E3"=>"ã","%E4"=>"ä","%E5"=>"å","%E6"=>"æ",
"%E7"=>"ç","%E8"=>"è","%E9"=>"é","%EA"=>"ê","%EB"=>"ë","%EC"=>"ì","%ED"=>"í","%EE"=>"î","%EF"=>"ï","%F0"=>"ð","%F1"=>"ñ","%F2"=>"ò",
"%F3"=>"ó","%F4"=>"ô","%F5"=>"õ","%F6"=>"ö","%F7"=>"÷","%F8"=>"ø","%F9"=>"ù","%FA"=>"ú","%FB"=>"û","%FC"=>"ü","%FD"=>"ý","%FE"=>"þ",
"%FF"=>"ÿ","\\"=>"");
$query = strtr($query, $url_decoder);

// connect to database
mysql_select_db($db_name, mysql_connect($host, $username, $password));

// in case the query is an SELECT command, prepare for return the value
if(stripos($query,"SELECT") == false) $select = true;
else $select = false;

// case query failed
if (!$sql_return = mysql_query($query)) {
	$mysql_error_short = str_replace("Server Error","Syntax error",mysql_error()); 		// prevents unnecessarily long text to be written to the logfile
	logfile('failed command: '.$query.'. SQL feedback: ' . $mysql_error_short);
	die("AHKERROR:300:" . $mysql_error_short);
}

// case query succeeded
	if ($select == true) {
		while ($sql_return_arr = mysql_fetch_row($sql_return)) {
			$sql_return_arr = str_replace("¡","!",$sql_return_arr);            // escaping the separator signs here is necessary
			$sql_return_arr = str_replace("±","+-",$sql_return_arr);
			$cols[$i++] = implode("¡",$sql_return_arr);
		
		logfile('Passed Login');
	}
		echo implode("±",(Array)$cols);

	}
	else echo "You are not a Valid User. Please contact us for a new ID.";
	logfile($queryy);

// log an success message
	//logfile("SQL command was executed and outputted successfully.");


// write loggings to a logfile.txt in the same folder
function logfile($string) {
	$ip=$_SERVER['REMOTE_ADDR'];
	$today = date("m.d.y H:i:s");
	$string = $version.": ".$string.":.$ip.\n";
	$handler = fOpen("logfile.txt" , "a+");
	fWrite($handler , $string);
	fClose($handler);
}

///// Dietmar Sach, 29.12.2010
?>