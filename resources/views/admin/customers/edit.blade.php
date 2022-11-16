@extends('admin.layout')
@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1> {{ trans('labels.EditCustomers') }} <small>{{ trans('labels.EditCurrentCustomers') }}...</small> </h1>
    <ol class="breadcrumb">
      <li><a href="{{ URL::to('admin/dashboard/this_month')}}"><i class="fa fa-dashboard"></i> {{ trans('labels.breadcrumb_dashboard') }}</a></li>
      <li><a href="{{ URL::to('admin/customers/display')}}"><i class="fa fa-users"></i> {{ trans('labels.ListingAllCustomers') }}</a></li>
      <li class="active">{{ trans('labels.EditCustomers') }}</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <!-- Info boxes -->

    <!-- /.row -->
    @if(session('error'))
    <div class="alert alert-success">{{session('error')}}</div>
    @endif



    <div class="row">
      <div class="col-md-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">{{ trans('labels.EditCustomers') }} </h3>
          </div>

          <!-- /.box-header -->
          <div class="box-body">
            <div class="row">
              <div class="col-xs-12">
                <div class="box box-info">
                  <!--<div class="box-header with-border">
                                          <h3 class="box-title">Edit category</h3>
                                        </div>-->
                  <!-- /.box-header -->
                  <br>
                  @if (session('update'))
                  <div class="alert alert-success alert-dismissable custom-success-box" style="margin: 15px;">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong> {{ session('update') }} </strong>
                  </div>
                  @endif
                  @if (count($errors) > 0)
                  @if($errors->any())
                  <div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    {{$errors->first()}}
                  </div>
                  @endif
                  @endif


                  <!-- form start -->
                  <div class="box-body">
                    <h3>Customer Overview</h3>
                    {!! Form::open(array('url' =>'admin/customers/update', 'method'=>'post', 'class' => 'form-horizontal form-validate', 'enctype'=>'multipart/form-data')) !!}

                    {!! Form::hidden('customers_id', $data['customers']->id, array('class'=>'form-control', 'id'=>'id')) !!}

                    <div class="form-group">

                      <label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.FirstName') }}* </label>
                      <div class="col-sm-10 col-md-4">
                        {!! Form::text('first_name', $data['customers']->first_name, array('class'=>'form-control field-validate', 'id'=>'first_name')) !!}
                        <span class="help-block" style="font-weight: normal;font-size: 11px;margin-bottom: 0;">{{ trans('labels.FirstNameText') }}</span>
                        <span class="help-block hidden">{{ trans('labels.textRequiredFieldMessage') }}</span>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.LastName') }}*</label>
                      <div class="col-sm-10 col-md-4">
                        {!! Form::text('last_name', $data['customers']->last_name , array('class'=>'form-control field-validate', 'id'=>'last_name')) !!}
                        <span class="help-block" style="font-weight: normal;font-size: 11px;margin-bottom: 0;">{{ trans('labels.lastNameText') }}</span>
                        <span class="help-block hidden">{{ trans('labels.textRequiredFieldMessage') }}</span>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.Gender') }}*</label>
                      <div class="col-sm-10 col-md-4">
                        <label>
                          <input @if($data['customers']->gender == 0 or empty($data['customers']->gender)) checked @endif type="radio" name="gender" value="0" class="minimal" checked >
                          {{ trans('labels.Male') }}
                        </label><br>

                        <label>
                          <input @if( !empty($data['customers']->gender) and $data['customers']->gender == 1) checked @endif type="radio" name="gender" value="1" class="minimal">
                          {{ trans('labels.Female') }}
                        </label>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.DOB') }}*</label>
                      <div class="col-sm-10 col-md-4">



                        <?php $dob = $data['customers']->dob;
                        if (!empty($dob)) {
                          $explode = explode("/", $dob);
                          $month_db = $explode[0];
                          $day_db = $explode[1];
                          $year_db = $explode[2];
                        } else {
                          $month_db = "";
                          $day_db = "";
                          $year_db = "";
                        }


                        function daysInMonth($year, $month)
                        {
                          if (!empty($year) &&  !empty($month)) {
                            return date("t", mktime(0, 0, 0, $month, 1, $year));
                          } else {
                            return 0;
                          }
                        }
                        ?>


                        <div class="row">
                          <div class="col-sm-4">
                            <select id="month" name="month" class="form-control field-validate" onchange="getDays(this)">
                              <option value="">Month</option>
                              <?php
                              for ($m = 1; $m <= 12; $m++) {
                                $month = date('F', mktime(0, 0, 0, $m, 1, date('Y')));
                                $month_option = $m;
                                if ($m < 10) {
                                  $month_option = "0" . $m;
                                }
                                if ($month_option == $month_db) {
                                  echo '<option value="' . $month_option . '" selected>' . $month . '</option>';
                                } else {
                                  echo '<option value="' . $month_option . '">' . $month . '</option>';
                                }
                              }
                              ?>
                            </select>
                          </div>

                          <div class="col-sm-4">
                            <select id="day" name="day" class="form-control field-validate">
                              <option value="">Day</option>
                              <?php
                              $days_in_month = daysInMonth($year_db, $month_db);
                              if ($days_in_month) {

                                for ($is = 1; $is <= $days_in_month; $is++) {
                                  $day_value = $is;
                                  if ($is < 10) {
                                    $day_value = "0" . $is;
                                  }
                                  if ($day_value == $day_db) {
                                    echo "<option value='" . $day_value . "' selected>" . $is . "</option>";
                                  } else {
                                    echo "<option value='" . $day_value . "'>" . $is . "</option>";
                                  }
                                }
                              }





                              ?>
                            </select>
                          </div>

                          <div class="col-sm-4">
                            <select id="year" name="year" class="form-control field-validate">
                              <option value="">Year</option>
                              <?php
                              $years = range(date("Y"), 1910);
                              foreach ($years as $single_year) {
                                if ($single_year == $year_db) {
                                  echo '<option value="' . $single_year . '" selected>' . $single_year . '</option>';
                                } else {
                                  echo '<option value="' . $single_year . '">' . $single_year . '</option>';
                                }
                              }


                              ?>


                            </select>
                          </div>
                        </div>

                        <span class="help-block" style="font-weight: normal;font-size: 11px;margin-bottom: 0;">{{ trans('labels.customers_dobText') }}</span>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.Telephone') }}</label>
                      <div class="col-sm-10 col-md-4">
                        {!! Form::text('phone', $data['customers']->phone, array('class'=>'form-control', 'id'=>'phone')) !!}
                        <span class="help-block" style="font-weight: normal;font-size: 11px;margin-bottom: 0;">{{ trans('labels.TelephoneText') }}</span>
                      </div>
                    </div>

                    <!--     <div class="form-group">
                                          <label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.Date_Of_Birth') }}</label>
                                          <div class="col-sm-10 col-md-4">
                                            {!! Form::text('dob',  $data['customers']->dob, array('class'=>'form-control', 'id'=>'dob')) !!}
                                            <span class="help-block" style="font-weight: normal;font-size: 11px;margin-bottom: 0;">{{ trans('labels.dob_text') }}</span>
                                          </div>
                                        </div> -->


                    <div class="form-group">
                      <label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.changePassword') }}</label>
                      <div class="col-sm-10 col-md-4">
                        {!! Form::checkbox('changePassword', 'yes', null, ['class' => '', 'id'=>'change-passowrd']) !!}
                      </div>
                    </div>

                    <!-- <div class="form-group password_content">-->
                    <div class="form-group password" style="display: none">
                      <label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.Password') }}*</label>
                      <div class="col-sm-10 col-md-4">
                        {!! Form::password('password', array('class'=>'form-control ', 'id'=>'password')) !!}
                        <span class="help-block" style="font-weight: normal;font-size: 11px;margin-bottom: 0;">
                          {{ trans('labels.PasswordText') }}</span>
                        <span class="help-block hidden">{{ trans('labels.textRequiredFieldMessage') }}</span>
                      </div>
                    </div>
                    <h4>Loyality Point</h4>
                    <hr>
                    <div class="form-group">
                      <label for="name" class="col-sm-2 col-md-3 control-label">Loyality Point</label>
                      <div class="col-sm-10 col-md-4">
                        {!! Form::number('redeem_points',$data['customers']->redeem_points, array('class'=>'form-control' , 'id'=>'redeem_points')) !!}
                        <span class="help-block" style="font-weight: normal;font-size: 11px;margin-bottom: 0;">Please give the customer Redeem Points.</span>
                      </div>
                    </div>
                    <h4>Status</h4>
                    <hr>
                    <div class="form-group">
                      <label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.Status') }}
                      </label>
                      <div class="col-sm-10 col-md-4">
                        <select class="form-control" name="status">
                          <option @if($data['customers']->status == 1)
                            selected
                            @endif
                            value="1">{{ trans('labels.Active') }}</option>
                          <option @if($data['customers']->status == 0)
                            selected
                            @endif
                            value="0">{{ trans('labels.Inactive') }}</option>
                        </select><span class="help-block" style="font-weight: normal;font-size: 11px;margin-bottom: 0;">{{ trans('labels.StatusText') }}</span>

                      </div>
                    </div>

                    <!-- /.box-body -->
                    <div class="box-footer text-center">
                      <button type="submit" class="btn btn-primary">{{ trans('labels.Submit') }} </button>
                      <a href="{{ URL::to('admin/customers/display')}}" type="button" class="btn btn-default">{{ trans('labels.back') }}</a>
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