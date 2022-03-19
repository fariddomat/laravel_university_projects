@extends('layouts.app')

@section('content')

<!--====== PAGE BANNER PART START ======-->

<section id="page-banner" class="pt-105 pb-110 bg_cover" data-overlay="8"
    style="background-image: url({{asset('home/images/page-banner-1.jpg')}})">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="page-banner-cont">
                    <h2>About Us</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">About Us</li>
                        </ol>
                    </nav>
                </div> <!-- page banner cont -->
            </div>
        </div> <!-- row -->
    </div> <!-- container -->
</section>

<!--====== PAGE BANNER PART ENDS ======-->

<!--====== ABOUT PART START ======-->

<section id="about-page" class="pt-25 pb-110">
    <div class="container">
        <div class="about-items pt-25">
            <div class="row justify-content-center">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="about-singel-items mt-30">
                        <span class="">About us</span>
                    <h5 class="section-title">UOK is one of the best syrian university.</h5>

                        <pre>

    This website is Projects archive.

    Website Built using PHP/Laravel Framework

    DataBase used: MYSql

    We Compress Data :
        - use <a href="https://github.com/zanysoft/laravel-zip">https://github.com/zanysoft/laravel-zip</a> to compress files.
        - use <a href="https://github.com/Intervention/image">https://github.com/Intervention/image</a> to compress images.

    Support rapid Indexing

    Search over hundreds of projects.

    User can comment and rate projects.
        - use <a href="https://github.com/willvincent/laravel-rateable">https://github.com/willvincent/laravel-rateable</a> to manage Rating
                        </pre>
                    </div> <!-- about singel -->
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-5">
                <div class="section-title mt-50">
                    <h5>What you can do</h5>
                </div> <!-- section title -->
                <div class="about-cont">

                    <br><br>
                    <ul>Our Guests Can do the follwoing
                        <li>- View Projects (can't download if not login) !
                        </li>
                        <li>- View Students info </li>
                        <li>- View Professor info </li>
                        <li>- View Events info </li>
                        <li>- Search => Filter(name, student, professor, year, category) </li>
                    </ul>
                </div>
            </div> <!-- about cont -->
            <div class="col-lg-7">
                <div class="about-image mt-50">
                    <img src="{{ asset('home/images/about/about-2.jpg') }}" alt="About">
                </div> <!-- about imag -->
            </div>
        </div> <!-- row -->
        <br><br>
        <h4>We have 3 types of users with different Roles</h4>
        <p><br>We use <a href="https://spatie.be/docs/laravel-permission/v4/introduction">https://spatie.be/ </a> package to manage roles and premissions</p>
        <div class="about-items pt-15">
            <div class="row justify-content-center">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="about-singel-items mt-30">
                        <span class="">01 Admin</span>
                        <pre>
        - Dashboard:
            * High rated projects
            * Last approved projects
            * Counts of (students, professors, projects)
        - Manage Students : Create, Read(index =>show all, show=> show one by id), Update, Delete
        - Manage Professors : Create, Read(index =>show all, show=> show one by id), Update, Delete
        - View & download Projects
        - Upload Projects (auto approve)
        - Add Project Categories (Gradution projects, semistiers projects and years projects)
        - View projects details (Comments, Rating, Views)
        - Manage Comments
        - Search => Filter(name, student, professor, year, category)
                        </pre>
                    </div> <!-- about singel -->
                </div>
                <div class="col-lg-12 col-md-12 col-sm-10">
                    <div class="about-singel-items mt-30">
                        <span>02 Professor</span>
                        <pre>
        - Dashboard:
            * High rated projects (for this professor)
            * Pending Projects to approve
            * Counts of (projects)
        - View & download Projects and students info
        - Manage his projects :
            * Create, Read(index =>show all, show=> show one by id), Update, Delete
            * Approve (Set grades) or Reject Projects
        - Upload Projects (auto approve)
        - Add comments and rates
        - Manage Comments
        - Search => Filter(name, student, professor, year, category)
                        </pre>
                    </div> <!-- about singel -->
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="about-singel-items mt-30">
                        <span>03 Students</span>
                        <pre>
        - Dashboard:
            * Pending Projects to approve
            * Approved projects notifications
            * Counts of (projects)
        - Manage Projects : Create, Read(index =>show all, show=> show one by id), Update, Delete(before approve or reject)
        - Student can upload projects and select partners (They get notifications and their is no need to re-upload same project)
        - View & download Projects and students info
        - Search => Filter(name, student, professor, year, category)
                        </pre>
                    </div> <!-- about singel -->
                </div>


                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="about-singel-items mt-30">
                        <br><br><span>Projects Details</span>
                        <ul>
                           <li>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; - Overview</li>
                            <li>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; - Cover (Optional)</li>
                            <li>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; - Project pdf or word (Versions [complete - inComplete])</li>
                            <li>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; - Presentation ppt (Versions [complete - inComplete])</li>
                            <li>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; - Code Files</li>
                            <li>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; - Github url (Optional)</li>
                            <li>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; - Host url (Optional)</li>
                        </ul>
                    </div> <!-- about singel -->
                </div>
            </div> <!-- row -->
        </div> <!-- about items -->
    </div> <!-- container -->
</section>


<!--====== COUNTER PART START ======-->

<div id="counter-part" class="bg_cover pt-65 pb-110" data-overlay="8" style="background-image: url(images/bg-2.jpg)">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-sm-6">
                <div class="singel-counter text-center mt-40">
                    <span><span class="counter">{{$projects}}</span>+</span>
                    <p>Projects Uploaded</p>
                </div> <!-- singel counter -->
            </div>
            <div class="col-lg-4 col-sm-6">
                <div class="singel-counter text-center mt-40">
                    <span><span class="counter">{{$students}}</span>+</span>
                    <p>Students enrolled</p>
                </div> <!-- singel counter -->
            </div>
            <div class="col-lg-4 col-sm-6">
                <div class="singel-counter text-center mt-40">
                    <span><span class="counter">{{$professors}}</span>+</span>
                    <p>Global Teachers</p>
                </div> <!-- singel counter -->
            </div>
        </div> <!-- row -->
    </div> <!-- container -->
</div>

<section id="about-page" class="pt-25 pb-110">
    <div class="container">
        <div class="about-items pt-25">
            <div class="row justify-content-center">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="about-singel-items mt-30">
                        <br><br><span>Apply for project:</span>
                        <pre>
        - Fill the form #
        - Need to approve by :  (pending)
            - Professor 1 (pending1)
            - HeadOfDepartment 2 (pending2)
            - DeanVice 3 (pending3)
            - Dean 4 (approved)
        - When approved : Add to Upcoming events
        - When upload the project change status to (published)
        - The professor change status to [completed, incompleted, rejected]
            - If incompleted :
                - Need to approved again from the HeadOfDepartment (approved2)
                - When upload the project change status to (published2)
                - When approved : Add to upcoming seminars (completed)
            - If completed : Add to last projects Section

                        </pre>
                    </div> <!-- about singel -->
                </div>
            </div> <!-- row -->
        </div> <!-- about items -->


        <div class="about-items pt-15">
            <div class="row justify-content-center">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="about-singel-items mt-30">
                        <br><br><span>Register Student:</span>
                        <pre>
        - Register Student:

            - Send request to the moodel
                    - If approved send to register page to fill his info
                    - If not : Error 403 not authorized

        - We use <a href="https://packagist.org/packages/guzzlehttp/guzzle">https://packagist.org/packages/guzzlehttp/guzzle</a> to connect to UOK Moodle.
                        </pre>
                    </div> <!-- about singel -->
                </div>
            </div> <!-- row -->
        </div> <!-- about items -->
    </div> <!-- container -->
</section>
<!--====== COUNTER PART ENDS ======-->
@endsection
