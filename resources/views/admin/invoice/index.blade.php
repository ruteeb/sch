@extends('admin.layouts.app')

@section('title')
    Invoices
@stop

@section('content')
    <div class="page-content">
        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                    <a href="{{ url('admin/home') }}">Home</a>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <a href="{{ url('admin/invoices') }}">Invoices</a>
                </li>
            </ul>
        </div>
        <!-- END PAGE BAR -->
        <!-- BEGIN PAGE TITLE-->
        <h3 class="page-title"> Invoices </h3>
        <!-- END PAGE TITLE-->

        <div class="row">
            <div class="col-md-12">

                <div>
                    @if(Session::has('success'))
                        <div class="alert alert-success">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            {{Session::get('success')}}
                        </div>
                    @endif

                    @if(Session::has('warning'))
                        <div class="alert alert-warning">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            {{Session::get('warning')}}
                        </div>
                    @endif

                    @if(count($errors) > 0)
                        <div class="alert alert-danger">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{$error}}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>

                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption font-dark">
                            <i class="icon-settings font-dark"></i>
                            <span class="caption-subject bold uppercase"> Invoices </span>
                        </div>
                    </div><!-- /.portlet-title -->

                    <div class="portlet-body">
                        <div class="table-toolbar">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="btn-group">
                                        <a href="{{ url('admin/invoices/create') }}" id="sample_editable_1_new" class="btn sbold green"> Add New
                                            <i class="fa fa-plus"></i>
                                        </a>
                                    </div><!-- /.btn-group -->
                                </div><!-- /.col-md-6 -->

                                <div class="col-md-6">
                                    <div class="btn-group pull-right">

                                    </div>
                                </div>
                            </div><!-- /.row -->
                        </div><!-- /.table-toolbar -->

                        <form action="{{ url('admin/admins/multidelete') }}" method="post">
                            {{ csrf_field() }}

                            <table class="table table-striped table-bordered table-hover order-column" id="sample_1">
                            <thead>
                            <tr>
                                <th> # </th>
                                <th> Student </th>
                                <th> Date </th>
                                <th> Value </th>
                                <th> Created By </th>
                                <th> Created at </th>
                                <th> Control </th>
                            </tr>
                            </thead>

                            <tbody>
                                @foreach($invoices as $invoice)
                                <tr>
                                    <?php $contract =  \App\Model\Contract::find($invoice->contract_id); ?>
                                    <?php $student =  \App\User::find($contract->student_id); ?>
                                    <td>{{ $invoice->id }}</td>
                                    <td>{{ $student->first_name . ' ' . $student->last_name }}</td>
                                    <td>{{ $invoice->date }}</td>
                                    <td>{{ $invoice->value }}</td>
                                    <td>{{ $invoice->username }}</td>
                                    <td>{{ $invoice->created_at->format('d M Y') }}</td>
                                    <td>
                                        <a href="{{ url('admin/invoices/'.$invoice->id.'/edit') }}" class="btn btn-info"><i class="fa fa-refresh"></i> Edit</a>
{{--                                        <a href="{{ url('admin/invoices/'.$invoice->id.'/view') }}" class="btn btn-warning"><i class="fa fa-eye"></i> View</a>--}}
                                        @if($invoice->active == 1)
                                            <a href="{{ url('admin/invoices/'.$invoice->id.'/inactive') }}" class="confirm_inactive btn btn-danger"><i class="fa fa-close"></i> Inactivation</a>
                                        @else
                                            <a href="{{ url('admin/invoices/'.$invoice->id.'/active') }}" class="confirm_active btn btn-success"><i class="fa fa-check"></i> Activation</a>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                        </form>


                    </div><!-- /.portlet-body -->
                </div><!-- /.portlet -->
                <!-- END EXAMPLE TABLE PORTLET-->
            </div><!-- /.col-md-12 -->
        </div><!-- /.row -->

    </div><!-- /.page-content -->
@stop