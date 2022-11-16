  <noscript>
    <div id="jqcheck"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAB60lEQVQ4T2NkwAHePzrxf3ebL1jWp/0oA5egGiM2pVgFQQq31uj/N/ANZvj+8T3D7aNHGDwbTxNvwKtbO/9f3dLHYJ+axfDn5w+GI/NnMRhFtTEISJtjGIIh8Pv39/87ak0ZzCLiGMRUNMCufnLxDMOlrZsY3JtOMrCwsKPowTDg3tGZ/59f2sVgFRvPkO+bAzZgwsZJDEcXzWNQtIlikDGIwG3Az+9v/+9qsGOwTc1h4JeQhhswcfMUhrcP7zEcXzyXwb3xMAMbuwDcEBTTzi7P/s/M8IFB3zccbDPMBSADQODs2sUMzFwyDIah/ZgGfHt/7/+BvmAGm+RsBl4RMawGfHr5jOHowlkMjiUbGDj55MCGwE060Of1X0RZi0Hb2Q4e3eguAElc2X2A4e2DmwwOhVsRBnx6cfH/yXm5DFZxyQxcAoJ4Dfj24T3DsUVzGcwSJjLwSxkygk3ZVmv4X805gkHZRBNXwkQRv3/+NsP1nUsYvFvOMzI+PLXo/73DSxgsouIYOHj5UBRi8wJIwY8vnxlOLV/CIGcewsC4vkDhv01yLoOIoiqG7bgMACn88Owxw8HpvQyMGwqV/vs19TMwQnxDEthYW8DAeGCC3/9XN46TpBGmWEzDkoHx06dP/z9//kyWAby8vAwAcza2SBMOSCMAAAAASUVORK5CYII=" alt="Javascript is disabled" width="16" height="16"> Javascript is disabled. Please enable it for better working experience.</div>
  </noscript>
  <header class="header">
    
    <div class="logoBar">
      <div class="container">        
        <div class="row">
          <div class="col-md-4">
            <a href="{{ URL::to('/')}}" title="" class="logo"><!-- <img src="assets/images/logo.png"> --> @if($result['commonContent']['settings']['sitename_logo']=='name')
              <?=stripslashes($result['commonContent']['settings']['website_name'])?>
            @endif</a>
          </div>
          <div class="col-md-5">
            <nav class="nav navbar-nav navigation">
              <a href="#" id="pull" title=""><i class="fa fa-navicon"></i></a>
              <ul id="topMenu">
                {!! $result['commonContent']["menusRecursive"] !!}
                <li class="nav-item ">
                  <a class="nav-link">
                    <span>@lang('website.Call Us Now')</span>
                    <phone dir="ltr">{{$result['commonContent']['setting'][11]->value}}</phone>
                  </a>
                </li>  
              </ul>
            </nav> 
          </div>
          <div class="col-md-3">
            <ul class="logoRight">
              <li>
                <div class="srchBtn">
                  <a href="javascript:;" title="" class="searchSubmit"><i class="fas fa-search"></i></a>
                  <div class="srchArea">
                    <form role="search" method="get" class="search-form" action="/">
                      <input type="text" class="searchInput" name="s" placeholder="Search">
                    </form>
                  </div>
                </div>
              </li>
              <!-- <li><a href="javascript:;"><i class="fas fa-shopping-cart"></i></a></li> -->
              <li>@include('web.headers.cartButtons.cartButton10')</li>
            </ul>
          </div>
        </div>
      </div>
    </div><!-- LOGBAR END HERE -->
    <!-- <div class="progress-container">
      <div class="progress-bar" id="myBar"></div>
    </div> -->
  </header><!-- HEADER END HERE -->