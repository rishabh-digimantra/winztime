@extends('admin.layout')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1> {{ trans('labels.NewsCategories') }} <small>{{ trans('labels.ListingNewsCategories') }}...</small> </h1>
        <ol class="breadcrumb">
            <li><a href="{{ URL::to('admin/dashboard/this_month') }}"><i class="fa fa-dashboard"></i> {{ trans('labels.breadcrumb_dashboard') }}</a></li>
            <li class="active">{{ trans('labels.NewsCategories') }}</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Info boxes -->

        <!-- /.row -->
        <div class="row">
            <div class="col-md-12">
                <div class="box">

                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <div class="col-xs-12">
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
                                <form method="POST" action="">
                                    @csrf
                                    <div class="form-group">
                                        <label>Campaign</label>
                                        <select class="form-control" name="campaign" required>
                                            <option value="all"> All</option>
                                            @foreach($campaigns as $campaign)
                                            <option value="{{$campaign->id}}"> {{ $campaign->title }} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Users</label>
                                        <select class="form-control" multiple name="user[]" required>
                                            <option disabled>Select User</option>
                                            @foreach($users as $user)
                                            <option value="{{$user->id}}"> {{ $user->first_name.' '. $user->last_name }} ( {{ $user->email }} ) </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Message</label>
                                        <input type="text" name="title" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Title</label>
                                        <input type="text" name="content" class="form-control" required>
                                        <!-- <textarea name="content"></textarea> -->
                                    </div>
                                    <div class="form-group">
                                        <input type="submit">
                                    </div>
                                </form>

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