@extends('layouts.masterpage')
@section('content')
    <div class="pagetitle">
        <a href="{{route('staff.create')}}" ><button type="button" class="btn btn-primary"><i class="bi bi-person-plus-fill me-1"></i> New Staff</button></a>
    </div>
    <div class="col-lg-12">
        <div class="row">

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Staff</h5>

                    <!-- Table with stripped rows -->
                    <table class="table datatable table-striped">
                        <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Email</th>
                            <th scope="col">Full Name</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Role</th>
                            <th scope="col">Remove</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($staff as $row)
                        <tr>
                            <th scope="row">{{$row->id}}</th>
                            <td>{{$row->email}}</td>
                            <td>{{$row->firstname}} {{$row->lastname}}</td>
                            <td>{{$row->phone}}</td>
                            @if($row->accesslevel==2)
                            <td><span class="badge bg-success">Staff</span></td>
                            @endif
                            @if($row->accesslevel==1)
                                <td><span class="badge bg-primary">UCR Staff</span></td>
                            @endif
                            <td>
                                @if($row->accesslevel==2)
                                    <form action="{{route('staff.destroy', ['staff' => $row->id])}}" method="post" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
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
