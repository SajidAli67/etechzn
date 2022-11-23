<?php
require 'dbClass.php';

class Getdata extends Database
{
	public function listOfItem($table, $orderBy = 'NULL', $limit = 999999999999)
	{
		$array = array();
		$sql = "SELECT * FROM $table ORDER BY $orderBy LIMIT $limit";
		$query = $this->mysqli->query($sql);
		while ($row = $query->fetch_assoc()) {
			$array[] = $row;
		}
		return $array;
	}

	public function specificItem($table, $coulmn, $where = null, $and = null)
	{
		$array = array();
		$sql = "SELECT * FROM $table";
		if ($where != null) {
			$sql .= " WHERE $coulmn= $where";
		}

		if ($and = null) {
			$sql .= " AND $coulmn = $where";
		}
		$query = $this->mysqli->query($sql);
		while ($row = $query->fetch_assoc()) {
			$array[] = $row;
		}
		return $array;
	}
	public function itemLast($table, $coulmn, $where = null, $and = null)
	{
		$sql = "SELECT * FROM $table";
		if ($where != null) {
			$sql .= " WHERE $coulmn= $where ORDER BY id DESC";
		}

		if ($and = null) {
			$sql .= " AND $coulmn = $where";
		}

		$query = $this->mysqli->query($sql);
		$row = $query->fetch_assoc();

		return $row;
	}
	public function hotelThumb($table, $orderBy = 'NULL', $limit = 999999999999)
	{
		$array = array();
		$sql = "SELECT * FROM $table ORDER BY $orderBy, RAND() LIMIT $limit ";
		$query = $this->mysqli->query($sql);
		while ($data = $query->fetch_assoc()) {
			$array[] = $data;
		}
		return $array;
	}

	public function query($sql)
	{
		$array = array();
		$query = $this->mysqli->query($sql);
		while ($row = $query->fetch_assoc()) {
			$array[] = $row;
		}
		return $array;
	}

	// Search by Country and city

	public function multipuleConditions($table, $coulmnId, $id, $coulmnId1, $id1)
	{
		$array = array();
		$sql = "SELECT * FROM $table WHERE $coulmnId = $id AND $coulmnId1 = $id1";
		$query = $this->mysqli->query($sql);
		while ($row = $query->fetch_assoc()) {
			$array[] = $row;
		}
		return $array;
	}
	public function table_update($table, $param = array(), $where = null)
	{
		$args = array();
		foreach ($param as $key => $value) {
			$args[] = "$key='$value'";
		}
		$update = "UPDATE $table SET " . implode(',', $args);
		if ($where != null) {
			$update .= " WHERE $where";
		}
		if ($this->mysqli->query($update)) {
			return true;
		} else {
			$error = $this->mysqli->error;
			echo $error;
		}
	}

	public function insert_data($table, $param = array())
	{
		if ($this->exist_table($table)) {
			$table_column = implode(',', array_keys($param));
			$table_values = implode("','", $param);
			$sql = "INSERT INTO $table($table_column)VALUES('$table_values')";
			if ($this->mysqli->query($sql) === TRUE) {
				$last_id = $this->mysqli->insert_id;
				return $last_id;
			} else {
				$error = $this->mysqli->error;
				echo $error;
			}
		} else {
			return false;
		}
	}

	private function exist_table($table)
	{
		$sql = "SHOW TABLES FROM $this->dbName LIKE '$table'";
		$query = $this->mysqli->query($sql);
		if ($query) {
			if ($query->num_rows == 1) {
				return true;
			} else {
				echo "Table does not Exist";
				return false;
			}
		}
	}
	// Filetered insertion by input data
	public function data_exist($table, $col, $email)
	{
		$result = "SELECT * FROM $table WHERE $col = '$email' ";
		$query = $this->mysqli->query($result);
		if ($query) {
			if ($query->num_rows > 0) {
				return true;
			} else {
				return false;
			}
		}
	}

	public function duplicateData($table, $col, $id)
	{
		$result = "SELECT * FROM $table WHERE $col = '$email' ";
		$query = $this->mysqli->query($result);
		if ($query) {
			if ($query->num_rows > 0) {
				return true;
			} else {
				return false;
			}
		}
	}
	public function getUserId()
	{
		$aId = $_SESSION['aId'];
		$select = "SELECT * FROM tbl_admin WHERE aId=$aId";
		$result = $this->mysqli->query($select);
		foreach ($result as $data) {
			$user = $data['user_id'];
			return $user;
		}
	}
	public function getUserBalance()
	{
		$aId = $_SESSION['aId'];
		$select = "SELECT * FROM tbl_admin WHERE aId=$aId";
		$result = $this->mysqli->query($select);
		foreach ($result as $data) {
			$user = $data['user_id'];

			$selectuser = "SELECT * FROM tbl_member WHERE mId =$user";
			$result2 = $this->mysqli->query($selectuser);
			foreach ($result2 as $row) {
				$balance = $row['balance'];

				return $balance;
			}
		}
	}


	public function timeZone()
	{
		date_default_timezone_set("Asia/Dhaka");
		date_default_timezone_get();
	}
	// public function sum(){

	// }
	public function uploadImg($file, $path)
	{
		$allowedExts = array("gif", "jpeg", "jpg", "png");
		$temp = explode(".", $file["name"]);
		$extension = end($temp);;
		if ((($file["type"] == "image/gif") || ($file["type"] == "image/jpeg") || ($file["type"] == "image/jpg") || ($file["type"] == "image/pjpeg") || ($file["type"] == "image/x-png") || ($file["type"] == "image/png"))  && in_array($extension, $allowedExts)) {
			if ($file["error"] > 0) {
				return "Return Code: " . $file["error"] . "<br>";
			} else {

				$fileName = time() . $temp[1];
				$temp[0] = rand(0, 3000); //Set to random number
				$fileName = time() . rand(0, 3000) . '.' . $temp[1];
				if (file_exists($path . $fileName)) {
					return $file["name"] . " already exists. ";
				} else {
					move_uploaded_file($file["tmp_name"], $path . $fileName);
					return $fileName;
				}
			}
		} else {
			return "Invalid file";
		}
	}

	public function flage($file, $path, $name)
	{
		$filename = $file['name']; // Get the Uploaded file Name.

		$extension = pathinfo($filename, PATHINFO_EXTENSION); //Get the Extension of uploded file.

		$valid_extensions = array("jpg", "jpeg", "png", "gif", 'svg');

		if (in_array($extension, $valid_extensions)) { // check if upload file is a valid image file.
			$new_name = $name . "." . $extension;
			if (move_uploaded_file($file['tmp_name'], $path . $new_name)) {
				return $new_name;
			}
		} else {
			return false;
		}
	}

	public function getCountry($id,$name='*'){
		$select = "SELECT $name FROM tbl_country WHERE id='$id'";
		$result = $this->mysqli->query($select);
		return $result->fetch_assoc();
	}

	public function __destruct()
	{
		if ($this->conn) {
			if ($this->mysqli->close()) {
				$this->conn = false;
				return true;
			} else {
				return false;
			}
		}
	}
	// clsss End
}
