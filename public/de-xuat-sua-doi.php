<?php
require "header.php";
?>
<div class="container-fluid mt-4">
	<form method="POST">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
				<div class="form-group">
					<textarea id="noi-dung" class="form-control" name="noi-dung" rows="4" required></textarea>
					<label class="form-control-placeholder" for="noi-dung">Nội dung cần sửa đổi</label>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
				<div class="form-group text-center">
					<button class="btn btn-primary w-25" name="submit" id="btn-savehs"><i class="fas fa-save"></i> GHI</button>
				</div>
			</div>
		</div>
	</form>
</div>
<?php
require "../libs/config.php";
$uid = $_SESSION['uid'];
if (isset($_POST['submit'])) {
	$noi_dung_moi = $_POST['noi-dung'];
	/*$sql = "INSERT INTO noi_dung_sua_doi_phan_mem(uid, noi_dung) VALUES (?,?)";
	$stmt= $conn->prepare($sql);
	$stmt->execute([$uid, $noi_dung]);*/
	$stmt = $conn->query("SELECT * FROM noi_dung_sua_doi_phan_mem WHERE uid = $uid");
	$count = $stmt->rowCount();
	$row = $stmt->fetch();
	$noi_dung_cu = $row['noi_dung'];
	if ($count == 0) {
		$sql = "INSERT INTO noi_dung_sua_doi_phan_mem (uid, noi_dung) VALUES (?,?)";
		$conn->prepare($sql)->execute([$uid, $noi_dung_moi]);
		$success = 'Ghi nội dung thành công';
	} elseif ($count == 1) {
		$noi_dung = $noi_dung_cu."<br/>".$noi_dung_moi;
		$sql = "UPDATE noi_dung_sua_doi_phan_mem SET uid=?, noi_dung=? WHERE uid=?";
		$conn->prepare($sql)->execute([$uid, $noi_dung, $uid]);
		$success = 'Ghi nội dung thành công';
	}
}
if (isset($success)) { ?>
	<div class='alert alert-success text-center success' role='alert'>
    	<h5><strong><?php echo $success; ?></strong></h5>
    </div>
<?php } ?>
<div class="container-fluid">
	<div class="table-responsive-md">
		<table class="table table-hover table-bordered">
			<thead>
				<tr class="bg-info text-white">
					<th>STT</th>
					<th>HỌ TÊN</th>
					<th>NỘI DUNG CẦN SỬA</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$query1 = $conn->query("SELECT * FROM noi_dung_sua_doi_phan_mem");
				$query1->setFetchMode(PDO::FETCH_ASSOC);
				$query1->execute();
				$i = 1;
				while ($row1 = $query1->fetch()) {
				$u_id = $row1['uid'];
				$query2 = $conn->query("SELECT * FROM users WHERE uid = $u_id");
				$query2->setFetchMode(PDO::FETCH_ASSOC);
				$query2->execute();
				$row2 = $query2->fetch();
				?>
		       	<tr>
		            <td><?php echo $i++; ?></td>
		            <td><?php echo $row2['fullname']; ?></td>
		            <td><?php echo $row1['noi_dung']; ?></td>
		        </tr>
		        <?php } ?>
			</tbody>
		</table>
	</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script src="asset/js/script.js"></script>
<script>
	$(document).ready(function(){
		$('form').submit(function(){
			if (confirm("Bạn chắc chắn muốn ghi nội dung sửa đổi này chứ?") == false) {
				return false;
			}
		});
		setTimeout(function(){
        	$(document).find("div.success").fadeOut(2500);
    	},1500);
	})
</script>
</body>
</html>