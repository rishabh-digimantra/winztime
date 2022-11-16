@extends('admin.layout')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1> {{ trans('AddCampaign') }} <small>{{ trans('AddCampaign') }}...</small> </h1>
            <ol class="breadcrumb">
                <li><a href="{{ URL::to('admin/dashboard/this_month')}}"><i class="fa fa-dashboard"></i> {{ trans('breadcrumb_dashboard') }}</a></li>
                <li><a href="{{ URL::to('admin/campaign/display')}}"><i class="fa fa-tablet"></i>{{ trans('ListingAllCampaign') }}</a></li>
                <li class="active">{{ trans('AddCampaign') }}</li>
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
                            <h3 class="box-title">{{ trans('AddCampaign') }}</h3>
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
                                                    {!! Form::text('start_date',  '', array('class'=>'form-control field-validate datepicker start_date', 'id'=>'datepicker', 'readonly'=>'readonly'))!!}
                                                    <div id="date_error"></div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="end_date"  class="col-sm-2 col-md-3 control-label">{{ trans('End Date') }}</label>
                                                <div class="col-sm-10 col-md-4">
                                                    {!! Form::text('end_date',  '', array('class'=>'form-control field-validate datepicker end_date', 'id'=>'datepicker', 'readonly'=>'readonly'))!!}
                                                    <div id="date_error2"></div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="product_id" class="col-sm-2 col-md-3 control-label">{{ trans('labels.Products') }}</label>
                                                <div class="col-sm-10 col-md-4 couponProdcuts">
                                                    <select name="product_id" class="form-control select2 " onchange="getProductById()">
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
                                                            <option value="{{ $rewards->id }}">{{ $rewards->title }} </option>
                                                        @endforeach
                                                    </select>
                                                   
                                                </div>
                                            </div>
                                            <!-- <div class="form-group">
                                                <label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('Type') }}</label>
                                                <div class="col-sm-10 col-md-4 couponProdcuts">
                                                    <select name="type_id" id="typeSelect" class="form-control select2 " onchange="checkType()">
                                                            <option value="4">Orignal </option>
                                                            <option value="3">Donation</option>
                                                            <option value="1">Early Bid</option>
                                                            <option value="2">Referrals</option>
                                                    </select>
                                                   
                                                </div>
                                            </div> -->
                                            <div class="form-group" id="no_customers">
                                                <label for="no_customers" class="col-sm-2 col-md-3 control-label"> Early Birds Tickets </label>
                                                <div class="col-sm-10 col-md-4">
                                                    {!! Form::number('no_customers',  '', array('class'=>'form-control', 'id'=>'no_customers'))!!}
                                                </div>
                                            </div>
                                            <div class="form-group" id="no_of_campaign">
                                                <label for="no_of_orders" class="col-sm-2 col-md-3 control-label">Orignal Ticket</label>
                                                <div class="col-sm-10 col-md-4">
                                                    {!! Form::number('no_of_orders',  '1', array('class'=>'form-control field-validate', 'id'=>'no_of_orders', 'min'=>1))!!}
                                                </div>
                                            </div>

                                           <div class="form-check">
                                          <label for="campaign_type" class="col-sm-2 col-md-3 control-label" style="padding-top:12px;">Campaign Type</label>
                                                 <div class="col-sm-10 col-md-9" style="padding-left: 5px;">
                                            <input class="form-check-input" name="campaign_type" type="radio" id="inlineCheckbox1" value="regular">
                                            <label class="form-check-label" for="inlineCheckbox1">Regular Campaign</label>
                                        </div>
                                        </div>
                                        <div class="form-check ">
                                         <span class="col-sm-2 col-md-3"></span>
                                         <div class="col-sm-10 col-md-9 "  style="padding-left: 5px;">
                                          <input class="form-check-input" type="radio"  name="campaign_type" id="inlineCheckbox2" value="countdown">
                                          <label class="form-check-label" for="inlineCheckbox2">CountDown Campaign</label>
                                      </div>
                                  </div>

                                      <div class="form-group">
                                         <label for="campaign_type" class="col-sm-2 col-md-3 control-label" >Activate Banner</label>
                                         <div class="col-sm-10 col-md-9">
                                        <label class=" checkbox-inline">
                                          <input id="genMale" type="checkbox" value="1"  name="is_banner_active">Yes</label>
                                        </div>
                                          </div>
                                            <!-- /.box-body -->
                                            <div class="box-footer  text-center col-sm-12 " style="margin-top:5px;">
                                                   <span class="col-sm-2 col-md-3"></span>
                                                   <div class="col-sm-10 col-md-4">
                                                <button type="submit" class="btn btn-primary">{{ trans('Submit') }}</button>
                                                <a href="{{ URL::to('admin/campaign/display')}}" type="button" class="btn btn-default">{{ trans('Back') }}</a>
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

            function getProductById(){
                $.ajax({
                      url: "{{ URL::to('admin/getproductdetail')}}",
                      dataType: 'json',
                      type: "post",
                      // data: '&zone_country_id='+zone_country_id,
                        data: {
                            "_token": "{{ csrf_token() }}",
                            "country_zone_id" : zone_country_id,
                        },
                      success: function(data){
                        $("#loader").hide();
                        if(data.data.length>0){
                            var i;
                            var showData = [];
                            for (i = 0; i < data.data.length; ++i) {
                                showData[i] = "<option value='"+data.data[i].zone_id+"'>"+data.data[i].zone_name+"</option>";

                            }
                            $('.selectstate').show();

                        }else{
                            showData = "<option value=''></option>"
                            $('.selectstate').hide();
                            $('.otherstate').show();

                        }
                        $(".zoneContent").html(showData);
                      }
                    });
            }
            function start_date1(){
            var start_date=$('.start_date').val();
            var curr_date='<?php echo date("d/m/yy") ?>';
            if(start_date < curr_date)
            {
               $('#date_error').html('<label for="start_date" class="error giv_success" style="display:block;color: #e01515;">Please enter a value greater than or equal to '+curr_date+'.</label>');
                return;
            }else{
                $('.giv_success').css('display','none');
            }
        }
       function end_date1(){
            var start_date=$('.start_date').val();
            var end_date=$('.end_date').val();
            if(end_date < start_date )
            {
                $('#date_error2').html('<label for="start_date" class="error giv_success2" style="display:block;color: #e01515;">Please enter a value greater than or equal to '+start_date+'.</label>');
                return;
                    
            }else{
                $('.giv_success2').css('display','none');
            }
        }
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
