<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> @yield('title') </title>
    {{-- bootstrap 5 --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <link rel="stylesheet" href="css/frontstyle.css">
    {{-- font awesome --}}
    <script src="https://kit.fontawesome.com/ad2db55012.js" crossorigin="anonymous"></script>

</head>

<body>
    {{-- <div class="container-fluid bg-dark text-white d-flex justify-content-around pt-3">
            <div>
                <p>Call Us : 9827383049</p>
            </div>
            <div>
                <span style="margin-right: 20px;">Register</span>
                <span>Login</span>
            </div>
        </div> --}}

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="#"><strong>Bus</strong> Booking</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            @if (!auth()->user())
                <div class="auth">
                    <span style="margin-right: 20px"><a href="{{ route('register') }}">Register</a></span>
                    <span><a href="{{ route('login') }}">Login</a></span>
                </div>
            @else
                <div class="user d-flex">
                    <div class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#">Manage my account</a></li>                            
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="/logout">Log out</a></li>
                        </ul>
                    </div>                   
                </div>
            @endif
        </div>
    </nav>

    
    <div>
        @yield('content')
    </div>

    <section class="footer mt-5">
        <div class="container-fluid bg-secondary text-white d-flex justify-content-around p-4">
            <div>
                <h5 class="text-center">Top Routes <i class="fa-solid fa-route"></i></h5>
                <ul>
                    <li>Itahari - Kathmandu</li>
                    <li>Dharan - Pokhara</li>
                    <li>Kathmandu - Limbuni</li>
                </ul>
            </div>
            <div>
                <h5 class="text-center">Top Operators <i class="fa-solid fa-bus"></i></h5>
                <ul>
                    <li>Ram Karki</li>
                    <li>Hari Limbu</li>
                    <li>Shyam Rai</li>
                </ul>
            </div>
        </div>
        <div class="container-fluid bg-dark p-3 text-white text-center">
            <p style="font-size: 0.8rem;">Copyright <i class="fa-regular fa-copyright"></i> 2023 Bus Booking</p>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
</body>

</html>
