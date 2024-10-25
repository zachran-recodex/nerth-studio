<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Nerth Studio</title>

    <link rel="shortcut icon" href="favicon.ico" type="img/logo.png">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/tailwind.css') }}">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f3f4f6;
        }

        .container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            max-width: 1200px;
            width: 100%;
        }

        .left-section {
            background-color: #1a1a1a;
            color: white;
            padding: 2rem;
            display: flex;
            flex-direction: column;
            align-items: center;
            max-width: 500px;
            width: 100%;
            height: 700px;
            align-content: center
        }

        .left-section h1 {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 2rem;
        }

        .left-section img {
            object-fit: cover;
            height: 500px;
        }

        .right-section {
            background-color: #ffffff;
            padding: 2rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            max-width: 1800px;
            width: 100%;
            height: 700px;
            align-content: center;
        }

        .right-section h2 {
            font-size: 1rem;
            font-weight: 600;
        }

        .right-section form {
            display: flex;
            flex-direction: column;
        }

        .right-section .form-group {
            display: flex;
            justify-content: space-between;
        }

        .right-section .form-group .form-control {
            width: 48%;
        }

        .right-section label {
            display: block;
            font-size: 0.875rem;
            font-weight: 500;
            color: #4A4A4A;
            margin-bottom: 0.5rem;
        }

        .right-section input[type="text"],
        .right-section input[type="email"],
        .right-section input[type="date"],
        .right-section input[type="password"] {
            width: 100%;
            padding: 0.5rem;
            margin-bottom: 1rem;
            border: 1px solid #D1D5DB;
            border-radius: 4px;
        }

        .right-section .checkbox-group {
            display: flex;
            align-items: center;
            margin-bottom: 1rem;
        }

        .right-section .checkbox-group input[type="checkbox"] {
            margin-right: 0.5rem;
        }

        .right-section .checkbox-group.forgot-password {
            justify-content: space-between;
            margin-bottom: 1rem;
        }

        .right-section .checkbox-group.forgot-password a {
            color: gray;
            text-decoration: none;
        }

        .right-section .form-actions {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .right-section .form-actions button {
            width: 48%;
            padding: 0.75rem;
            border-radius: 4px;
            font-weight: 600;
        }

        .right-section .form-actions .create-account-btn {
            background-color: #000000;
            color: white;
            border: none;
        }

        .right-section .form-actions .google-signin-btn {
            background-color: #ffffff;
            color: #000000;
            border: 1px solid #D1D5DB;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .right-section .form-actions .google-signin-btn img {
            margin-right: 0.5rem;
        }

        .right-section .form-footer {
            text-align: center;
            margin-top: 1rem;
        }

        .right-section .form-footer a {
            color: gray;
            text-decoration: none;
        }

        .right-section .form-footer a:hover {
            text-decoration: underline;
        }

        .right-section .subtitle {
            display: flex;
            align-items: center;
            margin-bottom: 50px;
        }

        .right-section .subtitle img {
            margin: 10px
        }

        .right-section .title {
            align-items: center;
            margin-bottom: 50px;
        }
    </style>

</head>

<body>

    {{ $slot }}

</body>

</html>
