<?php 

function update($tableName, $data = [], $where = [])
{
	$sql = "UPDATE $tableName SET ";

	$i = 1;
	foreach ($data as $colName => $value) {
		if(is_integer($value)){
				$sql .= '`'. $colName .'` = '. $value .'';
			}else{
				$sql .= '`'. $colName .'` = "'. $value .'"';
			}
		if(count($data) != $i ) {
			$sql .= ', ';
		}
		$i++;
	}


	$i = 1;
	if (!empty($where)) {
		$sql .= " WHERE ";
		foreach ($where as $colName => $value) {
			if(is_integer($value)){
				$sql .= '`'. $colName .'` = '. $value .'';
			}else{
				$sql .= '`'. $colName .'` = "'. $value .'"';
			}

			if(count($where) != $i ) {
				$sql .= ' AND ';
			}
			$i++;
		}
	}

	return $sql;
}


$data = [
	'name' => 'Something',
	'password' => 123
];

$where = [
	'name' => 1,
	'age' => 10,
];

echo update('users', $data, $where);