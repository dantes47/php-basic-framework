<?php

// simple example od 'construct' func.

// class Contractor {

// 	protected $electrician;
// 	protected $plumber;
// 	protected $designer;

// 	public function __construct($electrician, $plumber, $designer) {

// 		$this->electrician = $electrician; // $electrician
// 		$this->plumber = $plumber; // $plumber
// 		$this->designer = $designer; // $designer

// 	}

// }

class QueryBuilder {

	protected $pdo;

	public function __construct($pdo) {

		$this->pdo = $pdo;
	}

	public function selectAll($table) {

		$statement = $this->pdo->prepare("select * from {$table}");

		$statement->execute();

		return $statement->fetchAll(PDO::FETCH_CLASS);
		// var_dump($tasks);
		// var_dump($tasks[0]->foobar());

	}

	public function insert($table, $params) {

		// die(var_dump(array_keys($params)));

		$sql = sprintf(

			'insert into %s (%s) values (%s)',
			$table,
			implode(', ', array_keys($params)),
			':' . implode(', :', array_keys($params)),
		);

		try {

			$statement = $this->pdo->prepare($sql);
			$statement->execute($params);
			echo 'Everything should be in db now..';

		} catch (Exception $e) {

			die($e->getMessage());

		}

		// var_dump($sql);

	}

}