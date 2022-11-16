<?php 
if (!function_exists('sequenceNumber')) {
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
}
?>
<html><head>
      <title></title>
   </head>
   <body style="background-color:white;">
      <table style="border-spacing:0!important;border-collapse:collapse!important;table-layout:fixed!important;margin:0 auto!important;margin:0;background: #fff;border-collapse:collapse;border-spacing:0;color:#1f1f1f;font-family:Arial;font-size:14px;font-weight:400;height:100%;line-height:1.7;margin:0;padding:0;text-align:left;vertical-align:top;width:100%; max-width: 600px;">
         <tbody>
            <tr style="padding:0;text-align:left;vertical-align:top">
               <td align="center" valign="top" style="margin:0;border-collapse:collapse;color:#1f1f1f;font-family:Arial;font-size:14px;font-weight:400;line-height:1.7;margin:0;padding:0;text-align:left;vertical-align:top;word-wrap:break-word">
                  <center style="min-width:100%;width:100%">
                     <table align="center" style="border-spacing:0!important;border-collapse:collapse!important;table-layout:fixed!important;margin:0 auto!important;margin:0 auto;background:#f8f8f8;border-collapse:collapse;border-spacing:0;float:none;margin:0 auto;padding:0;text-align:center;vertical-align:top;width:100%">
                        <tbody>
                           <tr style="padding:0;text-align:left;vertical-align:top">
                              <td style="margin:0;border-collapse:collapse;color:#1f1f1f;font-family:Arial;font-size:14px;font-weight:400;line-height:1.7;margin:0;padding:0;text-align:left;vertical-align:top;word-wrap:break-word">
                                 <span style="display:none;font-size:0;line-height:0;max-height:0;max-width:0;opacity:0;overflow:hidden">Thank you for shopping with us!&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;
                                 &nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;
                                 &nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;
                                 &nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;
                                 &nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;
                                 &nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;
                                 &nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;
                                 &nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;
                                 &nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;
                                 &nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;
                                 &nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;
                                 &nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;
                                 &nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;</span>
                                 <table style="border-spacing:0!important;border-collapse:collapse!important;table-layout:fixed!important;margin:0 auto!important;border-collapse:collapse;border-spacing:0;display:table;padding:0;text-align:left;vertical-align:top;width:100%">
                                    <tbody>
                                       <tr style="padding:0;text-align:left;vertical-align:top;background: #fff;">
                                          <th style="margin:0 auto;color:#1f1f1f;font-family:Arial;font-size:14px;font-weight:400;line-height:1.7;margin:0 auto;padding:0;padding-left:0;padding-right:0;text-align:left;width:100%">
                                             <table style="border-spacing:0!important;border-collapse:collapse!important;table-layout:fixed!important;margin:0 auto!important;border-collapse:collapse;border-spacing:0;padding:0;text-align:left;vertical-align:top;width:100%;background: #fff;">
                                                <tbody>
                                                   <tr style="padding:0;text-align:left;vertical-align:top">
                                                      <th style="margin:0;color:#1f1f1f;font-family:Arial;font-size:14px;font-weight:400;line-height:1.7;margin:0;padding:0;text-align:left">
                                                         <center style="background:#fff;min-width:100%;width:100%">
                                                            <table cellspacing="0" cellpadding="0" border="0" align="center" bgcolor="#ffffff" width="100%" style="
">
                                                               <tbody>
                                                                  <tr>
                                                                     <td style="padding: 20px 17px 20px;position: relative;background: #000;">
                                                                        <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                                                                           <tbody>
                                                                              <tr>
                                                                                 <td style="text-align:center;" width="49%">
                                                                                    <a href="https://winztime.com/"> <img src="{{asset('web/assets/images/emailLogo.png')}}" width="50%" alt="" class="CToWUd"></a>
                                                                                 </td>
                                                                              </tr>
                                                                           </tbody>
                                                                        </table>
                                                                     </td>
                                                                  </tr>
                                                               </tbody>
                                                            </table>
                                                         </center>
                                                         <center style="min-width:100%;width:100%;background: #fff;">
                                                            <!-- <table style="border-spacing:0!important;border-collapse:collapse!important;table-layout:fixed!important;margin:0 auto!important;margin:0 auto;border-collapse:collapse;border-spacing:0;float:none;padding:0;text-align:center;vertical-align:top;width:100%;background: #000;">
                                                               <tbody>
                                                                  <tr style="padding:0;text-align:left;vertical-align:top">
                                                                     <td height="60" style="margin:0;border-collapse:collapse!important;color:#1f1f1f;font-family:Arial;font-size: 30px;font-weight:400;line-height: 30px;padding:0;text-align:left;vertical-align:top;width:25%;word-wrap:break-word;"> </td>
                                                                  </tr>
                                                               </tbody>
                                                            </table> -->
                                                            <div align="center" style="padding:0 20px;background: #fff;">
                                                               <img src="https://winztime.com/images/admin_logo/tick.png" width="112" style="clear:both;display:block;height:112px;margin-bottom:12px;margin-top:12px;max-width:100%;outline:0;text-decoration:none;width:112px" alt="" class="CToWUd">
                                                               <h2 style="font-family:Arial;color: #000; font-size: 20px;font-weight:bold;line-height:31px;margin:0px;max-width:100%;padding:7px 0px 5px;text-align:center;word-wrap:normal;">Thank you for shopping with us!</h2>
                                                               <p style="margin:0;margin-bottom:10px;color: #1f1f1f;font-family:Arial;font-size: 16px;font-weight:400;line-height:1.2;max-width:100%;padding:0 0 0;text-align:center;">Please find the reciept with order details<br>below along with coupons.</p>
                                                            </div>
                                                            <!-- <table style="border-spacing:0!important;border-collapse:collapse!important;table-layout:fixed!important;margin:0 auto!important;margin:0 auto;border-collapse:collapse;border-spacing:0;float:none;padding:0;text-align:center;vertical-align:top;width:100%;background: #fff;">
                                                               <tbody>
                                                                  <tr style="padding:0;text-align:left;vertical-align:top">
                                                                     <td height="60" style="margin:0;border-collapse:collapse!important;color:#1f1f1f;font-family:Arial;font-size:60px;font-weight:400;line-height:60px;padding:0;text-align:left;vertical-align:top;width:25%;word-wrap:break-word"> </td>
                                                                  </tr>
                                                               </tbody>
                                                            </table> -->
                                                            <!-- box-shadow: 0 0 10px #ccc; -->
                                                            <table cellspacing="0" cellpadding="0" border="0" align="center" width="100%" style="border-spacing:0!important;border-collapse:collapse!important;table-layout:fixed!important;margin:0 auto!important;">
                                                               <tbody>
                                                                  <tr>
                                                                     <td style="padding:0 20px 7px">
                                                                        <table cellspacing="0" cellpadding="0" border="0" align="center" width="100%" style="border-spacing:0!important;border-collapse:collapse!important;table-layout:fixed!important;margin:0 auto!important">
                                                                           <tbody>
                                                                              <tr>
                                                                                 <td  bgcolor="#fff">
                                                                                    <table cellspacing="0" cellpadding="0" border="0" align="center" width="100%" style="border-spacing:0!important;/*width: 95%;*/border-collapse:collapse!important;table-layout:fixed!important;margin:0 auto!important">
                                                                                       <tbody>
                                                                                          <tr>
                                                                                             <td style="color: #1f1f1f;font-family:Arial;font-size: 24px;font-weight: 600;line-height:30px;padding: 0 0 10px;text-align:center;">Invoice</td>
                                                                                          </tr>
                                                                                          <tr>
                                                                                             <td style="color: #1f1f1f;font-family:Arial;font-size: 16px;font-weight: 600;line-height:20px;padding:0 0 8px;max-width:100%;text-align:center;word-wrap:normal;">Order ID: <b style="font-weight:400;text-decoration:none">{{$ordersData['orders_data'][0]->orders_id }}</b> </td>
                                                                                          </tr>
                                                                                          <tr>
                                                                                             <td style="color:#1f1f1f;font-family:Arial;font-size: 16px;font-weight: 600;line-height:20px;padding:0 0 35px;max-width:100%;text-align:center;word-wrap:normal;">Purchased Date: <span style="font-weight:400;font-size: 16px;">{{ date('d/m/Y', strtotime($ordersData['orders_data'][0]->date_purchased)) }}</span></td>
                                                                                          </tr>
                                                                                          <tr>
                                                                                             <td>
                                                                                                <table cellspacing="0" cellpadding="0" border="0" align="center" width="100%" style="border-spacing:0!important;border-collapse:collapse!important;table-layout:fixed!important;margin:0 auto!important">
                                                                                                   <tbody>
                                                                                                      <tr>
                                                                                                         <td width="40%" style="color: #1f1f1f;display:inline-block;font-size:14px;line-height:16px;text-align:left;padding-bottom:5px;font-family:Arial;font-weight: 600;">PRODUCTS</td>
                                                                                                         <td style="color: #1f1f1f;display:inline-block;font-size:14px;line-height:16px;text-align:left;margin-left:5%;text-align:left;width: 15%;padding-bottom:5px;font-family:Arial;font-weight: 600;">QTY</td>
                                                                                                         <td style="color: #1f1f1f;display:inline-block;font-size:14px;line-height:16px;text-align:left;text-align:right;width: 39%;padding-bottom:5px;font-family:Arial;font-weight: 600;">SUBTOTAL</td>
                                                                                                      </tr>
                                                                                                   </tbody>
                                                                                                </table>
                                                                                             </td>
                                                                                          </tr>
                                                                                          <tr>
                                                                                             <td>
                                                                                                <table cellspacing="0" cellpadding="0" border="0" align="center" width="100%" style="border-spacing:0!important;border-collapse:collapse!important;table-layout:fixed!important;margin:0 auto!important">
                                                                                                   <tbody>
                                                                                                      @foreach($ordersData['orders_data'][0]->data as $key=>$products)
                                                                                                      <tr>
                                                                                                         <td style="border-top:1px solid rgba(195,195,195,.32);max-width:100%;padding:22px 0;min-width:100%">
                                                                                                            <table cellspacing="0" cellpadding="0" border="0" align="center" width="100%" style="border-spacing:0!important;border-collapse:collapse!important;table-layout:fixed!important;margin:0 auto!important">
                                                                                                               <tbody>
                                                                                                                  <tr>
                                                                                                                     <td width="40%" style="color: #1f1f1f;display:inline-block;font-size: 14px;line-height:1.2;text-align:left;font-family:Arial;">{{  $products->products_name }}</td>
                                                                                                                     <td style="color: #1f1f1f;display:inline-block;font-size: 14px;line-height:1.2;margin-left:4%;text-align:center;width: 15%;font-family:Arial;">
                                                                                                                        {{  $products->products_quantity }}
                                                                                                                     </td>
                                                                                                                     <td style="color: #1f1f1f;display:inline-block;font-size: 14px;line-height:1.2;text-align:right;width: 40%;font-family:Arial;">
                                                                                                                        {{ $ordersData['orders_data'][0]->currency }}{{ $products->final_price }}
                                                                                                                     </td>
                                                                                                                  </tr>
                                                                                                               </tbody>
                                                                                                            </table>
                                                                                                         </td>
                                                                                                      </tr>
                                                                                                      @endforeach
                                                                                                   </tbody>
                                                                                                </table>
                                                                                             </td>
                                                                                          </tr>
                                                                                       </tbody>
                                                                                    </table>
                                                                                 </td>
                                                                              </tr>
                                                                           </tbody>
                                                                        </table>
                                                                     </td>
                                                                  </tr>
                                                                  <tr>
                                                                     <td style="padding:0 20px 7px;min-width:100%">
                                                                        <table cellspacing="0" cellpadding="0" border="0" align="center" width="100%" style="border-spacing:0!important;border-collapse:collapse!important;table-layout:fixed!important;margin:0 auto!important">
                                                                           <tbody>
                                                                              <tr>
                                                                                 <td style="min-width:100%" bgcolor="#fff">
                                                                                    <table cellspacing="0" cellpadding="0" border="0" align="center" width="100%" style="border-spacing:0!important;border-collapse:collapse!important;table-layout:fixed!important;margin:0 auto!important">
                                                                                       <tbody>
                                                                                          <tr>
                                                                                             <td style="border-top:1px solid #e8e8e8;border-bottom:1px solid #e8e8e8;max-width:100%;padding:15px 0;min-width:100%">
                                                                                                <table cellspacing="0" cellpadding="0" border="0" align="center" width="100%" style="border-spacing:0!important;border-collapse:collapse!important;table-layout:fixed!important;margin:0 auto!important">
                                                                                                   <tbody>
                                                                                                      <tr>
                                                                                                         <td style="color: #1f1f1f;display:inline-block;font-family:Arial;font-size: 14px;line-height:20px;text-align:left;width:49%;">Donation</td>
                                                                                                         <td style="color: #1f1f1f;display:inline-block;font-family:Arial;font-size: 14px;line-height:20px;text-align:right;width:50%;">@if($ordersData['totalCouponChecker'] == 'added') Yes @else No @endif</td>
                                                                                                      </tr>
                                                                                                   </tbody>
                                                                                                </table>
                                                                                             </td>
                                                                                          </tr>
                                                                                         
                                                                                          <tr>
                                                                                             <td style="border-bottom:1px solid #e8e8e8;max-width:100%;min-width:100%;padding:15px 0">
                                                                                                <table cellspacing="0" cellpadding="0" border="0" align="center" width="100%" style="border-spacing:0!important;border-collapse:collapse!important;table-layout:fixed!important;margin:0 auto!important">
                                                                                                   <tbody>
                                                                                                      <tr>
                                                                                                         <td style="color: #1f1f1f;display:inline-block;font-family:Arial;font-size: 14px;line-height:20px;text-align:left;width:49%;">VAT Amount</td>
                                                                                                         <td style="color: #1f1f1f;display:inline-block;font-family:Arial;font-size: 14px;line-height:20px;text-align:right;width:50%;">{{ $ordersData['orders_data'][0]->currency }}{{$ordersData['orders_data'][0]->total_tax}}</td>
                                                                                                      </tr>
                                                                                                   </tbody>
                                                                                                </table>
                                                                                             </td>
                                                                                          </tr>
                                                                                          <tr>
                                                                                             <td style="border-bottom:1px solid #e8e8e8;max-width:100%;min-width:100%;padding:15px 0">
                                                                                                <table cellspacing="0" cellpadding="0" border="0" align="center" width="100%" style="border-spacing:0!important;border-collapse:collapse!important;table-layout:fixed!important;margin:0 auto!important">
                                                                                                   <tbody>
                                                                                                      <tr>
                                                                                                         <td style="color: #1f1f1f;display:inline-block;font-family:Arial;font-size: 14px;line-height:20px;text-align:left;width:49%; ">Coupon Discount</td>
                                                                                                         <td style="color: #1f1f1f;display:inline-block;font-family:Arial;font-size: 14px;line-height:20px;text-align:right;width:50%;">{{ $ordersData['orders_data'][0]->currency }}{{$ordersData['orders_data'][0]->coupon_amount}}.00</td>
                                                                                                      </tr>
                                                                                                   </tbody>
                                                                                                </table>
                                                                                             </td>
                                                                                          </tr>
                                                                                          <tr>
                                                                                             <td style="border-bottom:1px solid #e8e8e8;max-width:100%;min-width:100%;padding:15px 0">
                                                                                                <table cellspacing="0" cellpadding="0" border="0" align="center" width="100%" style="border-spacing:0!important;border-collapse:collapse!important;table-layout:fixed!important;margin:0 auto!important">
                                                                                                   <tbody>
                                                                                                      <tr>
                                                                                                         <td style="color: #1f1f1f;display:inline-block;font-family:Arial;font-size: 14px;line-height:20px;text-align:left;width:49%; ">Shipping Cost</td>
                                                                                                         <td style="color: #1f1f1f;display:inline-block;font-family:Arial;font-size: 14px;line-height:20px;text-align:right;width:50%;">{{ $ordersData['orders_data'][0]->currency }}{{$ordersData['orders_data'][0]->shipping_cost}}</td>
                                                                                                      </tr>
                                                                                                   </tbody>
                                                                                                </table>
                                                                                             </td>
                                                                                          </tr>
                                                                                          <tr>
                                                                                             <td style="border-bottom:1px solid #e8e8e8;max-width:100%;min-width:100%;padding:15px 0">
                                                                                                <table cellspacing="0" cellpadding="0" border="0" align="center" width="100%" style="border-spacing:0!important;border-collapse:collapse!important;table-layout:fixed!important;margin:0 auto!important">
                                                                                                   <tbody>
                                                                                                      <tr>
                                                                                                         <td style="color: #1f1f1f;display:inline-block;font-family:Arial;font-size: 14px;line-height:20px;text-align:left;width:49%; ">Z-Points Redeemed</td>
                                                                                                         <td style="color: #1f1f1f;display:inline-block;font-family:Arial;font-size: 14px;line-height:20px;text-align:right;width:50%;">{{$ordersData['orders_data'][0]->spent_lpoints}}</td>
                                                                                                      </tr>
                                                                                                   </tbody>
                                                                                                </table>
                                                                                             </td>
                                                                                          </tr>
                                                                                          <tr>
                                                                                             <td style="max-width:100%;padding:15px 0;min-width:100%">
                                                                                                <table cellspacing="0" cellpadding="0" border="0" align="center" width="100%" style="border-spacing:0!important;border-collapse:collapse!important;table-layout:fixed!important;margin:0 auto!important">
                                                                                                   <tbody>
                                                                                                      <tr>
                                                                                                         <td style="color: #000;display:inline-block;font-size: 18px;font-family:Arial;line-height:30px;text-align:left;width:49%;">Total</td>
                                                                                                         <td style="color: #000;display:inline-block;font-size: 18px;font-family:Arial;line-height:30px;text-align:right;width:50%;">{{round($ordersData['orders_data'][0]->order_price)}}.00</td>
                                                                                                      </tr>
                                                                                                   </tbody>
                                                                                                </table>
                                                                                             </td>
                                                                                          </tr>
                                                                                       </tbody>
                                                                                    </table>
                                                                                 </td>
                                                                              </tr>
                                                                           </tbody>
                                                                        </table>
                                                                     </td>
                                                                  </tr>
                                                                  
                                                                                       </tbody>
                                                                                    </table>
                                                                                 
                                                                              </center></th></tr>
                                                                           </tbody>
                                                                        </table>
                                                                     
                                                                  </th></tr>
                                                                  <tr>  
                                                                    <td style="color: #000;font-family:Arial;font-size: 16px;line-height:1.7;padding:15px 15px 5px;max-width:100%;text-align:left;word-wrap:normal; background: #fff;">
                                                                     <!-- <td style="color: #000;font-family:Arial;font-size: 25px;font-weight: 600;letter-spacing:-.56px;line-height:30px;padding: 0 0 40px;text-align:left;"> -->Your Coupons</td>
                                                                  </tr>
                                                                  <tr>
                                                                     <td style="background: #fff;min-width:100%">
                                                                         @foreach(App\Models\Web\Order::getordertickets($ordersData['orders_data'][0]->orders_id) as  $tickets)  
                                                                         <!-- box-shadow: 0 0 5px #ccc; -->
                                                                        <div style="padding: 5px;margin: 4px;border: 2px dashed #ccc;border-radius: 20px;">
                                                                        <table style="background-color: #1f1f1f;    box-shadow: 0 0 10px #ff0 inset;border-radius: 20px;width: 100%;">
                                                                            <tbody>
                                                                            <tr>
                                                                              <td style="background: #ffff00; width:3%;    border-radius: 20px 0 0 20px;"></td>
                                                                              <td style="width:75%;padding: 15px 15px 5px;">
                                                                                <table style="width: 100%;">
                                                                                    <tbody><tr>
                                                                                    <td colspan="2">
                                                                                 <a href="https://winztime.com/"><img src="{{asset('web/assets/images/logo_order.png')}}" style="width: 150px;" alt="*"></a>
                                                                                    </td>
                                                                                    </tr>
                                                                                    <?php $reward = App\Models\Web\Customer::getRewardInfo($tickets->reward_id); 
                                                                                    ?>
                                                                                    <tr>
                                                                                        <td style="font-size: 14px;color:#fff"><?php echo htmlspecialchars_decode($reward[0]->title);?></td>
                                                                                        <td style="text-align: right;"><img src="{{asset('images/'.$reward[0]->reward_image)}}" style="height: 80px;" alt="*"></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                    <td style="font-size: 11px;font-family: arial;padding: 10px 0 0;color:#fff">Purchased in<br><strong style="font-weight: 400;">{{date('H:i A, d M Y', strtotime($tickets->created_at))}}</strong></td>
                                                                              <td style="font-size: 11px;font-family: arial;padding: 10px 0 0;text-align: right;color:#fff">Coupon Number<br><strong style="color:#fff;font-weight: 400;">Z-{{sequenceNumber($tickets->campaign_id)}}-{{sequenceNumber($tickets->ticket_number)}}-{{$tickets->type}}</strong></td>
                                                                                    </tr>
                                                                                </tbody></table>
                                                                              </td>
                                                                              <td style="background: #ffff00; width:3%;    border-radius:0 20px 20px 0;"></td>
                                                                              </tr>
                                                                            </tbody></table>
                                                                        </div>
                                                                        @endforeach
                                                                     </td>
                                                                  </tr>
                                                               </tbody>
                                                            </table>
                                                         
                                                         <table style="border-collapse:collapse;border-spacing:0;padding:0;text-align:left;vertical-align:top;width:100%;border-spacing:0!important;border-collapse:collapse!important;table-layout:fixed!important;margin:0 auto!important">
                                                            <tbody>
                                                               <tr style="padding:0;text-align:left;vertical-align:top;background: #fff;">
                                                                  <td height="16" style="margin:0;border-collapse:collapse;color:#1f1f1f;font-family:Arial;font-size:18px;font-weight:400;line-height:16px;padding:0;text-align:left;vertical-align:top;width:25%;word-wrap:break-word"> </td>
                                                               </tr>
                                                            </tbody>
                                                         </table>
                                                         <!-- box-shadow: 0 0 10px #ccc; -->
                                                         <table cellspacing="0" cellpadding="0" border="0" align="center" bgcolor="#eeeeee" width="100%" style="border-spacing:0!important;border-collapse:collapse!important;table-layout:fixed!important;margin:0 auto!important;">
                                                            <tbody>
<tr style=" background: #fff; text-align: center; "><td style=" width: 100%; padding: 20px 0; background: #000;"><a href="https://winztime.com/"> <img src="{{asset('web/assets/images/emailLogo.png')}}" width="50%" alt="" class="CToWUd"></a></td></tr>
                                                              
                                                               <tr style="background: #fff;">
                                                                  <td style="padding: 15px 0;">
                                                                     <table cellspacing="0" cellpadding="10" border="0" align="center" width="90%" style="border-spacing:0!important;border-collapse:collapse!important;table-layout:fixed!important;margin:0 auto!important;width: 55%;">
                                                                        <tbody>
                                                                           <tr>
                                                                              <td>
                                                                                 <a href="https://instagram.com/winztimeuae" style="color:#d20000;font-weight:400;line-height:1.7;margin:0;padding:0;text-align:left;text-decoration:underline" target="_blank" data-saferedirecturl="#"><img src="https://winztime.com/images/admin_logo/instagram-icon.png" alt="facebook" style="border:none;clear:both;display:block;outline:0;text-decoration:none;width:100%;max-width:100%" class="CToWUd"></a>
                                                                              </td>
                                                                              <td>
                                                                                 <a href="https://www.facebook.com/Winztime-110445164590731" style="color:#d20000;font-weight:400;line-height:1.7;margin:0;padding:0;text-align:left;text-decoration:underline" target="_blank" data-saferedirecturl="#"><img src="https://winztime.com/images/admin_logo/facebook-icon.png" alt="linkedin" style="border:none;clear:both;display:block;max-width:100%;outline:0;text-decoration:none;width:100%" class="CToWUd"></a>
                                                                              </td>
                                                                              <td>
                                                                                 <a href="https://www.youtube.com/channel/UCF_-XYC6abqSxypR4RW1gEg" style="color:#d20000;font-weight:400;line-height:1.7;margin:0;padding:0;text-align:left;text-decoration:underline" target="_blank" data-saferedirecturl="#"><img src="https://winztime.com/images/admin_logo/youtube-icon.png" alt="youtube" style="border:none;clear:both;display:block;max-width:100%;outline:0;text-decoration:none;width:100%" class="CToWUd"></a>
                                                                              </td>
                                                                              <td>
                                                                                 <a href="https://api.whatsapp.com/send/?phone=%2B971552801120&text&app_absent=0" style="color:#d20000;font-weight:400;line-height:1.7;margin:0;padding:0;text-align:left;text-decoration:underline" target="_blank" data-saferedirecturl="#"><img src="https://winztime.com/images/admin_logo/whatsapp.png" alt="whatsapp" style="border:none;clear:both;display:block;max-width:100%;outline:0;text-decoration:none;width:100%" class="CToWUd"></a>
                                                                              </td>
                                                                           </tr>
                                                                        </tbody>
                                                                     </table>
                                                                  </td>
                                                               </tr>
                                                               <tr style="background: #fff;">
                                                                  <td style="color: #1f1f1f;font-family:Arial;font-size: 14px;font-weight:400;line-height: 20px;padding:0 10px 10px;text-align:center;">
                                                                     Note: Images used are for promotional purposes and may not be an actual representation. Please see product website for detailed specifications.
                                                                  </td>
                                                               </tr>
                                                               <tr style="background: #fff;">
                                                                  <td style="color: #1f1f1f;font-family:Arial;font-size: 14px;font-weight:400;line-height:14px;padding:0 10px 15px;margin-bottom:0px;text-align:center;">Winztime. © {{ date('Y') }}. All rights reserved.
                                                                     <br><br>
                                                                     <a href="https://winztime.com/page?name=Term-Services" style="color: #000;font-family:Arial;font-weight:400;line-height:1.7;margin:0;padding:0;text-align:left;text-decoration:underline;">Terms and Conditions</a> 
                                                                  </td>
                                                               </tr>
                                                               <tr>
                                                                  <td style="color:#1f1f1f;display:block;font-family:Arial;font-size:18px;line-height:22px;padding:5px 0 30px;text-align:center;background: #fff;"> 
                                                                     You deserve&nbsp;<img src="https://ci5.googleusercontent.com/proxy/96kVqM39RYGYeZUxWfg5yVv1OiSdKpaUYfwuYpNA8SvmGinKbjoe1w8NXcttDwXLBHA5QGhdkIeKnzumikkUmWOQWZQSLQfSS8Sl8SMwel--1GK7chxGjIef32nNo0lGUUNyiu64zD1DU9ZgUapNQ_A3CftX2ZjXzI34XAAeX9Iz9zEs=s0-d-e1-ft#https://www.idealz.com/on/demandware.static/Sites-Idealz-ae-Site/-/default/dw7e9f334c/images/order/love_heart.png" width="22" style="clear:both;display:inline;padding:0;max-width:auto;outline:0;text-decoration:none;width:22px;height:20px;display:inline-block" alt="love_heart.png" class="CToWUd">&nbsp;!
                                                                  </td>
                                                               </tr>
                                                            </tbody>
                                                         </table>
                                                      
                                                      </td><th style="margin:0;color:#1f1f1f;font-family:Arial;font-size:14px;font-weight:400;line-height:1.7;margin:0;padding:0;text-align:left;width:0">
                                                      </th>
                                                   </tr>
                                                </tbody>
                                             </table>
                                          
                                       </center></td></tr>
                                    </tbody>
                                 </table>
</body></html> 