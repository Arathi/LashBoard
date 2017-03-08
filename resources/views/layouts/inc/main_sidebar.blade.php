<!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{$user_avatar_url or config('app.default_avatar', asset('img/avatar.png')) }}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{ Auth::user()->name }}</p>
          <!-- Status -->
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu">
        @foreach ($menu_tree as $menu)
        <li class="{{$menu['style'] or ''}}">
          @if ( isset($menu['style']) && $menu['style']=='header' )
          <span>{{$menu['caption']}}</span>
          @else
          <a href="{{$menu['url'] or ''}}">
            @if ( isset($menu['icon']) )
            <i class="{{$menu['icon']}}"></i>
            @endif
            <span>{{$menu['caption']}}</span>
          </a>
          @endif
        </li>
        @endforeach
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>
