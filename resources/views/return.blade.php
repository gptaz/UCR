@extends('layouts.app')
@section('content')
    <div class="container-fluid has-bg-image text-center text-white shadow-1-strong bg-image" style="background-image: url('{{asset('/images/background.jpg')}}'); background-size: cover; height: 50vh;">
        <div class="container-fluid mask p-5" style="background-color: rgba(0, 0, 0, 0.6);height: 45vh;">
            <div class="d-flex justify-content-center align-items-center h-100">
                <h1 class="">Explore UCR</h1>
            </div>
            <p>
                UTAS Computer Rental Services (UCR) provides computer rental service to staff and students in Hobart and Launceston at University of Tasmania (UTAS). To provide the timely service, it has been decided to develop a web site where staff and students can rent a computer on a short-term bas
            </p>
        </div>
    </div>
    <div class="card text-white bg-secondary my-5 py-2 text-center">
        <div class="card-body"><p class="text-white m-0"><h3>Return your computer here!</h3></div>
    </div>
    <h5 class="modal-title text-success">{{$msg}}</h5>
    <table class="table datatable table-striped">
        <thead>
        <tr>
            <th scope="col">Brand</th>
            <th scope="col">Insurance</th>
            <th scope="col">Rental Status</th>
            <th scope="col">Penalty</th>
            <th scope="col">Total Price</th>
            <th scope="col">Deposit</th>
            <th scope="col">Return</th>

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
                    <a href="{{route('returning',['id'=>$row->id])}}" ><span class="badge bg-primary">Return</span></a>
                </td>

            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
