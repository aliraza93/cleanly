@extends('layouts.admin')
@section('title', 'Cleanly | Timing Overrides')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h1 class="m-0 text-dark">No of Cleaning Service</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ url('/admin') }}">Home</a></li>
                <li class="breadcrumb-item active">No of Cleaning Service</li>
            </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row clearfix">
        	
                <add-timing-service></add-timing-service>
    
            </div>
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                        <!--     <h2>
                                Company List
                          
                            </h2> -->
                          
                          <h2>
                          	 <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add-cleaning-service">
                                <i class="glyphicon glyphicon-plus"></i> Add Number of Cleaning Services
                             </button>
                          </h2>
                        </div>

                        <view-timings-service></view-timings-service>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('script')

<script type="text/javascript" src="{{ url('js/rates.js') }}"></script>

@endpush