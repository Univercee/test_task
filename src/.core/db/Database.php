<?php
	class Database
	{
		private static $instance = null;
		private $connection = null;

		protected function __construct()
		{
            $env = parse_ini_file('.env');
			$this->connection = new PDO(
				'mysql:host='.$env["DB_HOST"].';dbname='.$env["DB_NAME"].';charset=utf8',
				$env["DB_USERNAME"],
				$env["DB_PASSWORD"],
				[
					PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
					PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
					PDO::ATTR_EMULATE_PREPARES => false
				]
			);
		}

		protected function __clone() { }

		public static function getInstance()
		{
			if (self::$instance === null)
			{
				self::$instance = new static();
			}

			return self::$instance;
		}

		public function __wakeup()
		{
			throw new BadMethodCallException('Unable to deserialize database connection');
		}
		
		public function exec($query)
		{
			return $this->connection->exec($query);
		}		

		public function query($query)
		{
			return $this->connection->query($query);
		}

		public function prepare($statement)
		{
			return $this->connection->prepare($statement);
		}

		public function lastInsertId()
		{
			return intval($this->connection->lastInsertId());
		}
	}
?>