@extends('layouts.app')

@section('content')
    <div id="booking">
        <!--============================= HEADER =============================-->
        <header class="header-style2 fixed-top">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <a href="{{ url('/') }}"><img src="images/logo.png" alt="logo"></a>
                        <span>800-710-8420</span>
                    </div>
                </div>
            </div>
        </header>
        <!--//END HEADER -->
        <!--============================= BOOKING SECTION =============================-->
        <section class="booking-details center-block main-block">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h2>Book your cleaning</h2>
                        <h6>Its time to book our cleaning service for your home or apartment.</h6>
                    </div>
                </div>      
                <booking-summary></booking-summary>
            </div>
        </section>
        <!--//END BOOKING SECTION -->
        
    </div>
@endSection

