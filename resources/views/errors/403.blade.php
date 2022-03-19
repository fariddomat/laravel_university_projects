@extends('layouts.app')

@section('content')

<div class="error-box">
    <div class="error-body text-center">
        <h1 class="error-title">403</h1>
        <h3 class="text-uppercase error-subtitle">User not logged in or don't have permission !</h3>
        <p class="text-muted mb-4 mt-4">YOU SEEM TO BE TRYING TO FIND HIS WAY HOME</p>
        <a href="/" class="btn btn-info btn-rounded waves-effect waves-light mb-4 text-white">Back to home</a>
    </div>
    <footer class="footer text-center w-100">
        © 2021 UOK <a href="/">Project</a>
    </footer>
</div>


@endsection
