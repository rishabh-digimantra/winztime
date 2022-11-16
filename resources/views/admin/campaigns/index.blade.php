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
            <h1>  {{ trans('Campaigns') }} <small>{{ trans('labels.ListingAllCampaigns') }}...</small> </h1>
            <ol class="breadcrumb">
                <li><a href="{{ URL::to('admin/dashboard/this_month')}}"><i class="fa fa-dashboard"></i> {{ trans('labels.breadcrumb_dashboard') }}</a></li>
                <li class="active"> {{ trans('labels.Campaigns') }}</li>
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
                            {{--<h3 class="box-title">{{ trans('labels.ListingAllCampaigns') }} </h3>--}}

                            <div class="col-lg-6 form-inline" id="contact-form">


                                <div class="col-lg-4 form-inline" id="contact-form12"></div>
                            </div>


                            <div class="box-tools pull-right">
                                <a href="{{ URL::to('admin/campaign/add')}}" type="button" class="btn btn-block btn-primary">{{ trans('labels.AddNew') }}</a>
                            </div>
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
                                    <table id="datatable" class="table table-bordered table-striped">
                                        <thead>
                                        <tr>
                                            <th>Campaign ID</th>
                                            <th>@sortablelink('title', trans('title') )</th>
                                            <th>Campaign code</th>
                                            <th>Start date</th>
                                            <th>End date</th>
                                            <th>Product</th>
                                            <th>Reward</th>
                                            <!-- <th>@sortablelink('type_id', trans('Type') )</th> -->
                                            <th>Status</th>
                                            <th>{{ trans('Action') }}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @if($campaigns !== null)
                                            @foreach ($campaigns as $key=>$campaign)

                                                <tr>
                                                    <td>{{ $campaign->id }}</td>
                                                    <td>{{ $campaign->title }}</td>
                                                    <td>Z-{{ sequenceNumber($campaign->id) }}</td>
                                                    <td>{{ date('d/m/Y',strtotime($campaign->start_date))}} </td>
                                                    <td>{{ date('d/m/Y',strtotime($campaign->end_date)) }} </td>
                                                    <td>{{ @$campaign->getProductInfo($campaign->product_id)[0]->products_name }} </td>
                                                    <td>{!! @$campaign->getRewardInfo($campaign->reward_id)[0]->title !!} </td>
                                                     <!-- <td>
                                                        <?php if ($campaign->type_id ==1): ?>
                                                            {{trans('Early Bid')}}  
                                                        <?php endif ?>
                                                        <?php if ($campaign->type_id ==2): ?>
                                                            {{trans('Referrals')}}
                                                        <?php endif ?>
                                                        <?php if ($campaign->type_id ==3): ?>
                                                            {{trans('Donation')}}
                                                        <?php endif ?>
                                                        <?php if ($campaign->type_id ==4): ?>
                                                            {{trans('Orignal')}} 
                                                        <?php endif ?>
                                                    </td> -->
                                                    <td>
                                                         <?php if ($campaign->status ==1): ?>
                                                            {{trans('Active')}} 
                                                        <?php endif ?>
                                                        <?php if ($campaign->status ==0): ?>
                                                            {{trans('Expired')}}
                                                        <?php endif ?>
                                                    </td>
                                                    <td>
                                                        <a data-toggle="tooltip" data-placement="bottom" title="{{ trans('labels.Edit') }}" href="{{ url('admin/campaign/edit')}}/{{$campaign->id}}" class="badge bg-light-blue"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                                        <a data-toggle="tooltip" data-placement="bottom" title="{{ trans('labels.Delete') }}" id="deleteCampaign_id" campaign_id ="{{ $campaign->id }}" class="badge bg-red"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                                        <a data-toggle="tooltip" data-placement="bottom" title="Print Tickets" href="{{ url('admin/campaign/print-tickets')}}/{{$campaign->id}}" class="badge bg-blue"><i class="fa fa-print" aria-hidden="true"></i></a>
                                                        <a data-toggle="tooltip" data-placement="bottom" title="Pick Winner" class="badge bg-blue pick_winner" data-campaign_id="{{$campaign->id}}" data-winner_name="{{ $campaign->winner_name }}" data-coupon_no="{{ $campaign->winner_coupon_no }}"><i class="fa fa-trophy" aria-hidden="true"></i></a>

                                                        @if($campaign->status == 1)
                                                        <!-- <a data-toggle="tooltip" data-placement="bottom" title="Pick Winner" href="{{ url('admin/campaign/pick-winner')}}/{{$campaign->id}}" class="badge bg-blue"><i class="fa fa-trophy" aria-hidden="true"></i></a> -->
                                                        <a data-toggle="tooltip" data-placement="bottom" title="print-tickets" href="{{ url('admin/campaign/changestatus')}}/{{$campaign->id}}" class="badge bg-blue"><i class="fa fa-times" aria-hidden="true"></i></a>
                                                        @endif
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
                                    <div class="col-xs-12 text-right">
                                        {{--{{ $result['campaign']->links() }}--}}
                                        {{--'vendor.pagination.default'--}}
                                        {!! $campaigns->appends(\Request::except('page'))->render() !!}

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
            <!-- deleteCoupanModal -->
            <div class="modal fade" id="deleteCoupanModal" tabindex="-1" role="dialog" aria-labelledby="deleteCoupanModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="deleteCoupanModalLabel">{{ trans('labels.DeleteCampaign') }}</h4>
                        </div>
                        {!! Form::open(array('url' =>'admin/campaign/delete', 'name'=>'deleteCampaign', 'id'=>'deleteCampaign', 'method'=>'post', 'class' => 'form-horizontal', 'enctype'=>'multipart/form-data')) !!}
                        {!! Form::hidden('action',  'delete', array('class'=>'form-control')) !!}
                        {!! Form::hidden('id',  '', array('class'=>'form-control', 'id'=>'campaign_id')) !!}
                        <div class="modal-body">
                            <p>Do you want to delete this campaign?</p>
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
