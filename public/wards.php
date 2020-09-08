<option value="">==Phường/Xã==</option>
<?php
require "../libs/config.php";
$dist_id = $_POST['distId'];
$sql = "SELECT * FROM wards WHERE dist_id = $dist_id";
$query = $conn->query($sql);
$query->setFetchMode(PDO::FETCH_ASSOC);
$query->execute();
	while($row = $query->fetch()) {
		echo "<option value=".$row['ward_id'].">".$row['ward_name']."</option>";
	}
?>