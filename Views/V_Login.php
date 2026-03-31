<?php 
include_once '../Controllers/C_User.php';
include_once '../Config/signedIn.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Greentea Library</title>
    
    <link rel="stylesheet" href="../assets/src/bootstrap/css/bootstrap.min.css">
    <link href="../assets/src/icons/css/all.min.css" rel="stylesheet">
    
    <style>
        @font-face {
            font-family: 'Poppins';
            src: url('../assets/src/fonts/poppins-v24-latin-regular.woff2') format('woff2');
        }

        :root {
            --tea-green: #5B9A68;
            --soft-bg: #fcfdfc;
            --border-color: #e9ecef;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: var(--soft-bg);
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            margin: 0;
        }

        .login-box {
            width: 100%;
            max-width: 360px;
        }

        .brand-icon {
            color: var(--tea-green);
            font-size: 2.5rem;
            margin-bottom: 1rem;
        }

        .login-title {
		    font-weight: 700;
		    font-size: 1.5rem;
		    background: linear-gradient(to right, #5B9A68, #A5D6A7, #2E7D32, #5B9A68);
		    background-size: 200% auto;
		    -webkit-background-clip: text;
		    -webkit-text-fill-color: transparent;
		    animation: textGradient 4s linear infinite;
		}
		
		@keyframes textGradient {
		    to {
		        background-position: -200% center;
		    }
		}


        .login-subtitle {
            font-size: 0.85rem;
            color: #888;
            margin-bottom: 2rem;
        }

        .form-label {
            font-size: 0.75rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            color: #666;
        }

        .form-control {
            border: 1px solid var(--border-color);
            border-radius: 8px;
            padding: 12px 15px;
            font-size: 0.9rem;
            background-color: #fff;
            transition: all 0.2s ease;
        }

        .form-control:focus {
            border-color: var(--tea-green);
            box-shadow: none; /* Buang glow biru bootstrap */
            background-color: #fff;
        }

        .btn-tea {
            background-color: var(--tea-green);
            color: #fff;
            border: none;
            border-radius: 8px;
            padding: 12px;
            font-weight: 500;
            font-size: 0.95rem;
            width: 100%;
            margin-top: 1rem;
            transition: opacity 0.2s;
        }

        .btn-tea:hover {
            color: #fff;
            opacity: 0.9;
        }

        /* Mobile Adjustments */
        @media (max-width: 480px) {
            .login-box {
                max-width: 100%;
            }
        }
    </style>
</head>
<body>

    <div class="login-box text-center">
        <div class="brand-icon">
            <i class="fas fa-leaf"></i>
        </div>
        
        <h1 class="login-title">Greentea Library</h1>
        <p class="login-subtitle">Akses perpustakaan digital</p>

        <form action="../Controllers/C_User.php?aksi=login" method="POST" class="text-start">
            <div class="mb-3">
                <label class="form-label"><i class="fas fa-user"></i> Username</label>
                <input type="text" name="username" class="form-control" placeholder="Masukkan Username" required>
            </div>

            <div class="mb-3">
                <label class="form-label"><i class="fas fa-lock"></i> Password</label>
                <input type="password" name="password" class="form-control" placeholder="Masukkan Password" required>
            </div>

            <button type="submit" class="btn btn-tea btn-success">
                Masuk
            </button>

            <hr>
            
            <div class="mt-3 text-center">
                <a href="V_Regis.php" class="text-decoration-none small" style="color: #bbb;">Belum punya akun?</a>
            </div>
        </form>
    </div>

    <script src="../assets/src/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
