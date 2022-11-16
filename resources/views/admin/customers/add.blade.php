@extends('admin.layout')
@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1> {{ trans('labels.AddCustomer') }} <small>{{ trans('labels.AddNEWCustomer') }}...</small> </h1>
    <ol class="breadcrumb">
      <li><a href="{{ URL::to('admin/dashboard/this_month')}}"><i class="fa fa-dashboard"></i> {{ trans('labels.breadcrumb_dashboard') }}</a></li>
      <li><a href="{{ URL::to('admin/customers/display')}}"><i class="fa fa-users"></i> {{ trans('labels.ListingAllCustomers') }}</a></li>
      <li class="active">{{ trans('labels.AddCustomer') }}</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <!-- Info boxes -->

    <!-- /.row -->
    <div class="row">
      <div class="col-md-12">
        <div class="box">
          <div class="box-body">
            <div class="row">
              <div class="col-xs-12">
                <div class="box box-info">
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

                  <div class="box-body">
                    <h4>Customer Overview</h4>
                    <hr>
                    {!! Form::open(array('url' =>'admin/customers/add', 'method'=>'post', 'class' => 'form-horizontal form-validate', 'enctype'=>'multipart/form-data')) !!}

                    <div class="form-group">
                      <label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.FirstName') }} </label>
                      <div class="col-sm-10 col-md-4">
                        {!! Form::text('customers_firstname',  '', array('class'=>'form-control field-validate', 'id'=>'customers_firstname')) !!}
                        <span class="help-block" style="font-weight: normal;font-size: 11px;margin-bottom: 0;">{{ trans('labels.FirstNameText') }}</span>
                        <span class="help-block hidden">{{ trans('labels.textRequiredFieldMessage') }}</span>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.LastName') }} </label>
                      <div class="col-sm-10 col-md-4">
                        {!! Form::text('customers_lastname',  '', array('class'=>'form-control field-validate', 'id'=>'customers_lastname')) !!}
                        <span class="help-block" style="font-weight: normal;font-size: 11px;margin-bottom: 0;">{{ trans('labels.lastNameText') }}</span>
                        <span class="help-block hidden">{{ trans('labels.textRequiredFieldMessage') }}</span>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.DOB') }} </label>
                      <div class="col-sm-10 col-md-4">
                      <div class="row">
             <div class="col-sm-4">
    <select  id="month" name="month" class="form-control field-validate"  onchange="getDays(this)" >
      <option value="">Month</option>
      <?php 
      for ($m=1; $m<=12; $m++) {
     $month = date('F', mktime(0,0,0,$m, 1, date('Y')));
     if($m<10){
       echo '<option value="0'.$m.'">'.$month.'</option>';
     }else{
       echo '<option value="'.$m.'">'.$month.'</option>';
     }
    
     }
     ?>
    </select>
  </div>
        
         <div class="col-sm-4">
    <select id="day" name="day" class="form-control field-validate" >
            <option value="">Day</option>
    </select>
  </div>

          <div class="col-sm-4">
    <select id ="year" name="year"  class="form-control field-validate">
          <option value="">Year</option>
    <?php  
    $years = range(date("Y"), 1910);
foreach($years as $single_year){
  echo '<option value="'.$single_year.'">'.$single_year.'</option>';
}
?>


    </select>
  </div>
  </div>
                        <span class="help-block" style="font-weight: normal;font-size: 11px;margin-bottom: 0;">{{ trans('labels.customers_dobText') }}</span>
                        <span class="help-block hidden">{{ trans('labels.customers_dobText') }}</span>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.Gender') }}</label>
                      <div class="col-sm-10 col-md-4">
                        <label>
                          <input type="radio" name="customers_gender" value="1" class="minimal" checked> {{ trans('labels.Male') }}
                        </label><br>

                        <label>
                          <input type="radio" name="customers_gender" value="0" class="minimal"> {{ trans('labels.Female') }}
                        </label>

                      </div>
                    </div>
                    <div class="form-group">
                      <label for="name" class="col-sm-2 col-md-3 control-label">Marital Status</label>
                      <div class="col-sm-10 col-md-4">
                        <label>
                          <input type="radio" name="customers_marital" value="1" class="minimal" checked> Single
                        </label><br>
                        <label>
                          <input type="radio" name="customers_marital" value="0" class="minimal">Married
                        </label>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="name" class="col-sm-2 col-md-3 control-label">Mobile Number</label>
                      <div class="col-sm-10 col-md-4">
                        {!! Form::number('customers_telephone',  '', array('class'=>'form-control', 'id'=>'customers_telephone')) !!}
                        <span class="help-block" style="font-weight: normal;font-size: 11px;margin-bottom: 0;">
                        {{ trans('labels.TelephoneText') }}</span>
                      </div>
                    </div>
                    <hr>
                    <div class="form-group">
                      <label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.EmailAddress') }} </label>
                      <div class="col-sm-10 col-md-4">
                        {!! Form::text('email',  '', array('class'=>'form-control email-validate', 'id'=>'email')) !!}
                        <span class="help-block" style="font-weight: normal;font-size: 11px;margin-bottom: 0;">
                        {{ trans('labels.EmailText') }}</span>
                        <span class="help-block hidden"> {{ trans('labels.EmailError') }}</span>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.Password') }}</label>
                      <div class="col-sm-10 col-md-4">
                        {!! Form::password('password', array('class'=>'form-control field-validate', 'id'=>'password')) !!}
                        <span class="help-block" style="font-weight: normal;font-size: 11px;margin-bottom: 0;">
                        {{ trans('labels.PasswordText') }}</span>
                        <span class="help-block hidden">{{ trans('labels.textRequiredFieldMessage') }}</span>
                      </div>
                    </div>
                    <h4>Addresses</h4>
                    <sub>The default address of this customer</sub>
                    <hr>

                    <div class="form-group">
                      <label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.FirstName') }}</label>
                      <div class="col-sm-10 col-md-4">
                        {!! Form::text('entry_firstname',  '', array('class'=>'form-control field-validate', 'id'=>'entry_firstname')) !!}
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.LastName') }}</label>
                      <div class="col-sm-10 col-md-4">
                        {!! Form::text('entry_lastname',  '', array('class'=>'form-control field-validate', 'id'=>'entry_lastname')) !!}
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="name" class="col-sm-2 col-md-3 control-label">Street Name</label>
                      <div class="col-sm-10 col-md-4">
                        {!! Form::text('entry_street_address',  '', array('class'=>'form-control field-validate', 'id'=>'entry_street_address')) !!}
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="name" class="col-sm-2 col-md-3 control-label">Building Name, Floor, Apartment or Villa #</label>
                      <div class="col-sm-10 col-md-4">
                        {!! Form::text('buildingno',  '', array('class'=>'form-control field-validate', 'id'=>'buildingno')) !!}
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.Country') }}</label>
                      <div class="col-sm-10 col-md-4">
                        <select name="countries_id" class="form-control" onchange="getCity(this)">
                          <option value="">Please select Country</option>
                          @if(!empty($customers['countries']))

                          @foreach($customers['countries'] as $single_country)
                          <option value="{{$single_country->countries_id}}">{{$single_country->countries_name}}</option>

                          @endforeach
                          @endif

                        </select>
                      
                      </div>
                    </div>
                    <div class="form-group citydropdown hidden">
                      <label for="name" class="col-sm-2 col-md-3 control-label">City</label>
                      <div class="col-sm-10 col-md-4">
                        <select name="city" id="check_ship_city" class="form-control edit-contact-field-validate">
                          <option value=""></option>
                          <option value="Abu Dhabi">Abu Dhabi</option>
                          <option value="Dubai">Dubai</option>
                          <option value="Sharjah">Sharjah</option>
                          <option value="Ajman">Ajman</option>
                          <option value="Um Al Quwain">Umm Al Quwain</option>
                          <option value="Ras Al Khaimah">Ras Al Khaimah</option>
                          <option value="Fujairah">Fujairah</option>

                        </select>
                      </div>
                    </div>
                     <div class="form-group citytext hidden">
                      <label for="name" class="col-sm-2 col-md-3 control-label">City</label>
                      <div class="col-sm-10 col-md-4">
                       <input name="city_text" type="text" value="" class="form-control ">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="name" class="col-sm-2 col-md-3 control-label">Mobile Phone</label>
                      <div class="col-sm-10 col-md-4">
                        {!! Form::number('delivery_phone',  '', array('class'=>'form-control field-validate', 'id'=>'delivery_phone')) !!}
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.DefaultShippingAddress') }}</label>
                      <div class="col-sm-10 col-md-4">
                        <select id="is_default" class="form-control" name="is_default">
                          <option value="1" selected="selected">{{ trans('labels.Yes') }}</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="name" class="col-sm-2 col-md-3 control-label">Add Delivery Instructions</label>
                      <div class="col-sm-10 col-md-4">
                        <label><input type="radio" name="addresstype" checked value="Home">Home (7am-10pm, all days)</label>
                      </div>
                      <div class="col-sm-10 col-md-4">
                        <label><input type="radio" name="addresstype" value="Office">Office (7am-6pm, Weekdays)</label>
                      </div>
                    </div>
                    <h4>Loyality Point</h4>
                    <hr>
                    <div class="form-group">
                        <label for="name" class="col-sm-2 col-md-3 control-label">Loyality Point</label>
                        <div class="col-sm-10 col-md-4">
                            {!! Form::number('redeem_points',0, array('class'=>'form-control' , 'id'=>'redeem_points')) !!}
                            <span class="help-block" style="font-weight: normal;font-size: 11px;margin-bottom: 0;">Please give the customer Redeem Points.</span>
                        </div>
                    </div>
                    <h4>Status</h4>
                    <hr>
                    <div class="form-group">
                      <label for="name" class="col-sm-2 col-md-3 control-label">Account Status </label>
                      <div class="col-sm-10 col-md-4">
                        <select class="form-control" name="isActive">
                          <option value="1">{{ trans('labels.Active') }}</option>
                          <option value="0">{{ trans('labels.Inactive') }}</option>
                        </select>
                        <span class="help-block" style="font-weight: normal;font-size: 11px;margin-bottom: 0;">
                        {{ trans('labels.StatusText') }}</span>
                      </div>
                    </div>
                    <div class="box-footer text-center">
                      <button type="submit" class="btn btn-primary">{{ trans('labels.Submit') }}</button>
                      <a href="{{ URL::to('admin/customers/display')}}" type="button" class="btn btn-default">{{ trans('labels.back') }}</a>
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
