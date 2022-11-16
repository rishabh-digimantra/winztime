@extends('admin.layout')
@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1> {{ trans('labels.EditWinnerImage') }} <small>{{ trans('labels.EditWinnerImage') }}...</small> </h1>
    <ol class="breadcrumb">
       <li><a href="{{ URL::to('admin/dashboard/this_month') }}"><i class="fa fa-dashboard"></i> {{ trans('labels.breadcrumb_dashboard') }}</a></li>
      <li><a href="{{ URL::to('admin/home_winners')}}"><i class="fa fa-bars"></i> {{ trans('labels.Winners') }}</a></li>
      <li class="active">{{ trans('labels.EditWinnerImage') }}</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <!-- Info boxes -->

    <!-- /.row -->
    <style>
      .selectedthumbnail {
          display: block;
          margin-bottom: 10px;
          padding: 0;
      }
      .thumbnail {
          padding: 0;
      }
      .closimage{
        position: relative
      }

  
  .form-group.has-error #imageselected{
   border: 1px solid  #ffff00;
  }

      </style>

    <div class="row">
      <div class="col-md-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">{{ trans('labels.EditWinnerImage') }} </h3>
          </div>

          <!-- /.box-header -->
          <div class="box-body">
            <div class="row">
              <div class="col-xs-12">
              		<div class="box box-info">
                    <br>
                        @if (count($errors) > 0)
                              @if($errors->any())
                                <div class="alert alert-success alert-dismissible" role="alert">
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                  {{$errors->first()}}
                                </div>
                              @endif
                          @endif
                        <!--<div class="box-header with-border">
                          <h3 class="box-title">Edit category</h3>
                        </div>-->
                        <!-- /.box-header -->
                        <!-- form start -->
                         <div class="box-body">

                            {!! Form::open(array('url' =>'admin/updateWinner', 'method'=>'post', 'class' => 'form-horizontal form-validate', 'enctype'=>'multipart/form-data')) !!}

                                {!! Form::hidden('id',  $result['sliders']->id , array('class'=>'form-control', 'id'=>'id')) !!}
                                {!! Form::hidden('oldImage',  $result['sliders']->winner_image, array('id'=>'oldImage')) !!}
                                
                                <div class="form-group">
                                  <label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.Language') }}</label>
                                  <div class="col-sm-10 col-md-4">
                                      <select class="form-control" name="languages_id">
                                          @foreach($result['languages'] as $language)
                                              <option value="{{$language->languages_id}}" @if($language->languages_id==$result['sliders']->languages_id) selected @endif>{{ $language->name }}</option>
                                          @endforeach
                                      </select>
                                      <span class="help-block" style="font-weight: normal;font-size: 11px;margin-bottom: 0;">
                                      {{ trans('labels.ChooseLanguageText') }}</span>
                                  </div>
                                </div>

                                <div class="form-group">
                                  <label for="title" class="col-sm-2 col-md-3 control-label">{{ trans('labels.WinnerName') }}</label>
                                  <div class="col-sm-10 col-md-4">
                                    {!! Form::text('winner_title',  $result['sliders']->winner_title, array('class'=>'form-control field-validate', 'id'=>'winner_title'))!!}
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label for="title" class="col-sm-2 col-md-3 control-label">{{ trans('labels.PrizeTitle') }}</label>
                                  <div class="col-sm-10 col-md-4">
                                    {!! Form::text('winner_prize',  $result['sliders']->winner_prize, array('class'=>'form-control field-validate', 'id'=>'winner_prize'))!!}
                                  </div>
                                </div>

                              <div class="form-group">
                                <label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.Winner Image') }}</label>
                                <div class="col-sm-10 col-md-4">
                                    {{--{!! Form::file('newImage', array('id'=>'newImage')) !!}--}}
                                    <!-- Modal -->
                                        <div class="modal fade embed-images" id="Modalmanufactured" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" id ="closemodal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                                        <h3 class="modal-title text-primary" id="myModalLabel">{{ trans('labels.Choose Winner Image') }} </h3>
                                                    </div>
                                                    <div class="modal-body manufacturer-image-embed">
                                                        @if(isset($allimage))
                                                            <select class="image-picker show-html " name="image_id" id="select_img">
                                                                <option  value=""></option>
                                                                @foreach($allimage as $key=>$image)
                                                                    <option data-img-src="{{asset($image->path)}}"  class="imagedetail" data-img-alt="{{$key}}" value="{{$image->id}}"> {{$image->id}} </option>
                                                                @endforeach
                                                            </select>
                                                        @endif
                                                    </div>
                                                    <div class="modal-footer">
                                                      <a href="{{url('admin/media/add')}}" target="_blank" class="btn btn-primary pull-left" >{{ trans('labels.Add Image') }}</a>
                                                      <button type="button" class="btn btn-default refresh-image"><i class="fa fa-refresh"></i></button>
                                                      <button type="button" class="btn btn-success" id="selectedICONE" data-dismiss="modal">{{ trans('labels.Done') }}</button>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                        <div id ="imageselected">
                                            {!! Form::button(trans('labels.Add Image'), array('id'=>'newImage','class'=>"btn btn-primary", 'data-toggle'=>"modal", 'data-target'=>"#Modalmanufactured" )) !!}
                                            
                                            <div id="selectedthumbnailIcon" style="display:none" class="selectedthumbnail col-md-12"> </div>
                                            <div class="closimage">
                                                <button type="button" class="close pull-left image-close " id="image-Icone"
                                                style="display:none; position: absolute;left: -3px !important;top: 15px !important;background-color: black;color: white;opacity: 2.2;" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            
                                        </div>

                                        <br>
                                        <div>
                                        {!! Form::hidden('oldImage', $result['sliders']->winner_image, array('id'=>'oldImage')) !!}
                                        @if(($result['languages'][0]->path!== null))
                                            <img width="200px" src="{{asset($result['sliders']->path)}}" class="old_image">
                                        @else
                                            <img width="200px" src="{{asset($result['sliders']->path) }}" class="old_image">
                                        @endif
                                        </div>
                                </div>
                            </div>

                                <div class="form-group" >
                                  <label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.Status') }}</label>
                                  <div class="col-sm-10 col-md-4">
                                      <select class="form-control" name="status">
                                          <option value="1" @if($result['sliders']->status==1) selected @endif>{{ trans('labels.Active') }}</option>
                                          <option value="0" @if($result['sliders']->status==0) selected @endif>{{ trans('labels.Inactive') }}</option>
                                      </select>
                                     <span class="help-block" style="font-weight: normal;font-size: 11px;margin-bottom: 0;">
                                      {{ trans('labels.StatusSliderText') }}</span>
                                  </div>
                                </div>


                              <!-- /.box-body -->
                              <div class="box-footer text-center">
                                <button type="submit" class="btn btn-primary">{{ trans('labels.Submit') }}</button>
                                <a href="{{ URL::to('admin/home_winners')}}" type="button" class="btn btn-default">{{ trans('labels.back') }}</a>
                              </div>
                              <!-- /.box-footer -->
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
