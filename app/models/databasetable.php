<?php


//Code taken from CSY2028 WEB PROGRAMMING LECTURE
class DatabaseTable{
	public $table;

	function __construct($table){
		$this->table = $table;
	}

	function save($record, $pk = ''){
	    try{
	        $this->insert($record);
	    }
	    catch(Exception $e){
	        $this->update($record, $pk);
	    }
	}

	function insert($record) {
	    global $pdo;
	    $keys = array_keys($record);
	    $values = implode(', ', $keys);
	    $valuesWithColon = implode(', :', $keys);
	    $query = 'INSERT INTO '.$this->table.'('.$values.') VALUE(:'.$valuesWithColon.')';
	    $stmt = $pdo->prepare($query);
	    $stmt->execute($record);
	}

	function update($record, $pk) {
	    global $pdo;
	    $parameters = [];
	    foreach ($record as $key => $value) {
	        $parameters[] = $key . '= :'  . $key;
	    }
	    $parametersWithComma = implode(', ', $parameters);
	    $query = "UPDATE $this->table SET $parametersWithComma WHERE $pk = :pk";
	    $record['pk'] = $record[$pk];
	    $stmt = $pdo->prepare($query);
	    $stmt->execute($record);
	}

	function find($field, $value) {
	    global $pdo;
	    $stmt = $pdo->prepare('SELECT * FROM '.$this->table.' WHERE '.$field.'=:value');
	    $criteria = [
	            'value' => $value
	    ];
	    $stmt->execute($criteria);
	    return $stmt;
	}

	function findAll() {
	    global $pdo;
	    $stmt = $pdo->prepare('SELECT * FROM ' . $this->table);
	    $stmt->execute();
	    return $stmt;
	}


	function findSorted($field, $value, $sorter){
		global $pdo;
		$stmt = $pdo->prepare('SELECT * FROM '.$this->table.' WHERE '.$field.'=:value ORDER BY '.$sorter . ' ASC');
		$criteria = [
						'value' => $value
		];
		$stmt->execute($criteria);
		return $stmt;
	}

	function findAllSorted($sorter){
		global $pdo;
		$stmt = $pdo->prepare('SELECT * FROM ' . $this->table . ' ORDER BY '.$sorter . ' ASC');
		$stmt->execute();
		return $stmt;
	}

	function findAllReverse($field) {
	    global $pdo;
	    $stmt = $pdo->prepare('SELECT * FROM ' . $this->table . ' ORDER BY '.$field . ' DESC');
	    $stmt->execute();
	    return $stmt;
	}

	function findLimitReverse($field, $limit) {
	    global $pdo;
	    $stmt = $pdo->prepare('SELECT * FROM ' . $this->table . ' ORDER BY '.$field . ' DESC
				LIMIT '.$limit);
	    $stmt->execute();
	    return $stmt;
	}


	function delete($field, $value){
	    global $pdo;
	    $stmt = $pdo->prepare("DELETE FROM $this->table WHERE $field = :pk");
	    $criteria = [
	        'pk' => $value
	    ];
	    $stmt->execute($criteria);
	    return $stmt;
	}



	function findLastRecordId($field){
		global $pdo;
		$stmt = $pdo->prepare('SELECT * FROM '.$this->table.' ORDER BY '.$field.' DESC LIMIT 1');
		$stmt->execute();
		return $stmt;
	}


	function getCount($field){
		global $pdo;
		$stmt = $pdo->prepare('SELECT COUNT('.$field.') FROM '.$this->table);
		$stmt->execute();
		return $stmt;
	}

	function getCountByValue($field, $value){
		global $pdo;
		$stmt = $pdo->prepare('SELECT COUNT('.$field.') FROM '.$this->table.' WHERE '.$field.' = '.$value);
		$stmt->execute();
		return $stmt;
	}

}
