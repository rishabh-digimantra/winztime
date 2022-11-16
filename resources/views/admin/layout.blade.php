<!DOCTYPE html>
<html>

<!-- meta contains meta taga, css and fontawesome icons etc -->
@include('admin.common.meta')
<!-- ./end of meta -->
<style>
  .tox-notifications-container {
    display: none !important;
  }
</style>

<body class=" hold-transition skin-blue sidebar-mini">
  <!-- wrapper -->
  <div class="wrapper">

    <div class="se-pre-con" id="loader" style="/* display: none; */">
      <div class="pre-loader">
        <div class="la-line-scale">
          <div></div>
          <div></div>
          <div></div>
          <div></div>
        </div>
        <p>@lang('labels.Loading')..</p>
      </div>

    </div>

    <!-- header contains top navbar -->
    @include('admin.common.header')
    <!-- ./end of header -->

    <!-- left sidebar -->
    @include('admin.common.sidebar')
    <!-- ./end of left sidebar -->

    <!-- dynamic content -->
    @yield('content')
    <!-- ./end of dynamic content -->

    <!-- right sidebar -->
    @include('admin.common.controlsidebar')
    <!-- ./right sidebar -->
    @include('admin.common.footer')
  </div>
  <!-- ./wrapper -->

  <!-- all js scripts including custom js -->
  @include('admin.common.scripts')
  <!-- ./end of js scripts -->

  <div id="winner_modal" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Pick Winner</h4>
        </div>
        <div class="modal-body">
          <form action="{{ url('/admin/campaign/pick-winner') }}" method="POST" id="winner_modal_form">
            @csrf
            <input type="hidden" name="camp_id" id="winner_modal_camp_id">
            <div id="winner_modal_response"></div>
            <div class="form-group">
              <label for="winner_name">Winner name</label>
              <input type="text" name="winner_name" id="winner_name" class="form-control" required>
            </div>
            <div class="form-group">
              <label for="winner_coupon_no">Coupon no</label>
              <input type="text" name="winner_coupon_no" id="winner_coupon_no" class="form-control" required>
            </div>
            <div class="form-group">
              <input type="submit" class="btn btn-primary" value="Submit" id="winner_modal_submit">
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>

    </div>
  </div>


</body>

</html>