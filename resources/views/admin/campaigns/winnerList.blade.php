@extends('admin.layout')
@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1> Send Email <small></small> </h1>
        <ol class="breadcrumb">
            <li><a href="{{ URL::to('admin/dashboard/this_month')}}"><i class="fa fa-dashboard"></i> {{ trans('labels.breadcrumb_dashboard') }}</a></li>
            <li class="active"> Send Email</li>
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
                        <div class="box-tools pull-right">
                            <!-- <button class="btn btn-block btn-primary" id="sendWinnerMail">Send Mail</button> -->
                        </div>
                    </div>

                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <div class="col-xs-12">
                                <div id="winner_modal_response"></div>
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
                                            <th>Winner name</th>
                                            <th>Coupon no</th>
                                            <th>Start date</th>
                                            <th>End date</th>
                                            <th>Reward</th>
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
                                            <td>{{ $campaign->winner_name }}</td>
                                            <td>{{ $campaign->winner_coupon_no }}</td>
                                            <td>{{ date('d/m/Y',strtotime($campaign->start_date))}} </td>
                                            <td>{{ date('d/m/Y',strtotime($campaign->end_date)) }} </td>
                                            <td>{{ $campaign->getRewardInfo($campaign->reward_id)[0]->title }} </td>
                                            <td>
                                                <?php if ($campaign->status == 1) : ?>
                                                    {{trans('Active')}}
                                                <?php endif ?>
                                                <?php if ($campaign->status == 0) : ?>
                                                    {{trans('Expired')}}
                                                <?php endif ?>
                                            </td>
                                            <td>
                                                <!-- <input type="checkbox" name="campgian_id[]" value="{{ $campaign->id }}" class="winner_id"> -->
                                                <button class="btn btn-block btn-primary sendWinnerMail" data-campaign="{{ $campaign->id }}">Send Mail</button>
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


        <!--  row -->

        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
@endsection