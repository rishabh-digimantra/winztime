@extends('admin.layout')

<?php 



function sequenceNumber($id) {

  $slots = '00000';

  $len = strlen($id);

 

  if ($len >! 5) {

    $num = -1 * abs($len);



    $seq = substr_replace($slots,$id,$num);

    return $seq;

  }else{

    return $id;

  }

}



 ?>

<style>

.wrapper.wrapper2{

	display: block;

}

.wrapper{

	display: none;

}

</style>

<style>

   *{box-sizing: border-box;}

  ul{padding: 0;margin: 0;}

  body{ font-family: sans-serif;}

  ul, li{list-style-type: none;}

  .pdf-section{padding:0;}

  .pdf-section .header{border-bottom: 1px solid #ccc;padding-bottom: 10px;}

  table{width: 100%;}

  .pdf-section .header table tr td{width: 33.33%;}

  .pdf-section .header table tr td img{ width: 155px; }

  .pdf-section .header table tr td p{ margin: 0 0 6px; font-size: 13px; line-height: 1.2;}

  .pdf-section .header table tr td h3{ font-size: 18px; margin: 0;}

  .user-info-1{ padding: 50px 0;}

  .user-info-1 ul{display: inline-block;vertical-align: middle;}

  .user-info-1 .nameWrap{ width: 49%;}

  .user-info-1 ul li{ font-size: 15px; margin-bottom: 5px;max-width: 300px;width: 100%;}

  .user-info-1 ul li strong{min-width: 150px; display: inline-block;}

  .purchaseWrap{}

  .purchaseWrap table{border-collapse: collapse; margin-bottom: 15px;}

  .purchaseWrap table td, .purchaseWrap table th{ border: 1px solid #ccc; padding:10px; width: 10%;font-size: 14px;}

  .purchaseWrap table thead{}

  .purchaseWrap table thead tr{}

  .purchaseWrap table thead tr th{ padding:10px;}

  .purchaseWrap table thead tr th:nth-child(2) {width: 16%;}

  .purchaseWrap table tbody{}

  .purchaseWrap table tbody tr{}

  .purchaseWrap table tbody tr td, .purchaseWrap table tbody tr th{}

  .purchaseWrap table tbody tr td{text-align: center;}

  .purchaseWrap table tbody tr th{text-align: right;}

  .purchaseWrap table tbody tr th:nth-child(2) {text-align: left;}

  .purchaseWrap table tfoot{}

  .purchaseWrap table tfoot tr{}

  .purchaseWrap table tfoot tr th:last-child {text-align: right;}

  .purchaseWrap table tfoot tr th:first-child {text-align: left;}

  .purchaseWrap table tfoot tr th, .purchaseWrap table tfoot tr td{}

  .purchaseWrap table tfoot tr th{}

  .purchaseWrap table tfoot tr td{}

  .purchaseWrap table tfoot tr:last-child{ border: 4px solid #000;}

  .purchaseWrap table tfoot tr:last-child th:first-child {font-weight: 900;}

  .purchaseWrap p{border: 1px solid #ccc;margin: 0;padding: 25px;text-align: center; font-size: 16px;}

  .ticketsSec {padding: 0;}

  .ticketsSec ul.listPointWrp{padding: 12px 20px;border-bottom: 1px solid #ccc;} 

  .ticketsSec ul.listPointWrp li{ margin-bottom: 5px;line-height: 1.4;} 

  /*.ticketsSec ul.listPointWrp li::before {content: "";height: 6px;width: 6px;background: #000;display: inline-block;border-radius: 50%;vertical-align: middle;margin-right: 8px;}*/

  .ticketsSec h4{ margin: 5px 0; padding: 0; font-size: 11px;} 

  .pdfTermSec{}

  .pdfTermSec .pdfTermSecWrp{ padding: 40px;}

  .pdfTermSec h2{ margin: 0 0 25px; text-align: center; font-size: 24px;}

  .pdfTermSec p{ margin: 6px 0;color: #000;opacity: 0.5;}

  .pdfTermSec p small{}

  .pdfTermSec ul{}

  .pdfTermSec ul li{ line-height: 1.4; margin-top: 20px;}







.thankCoupon{position: relative;}

.thankCoupon .thankCoup { box-shadow: 0 0 5px #ccc;width: 100%;background: #fff;border-radius: 20px;display: block;overflow: hidden;padding: 20px 35px 10px;position: relative;border: 2px solid #ccc;margin: 0 auto 0;}

.thankCoupon .thankCoup::before, .thankCoupon .thankCoup::after { content: ""; position: absolute; top: 0; bottom: 0; left: 0; border: 10px solid #ffff00;}

.thankCoupon .thankCoup::after {left: auto;right:0;}

/*.myLeftBox, .myRghtBox{ position: absolute; top: 0; bottom: 0; left: 0; background: #000; width: 30px;}

.myRghtBox{left: auto;right:0;}*/

.thankCoupon .thankCoup figcaption .descCoup{display: block; text-align: left;}

.thankCoupon .thankCoup figcaption .descCoup .logo img {height: 30px;filter: brightness(0);}

.thankCoupon .thankCoup figcaption .descCoup ul{  }

.thankCoupon .thankCoup figcaption .descCoup ul li{ margin: 0; font-size: 15px;}

.thankCoupon .thankCoup figcaption .descCoup ul li strong{  }

.thankCoupon .thankCoup figcaption .descCoup ul li span{  }

.thankCoupon .thankCoup figcaption .descCoup .coupProImg{margin-top: 10px;}

.thankCoup figcaption .descCoup ul li {display: inline-block;vertical-align: middle;width: 49.5%;color: #000;}

/*.thankCoup figcaption .descCoup ul li:last-child {text-align: right;}*/

.thankCoup figcaption .descCoup ul li figure{width: 100%;position: relative;margin: 0;}

.thankCoup figcaption .descCoup ul li figure img{width: 75px;}

.thankCoupon .thankCoup figcaption figure {width: 33%;text-align: right;}

.thankCoupon .thankCoup figcaption figure p{margin-bottom: 25px;}

.thankCoup figcaption .descCoup ul li span{background:#3e6ae1;color: #fff;height: 35px;width: 35px;display: inline-block;text-align: center;line-height: 35px;border-radius: 50%;margin-left: 6px;}

.thankCoup figcaption .descCoup ul li strong{margin-left: 5px;}

.thankCoupon .closCoup {margin-top: 10px; line-height: 1;}

.thankCoup figcaption .closCoup h5{display: inline-block;font-weight: 400;margin: 0; width: 49.5%; font-size: 11px; vertical-align: middle;margin-bottom: 0;text-align: left;color: #000;}

.couponPdf > li{position: relative;max-width: 500px;width: 100%; display: inline-block;vertical-align: top;padding: 4px;margin: 4px; border: 2px dashed #ccc;border-radius: 20px;}

.thankCoup figcaption .closCoup h5.text-right{text-align: right;}

</style>



<body data-new-gr-c-s-check-loaded="14.1000.0" data-gr-ext-installed="" onload="window.print();">

  <button onclick="window.print();" class="btn">Print</button>

    <section class="pdf-section">

      <div class="">

        <div class="ticketsSec">

        <!--   <h4>Focus Hoodie with a chance to win AED ONE MILLION</h4> -->

          <ul class="couponPdf thankCoupon">
            @foreach($result['campaign'] as $products)

             

                <li>

                  <div class="thankCoup thankOrgTick">

                    <figcaption>

                      <div class="descCoup">

                        <ul>

                          <li class="logo first"><img src='{{asset("web/assets/images/logo-tick.png")}}' alt="*"></li>

                          <li>{{$products->id}}</li>

                        </ul>

                        <?php $reward = App\Models\Core\Order::getRewardInfo($products->reward_id); 

                              $customerinfo = App\Models\Core\User::getCustomerInfo($products->customers_id); 

                              ?>

                        <ul class="coupProImg">

                          <li class="first">{{$reward[0]->title}} </li>

                          <li class="last"><figure><img src="{{asset('images/'.$reward[0]->reward_image)}}" alt="*"></figure></li>

                        </ul>

                      </div>

                      <div class="closCoup">
                        @if(isset($products->custom_name))
                          <h4>Purchased By: <strong>{{$products->custom_name}}</strong></h4>
                        @else
                          @if(isset($customerinfo[0]->first_name))
                            <h4>Purchased By: <strong>{{$customerinfo[0]->first_name}} {{$customerinfo[0]->last_name}}</strong></h4>
                          @else
                            <h4>Purchased By: <strong>John Doe</strong></h4>
                          @endif
                        @endif
                        
                        <h5>Purchased On: <strong>{{date('H:i A, d M Y', strtotime($products->created_at))}}</strong></h5>

                        <h5 class="text-right">Coupon Number: <strong>Z-{{sequenceNumber($products->campaign_id)}}-{{sequenceNumber($products->ticket_number)}}-{{$products->type}}</strong></h5>

                      </div>

                    </figcaption>

                  </div>

                </li>

         

            @endforeach

          </ul>

        </div>

      </div>

    </section>



  </body>