@extends('admin.layout')
@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1> {{ trans('labels.Winners') }} <small>{{ trans('labels.ListingAllImages') }}...</small> </h1>
    <ol class="breadcrumb">
       <li><a href="{{ URL::to('admin/dashboard/this_month') }}"><i class="fa fa-dashboard"></i> {{ trans('labels.breadcrumb_dashboard') }}</a></li>
      <li class="active">{{ trans('labels.Winners') }}</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <!-- Info boxes -->

    <!-- /.row -->

    <div class="row">
      <div class="col-md-12">
        <div class="box">
          <div class="box-header" style="display:block;">
            <div class="col-lg-10 form-inline">

              <div class="col-lg-4 form-inline" id="contact-form12"></div>
          </div>
            <div class="box-tools pull-right">
             <a href="{{ URL::to('admin/add_home_winner') }}" type="button" class="btn btn-block btn-primary">{{ trans('labels.AddWinnerImage') }}</a>
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
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>{{ trans('labels.ID') }}</th>
                      <th>{{ trans('labels.WinnerName') }}</th>
                      <th>{{ trans('labels.Winner Image') }}</th>
                     <th>{{ trans('labels.PrizeTitle') }}</th>
                      <th>{{ trans('labels.languages') }}</th>
                      <th>{{ trans('labels.Action') }}</th>
                    </tr>
                  </thead>
                  <tbody>
                  @if(count($result['sliders'])>0)
                    @foreach ($result['sliders'] as $key=>$sliders)
                        <tr>
                            <td>{{ $sliders->id }}</td>
                            <td>{{ $sliders->winner_title }}
                             </td>


                            <td><img src="{{asset('').$sliders->path}}" alt="" width=" 200px"></td>
                            <td><strong>{{ $sliders->winner_prize }}<br>
                      

                            <td>{{ $sliders->language_name }}</td>
                            <td><a data-toggle="tooltip" data-placement="bottom" title="{{ trans('labels.Edit') }}" href="editwinner/{{ $sliders->id }}" class="badge bg-light-blue"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>

                             <a data-toggle="tooltip" data-placement="bottom" title="{{ trans('labels.Delete') }}" onclick="deleteWinners('{{ $sliders->id }}');" class="badge bg-red"><i class="fa fa-trash" aria-hidden="true"></i></a>
                        </tr>
                    @endforeach
                    @else
                       <tr>
                            <td colspan="5">{{ trans('labels.NoRecordFound') }}</td>
                       </tr>
                    @endif
                  </tbody>
                </table>
                <div class="col-xs-12 text-right">
                	{{$result['sliders']->links('vendor.pagination.default')}}
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

    <!-- deleteSliderModal -->
	<div class="modal fade" id="deleteWinnerModal" tabindex="-1" role="dialog" aria-labelledby="deleteWinnerModalLabel">
	  <div class="modal-dialog" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title" id="deleteWinnerModalLabel">{{ trans('labels.DeleteSlider') }}</h4>
		  </div>
		  {!! Form::open(array('url' =>'admin/deleteWinner', 'name'=>'deleteWinner', 'id'=>'deleteWinner', 'method'=>'post', 'class' => 'form-horizontal', 'enctype'=>'multipart/form-data')) !!}
				  {!! Form::hidden('action',  'delete', array('class'=>'form-control')) !!}
				  {!! Form::hidden('id',  '', array('class'=>'form-control', 'id'=>'winner_id')) !!}
		  <div class="modal-body">
			  <p>{{ trans('labels.DeleteWinnerText') }}</p>
		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">{{ trans('labels.Close') }}</button>
			<button type="submit" class="btn btn-primary" id="deleteSlider">{{ trans('labels.Delete') }}</button>
		  </div>
		  {!! Form::close() !!}
		</div>
	  </div>
	</div>

    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
@endsection
