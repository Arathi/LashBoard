  <!-- Main Header -->
  <header class="main-header">

    <!-- Logo -->
    <a href="{!! url('/') !!}" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>La</b>B</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>La</b>shBoard</span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">

          <!-- Messages: style can be found in dropdown.less 消息 -->
          <li class="dropdown messages-menu">
            <!-- Menu toggle button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-envelope-o"></i>
              @if ( count($messages)>0 )
              <span class="label label-success">{{ count($messages) }}</span>
              @endif
            </a>
            <ul class="dropdown-menu">
              @if ( count($messages)>0 )
              <li class="header">你有 {{ count($messages) }} 条新消息</li>
              @else
              <li class="header">暂无新消息</li>
              @endif
              <li>
                <!-- inner menu: contains the messages -->
                <ul class="menu">
                  @foreach ( $messages as $message )
                  <li><!-- start message -->
                    <a href="{{ $message['url'] }}">
                      <div class="pull-left">
                        <!-- User Image -->
                        <img src="{{ $message['sender_avatar'] or config('app.default_avatar', asset('img/avatar.png')) }}" class="img-circle" alt="User Image">
                      </div>
                      <!-- Message title and timestamp -->
                      <h4>
                        {{ $message['sender_name'] }}
                        <small><i class="fa fa-clock-o"></i> {{ $message['post_time'] }}</small>
                      </h4>
                      <!-- The message -->
                      <p>{{ $message['content'] }}</p>
                    </a>
                  </li>
                  <!-- end message -->
                  @endforeach
                </ul>
                <!-- /.menu -->
              </li>
              <li class="footer"><a href="#">查看所有消息</a></li>
            </ul>
          </li>
          <!-- /.messages-menu -->

          <!-- Notifications Menu 通知 -->
          <li class="dropdown notifications-menu">
            <!-- Menu toggle button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
              @if ( count($notifications)>0 )
              <span class="label label-warning">10</span>
              @endif
            </a>
            <ul class="dropdown-menu">
              @if ( count($notifications)>0 )
              <li class="header">你收到 {{ count($notifications) }} 条通知</li>
              @else
              <li class="header">暂无通知</li>
              @endif
              <li>
                <!-- Inner Menu: contains the notifications -->
                <ul class="menu">
                  @foreach ($notifications as $notification)
                  <li><!-- start notification -->
                    <a href="#">
                      <i class="{{ $notification['icon'] }}"></i> {{ $notification['content'] }}
                    </a>
                  </li>
                  <!-- end notification -->
                  @endforeach
                </ul>
              </li>
              <li class="footer"><a href="#">查看所有通知</a></li>
            </ul>
          </li>
          <!-- Tasks Menu 任务 -->
          <li class="dropdown tasks-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-flag-o"></i>
              @if (count($tasks)>0)
              <span class="label label-danger">{{ count($tasks) }}</span>
              @endif
            </a>
            <ul class="dropdown-menu">
              @if (count($tasks) > 0)
              <li class="header">你有 {{ count($tasks) }} 个任务</li>
              @else
              <li class="header">暂无任务</li>
              @endif
              <li>
                <!-- Inner menu: contains the tasks -->
                <ul class="menu">
                  @foreach ($tasks as $task)
                  <li><!-- Task item -->
                    <a href="#">
                      <!-- Task title and progress text -->
                      <h3>
                        {{ $task['name'] }}
                        <small class="pull-right">{{ $task['completion_rate'] }}%</small>
                      </h3>
                      <!-- The progress bar -->
                      <div class="progress xs">
                        <!-- Change the css width attribute to simulate progress -->
                        <div class="progress-bar progress-bar-aqua" style="width: {{ $task['completion_rate'] }}%" role="progressbar" aria-valuenow="{{ $task['completion_rate'] }}" aria-valuemin="0" aria-valuemax="100">
                          <span class="sr-only">已完成 {{ $task['completion_rate'] }}%</span>
                        </div>
                      </div>
                    </a>
                  </li>
                  <!-- end task item -->
                  @endforeach
                </ul>
              </li>
              <li class="footer">
                <a href="#">查看所有任务</a>
              </li>
            </ul>
          </li>
          <!-- User Account Menu -->
          <li class="dropdown user user-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <!-- The user image in the navbar-->
              <img src="{{$user_avatar_url or config('app.default_avatar', asset('img/avatar.png')) }}" class="user-image" alt="User Image">
              <!-- hidden-xs hides the username on small devices so only the image appears. -->
              <span class="hidden-xs">{{ Auth::user()->name }}</span>
            </a>
            <ul class="dropdown-menu">
              <!-- The user image in the menu -->
              <li class="user-header">
                <img src="{{$user_avatar_url or config('app.default_avatar', asset('img/avatar.png')) }}" class="img-circle" alt="User Image">

                <p>
                  {{ Auth::user()->name }} - {{ Auth::user()->role->name }}
                  <small>注册于 {{ Auth::user()->created_at }}</small>
                </p>
              </li>
              <!-- Menu Body -->
              <li class="user-body">
                <div class="row">
                  <div class="col-xs-4 text-center">
                    <a href="#">Followers</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Sales</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Friends</a>
                  </div>
                </div>
                <!-- /.row -->
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">个人信息</a>
                </div>
                <div class="pull-right">
                  <a href="{{ route('logout') }}" class="btn btn-default btn-flat">注销</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>