@extends('layouts.masterpage')
@section('content')
    <div class="col-lg-12">
        <div class="row">

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Rental / Order</h5>

                    <!-- Table with stripped rows -->
                    <table class="table datatable table-striped">
                        <thead>
                        <tr>
                            <th scope="col">Customer</th>
                            <th scope="col">Brand</th>
                            <th scope="col">Insurance</th>
                            <th scope="col">Rental Status</th>
                            <th scope="col">Penalty</th>
                            <th scope="col">Total Price</th>
                            <th scope="col">Deposit</th>
                            <th scope="col">Damage</th>
                            <th scope="col">Details</th>
                            <th scope="col">Action</th>

                        </tr>
                        </thead>
                        <tbody>

                        @foreach($rentals as $row)
                            <?php
                            $device = \App\Models\Device::find($row->deviceID);
                            $user = \App\Models\User::find($row->userID);
                            ?>
                            <tr>
                                <td>{{$user->firstname}} {{$user->lastname}}</td>
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
                                <td>
                                    @if($row->rentalStatus==1)
                                        <a href="{{route('rental.show',['rental'=>$row->id])}}" ><span class="badge bg-success">Confirm order</span></a>
                                    @endif
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
