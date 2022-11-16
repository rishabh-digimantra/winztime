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
            <h1>  {{ trans('Tickets') }} <small>All Listing...</small> </h1>
            <ol class="breadcrumb">
                <li><a href="{{ URL::to('admin/dashboard/this_month')}}"><i class="fa fa-dashboard"></i> {{ trans('labels.breadcrumb_dashboard') }}</a></li>
                <li class="active"> {{ trans('Tickets') }} </li>
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
                            {{--<h3 class="box-title">{{ trans('Tickets') }}  </h3>--}}
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
                                            <th>Ticket ID</th>
                                            <th>Ticket Number</th>
                                            <th>Campaign</th>
                                            <th>Order Info</th>
                                            <th>Customer Name</th>
                                            <th>Custom Name</th>
                                            <th>Created At</th>
                                            <th>Status</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @if($ticket !== null)
                                            @foreach ($ticket as $key=>$campaign)

                                                <tr>
                                                    <td>{{ $campaign->id }}</td>
                                                    <td>Z-{{sequenceNumber($campaign->campaign_id)}}-{{sequenceNumber($campaign->ticket_number)}}-{{$campaign->type}}</td>
                                                    <td>Z-{{sequenceNumber($campaign->campaign_id)}}</td>
                                                    <td>
                                                        <strong>Order Id</strong>:{{ $campaign->orders_id }} 
                                                        <br><strong>Total Price</strong>:@isset(App\Models\Core\Order::getOrderPrice($campaign->orders_id)[0]->order_price)
                                                        {{App\Models\Core\Order::getOrderPrice($campaign->orders_id)[0]->order_price}}
                                                        @else
                                                            not set
                                                        @endif
                                                    </td>
                                                    @if(isset($campaign->customerInfo($campaign->customers_id)[0]->first_name))
                                                    <td>{{ $campaign->customerInfo($campaign->customers_id)[0]->first_name }} {{ $campaign->customerInfo($campaign->customers_id)[0]->last_name }}</td>
                                                    @else
                                                    <td>Not Found</td>
                                                    @endif
                                                    <td>
                                                        {{$campaign->custom_name}}
                                                    </td>
                                                    <td>
                                                        {{$campaign->created_at}}
                                                    </td>
                                                    <td>
                                                         <?php if ($campaign->status ==1): ?>
                                                            <a href="{{ URL::to('admin/ticket/updatename/'.$campaign->id)}}"><span class="label label-success">Change Name</span></a>
                                                            <!-- <a href="javascript:;" class="passingID" data-id="{{$campaign->id}}"><span class="label label-success">Change Name</span></a> -->
                                                             <span class="label label-success">{{trans('Active')}} </span>/
                                                            <a href="{{ URL::to('admin/ticket/update/status/'.$campaign->id)}}"><span class="label label-success">Inactive</span></a>
                                                        <?php endif ?>
                                                        <?php if ($campaign->status ==0): ?>
                                                              <span class="label label-success">
                                                            <a>Inactive</a>
                                                            </span>/
                                                             <a href="{{ URL::to('admin/ticket/update/status/two/'.$campaign->id)}}"><span class="label label-success">{{trans('Active')}}</span></a>
                                                        <?php endif ?>
                                                      
                                                                                                                   
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
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update Customer Name</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  {!! Form::open(array('url' =>'admin/updatename', 'method'=>'post', 'class' => 'form-horizontal form-validate', 'enctype'=>'multipart/form-data')) !!}
                  <div class="modal-body">
                    

                    @csrf

                    <div class="form-group">

                        <label for="custom_name" class="col-sm-2 col-md-3 control-label">Custom Name</label>

                        <div class="col-sm-10 col-md-4">

                            {!! Form::text('custom_name',  '', array('class'=>'form-control field-validate', 'id'=>'custom_name', 'required'=>'required'))!!}
                            <input type="hidden" name="ticket_id" id="ticket_id"  value="0">
                        </div>

                    </div>

                    
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                  </div>
                  {!! Form::close() !!}
                </div>
              </div>
            </div>
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
