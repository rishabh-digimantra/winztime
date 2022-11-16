<?php $qunatity=0; ?>
        @foreach($result['commonContent']['cart'] as $cart_data)
          <?php $qunatity += $cart_data->customers_basket_quantity; ?>
        @endforeach
        @if($qunatity > 0)
			<a href="{{asset('viewcart')}}"><i class="fas fa-shopping-cart"></i><span class="cartItems" style="@if($qunatity<10) width:12px; @else width:auto;@endif " > {{$qunatity}}</span></a>
		@else
			<a href="{{asset('viewcart')}}"><i class="fas fa-shopping-cart"></i><span class="cartItems" style="background-color: transparent;"></span></a>
		@endif
   
  
<!--
  <script src="https://code.jquery.com/jquery-1.9.1.js"></script>
  <script src="https://code.jquery.com/ui/1.11.0/jquery-ui.js"></script>
-->
  