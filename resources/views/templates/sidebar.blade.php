<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Inventaris</title>

    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
    <script src="{{  asset('/assets/js/bootstrap.bundle.min.js') }}"></script>
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
                    <a href="" class="nav-link text-white opacity-75">
                        <i class="bi bi-list-ul me-2"></i> Categories
                    </a>
                </li>
                <li class="mb-1">
                    <a href="" class="nav-link text-white opacity-75">
                        <i class="bi bi-pie-chart me-2"></i> Items
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
            
            <nav class="navbar navbar-dark p-4 shadow-sm" style="background-image: url('{{ asset('/assets/images/wikrama.jpg') }}'); background-size: cover; background-position: center; min-height: 200px;">
                <div class="container-fluid align-items-start text-white">
                    <div class="d-flex align-items-center">
                        <i class="bi bi-list fs-3 me-3"></i>
                        <img src="/assets/images/logo wk.webp" width="40" height="40" class="me-2 rounded-circle border border-2 border-warning">
                        <h5 class="mb-0 fw-bold">Welcome Back,  Wikrama</h5>
                    </div>
                    <div class="fw-bold">
                        14 January, 2023
                    </div>
                </div>
            </nav>

            <div class="container-fluid mt-n5 px-4" style="margin-top: -30px;">
                <div class="card border-0 shadow-sm p-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <span>Check menu in sidebar</span>
                        
                        <div class="dropdown">
                            <a href="#" class="d-flex align-items-center text-decoration-none text-dark dropdown-toggle" data-bs-toggle="dropdown">
                                <i class="bi bi-person-circle fs-3 me-2"></i>
                                <span>role Wikrama</span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end shadow border-0">
                                <li><a class="dropdown-item" href="#"><i class="bi bi-box-arrow-right me-2"></i>Logout</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                
                <div class="py-4">
                    @yield('content')
                </div>
            </div>
        </div>

    </div>

</body>
</html>