<?php

namespace App\Repository;

use App\Models\Web\Products;
use App\Models\Web\Address as AddressModel;
use App\Models\Web\Customers_basket;
use App\Models\Web\LikedProduct;
use App\Models\Core\Setting;
use App\Models\Core\Currency;
use App\User;
use App\Http\Controllers\Web\AlertController;
use App\Models\Core\Coupon;
use App\Models\Core\Campaign;

use App\Repository\IProductRepository;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Lang;
use DB;

class ProductRepository implements IProductRepository
{
    protected $Product = null;

    public function getAllProducts()
    {
        $Products = Products::select('products_id', 'products_image', 'products_price')->with(array('ProductDescription:products_id,products_description,products_name', 'ProductImage:image_id,path'))->where('products_status', '=', 1)->where('products_id', '!=', 45)->get();
        return $Products;
    }

    public function getProductById($id)
    {
        return Products::find($id);
    }
    //Add to cart

    public function Addtocart($collection)
    {
        $products = new Products();

        $exist = Customers_basket::where([
            ['customers_id', '=', $collection['user_id']],
            ['products_id', '=', $collection['product_id']],
            ['campaign_id', '=', $collection['campaign_id']],
            ['is_order', '=', 0],
        ])->get();
        $id = $exist['0']->customers_basket_id ?? null;
        $product_record = $this->getProductById($collection['product_id']);
        $final_price = $product_record->products_price;
        if (empty($collection['quantity'])) {
            $customers_basket_quantity = 1;
        } else {
            $customers_basket_quantity = $collection['quantity'];
        }
        $type = "+";
        if (isset($collection['type'])) {
            $type = $collection['type'];
        }

        $camp = Campaign::withCount('getTicket')->where('id', $collection['campaign_id'])->first();
        $total = $camp->no_of_orders - $camp->get_ticket_count;
        $quantity = (@$exist[0]['customers_basket_quantity'] + $collection['quantity'])  ?: $collection['quantity'];
        if ($type == "+" && $quantity  > $total) {
            return 'exceed';
        }
        $flight = Customers_basket::updateOrCreate(
            [
                'customers_basket_id' => $id
            ],
            ['customers_basket_quantity' => DB::raw('customers_basket_quantity ' . $type . ' ' . $customers_basket_quantity), 'customers_basket_date_added' => date("Y-m-d"), 'final_price' => $final_price, 'products_id' => $collection['product_id'], 'campaign_id' => $collection['campaign_id'], 'customers_id' => $collection['user_id'], 'created_at' => date("Y-m-d H:i:s")]
        );
        return 'success';
    }

    // Like Product
    public function likeMyProduct($collection)
    {
        $like_id =  LikedProduct::updateOrCreate(
            [
                'liked_customers_id' =>  $collection['user_id'],
                'campaign_id' =>  $collection['campaign_id'],
                'liked_products_id' =>  $collection['product_id']
            ],
            ['date_liked' => date("Y-m-d H:i:s")]
        );
        if ($like_id->wasRecentlyCreated) {

            Products::where('products_id', '=', $collection['product_id'])->increment('products_liked');
        }

        return $like_id;
    }

    // UnLike Product
    public function UnlikeMyProduct($collection)
    {
        $like_id =  LikedProduct::where(['liked_customers_id' => $collection['user_id'], 'liked_products_id' => $collection['product_id'], 'campaign_id' => $collection['campaign_id']])->delete();
        Products::where('products_id', '=', $collection['product_id'])->decrement('products_liked');
        return $like_id;
    }

    // Wishlist
    public function Wishlist($user_id)
    {
        $like_id =  LikedProduct::with(array('Product:products_id,products_image,products_price', 'Product.ProductImage:image_id,path', 'Product.ProductDescription:products_id,products_name,products_description', 'Campaign:id,title,reward_id,no_customers,no_of_orders,campaign_type,end_date,day_left', 'Campaign.Reward:id,title,reward_image,reward_description'))->where(['liked_customers_id' => $user_id])->get();
        return $like_id;
    }

    // View Cart
    public function viewcart($user_id)
    {
        $like_id =  Customers_basket::with(array('products:products_id,products_image,sku,products_weight,products_price', 'products.ProductDescription:products_name,products_id', 'products.ProductImage:image_id,path', 'camping_data:id,title,reward_id,no_customers,no_of_orders,campaign_type,end_date', 'camping_data.Reward:id,title,reward_image'))->where(['customers_id' => $user_id, 'is_order' => '0'])->get();
        return $like_id;
    }

    // View Cart
    public function CountcartItems($user_id)
    {

        $sum = Customers_basket::where(['customers_id' => $user_id, 'is_order' => 0])->sum('customers_basket_quantity');

        return $sum;
    }

    // View Cart
    public function CountPriceofcart($user_id)
    {
        $total_price_of_cart =  Customers_basket::select(DB::raw("SUM(final_price * customers_basket_quantity) as total_price"))->where(['customers_id' => $user_id, 'is_order' => 0])->first();
        return $total_price_of_cart;
    }
    public function calculatePoints($user_id, $price)
    {
        $user =  User::find($user_id);
        $new_setting = new Setting;
        $new_currency = new Currency;
        if ($user->level_id == "1") {
            $id_points = 'order_lpoints_percent';
        } else if ($user->level_id == "2") {
            $id_points = 'order_lpoints_percent_gold';
        } else {
            $id_points = 'order_lpoints_percent_platinum';
        }
        $default_currency = $new_currency->getDefaultCurrency();
        $points_to_earn = 0;
        $points = $new_setting->getSettingsByName($id_points);
        if (!empty($points)) {
            $points_to_earn = round((10 / 100) * ($default_currency->value * $price));
        }
        return $points_to_earn;
    }

    public function AmountTopay($colection)
    {
        $delivery_charge = $colection['is_donate'] == 0 ? 20 : 0;

        $address = AddressModel::find(@$colection['address_id']);
        if ( $address && intval( $address->countries_id ) === 231 ) {
            $delivery_charge = 0;
        }

        if(isset($colection['product_price']))
        {
            $total_price = $colection['product_price'];
        }
        else{
            $total_price = $this->CountPriceofcart($colection['user_id'])->total_price + $delivery_charge;
        }
        $redeem_point = User::find($colection['user_id'])->redeem_points;
        if ($colection['l_point'] == 1) {
            $paymemnt_to_be_done = 0;
            $left_point = 0;
            $left_value = 0;
            if ($redeem_point % 10 == 0) {

                $redeem_divide = $redeem_point / 10;


                if ($total_price >= $redeem_divide) {
                    $quotient = floor($total_price / 10) * 10;

                    if ($redeem_divide % 10 == 0) {

                        if ($quotient >= $redeem_divide) { // 40 > 30
                            $paymemnt_to_be_done = $total_price % 10; // 5
                            $paymemnt_to_be_done = ($quotient - $redeem_divide) + $paymemnt_to_be_done;
                        }
                    } else {

                        $redeem_divide = floor($redeem_point / 100) * 100;
                        $left_point = $redeem_point - $redeem_divide;
                        $paymemnt_to_be_done = $total_price - ($redeem_divide / 10);
                    }
                } else if ($total_price < $redeem_divide) { // 15 < 30
                    if ($redeem_divide % 10 == 0) {
                        $quotient = floor($total_price / 10) * 10;
                        if ($quotient > $redeem_divide) { // 40 > 30
                            $paymemnt_to_be_done = $total_price % 10; // 5
                            $left_point = ($redeem_divide - $quotient) * 10;
                        } else {
                            $paymemnt_to_be_done = $total_price % 10;
                            $left_point = ($redeem_divide - $quotient) * 10;
                        }
                    } else {

                        $quotient = floor($total_price / 10) * 10;
                        if ($quotient > $redeem_divide) { // 40 > 30
                            $paymemnt_to_be_done = $total_price % 10; // 5
                            $left_point = ($redeem_divide - $quotient) * 10;
                        } else {
                            $paymemnt_to_be_done = $total_price % 10;
                            $left_point = ($redeem_divide - $quotient) * 10;
                        }
                    }
                }
            } else {


                $redeem_point = floatval($redeem_point);
                $quotient = floor($redeem_point / 100) * 100;
                $left_value = $redeem_point - $quotient;
                $redeem_divide = ($redeem_point - $left_value) / 10;

                if ($total_price > $redeem_divide) {
                    $quotient = floor($total_price / 10) * 10;
                    if ($quotient >= $redeem_divide) { // 40 > 30
                        $paymemnt_to_be_done = $total_price % 10; // 5
                        $paymemnt_to_be_done = ($quotient - $redeem_divide) + $paymemnt_to_be_done;
                    }
                } else if ($total_price < $redeem_divide) { // 15 < 30

                    $quotient = floor($total_price / 10) * 10;
                    if ($quotient > $redeem_divide) { // 40 > 30
                        $paymemnt_to_be_done = $total_price % 10; // 5
                        $left_point = ($redeem_divide - $quotient) * 10;
                    } else {
                        $paymemnt_to_be_done = $total_price % 10;
                        $left_point = ($redeem_divide - $quotient) * 10;
                    }
                }
            }
            $left_point = $left_point + $left_value;
            $paymemnt_to_be_done = $paymemnt_to_be_done - @$colection['coupon_discount_value'];
            $points_array = array("paymemnt_to_be_done" => $paymemnt_to_be_done, "left_point" => $left_point, "delivery_charge" => $delivery_charge);
        } else {
            $total_price = $total_price - @$colection['coupon_discount_value'];
            $points_array = array("paymemnt_to_be_done" => (int) $total_price, "left_point" => $redeem_point, "delivery_charge" => $delivery_charge);
        }

        return $points_array;
    }

    public function ApplyCoupon($coupon_code, $user_id)
    {
        $currentDate = date('Y-m-d 00:00:00', time());

        $user = user::find($user_id);
        $coupons =  Coupon::where('code', '=', $coupon_code)->where('expiry_date', '>', $currentDate)->get();
        // return count($coupons);
        if (count($coupons) == 0) {
            return $response = array('error' => true, 'message' => "Coupon is expired");
        }
        if (in_array($user->email, explode(',', $coupons[0]->email_restrictions))) {
            return $response = array('error' => true, 'message' => Lang::get("website.You are not allowed to use this coupon"));
        } else {
            if ($coupons[0]->usage_limit > 0 and $coupons[0]->usage_limit == $coupons[0]->usage_count) {
                return $response = array('error' => true, 'message' => Lang::get("website.This coupon has been reached to its maximum usage limit"));
            } else {
                $response = array();

                $carts = $this->viewcart($user_id);
                $session_coupon_ids[] = $coupon_code;

                $total_cart_items = count($carts);
                $price = 0;
                $discount_price = 0;
                $used_by_user = 0;
                $individual_use = 0;
                $price_of_sales_product = 0;
                $exclude_sale_items = array();
                $currentDate = time();
                foreach ($carts as $cart) {

                    //check if amy coupons applied
                    if (!empty($session_coupon_ids)) {
                        $individual_use++;
                    }

                    //user limit
                    if (in_array($coupons[0]->coupans_id, $session_coupon_ids)) {
                        $used_by_user++;
                    }

                    //cart price
                    $price += $cart->final_price * $cart->customers_basket_quantity;

                    //if cart items are special product
                    if ($coupons[0]->exclude_sale_items == 1) {
                        $products_id = $cart->products_id;
                        $sales_item = DB::table('specials')->where([
                            ['status', '=', '1'],
                            ['expires_date', '>', $currentDate],
                            ['products_id', '=', $products_id]
                        ])->select('products_id', 'specials_new_products_price as specials_price')->get();

                        if (count($sales_item) > 0) {
                            $exclude_sale_items[] = $sales_item[0]->products_id;

                            //price check is remaining if already an other coupon is applied and stored in session
                            $price_of_sales_product += $sales_item[0]->specials_price;
                        }
                    }
                }

                $total_special_items = count($exclude_sale_items);

                if ($coupons[0]->individual_use == '1' and $individual_use > 0) {
                    $response = array('error' => true, 'message' => 'The coupon cannot be used in conjunction with other coupons');
                } else {

                    //check limit
                    if ($coupons[0]->usage_limit_per_user > 0 and $coupons[0]->usage_limit_per_user <= $used_by_user) {
                        $response = array('error' => true, 'message' => Lang::get("website.coupon is used limit"));
                    } else {

                        $cart_price = $price + 0 - $discount_price;

                        if ($coupons[0]->minimum_amount > 0 and $coupons[0]->minimum_amount >= $cart_price) {
                            $response = array('error' => true, 'message' => Lang::get("website.Coupon amount limit is low than minimum price"));
                        } elseif ($coupons[0]->maximum_amount > 0 and $coupons[0]->maximum_amount <= $cart_price) {
                            $response = array('error' => true, 'message' => Lang::get("website.Coupon amount limit is exceeded than maximum price"));
                        } else {

                            //exclude sales item
                            //print 'price before applying sales cart price: '.$cart_price;
                            $cart_price = $cart_price - $price_of_sales_product;
                            //print 'current cart price: '.$cart_price;

                            if ($coupons[0]->exclude_sale_items == 1 and $total_special_items == $total_cart_items) {
                                $response = array('error' => true, 'message' => Lang::get("website.Coupon cannot be applied this product is in sale"));
                            } else {

                                if ($coupons[0]->discount_type == 'fixed_cart') {

                                    if ($coupons[0]->amount < $cart_price) {

                                        $coupon_discount = $coupons[0]->amount;
                                        $coupon[] = $coupons[0];
                                    } else {
                                        $response = array('error' => true, 'message' => Lang::get("website.Coupon amount is greater than total price"));
                                    }
                                } elseif ($coupons[0]->discount_type == 'percent') {
                                    $current_discount = $coupons[0]->amount / 100 * $cart_price;
                                    $cart_price = $cart_price - $current_discount;
                                    if ($cart_price > 0) {
                                        $coupon_discount = $current_discount;
                                        $coupon[] = $coupons[0];
                                    } else {
                                        $response = array('error' => true, 'message' => Lang::get("website.Coupon amount is greater than total price"));
                                    }
                                } elseif ($coupons[0]->discount_type == 'fixed_product') {

                                    $product_discount_price = 0;
                                    //no of items have greater discount price than original price
                                    $items_greater_price = 0;

                                    foreach ($carts as $cart) {

                                        if (!empty($coupon[0]->product_categories)) {

                                            //get category ids
                                            $categories = BD::table('products_to_categories')->where('products_id', '=', $cart->products_id)->get();

                                            if (in_array($categories[0]->categories_id, $coupon[0]->product_categories)) {

                                                //if coupon is apply for specific product
                                                if (!empty($coupons[0]->product_ids) and in_array($cart->products_id, $coupons[0]->product_ids)) {

                                                    $product_price = $cart->final_price;
                                                    if ($product_price > $coupons[0]->amount) {

                                                        $product_discount_price += $coupons[0]->amount * $cart->customers_basket_quantity;
                                                    } else {
                                                        $items_greater_price++;
                                                    }

                                                    //if coupon cannot be apply for speciafic product
                                                } elseif (!empty($coupons[0]->exclude_product_ids) and in_array($cart->products_id, $coupons[0]->exclude_product_ids)) {
                                                } elseif (empty($coupons[0]->exclude_product_ids) and empty($coupons[0]->product_ids)) {

                                                    $product_price = $cart->final_price;
                                                    if ($product_price > $coupons[0]->amount) {
                                                        $product_discount_price += $coupons[0]->amount * $cart->customers_basket_quantity;
                                                    } else {
                                                        $items_greater_price++;
                                                    }
                                                }
                                            }
                                        } else if (!empty($coupon[0]->excluded_product_categories)) {

                                            //get category ids
                                            $categories = BD::table('products_to_categories')->where('products_id', '=', $cart->products_id)->get();

                                            if (in_array($categories[0]->categories_id, $coupon[0]->excluded_product_categories)) {

                                                //if coupon is apply for specific product
                                                if (!empty($coupons[0]->product_ids) and in_array($cart->products_id, $coupons[0]->product_ids)) {

                                                    $product_price = $cart->final_price;
                                                    if ($product_price > $coupons[0]->amount) {
                                                        $product_discount_price += $coupons[0]->amount * $cart->customers_basket_quantity;
                                                    } else {
                                                        $items_greater_price++;
                                                    }

                                                    //if coupon cannot be apply for speciafic product
                                                } elseif (!empty($coupons[0]->exclude_product_ids) and in_array($cart->products_id, $coupons[0]->exclude_product_ids)) {
                                                } elseif (empty($coupons[0]->exclude_product_ids) and empty($coupons[0]->product_ids)) {

                                                    $product_price = $cart->final_price;
                                                    if ($product_price > $coupons[0]->amount) {
                                                        $product_discount_price += $coupons[0]->amount * $cart->customers_basket_quantity;
                                                    } else {
                                                        $items_greater_price++;
                                                    }
                                                }
                                            }
                                        } else {
                                            //if coupon is apply for specific product
                                            if (!empty($coupons[0]->product_ids) and in_array($cart->products_id, $coupons[0]->product_ids)) {

                                                $product_price = $cart->final_price;
                                                if ($product_price > $coupons[0]->amount) {
                                                    $product_discount_price += $coupons[0]->amount * $cart->customers_basket_quantity;
                                                } else {
                                                    $items_greater_price++;
                                                }

                                                //if coupon cannot be apply for speciafic product
                                            } elseif (!empty($coupons[0]->exclude_product_ids) and in_array($cart->products_id, $coupons[0]->exclude_product_ids)) {
                                            } elseif (empty($coupons[0]->exclude_product_ids) and empty($coupons[0]->product_ids)) {

                                                $product_price = $cart->final_price;
                                                if ($product_price > $coupons[0]->amount) {
                                                    $product_discount_price += $coupons[0]->amount * $cart->customers_basket_quantity;
                                                } else {
                                                    $items_greater_price++;
                                                }
                                            }
                                        }
                                    }

                                    //check if all cart products are equal to that product which have greater discount amount
                                    if ($total_cart_items == $items_greater_price) {
                                        $response = array('error' => true, 'message' => Lang::get("website.Coupon amount is greater than product price"));
                                    } else {
                                        $coupon_discount = $product_discount_price;
                                        $coupon[] = $coupons[0];
                                    }
                                } elseif ($coupons[0]->discount_type == 'percent_product') {

                                    $product_discount_price = 0;
                                    //no of items have greater discount price than original price
                                    $items_greater_price = 0;

                                    foreach ($carts as $cart) {

                                        if (!empty($coupon[0]->product_categories)) {

                                            //get category ids
                                            $categories = BD::table('products_to_categories')->where('products_id', '=', $cart->products_id)->get();

                                            if (in_array($categories[0]->categories_id, $coupon[0]->product_categories)) {

                                                //if coupon is apply for specific product
                                                if (!empty($coupons[0]->product_ids) and in_array($cart->products_id, $coupons[0]->product_ids)) {

                                                    $product_price = $cart->final_price - ($coupons[0]->amount / 100 * $cart->final_price);
                                                    if ($product_price > $coupons[0]->amount) {
                                                        $product_discount_price += $coupons[0]->amount / 100 * ($cart->final_price * $cart->customers_basket_quantity);
                                                    } else {
                                                        $items_greater_price++;
                                                    }

                                                    //if coupon cannot be apply for speciafic product
                                                } elseif (!empty($coupons[0]->exclude_product_ids) and in_array($cart->products_id, $coupons[0]->exclude_product_ids)) {
                                                } elseif (empty($coupons[0]->exclude_product_ids) and empty($coupons[0]->product_ids)) {

                                                    $product_price = $cart->final_price - ($coupons[0]->amount / 100 * $cart->final_price);
                                                    if ($product_price > $coupons[0]->amount) {
                                                        $product_discount_price += $coupons[0]->amount / 100 * ($cart->final_price * $cart->customers_basket_quantity);
                                                    } else {
                                                        $items_greater_price++;
                                                    }
                                                }
                                            }
                                        } else if (!empty($coupon[0]->excluded_product_categories)) {

                                            //get category ids
                                            $categories = BD::table('products_to_categories')->where('products_id', '=', $cart->products_id)->get();

                                            if (in_array($categories[0]->categories_id, $coupon[0]->excluded_product_categories)) {

                                                //if coupon is apply for specific product
                                                if (!empty($coupons[0]->product_ids) and in_array($cart->products_id, $coupons[0]->product_ids)) {

                                                    $product_price = $cart->final_price - ($coupons[0]->amount / 100 * $cart->final_price);
                                                    if ($product_price > $coupons[0]->amount) {
                                                        $product_discount_price += $coupons[0]->amount / 100 * ($cart->final_price * $cart->customers_basket_quantity);
                                                    } else {
                                                        $items_greater_price++;
                                                    }

                                                    //if coupon cannot be apply for speciafic product
                                                } elseif (!empty($coupons[0]->exclude_product_ids) and in_array($cart->products_id, $coupons[0]->exclude_product_ids)) {
                                                } elseif (empty($coupons[0]->exclude_product_ids) and empty($coupons[0]->product_ids)) {

                                                    $product_price = $cart->final_price - ($coupons[0]->amount / 100 * $cart->final_price);
                                                    if ($product_price > $coupons[0]->amount) {
                                                        $product_discount_price += $coupons[0]->amount / 100 * ($cart->final_price * $cart->customers_basket_quantity);
                                                    } else {
                                                        $items_greater_price++;
                                                    }
                                                }
                                            }
                                        } else {

                                            //if coupon is apply for specific product
                                            if (!empty($coupons[0]->product_ids) and in_array($cart->products_id, $coupons[0]->product_ids)) {

                                                $product_price = $cart->final_price - ($coupons[0]->amount / 100 * $cart->final_price);
                                                if ($product_price > $coupons[0]->amount) {
                                                    $product_discount_price += $coupons[0]->amount / 100 * ($cart->final_price * $cart->customers_basket_quantity);
                                                } else {
                                                    $items_greater_price++;
                                                }

                                                //if coupon cannot be apply for speciafic product
                                            } elseif (!empty($coupons[0]->exclude_product_ids) and in_array($cart->products_id, $coupons[0]->exclude_product_ids)) {
                                            } elseif (empty($coupons[0]->exclude_product_ids) and empty($coupons[0]->product_ids)) {

                                                $product_price = $cart->final_price - ($coupons[0]->amount / 100 * $cart->final_price);
                                                if ($product_price > $coupons[0]->amount) {
                                                    $product_discount_price += $coupons[0]->amount / 100 * ($cart->final_price * $cart->customers_basket_quantity);
                                                } else {
                                                    $items_greater_price++;
                                                }
                                            }
                                        }
                                    }

                                    //check if all cart products are equal to that product which have greater discount amount
                                    if ($total_cart_items == $items_greater_price) {
                                        $response = array('error' => true, 'message' => Lang::get("website.Coupon amount is greater than product price"));
                                    } else {
                                        $coupon_discount = $product_discount_price;
                                        $coupon[] = $coupons[0];
                                    }
                                }
                            }
                        }
                    }

                    if (empty($response)) {
                        $response = array('error' => false, 'discount_value' => $coupon_discount, 'coupon_id' => $coupons[0]->coupans_id);
                    }
                    return $response;
                }
            }
        }
    }
}
