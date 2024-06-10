<?php
/* 
	-Jet Line (v7)-
	Author: Just Adil
	GitHub: https://GitHub.com/A01L
	Version: Jetline 0.7v
 */

//Set all config for gl-obal
require_once "config.php";
require_once 'modules/MobileDetect/Mobile_Detect.php';
session_start();

#--------------------------------------------DEFAULT FUNCTIONS-------------------------------------------

//Get and saver file
function get_file($path, $name, $newn = "null")
	{
		if (!@copy($_FILES["$name"]['tmp_name'], "containers/".$path.$_FILES["$name"]['name'])){
			return 1;
			}
		else {
			$fn = $_FILES["$name"]['name'];
			$type = format($fn);
			if ($newn != "null") {
				rename("containers/$path$fn", "containers/$path$newn.$type");
				return "$newn.$type";
			}
			else{
				$fnn=str_replace( " " , "_" , $_FILES["$name"]['name']);
				rename("containers/$path$fn", "containers/$path$fnn");
				return "$fnn";
			}
		}
	}


//Get foramt from file
function format($file)
	{
		 $temp= explode('.',$file);
		 $extension = end($temp);
		 return $extension;
	}

# ---------------------------------------------CLASS--------------------------------------------------#

//Other tools
class GEN {

	//Generate random symbols
	public static function str($length = 6, $mod = '*'){	
		if($mod == 'A'){
			$arr = array(
				'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 
				'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z',
			);
		}
		elseif($mod == 'a'){
			$arr = array(
				'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 
				'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z',
			);
		}
		elseif($mod == '*'){
			$arr = array(
				'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 
				'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z',
				'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 
				'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z',
			);
		}
		else{ return 'ERROR MOD'; }
	 
		$res = '';
		for ($i = 0; $i < $length; $i++) {
			$res .= $arr[random_int(0, count($arr) - 1)];
		}
		return $res;
	}
	
	//Generate random numbers
	public static function int($length = 6){
		$arr = array(
			'1', '2', '3', '4', '5', '6', '7', '8', '9', '0'
		);
	 
		$res = '';
		for ($i = 0; $i < $length; $i++) {
			$res .= $arr[random_int(0, count($arr) - 1)];
		}
		return $res;
	}

	//Generate random (numbers and symbols)
	public static function mix($length = 6){
		$arr = array(
			'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 
			'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z',
			'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 
			'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z', 
			'1', '2', '3', '4', '5', '6', '7', '8', '9', '0'
		);
	 
		$res = '';
		for ($i = 0; $i < $length; $i++) {
			$res .= $arr[random_int(0, count($arr) - 1)];
		}
		return $res;
	}

	//Generate link for whatsapp
	public static function wame($number, $msg = " "){
		$data=urlencode($msg);
		$link="https://api.whatsapp.com/send?phone=$number&text=$data";
		return $link;
	}

	//Generate link of text
	public static function url($msg){
		return urlencode($msg);
	}

}

// data base control
class DBC {

	//Count rows
	public static function count($table, $key){
		$ma = $key;
		$query = "SELECT * FROM `".$table."` WHERE ";
		$value = "VALUES (";
		foreach(array_keys($ma) as $key){
			$query = $query."`".$key."` = '".$ma["$key"]."' AND ";
		}
		$query = mb_eregi_replace("(.*)[^.]{4}$", '\\1', $query);
		$sql = $query;
		$conn = $GLOBALS['db'];

		if($result = $conn->query($sql)){
			$rowsCount = $result->num_rows; // ID - constant
			return $rowsCount;
			//return $rowsCount;
			$result->free();
		}

	}

	//Add data to table
	public static function insert($table, $values){
		$ma = $values;
		$query = "INSERT INTO `".$table."`(";
		$value = "VALUES (";
		foreach(array_keys($ma) as $key){
			$query = $query."`".$key."`, ";
		}
		$query = mb_eregi_replace("(.*)[^.]{2}$", '\\1', $query);
		$query = $query.")";
		foreach(array_keys($ma) as $key){
			$value = $value."'".$ma["$key"]."', ";
		}
		$value = mb_eregi_replace("(.*)[^.]{2}$", '\\1', $value);
		$value = $value.")";
		$full = $query." ".$value;
		return mysqli_query($GLOBALS['db'], $full);
	}

	//Update data in table
	public static function update($table, $data, $id){
		$query = "UPDATE `".$table."` SET ";
		foreach(array_keys($data) as $key){
			$query = $query."`".$key."` = '".$data["$key"]."', ";
		}
		$query = mb_eregi_replace("(.*)[^.]{2}$", '\\1', $query);



		$ma = $id;
		$query = $query."WHERE ";
		foreach(array_keys($ma) as $key){
			$query = $query."`".$key."` = '".$ma["$key"]."' AND ";
		}
		$query = mb_eregi_replace("(.*)[^.]{4}$", '\\1', $query);

		mysqli_query($GLOBALS['db'], $query);
		return $query;
	}

	//Get data from table
	public static function select($table, $index, $data='a'){
			
		if($data != 'a'){
			$db = $GLOBALS['db'];
			
			$ma = $index;
			$query = "SELECT * FROM `$table` WHERE ";
			foreach(array_keys($ma) as $key){
				$query = $query."`".$key."` = '".$ma["$key"]."' AND ";
			}
			$query = mb_eregi_replace("(.*)[^.]{4}$", '\\1', $query);

			$query = mysqli_query($db, $query);
			$datas = mysqli_fetch_assoc($query);
			return $datas[$data];
		}
		else{
			$db = $GLOBALS['db'];
			
			$ma = $index;
			$query = "SELECT * FROM `$table` WHERE ";
			foreach(array_keys($ma) as $key){
				$query = $query."`".$key."` = '".$ma["$key"]."' AND ";
			}
			$query = mb_eregi_replace("(.*)[^.]{4}$", '\\1', $query);

			$query = mysqli_query($db, $query);
			$datas = mysqli_fetch_assoc($query);
			return $query;
		}
    }

	//Delete data
	public static function delete($table, $index){
		$db = $GLOBALS['db'];

		$ma = $index;
		$query = "DELETE FROM `$table` WHERE ";
		foreach(array_keys($ma) as $key){
			$query = $query."`".$key."` = '".$ma["$key"]."' AND ";
		}
		$query = mb_eregi_replace("(.*)[^.]{4}$", '\\1', $query);

    	mysqli_query($db, $query);
    }

	//Show all data
	public static function show($table){
			
		$db = $GLOBALS['db'];
		
			$query = "SELECT * FROM `$table` ORDER BY `id` DESC";
			$query = mysqli_query($db, $query);
			$datas = mysqli_fetch_assoc($query);
			return $query;
    }

}

//Text control
class STR {

	//Cleaning string
	public static function clean($data) {
		// Удаляем пробелы в начале и конце строки
		$data = trim($data);
		// Удаляем слеши (например, если используется magic quotes)
		$data = stripslashes($data);
		return $data;
	}

	//cuting text
	public static function cut($start, $textf, $end){
    $t1 = mb_eregi_replace("(.*)[^.]{".$end."}$", '\\1', $textf);
    $t2 = mb_eregi_replace("^.{".$start."}(.*)$", '\\1', $t1);
    $textf = $t2;
    return $textf;
	}

	//get format (value after dote)
	public static function format($file){
		 $temp= explode('.',$file);
		 $extension = end($temp);
		 return $extension;
	}

}

//Data control
class DTC{

	//Storage control
	public static function storage($path_storage, $name_form){

		date_default_timezone_set('UTC');
		$dir = date("Ym");
		$gen1 = date("dHis"); 
		$gen2 = GEN::int(3);
		$fname = "$gen1$gen2";

		if (is_dir("$path_storage/$dir")) {
			get_file("$path_storage/$dir/", $name_form, $fname);
		} 
		else {
			mkdir("containers/$path_storage/$dir", 0777, true);
			get_file("$path_storage/$dir/", $name_form, $fname);
		}

		$ex = format($_FILES["$name_form"]['name']);
		$call_back = array(
			"name" => "$fname.$ex",
			"path" => "$dir/",
			"full" => "$dir/$fname.$ex"
		);
		return $call_back;
	}

	//Getting file 
	public static function save($path, $name, $newn = "null"){

		if (!@copy($_FILES["$name"]['tmp_name'], "containers/".$path.$_FILES["$name"]['name'])){
			return 'error';
			}
		else {
			$fn = $_FILES["$name"]['name'];
			$type = format($fn);
			if ($newn != "null") {
				rename("containers/$path$fn", "containers/$path$newn.$type");
				return "$newn.$type";
			}
			else{
				$fnn=str_replace( " " , "_" , $_FILES["$name"]['name']);
				rename("containers/$path$fn", "containers/$path$fnn");
				return "$fnn";
			}
		}
	}

	//Send [GET] data to link
	public static function get($link, $data){
			$ch = curl_init("$link?" . http_build_query($data));
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($ch, CURLOPT_HEADER, false);
			$return = curl_exec($ch);
			curl_close($ch);
			return $return;
		
	}

	//Send [POST] data to link
	public static function post($link, $data){
			$ch = curl_init("$link");
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data, '', '&'));
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($ch, CURLOPT_HEADER, false);
			$re = curl_exec($ch);
			curl_close($ch);	
			return $re;
		
	}

	//Get all data in global param GET, POST
	public static function dump($type){
		if ($type == "post" OR $type == "p") {
			$a = array();
			if (isset($_POST)){
			    foreach ($_POST as $key=>$value){
			        $a[$key]=$value;
			    }
			}
			print_r($a);
		}
		elseif ($type == "get" OR $type == "g") {
			$a = array();
			if (isset($_GET)){
			    foreach ($_GET as $key=>$value){
			        $a[$key]=$value;
			    }
			}
			print_r($a);
		}
		else{
			echo "Error type!";
		}
	}

	//Listening calls from other sources (API gate)
	public static function gate(){
		$a = array();
			if (isset($_POST)){
			foreach ($_POST as $key=>$value){
			    $a[$key]=$value;
			}
		}
		$inputs['post'] = $a;

			
		$a = array();
		if (isset($_GET)){
			foreach ($_GET as $key=>$value){
			    $a[$key]=$value;
			}
		}
		$inputs['get'] = $a;

		return $inputs;
	}

}

//Router controller
class Router {
	//For auto craeting router list
	public static function scan($directory, $outputFile){
		// Проверяем, существует ли каталог и является ли он каталогом
		if (!is_dir("containers/".$directory)) {
			echo "Указанный путь не является каталогом.";
			return;
		}
	
		// Открываем файл для записи (режим 'w' - перезапись файла)
		$fileHandle = fopen($_SERVER["DOCUMENT_ROOT"]."/global/router/".$outputFile.".php", 'w');
		if (!$fileHandle) {
			echo "Не удалось открыть файл для записи.";
			return;
		}
	
		// Сканируем каталог и получаем массив файлов и подкаталогов
		$files = scandir("containers/".$directory);
		fwrite($fileHandle, "<?php " . PHP_EOL);

		// Перебираем каждый элемент массива
		foreach ($files as $file) {
			// Пропускаем '.' и '..'
			if ($file === '.' || $file === '..') {
				continue;
			}
	
			// Получаем полный путь к файлу/подкаталогу
			$filePath = "containers/".$directory . DIRECTORY_SEPARATOR . $file;
	
			// Проверяем, является ли элемент файлом
			if (is_file($filePath)) {
				// Записываем имя файла в выходной файл
				fwrite($fileHandle, "Router::set('/".$file. "', '".$directory."/".$file."');" . PHP_EOL);
			}
		}

		fwrite($fileHandle, "?>" . PHP_EOL);
	
		// Закрываем файл
		fclose($fileHandle);
	}

	//Routing for getting content (adding new url)
	public static function set($link, $path){
		global $routes_ectr;
		$routes_ectr["$link"] = "$path";
	}

	//Router collection set
	public static function collection($name){
		include "global/router/".$name.".php";
	}

	//Router activator for all set's
	public static function on(){
		global $routes_ectr;
		global $routes_ectr_404;

		$url = $_SERVER['REQUEST_URI'];
		$url = explode('?', $url);
		$url = $url[0];
		if (array_key_exists($url, $routes_ectr)) {
			$handler = $routes_ectr[$url];
			include "containers/".$handler;
		} else {
			include $routes_ectr_404;
		}
	}

	//Absolute path creator 
	public static function path($path='/'){
		return $_SERVER["DOCUMENT_ROOT"].$path;
	}

	//Redirecting 
	public static function redirect($url, $sleep = 0){
		header('Refresh: '.$sleep.'; url='.$url);
		exit();
	}

	//Get host (may add path)
	public static function host($path = ""){
		if ($path) {
			$link="$path";
		}
		else {
			$link=null;
		}
			$actual_link = (empty($_SERVER['HTTPS']) ? 'http' : 'https') . "://$_SERVER[HTTP_HOST]$link";		
		
		return $actual_link;
	}

	//Get full real url
	public static function url(){
		$actual_link = (empty($_SERVER['HTTPS']) ? 'http' : 'https') . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
		return $actual_link;
	}

	//Get info about useragent
	public static function agent(){
		$detect = new Mobile_Detect;

		if($detect->isTablet() ) { $device = 'Tablet'; }
		elseif($detect->isMobile() && !$detect->isTablet() ) { $device = 'Phone'; }
		else{ $device = "PC";}

		if($detect->isiOS() ) { $os = 'IOS'; }
		elseif($detect->isAndroidOS() ) { $os = 'AOS'; }
		elseif($detect->isBlackBerryO() ) { $os = 'BB'; }
		elseif($detect->iswebOS() ) { $os = 'WOS'; }
		else{ $os = 'Windows OS';}


		if($detect->isiPhone() ) { $phone = 'iPhone'; }
		elseif($detect->isSamsung() ) { $phone = 'Samsung'; }
		elseif($detect->isBlackBerry() ) { $phone = 'BlackBery'; }
		elseif($detect->isSony() ) { $phone = 'Sony'; }
		else{ $phone = 'null';}

		if($detect->isChrome() ) { $browser = 'Chrome'; }
		if($detect->isOpera() ) { $browser = 'Opera'; }
		if($detect->isSafari() ) { $browser = 'Safari'; }
		if($detect->isEdge() ) { $browser = 'Edge'; }
		if($detect->isIE() ) { $browser = 'IE'; }
		if($detect->isFirefox() ) { $browser = 'Firefox'; }
		if (strpos($_SERVER['HTTP_USER_AGENT'], 'Chrome') !== FALSE) {
			$browser = 'Chrome';
		}
		if (strpos($_SERVER['HTTP_USER_AGENT'], 'OPR') !== FALSE) {
			$browser = 'Opera';
		}
		if (strpos($_SERVER['HTTP_USER_AGENT'], 'YaBrowser') !== FALSE) {
			$browser = 'Yandex';
		}
		else {
			$browser = 'null';
		}

		$today = date("Y-m-d H:i"); 
		$ip = $_SERVER['REMOTE_ADDR']; 
		$query = @unserialize(file_get_contents('http://ip-api.com/php/'.$ip.'?lang=ru'));

		if($query && $query['status'] == 'success') {
			$country = $query['country'];
			$city = $query['city'];
			} 
		else {
			$country = "null";
			$city = "null";
		}

		$data = array(
			'time' => $today,
			'country' => $country,
			'region' => $city,
			'device' => $device,
			'phone' => $phone,
			'browser' => $browser,
			'os' => $os,
		);

		return $data;

	}
}

//Session controller
class Session {

	//Create new Session
	public static function set($name, $array){
		$_SESSION["$name"] = $array;
	}

	//Close Session
	public static function close($name){
		unset($_SESSION["$name"]);
	}

	//Route if not session
	public static function not($name, $locate){
		if (!isset($_SESSION["$name"])) {
    		Router::redirect($locate);
		}
	}

	//Route if have Session
	public static function yes($name, $locate){
		if (isset($_SESSION["$name"])) {
    		Router::redirect($locate);
		}
	}

	//Check session (have = 1 / not = 0)
	public static function check($name){
		if (!isset($_SESSION["$name"])) { return 0; }
		else { return 1; }
	}

}

//Interface for debuging
class ERRC{
	public function __construct(){
		if(DEBUG){error_reporting(-1);}
		else{error_reporting(0);}
		set_error_handler([$this, 'errorHandler']);
		ob_start();
		register_shutdown_function([$this, 'fatalErrorHandler']);
	}

	public function errorHandler($errno, $errstr, $errfile, $errline){
		$this->displayErr($errno, $errstr, $errfile, $errline);
		return true;
	}

	public function fatalErrorHandler(){
		$error = error_get_last();
		if( !empty($error) && $error['type'] & (E_ERROR | E_PARSE | E_COMPILE_ERROR | E_CORE_ERROR)){
			ob_end_clean();
			$this->displayErr($error['type'], $error['message'], $error['file'], $error['line']);
		}
		else{
			ob_end_flush();
		}
	}

	protected function displayErr($errno, $errstr, $errfile, $errline, $response=500){
		http_response_code($response);
		if(DEBUG){require_once 'modules/DEBUG/Dview.php';}
		else{require_once 'modules/DEBUG/Pview.php';}
		die;
	}
}

//Collection (requires) controller
class Collection{

	//For creating new list
	public static function new($list){
		foreach($list as $source){
			include "containers/".$source;
		}
	}

	//For connect template list
	public static function set($template){
		include $_SERVER["DOCUMENT_ROOT"]."/global/collection/".$source.".php";
	}

}

//Telegram bot API
class TB{
    
    // Отправка запроса
    public static function sendRequest($method, $params = []) {
        $url = 'https://api.telegram.org/bot' . $GLOBALS['tb_token'] . '/' . $method;
        if (!empty($params)) {
            $url .= '?' . http_build_query($params);
        }
        return json_decode(file_get_contents($url), true);
    }
    
    // Установка вебхука
    public static function setWebhook() {
        return self::sendRequest('setWebhook', ['url' => Router::host($GLOBALS['tb_port'])]);
    }
    
    // Отправка фото
    public static function sendPhoto($chatId, $photoPath, $caption = '') {
        $url = 'https://api.telegram.org/bot' . $GLOBALS['tb_token'] . '/sendPhoto';
    
        $postFields = array(
            'chat_id' => $chatId,
            'photo' => new CURLFile($photoPath),
            'caption' => $caption
        );
    
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postFields);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch);
        curl_close($ch);
    
        return json_decode($result, true);
    }
    
    // Отправка документа
    public static function sendDocs($chatId, $docPath, $caption = ''){
        $response = array(
            'chat_id' => $chatId,
            'document' => new CURLFile($docPath),
            'caption' => $caption
        );	
                
        $ch = curl_init('https://api.telegram.org/bot' . $GLOBALS['tb_token'] . '/sendDocument');  
        curl_setopt($ch, CURLOPT_POST, 1);  
        curl_setopt($ch, CURLOPT_POSTFIELDS, $response);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_exec($ch);
        curl_close($ch);
    }
    
    // Отправка сообщений
    public static function sendMessage($chatId, $text) {
        self::sendRequest('sendMessage', ['chat_id' => $chatId, 'text' => $text]);
    }
    
    // Получение документа
    public static function downloadTelegramFile($fileId, $savePath) {
        $fileInfo = self::sendRequest('getFile', ['file_id' => $fileId]);
    
        if ($fileInfo['ok']) {
            $fileUrl = 'https://api.telegram.org/file/bot' . $GLOBALS['tb_token'] . '/' . $fileInfo['result']['file_path'];
    
            $content = file_get_contents($fileUrl);
    
            file_put_contents($savePath, $content);
    
            return true;
        } else {
            return false;
        }
    }
    
    // Показать командные кнопки
    public static function displayButtons($chatId, $buttons) {
        $keyboard = [
            'keyboard' => [],
            'resize_keyboard' => true,
            'one_time_keyboard' => true
        ];
    
        foreach ($buttons as $button) {
            $keyboard['keyboard'][] = [$button];
        }
    
        $replyMarkup = json_encode($keyboard);
    
        self::sendRequest('sendMessage', [
            'chat_id' => $chatId,
            'text' => '',
            'reply_markup' => $replyMarkup
        ]);
    }
    
    // Скрыть командные кнопки
    public static function hideKeyboard($chatId, $message = '') {
        $replyMarkup = json_encode(['remove_keyboard' => true]);
    
        self::sendRequest('sendMessage', [
            'chat_id' => $chatId,
            'text' => $message,
            'reply_markup' => $replyMarkup
        ]);
    }

    // Приеменый канал бота
    public static function init(){
        $update = json_decode(file_get_contents('php://input'), true, 512, JSON_UNESCAPED_UNICODE);

        if (isset($update['message'])) {
            $message = $update['message'];
            return array('id'=>$message['chat']['id'], 'text'=>$message['text'], 'first_name'=>$message['chat']['first_name']); 
        }
        else {
            self::setWebhook();
        }
    }
}

//Cookie controller
class Cookie {
    public static function set($name, $value) {
        // Устанавливаем куки с указанным именем и значением
        setcookie($name, $value, time() + (86400 * 30), '/'); // куки действительны в течение 30 дней
    }
    
    public static function select($name) {
        if(isset($_COOKIE[$name])) {
            // Получаем значение куки и декодируем его из JSON в массив
            $value = json_decode($_COOKIE[$name], true);
            return $value;
        } else {
            return null;
        }
    }
    
    public static function delete($name) {
        // Устанавливаем куки с прошедшей датой, чтобы они истекли
        setcookie($name, '', time() - 3600, '/');
    }
}


#-----------------------------------------------AUTO RUN----------------------------------------------
new ERRC;
?>