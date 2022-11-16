@extends('admin.layout')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1> Pick Winner</h1>
            <ol class="breadcrumb">
                <li><a href="{{ URL::to('admin/dashboard/this_month') }}"><i class="fa fa-dashboard"></i> {{ trans('labels.breadcrumb_dashboard') }}</a></li>
                <li><a href="{{ URL::to('admin/campaign/display')}}"><i class="fa fa-dashboard"></i>All Campaigns</a></li>
                <li class="active">Select Winner</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <!-- Info boxes -->

            <!-- /.row -->

            <div class="row">
                <div class="col-md-12">

                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Select Winner</h3>
                        </div>

                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="row">
                                <div class="col-xs-12">

                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="box box-info"><br>

                                        @if(count($result['message'])>0)
                                            <div class="alert alert-success alert-dismissible" role="alert">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                {{ $result['message'] }}
                                            </div>
                                        @endif
                                        <!-- /.box-header -->
                                        <!-- form start -->
                                        <div class="box-body">
                                            <table id="datatable" class="table table-bordered table-striped">
                                                <thead>
                                                <tr>
                                                    <th>CustomerID</th>
                                                    <th>Name</th>
                                                    <th>{{ trans('Action') }}</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                     @foreach($result['users'] as $user)
                                                    <tr>
                                                            <td>{{$user->id}}</td>
                                                            <td>{{$user->first_name}} {{$user->last_name}}</td>
                                                            <td><a href="{{ url('admin/campaign/selected-winner')}}/{{$result['campaign_id']}}/{{$user->id}}">Select</a></td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>


                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->

            <!-- Main row -->

            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
    <script type="text/javascript">
        function checkType() {
            var typeSelect = $( "#typeSelect option:selected" ).val();
            if (typeSelect == 1) {
                $("#no_customers").show();
            }else{
                $("#no_customers").hide();
            }
        }
    </script>
@endsection
