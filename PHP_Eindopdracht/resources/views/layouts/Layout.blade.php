<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="{{ asset('js/app.js') }}" defer></script>

    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>StudyMate</title>
</head>

<body>
<header>
    <nav class="navbarx shadow" style="z-index: 999">
        <ul class="navbarx-nav">
            <li class="logo">
                <a href="/#" class="nav-linkx">
                    <span class="link-text logo-text pt-2"><h5>StudyMate</h5></span>
                    <svg
                        aria-hidden="true"
                        focusable="false"
                        data-prefix="fad"
                        data-icon="angle-double-right"
                        role="img"
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 448 512"
                        class="svg-inline--fa fa-angle-double-right fa-w-14 fa-5x">
                        <g class="fa-group">
                            <path
                                fill="currentColor"
                                d="M224 273L88.37 409a23.78 23.78 0 0 1-33.8 0L32 386.36a23.94 23.94 0 0 1 0-33.89l96.13-96.37L32 159.73a23.94 23.94 0 0 1 0-33.89l22.44-22.79a23.78 23.78 0 0 1 33.8 0L223.88 239a23.94 23.94 0 0 1 .1 34z"
                                class="fa-secondary"
                            ></path>
                            <path
                                fill="currentColor"
                                d="M415.89 273L280.34 409a23.77 23.77 0 0 1-33.79 0L224 386.26a23.94 23.94 0 0 1 0-33.89L320.11 256l-96-96.47a23.94 23.94 0 0 1 0-33.89l22.52-22.59a23.77 23.77 0 0 1 33.79 0L416 239a24 24 0 0 1-.11 34z"
                                class="fa-primary"
                            ></path>
                        </g>
                    </svg>
                </a>
            </li>

            <li class="nav-itemx">
                <a href="/dashboard" class="nav-linkx">
                    <i class="material-icons"><span class="fas fa-chart-line"></span></i>
                    <span class="link-text">Dashboard</span>
                </a>
            </li>

            <li class="nav-itemx">
                <a href="/admin" class="nav-linkx">
                    <i class="material-icons"><span class="fas fa-tools"></span></i>
                    <span class="link-text">Admin Area</span>
                </a>
            </li>

            <li class="nav-itemx">
                <a href="/deadline" class="nav-linkx">
                    <i class="material-icons"><span class="fas fa-tasks"></span></i>
                    <span class="link-text">Deadline Manager</span>
                </a>
            </li>

            @guest
                <li  id="test1" class="nav-itemx">
                    <a href="{{ route('login') }}" class="nav-linkx">
                        <i class="material-icons"><span class="fas fa-sign-in-alt"></span></i>
                        <span class="link-text">Inloggen</span>
                    </a>
                </li>
                @if (Route::has('register'))
                    <li class="nav-itemx">
                        <a href="{{ route('register') }}" class="nav-linkx">
                            <i class="material-icons"><span class="fas fa-user-plus"></span></i>
                            <span class="link-text">Registreren</span>
                        </a>
                    </li>
                @endif
            @else
                <li id="test1" class="nav-itemx">
                    <a href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" class="nav-linkx">
                        <i class="material-icons"><span class="fas fa-sign-out-alt "></span></i>
                        <span class="link-text">Uitloggen</span>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            @endguest
        </ul>
    </nav>
</header>

<main id="main" class="p-0">
    <div class="jumbotron shadow" style="background-color: #CA1830; color: white; border-radius: 0 ">
        <div class="container">
            @yield('jumbotron')
        </div>
    </div>
    @yield('content')
</main>

<div class="footer">
    <div class="footer-bottom">
        &copy StudyMate | Gemaakt door Jeroen van der Poel & Bas van Pelt
    </div>
</div>

</body>

<style>
    :root {
        font-size: 16px;
        --text-primary: #b6b6b6;
        --text-secondary: #ececec;
        --bg-primary: #23232e;
        --bg-secondary: #141418;
        --transition-speed: 400ms;
    }

    body {
        color: black;
        background-color: white;
        margin: 0;
        padding: 0;
        height: 100%;
    }

    html{
        height: 100%;
    }

    main {
        margin-left: 5rem;
        min-height: 100%;
        padding: 1rem;
    }

    .navbarx {
        position: fixed;
        background-color: var(--bg-primary);
        transition: width 600ms ease;
    }

    .navbarx-nav {
        list-style: none;
        padding: 0;
        margin: 0;
        display: flex;
        flex-direction: column;
        align-items: center;
        height: 100%;
    }

    .nav-itemx   {
        width: 100%;
        align-content: center;
    }

    .nav-linkx {
        display: flex;
        align-items: center;
        height: 5rem;
        color: var(--text-primary);
        text-decoration: none;
        filter: grayscale(100%) opacity(0.7);
        transition: var(--transition-speed);
    }

    #test1{
        margin-top: auto;
    }

    .nav-linkx:hover {
        filter: grayscale(0%) opacity(1);
        background: var(--bg-secondary);
        color: var(--text-secondary);
    }

    .link-text {
        display: none;
        margin-left: 1rem;
    }

    .nav-linkx svg {
        width: 2rem;
        min-width: 2rem;
        margin: 0 1.5rem;
    }

    .nav-itemx i{
        width: 0;
        min-width: 2rem;
        margin: 0 1.5rem;
    }

    .fa-primary {
        color: white;
    }

    .fa-secondary {
        color: #CA1830;
    }

    .fa-primary,
    .fa-secondary {
        transition: var(--transition-speed);
    }

    .logo {
        font-weight: bold;
        text-transform: uppercase;
        margin-bottom: 1rem;
        text-align: center;
        color: var(--text-secondary);
        background: var(--bg-secondary);
        font-size: 1.5rem;
        letter-spacing: 0.3ch;
        width: 100%;
    }

    .material-icons{
        font-weight: bold;
        text-transform: uppercase;
        margin-bottom: 1rem;
        text-align: center;
        align-content: center;
        color: var(--text-secondary);
        font-size: 1.5rem;
        letter-spacing: 0.3ch;
        width: 100%;
    }

    .logo svg {
        transform: rotate(0deg);
        transition: var(--transition-speed);
    }

    .logo-text {
        display: inline;
        position: absolute;
        left: -999px;
        transition: var(--transition-speed);
    }

    .nav-itemx:hover .material-icons{
        color: #CA1830;
    }

    .navbarx:hover .logo svg {
        transform: rotate(-180deg);
    }

    /* Footer */
    .footer{
        background-color: #23232e;
        color: white;
        height: 275px;
        position: relative;
        width: 100%;
    }

    .footer .footer-bottom{
        background: #141418;
        color: white;
        height: 50px;
        width: 100%;
        text-align: center;
        position: absolute;
        bottom: 0;
        left: 0;
        padding-top: 20px;
    }


    /* Small screens */
    @media only screen and (max-width: 800px) {
        .navbarx {
            bottom: 0;
            width: 100vw;
            height: 5rem;
            margin-top: auto;
            display: inline;
        }

        .about-section{
            padding-left: 0;
        }

        .logo {
            display: none;
        }

        .links{
            display: none;
        }

        .navbarx-nav {
            flex-direction: row;
        }

        .nav-linkx {
            justify-content: center;
            width: 45px;
        }

        main {
            margin: 0;
            margin-bottom: 100px;
        }
    }

    /* Large screens */
    @media only screen and (min-width: 800px) {
        .navbarx {
            top: 0;
            width: 5rem;
            height: 100vh;
        }

        .navbarx:hover {
            width: 16rem;
        }

        .about-section{
            padding-left: 65px;
        }

        .navbarx:hover .link-text {
            display: inline;
        }

        .navbarx:hover .logo svg
        {
            margin-left: 11rem;
        }

        .navbarx:hover .logo-text
        {
            left: 0px;
        }
    }

    .dark {
        --text-primary: #b6b6b6;
        --text-secondary: #ececec;
        --bg-primary: #23232e;
        --bg-secondary: #141418;
    }

    .light {
        --text-primary: #1f1f1f;
        --text-secondary: #000000;
        --bg-primary: #ffffff;
        --bg-secondary: #e4e4e4;
    }

    .solar {
        --text-primary: #576e75;
        --text-secondary: #35535c;
        --bg-primary: #fdf6e3;
        --bg-secondary: #f5e5b8;
    }

    .theme-icon {
        display: none;
    }

    .dark #darkIcon {
        display: block;
    }

    .light #lightIcon {
        display: block;
    }

    .solar #solarIcon {
        display: block;
    }

</style>
</html>
