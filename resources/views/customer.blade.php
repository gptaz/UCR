@extends('layouts.masterpage')
@section('content')
    <div class="pagetitle">

    </div>
    <div class="col-lg-12">
        <div class="row">

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Customer</h5>

                    <!-- Table with stripped rows -->
                    <table class="table datatable table-striped">
                        <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Email</th>
                            <th scope="col">Full Name</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Balance</th>
                            <th scope="col">Blacklist</th>
                            <th scope="col">Discount</th>
                            <th scope="col" <?php if(Auth::user()->accesslevel!=1) echo "hidden";?>>Reset blacklist</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($customers as $row)
                        <tr>
                            <th scope="row">{{$row->id}}</th>
                            <td>{{$row->email}}</td>
                            <td>{{$row->firstname}} {{$row->lastname}}</td>
                            <td>{{$row->phone}}</td>
                            <td>{{$row->balance}}</td>
                            <td>
                                @if($row->blacklist<=3)
                                    <span class="badge bg-success">No</span>
                                @else
                                    <span class="badge bg-danger">Blacklist</span>
                                @endif
                            </td>
                            <td>{{$row->discount}}%</td>
                            <td <?php if(Auth::user()->accesslevel!=1) echo "hidden";?>>
                                @if($row->blacklist>3)
                                    <form method="post" action="{{route('customer.update',['customer' => $row->id])}}">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="btn btn-primary">Reset</button>
                                    </form>

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
