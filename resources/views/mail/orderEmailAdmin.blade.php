<div style="padding: 5px;">

  <div style="width: 100%; display: block">

    <h2 style="font-size: 20px;padding-bottom: 20px;">{{ trans('labels.OrderID') }}# {{ $ordersData['orders_data'][0]->orders_id }} <span style="

    background-color: #3c8dbc;

    display: inline;

    padding: .2em .6em .3em;

    font-weight: 700;

    line-height: 1;

    color: #fff;

    text-align: center;

    white-space: nowrap;

    vertical-align: baseline;

    border-radius: .25em;

    font-size:14px !important;

    position: relative;

    top: -2px;

    margin: 0 5px;

    display: none;

    "> Pending</span> <small style="font-size: 14px;float: right;padding-right: 12px;margin-top: 6px;">{{ trans('labels.OrderedDate') }}: {{ date('d/m/Y', strtotime($ordersData['orders_data'][0]->date_purchased)) }}</small> </h2>

  </div>

  

  <!-- info row -->

  <div style="display: display: block;width: 100%;padding: 0 0 20px;">

    <div style="display: inline-block; width:32%"> <strong>{{ trans('labels.CustomerInfo') }}:</strong>

      <p>

      <span style="text-transform: capitalize;font-style: normal;font-size: 12px;">{{ $ordersData['orders_data'][0]->customers_name }}</span><br><br>

      {{ $ordersData['orders_data'][0]->customers_suburb }}, {{ $ordersData['orders_data'][0]->customers_street_address }},

        {{ $ordersData['orders_data'][0]->customers_city }}, {{ $ordersData['orders_data'][0]->customers_country }}<br><br>

        {{ trans('labels.Phone') }}: +971{{ $ordersData['orders_data'][0]->delivery_phone }}<br><br>

        {{ trans('labels.Email') }}: {{ $ordersData['orders_data'][0]->email }}

      </p>

    </div>

  <!--   <div style="display: inline-block; width:32%"> <strong>{{ trans('labels.ShippingInfo') }}:</strong>

      <address>

      <span style="text-transform: capitalize;">{{ $ordersData['orders_data'][0]->delivery_name }}</span><br>

      {{ $ordersData['orders_data'][0]->delivery_street_address }} <br>

      {{ $ordersData['orders_data'][0]->delivery_city }}, {{ $ordersData['orders_data'][0]->delivery_state }} {{ $ordersData['orders_data'][0]->delivery_postcode }}, {{ $ordersData['orders_data'][0]->delivery_country }}

      </address>

    </div> -->

   <!--  <div style="display: inline-block; width:32%"> <strong>{{ trans('labels.BillingInfo') }}:</strong>

      <address>

      <span style="text-transform: capitalize;">{{ $ordersData['orders_data'][0]->billing_name }}</span><br>

       {{ $ordersData['orders_data'][0]->billing_suburb }},{{ $ordersData['orders_data'][0]->billing_street_address }},
       {{ $ordersData['orders_data'][0]->billing_city }},{{ $ordersData['orders_data'][0]->billing_country }}

       {{ trans('labels.Phone') }}: {{ $ordersData['orders_data'][0]->customers_telephone }}<br>

        {{ trans('labels.Email') }}: {{ $ordersData['orders_data'][0]->email }}

      </address>

    </div> -->

    

    <!-- /.col --> 

  </div>

  <!-- /.row --> 

  

  <!-- Table row -->

  <table class="table table-striped" style="width: 100%;background-color: transparent;margin: 15px 0 15px;">

    <thead>

      <tr>

        <th align="center">{{ trans('labels.Qty') }}</th>

        <th align="center">{{ trans('labels.ProductName') }}</th>

        <th align="center">Donation</th>

        <th align="center">{{ trans('labels.Price') }}</th>

      </tr>

    </thead>

    <tbody style="text-transform: capitalize;font-size: 12px;">

     @foreach($ordersData['orders_data'][0]->data as $key=>$products)

      <tr @if($key%2==0) style="background-color: #f9f9f9;" @endif>

      

        @if($key%2==0) <td align="center" style=" padding: 8px;"> @else <td align="center" style="padding: 8px;"> @endif {{  $products->products_quantity }}</td>


        @if($key%2==0) <td align="center" style=" padding: 8px;"> @else <td align="center" style="padding: 8px;"> @endif  {{  $products->products_name }}<br></td>

        <td  align="center" style=" padding: 8px;">@if($ordersData['donation'] == 1) Yes @else No @endif</td>

        @if($key%2==0) <td align="center" style=" padding: 8px;"> @else <td align="center" style="padding: 8px;"> @endif{{ $ordersData['orders_data'][0]->currency }}{{ $products->final_price }}</td>

       

      </tr>

      @endforeach

      

    </tbody>

  </table>

  

  <!-- /.row -->

  

  <div style="display: block;"> 

    <!-- accepted payments column -->


    <!-- /.col -->

    <div style=" float: right; width:30%"> 

        <table style="width: 100%;padding: 38px 0;">

          <tr>

            <th style="width:50%;padding: 10px 0; border-top: 1px solid #f4f4f4;" align="left">{{ trans('labels.Subtotal') }}:</th>

            <td align="right" style="border-top: 1px solid #f4f4f4;">{{ $ordersData['orders_data'][0]->currency }}{{ $ordersData['subtotal'] }}.00</td>

          </tr>

          <tr>

            <th style="width:50%;padding: 10px 0; border-top: 1px solid #f4f4f4;" align="left">{{ trans('labels.Tax') }}:</th>

            <td align="right" style="border-top: 1px solid #f4f4f4;">{{ $ordersData['orders_data'][0]->currency }}{{ $ordersData['orders_data'][0]->total_tax }}</td>

          </tr>

          <tr>

            <th style="width:50%;padding: 10px 0; border-top: 1px solid #f4f4f4;" align="left">{{ trans('labels.ShippingCost') }}:</th>

            <td align="right" style="border-top: 1px solid #f4f4f4;">{{ $ordersData['orders_data'][0]->currency }}0.00</td>

          </tr>

          @if(!empty($ordersData['orders_data'][0]->coupon_code))

          <tr>

            <th style="width:50%;padding: 10px 0; border-top: 1px solid #f4f4f4;" align="left">{{ trans('labels.DicountCoupon') }}:</th>

            <td align="right" style="border-top: 1px solid #f4f4f4;">{{ $ordersData['orders_data'][0]->currency }}{{ $ordersData['orders_data'][0]->coupon_amount }}</td>

          </tr>

          @endif

          <tr>

            <th style="width:50%;padding: 10px 0; border-top: 1px solid #f4f4f4;" align="left">{{ trans('labels.Total') }}:</th>

            <td align="right" style="border-top: 1px solid #f4f4f4;">{{ $ordersData['orders_data'][0]->currency }}{{ $ordersData['orders_data'][0]->order_price }}</td>

          </tr>

        </table>

        

    </div>

    

    <!-- /.col --> 

  </div>

  <!-- /.row --> 

  

  <!-- /.content --> 

</div>

