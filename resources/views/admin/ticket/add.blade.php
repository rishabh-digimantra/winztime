@extends('admin.layout')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1> Ticket <small>{{ trans('AddTicket') }}...</small> </h1>
            <ol class="breadcrumb">
                <li><a href="{{ URL::to('admin/dashboard/this_month') }}"><i class="fa fa-dashboard"></i> {{ trans('breadcrumb_dashboard') }}</a></li>
                <li><a href="{{ URL::to('admin/campaign/display')}}"><i class="fa fa-tablet"></i>{{ trans('ListingAllCampaign') }}</a></li>
                <li class="active">{{ trans('AddTicket') }}</li>
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
                            <h3 class="box-title">{{ trans('AddTicket') }}</h3>
                        </div>

                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="row">
                                <div class="col-xs-12">
                                    @if (count($errors) > 0)
                                        @if($errors->any())
                                            <div class="alert alert-danger alert-dismissible" role="alert">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                {{$errors->first()}}
                                            </div>
                                        @endif
                                    @endif

                                    @if(Session::has('success'))
                                        <div class="alert alert-success alert-dismissible" role="alert">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            {!! session('success') !!}
                                        </div>
                                    @endif
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
                                    <!--<div class="box-header with-border">
                          <h3 class="box-title">Edit category</h3>
                        </div>-->
                                        <!-- /.box-header -->
                                        <!-- form start -->
                                        <div class="box-body">

                                            {!! Form::open(array('url' =>'admin/campaign/insert', 'method'=>'post', 'class' => 'form-horizontal form-validate', 'enctype'=>'multipart/form-data')) !!}
                                           	@csrf
                                            <div class="form-group">
                                                <label for="title" class="col-sm-2 col-md-3 control-label">{{ trans('Title') }}</label>
                                                <div class="col-sm-10 col-md-4">
                                                    {!! Form::text('title',  '', array('class'=>'form-control field-validate', 'id'=>'title'))!!}
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="start_date" class="col-sm-2 col-md-3 control-label">{{ trans('Start Date') }}</label>
                                                <div class="col-sm-10 col-md-4">
                                                    {!! Form::text('start_date',  '', array('class'=>'form-control field-validate datepicker', 'id'=>'datepicker', 'readonly'=>'readonly'))!!}
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="end_date" class="col-sm-2 col-md-3 control-label">{{ trans('End Date') }}</label>
                                                <div class="col-sm-10 col-md-4">
                                                    {!! Form::text('end_date',  '', array('class'=>'form-control field-validate datepicker', 'id'=>'datepicker', 'readonly'=>'readonly'))!!}
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="product_id" class="col-sm-2 col-md-3 control-label">{{ trans('labels.Products') }}</label>
                                                <div class="col-sm-10 col-md-4 couponProdcuts">
                                                    <select name="product_id" class="form-control select2 ">
                                                        @foreach($result['products'] as $products)
                                                            <option value="{{ $products->products_id }}">{{ $products->products_name }} {{ $products->products_model }}</option>
                                                        @endforeach
                                                    </select>
                                                   
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="reward_id" class="col-sm-2 col-md-3 control-label">{{ trans('Rewards') }}</label>
                                                <div class="col-sm-10 col-md-4 couponProdcuts">
                                                    <select name="reward_id" class="form-control select2 ">
                                                        @foreach($result['rewards'] as $rewards)
                                                            <option value="{{ $products->products_id }}">{{ $rewards->title }} </option>
                                                        @endforeach
                                                    </select>
                                                   
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('Type') }}</label>
                                                <div class="col-sm-10 col-md-4 couponProdcuts">
                                                    <select name="type_id" id="typeSelect" class="form-control select2 " onchange="checkType()">
                                                            <option value="4">Orignal </option>
                                                            <option value="3">Donation</option>
                                                            <option value="1">Early Bid</option>
                                                            <option value="2">Referrals</option>
                                                    </select>
                                                   
                                                </div>
                                            </div>
                                            <div class="form-group" id="no_customers" style="display: none;">
                                                <label for="no_customers" class="col-sm-2 col-md-3 control-label">{{ trans('No of Customers') }}</label>
                                                <div class="col-sm-10 col-md-4">
                                                    {!! Form::number('no_customers',  '', array('class'=>'form-control', 'id'=>'no_customers'))!!}
                                                </div>
                                            </div>
                                            <!-- /.box-body -->
                                            <div class="box-footer text-center">
                                                <button type="submit" class="btn btn-primary">{{ trans('Submit') }}</button>
                                                <a href="{{ URL::to('admin/campaign/display')}}" type="button" class="btn btn-default">{{ trans('back') }}</a>
                                            </div>

                                            <!-- /.box-footer -->
                                            {!! Form::close() !!}
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
