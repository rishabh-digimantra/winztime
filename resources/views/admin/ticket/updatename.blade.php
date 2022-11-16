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



                                       


                                    <!--<div class="box-header with-border">

                          <h3 class="box-title">Edit category</h3>

                        </div>-->

                                        <!-- /.box-header -->

                                        <!-- form start -->

                                        <div class="box-body">

                                            {!! Form::open(array('url' =>'admin/ticket/savename', 'method'=>'post', 'class' => 'form-horizontal form-validate', 'enctype'=>'multipart/form-data')) !!}
                                            <div class="modal-body">
                                              

                                              @csrf

                                              <div class="form-group">

                                                  <label for="custom_name" class="col-sm-2 col-md-3 control-label">Custom Name</label>

                                                  <div class="col-sm-10 col-md-4">

                                                      {!! Form::text('custom_name',  '', array('class'=>'form-control field-validate', 'id'=>'custom_name', 'required'=>'required'))!!}
                                                      <input type="hidden" name="ticket_id" id="ticket_id"  value="{{$ticket_id}}">
                                                  </div>

                                              </div>

                                              
                                            </div>
                                            <div class="modal-footer">
                                              
                                              <button type="submit" class="btn btn-primary">Save changes</button>
                                             <a href="{{ URL::to('admin/ticket/display')}}" type="button" class="btn btn-default">{{ trans('labels.back') }}</a>
                                            </div>
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

@endsection

