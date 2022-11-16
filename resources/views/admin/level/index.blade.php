@extends('admin.layout')
@section('content')
<?php 

function sequenceNumber($id) {
  $slots = '00000';
  $len = strlen($id);
 
  if ($len >! 5) {
    $num = -1 * abs($len);

    $seq = substr_replace($slots,$id,$num);
    return $seq;
  }else{
    return $id;
  }
}

 ?>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>  {{ trans('Levels') }} <small>All Listing...</small> </h1>
            <ol class="breadcrumb">
                <li><a href="{{ URL::to('admin/dashboard/this_month')}}"><i class="fa fa-dashboard"></i> {{ trans('labels.breadcrumb_dashboard') }}</a></li>
                <li class="active"> {{ trans('Levels') }} </li>
            </ol>
        </section>

        <!--  content -->
        <section class="content">
            <!-- Info boxes -->
            <!-- /.row -->
            <div class="row">
                <div class="col-md-12">
                    <div class="box">
                        <div class="box-header">
                            {{--<h3 class="box-title">{{ trans('Levels') }}  </h3>--}}

                            <div class="col-lg-6 form-inline" id="contact-form">


                                <!-- <form  name='registration' id="registration" class="registration" method="get" action="{{url('admin/campaign/filter')}}">
                                    <input type="hidden"  value="{{csrf_token()}}">
                                    {{--<div class="input-group-btn search-panel ">--}}
                                    <div class="input-group-form search-panel ">
                                        <select type="button" class="btn btn-default dropdown-toggle form-control" data-toggle="dropdown" name="FilterBy" id="FilterBy"  >
                                            <option value="" selected disabled hidden>Filter By</option>
                                            <option value="Code"  @if(isset($name)) @if  ($name == "Code") {{ 'selected' }} @endif @endif>{{ trans('labels.Code') }}</option>
                                        </select>
                                        {{--</div>--}}

                                        <input type="text" class="form-control input-group-form " name="parameter" placeholder="Search term..." id="parameter" @if(isset($param)) value="{{$param}}" @endif >
                                        {{--<span class="input-group-btn">--}}
                                        <button class="btn btn-primary " id="submit" type="submit"><span class="glyphicon glyphicon-search"></span></button>
                                        @if(isset($param,$name))  <a class="btn btn-danger " href="{{url('admin/campaign/display')}}"><i class="fa fa-ban" aria-hidden="true"></i> </a>@endif
                                        {{--</span>--}}
                                    </div>
                                </form> -->
                                <div class="col-lg-4 form-inline" id="contact-form12"></div>
                            </div>


                           <!--  <div class="box-tools pull-right">
                                <a href="{{ URL::to('admin/campaign/add')}}" type="button" class="btn btn-block btn-primary">{{ trans('labels.AddNew') }}</a>
                            </div> -->
                        </div>

                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="row">
                                <div class="col-xs-12">
                                    @if (count($errors) > 0)
                                        @if($errors->any())
                                            <div class="alert alert-success alert-dismissible" role="alert">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                {{$errors->first()}}
                                            </div>
                                        @endif
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                 <div class="col-xs-12">
                                    <table id="datatable"  class="table table-bordered table-striped">
                                        <thead>
                                        <tr>
                                            <th>Level ID</th>
                                            <th>Name</th>
                                            <th>Starts At</th>
                                            <th>Ends On</th>
                                            <th>Created At</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @if($level !== null)
                                            @foreach ($level as $key=>$campaign)

                                                <tr>
                                                    <td>{{ $campaign->id }}</td>
                                                    <td>{{ $campaign->name }}</td>
                                                    <td>{{ $campaign->start_count }}</td>
                                                    <td>{{ $campaign->end_count }}</td>
                                                    <td>{{ $campaign->created_at }}</td>
                                                    <td>
                                                         <?php if ($campaign->status ==1): ?>
                                                            {{trans('Active')}} 
                                                        <?php endif ?>
                                                        <?php if ($campaign->status ==0): ?>
                                                                Deactive
                                                        <?php endif ?>
                                                    </td>
                                                    <td>
                                                        <a data-toggle="tooltip" data-placement="bottom" title="{{ trans('labels.Edit') }}" href="{{ url('admin/level/edit')}}/{{$campaign->id}}" class="badge bg-light-blue"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                                        <a data-toggle="tooltip" data-placement="bottom" title="{{ trans('labels.Delete') }}" id="deleteCampaign_id" campaign_id ="{{ $campaign->id }}" class="badge bg-red"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <td colspan="8"><strong>{{ trans('labels.NoRecordFound') }}</strong></td>
                                            </tr>
                                        @endif
                                        </tbody>
                                    </table>
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
            <!-- deleteCoupanModal -->
            <div class="modal fade" id="deleteCoupanModal" tabindex="-1" role="dialog" aria-labelledby="deleteCoupanModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="deleteCoupanModalLabel">{{ trans('Delete') }}</h4>
                        </div>
                        {!! Form::open(array('url' =>'admin/level/delete', 'name'=>'deleteCampaign', 'id'=>'deleteCampaign', 'method'=>'post', 'class' => 'form-horizontal', 'enctype'=>'multipart/form-data')) !!}
                        {!! Form::hidden('action',  'delete', array('class'=>'form-control')) !!}
                        {!! Form::hidden('id',  '', array('class'=>'form-control', 'id'=>'campaign_id')) !!}
                        <div class="modal-body">
                            <p>Do you want to delete this Level?</p>
                        </div>
                        <div class="modal-footer">

                            <button type="submit" class="btn btn-danger" id="deleteCoupanBtn">{{ trans('labels.Delete') }} </button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">{{ trans('labels.Close') }}</button>

                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>

            <!--  row -->

            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
@endsection
