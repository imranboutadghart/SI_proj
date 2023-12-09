<?php
    // Database connection code
    $db_server = "localhost";
    $db_user = "root";
    $db_pass = "";
    $db_name = "projectDB";
    $conn = "";
    try{
        $conn = mysqli_connect($db_server, $db_user, $db_pass, $db_name);
    }
    catch(mysqli_sql_exception $e)
    {
        echo"could not connect to database";
    }

    // Get the JSON data sent from the JavaScript
    $data = json_decode(file_get_contents('php://input'), true);

    // Get the receipt number and employee ID
    $receiptNumber = end($data)['receiptNumber'];
    $employeeId = end($data)['employeeId'];

	$sql = "INSERT INTO receipts (receipt_id, receipt_date,emp_id) VALUES ('$receiptNumber', now(),'$employeeId')";
    // Remove the last element from the array
	try {
		$conn->query($sql);
	} catch (mysqli_sql_exception $e) {
		echo "Error: " . $sql . "<br>" . $conn->error . "\n";
	}
	echo "New record created successfully\n". $sql ."\n\n";
	array_pop($data);

    // Loop through each item and insert it into the database
    foreach ($data as $item) {
        $id = $item['id'];
        $quantity = $item['quantity'];

        // SQL query
        $sql = "INSERT INTO purchase_rows (product_id, amount) VALUES ('$id', '$quantity')";
        // Execute the query
        try {
			$conn->query($sql);
        } catch (mysqli_sql_exception $e) {
			echo "Error: " . $sql . "<br>" . $conn->error . "\n";
        }
		$pr_id = mysqli_insert_id($conn);
		echo "New record created successfully\n". $sql ."\n\n";
		$sql = "insert into receipt_rows (pr_id, receipt_id) values ('$pr_id', '$receiptNumber')";
		try {
			$conn->query($sql);
		} catch (mysqli_sql_exception $e) {
			echo "Error: " . $sql . "<br>" . $conn->error . "\n";
		}
		echo "New record created successfully\n". $sql ."\n\n";
	}
    $conn->close();
?>