@extends('layouts.masterpage')
@section('content')
<div class="pagetitle">
    <a href="{{route('device.create')}}" ><button type="button" class="btn btn-primary"><i class="bi bi-tv me-1"></i> New Device</button></a>
</div>
<div class="col-lg-12">
    <div class="row">

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Devices</h5>

                <!-- Table with stripped rows -->
                <table class="table datatable table-striped">
                    <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Brand</th>
                        <th scope="col">Image</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">rental Price</th>
                        <th scope="col">OS</th>
                        <th scope="col">Display Size</th>
                        <th scope="col">RAM</th>
                        <th scope="col">USB Port</th>
                        <th scope="col">HDMI Port</th>
                        <th scope="col">Edit / Remove</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($devices as $row)
                    <tr>
                        <th scope="row">{{$row->id}}</th>
                        <td>{{$row->brand}}</td>
                        @if($row->image!="")
                            <td><img src="{{asset($row->image)}}" width="150"></td>
                        @else
                            <td><img src="{{asset('/images/logo.png')}}" width="150"></td>
                        @endif
                        <td>{{$row->quantity}}</td>
                        <td>{{$row->rentalPrice}}</td>
                        <td>{{$row->OS}}</td>
                        <td>{{$row->displaySize}}</td>
                        <td>{{$row->RAM}}</td>
                        <td>{{$row->USBPort}}</td>
                        <td>{{$row->HDMIPort}}</td>
                        <td>
                            <form action="{{route('device.show', ['device' => $row->id])}}" method="get" style="display: inline;">
                                <button type="submit" class="btn btn-warning">Edit</button>
                            </form> /
                            <form action="{{route('device.destroy', ['device' => $row->id])}}" method="post" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
                <!-- End Table with stripped rows -->

            </div>
        </div>


    </div>

</div>

@endsection
