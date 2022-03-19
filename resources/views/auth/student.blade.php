<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords"
        content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 5 admin, bootstrap 5, css3 dashboard, bootstrap 5 dashboard, Monsterlite admin bootstrap 5 dashboard, frontend, responsive bootstrap 5 admin template, Monster admin lite design, Monster admin lite dashboard bootstrap 5 dashboard template">
    <meta name="description"
        content="Monster Lite is powerful and clean admin dashboard template, inpired from Bootstrap Framework">
    <meta name="robots" content="noindex,nofollow">
    <title>UOK Project</title>
    <link rel="canonical" href="https://www.wrappixel.com/templates/monster-admin-lite/" />
    <!-- Favicon icon -->
    <link rel="shortcut icon" href="{{ asset('home/images/favicon.png') }}" type="image/png">
    <!-- Custom CSS -->
    <link href="{{ asset('assets/plugins/chartist/dist/chartist.min.css') }}" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{ asset('css/style.min.css') }}" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />


    <!-- include summernote css/js -->

    <!-- Include stylesheet -->
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">



    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->


    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>

<![endif]-->
</head>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->

        {{-- Header --}}


        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->

        {{-- Sidebar --}}

        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="container align-self-center">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb" style="padding-bottom: 0;
            margin-bottom: 0;">
                <div class="row align-items-center">
                    <div class=" col-md-6 offset-md-3 align-self-center">
                        <h3 class="page-title mb-0 p-0">Dashboard</h3>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Register</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <div class="col-md-6 col-4 align-self-center">
                        <div class="text-end upgrade-btn">

                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container">
                {{-- Contetnt --}}

                <div class="container">
                    <!-- ============================================================== -->
                    <!-- Start Page Content -->
                    <!-- ============================================================== -->
                    <!-- Row -->
                    <div class="row">
                        <!-- Column -->

                        <!-- Column -->
                        <!-- Column -->
                        <div class="col-lg-8 offset-lg-2 col-xlg-9 col-md-7">
                            <div class="card">
                                <div class="card-body">
                                    @include("errors._errors")
                                    <form class="form-horizontal form-material mx-2" id="FormID" method="post"
                                        action="{{ route('registersave') }}" enctype="multipart/form-data">
                                        @csrf
                                        @method('POST')
                                        <input type="hidden" name="uok_id" value="{{$username}}">
                                        <div class="form-group">
                                            <label class="col-md-12 mb-0">First Name</label>
                                            <div class="col-md-12">
                                                <input type="text" name="Firstname" placeholder="First name"
                                                    class="form-control ps-0 form-control-line" value="">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-12 mb-0">Last Name</label>
                                            <div class="col-md-12">
                                                <input type="text" name="Lastname" placeholder="Last name"
                                                    class="form-control ps-0 form-control-line">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="example-email" class="col-md-12">Email</label>
                                            <div class="col-md-12">
                                                <input type="email" placeholder="student@uok.com"
                                                    class="form-control ps-0 form-control-line" name="email"
                                                    id="example-email">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-12 mb-0">Password</label>
                                            <div class="col-md-12">
                                                <p class="text-warning" style="margin-top: 3px">Minimum eight characters, at least one uppercase letter, one lowercase letter, one number and one special character</p>
                                                <input type="password" name="password" value="password"
                                                    class="form-control ps-0 form-control-line" autocomplete="false">
                                            </div>
                                        </div>
                                        {{-- image --}}
                                        <div class="form-group">
                                            <label for="img_path">Image</label>
                                            <input type="file" class="form-control-file" name="img_path"
                                                value="{{old('img_path')}}" id="img_path" placeholder=""
                                                aria-describedby="fileHelpId">
                                        </div>
                                        <div class="form-group">
                                            <label for="About" class="col-md-12 mb-0">About</label>
                                            <div class="col-md-12">
                                                <textarea id="" name="About" id="About"
                                                    class="form-control col-lg-8"> </textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="category" class="control-label col-lg-2">Collegue <span
                                                    class="required"></span></label>
                                            <div class="col-lg-9">
                                                <select name="collegue_id" class="form-control">
                                                    <option value="">Please select value</option>
                                                    @foreach ($collegues as $item)
                                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-12 mb-0">Address</label>
                                            <div class="col-md-12">
                                                <input type="text" name="Address" placeholder="Damas 011"
                                                    class="form-control ps-0 form-control-line">
                                            </div>
                                        </div>
                                        <div class="form-group row  ">
                                            <label for="address" class="col-md-12 mb-0">Gender</label>
                                            <div class="col-md-12">
                                                <select name="Gender" class="form-control" id="Gender">
                                                    <option value="male">Male</option>
                                                    <option value="female">Female</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-12 mb-0">Reg Year</label>
                                            <div class="col-md-12">
                                                <input type="year" name="RegYeer" placeholder="2021"
                                                    class="form-control ps-0 form-control-line">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-12 mb-0">Phone No</label>
                                            <div class="col-md-12">
                                                <input type="text" name="mobileNo" placeholder="123 456 7890"
                                                    class="form-control ps-0 form-control-line">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-12 d-flex">
                                                <button class="btn btn-primary mx-auto mx-md-0 text-white">Save
                                                    Profile</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- Column -->
                    </div>
                    <!-- Row -->
                    <!-- ============================================================== -->
                    <!-- End PAge Content -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- Right sidebar -->
                    <!-- ============================================================== -->
                    <!-- .right-sidebar -->
                    <!-- ============================================================== -->
                    <!-- End Right sidebar -->
                    <!-- ============================================================== -->
                </div>


            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->

            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->


    <script src="{{ asset('assets/plugins/jquery/dist/jquery.min.js') }}"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="{{ asset('assets/plugins/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/app-style-switcher.js') }}"></script>
    <!--Wave Effects -->
    <script src="{{ asset('js/waves.js') }}"></script>
    <!--Menu sidebar -->
    <script src="{{ asset('js/sidebarmenu.js') }}"></script>
    <!--Custom JavaScript -->
    <script src="{{ asset('js/custom.js') }}"></script>
    <!--This page JavaScript -->
    <!--flot chart-->
    <script src="{{ asset('assets/plugins/flot/jquery.flot.js') }}"></script>
    <script src="{{ asset('assets/plugins/flot.tooltip/js/jquery.flot.tooltip.min.js') }}"></script>
    <script src="{{ asset('js/pages/dashboards/dashboard1.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <!-- Include the Quill library -->
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>

    <!-- Initialize Quill editor -->
    <script>
        var quill = new Quill('#editor', {
  placeholder: 'Compose an epic...',
  theme: 'snow'
});
var form = document.getElementById("FormID"); // get form by ID
form.onsubmit = function() { // onsubmit do this first
    var name = document.querySelector('input[name=About]'); // set name input var
    name.value = JSON.stringify(quill.getContents()); // populate name input with quill data
    return true; // submit form
}

    </script>

    <script>
        var quill2 = new Quill('#editor2', {
    placeholder: 'Compose an epic...',
    theme: 'snow'
    });
        // FormProject
    var form2 = document.getElementById("FormProject"); // get form by ID
    form2.onsubmit = function() { // onsubmit do this first
        var name = document.querySelector('input[name=overview]'); // set name input var
        name.value = JSON.stringify(quill2.getContents()); // populate name input with quill data
        return true; // submit form
    };
    </script>
    @yield('script')
    <script>
        $(document).ready(function() {
    $('.js-example-basic-multiple').select2();
});
    </script>

</body>

</html>
