@extends('layouts.masterpage')
@section('content')
    <div class="col-lg-12">
        <div class="row">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Confirm Rental Status</h5>

                    <!-- General Form Elements -->
                    <form method="post" action="{{route('rental.update',['rental' => $rental->id])}}">
                        @csrf
                        @method('PUT')
                        <div class="row mb-3">

                            <?php
                            $user = \App\Models\User::find($rental->userID);
                            $device = \App\Models\Device::find($rental->deviceID);
                            ?>
                            <div class="col-lg-3 col-md-4 label ">Full Name</div>
                            <div class="col-lg-9 col-md-8">{{$user->firstname." ".$user->lastname}}</div>
                        </div>
                        <div class="row mb-3">
                                <div class="col-lg-3 col-md-4 label ">Brand</div>
                                <div class="col-lg-9 col-md-8">{{$device->brand}}</div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-lg-3 col-md-4 label ">Insurance</div>
                            <div class="col-lg-9 col-md-8">
                                @if($rental->insurance!=0)
                                    <span class="badge bg-success">Yes</span>
                                @else
                                    <span class="badge bg-danger">No</span>
                                @endif
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-lg-3 col-md-4 label ">Damage Status</div>
                            <div class="col-lg-9 col-md-8">
                                <select class="form-control" name="damageStatus">
                                    <option value="0" selected>No Damage</option>
                                    <option value="1">Minor Damage</option>
                                    <option value="2">Major Damage</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-lg-3 col-md-4 label ">Details</div>
                            <div class="col-lg-9 col-md-8"><textarea type="text" class="form-control" id="description" name="details" > </textarea>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label"></label>

                            <div class="col-sm-10">
                                <a href="{{route('rental.index')}}" ><button type="button" class="btn btn-secondary">Back</button></a>
                                <button type="submit" class="btn btn-primary">Confirm</button>
                            </div>
                        </div>

                    </form><!-- End General Form Elements -->

                </div>
            </div>
        </div>
    </div>
@endsection
