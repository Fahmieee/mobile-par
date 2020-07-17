@include('layout.contenthead')
<div class="main-content">
  <!-- Header -->
  <div class="loading" style="display: none;">Loading&#8230;</div>
    <div class="container-fluid pb-2 pt-4 pt-md-8">

      @if($roles->role_id == '2')
        @include('content.home.driver.index')
      @elseif($roles->role_id == '3')
        @include('content.home.client.index')
      @elseif($roles->role_id == '5')
        @include('content.home.korlap.index')
      @elseif($roles->role_id == '6')
        @include('content.home.asmen.index')
      @else
        @include('content.home.manager.index')
      @endif
    </div>
  </div>
      @if($roles->role_id == '2')

        @include('content.home.driver.modal')
        @include('layout.contentfooter')
        @include('script.driver')

      @elseif($roles->role_id == '3')

        @include('content.home.client.modal')
        @include('layout.contentfooter')
        @include('script.client')

      @else

        @include('content.home.korlap.modal')
        @include('layout.contentfooter')
        @include('script.korlap')

      @endif

      
  </body>
</html>