<?php
function sanitize_output($buffer) {
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
 ini_set("display_errors", "0");
//ob_start("sanitize_output");
ob_start();
$db = "webasd";
$db2 = "weba3itemevent";
$user = "sa";
$password = "Valid789";
$con = odbc_connect($db,$user,$password);
$con2 = odbc_connect($db2,$user,$password);
//putenv("Asia/Kolkata");

session_start();
session_regenerate_id(true);

try{

define( "DB_HOST", "localhost" ); //DNS HOST
define( "DB_NAME", "a3acp" ); //Database
define( "DB_USER", "root" ); //username of the database
define( "DB_PASS", "" ); //password of the database
require 'class.MySqlDatabase.php';
$mysql=new MySqlDatabase();
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

define( "MYSQL_DB_HOST", "localhost" ); //DNS HOST
define( "MYSQL_DB_DBNAME", "a3acp" ); //Database
define( "MYSQL_DB_USERNAME", "root" ); //username of the database
define( "MYSQL_DB_PASSWORD", "" ); //password of the database
$MysqlConnect = new PDO("mysql:host=".MYSQL_DB_HOST.";dbname=".MYSQL_DB_DBNAME, MYSQL_DB_USERNAME, MYSQL_DB_PASSWORD);
$MysqlConnect->setAttribute(PDO::ATTR_TIMEOUT, '1');
$MysqlConnect->setAttribute(PDO::ATTR_PERSISTENT, 'false');
$MysqlConnect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $ex)
{
	echo ("Sorry Not able to connect to mysql database!!");

}


/*
 * ---------------------------------------------------------------------------------
 * ODBC DATABASE CONNECTION SETTINGS
 * ---------------------------------------------------------------------------------
 */
try{
define( "ODBC_DB_HOST", "odbc:webasd" ); //DNS HOST
define( "ODBC_DB_USERNAME", "sa" ); //username of the database
define( "ODBC_DB_PASSWORD", "Valid789" ); //password of the database
$OdbcConnect = new PDO(ODBC_DB_HOST, ODBC_DB_USERNAME, ODBC_DB_PASSWORD);
$OdbcConnect->setAttribute(PDO::ATTR_TIMEOUT, '1');
$OdbcConnect->setAttribute(PDO::ATTR_PERSISTENT, 'false');
$OdbcConnect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $ex)
{
	echo ("Sorry Not able to connect to odbc database!!" .$ex->getMessage( ));
 
}

require 'report_pk_function.php';
?>