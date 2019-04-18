<header class="header text-center">
	<div class="container">
		<div class="tagline">
			<p>Phân hiệu Trường Đại Học Nội Vụ Hà Nội tại tỉnh Quảng Nam</p>
		</div>
		<div class="branding">
			<h1 class="logo">
				<span aria-hidden="true" class="fa fa-file-text head-icon"></span>
				<span class="text-highlight">Hệ thống lưu trữ tài liệu</span>
			</h1>
		</div>
	</div>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<div class="collapse navbar-collapse position-relative" id="navbarNavDropdown">
			<ul class="navbar-nav">
				<li class="nav-item cool-link active">
					<a class="nav-link" href="/">Trang chủ </a>
				</li>
				<li class="nav-item cool-link">
					<a class="nav-link" href="#">Văn bản</a>
				</li>
				<li class="nav-item cool-link dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					Dropdown
					</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
						<a class="dropdown-item" href="#">Action</a>
					</div>
				</li>

			</ul>
			<ul class="navbar-nav position-login">
				@if(Auth::check())
				<li class="nav-item cool-link dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<i class="fa fa-user"></i> Tai Khoan Cua Toi
					</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
						<a class="dropdown-item" href="{{ route('profile') }}">Thong tin ca nhan</a>
						<a class="dropdown-item" href="#">Dang Xuat</a>
					</div>
				</li>
				@endif
			</ul>

		</div>
	</nav>
</header>
