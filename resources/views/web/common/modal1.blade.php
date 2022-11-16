<?php $i= 0; ?><div class="ad-overlay">
  <div class="ad-inner-overlay product-popup">
    <a href="javascript:;" class="ad-close" data-dismiss="modal"><i class="fa fa-times"></i></a>
    <div class="productPopWrap">
     <h3>
        {{ $result['detail']['product_data'][0]->products_name }}
      </h3>
     <div id="quickViewCarousel" class="carousel slide" data-ride="carousel">
      
      <div class="carousel-inner">
        @foreach( $result['detail']['product_data'][0]->images as $key=>$images )
        @if($images->image_type == 'ACTUAL')
        <div class="carousel-item">                    
          <img style="max-width: 50%;"  src="{{asset('').$images->image_path }}" alt="image">
        </div>
        @endif
        @endforeach

        <ol class="carousel-indicators">
        @foreach( $result['detail']['product_data'][0]->images as $key=>$images )
        @if($images->image_type == 'ACTUAL')
          <li data-target="#quickViewCarousel" data-slide-to="{{$i}}" ></li>
          <?php $i++; ?>
        @endif
        @endforeach
      </ol>
      </div>
      
      <?php
        $descriptions = $result['detail']['product_data'][0]->products_description;
        // echo stripslashes($descriptions);
        ?>
       <!--  <a href="javascript:;" class="prev01"><i class="fas fa-chevron-left"></i></a>
        <a href="javascript:;" class="next01"><i class="fas fa-chevron-right"></i></a> -->
        
      </div>
      <a class="prev01" href="#quickViewCarousel" data-slide="prev">
          <span class="fas fa-chevron-left "></span>
        </a>
        <a class="next01" href="#quickViewCarousel" data-slide="next">
          <span class="fas fa-chevron-right "></span>
        </a>
    </div>
  </div>
</div>

<!-- <script type="text/javascript" src="https://www.digitalsetgo.com/lucramania/html/assets/js/xJquery.js"></script>
  <script type="text/javascript" src="https://www.digitalsetgo.com/lucramania/html/assets/js/script.js"></script> -->
  <script>
    $('.carousel-inner div:first').addClass('active');
    $('.carousel-indicators li:first').addClass('active ');
    @if(!empty($result['detail']['product_data'][0]->products_type) and $result['detail']['product_data'][0]->products_type==1)
    getQuantity();
    cartPrice();
    @endif
  </script>
