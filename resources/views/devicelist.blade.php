@extends('layouts.app')
@section('content')
    <!-- Page Content-->

    <div class="container px-4 px-lg-5">
        <!-- Heading Row-->
        <div class="row gx-4 gx-lg-5 align-items-center my-5">
            <div class="col-lg-7"><img class="img-fluid rounded mb-4 mb-lg-0" src="{{asset('/images/background.jpg')}}" alt="..." /></div>
            <div class="col-lg-5">
                <h1 class="font-weight-light">Find Your Rental Laptop Now</h1>
                <p>UTAS Computer Rental Service is aimed to provide short-term computer rental to UTAS students and staff who study or work in Hobart and Launceston campus.</p>

            </div>
        </div>
        <!-- Call to Action-->
        <div class="card text-white bg-secondary my-5 py-2 text-center">
            <div class="card-body"><p class="text-white m-0"><h3>Find your favorite computer!</h3></div>
        </div>
        <!-- Content Row-->
        <?php
        $i=0;
        function custom_echo($x, $length)
        {
            if(strlen($x)<=$length)
            {
                echo $x;
            }
            else
            {
                $y=substr($x,0,$length) . '...';
                echo $y;
            }
        }
        foreach($devices as $row){
            if($i%2==0) echo '<div class="row gx-4 gx-lg-5">';
        ?>
        <div class="col-md-5">
            <div class="card h-100">
                <div class="card-body">
                    <div class="col-lg-7"><img class="img-responsive img-rounded" src="{{asset($row->image)}}" width="320" height="200" /></div>
                    <h3 class="card-title">{{$row->brand}}</h3>
                    <p class="card-text"><b>Description:</b> {{custom_echo($row->description,60)}}</p>
                </div>
                <div class="card-footer"><a class="btn btn-primary btn-sm" href="{{route('view.show',['view' => $row->id])}}">More Info</a></div>
            </div>
        </div>
        <?php
        if($i%2!=0) echo '</div><br>';
        $i++;
        }
        if($i%2!=0) echo '</div><br>';
        ?>
        {{$devices->links()}}


    </div>
@endsection
