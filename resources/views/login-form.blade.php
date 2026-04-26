<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Bengkel Mobil</title>
    <style>
        /* Global Styles */
        html,
        body {
            margin: 0;
            padding: 0;
            width: 100%;
            height: 100%;
            font-family: 'Arial', sans-serif;
            background-color: #f7f7f7;
        }

        .alert {
        padding: 15px;
        margin-bottom: 20px;
        border-radius: 5px;
        font-size: 16px;
        text-align: center;
        max-width: 400px; /* Membatasi lebar */
        margin-left: auto;
        margin-right: auto; /* Menempatkan alert di tengah */
    }

    .alert-success {
        background-color: #d4edda;
        color: #155724;
    }

    .alert-danger {
        background-color: #f8d7da;
        color: #721c24;
    }

        .container {
            width: 100%;
            height: 100%;
            margin: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        /* Logo Section */
        .logo-section {
            background-color: #d30000;
            padding: 40px 0;
            width: 100%;
            text-align: center;
            border-bottom-left-radius: 50% 20%;
            border-bottom-right-radius: 50% 20%;
        }

        .logo-section .logo {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            object-fit: cover;
            margin-bottom: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .logo-section p {
            color: #fff;
            font-size: 16px;
            margin-top: 10px;
        }

        form {
            background-color: #ffffff;
            padding: 25px;
            width: 90%;
            max-width: 400px;
            margin-top: -30px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
            border-radius: 12px;
        }

        .input-group {
            margin-bottom: 20px;
            text-align: left;
        }

        .input-group label {
            font-size: 15px;
            margin-bottom: 8px;
            display: block;
            color: #444;
        }

        .input-group input,
        .input-group select {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 6px;
            font-size: 14px;
            background-color: #f9f9f9;
            transition: border-color 0.3s;
        }

        .input-group input:focus,
        .input-group select:focus {
            border-color: #d30000;
            outline: none;
        }

        .password-group {
            position: relative;
        }

        .toggle-password {
            position: absolute;
            right: 12px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            color: #888;
        }

        /* Forgot Password */
        .forgot-password {
            text-align: right;
            margin-bottom: 20px;
        }

        .forgot-password a {
            color: #d30000;
            font-size: 14px;
            text-decoration: none;
        }

        .forgot-password a:hover {
            text-decoration: underline;
        }

        /* Submit Button */
        .submit-btn {
            width: 100%;
            padding: 12px;
            background-color: #d30000;
            color: white;
            border: none;
            border-radius: 6px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .submit-btn:hover {
            background-color: #b80000;
        }

        /* Google Button */
        .google-btn {
            width: 100%;
            padding: 12px;
            background-color: #4285f4;
            color: white;
            border: none;
            border-radius: 6px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            margin-top: 10px;
            transition: background-color 0.3s;
        }

        .google-btn:hover {
            background-color: #357ae8;
        }

        /* Register Section */
        .register {
            text-align: center;
            margin-top: 20px;
        }

        .register p {
            font-size: 14px;
        }

        .register a {
            color: #d30000;
            text-decoration: none;
        }

        .register a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="logo-section">
            <img src="{{ asset('assets/img/logo.webp') }}" alt="Logo" class="logo">
            <p>Masukan Email Kamu untuk login</p>
            <!-- Menampilkan pesan flash jika registrasi berhasil -->
            @if (session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger" role="alert">
                    {{ session('error') }}
                </div>
            @endif
        </div>
        <form action="{{ route('login') }}" method="POST">
            @csrf

            <!-- Menampilkan pesan error validasi -->
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="input-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="Masukan email kamu" required>
            </div>
            <div class="input-group password-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Masukan password" required>
                <span class="toggle-password">
                </span>
            </div>
            <div class="input-group">
                <label for="role">Role</label>
                <select id="role" name="role" required>
                    <option value="" selected disabled>Pilih Role</option>
                    <option value="Administrator">Administrator</option>
                    <option value="Pelanggan">Pelanggan</option>
                </select>
            </div>
            <button type="submit" class="submit-btn">Login</button>
            <button type="button" class="google-btn"
                onclick="window.location.href='{{ route('redirect.google') }}'">Login dengan Google</button>
            <div class="register">
                <p>Belum punya akun? <a href="{{ route('register.bengkel') }}">Daftar</a></p>
            </div>
        </form>
    </div>
</body>

</html>
