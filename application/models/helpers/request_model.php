<?php 
	
	class Request_Model extends CI_Model {
		private static $method;
		private static $methodReal;
		private static $path;

		public function __construct(){
			parent::__construct();
			self::methods();
			self::$path = self::getHandler();
		}	

		/* 
			This just returns the last bit of the string so you can use it in the
			redirect function instead of having to use php header 
		*/
		public function uriForDirect(){
			if(isset($_SERVER['HTTP_REFERER'])){
				$ref = $_SERVER['HTTP_REFERER'];
				$ref = str_replace(site_url(), '', $ref);
			} else {
				$ref = '';
			}
			return (!empty($ref) ? base64_encode($ref) : '');
		}

		public function decodeForDirect($str){
			return base64_decode($str);
		}

		private static function getHandler(){
			$uri = explode('?', isset($_SERVER['REDIRECT_URL']) ? $_SERVER['REDIRECT_URL'] : $_SERVER['REQUEST_URI']);
			return htmlspecialchars($uri[0]);
		}

		public function getMethod() {
			return $_SERVER['REQUEST_METHOD'];
		}

		public function isGet() { 
			return self::$method == 'GET';
		}

		public function isPost() { 
			return self::$method == 'POST';
		}

		public function isDelete() { 
			return self::$method == 'DELETE';
		}

		public function query($array = false) {
			return ($array ? $_GET : $_SERVER['QUERY_STRING']);
		}

		public function ipAddress(){
			return $_SERVER['REMOTE_ADDR'];
		}

		public function referrer(){
			return (isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '');
		}	

		public function userAgent(){
			return (isset($_SERVER['HTTTP_USER_AGENT']) ? $_SERVER['HTTTP_USER_AGENT'] : '');
		}

		public function host(){
			return (isset($_SERVER['HTTTP_HOST']) ? $_SERVER['HTTTP_HOST'] : 'nohost');
		}

		private function methods(){
			self::$methodReal = $_SERVER['REQUEST_METHOD'];

			if(self::$methodReal != 'POST'){
				self::$method = self::$methodReal;
				return;
			}
			self::$method = 'POST';
		}

		public function isAjax() {
			if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'){
				return true;
			} else {
				return false;
			}
		}
	}
?>