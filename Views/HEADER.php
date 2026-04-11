<?php
	// include_once '../Controllers/C_User.php';
	include_once '../Config/authck.php';
	include_once '../Models/M_Transaksi.php';

	use App\Authck\Auth;

	Auth::guard();

	$trNotif = new M_Transaksi();

	// Ambil transaksi user yang statusnya diacc atau ditolak
	$dataNotif = [];
	if (isset($_SESSION['id_user'])) {
		$dataNotif = $trNotif->SHOW_TRANSAKSI($_SESSION['id_user']); 
	}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Greentea Library</title>
        
        <link rel="stylesheet" href="../assets/src/bootstrap/css/bootstrap.min.css">
        <link href="../assets/src/icons/css/all.min.css" rel="stylesheet">
        <style>
		    :root{
		        --green-tea: #5B9A68;       /* Matcha Dark */
		        --green-tea-dark: #388E3C;  /* Deep Leaf */
		        --green-tea-soft: #F1F8E9;  /* Background Light */
		        --text-dark: #333333;
                --white: #ffffff;
		    }
		
		    body{
		        margin: 0;
		        font-family: 'Poppins', sans-serif;
		        background: #f8f9fa; /* Soft Grayish White */
                color: var(--text-dark);
		    }
		
		    #toggleSidebar{
		        display: none;
		    }

		    .topbar{
		        height: 65px;
		        background: var(--white);
		        color: var(--green-tea);
		        display: flex;
		        align-items: center;
		        padding: 0 1.5rem;
		        position: fixed;
		        top: 0;
		        left: 0;
		        right: 0;
		        z-index: 1000;
		        box-shadow: 0 4px 12px rgba(0,0,0,0.05);
		    }
		
		    .hamburger{
		        font-size: 22px;
		        cursor: pointer;
		        margin-right: 1.2rem;
		        user-select: none;
                transition: 0.3s;
		    }

            .hamburger:hover { color: var(--green-tea-dark); }
		
		    .brand{
		        font-weight: 700;
		        font-size: 1.4rem;
                display: flex;
                align-items: center;
                gap: 10px;
		    }

		    .sidebar{
		        position: fixed;
		        top: 0; /* Full height */
		        left: 0;
		        width: 260px;
		        height: 100vh;
		        background: var(--white);
		        box-shadow: 4px 0 15px rgba(0,0,0,0.05);
		        transform: translateX(-100%);
		        transition: transform .3s cubic-bezier(0.4, 0, 0.2, 1);
		        z-index: 1001; /* Di atas topbar agar menutup label */
		        padding: 1.5rem 1rem;
		    }
		
		    #toggleSidebar:checked ~ .sidebar{
		        transform: translateX(0);
		    }
		
            .sidebar-header {
                padding: 0.5rem 1rem 2rem;
                border-bottom: 1px solid #eee;
                margin-bottom: 1rem;
            }

		    .sidebar a{
		        display: flex;
                align-items: center;
                gap: 12px;
		        padding: 0.8rem 1.2rem;
		        color: #6c757d;
		        text-decoration: none;
		        font-size: 15px;
                font-weight: 500;
                border-radius: 10px;
                margin-bottom: 5px;
                transition: all 0.2s;
		    }
		
		    .sidebar a:hover{
		        background: var(--green-tea-soft);
                color: var(--green-tea);
		    }

            .sidebar a i {
                width: 20px;
                text-align: center;
            }

		    .overlay{
		        position: fixed;
		        inset: 0;
		        background: rgba(0,0,0,.4);
		        opacity: 0;
		        pointer-events: none;
		        transition: opacity .3s;
		        z-index: 1000;
		    }
		
		    #toggleSidebar:checked ~ .overlay{
		        opacity: 1;
		        pointer-events: all;
		    }

            /* Content Wrapper adjustment */
            .content-area {
                padding-top: 85px;
                padding-left: 20px;
                padding-right: 20px;
            }
            /* poppins-regular - latin */
			@font-face {
			  font-display: swap; /* Check https://developer.mozilla.org/en-US/docs/Web/CSS/@font-face/font-display for other options. */
			  font-family: 'Poppins';
			  font-style: normal;
			  font-weight: 400;
			  src: url('../assets/src/fonts/poppins-v24-latin-regular.woff2') format('woff2'); /* Chrome 36+, Opera 23+, Firefox 39+, Safari 12+, iOS 10+ */
			}
			/* poppins-italic - latin */
			@font-face {
			  font-display: swap; /* Check https://developer.mozilla.org/en-US/docs/Web/CSS/@font-face/font-display for other options. */
			  font-family: 'Poppins';
			  font-style: italic;
			  font-weight: 400;
			  src: url('../assets/src/fonts/poppins-v24-latin-italic.woff2') format('woff2'); /* Chrome 36+, Opera 23+, Firefox 39+, Safari 12+, iOS 10+ */
			}
			/* poppins-500 - latin */
			@font-face {
			  font-display: swap; /* Check https://developer.mozilla.org/en-US/docs/Web/CSS/@font-face/font-display for other options. */
			  font-family: 'Poppins';
			  font-style: normal;
			  font-weight: 500;
			  src: url('../assets/src/fonts/poppins-v24-latin-500.woff2') format('woff2'); /* Chrome 36+, Opera 23+, Firefox 39+, Safari 12+, iOS 10+ */
			}
			/* poppins-500italic - latin */
			@font-face {
			  font-display: swap; /* Check https://developer.mozilla.org/en-US/docs/Web/CSS/@font-face/font-display for other options. */
			  font-family: 'Poppins';
			  font-style: italic;
			  font-weight: 500;
			  src: url('../assets/src/fonts/poppins-v24-latin-500italic.woff2') format('woff2'); /* Chrome 36+, Opera 23+, Firefox 39+, Safari 12+, iOS 10+ */
			}		
			.dropdown-item:active, 
			.dropdown-item:focus,
			.dropdown-item.active {
				background-color: #f8f9fa !important; 
				color: inherit !important;
			}
			.dropdown-item:hover {
				background-color: var(--green-tea-soft) !important;
			}
			.dropdown-menu div::-webkit-scrollbar {
				width: 5px;
			}
			.dropdown-menu div::-webkit-scrollbar-thumb {
				background: #ccc;
				border-radius: 10px;
			}	
		</style>
    </head>
    <body>
		<input type="checkbox" id="toggleSidebar">
		<header class="topbar">
			<label for="toggleSidebar" class="hamburger"><i class="fas fa-bars"></i></label>
			<div class="brand">
				<i class="fas fa-leaf"></i> GreenteaLib
			</div>

			<div class="ms-auto dropdown">
				<a href="#" class="text-decoration-none text-success position-relative" id="notifDropdown" data-bs-toggle="dropdown">
					<i class="fas fa-bell fs-5"></i>
					<?php 
					$adaPesanBaru = false;
					foreach($dataNotif as $notif) {
						if($notif->status == 'dipinjam' || $notif->status == 'tolak') $adaPesanBaru = true;
					}
					if($adaPesanBaru): ?>
						<span class="position-absolute top-0 start-100 translate-middle p-1 bg-danger border border-light rounded-circle"></span>
					<?php endif; ?>
				</a>
				
				<ul class="dropdown-menu dropdown-menu-end shadow border-0 mt-3" style="width: 300px; border-radius: 12px; overflow: hidden;">
					<li class="px-3 py-2 fw-bold border-bottom bg-light">Pemberitahuan</li>
					
					<div style="max-height: 300px; overflow-y: auto;">
						<?php 
						$count = 0;
						if (!empty($dataNotif)): 
							foreach($dataNotif as $notif): 
								if(in_array($notif->status, ['dipinjam', 'tolak', 'tunggu'])): 
									$count++;
						?>
							<li>
								<a class="dropdown-item py-3 border-bottom text-wrap" href="Transaksi.php">
									<div class="small fw-bold text-dark"><?= $notif->judul ?></div>
									
									<?php if($notif->status == 'dipinjam'): ?>
										<div class="small text-success">
											<i class="fas fa-check-circle me-1"></i> Pinjaman di-ACC! Silahkan ambil buku fisik di Perpustakaan.
										</div>
									<?php elseif($notif->status == 'tolak'): ?>
										<div class="small text-danger">
											<i class="fas fa-times-circle me-1"></i> Maaf, peminjaman kamu ditolak.
										</div>
									<?php elseif($notif->status == 'tunggu'): ?>
										<div class="small text-muted">
											<i class="fas fa-clock me-1"></i> Menunggu konfirmasi admin..
										</div>
									<?php endif; ?>
								</a>
							</li>
						<?php 
								endif;
							endforeach; 
						endif;

						if ($count == 0): ?>
							<li><a class="dropdown-item py-4 text-muted small text-center">Tidak ada pemberitahuan baru</a></li>
						<?php endif; ?>
					</div>
					
					<li><a class="dropdown-item text-center small text-success fw-bold py-2" href="Transaksi.php">Lihat Semua Riwayat</a></li>
				</ul>
			</div>
		</header>

		<aside class="sidebar">
            <div class="sidebar-header">
                <div class="brand" style="font-size: 1.1rem;">
                    <i class="fas fa-leaf"></i> Greentea Library
                </div>
            </div>
			<a href="index.php"><i class="fas fa-home"></i> Beranda</a>
			<a href="profile.php"> <i class="fas fa-user"></i> Profil</a>
			<?php if(isset($_SESSION['role']) && $_SESSION['role'] == 'admin'){ ?>
				<a href="V_KatalogBuku.php"> <i class="fas fa-shop"></i> Katalog Buku</a>
				<a href="Transaksi.php"><i class="fas fa-bookmark"></i> Transaksi & Riwayat</a>
				<hr>
			<a href="admin-panel.php" class="text-secondary"><i class="fas fa-gear"></i> Admin Menu </a>
			<?php }else{?>
				<a href="V_KatalogBuku.php"> <i class="fas fa-shop"></i> Katalog Buku</a>
				<a href="Transaksi.php"><i class="fas fa-bookmark"></i> Transaksi & Riwayat</a>
			<?php }?>
            <hr>
            <a href="../Controllers/C_User.php?aksi=logout" onclick="return confirm('Apakah anda yakin ingin keluar?');" class="text-danger"><i class="fas fa-sign-out-alt"></i> Keluar</a>
		</aside>
			<label for="toggleSidebar" class="overlay"></label>
        	<div class="content-area">