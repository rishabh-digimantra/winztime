
<div class="col-lg-4 col-md-4 col-sm-6 col-6">
  <div class="products-box">
    <a href="javascript:;" class="productWrap swipe-to-top modal_show_products" products_id="{{$products->products_id}}">
      <img src="{{asset($products->ProductImage->path)}}" class="img-fluid" alt="{{$products->ProductImage->alt_tag}}">
      <h3>{{$products->products_name}}</h3>
      <p>AED {{$products->products_price}}</p>
    </a>
  </div>
</div>