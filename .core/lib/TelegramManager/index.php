<?php
	use WeStacks\TeleBot\TeleBot;
	class TelegramManager
	{
		private static $instance = null;
		private $bot = null;

		protected function __construct()
		{
            $env = parse_ini_file('.env');
			$this->bot = new TeleBot([
				'token'      => $env["TG_API_TOKEN"],
				'name'       => $env["TG_BOT_NAME"],
				'api_url'    => 'https://api.telegram.org/bot{TOKEN}/{METHOD}',
				'exceptions' => true,
				'async'      => false,
				'handlers'   => []
			]);
		}
		public static function getInstance()
		{
			if (self::$instance === null)
			{
				self::$instance = new static();
			}

			return self::$instance;
		}

		public function sendMessage(int $id, string $filename){
			if(!FileManager::isFileExists($filename)){
				throw new Exception(ErrorMessage::$fileNotFound);
			}
			$this->bot->sendDocument([
				'chat_id' => $id,
				'document' => fopen(FileManager::getPath().$filename, 'r')
			]);
		}
	}
?>