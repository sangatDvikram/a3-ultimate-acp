<?php
function sanitize_output($buffer)
{
	$search = array(
		'/\>[^\S ]+/s',  // strip whitespaces after tags, except space
		'/[^\S ]+\</s',  // strip whitespaces before tags, except space
		'/(\s)+/s'       // shorten multiple whitespace sequences
	);
	$replace = array(
		'>',
		'<',
		'\\1'
	);

	$buffer = preg_replace($search, $replace, $buffer);
	return $buffer;
}
try {
	ini_set("display_errors", "0");
	//ob_start("sanitize_output");
	ob_start();
	$db = "webasd";
	$db2 = "weba3itemevent";
	$user = "sa";
	$password = "Valid789";
	$con = odbc_connect($db, $user, $password);
	$con2 = odbc_connect($db2, $user, $password);
} catch (Throwable $ex) {
	echo ("Sorry Not able to connect to odbc database!!");
}
//putenv("Asia/Kolkata");

session_start();
session_regenerate_id(true);

try {
	$cleardb_url      = parse_url(getenv("CLEARDB_DATABASE_URL"));
	$cleardb_server   = $cleardb_url["host"];
	$cleardb_username = $cleardb_url["user"];
	$cleardb_password = $cleardb_url["pass"];
	$cleardb_db       = substr($cleardb_url["path"], 1);
	define("DB_HOST", $cleardb_server); //DNS HOST
	define("DB_NAME", $cleardb_db); //Database
	define("DB_USER", $cleardb_username); //username of the database
	define("DB_PASS", $cleardb_password); //password of the database
	require 'class.MySqlDatabase.php';
	$mysql = new MySqlDatabase();
	$date = date('Y-m-d H:i:s');
	/*require 'class.session.php';

$session = new session();
// Set to true if using https
$session->start_session('_s', false);

*/

	/*
 *
 * ---------------------------------------------------------------------------------
 * MYSQL DATABASE CONNECTION SETTINGS
 * ---------------------------------------------------------------------------------
 */

	define("MYSQL_DB_HOST", $cleardb_server); //DNS HOST
	define("MYSQL_DB_DBNAME", $cleardb_db); //Database
	define("MYSQL_DB_USERNAME", $cleardb_username); //username of the database
	define("MYSQL_DB_PASSWORD", $cleardb_password); //password of the database
	$MysqlConnect = new PDO("mysql:host=" . MYSQL_DB_HOST . ";dbname=" . MYSQL_DB_DBNAME, MYSQL_DB_USERNAME, MYSQL_DB_PASSWORD);
	$MysqlConnect->setAttribute(PDO::ATTR_TIMEOUT, '1');
	$MysqlConnect->setAttribute(PDO::ATTR_PERSISTENT, 'false');
	$MysqlConnect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $ex) {
	echo ("Sorry Not able to connect to mysql database!!");
}


/*
 * ---------------------------------------------------------------------------------
 * ODBC DATABASE CONNECTION SETTINGS
 * ---------------------------------------------------------------------------------
 */
try {
	define("ODBC_DB_HOST", "odbc:webasd"); //DNS HOST
	define("ODBC_DB_USERNAME", "sa"); //username of the database
	define("ODBC_DB_PASSWORD", "Valid789"); //password of the database
	define("MYSQL_DB_HOST1", $cleardb_server); //DNS HOST
	define("MYSQL_DB_DBNAME1", $cleardb_db); //Database
	define("MYSQL_DB_USERNAME1", $cleardb_username); //username of the database
	define("MYSQL_DB_PASSWORD1", $cleardb_password); //password of the database
	$OdbcConnect = new PDO("mysql:host=" . MYSQL_DB_HOST1 . ";dbname=" . MYSQL_DB_DBNAME1, MYSQL_DB_USERNAME1, MYSQL_DB_PASSWORD1);
	$OdbcConnect->setAttribute(PDO::ATTR_TIMEOUT, '1');
	$OdbcConnect->setAttribute(PDO::ATTR_PERSISTENT, 'false');
	$OdbcConnect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $ex) {
	echo ("Sorry Not able to connect to odbc database!!" . $ex->getMessage());
}

require 'report_pk_function.php';
