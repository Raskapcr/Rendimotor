<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi Bengkel</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
            background: #f9f9f9; /* Latar belakang netral */
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            color: #444;
        }

        .container {
            width: 100%;
            max-width: 450px;
            background: #ffffff;
            border-radius: 15px;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            animation: fadeIn 0.8s ease;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .header {
            background: #e63946; /* Red yang lebih modern dan lembut */
            color: #ffffff;
            padding: 20px 20px;
            text-align: center;
            border-bottom: 3px solid #d62828;
        }

        .header h1 {
            margin: 0;
            font-size: 24px;
            font-weight: 700;
            text-transform: uppercase;
        }

        .header p {
            margin: 8px 0 0;
            font-size: 14px;
            font-weight: 400;
            letter-spacing: 0.5px;
        }

        .form-container {
            padding: 30px;
        }

        .form-group {
            position: relative;
            margin-bottom: 25px;
        }

        label {
            position: absolute;
            top: 12px;
            left: 40px;
            font-size: 14px;
            color: #888;
            background: #fff;
            transition: all 0.3s;
            pointer-events: none;
            padding: 0 5px;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"],
        select {
            width: 100%;
            padding: 14px 16px 14px 40px;
            font-size: 14px;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-sizing: border-box;
            outline: none;
            transition: all 0.3s ease-in-out;
            background: #fefefe;
        }

        input:focus,
        select:focus {
            border-color: #e63946;
            box-shadow: 0 0 6px rgba(230, 57, 70, 0.3);
        }

        input:focus + label,
        select:focus + label,
        input:not(:placeholder-shown) + label {
            top: -8px;
            font-size: 12px;
            color: #e63946;
        }

        .icon {
            position: absolute;
            top: 50%;
            left: 16px;
            transform: translateY(-50%);
            font-size: 16px;
            color: #888;
        }

        button {
            width: 100%;
            padding: 15px;
            background: #e63946;
            color: white;
            font-size: 16px;
            font-weight: 500;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.3s ease-in-out;
        }

        button:hover {
            background: #d62828;
            transform: translateY(-2px);
        }

        .form-footer {
            text-align: center;
            margin-top: 20px;
        }

        .form-footer a {
            color: #e63946;
            text-decoration: none;
            font-weight: 500;
        }

        .form-footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h1>Registrasi Akun</h1>
            <p>Silakan isi formulir di bawah untuk membuat akun baru.</p>
        </div>
        <div class="form-container">
            <form action="{{ route('storeRegis') }}" method="POST">
                @csrf
                <div class="form-group">
                    <span class="icon">👤</span>
                    <input type="text" id="name" name="name" placeholder=" " required>
                    <label for="name">Nama Lengkap</label>
                </div>

                <div class="form-group">
                    <span class="icon">✉️</span>
                    <input type="email" id="email" name="email" placeholder=" " required>
                    <label for="email">Email</label>
                </div>

                <div class="form-group">
                    <span class="icon">👔</span>
                    <select id="role" name="role" required>
                        <option value="" disabled selected></option>
                        <option value="Administrator">Administrator</option>
                        <option value="Pelanggan">Pelanggan</option>
                    </select>
                    <label for="role">Role</label>
                </div>

                <div class="form-group">
                    <span class="icon">🔒</span>
                    <input type="password" id="password" name="password" placeholder=" " required>
                    <label for="password">Password</label>
                </div>

                <div class="form-group">
                    <span class="icon">🔒</span>
                    <input type="password" id="password_confirmation" name="password_confirmation" placeholder=" " required>
                    <label for="password_confirmation">Konfirmasi Password</label>
                </div>

                <button type="submit">Daftar</button>

                <div class="form-footer">
                    <p>Sudah memiliki akun? <a href="{{ route('hal-login') }}">Login</a></p>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
