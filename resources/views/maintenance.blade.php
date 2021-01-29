<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Maintenance | Devisi IT </title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>
<style>
    @font-face {
        font-family: 'Nolan';
        src: url('https://s3-us-west-2.amazonaws.com/s.cdpn.io/312465/Nolan-Regular.ttf') format('truetype');
    }

    $background-color: #edeff0;

    $bluegrey-50: #ECEFF1;
    $bluegrey-100: #CFD8DC;
    $bluegrey-200: #B0BEC5;
    $bluegrey-300: #90A4AE;
    $bluegrey-400: #78909C;
    $bluegrey-500: #607D8B;
    $bluegrey-600: #546E7A;
    $bluegrey-700: #455A64;
    $bluegrey-800: #37474F;
    $bluegrey-900: #263238;

    *,
    *:before,
    *:after {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        padding: 20px;
        display: flex;
        align-items: center;
        flex-direction: column;
        justify-content: center;
        background-color: #edeff0;
        font-family: 'Nolan', sans-serif;
    }

    .logo {
        top: 70px;
        margin-left: 20%;
        position: relative;
        /* animation-name: dips;
        animation-duration: 12s;
        animation-timing-function: linear;
        animation-delay: 0s;
        animation-iteration-count: infinite;
        animation-direction: normal;
        animation-fill-mode: none;
        animation-play-state: running; */
    }

    .wave-wrapper {
        position: relative;

        animation-name: wave;
        animation-duration: 4s;
        animation-timing-function: linear;
        animation-delay: 0s;
        animation-iteration-count: infinite;
        animation-direction: normal;
        animation-fill-mode: none;
        animation-play-state: running;
    }

    .wave {
        width: 140px;
        position: relative;
    }

    .cover-up {
        height: 45px;
        margin-top: -6px;
        background-color: #edeff0;
    }

    @keyframes dips {
        0% {
            transform: rotate(-5deg);
        }

        10% {
            transform: translateY(-3px) rotate(5deg);
        }

        20% {
            transform: translateY(-10px) rotate(3deg);
        }

        30% {
            transform: rotate(-5deg);
        }

        50% {
            transform: translateY(-10px) rotate(5deg);
        }

        60% {
            transform: translateY(-5px) rotate(3deg);
        }

        70% {
            transform: rotate(-5deg);
        }

        80% {
            transform: translateY(-10px) rotate(5deg);
        }

        90% {
            transform: translateY(-25px) rotate(3deg);
        }

        100% {
            transform: rotate(-5deg);
        }
    }

    @keyframes wave {
        0% {
            transform: translateX(0);
        }

        20% {
            transform: translateX(10px);
        }

        60% {
            transform: translateX(0);
        }

        80% {
            transform: translateX(-10px);
        }

        100% {
            transform: translateX(0);
        }
    }

    .text {
        z-index: 5;
        margin-top: -5px;
        position: relative;
        color: $bluegrey-400;
    }

    .logo-text {
        width: 75px;
        margin-top: 20px;
    }

    .copyright {
        font-size: 12px;
        margin-top: 10px;
        color: $bluegrey-400;
    }

    .wave-break {
        width: 50px;
        margin-top: 20px;
    }
    
    .logo-size{
        width: 70%;
    }
</style>

<body>
    <div class="logo">
        <img src="{{asset('/img/2.gif')}}" class="logo-size"/>
    </div>
    <div class="wave-wrapper">
        <div class="wave">
            <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/312465/Moby%20Wave_White%20Fill.svg" />
        </div>
        <div class="cover-up"></div>
    </div>
    <div class="text">PT BEKAT SAHABAT SEJATI</div>
    <img class="wave-break" src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/312465/Moby%20Wave_White%20Fill.svg" />
    <div class="copyright">&copy; Maintenance | Devisi IT </div>
    <div class="form-group pt-4">
        <a class="btn btn-dark" href="{{url('admin/home')}}"><b>KEMBALI</b></a>
    </div>
</body>

</html>