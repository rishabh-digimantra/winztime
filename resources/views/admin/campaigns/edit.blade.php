@extends('admin.layout')

@section('content')

    <div class="content-wrapper">

        <!-- Content Header (Page header) -->

        <section class="content-header">

            <h1> {{ trans('labels.EditCampaigns') }} <small>{{ trans('labels.EditCampaigns') }}...</small> </h1>

            <ol class="breadcrumb">

                <li><a href="{{ URL::to('admin/dashboard/this_month') }}"><i class="fa fa-dashboard"></i> {{ trans('labels.breadcrumb_dashboard') }}</a></li>

                <li><a href="{{ URL::to('admin/campaign/display')}}"><i class="fa fa-dashboard"></i>All Campaigns</a></li>

                <li class="active">Edit Campaign</li>

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

                            <h3 class="box-title">Edit Campaign</h3>

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



                                            {!! Form::open(array('url' =>'admin/campaign/update', 'method'=>'post', 'class' => 'form-horizontal form-validate', 'enctype'=>'multipart/form-data')) !!}

                                            {!! Form::hidden('id',  $result['campaign'][0]->id)!!}



                                            <div class="form-group">

                                                <label for="title" class="col-sm-2 col-md-3 control-label">Campaign Title </label>

                                                <div class="col-sm-10 col-md-4">

                                                    {!! Form::text('title', $result['campaign'][0]->title, array('class'=>'form-control field-validate', 'id'=>'title'))!!}

                                                </div>

                                            </div>

                                           <div class="form-group">

                                                <label for="start_date" class="col-sm-2 col-md-3 control-label">{{ trans('Start Date') }}</label>

                                                <div class="col-sm-10 col-md-4">

                                                    {!! Form::text('start_date', date('d/m/Y',strtotime($result['campaign'][0]->start_date)), array('class'=>'form-control field-validate datepicker', 'readonly'=>'readonly'))!!}

                                                </div>

                                            </div>

                                            <div class="form-group">

                                                <label for="end_date" class="col-sm-2 col-md-3 control-label">{{ trans('End Date') }}</label>

                                                <div class="col-sm-10 col-md-4">

                                                    {!! Form::text('end_date',  date('d/m/Y',strtotime($result['campaign'][0]->end_date)), array('class'=>'form-control field-validate datepicker', 'readonly'=>'readonly'))!!}

                                                </div>

                                            </div>



                                            <div class="form-group">

                                                <label for="product_id" class="col-sm-2 col-md-3 control-label">{{ trans('labels.Products') }}</label>

                                                <div class="col-sm-10 col-md-4 couponProdcuts">

                                                    <select name="product_id" class="form-control select2">

                                                        @foreach($result['products'] as $products)

                                                            <option value="{{ $products->products_id }}" @if($result['campaign'][0]->product_id == $products->products_id) selected @endif>{{ $products->products_name }} {{ $products->products_model }}</option>

                                                        @endforeach

                                                    </select>

                                                   

                                                </div>

                                            </div>

                                            <div class="form-group">

                                                <label for="product_id" class="col-sm-2 col-md-3 control-label">{{ trans('Reward') }}</label>

                                                <div class="col-sm-10 col-md-4 couponProdcuts">

                                                    <select name="reward_id" class="form-control select2 ">

                                                        @foreach($result['rewards'] as $reward)

                                                            <option value="{{ $reward->id }}" @if($result['campaign'][0]->reward_id == $reward->id) selected @endif>{{ $reward->title }}</option>

                                                        @endforeach

                                                    </select>

                                                   

                                                </div>

                                            </div>

                                            <!-- <div class="form-group">

                                                <label for="name" class="col-sm-2 col-md-3 control-label">Campaign Type</label>

                                                <div class="col-sm-10 col-md-4 couponProdcuts">

                                                    <select name="type_id" id="typeSelect" class="form-control select2 " onchange="checkType()">

                                                            <option value="4" @if($result['campaign'][0]->type_id == 4) selected @endif >Orignal </option>

                                                            <option value="3" @if($result['campaign'][0]->type_id == 3) selected @endif >Donation</option>

                                                            <option value="1" @if($result['campaign'][0]->type_id == 1) selected @endif >Early Bid</option>

                                                            <option value="2" @if($result['campaign'][0]->type_id == 2) selected @endif >Referrals</option>

                                                    </select>

                                                   

                                                </div>

                                            </div> -->

                                            <!-- /.box-body -->

                                            <div class="form-group" id="no_customers">

                                                <label for="no_customers" class="col-sm-2 col-md-3 control-label">Early Bird Ticket</label>

                                                <div class="col-sm-10 col-md-4">

                                                    {!! Form::number('no_customers',$result['campaign'][0]->no_customers, array('class'=>'form-control', 'id'=>'no_customers'))!!}

                                                </div>

                                            </div>

                                            <div class="form-group" id="no_of_orders">

                                                <label for="no_of_orders" class="col-sm-2 col-md-3 control-label">Orignal Ticket</label>

                                                <div class="col-sm-10 col-md-4">

                                                    {!! Form::number('no_of_orders',$result['campaign'][0]->no_of_orders, array('class'=>'form-control field-validate', 'id'=>'no_of_orders', 'min'=>1))!!}

                                                </div>

                                            </div>

                                            <div class="form-group" id="no_of_orders">

                                                <label for="no_of_orders" class="col-sm-2 col-md-3 control-label">Status</label>

                                                <div class="col-sm-10 col-md-4">

                                                    <select name="status" class="form-control">
                                                        <option @if($result['campaign'][0]->status == 1) selected @endif>Active</option>
                                                        <option @if($result['campaign'][0]->status == 0) selected @endif>In-Active</option>
                                                    </select>

                                                </div>

                                            </div>

                                            <div class="form-check ">
                                              <label for="campaign_type" class="col-sm-2 col-md-3 control-label" style="padding-top:12px;">Campaign Type</label>
                                              <div class="col-sm-10 col-md-9"  style="padding-left: 5px;">
                                                <input class="form-check-input" name="campaign_type" type="radio" id="inlineCheckbox1" value="regular" @if($result['campaign'][0]->campaign_type == 'regular') checked @endif>
                                                <label class="form-check-label" for="inlineCheckbox1">Regular Campaign</label>
                                            </div>
                                        </div>
                                        <div class="form-check ">
                                           <span class="col-sm-2 col-md-3"></span>
                                           <div class="col-sm-10 col-md-9"  style="padding-left: 5px;">
                                              <input class="form-check-input" type="radio"  name="campaign_type" id="inlineCheckbox2" value="countdown" @if($result['campaign'][0]->campaign_type == 'countdown') checked @endif>
                                              <label class="form-check-label" for="inlineCheckbox2">CountDown Campaign</label>
                                          </div>
                                      </div>
                                       <div class="form-group">
                                         <label for="campaign_type" class="col-sm-2 col-md-3 control-label" >Activate Banner</label>
                                         <div class="col-sm-10 col-md-9">
                                        <label class=" checkbox-inline">
                                          <input id="genMale" type="checkbox" value="1"  name="is_banner_active" @if($result['campaign'][0]->is_banner_active == '1') checked @endif>Yes</label>
                                        </div>
                                          </div>

                                      <div class="box-footer text-center col-sm-12 " style="margin-top:5px;">
                                        <span class="col-sm-2 col-md-3"></span>
                                        <div class="col-sm-10 col-md-4">
                                            <button type="submit" class="btn btn-primary">{{ trans('labels.Submit') }}</button>

                                            <a href="{{ URL::to('admin/campaign/display')}}" type="button" class="btn btn-default">{{ trans('labels.back') }}</a>
                                        </div>
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

