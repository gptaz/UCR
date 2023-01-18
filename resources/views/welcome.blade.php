@extends('layouts.app')
@section('content')
    <!-- Slide -->
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active" data-bs-interval="710">
                <img class="d-block w-100" src="{{asset('/images/slide/slide-1.jpg')}}" alt="First slide">
                <div class="carousel-container">
                    <div class="carousel-content">
                        <h2>Welcome to <span class="font-weight-bold text-danger">UTAS Computer Rental Services</span></h2>
                    </div>
                </div>
            </div>
            <div class="carousel-item" data-bs-interval="300">
                <img class="d-block w-100" src="{{asset('/images/slide/slide-2.jpg')}}" alt="Second slide">
                <div class="carousel-container">
                    <div class="carousel-content">
                        <h2>Welcome to <span class="font-weight-bold text-danger">UTAS Computer Rental Services</span></h2>
                    </div>
                </div>
            </div>
            <div class="carousel-item" data-bs-interval="300">
                <img class="d-block w-100" src="{{asset('/images/slide/slide-3.jpg')}}" alt="Third slide">
                <div class="carousel-container">
                    <div class="carousel-content">
                        <h2>Welcome to <span class="font-weight-bold text-danger">UTAS Computer Rental Services</span></h2>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- end slide -->
    <br>
    <div class="container">
        <div class="section-title">
            <h2>UCR Services</h2>
            <p>UTAS Computer Rental Services (UCR) provides computer rental service to staff and students in Hobart and
                Launceston at University of Tasmania (UTAS). To provide the timely service, it has been decided to develop a
                web site where staff and students can rent a computer on a short-term basis.</p>
        </div>

    </div>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <img src="{{asset('images/about.jpg')}}" class="img-fluid" alt="">
            </div>
            <div class="col-lg-6 pt-4 pt-lg-0 content">
                <h3>Supporting you to study.</h3>
                <p class="fst-italic">
                    University is about more than just preparing for a career. It's about opening the door to incredible opportunities and helping you grow, at any age, regardless of your background or circumstances.
                </p>
                <ul>
                    <li><i class="bi bi-check-circle"></i> You can apply for the lease to own program even if you don't have credit.</li>
                    <li><i class="bi bi-check-circle"></i> For rapid response to your needs, use the ink to the appropriate city contact details at left.</li>
                    <li><i class="bi bi-check-circle"></i> Delivery where you need it; and when. Our speedy delivery service extends to same day or next day.</li>
                </ul>
                <p>
                    On this page, you can find out what you'll need to pay, when, and how. We have plenty of ways to make it affordable and accessible. If you're eligible, you can receive an interest-free HELP loan, which means you don't have to pay upfront.
            </div>
        </div>
    </div>
@endsection
