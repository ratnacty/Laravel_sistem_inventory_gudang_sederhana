
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Inventory</title>

   @include('includes.style')
</head>

<body>
    <div id="app">

        <div id="sidebar" class="active">
       @include('includes.sidebar')
        </div>

        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>

            <div class="page-heading">
                @yield('heading')
            </div>
            <div class="page-content">
    
                @yield('content')

            </div>

           
            @include('includes.footer')
        </div>
    </div>
    @include('includes.script')
</body>

</html>