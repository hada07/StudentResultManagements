<!-- Sidenav -->
<nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
      <!-- Brand -->
      <div class="sidenav-header  align-items-center">
        <a class="navbar-brand" href={{route('student.dashboard')}}>
          <img src="../../../../studentManagement/public/assets/img/brand/uet.png" class="navbar-brand-img img-fluid" alt="..." style="max-height: 6rem; margin-bottom: 100px;">
        </a>
      </div>
      <div class="navbar-inner">
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
          <!-- Nav items -->
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link active" href={{route('admin.students')}}>
                <i class="ni ni-circle-08 text-orange"></i>
                <span class="nav-link-text">Kết quả học tập</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href={{route('student.getSubject')}}>
                <i class="ni ni-books text-primary"></i>
                <span class="nav-link-text">Đăng ký môn học</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href={{route('student.subject')}}>
                <i class="ni ni-single-02 text-yellow"></i>
                <span class="nav-link-text">Môn học được đăng ký</span>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </nav>