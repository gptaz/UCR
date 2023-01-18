@extends('layouts.masterpage')
@section('content')
    <h6 class="card-title border-success border-1 text-success">{{$msg}}</h6>
    <div class="col-lg-12">
        <div class="row">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Add New Device</h5>

                    <!-- General Form Elements -->
                    <form method="post" action="{{route('device.store')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <label for="brand" class="col-sm-2 col-form-label">Brand</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="brand" name="brand" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="image" class="col-sm-2 col-form-label">Image</label>
                            <div class="col-sm-10">
                                <input type="file" class="form-control" id="image" name="image" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="quantity" class="col-sm-2 col-form-label">Quantity</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" id="quantity" name="quantity" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="rentalPrice" class="col-sm-2 col-form-label">Rental Price</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" id="rentalPrice" name="rentalPrice" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="OS" class="col-sm-2 col-form-label">Operation System</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="OS" name="OS" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="displaySize" class="col-sm-2 col-form-label">Display Size</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="displaySize" name="displaySize" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="RAM" class="col-sm-2 col-form-label">RAM</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="RAM" name="RAM" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="USBPort" class="col-sm-2 col-form-label">USB Port</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" id="USBPort" name="USBPort" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="HDMIPort" class="col-sm-2 col-form-label">HDMI Port</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" id="HDMIPort" name="HDMIPort" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="description" class="col-sm-2 col-form-label">Description</label>
                            <div class="col-sm-10">
                                <textarea type="text" class="form-control" id="description" name="description" required> </textarea>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label"></label>

                            <div class="col-sm-10">
                                <a href="{{route('device.index')}}" ><button type="button" class="btn btn-secondary">Back</button></a>
                                <button type="submit" class="btn btn-primary">Add New Device</button>
                            </div>
                        </div>

                    </form><!-- End General Form Elements -->

                </div>
            </div>
        </div>
    </div>

@endsection
