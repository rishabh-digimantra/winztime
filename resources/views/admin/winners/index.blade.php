@extends('admin.layout')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>  Winners <small> All Winners</small> </h1>
            <ol class="breadcrumb">
                <li><a href="{{ URL::to('admin/dashboard/this_month')}}"><i class="fa fa-dashboard"></i> {{ trans('labels.breadcrumb_dashboard') }}</a></li>
                <li class="active"> Winners</li>
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
                            {{--<h3 class="box-title">List all Winners</h3>--}}

                            <div class="col-lg-6 form-inline" id="contact-form">


                                <!-- <form  name='registration' id="registration" class="registration" method="get" action="{{url('admin/winner/filter')}}">
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
                                        @if(isset($param,$name))  <a class="btn btn-danger " href="{{url('admin/winner/display')}}"><i class="fa fa-ban" aria-hidden="true"></i> </a>@endif
                                        {{--</span>--}}
                                    </div>
                                </form> -->
                                <div class="col-lg-4 form-inline" id="contact-form12"></div>
                            </div>


                            <!-- <div class="box-tools pull-right">
                                <a href="{{ URL::to('admin/winner/add')}}" type="button" class="btn btn-block btn-primary">{{ trans('labels.AddNew') }}</a>
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
                                    <table id="datatable" class="table table-bordered table-striped">
                                        <thead>
                                        <tr>
                                            <th>Winner ID</th>
                                            <th>Customer Name</th>
                                            <th>Campaign Name</th>
                                            <th>Created At</th>

                                            <!-- <th>Action</th> -->
                                            <!-- <th>{{ trans('Action') }}</th> -->
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @if($winners !== null)

                                            @foreach ($winners as $key=>$winner)

                                                <tr>
                                                   
                                                    <td>{{ $winner->id }}</td>


                                                  <?php $customer=App\Models\Core\Customers::getCustomer($winner->customers_id); 

                                              
                                                  if(isset($customer[0])){ ?>

                                                <td>{{$customer[0]->first_name}} {{$customer[0]->last_name}}</td>
                                            <?php } else{ ?>

                                                 <td>-</td>
                                                 <?php } ?>
                                              

                                                    <?php $campaign=App\Models\Core\Campaign::getcampaign($winner->campaigns_id); 
                                                  if(isset($campaign[0])){ ?>
                                                    <td>{{$campaign[0]->title}}</td>
                                                    <?php } else{ ?>

                                                 <td>-</td>
                                                 <?php } ?>
                                                  

                                                    
                                                    <td>{{ $winner->created_at }} </td>
                                                    
                                                    <!-- <td><a data-toggle="tooltip" data-placement="bottom" title="{{ trans('labels.Edit') }}" href="{{ url('admin/winner/edit')}}/{{$winner->id}}" class="badge bg-light-blue"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                                        <a data-toggle="tooltip" data-placement="bottom" title="{{ trans('labels.Delete') }}" id="deleteCampaign_id" winner_id ="{{ $winner->id }}" class="badge bg-red"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                                    </td> -->
                                                    <!-- <td>
                                                        <a data-toggle="tooltip" data-placement="bottom" title="{{ trans('labels.Edit') }}" href="{{ url('admin/winner/edit')}}/{{$winner->id}}" class="badge bg-light-blue"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                                        <a data-toggle="tooltip" data-placement="bottom" title="{{ trans('labels.Delete') }}" id="deleteWinner_id" campaign_id ="{{ $winner->id }}" class="badge bg-red"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                                    </td> -->
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
                                        {{--{{ $result['winner']->links() }}--}}
                                        {{--'vendor.pagination.default'--}}
                                        {!! $winners->appends(\Request::except('page'))->render() !!}

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
                            <h4 class="modal-title" id="deleteCoupanModalLabel">{{ trans('labels.DeleteWinner') }}</h4>
                        </div>
                        {!! Form::open(array('url' =>'admin/winner/delete', 'name'=>'', 'id'=>'', 'method'=>'post', 'class' => 'form-horizontal', 'enctype'=>'multipart/form-data')) !!}
                        {!! Form::hidden('action',  'delete', array('class'=>'form-control')) !!}
                        {!! Form::hidden('id',  '', array('class'=>'form-control', 'id'=>'winner_id')) !!}
                        <div class="modal-body">
                            <p>Do you want to delete this winner?</p>
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
