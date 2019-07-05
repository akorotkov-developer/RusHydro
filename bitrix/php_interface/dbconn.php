<?
$_SERVER['SERVER_NAME'] = str_replace(':8008', '', $_SERVER['SERVER_NAME']);
$SERVER_PORT = 80; 
$_SERVER['SERVER_PORT'] = 80;

define("DBPersistent", false);
$DBType = "mysql";
$DBHost = "localhost";
$DBLogin = "rushydro";
$DBPassword = "HeccrjtUblhj";
$DBName = "bitrix";
$DBDebug = false;
$DBDebugToFile = false;

//@set_time_limit(3600);

define("DELAY_DB_CONNECT", true);
define("CACHED_b_file", 3600);
define("CACHED_b_file_bucket_size", 10);
define("CACHED_b_lang", 3600);
define("CACHED_b_option", 3600);
define("CACHED_b_lang_domain", 3600);
define("CACHED_b_site_template", 3600);
define("CACHED_b_event", 3600);
define("CACHED_b_agent", 3660);
define("CACHED_menu", 3600);

define("BX_UTF", true);
define("BX_FILE_PERMISSIONS", 0644);
define("BX_DIR_PERMISSIONS", 0775);
@umask(~BX_DIR_PERMISSIONS);
@ini_set("memory_limit", "512M");
define("BX_DISABLE_INDEX_PAGE", true);

define('BX_CACHE_TYPE', 'files');
define("BX_CACHE_SID", $_SERVER["DOCUMENT_ROOT"]."#01");
define('BX_MEMCACHE_HOST', 'localhost');


//define('BASE_DOMAIN', 'rushydro.ru:8080');
define('BASE_DOMAIN', 'rushydro.ru');

if (
	strpos($_SERVER['HTTP_HOST'], '.eng.') !== false 
	&& strpos($_SERVER['REQUEST_URI'], '/bitrix/') === false
) {
	define('LANGUAGE_ID', 'en');
}
?>
