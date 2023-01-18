@extends('layouts.masterpage')
@section('content')
    <div class="pagetitle">
        <h1>Add New Staff</h1>
        <h6 class="card-title border-success border-1 text-success">{{$msg}}</h6>
    </div><!-- End Page Title -->
    <section class="section profile">
        <div class="row">
            <div class="col-xl-4">
                <div class="card">
                    <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                        <img src="{{asset('/images/logo.png')}}" alt="Profile" class="rounded-circle">
                    </div>
                </div>

            </div>

            <div class="col-xl-8">

                <div class="card">
                    <div class="card-body pt-3">
                        <!-- Bordered Tabs -->
                        <ul class="nav nav-tabs nav-tabs-bordered">

                            <li class="nav-item">
                                <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Staff Information</button>
                            </li>

                        </ul>
                        <div class="tab-content pt-2">

                            <div class="tab-pane fade show active profile-overview" id="profile-overview">
                                <!-- Profile Edit Form -->
                                <form action="{{route('staff.store')}}" method="POST">
                                    @csrf
                                    <div class="row mb-3">
                                        <label  class="col-md-4 col-lg-3 col-form-label">First Name</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input  type="text" class="form-control" name="firstname" required value="">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label  class="col-md-4 col-lg-3 col-form-label">Last Name</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input type="text" class="form-control" name="lastname" required value="">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label  class="col-md-4 col-lg-3 col-form-label">Phone</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input type="number" class="form-control" name="phone" minlength="8" maxlength="10" required value="">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label  class="col-md-4 col-lg-3 col-form-label">Email</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input type="email" class="form-control" name="email" required value="">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label  class="col-md-4 col-lg-3 col-form-label">Password</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input type="password" class="form-control" name="password" required value="">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label  class="col-md-4 col-lg-3 col-form-label">Confirm Password</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input type="password" class="form-control" name="password_confirmation" required value="">
                                        </div>
                                    </div>


                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary">Add Staff</button>
                                    </div>
                                </form><!-- End Profile Edit Form -->

                            </div>

                        </div><!-- End Bordered Tabs -->

                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
