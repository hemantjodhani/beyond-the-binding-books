<?php


function query( $sql, $return_data = true ) {

	global $con;

	$result = $con->query( $sql );

	// If query fails.
	if ( ! $result ) { 
		if ( defined( 'DEBUG' ) && DEBUG ) {
			echo 'query failed: ' . $sql . '<br>';
			echo $con->error . '<br>';
		}

		return false;
	}

	if ( ! $return_data ) {
		return $result;
	}

	// Result is true for non select operations.
	if ( true === $result ) {
		return true;
	}

	$data = array();
	while ( $row = $result->fetch_assoc() ) {
		$data[] = $row;
	}

	return $data;
}
