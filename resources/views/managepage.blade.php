@extends('layouts.masterpage')
@section('content')
<div class="col-lg-12">
    <div class="row">
        <!-- Sales Card -->
        <div class="col-xxl-6 col-md-6">
            <div class="card info-card sales-card">
                <?php
                    $device = \Illuminate\Support\Facades\DB::table('devices')
                                                            ->select(DB::raw('SUM(quantity) as totaldevices'))
                                                            ->get();
                    $user = \Illuminate\Support\Facades\DB::table('users')
                                                            ->where('blacklist', '>', 3)
                                                            ->count();
                ?>
                <div class="card-body">
                    <h5 class="card-title">Devices <span>| Total</span> </h5>

                    <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                            <i class="bi bi-display"></i>
                        </div>
                        <div class="ps-3">
                            @foreach($device as $row)
                            <h6>{{$row->totaldevices}}</h6>
                            @endforeach
                        </div>
                    </div>
                </div>

            </div>
        </div><!-- End Sales Card -->
        <!-- Customers Card -->
        <div class="col-xxl-6 col-xl-12">

            <div class="card info-card customers-card">

                <div class="card-body">
                    <h5 class="card-title">Customers <span>| Blacklist</span> </h5>

                    <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                            <i class="bi bi-emoji-frown-fill"></i>
                        </div>
                        <div class="ps-3">
                            <h6>{{$user}}</h6>


                        </div>
                    </div>

                </div>
            </div>

        </div><!-- End Customers Card -->
        <!-- Reports -->
        <div class="col-12">
            <div class="card">

                <div class="card-body">
                    <h5 class="card-title">Users</h5>

                    <!-- Pie Chart -->
                    <canvas id="pieChart" style="max-height: 400px;"></canvas>
                    <?php
                    $staff = \Illuminate\Support\Facades\DB::table('users')
                                                            ->where('accesslevel', '2')
                                                            ->count();
                    $student = \Illuminate\Support\Facades\DB::table('users')
                                                            ->where('accesslevel', '3')
                                                            ->count();
                    $urcstaff = \Illuminate\Support\Facades\DB::table('users')
                                                            ->where('accesslevel', '1')
                                                            ->count();
                    $ongoing = \Illuminate\Support\Facades\DB::table('rentals')
                                                            ->where('rentalStatus', '0')
                                                            ->count();
                    $confirming = \Illuminate\Support\Facades\DB::table('rentals')
                                                            ->where('rentalStatus', '1')
                                                            ->count();
                    $finished = \Illuminate\Support\Facades\DB::table('rentals')
                                                            ->where('rentalStatus', '2')
                                                            ->count();
                    ?>
                    <script>
                        document.addEventListener("DOMContentLoaded", () => {
                            new Chart(document.querySelector('#pieChart'), {
                                type: 'pie',
                                data: {
                                    labels: [
                                        'Student',
                                        'Staff',
                                        'URC Staff'
                                    ],
                                    datasets: [{
                                        label: 'Dataset',
                                        data: [{{$student}}, {{$staff}},{{$urcstaff}}],
                                        backgroundColor: [
                                            'rgb(255, 99, 132)',
                                            'rgb(54, 162, 235)',
                                            'rgb(255, 205, 86)'
                                        ],
                                        hoverOffset: 4
                                    }]
                                }
                            });
                        });
                    </script>
                    <!-- End Pie CHart -->


                </div>

            </div>
        </div>
        <!-- End report -->
        <!-- start -->
        <div class="col-12">
            <div class="card">

                <div class="card-body">
                    <h5 class="card-title">Rental/Orders</h5>
                    <!-- Bar Chart -->
                    <canvas id="barChart" style="max-height: 400px;"></canvas>
                    <script>
                        document.addEventListener("DOMContentLoaded", () => {
                            new Chart(document.querySelector('#barChart'), {
                                type: 'bar',
                                data: {
                                    labels: ['On Going', 'Confirming', 'Finished'],
                                    datasets: [{
                                        label: 'OrderChart',
                                        data: [{{$ongoing}},{{$confirming}},{{$finished}}],
                                        backgroundColor: [
                                            'rgba(255, 99, 132, 0.2)',
                                            'rgba(255, 205, 86, 0.2)',
                                            'rgba(75, 192, 192, 0.2)'
                                        ],
                                        borderColor: [
                                            'rgb(255, 99, 132)',
                                            'rgb(255, 205, 86)',
                                            'rgb(75, 192, 192)'
                                        ],
                                        borderWidth: 1
                                    }]
                                },
                                options: {
                                    scales: {
                                        y: {
                                            beginAtZero: true
                                        }
                                    }
                                }
                            });
                        });
                    </script>
                    <!-- End Bar CHart -->
                </div>
            </div>
        </div>
        <!-- End -->

    </div>

</div>
@endsection
