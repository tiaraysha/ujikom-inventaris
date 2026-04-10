<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Inventaris</title>

    <link href="https://wiggly-library-a46.notion.site/Inventaris-3338bd43354980e5af8af6e7d6139b9d">
    <link rel="stylesheet" href="/assets/Bootstrap/css/mdb.min.css">
    <script src="{{  asset('/assets/Bootstrap/js/mdb.umd.min.js') }}"></script>
</head>
<body>
   <div class="d-flex overflow-hidden">
        
        <div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-primary" style="width: 280px; height: 100vh; background-color: #2a41a7 !important;">
            <small class="text-white-50 fw-bold ps-2 mb-2 text-uppercase" style="font-size: 10px;">Menu</small>
            <ul class="nav nav-pills flex-column mb-auto">
                <li class="nav-item mb-1">
                    <a href="" class="nav-link active bg-white-50 text-white fw-bold" style="background-color: rgba(255,255,255,0.1);">
                        <i class="bi bi-grid-fill me-2"></i> Dashboard
                    </a>
                </li>
                
                <small class="text-white-50 fw-bold ps-2 mt-4 mb-2 text-uppercase" style="font-size: 10px;">Items Data</small>
                <li class="mb-1">
                    <a href="{{route('category')}}" class="nav-link text-white opacity-75">
                        <i class="bi bi-list-ul me-2"></i> Categories
                    </a>
                </li>
                <li class="mb-1">
                    <a href="{{route('items')}}" class="nav-link text-white opacity-75">
                        <i class="bi bi-pie-chart me-2"></i> Items
                    </a>
                </li>
                <li class="mb-1">
                    <a href="{{route('lendings')}}" class="nav-link text-white opacity-75">
                        <i class="bi bi-pie-chart me-2"></i> Lendings
                    </a>
                </li>

                <small class="text-white-50 fw-bold ps-2 mt-4 mb-2 text-uppercase" style="font-size: 10px;">Accounts</small>
                <li>
                    <a href="#" class="nav-link text-white d-flex justify-content-between align-items-center opacity-75">
                        <span><i class="bi bi-person me-2"></i> Users</span>
                        <i class="bi bi-chevron-right small"></i>
                    </a>
                </li>
            </ul>
        </div>

        <div class="w-100 vh-100 overflow-auto bg-light">

            
            
                
                <div class="py-4">
                    @yield('content')
                </div>
            </div>
        </div>

    </div>

</body>
</html>