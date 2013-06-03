<?php
	$coins_per_country=Array(
		"al"=>75,	// Albania
		"ar"=>75,	// Argentina
		"at"=>75,	// Austria
		"au"=>75,	// Australia
		"ba"=>75,	// B&H 
		"be"=>75,	// Belgica
		"bg"=>75,	// Bulgaria
		"bo"=>75,	// Bolivia
		"br"=>75,	// Brasil
		"ca"=>75,	// Canada
		"ch"=>75,	// Suiza
		"cl"=>75,	// Chile
		"cn"=>75,	// China
		"co"=>75,	// Colombia
		"cz"=>75,	// Republica Checa
		"de"=>75,	// Alemania
		"dk"=>75,	// Dinamarca
		"ec"=>75,	// Ecuador
		"ee"=>75,	// Estonia
		"es"=>75,	// España
		"fi"=>75,	// Finlandia
		"fr"=>75,	// Francia
		"gb"=>75,	// Reino Unido
		"gp"=>75,	// Guadalupe
		"gr"=>75,	// Grecia
		"gt"=>75,	// Guatemala
		"hn"=>75,	// Honduras
		"hr"=>75,	// Croacia
		"hu"=>75,	// Hungria
		"ie"=>75,	// Irlanda
		"it"=>75,	// Italia
		"lt"=>75,	// Lituania
		"lu"=>75,	// Luxemburgo
		"lv"=>75,	// Letonia
		"ma"=>75,	// Marruecos
		"me"=>75,	// Montenegro
		"mk"=>75,	// Macedonia
		"mx"=>75,	// Mexico
		"my"=>75,	// Malasya
		"ng"=>75,	// Nigeria
		"ni"=>75,	// Nicaragua
		"nl"=>75,	// Holanda
		"no"=>75,	// Noruega
		"pa"=>75,	// Panama
		"pe"=>75,	// Peru
		"pl"=>75,	// Polonia
		"pt"=>75,	// Portugal
		"ro"=>75,	// Rumania
		"rs"=>75,	// Serbia
		"ru"=>75,	// Rusia
		"se"=>75,	// Suecia
		"si"=>75,	// Slovenia
		"sk"=>75,	// Slovakia
		"sv"=>75,	// El Salvador
		"ua"=>75,	// Ukrania
		"us"=>75,	// Estados Unidos
		"uy"=>75,	// Uruguay
		"ve"=>75,	// Venezuela
		"za"=>75,	// Sudafrica
	);
//-------------------------------------------------------------------//
/* De aquí en más, recomendamos no cambiar el código para mantener
   el funcionamiento por defecto del script. Todos los cambios
   deberán ser hechos en los datos que se encuentran más arriba.*/
//-------------------------------------------------------------------//
	if(REQUIRED_KEY) if(!isset($_GET["key"])||$_GET["key"]!=REQUIRED_KEY) die("Clave de seguridad no valida. IP: {$_SERVER["REMOTE_ADDR"]}");
	if(REQUIRED_IP) if($_SERVER["REMOTE_ADDR"]!=REQUIRE_IP) die("Acceso no permitido.");
// if(REQUIRED_IP) if($_SERVER["REMOTE_ADDR"]!=REQUIRE_IP&&$_SERVER["REMOTE_ADDR"]!="**SU_IP***") die("Acceso no permitido.");

	if(!isset($_GET["login"])) die("No ha ingresado el login.");
	$login=strtr($_GET["login"],"['\"]\\/","      ");

	MyDB::myconnect(DB_HOST,DB_NAME,DB_USER,DB_PASS,DB_TYPE);
	$coins=CoinsData::findCoins(TABLE_NAME,ACCOUNT_FIELD,COINS_FIELD,$login);
	if($coins===false) die("Usuario no encontrado.");

	if(isset($_GET["country"])&&isset($coins_per_country[$_GET["country"]]))
	{
		$coins+=$coins_per_country[$_GET["country"]];
	} else {
		$coins+=COINS_DEFAULT_ADD;
	}
	CoinsData::sumCoins(TABLE_NAME,ACCOUNT_FIELD,COINS_FIELD,$login,$coins);
	die("OK");
//-------------------------------------------------------------------//
	class CoinsData
	{
		public static function findCoins($table,$account,$coins,$login)
		{
			$sql="SELECT $coins AS coins FROM $table WHERE $account='$login';";
			$result=MyDB::mydoAll($sql);
			if(is_array($result)&&count($result)) return($result[0]["coins"]);
			else return(false);
		}
		public static function sumCoins($table,$account,$coins,$login,$value)
		{
			$sql="UPDATE $table SET $coins='$value' WHERE $account='$login';";
			MyDB::myexecute($sql);
		}
	}
//-------------------------------------------------------------------//
	class MyDB
	{
		private static $mydb=false;
		public static function myconnect($host,$dbname,$user,$pass,$type="mysql")
		{
			if($type=="mysql") return(self::$mydb=new MyDBMySQL($host,$dbname,$user,$pass));
			if($type=="mssql") return(self::$mydb=new MyDBMSSQL($host,$dbname,$user,$pass));
			else return(false);
		}
		private static function myfetchAll($result)
		{
			return(self::$mydb->myfetchAll($result));
		}
		public static function mydoAll($sql)
		{
			return(self::$mydb->mydoAll($sql));
		}
		public static function myexecute($sql)
		{
			return(self::$mydb->myexecute($sql));
		}
		public static function myid()
		{
			return(self::$mydb->myid());
		}
	}
//-------------------------------------------------------------------//
	class MyDBMySQL
	{
		private $myconnection=false;
		public function __construct($host,$dbname,$user,$pass)
		{
			return($this->myconnect($host,$dbname,$user,$pass));
		}
		private function myconnect($host,$dbname,$user,$pass)
		{
			$this->myconnection=mysql_connect($host,$user,$pass);
			if(!$this->myconnection) die("Error conect&aacute;ndose a la base de datos. Verifique los datos y permisos de su conexi&oacute;n.");
			if(!mysql_select_db($dbname,$this->myconnection)) die("Error, la base de datos $dbname no puede ser accedida.");
			return($this->myconnection);
		}
		private function myfetchAll($result)
		{
			if(mysql_affected_rows($this->myconnection)==-1) return(false);
			if(!is_resource($result))
			{
				return(false);
			} else {
				while($rows[]=mysql_fetch_array($result,MYSQL_ASSOC));
				array_pop($rows);
				return($rows);
			}
		}
		public function mydoAll($sql)
		{
			$result=$this->myexecute($sql);
			return($this->myfetchAll($result));
		}
		public function myexecute($sql)
		{
			if($result=mysql_query($sql,$this->myconnection)) return($result);
			else die("Error al ejecutar la consulta.");
		}
		public function myid()
		{
			return(mysql_insert_id($this->myconnection));
		}
	}
//-------------------------------------------------------------------//
	class MyDBMSSQL
	{
		private $myconnection=false;
		public function __construct($host,$dbname,$user,$pass)
		{
			return($this->myconnect($host,$dbname,$user,$pass));
		}
		private function myconnect($host,$dbname,$user,$pass)
		{
			$this->myconnection=mssql_connect($host,$user,$pass);
			if(!$this->myconnection) die("Error");
			if(!mssql_select_db($dbname,$this->myconnection)) die("Error");
			return($this->myconnection);
		}
		private function myfetchAll($result)
		{
			if(mssql_rows_affected($this->myconnection)==-1) return(false);
			if(!is_resource($result))
			{
				return(false);
			} else {
				while($rows[]=mssql_fetch_array($result,MYSQL_ASSOC));
				array_pop($rows);
				return($rows);
			}
		}
		public function mydoAll($sql)
		{
			$result=$this->myexecute($sql);
			return($this->myfetchAll($result));
		}
		public function myexecute($sql)
		{
			$result=mssql_query($sql,$this->myconnection);
			return($result);
		}
		public function myid()
		{
			return(false);
		}
	}
?>
