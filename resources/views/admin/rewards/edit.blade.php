@extends('admin.layout')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1> {{ trans('labels.EditRewards') }} <small>{{ trans('labels.EditRewards') }}...</small> </h1>
            <ol class="breadcrumb">
                <li><a href="{{ URL::to('admin/dashboard/this_month') }}"><i class="fa fa-dashboard"></i> {{ trans('labels.breadcrumb_dashboard') }}</a></li>
                <li><a href="{{ URL::to('admin/reward/list-rewards')}}"><i class="fa fa-dashboard"></i>All Rewards</a></li>
                <li class="active">{{ trans('labels.EditRewards') }}</li>
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
                            <h3 class="box-title">{{ trans('labels.EditRewards') }}</h3>
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

                                            {!! Form::open(array('url' =>'admin/reward/update', 'method'=>'post', 'class' => 'form-horizontal form-validate', 'enctype'=>'multipart/form-data')) !!}
                                            {!! Form::hidden('reward_id',  $result['reward'][0]->id)!!}
                                            
                                            <div class="form-group">
                                                <label for="title" class="col-sm-2 col-md-3 control-label">{{ trans('Title') }} </label>
                                                <div class="col-sm-10 col-md-4">
                                                    {!! Form::text('title',  $result['reward'][0]->title, array('class'=>'form-control field-validate', 'id'=>'title'))!!}
                                                </div>
                                            </div>   
                                            <div class="form-group" id="imageIcone">
                                                <label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.Image') }}</label>
                                                <input id="image" type="file" name="image">
                                                <img src="{{URL::to('/')}}/images/{{$result['reward'][0]->reward_image}}" alt="" width=" 100px" height="100px">
                                            </div>
                                            <input id="old" type="hidden" name="oldimg" value="{{$result['reward'][0]->reward_image}}">
                                        <div class="box-footer text-center">
                                                <button type="submit" class="btn btn-primary">{{ trans('labels.Submit') }}</button>
                                                <a href="{{ URL::to('admin/reward/list-rewards')}}" type="button" class="btn btn-default">{{ trans('labels.back') }}</a>
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
