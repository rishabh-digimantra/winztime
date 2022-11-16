@extends('admin.layout')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>Edit Ticket</h1>
            <ol class="breadcrumb">
                <li><a href="{{ URL::to('admin/dashboard/this_month') }}"><i class="fa fa-dashboard"></i> {{ trans('labels.breadcrumb_dashboard') }}</a></li>
                <li><a href="{{ URL::to('admin/ticket/display')}}"><i class="fa fa-dashboard"></i>All Tickets</a></li>
                <li class="active">Edit Ticket</li>
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
                            <h3 class="box-title">Edit Ticket</h3>
                        </div>

                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="row">
                                <div class="col-xs-12">
                                    @if (count($errors) > 0)
                                        @if($errors->any())
                                            <div  @if ($errors->first() == 'Campaign has been updated successfully!') class="alert alert-success alert-dismissible" @else class="alert alert-danger alert-dismissible" @endif role="alert">
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

                                            {!! Form::open(array('url' =>'admin/campaigns/update', 'method'=>'post', 'class' => 'form-horizontal form-validate', 'enctype'=>'multipart/form-data')) !!}
                                            {!! Form::hidden('id',  $result['campaign'][0]->id)!!}

                                            <div class="form-group">
                                                <label for="title" class="col-sm-2 col-md-3 control-label">{{ trans('Title') }} </label>
                                                <div class="col-sm-10 col-md-4">
                                                    {!! Form::text('title',  $result['campaign'][0]->title, array('class'=>'form-control field-validate', 'id'=>'title'))!!}
                                                </div>
                                            </div>
                                           <div class="form-group">
                                                <label for="start_date" class="col-sm-2 col-md-3 control-label">{{ trans('Start Date') }}</label>
                                                <div class="col-sm-10 col-md-4">
                                                    {!! Form::text('start_date', date('d/m/Y',strtotime($result['campaign'][0]->start_date)), array('class'=>'form-control field-validate datepicker', 'id'=>'datepicker', 'readonly'=>'readonly'))!!}
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="end_date" class="col-sm-2 col-md-3 control-label">{{ trans('End Date') }}</label>
                                                <div class="col-sm-10 col-md-4">
                                                    {!! Form::text('end_date',  date('d/m/Y',strtotime($result['campaign'][0]->end_date)), array('class'=>'form-control field-validate datepicker', 'id'=>'datepicker', 'readonly'=>'readonly'))!!}
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="product_id" class="col-sm-2 col-md-3 control-label">{{ trans('labels.Products') }}</label>
                                                <div class="col-sm-10 col-md-4 couponProdcuts">
                                                    <select name="product_id" class="form-control select2 ">
                                                        @foreach($result['products'] as $products)
                                                            <option value="{{ $products->products_id }}" @if($result['campaign'][0]->product_id == $products->products_id) selected @endif>{{ $products->products_name }} {{ $products->products_model }}</option>
                                                        @endforeach
                                                    </select>
                                                   
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="product_id" class="col-sm-2 col-md-3 control-label">{{ trans('Reward') }}</label>
                                                <div class="col-sm-10 col-md-4 couponProdcuts">
                                                    <select name="product_id" class="form-control select2 ">
                                                        @foreach($result['products'] as $products)
                                                            <option value="{{ $products->products_id }}" @if($result['campaign'][0]->reward_id == $products->products_id) selected @endif>{{ $products->products_name }} {{ $products->products_model }}</option>
                                                        @endforeach
                                                    </select>
                                                   
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('Type') }}</label>
                                                <div class="col-sm-10 col-md-4 couponProdcuts">
                                                    <select name="type_id" id="typeSelect" class="form-control select2 " onchange="checkType()">
                                                            <option value="4" @if($result['campaign'][0]->type_id == 4) selected @endif >Orignal </option>
                                                            <option value="3" @if($result['campaign'][0]->type_id == 3) selected @endif >Donation</option>
                                                            <option value="1" @if($result['campaign'][0]->type_id == 1) selected @endif >Early Bid</option>
                                                            <option value="2" @if($result['campaign'][0]->type_id == 2) selected @endif >Referrals</option>
                                                    </select>
                                                   
                                                </div>
                                            </div>
                                            <!-- /.box-body -->
                                            <div class="box-footer text-center">
                                                <button type="submit" class="btn btn-primary">{{ trans('labels.Submit') }}</button>
                                                <a href="{{ URL::to('admin/campaigns/display')}}" type="button" class="btn btn-default">{{ trans('labels.back') }}</a>
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
