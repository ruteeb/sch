@extends('admin.layouts.app')

@section('title')
    Oranje Ster
@stop
@section('content')
    <div class="page-content">
        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                    <a href="{{ url('admin/home') }}">Home</a>
                </li>
            </ul>
        </div>
        <!-- END PAGE BAR -->
        <!-- BEGIN PAGE TITLE-->
        <h3 class="page-title"> Home Page
            <small>Dashboard</small>
        </h3>
        <!-- END PAGE TITLE-->

        <div class="container">
            <div class="row">

                <div class="insight">
                    <h3>Insights</h3>

                    <div class="col-lg-4 mar-bottom col-md-4 col-sm-6 col-xs-12">
                        <a class="dashboard-stat dash-section white dashboard-stat-v2" href="http://localhost/repatha/admin/howtouserepatha">
                            <div class="visual">
                                <i class="fa fa-pencil"></i>
                            </div>
                            <div class="details">
                                <div class="number">
                                    <span class="count-num" data-counter="counterup" data-value="3">3</span>
                                </div>
                                <div class="desc"> <strong>How To Use Repatha</strong> </div>
                            </div>
                        </a>
                        <a class="items-add" href="http://localhost/repatha/admin/howtouserepatha/create">
                            <div class="add-item">
                                <h4><i class="fa fa-plus"></i> Add</h4>
                            </div>
                        </a>
                    </div>

                    <div class="col-lg-4 mar-bottom col-md-4 col-sm-6 col-xs-12">
                        <a class="dashboard-stat dash-section white dashboard-stat-v2" href="http://localhost/repatha/admin/diseaseknowledge">
                            <div class="visual">
                                <i class="fa fa-pencil"></i>
                            </div>
                            <div class="details">
                                <div class="number">
                                    <span class="count-num" data-counter="counterup" data-value="18">18</span>
                                </div>
                                <div class="desc"> <strong>Disease Knowledge</strong> </div>
                            </div>
                        </a>
                        <a class="items-add" href="http://localhost/repatha/admin/diseaseknowledge/create">
                            <div class="add-item">
                                <h4><i class="fa fa-plus"></i> Add Disease Knowledge</h4>
                            </div>
                        </a>
                    </div>

                    <div class="col-lg-4 mar-bottom col-md-4 col-sm-6 col-xs-12">
                        <a class="dashboard-stat dash-section white dashboard-stat-v2" href="http://localhost/repatha/admin/productknowledge">
                            <div class="visual">
                                <i class="fa fa-pencil"></i>
                            </div>
                            <div class="details">
                                <div class="number">
                                    <span class="count-num" data-counter="counterup" data-value="1">1</span>
                                </div>
                                <div class="desc"> <strong>Product Knowledge</strong> </div>
                            </div>
                        </a>
                        <a class="items-add" href="http://localhost/repatha/admin/productknowledge/create">
                            <div class="add-item">
                                <h4><i class="fa fa-plus"></i> Add Product Knowledge</h4>
                            </div>
                        </a>
                    </div>

                    <div class="col-lg-4 mar-bottom col-md-4 col-sm-6 col-xs-12">
                        <a class="dashboard-stat dash-section white dashboard-stat-v2" href="http://localhost/repatha/admin/eatingrights">
                            <div class="visual">
                                <i class="fa fa-cutlery"></i>
                            </div>
                            <div class="details">
                                <div class="number">
                                    <span class="count-num" data-counter="counterup" data-value="1">1</span>
                                </div>
                                <div class="desc"> <strong>Eating Right</strong> </div>
                            </div>
                        </a>
                        <a class="items-add" href="http://localhost/repatha/admin/eatingrights/create">
                            <div class="add-item">
                                <h4><i class="fa fa-plus"></i> Add Eating Right</h4>
                            </div>
                        </a>
                    </div>

                    <div class="col-lg-4 mar-bottom col-md-4 col-sm-6 col-xs-12">
                        <a class="dashboard-stat dash-section white dashboard-stat-v2" href="http://localhost/repatha/admin/medicationguide">
                            <div class="visual">
                                <i class="fa fa-book"></i>
                            </div>
                            <div class="details">
                                <div class="number">
                                    <span class="count-num" data-counter="counterup" data-value="1">1</span>
                                </div>
                                <div class="desc"> <strong>Medication Guide </strong> </div>
                            </div>
                        </a>
                        <a class="items-add" href="http://localhost/repatha/admin/medicationguide/create">
                            <div class="add-item">
                                <h4><i class="fa fa-plus"></i> Add Medication Guide</h4>
                            </div>
                        </a>
                    </div>

                    <div class="col-lg-4 mar-bottom col-md-4 col-sm-6 col-xs-12">
                        <a class="dashboard-stat dash-section white dashboard-stat-v2" href="http://localhost/repatha/admin/doctorappointment">
                            <div class="visual">
                                <i class="fa fa-clock-o"></i>
                            </div>
                            <div class="details">
                                <div class="number">
                                    <span class="count-num" data-counter="counterup" data-value="1">1</span>
                                </div>
                                <div class="desc"> <strong> Doctor Appointments</strong> </div>
                            </div>
                        </a>
                        <a class="items-add" href="http://localhost/repatha/admin/doctorappointment/create">
                            <div class="add-item">
                                <h4><i class="fa fa-plus"></i> Add Doctor Appointments</h4>
                            </div>
                        </a>
                    </div>

                    <div class="clear"></div>


                </div>

            </div><!-- /.row -->
        </div><!-- /.container -->

    </div><!-- /.page-content -->
@stop