<?php

class Connection {

	public static function make($config) {

		try {

			// return new PDO('mysql:host=127.0.0.1;dbname=todos', 'root', 'catchfire817');

			return new PDO(

				$config["connection"] . ";dbname=" . $config["db_name"],
				$config["user_name"],
				$config["password"],
				$config["options"]

			);

			echo "Successful connect to db 'todos'.. ";

		} catch (PDOException $e) {

			echo "\nCannot connect to db 'todos'.. ";
			die($e->getMessage());

		}

	}

}

// way without 'static' method
// $connection = new Connection();
// $connection->make();

// $pdo = Connection::make();