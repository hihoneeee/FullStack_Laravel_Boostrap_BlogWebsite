<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;1,500&display=swap');

        * {
            margin: 0;
            padding: 0;
            font-family: "poppins";
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background: linear-gradient(45deg, #098dc1, 60%, #f417de);


        }

        .container {
            height: 650px;
            width: 410px;
            background: #eee;
            border-radius: 15px;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            overflow: hidden;
            position: relative;
        }

        .Form {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;

        }

        .login-form {
            position: absolute;
            transform: translateX(0px);
            transition: .5s ease;

        }

        .login-form.active {
            transform: translateX(-410px);
        }

        .Register-form {
            transform: translateX(410px);
            transition: .5s ease;

        }

        .Register-form.active {
            transform: translateX(0);
        }

        h2 {
            color: #333;
            font-size: 32px;
            font-weight: 700;
        }

        .input-box {
            margin: 45px 0;
            height: 40px;
            width: 300px;
            border-bottom: 2px solid rgba(0, 0, 0, .5);
            position: relative;
        }

        .input-box input {
            width: 90%;
            height: 100%;
            float: right;
            border: none;
            outline: none;
            font-size: 15px;
            color: rgba(0, 0, 0, .9);

            padding: 5px 0;
            background: transparent;
        }

        .input-box label {
            position: absolute;
            left: 0;
            transform: translateY(-56%);
            font-size: 15px;
            font-weight: 500;
            color: #333;
        }

        .input-box i {
            position: absolute;
            left: 0px;
            transform: translateY(75%);
            font-size: 22px;
            color: rgba(0, 0, 0, .5);
        }

        input::placeholder {
            font-size: 13px;
        }

        input#checked {
            margin-right: 3px;
        }

        .forgot-section {
            display: flex;
            justify-content: space-between;
            width: 100%;
            margin-top: -20px;
        }

        .forgot-section span {
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 13px;
        }

        .forgot-section span a {
            color: #333;
            text-decoration: none;
        }

        .btn {
            width: 100%;
            height: 40px;
            margin-top: 20px;
            border-radius: 50px;
            border: none;
            outline: none;
            background: linear-gradient(45deg, #098dc1, 60%, #f417de);
            font-size: 19px;
            font-weight: 500;
            color: #eee;
            position: relative;
            cursor: pointer;
            z-index: 1;
            overflow: hidden;
        }

        .btn::before {
            content: "";
            position: absolute;
            left: 0;
            top: 0%;
            height: 100%;
            width: 00%;
            background: linear-gradient(45deg, #f417de, 60%, #098dc1);
            transition: .5s ease;
            z-index: -1;
        }

        .btn:hover {
            color: #eee;
        }

        .btn:hover:before {
            width: 100%;
        }

        p {
            color: rgba(0, 0, 0, .5);
            font-size: 13px;
            font-weight: 500;
            margin: 25px 0;
        }

        .social-media {
            display: flex;
        }

        .social-media i {
            font-size: 28px;
            margin-left: 15px;
            padding: 5px;
            cursor: pointer;
            transition: .3s;
        }

        .social-media i:nth-child(1) {
            color: #eee;
            background: #1822dd;
            border-radius: 50%;
            border: 2px solid #eee;
        }

        .social-media i:nth-child(1):hover {
            background: #eee;
            color: #1822dd;
            border: 2px solid #1822dd;
        }

        .social-media i:nth-child(2) {
            color: #eee;
            background: #f00;
            border-radius: 50%;
            border: 2px solid #eee;
        }

        .social-media i:nth-child(2):hover {
            background: #eee;
            color: #f00;
            border: 2px solid #f00;
        }

        .social-media i:nth-child(3) {
            color: #eee;
            background: #098dc1;
            border-radius: 50%;
            border: 2px solid #eee;
        }

        .social-media i:nth-child(3):hover {
            background: #eee;
            color: #098dc1;
            border: 2px solid #098dc1;
        }

        .RegisteBtn a {
            text-decoration: none;
            font-size: 14px;
        }


        @media(max-width: 768px) {
            .container {
                height: 500px;
                width: 380px;
            }

            h2 {
                font-size: 26px;
            }

            .input-box {
                margin: 34px 0;
                height: 35px;
                width: 300px;
            }

            .input-box label {
                font-size: 13px;

            }

            .input-box input {
                font-size: 13px;
            }

            .input-box i {

                font-size: 18px;

            }

            input::placeholder {
                font-size: 13px;
            }

            .forgot-section span {
                font-size: 12px;
            }

            input#checked {
                margin-right: 2px;
                height: 15px;
            }

            .btn {
                height: 35px;
                font-size: 15px;
            }

            p {
                font-size: 11px;
            }

            .social-media i {
                font-size: 20px;

            }

            .RegisteBtn a {
                text-decoration: none;
                font-size: 13px;
            }

        }

        @media(max-width: 480px) {
            .container {
                height: 450px;
                width: 310px;
            }

            h2 {
                font-size: 22px;
                font-weight: 600;
            }

            .input-box {
                margin: 20px 0;
                height: 35px;
                width: 220px;
            }

            .input-box label {
                font-size: 12px;

            }

            .input-box input {
                font-size: 12px;
            }

            .input-box i {

                font-size: 16px;

            }

            input::placeholder {
                font-size: 10px;
            }

            .forgot-section span {
                font-size: 9px;
            }

            input#checked {
                margin-right: 2px;
                height: 10px;
            }

            .btn {
                height: 25px;
                font-size: 12px;
            }

            p {
                font-size: 11px;
            }

            .social-media i {
                font-size: 18px;

            }

            .RegisteBtn a {
                text-decoration: none;
                font-size: 11px;
            }

        }

        @media(max-width:365px) {
            .container {
                height: 420px;
                width: 280px;
            }

            h2 {
                font-size: 18px;
                font-weight: 600;
            }

            .input-box {
                margin: 20px 0;
                height: 35px;
                width: 200px;
            }

            .social-media i {
                font-size: 16px;

            }

            .RegisteBtn a {
                text-decoration: none;
                font-size: 9px;
            }

        }
    </style>
</head>

<body>
    <div class="container">
        <div class="Form login-form">
            <h2>Login</h2>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="input-box">
                    <i class='bx bxs-user'></i>
                    <label for="#">Email</label>

                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                        name="email" value="{{ old('email') }}" required autocomplete="email" autofocus
                        placeholder="Enter Your Email*">

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="input-box">
                    <i class='bx bxs-envelope'></i>
                    <label for="#">Password</label>

                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                        name="password" required autocomplete="current-password" placeholder="Enter Your Password*">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                </div>
                <div class="forgot-section">
                    <span><input style="cursor: pointer" type="checkbox" name="remember" id="remember checked"
                            {{ old('remember') ? 'checked' : '' }}> Remember Me</span>
                    <span>
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        @endif
                    </span>
                </div>
                <button type="submit" class="btn">
                    {{ __('Login') }}
                </button>
            </form>
            <p>Or Sign up using</p>
            <div class="social-media">
                <i class='bx bxl-facebook'></i>
                <i class='bx bxl-google'></i>
                <i class='bx bxl-twitter'></i>
            </div>
            <p class="RegisteBtn RegiBtn"><a href="#">Register Now</a></p>
        </div>

    </div>
    <script>
        const container = document.querySelector(".container");
        const loginForm = document.querySelector('.login-form')
        const RegisterForm = document.querySelector('.Register-form');
        const RegiBtn = document.querySelector('.RegiBtn');
        const LoginBtn = document.querySelector('.LoginBtn');
        RegiBtn.addEventListener('click', () => {
            RegisterForm.classList.add('active');
            loginForm.classList.add('active')
        })
        LoginBtn.addEventListener('click', () => {
            RegisterForm.classList.remove('active');
            loginForm.classList.remove('active')
        })
    </script>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
</body>

</html>
