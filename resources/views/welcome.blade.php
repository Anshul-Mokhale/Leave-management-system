<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Interactive Login Page</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <style>
        body {
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: linear-gradient(135deg, #1e3c72, #2a5298);
            font-family: 'Poppins', sans-serif;
            overflow: hidden;
        }

        .button-container {
            text-align: center;
            background: rgba(255, 255, 255, 0.1);
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
            backdrop-filter: blur(10px);
        }

        h1 {
            color: #ffffff;
            margin-bottom: 30px;
            font-size: 3em;
            text-shadow: 2px 2px 10px rgba(0, 0, 0, 0.5);
        }

        a {
            display: inline-block;
            background: linear-gradient(135deg, #ff9a9e, #fad0c4);
            border: none;
            border-radius: 50px;
            color: #ffffff;
            padding: 15px 40px;
            margin: 15px;
            font-size: 1.2em;
            font-weight: bold;
            cursor: pointer;
            text-decoration: none;
            text-align: center;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.3);
            transition: all 0.4s ease;
            text-transform: uppercase;
        }

        a:hover {
            transform: scale(1.1);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.5);
        }

        a:active {
            transform: scale(1);
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.3);
        }

        a.user-login {
            background: linear-gradient(135deg, #36d1dc, #5b86e5);
        }

        a.admin-login {
            background: linear-gradient(135deg, #ff758c, #ff7eb3);
        }

        a span {
            display: inline-block;
            transition: transform 0.4s;
        }

        a:hover span {
            transform: scale(1.2);
        }

        .background-animation {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
            overflow: hidden;
        }

        .circle {
            position: absolute;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.2);
            animation: move 20s infinite;
        }

        .circle:nth-child(1) {
            width: 100px;
            height: 100px;
            top: 10%;
            left: 20%;
            animation-delay: 0s;
        }

        .circle:nth-child(2) {
            width: 150px;
            height: 150px;
            top: 30%;
            left: 60%;
            animation-delay: 4s;
        }

        .circle:nth-child(3) {
            width: 200px;
            height: 200px;
            top: 50%;
            left: 30%;
            animation-delay: 8s;
        }

        @keyframes move {
            0% {
                transform: translateY(0) rotate(0deg);
            }
            50% {
                transform: translateY(-20px) rotate(180deg);
            }
            100% {
                transform: translateY(0) rotate(360deg);
            }
        }
    </style>
</head>
<body>
    <div class="background-animation">
        <div class="circle"></div>
        <div class="circle"></div>
        <div class="circle"></div>
    </div>
    <div class="button-container">
        <h1>Select Login Type</h1>
        <a href="/sign-in" class="user-login"><i class='bx bx-lock-open-alt'></i> &nbsp;<span>Login</span></a>
        <a href="/sign-up" class="admin-login"><i class='bx bx-edit-alt' ></i>&nbsp;<span>Register</span></a>
    </div>
</body>
</html>
