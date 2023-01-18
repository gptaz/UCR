@extends('layouts.app')
@section('content')
    <div class="pagetitle">
    <br>
    </div><!-- End Page Title -->
    <section class="section profile">
        <div class="row">
            <div class="col-xl-4">

                <div class="card">
                    <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

                        <img src="{{asset('/images/logo.png')}}" alt="Profile" class="rounded-circle">
                        <h2>{{$user->firstname." ".$user->lastname}}</h2>
                    </div>
                </div>

            </div>

            <div class="col-xl-8">

                <div class="card">
                    <div class="card-body pt-3">
                        <!-- Bordered Tabs -->
                        <ul class="nav nav-tabs nav-tabs-bordered">
                            <li class="nav-item">
                                <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
                            </li>
                            <li class="nav-item" >
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit" >Edit Profile</button>
                            </li>

                        </ul>
                        <div class="tab-content pt-2">

                            <div class="tab-pane fade show active profile-overview" id="profile-overview">
                                <h5 class="card-title">Profile Details</h5>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label ">Full Name</div>
                                    <div class="col-lg-9 col-md-8">{{$user->firstname." ".$user->lastname}}</div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Email</div>
                                    <div class="col-lg-9 col-md-8">{{$user->email}}</div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Phone</div>
                                    <div class="col-lg-9 col-md-8">{{$user->phone}}</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Balance</div>
                                    <div class="col-lg-9 col-md-8">$ {{$user->balance}}</div>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">Add Fund</button>
                                </div>
                            </div>

                            <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                                <!-- Profile Edit Form -->
                                <form action="{{route('profileupdate',['id'=>$user->id])}}" method="POST">
                                    @csrf
                                    <div class="row mb-3">
                                        <label  class="col-md-4 col-lg-3 col-form-label">First Name</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input  type="text" class="form-control" name="firstname" value="{{$user->firstname}}" required>
                                        </div>
                                    </div>
                                    <input  type="hidden" class="form-control" name="id" value="{{$user->id}}">
                                    <div class="row mb-3">
                                        <label  class="col-md-4 col-lg-3 col-form-label">Last Name</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input type="text" class="form-control" name="lastname" value="{{$user->lastname}}" required>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label  class="col-md-4 col-lg-3 col-form-label">Phone</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input type="text" class="form-control" name="phone" minlength="8" maxlength="10" value="{{$user->phone}}" required>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="Email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="email" type="email" class="form-control" id="Email" value="{{$user->email}}" required>
                                        </div>
                                    </div>

                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary">Save Changes</button>
                                    </div>
                                </form><!-- End Profile Edit Form -->
                            </div>
                        </div><!-- End Bordered Tabs -->

                    </div>
                </div>

            </div>
        </div>
        <div class="row">
            <div class="col-xl-4"></div>
            <div class="col-xl-8">

                <div class="card">
                    <div class="card-body pt-3">
                        <!-- Bordered Tabs -->
                        <ul class="nav nav-tabs nav-tabs-bordered">

                            <li class="nav-item">
                                <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Rentals</button>
                            </li>

                        </ul>
                        <div class="tab-content pt-2">

                            <div class="tab-pane fade show active profile-overview" id="profile-overview">

                                <?php
                                $rentals = \App\Models\Rental::where('userID',$user->id)->get();
                                ?>
                                <table class="table datatable table-striped">
                                    <thead>
                                    <tr>
                                        <th scope="col">Brand</th>
                                        <th scope="col">Insurance</th>
                                        <th scope="col">Rental Status</th>
                                        <th scope="col">Penalty</th>
                                        <th scope="col">Total Price</th>
                                        <th scope="col">Deposit</th>
                                        <th scope="col">Damage</th>
                                        <th scope="col">Details</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($rentals as $row)
                                        <?php
                                            $device = \App\Models\Device::find($row->deviceID);
                                        ?>
                                        <tr>
                                            <td scope="row">{{$device->brand}}</td>
                                            <td>
                                                @if($row->insurance!=0)
                                                    <span class="badge bg-success">Yes</span>
                                                @else
                                                    <span class="badge bg-danger">No</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if($row->rentalStatus==0)
                                                    <span class="badge bg-success">On Going</span>
                                                @elseif($row->rentalStatus==1)
                                                    <span class="badge bg-secondary">Confirming</span>
                                                @else
                                                    <span class="badge bg-primary">Finished</span>
                                                @endif
                                            </td>
                                            <td>${{$row->Penalty}}</td>
                                            <td>${{$row->totalPrice}}</td>
                                            <td>${{$row->deposit}}</td>
                                            <td>
                                                @if($row->damageStatus==0)
                                                    <span class="badge bg-success">No</span>
                                                @elseif($row->damageStatus==1)
                                                    <span class="badge bg-warning">Minor</span>
                                                @else
                                                    <span class="badge bg-primary">Major</span>
                                                @endif
                                            </td>
                                            <td>{{$row->details}}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>


                            </div>



                        </div><!-- End Bordered Tabs -->

                    </div>
                </div>

            </div>
        </div>
    </section>
    <div class="modal" id="myModal" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header-->
                <div class="modal-header">
                    <h5 class="modal-title">Add Fund</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <!--Modal Body-->
                <form action="{{route('addfund')}}">
                <div class="modal-body">
                        <div class="form-group">
                            <label for="Special-requirement">Deposit Money</label>
                            <input type="number" class="form-control"  id="Special-requirement" name="fund" required>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add Fund</button>
                </div>
                </form>
            </div>
        </div>
    </div>
@endsection

