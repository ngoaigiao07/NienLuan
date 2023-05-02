
<style>
	.collapse a{
		text-indent:10px;
	}
</style>
<nav id="sidebar" class='mx-lt-5 bg-dark' >
		
		<div class="sidebar-list">

				<a href="index.php?page=home" class="nav-item nav-home"><span class='icon-field'><i class="fa fa-home"></i></span> Trang chủ</a>
				<?php if($_SESSION['login_type'] == 1): ?>
				<a href="index.php?page=all_applications" class="nav-item nav-all_applications"><span class='icon-field'><i class="fa fa-list-alt">	</i></span> Danh sách đăng ký</a>
				<?php endif; ?>
				<?php if(isset($_SESSION['details']['type']) && $_SESSION['details']['type'] < 5 ): ?>
				<a href="index.php?page=applications" class="nav-item nav-applications"><span class='icon-field'><i class="fa fa-list-alt">	</i></span> Đăng ký tạm hoãn NVQS</a>
				<?php endif; ?>
				<?php if(isset($_SESSION['details']['type']) && $_SESSION['details']['type'] > 1): ?>
				<a href="javascript:void(0)" class="nav-item" id="add_leave"><span class='icon-field'><i class="fa fa-plus">	</i></span> Đăng ký</a>
				
				<?php endif; ?>
				<?php if($_SESSION['login_type'] == 1): ?>
				<a href="index.php?page=leave_type" class="nav-item nav-leave_type"><span class='icon-field'><i class="fa fa-th-list"></i></span> Khóa học</a>
				<a href="index.php?page=department" class="nav-item nav-department"><span class='icon-field'><i class="fa fa-list"></i></span> Mã lớp</a>
				<a href="index.php?page=position" class="nav-item nav-position"><span class='icon-field'><i class="fa fa-list"></i></span> Ngành học</a>
				<a href="index.php?page=employee" class="nav-item nav-employee"><span class='icon-field'><i class="fa fa-user-friends"></i></span> Danh sách sinh viên</a>
				<a href="index.php?page=users" class="nav-item nav-users"><span class='icon-field'><i class="fa fa-users"></i></span> Tài khoản</a>
				
			<?php endif; ?>
		</div>

</nav>
<script>
	$('.nav_collapse').click(function(){
		console.log($(this).attr('href'))
		$($(this).attr('href')).collapse()
	})
	$('.nav-<?php echo isset($_GET['page']) ? $_GET['page'] : '' ?>').addClass('active')
	$('#add_leave').click(function(){
		uni_modal("Thông tin sinh viên","manage_leave.php","mid-large")
	})
</script>
