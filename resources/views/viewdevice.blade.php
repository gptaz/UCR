@extends('layouts.app')
@section('content')
    <section class="card bg-light text-light text-center">
        <div class="container-fluid">
            <img src="{{asset('/images/new.jpg')}}" class="d-block w-100" alt="...">
            <div class="card-img-overlay">
                <h1 class="display-3 card-title p-2">{{$device->brand}} Computer Detail</h1>
                <h5 class="card-text p-3">Start your rent today!</h5>
            </div>
    </section>
    <!-- Call to Action-->
    <div class="card text-white bg-secondary my-5 py-2 text-center">
        <div class="card-body"><p class="text-white m-0"><h3>Start your computer journey with UCR!</h3></p></div>
    </div>
    <div class="container">
        <div class="row">
            <h5 class="modal-title text-success">{{$msg}}</h5>
            <div class="col-9"><h4>Rent a {{$device->brand}} Computer</h4></div>
            <div class="col-6"><img src="{{asset($device->image)}}" class="card-img" ><b>Work smart</b><br>{{$device->description}}</div>
            <div class="col-6"><br><h5>Intelligent collaboration</h5><br>Display size : {{$device->displaySize}}<br>
                Operating System : {{$device->OS}}
                <br>RAM : {{$device->RAM}}
                <br>USB Port : {{$device->USBPort}}<br>HDMI Port : {{$device->HDMIPort}}<br>
                Rental Price : ${{$device->rentalPrice}}
                <br>
                <br>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">Rent A Device</button>
            </div>
        </div>
    </div>
    <div class="modal" id="myModal" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header-->
                <div class="modal-header">
                    <h5 class="modal-title">Rent A Device</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <!--Modal Body-->
                <form action="{{route('rental.store')}}" method="POST">
                    @csrf
                <div class="modal-body">

                        <div class="form-group">
                            <label for="Special-requirement">Deposit fee</label>
                            <input type="text" class="form-control"  id="Special-requirement" value="$50" disabled>
                            <input type="text" name="deviceID" value="{{$device->id}}" hidden>
                        </div>
                        <div class="form-group">
                            <label for="duration">Hire Duration</label>
                            <select class="form-control" name="duration" id="duration">
                                <option value="1" selected>1h</option>
                                <option value="1.5">1h30</option>
                                <option value="2">2h</option>
                                <option value="2.5">2h30</option>
                                <option value="3">3h</option>
                                <option value="3.5">3h30</option>
                                <option value="4">4h</option>
                                <option value="4.5">4h30</option>
                                <option value="5">5h</option>

                            </select>
                        </div>
                        <div class="form-group form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" name="insurance" checked>
                            <label class="form-check-label" for="flexSwitchCheckChecked">Insurance</label>
                        </div>
                        <div class="form-group">
                            <label for="campus">Discount : {{Auth::user()->discount}}%</label>

                        </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Rent</button>
                </div>
                </form>
            </div>
        </div>
    </div>
@endsection
