@extends('admin.layout')

@section('content')

<div class="content-wrapper">

    <!-- Content Header (Page header) -->

    <section class="content-header">

        <h1> {{ trans('labels.Customers') }} <small>{{ trans('labels.ListingAllCustomers') }}...</small> </h1>

        <ol class="breadcrumb">

            <li><a href="{{ URL::to('admin/dashboard/this_month')}}"><i class="fa fa-dashboard"></i> {{ trans('labels.breadcrumb_dashboard') }}</a></li>

            <li class="active">{{ trans('labels.Customers') }}</li>

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

                        <div class="container-fluid">

                            <div class="row">

                                <div class="box-tools pull-right">

                                    <a href="{{ url('admin/customers/add')}}" type="button" class="btn btn-block btn-primary">{{ trans('labels.AddNew') }}</a>

                                </div>

                            </div>

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

                                <table id="datatableCust" class="table table-bordered table-striped display nowrap">

                                    <thead>

                                        <tr>

                                            <!--  <th>@sortablelink('id', trans('labels.ID') )</th>

                                            <th style="display: none">{{ trans('labels.Picture') }}</th>

                                            <th>@sortablelink('first_name', trans('labels.Full Name')) </th>

                                            <th>@sortablelink('email', trans('labels.Email')) </th>

                                            <th>Phone</th>

                                            <th>@sortablelink('entry_street_address', trans('labels.Address'))</th>

                                            <th>Total Orders</th>

                                            <th>Amount Spent</th>

                                            <th>{{ trans('labels.Action') }}</th> -->

                                            <th>Customer ID</th>

                                            <th> {{trans('labels.Full Name')}} </th>

                                            <th> {{trans('labels.Email')}} </th>

                                            <th>Phone</th>
                                            <th>Mobile Logged In</th>

                                            <!-- <th>Default Address</th> -->

                                            <th>Total Orders</th>

                                            <th>Amount Spent</th>

                                            <th>Zpoints</th>
                                            <th>Date of Birth</th>

                                            <th>Level</th>

                                            <th>Created At</th>

                                            <th>{{ trans('labels.Action') }}</th>



                                        </tr>

                                    </thead>

                                    <tbody>

                                        @if (isset($customers['result']))

                                        @foreach ($customers['result'] as $key=>$listingCustomers)

                                        <tr>

                                            <td>{{ $listingCustomers->id }}</td>

                                            <td>{{ $listingCustomers->first_name }} {{ $listingCustomers->last_name }}</td>

                                            <td>{{ $listingCustomers->email }}</td>

                                            <td>{{ $listingCustomers->country_code }}  {{ $listingCustomers->phone }}</td>
                                            <td>{{ @$listingCustomers->device_token == NULL ? 'No' : 'Yes'  }}</td>

                                            <!-- <td>
                                              
                                            </td> -->

                                            <td>{{ $listingCustomers->noOfOrders($listingCustomers->id) }}</td>

                                            <td>{{ $listingCustomers->totalAmountSpent($listingCustomers->id) }}</td>

                                            <td>{{ $listingCustomers->redeem_points}}</td>
                                            <td>{{ $listingCustomers->dob}}</td>

                                            <td>{{ $listingCustomers->level($listingCustomers->level_id)[0]->name}}</td>
                                            <td>{{ $listingCustomers->created_at}}</td>

                                            <td>

                                                <ul class="nav table-nav">

                                                    <li class="dropdown">

                                                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">

                                                            {{ trans('labels.Action') }} <span class="caret"></span>

                                                        </a>

                                                        <ul class="dropdown-menu">

                                                            <li role="presentation"><a role="menuitem" tabindex="-1" href="{{url('admin/customers/edit') }}/{{$listingCustomers->id}}">{{ trans('labels.EditCustomers') }}</a></li>

                                                            <li role="presentation" class="divider"></li>

                                                            <!-- <li role="presentation"><a role="menuitem" tabindex="-1" href="{{url('admin/customers/address/display/'.$listingCustomers->id) }}">{{ trans('labels.EditAddress') }}</a></li> -->

                                                            <li role="presentation" class="divider"></li>

                                                            <li role="presentation"><a data-toggle="tooltip" data-placement="bottom" title="{{ trans('labels.Delete') }}" id="deleteCustomerFrom" users_id="{{ $listingCustomers->id }}">{{ trans('labels.Delete') }}</a></li>

                                                        </ul>

                                                    </li>

                                                </ul>

                                            </td>

                                        </tr>

                                        @endforeach

                                        @else

                                        <tr>

                                            <td colspan="4">{{ trans('labels.NoRecordFound') }}</td>

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



        <!-- deleteCustomerModal -->

        <div class="modal fade" id="deleteCustomerModal" tabindex="-1" role="dialog" aria-labelledby="deleteCustomerModalLabel">

            <div class="modal-dialog" role="document">

                <div class="modal-content">

                    <div class="modal-header">

                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                        <h4 class="modal-title" id="deleteCustomerModalLabel">{{ trans('labels.Delete') }}</h4>

                    </div>

                    {!! Form::open(array('url' =>'admin/customers/delete', 'name'=>'deleteCustomer', 'id'=>'deleteCustomer', 'method'=>'post', 'class' => 'form-horizontal', 'enctype'=>'multipart/form-data')) !!}

                    {!! Form::hidden('action', 'delete', array('class'=>'form-control')) !!}

                    {!! Form::hidden('users_id', '', array('class'=>'form-control', 'id'=>'users_id')) !!}

                    <div class="modal-body">

                        <p>{{ trans('labels.DeleteCustomerText') }}</p>

                    </div>

                    <div class="modal-footer">

                        <button type="button" class="btn btn-default" data-dismiss="modal">{{ trans('labels.Close') }}</button>

                        <button type="submit" class="btn btn-primary">{{ trans('labels.Delete') }}</button>

                    </div>

                    {!! Form::close() !!}

                </div>

            </div>

        </div>



        <div class="modal fade" id="notificationModal" tabindex="-1" role="dialog" aria-labelledby="notificationModalLabel">

            <div class="modal-dialog" role="document">

                <div class="modal-content notificationContent">



                </div>

            </div>

        </div>



        <!-- Main row -->



        <!-- /.row -->

    </section>

    <!-- /.content -->

</div>



@endsection