<?php
require "header.php";
require '../module/users/personal_info.php';
?>
<div class="container w-50">
	<form name="update_info" id="personalInfo" method="POST" action="../module/users/personal_info.php?action=update">
        <fieldset class="border border-info p-2">
           	<legend class="w-auto">
           		<label class="col-form-label">Mặc định lãnh đạo duyệt hồ sơ</label>
           	</legend>
	        <div class="row">
				<div class="col-12">
					<div class="input-group">
						<div class="input-group-prepend">
					    	<span class="input-group-text">Chọn lãnh đạo</span>
					  	</div>
					  	<select class="custom-select ld_name" name="ld_phutrach" required>
					  		<option value="">==Chọn lãnh đạo==</option>
					  		<?php
					  		foreach ($listLeaderUsers['list'] as $leader) { ?>
					  			<option value="<?=$leader->uid;?>"
					  				<?php if ($user->ld_phutrach==$leader->uid) {
					  					echo "selected";
					  				} ?>><?=$leader->chuc_danh.' - '.$leader->fullname;?></option>
					  		<?php } ?>
					  	</select>
					</div>
				</div>
			</div>
        </fieldset>
        <div class="row my-2">
        	<div class="col-12 text-center">
        		<button class="btn btn-primary w-50">Cập nhập</button>
        	</div>
        </div>
	</form>
</div>
<?php require('footer.php');?>