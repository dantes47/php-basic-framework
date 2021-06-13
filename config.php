<?php

return [

	"database" => [

		"db_name" => "todos",
		"user_name" => "root",
		"password" => "catchfire817",
		"connection" => "mysql:host=127.0.0.1",
		"options" => [

			PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,

		],

	],

];