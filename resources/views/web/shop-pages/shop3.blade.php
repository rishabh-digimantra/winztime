<style type="text/css">
  #loadersss {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    width: 100%;
    background: rgba(0, 0, 0, 0.75) url(images/loading2.gif) no-repeat center center;
    z-index: 10000;
  }
</style>

<section class="about-sec">
  <div class="container">
    <div class="row">
      <h2>Winztime Products</h2>
      @forelse($result['products'] as $key=>$products)
      @include('web.common.product')
      @empty
      <h3>@lang('website.No Record Found!')</h3>
      @endforelse
    </div>
  </div>
  

  <div id="loadersss"></div>
</section>
<script type="text/javascript">
  jQuery(document).on('click', '.modal_show_products', function(e) {
    jQuery("#products-detail").html('');
    jQuery("#loadersss").show();
    var parent = jQuery(this);
    var products_id = jQuery(this).attr('products_id');
    var message;
    jQuery(function($) {
      jQuery.ajax({
        url: '{{ URL::to("/modal_show_products")}}',
        headers: {
          'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
        },

        type: "POST",
        data: '&products_id=' + products_id,
        success: function(res) {
          console.log(res)
          jQuery("#products-detail").html(res);
          jQuery("#loadersss").hide();
          jQuery('#myModal').modal('show');


        },
      });
    });
  });
</script>
