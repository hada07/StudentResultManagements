<!-- Sidenav -->
<nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
      <!-- Brand -->
      <div class="sidenav-header  align-items-center">
        <a class="navbar-brand" href={{ route('admin.dashboard')}}>
          <img src="../../../../studentManagement/public/assets/img/brand/uet.png" class="navbar-brand-img img-fluid" alt="..." style="max-height: 6rem; margin-bottom: 100px;">
        </a>
      </div>
      <div class="navbar-inner">
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
          <!-- Nav items -->
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link {{$menu['dashboard']}}" href={{route('admin.dashboard')}}>
                <i class="ni ni-tv-2 text-primary"></i>
                <span class="nav-link-text">Dashboard</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{$menu['student']}}" href={{route('admin.students')}}>
                <i class="ni ni-circle-08 text-orange"></i>
                <span class="nav-link-text">Sinh viên</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{$menu['subject']}}" href={{route('admin.subjects')}}>
                <i class="ni ni-books text-primary"></i>
                <span class="nav-link-text">Học phần</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{$menu['lecturer']}}" href={{route('admin.lecturers')}}>
                <i class="ni ni-single-02 text-yellow"></i>
                <span class="nav-link-text">Giảng viên</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{$menu['result']}}" href={{route('admin.results')}}>
                <i class="ni ni-hat-3 text-default"></i>
                <span class="nav-link-text">Kết quả</span>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </nav>