<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="icon" type="image/x-icon" href="assets/img/logoweb.png" />
    <title>Dashboard Asma's Bakery</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="styledashboard/css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="/dashboard">Asma's Bakery</a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i
                class="fas fa-bars"></i></button>
        <!-- Navbar Search-->
        <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
            @csrf
            <div class="input-group">
                <form >
                <input class="form-control" type="search" placeholder="Search for..." aria-label="Search for..."
                    aria-describedby="btnNavbarSearch" />
                <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i
                        class="fas fa-search"></i></button>
            </div>
        </form>
         <!-- Navbar-->
         <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li>
                            <a class="dropdown-item" href="/dashprofile">
                                {{ Auth::user()->name }} - {{ Auth::user()->roles }}
                            </a>
                        </li>
                        <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li>
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="dropdown-item">Logout</button>
                            </form>
                        </li>
                    </ul>
                </li>
                </ul>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark active" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">User Interfaces</div>
                        <a class="nav-link" href="{{ route('user.index') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-user-alt"></i></div>
                            User
                        </a>
                        <div class="sb-sidenav-menu-heading">Categories</div>
                        <a class="nav-link" href="{{ route('product_categories.index') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-list-alt"></i></div>
                            Product Categories
                        </a>
                        <a class="nav-link" href="{{ route('discount_categories.index') }}">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-percent"></i></div>
                            Discount Categories
                        </a>
                        <div class="sb-sidenav-menu-heading">Buyer</div>
                        <a class="nav-link" href="{{ route('orders.index') }}">
                            <div class="sb-nav-link-icon"><i class="fa-brands fa-jedi-order"></i></div>
                            Orders
                        </a>
                        <a class="nav-link" href="{{ route('customers.index') }}">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-person-military-pointing"></i></div>
                            Customers
                        </a>
                        <a class="nav-link" href="{{ route('payments.index') }}">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-money-bill"></i></i></div>
                            Payments
                        </a>
                        <a class="nav-link" href="{{ route('order_details.index') }}">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-circle-info"></i></div>
                            Order Details
                        </a>
                        <div class="sb-sidenav-menu-heading">Data</div>
                        <a class="nav-link" href="{{ route('deliveries.index') }}">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-truck"></i></i></i></div>
                            Deliveries
                        </a>
                        <a class="nav-link" href="{{ route('product.index') }}">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-cake-candles"></i></div>
                            Product
                            <a class="nav-link" href="{{ route('discount.index') }}">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-tags"></i></i></div>
                                Discount
                            </a>
                            <a class="nav-link" href="{{ route('product_reviews.index') }}">
                                <div class="sb-nav-link-icon"><i class="fa-regular fa-note-sticky"></i></i></i></div>
                                Product Reviews
                            </a>
                            <a class="nav-link" href="{{ route('whislist.index') }}">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-notes-medical"></i></i></i></div>
                                Whislist
                            </a>
                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">Logged in as:</div>
                    Asma's Bakery
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Page Landing Page Data</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Product</li>
            </ol>
           
                    <div class="card">
                        <div class="card-body overflow-auto">
                            <table class="table table-hover table-bordered" id="users">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Title</th>
                                        <th>Subtitle</th>
                                        <th>Description</th>
                                        <th>Image</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($editlp as $idx => $data)
                                        <tr>
                                            <td>{{ $idx + 1 }}.</td>
                                            <td>{{ $data->title }}</td>
                                            <td>{{ $data->subtitle }}</td>
                                            <td>{{ $data->description }}</td>
                                            <td>
                                                <img src="{{ asset('storage/' . $data->image) }}" class="img-thumbnail" alt="Image">
                                            </td>
                                            <td>
                                                <div class="btn-group me-2">
                                                    <a href="{{ route('editlp.edit', $data->id) }}" class="btn btn-primary btn-sm">Ubah</a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </main>

    <footer class="py-4 bg-light mt-auto">
        <div class="container-fluid px-4">
            <div class="d-flex align-items-center justify-content-between small">
                <div class="text-muted">Copyright &copy; Asma's Bakery</div>
            </div>
        </div>
    </footer>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <script src="/js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <!-- <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js"
        crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>
    @include('sweetalert::alert')
</body>
<input type="hidden" id="sts" class="form-control"
    value="@isset($status){{ $status }}@endisset" />
<input type="hidden" id="psn" class="form-control"
    value="@isset($status){{ $pesan }}@endisset" />
<script>
    const sts = document.getElementById("sts")
    const psn = document.getElementById("psn")

    function pesan_simpan() {
        if (sts.value === "simpan")
            swal("Good Job!", psn.value, "pesan")
    } {
        body.onload = function() {
            pesan_simpan()
        }
    }
</script>

</html>
