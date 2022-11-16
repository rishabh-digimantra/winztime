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
  .pdf-section{padding: 80px 0;}
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
  .purchaseWrap table td, .purchaseWrap table th{ border: 1px solid #ccc; padding:10px; width: 10%;font-size: 14px; text-align: center;}
  .purchaseWrap table thead{}
  .purchaseWrap table thead tr{}
  .purchaseWrap table thead tr th{ padding:10px;}
  .purchaseWrap table thead tr th:nth-child(2) {width: 16%;}
  .purchaseWrap table tbody{}
  .purchaseWrap table tbody tr{}
  .purchaseWrap table tbody tr td, .purchaseWrap table tbody tr th{}
  .purchaseWrap table tbody tr td{}/*
  .purchaseWrap table tbody tr th{text-align: right;}
  .purchaseWrap table tbody tr th:nth-child(2) {text-align: left;}*/
  .purchaseWrap table tfoot{}
  .purchaseWrap table tfoot tr{}/*
  .purchaseWrap table tr th:last-child, .purchaseWrap table tr td:last-child {text-align: right;}
   .purchaseWrap table tr th:first-child, .purchaseWrap table tr td:first-child {text-align: center;}*/
  .purchaseWrap table tfoot tr th, .purchaseWrap table tfoot tr td{}
  .purchaseWrap table tfoot tr th{}
  .purchaseWrap table tfoot tr td{}
  .purchaseWrap table tfoot tr:last-child{ border: 4px solid #000;}
  .purchaseWrap table tfoot tr:last-child th:first-child {font-weight: 900;}
  .purchaseWrap p{border: 1px solid #ccc;margin: 0;padding: 25px;text-align: center; font-size: 16px;}
  .ticketsSec {padding: 60px 0;}
  .ticketsSec ul.listPointWrp{padding: 12px 20px;border-bottom: 1px solid #ccc;} 
  .ticketsSec ul.listPointWrp li{ margin-bottom: 5px;line-height: 1.4;} 
  /*.ticketsSec ul.listPointWrp li::before {content: "";height: 6px;width: 6px;background: #000;display: inline-block;border-radius: 50%;vertical-align: middle;margin-right: 8px;}*/
  .ticketsSec h4{ margin: 20px 0px 0 0; padding: 20px; font-size: 22px;} 
  .pdfTermSec{}
  .pdfTermSec .pdfTermSecWrp{ padding: 40px;}
  .pdfTermSec h2{ margin: 0 0 25px; text-align: center; font-size: 24px;}
  .pdfTermSec p{ margin: 6px 0;color: #000;opacity: 0.5;}
  .pdfTermSec p small{}
  .pdfTermSec ul{}
  .pdfTermSec ul li{ line-height: 1.4; margin-top: 20px;}



.thankCoupon{position: relative;text-align: center;}
.thankCoupon .thankCoup { box-shadow: 0 0 5px #ccc;width: 100%;background: #fff;border-radius: 20px;display: block;overflow: hidden;padding: 20px 35px 10px;position: relative;border: 2px solid #ccc;margin: 0 auto 0;}
.thankCoupon .thankCoup::before, .thankCoupon .thankCoup::after { content: ""; position: absolute; top: 0; bottom: 0; left: 0; border: 10px solid #000;}
.thankCoupon .thankCoup::after {left: auto;right:0;}
/*.myLeftBox, .myRghtBox{ position: absolute; top: 0; bottom: 0; left: 0; background: #000; width: 30px;}
.myRghtBox{left: auto;right:0;}*/
.thankCoupon .thankCoup figcaption .descCoup{display: block; text-align: left;}
.thankCoupon .thankCoup figcaption .descCoup .logo img {height: 15px;}
.thankCoupon .thankCoup figcaption .descCoup ul{  }
.thankCoupon .thankCoup figcaption .descCoup ul li{ margin: 0; font-size: 15px;}
.thankCoupon .thankCoup figcaption .descCoup ul li strong{  }
.thankCoupon .thankCoup figcaption .descCoup ul li span{  }
.thankCoupon .thankCoup figcaption .descCoup .coupProImg{margin-top: 10px;}
.thankCoup figcaption .descCoup ul li {display: inline-block;vertical-align: middle;width: 49.5%;}
/*.thankCoup figcaption .descCoup ul li:last-child {text-align: right;}*/
.thankCoup figcaption .descCoup ul li figure{width: 100%;position: relative;margin: 0;}
.thankCoup figcaption .descCoup ul li figure img{width: 75px;}
.thankCoupon .thankCoup figcaption figure {width: 33%;text-align: right;}
.thankCoupon .thankCoup figcaption figure p{margin-bottom: 25px;}
.thankCoup figcaption .descCoup ul li span{background:#3e6ae1;color: #fff;height: 35px;width: 35px;display: inline-block;text-align: center;line-height: 35px;border-radius: 50%;margin-left: 6px;}
.thankCoup figcaption .descCoup ul li strong{margin-left: 5px;}
.thankCoupon .closCoup {margin-top: 10px; line-height: 1;}
.thankCoup figcaption .closCoup h5{display: inline-block;font-weight: 400;margin: 0; width: 49.5%; font-size: 11px; vertical-align: middle;margin-bottom: 0;text-align: left;}
.couponPdf > li{position: relative;max-width: 500px;width: 100%; display: inline-block;vertical-align: top;padding: 5px;margin: 8px; border: 2px dashed #ccc;border-radius: 20px;}
.thankCoup figcaption .closCoup h5.text-right{text-align: right;}
</style>

<body data-new-gr-c-s-check-loaded="14.1000.0" data-gr-ext-installed="" onload="window.print();">
    <section class="pdf-section">
      <div class="">
        <div class="table header">
          <div class="row">
           @if(session()->has('message'))
            <div class="alert alert-success alert-dismissible">
               <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
               <h4><i class="icon fa fa-check"></i> {{ trans('labels.Successlabel') }}</h4>
                {{ session()->get('message') }}
            </div>
            @endif
            @if(session()->has('error'))
              <div class="alert alert-warning alert-dismissible">
                   <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                   <h4><i class="icon fa fa-warning"></i> {{ trans('labels.WarningLabel') }}</h4>
                    {{ session()->get('error') }}
                </div>
            @endif
            
            
           </div>
          <table>
            <tbody><tr>
              <td><img src='{{asset("images/luciLogo.png")}}' alt="*"></td>
              <td style="text-align: center;"><p><strong>Lucramania Fitness Equipments</strong></p><p>Address: Sapphire Tower, Al Ittihad Road, Dubai</p>
                <!-- <p>TRN: 000000000000000</p> -->
              </td>
              <td style="text-align: right;"><h3>Tax Invoice</h3></td>
            </tr>
          </tbody></table>
        </div>
        <div class="user-info-1">
          <ul class="nameWrap">
            <li><strong>Customer Name</strong>: {{ $data['orders_data'][0]->customers_name }}</li>
            <!-- <li><strong>Address</strong >:{{ $data['orders_data'][0]->customers_street_address }} <br>
            {{ $data['orders_data'][0]->customers_city }}, {{ $data['orders_data'][0]->customers_state }} {{ $data['orders_data'][0]->customers_postcode }}, {{ $data['orders_data'][0]->customers_country }}</li> -->
            <li><strong>Address</strong >: {{ $data['orders_data'][0]->customers_country }}</li>
          </ul>
          <ul>
            <li><strong>Invoice No.</strong>: {{sequenceNumber($data['orders_data'][0]->orders_id)}}</li>
            <li><strong>Invoice Date</strong>: {{ date('m/d/Y', strtotime($data['orders_data'][0]->date_purchased)) }}</li>
            <li><strong>Order Status</strong>:  Completed</li>
          </ul>
        </div>
        <div class="table purchaseWrap">
          <table>
            <thead>
              <tr>
                <th>Sr. No.</th>
                <th>Products</th>
                <th>Campaign No.</th>
                <th>Quantity</th>
                <th>Unit Price</th>
                <th>Amount Excluding Tax</th>
                <th>Tax Rate %</th>
                <th>Tax Payable</th>
                <th>Amount Including Tax</th>
              </tr>
            </thead>
            <tbody>
              <?php $i = 1; ?>
              @foreach($data['orders_data'][0]->data as $products)
              <tr>
                <th>{{$i}}</th>
                <th>{{  $products->products_name }}</th>
                <td>LU-{{sequenceNumber($products->campaign_id)}}</td>
                <td>{{  $products->products_quantity }}</td>
                <td>@if(!empty($result['commonContent']['currency']->symbol_left)) {{$result['commonContent']['currency']->symbol_left}} @endif {{ $products->final_price }} @if(!empty($result['commonContent']['currency']->symbol_right)) {{$result['commonContent']['currency']->symbol_right}} @endif</td>
                <td>@if(!empty($result['commonContent']['currency']->symbol_left)) {{$result['commonContent']['currency']->symbol_left}} @endif {{ $products->final_price }} @if(!empty($result['commonContent']['currency']->symbol_right)) {{$result['commonContent']['currency']->symbol_right}} @endif</td>
                <td>0%</td>
                <td>@if(!empty($result['commonContent']['currency']->symbol_left)) {{$result['commonContent']['currency']->symbol_left}} @endif {{ $data['orders_data'][0]->total_tax }} @if(!empty($result['commonContent']['currency']->symbol_right)) {{$result['commonContent']['currency']->symbol_right}} @endif</td>
                
                <td>
                  @if(!empty($result['commonContent']['currency']->symbol_left)) {{$result['commonContent']['currency']->symbol_left}} @endif {{ $products->final_price }} @if(!empty($result['commonContent']['currency']->symbol_right)) {{$result['commonContent']['currency']->symbol_right}} @endif
                </td>
              </tr>
              <?php $i++; ?>
              @endforeach
            </tbody>
            <tfoot>
              <tr>
                <th>Total</th>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <th> @if(!empty($result['commonContent']['currency']->symbol_left)) {{$result['commonContent']['currency']->symbol_left}} @endif {{ $data['subtotal'] }}.00 @if(!empty($result['commonContent']['currency']->symbol_right)) {{$result['commonContent']['currency']->symbol_right}} @endif</th>
              </tr>
              <tr>
                <th>Discount</th>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <th>@if(!empty($result['commonContent']['currency']->symbol_left)) {{$result['commonContent']['currency']->symbol_left}} @endif {{ $data['orders_data'][0]->coupon_amount }}.00 @if(!empty($result['commonContent']['currency']->symbol_right)) {{$result['commonContent']['currency']->symbol_right}} @endif</th>
              </tr>
              <tr>
              <th>Grand Total</th>
              <td></td>
              <td></td>
              <th></th>
              <th></th>
              <td></td>
              <td></td>
              <th></th>
              <th>@if(!empty($result['commonContent']['currency']->symbol_left)) {{$result['commonContent']['currency']->symbol_left}} @endif {{ $data['subtotal'] }}.00  @if(!empty($result['commonContent']['currency']->symbol_right)) {{$result['commonContent']['currency']->symbol_right}} @endif</th>
            </tr>
            </tfoot>
          </table>
          <p>This is a system generated invoice. No stamp or signature required.</p>
        </div>
        <div class="ticketsSec">
          <div class="header">
            <table>
              <tbody><tr>
                <td><img src='{{asset("images/luciLogo.png")}}' alt="*"></td>
                <td></td>
                <td style="text-align: right;"><h3>Tickets</h3></td>
              </tr>
            </tbody></table>
          </div>
          <ul class="listPointWrp">
            <li>When you purchase a product, Lucramania will reward you with a complimentary ticket in the prize draw. When this happens, the ticket will be denoted with '-O' indicating that it is the original ticket.</li>
            <li>When you purchase a product and opt to donate it, Lucramania will reward you with an additional complimentary ticket in the prize draw. When this happens, the additional ticket will be denated with '-D' indicating that it is the ticket issued from donating the product.</li>
            <li>When you purchase from a campaign with a running Early Bird offer, Lucramania will reward you with an additional ticket in the prize draw. When this happens, the additional ticket will be denoted with '-E' indicating that it is the ticket issued from Early Bird.</li>
          </ul>
        <!--   <h4>Focus Hoodie with a chance to win AED ONE MILLION</h4> -->
          <ul class="couponPdf thankCoupon">
            @foreach($data['orders_data'][0]->data as $products)
              @foreach(App\Models\Core\Order::getOrderProductTickets($data['orders_data'][0]->orders_id,$products->products_id,$data['orders_data'][0]->customers_id) as $ticket)
                <li>
                  <div class="thankCoup thankOrgTick">
                    <!-- <span class="myLeftBox"></span>
                     <span class="myRghtBox"></span> -->
                    <figcaption>
                      <div class="descCoup">
                        <ul>
                          <li class="logo first"><img src='{{asset("images/luciLogo.png")}}' alt="*"></li>
                         <!--  <li class="coupActNum last">Number of Coupons<strong>{{App\Models\Core\Order::getOrderProductTicketsCount($data['orders_data'][0]->orders_id,$products->products_id,$data['orders_data'][0]->customers_id)}}</strong></li> -->
                        </ul>
                        <?php $reward = App\Models\Core\Order::getRewardInfo($ticket->reward_id); 
                              // print_r($reward);
                              ?>
                        <ul class="coupProImg">
                          <li class="first">{{$reward[0]->title}}</li>
                          <li class="last"><figure><img src="{{asset('images/'.$reward[0]->reward_image)}}" alt="*"></figure></li>
                        </ul>
                      </div>
                      <div class="closCoup">
                        <h5>Purchased in: <strong>{{date('H:i A, d M Y', strtotime($ticket->created_at))}}</strong></h5>
                        <h5 class="text-right">Coupon Number: <strong>LU-{{sequenceNumber($ticket->campaign_id)}}-{{sequenceNumber($ticket->id)}}-{{$ticket->type}}</strong></h5>
                      </div>
                    </figcaption>
                  </div>
                </li>
            @endforeach
            @endforeach
            <!-- <li>
              <div class="thankCoup thankOrgTick">
                <figcaption>
                  <div class="descCoup">
                    <ul>
                      <li class="logo first"><img src='{{asset("images/luciLogo.png")}}' alt="*"></li>
                      <li class="coupActNum last">Number of Coupons<strong>6</strong></li>
                    </ul>
                    <ul class="coupProImg">
                      <li class="first">Optimum Nutrition Mi</li>
                      <li class="last"><figure><img src="./pdf_files/reward.jpeg" alt="*"></figure></li>
                    </ul>
                  </div>
                  <div class="closCoup">
                    <h5>Purchased in: <strong>02:30 PM, 14 October 2020</strong></h5>
                    <h5 class="text-right">Coupon Number: <strong>CC-00001-00001-D</strong></h5>
                  </div>
                </figcaption>
              </div>
            </li> -->
          </ul>
        </div>
        <div class="pdfTermSec">
          <div class="header">
            <table>
              <tbody><tr>
                <td><img src='{{asset("images/luciLogo.png")}}' alt="*"></td>
              </tr>
            </tbody></table>
          </div>
          <div class="pdfTermSecWrp">
            <h2>Lucramania - Campaign Draw Terms &amp; Conditions:</h2>
            <p><small>These campaign draw terms and conditions (“Draw Terms”) govern the terms and conditions applicable to Lucramania Fitness Equipments ("Lucramania", "We", "Us", "Our") campaign draws ("Campaign Draws") that relate to Our website ("Site") and Our mobile app ("App") (together the "Platform"). </small></p>
            <p><small>Any party using the Platform and/or participating in a Campaign Draw ("User", "You", "Your") agrees to be bound by these Draw Terms, as well as the user agreement published on the Site ("User Agreement"). If You do not agree to these Draw Terms, or any of its terms (including any amendments), then You should immediately cease using the Platform, and not enter any Campaign Draw.</small></p>
            <p><small>These Draw Terms are effective as of 01 December 2020. We may amend these Draw Terms at any point in time without notice and the amendments will take effect once they have been displayed on the Platform. You acknowledge and agree that it is Your responsibility to review these Draw Terms periodically to familiarize Yourself with any modifications. Your continued use of the Platform and/or entry into Campaign Draws following any amendments shall be construed as acceptance of those amendments.</small></p>
            
            <ul>
              <li>1. Campaign Draws will be approved by Dubai Economy Department (“DED”) and are in accordance with the Commercial Permit Guidebook (as such may be amended from time to time). A valid permit number will be issued for each respective campaign. Where Campaigns are being run from any other jurisdiction We operate from, Lucramania will obtain the necessary regulatory requirements and permits as stipulated by the law in such jurisdiction.</li>
              <li>2. Only Users with a valid membership to the Platform (“PlatformMembers”) that satisfies all the terms of the User Agreement are eligible to enter into our Campaign Draws.</li>
              <li>3. Each product purchased from a campaign by a Platform Member is awarded a single complimentary ticket per product to a specified Campaign Draw.</li>
              <li>4. A Platform Member will have the option to either receive the purchased product or have such contributed to a charity of Our choice. If a Platform Member opts tocontribute their purchased product to charity, Lucramania will double their ticket entry into the specified Campaign Draws.</li>
              <li>5. Complimentary ticket numbers are computer generated and sequential to the order in which the products they are associated with are purchased. Platform Members cannot choose ticket numbers as they are generated only upon checkout and completion of purchase of the associated products.</li>
              <li>6. Product and the Complimentary tickets awarded to Platform Members are neither refundable nor transferable and are owned solely and exclusively by the Platform Member who they have been awarded to.</li>
              <li>7. Campaign Raffle Draws will occur within seven (7) business days after the completion of any campaign. Campaign Draws shall occur in the presence of a regulatory representative, unless the regulator approves otherwise, and as such are not subject to negotiation, interference, challenge, or argument by a Platform Member. The draw date will be subject to the representative’s availability.</li>
              <li>8. Lucramania has the right to close a Campaign Draw at any time. In the event that a campaign is oversubscribed for any reason, we will forthwith reimburse to the oversubscribed Platform Members the payment they have made for the associated produced based on the sequential ticket numbers representing the oversubscribed number of tickets.</li>
              <li>9. Winners of Campaign Draws (“Winners”) are selected by the regulatory representative and will be notified on the day the draw occurs. The names of Winners may also be announced in the local and regional press as well as on the Platform and our associated social (online) media profiles, unless You specifically advise us otherwise in writing.</li>
              <li>10. All Platform Members consent to the use of their name in the event they are the Winner of any of the Campaign Draws. This includes but is not limited to use of their name in the local and regional press, on the Platform and on any social (online) media profile associated with Us.</li>
              <li>11. Post notifying the Winner of their win on the day of the draw, an email will be sent to the registered email on the Platform detailing the next steps and how the Winner can claim the prize (“Prize”).</li>
              <li>12. All Platform Members consent that We have the right to use any and all digital records made by Us including, but not limited to, photographs, videos and call recordings of, the Prize, the Campaign Draw, the winning phone call and the collection of the Prize, on the Platform and on any social (online) media profile associated with Us. These digital records may include imagery and/or voice recordings of the Winner and/or their name.</li>
              <li>13. In the event the Winner is based in the United Arab Emirates, then he/she needs to collect the Prize fromwithin 60 calendar days and present valid identification as may be required in Our sole discretion. Lucramania may, at its sole discretion, allow an individual who has been given Power of Attorney (POA) by the account holder to collect the Prize having presented the necessary identification, Lucramania will evaluate such instances on a case by case basis and cannot guarantee that an individual with POA will be allowed to collect the Prize on behalf of the account holder. Failure to collect the Prize within this time period WILL result in Us transferring the Prize to the regulator where-after Lucramania will have no further responsibility with respect to the Prize. Post transfer, the Winner must liaise with the regulator whereupon he/she will be subject to the regulator’s own terms and conditions.</li>
              <li>14. In the event a Winner does not reside in the United Arab Emirates, We will either courier the Prize to the Winner by air or land in the case of smaller items (for a charge), or ship the Prize to the Winner’s country of residence (nearest seaport as selected by Us in Our sole discretion, for a charge), and We will insure shipment of the Prize (for a charge) until delivery thereof at the port. Collection from the port and clearance through the port and customs shall be the responsibility, and at the cost, of the Winner. Accordingly, all local taxes, custom duties, and any other form of expense beyond shipping and delivery at the port will be paid by the Winner.</li>
              <li>15. Once a Prize is handed to/collected by the courier/handler for international delivery, risk and responsibility will transfer to the Winner and We no longer hold claim nor responsibility for any damage/injury incurred in transit, or upon delivery.</li>
              <li>16. All Prizes represented on our Platform, will be awarded as displayed. Minor changes, including but not limited to color, may occur, however, no major changes, including but not limited to, specification, brand or value, will occur.</li>
              <li>17. Lucramania is not responsible for any bank charges, including but not limited to processing fees from Your local bank.</li>
              <li>18. By entering the Campaign Draw, Winners confirm their agreement to take part in any associated publicity.</li>
              <li>19. If any Winner is subsequently found ineligible to participate in the Campaign Draw, we may at Our sole discretion forfeit or reclaim the Prize or dispose of the same in such manner and to such person as We deem fit. All such decisions will be in line with DED regulations as well as UAE law.</li>
              <li>20. Winners are responsible for any and all tax liability where applicable.</li>
              <li>21. We will not be responsible for arranging insurance, including travel insurance, medical insurance, transport expenses, meal expenses, or any expenses of a personal nature, in the collection of the Prize unless otherwise stated.</li>
              <li>22. We will not be responsible for the inability of any Winner to utilize the Prize, for any reason whatsoever, including but not limited to non-issuance of a visa.</li>
              <li>23. We will not be responsible for claims, damages, or expenses of any nature whatsoever for any loss, illness, bodily injury, including death, of or to any Winner and/or any third party during and/or in course of usage of any Prize or due to any defects in any Prize.</li>
            </ul>
          </div>
        </div>
      </div>
    </section>
  </body>