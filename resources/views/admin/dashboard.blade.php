@extends('layouts.admin_layout')
@section('title', 'dashboard')
@section('content')
    @if ($message = Session::get('registerSuccess'))

        <div class="alert alert-success alert-block">

            <button type="button" class="close" data-dismiss="alert">×</button>

            <strong>{{ $message }}</strong>
        </div>
    @endif
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <!-- Card stats -->
                <div class="row">
                    <div class="col-xl-3 col-md-6">
                        <div class="card card-stats">
                            <!-- Card body -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0">Số lượng sinh viên</h5>
                                        <span class="h2 font-weight-bold mb-0">{{ $sumStudent }}</span>
                                    </div>
                                </div>
                                <p class="mt-3 mb-0 text-sm">
                                    <span class="text-success mr-2"><i
                                            class="fa fa-arrow-up"></i>{{ $studentIncrease }}</span>
                                    <span class="text-nowrap">trong tháng này</span>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card card-stats">
                            <!-- Card body -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0">Số lượng giảng viên</h5>
                                        <span class="h2 font-weight-bold mb-0">{{ $sumLectuter }}</span>
                                    </div>
                                </div>
                                <p class="mt-3 mb-0 text-sm">
                                    <span class="text-success mr-2"><i class="fa fa-arrow-up"></i>
                                        {{ $lecturerIncrease }}</span>
                                    <span class="text-nowrap">trong tháng này</span>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card card-stats">
                            <!-- Card body -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0">Số lượng học phần</h5>
                                        <span class="h2 font-weight-bold mb-0">{{ $sumSubject }}</span>
                                    </div>
                                </div>
                                <p class="mt-3 mb-0 text-sm">
                                    <span class="text-success mr-2"><i class="fa fa-arrow-up"></i>
                                        {{ $subjectIncrease }}</span>
                                    <span class="text-nowrap">trong tháng này</span>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card card-stats">
                            <!-- Card body -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0">Số lượng người dùng</h5>
                                        <span class="h2 font-weight-bold mb-0">{{ $sumUser }}</span>
                                    </div>
                                </div>
                                <p class="mt-3 mb-0 text-sm">
                                    <span class="text-success mr-2"><i class="fa fa-arrow-up"></i>
                                        {{ $userIncrease }}</span>
                                    <span class="text-nowrap">trong tháng này</span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--6">
        <div class="row">
            {{-- <div class="col-xl-8">
      <div class="card bg-default">
        <div class="card-header bg-transparent">
          <div class="row align-items-center">
            <div class="col">
              <h6 class="text-light text-uppercase ls-1 mb-1">Overview</h6>
              <h5 class="h3 text-white mb-0">Sales value</h5>
            </div>
            <div class="col">
              <ul class="nav nav-pills justify-content-end">
                <li class="nav-item mr-2 mr-md-0" data-toggle="chart" data-target="#chart-sales-dark" data-update='{"data":{"datasets":[{"data":[0, 20, 10, 30, 15, 40, 20, 60, 60]}]}}' data-prefix="$" data-suffix="k">
                  <a href="#" class="nav-link py-2 px-3 active" data-toggle="tab">
                    <span class="d-none d-md-block">Month</span>
                    <span class="d-md-none">M</span>
                  </a>
                </li>
                <li class="nav-item" data-toggle="chart" data-target="#chart-sales-dark" data-update='{"data":{"datasets":[{"data":[0, 20, 5, 25, 10, 30, 15, 40, 40]}]}}' data-prefix="$" data-suffix="k">
                  <a href="#" class="nav-link py-2 px-3" data-toggle="tab">
                    <span class="d-none d-md-block">Week</span>
                    <span class="d-md-none">W</span>
                  </a>
                </li>
              </ul>z
            </div>
          </div>
        </div>
        <div class="card-body">
          <!-- Chart -->
          <div class="chart">
            <!-- Chart wrapper -->
            <canvas id="chart-sales-dark" class="chart-canvas"></canvas>
          </div>
        </div>
      </div>
    </div> --}}
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-transparent">
                        <div class="row align-items-center">
                            <div class="col">
                                <h6 class="text-uppercase text-muted ls-1 mb-1">Tổng quan</h6>
                                <h5 class="h3 mb-0">Biểu đồ xếp loại sinh viên</h5>
                            </div>
                        </div>
                    </div>
                    @if ($weakStudent == 0 && $normalStudent == 0 && $goodStudent == 0 && $excellentStudent == 0)
                        <div class="ml-2 pt-5 pb-5">Chưa có dữ liệu kết quả của sinh viên nào</div>
                    @else
                        <canvas id="labelChart"></canvas>
                    @endif
                </div>
            </div>
        </div>
        @if (count($users) > 0)
            <br /><br /><br />
            <div class="container-fluid mt--6">
                <div class="row">
                    <div class="col">
                        <div class="card">
                            <!-- Card header -->
                            <div class="card-header border-0 d-flex justify-content-between bg-secondary">
                                <h3 class="mb-0">Người dùng</h3>
                            </div>
                            <!-- Light table -->
                            <div class="table-responsive table-wrapper-scroll-y my-custom-scrollbar">
                                <table class="table align-items-center table-flush">
                                    <thead>
                                        <tr>
                                            <th scope="col" class="sort" data-sort="id">Tên người dùng</th>
                                            <th scope="col" class="sort" data-sort="name">Tài khoản</th>
                                            <th scope="col" class="sort" data-sort="gender">Vai trò</th>
                                            <th scope="col"></th>
                                        </tr>
                                    </thead>
                                    <tbody class="list">
                                        @foreach ($users as $user)
                                            <tr>
                                                <td class="budget">
                                                    {{ $user->name }}
                                                </td>
                                                <td class="budget">
                                                    {{ $user->email }}
                                                </td>
                                                @if ($user->student_id)
                                                    <td>Sinh viên</td>
                                                @elseif ($user->lecturer_id)
                                                    <td>Giảng viên</td>
                                                @else
                                                    <td>Phòng Đào tạo</td>
                                                @endif
                                                <td>
                                                    <button type="button" class="btn btn-sm btn-warning" data-toggle="modal"
                                                        data-target="#modal-notification{{ $user->id }}">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                            fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                            <path
                                                                d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                                            <path fill-rule="evenodd"
                                                                d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                                                        </svg>
                                                    </button>
                                                    <div class="modal fade" id="modal-notification{{ $user->id }}"
                                                        tabindex="-1" role="dialog"
                                                        aria-labelledby="modal-notification{{ $user->id }}"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog modal-danger modal-dialog-centered modal-"
                                                            role="document">
                                                            <div class="modal-content bg-gradient-danger">

                                                                <div class="modal-header">
                                                                    <h6 class="modal-title"
                                                                        id="modal-title-notification">
                                                                        Cảnh báo</h6>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">×</span>
                                                                    </button>
                                                                </div>

                                                                <div class="modal-body">

                                                                    <div class="py-3 text-center">
                                                                        <i class="ni ni-bell-55 ni-3x"></i>
                                                                        <h4 class="heading mt-4">Bạn chắc chắn muốn xóa
                                                                            nó?
                                                                        </h4>
                                                                        <p>"Nếu xóa thì hãy chọn <b>Có</b></b>, ngược lại
                                                                            chọn
                                                                            <b>Không</b> để hủy"
                                                                        </p>
                                                                    </div>

                                                                </div>

                                                                <form
                                                                    action="{{ route('admin.user.delete', $user->id) }}"
                                                                    method="POST" class="modal-footer">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit" class="btn btn-white">Có</button>
                                                                    <button type="button"
                                                                        class="btn btn-link text-white ml-auto"
                                                                        data-dismiss="modal">Không</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
        @endif
        <!-- Footer -->
    </div>
    </div>
    <script>
        var ctxP = document.getElementById("labelChart").getContext('2d');
        var myPieChart = new Chart(ctxP, {
            plugins: [ChartDataLabels],
            type: 'pie',
            data: {
                labels: ["Trung bình", "Khá", "Giỏi", "Xuất sắc"],
                datasets: [{
                    data: [{{ $weakStudent }}, {{ $normalStudent }}, {{ $goodStudent }},
                        {{ $excellentStudent }}
                    ],
                    backgroundColor: ["#F7464A", "#FDB45C", "#46BFBD", "#7CFC00"],
                    hoverBackgroundColor: ["#FF5A5E", "#FFC870", "#5AD3D1", "#A8B3C5"]
                }]
            },
            options: {
                responsive: true,
                legend: {
                    position: 'right',
                    labels: {
                        padding: 20,
                        boxWidth: 10
                    }
                },
                plugins: {
                    datalabels: {
                        formatter: (value, ctx) => {
                            let sum = 0;
                            let dataArr = ctx.chart.data.datasets[0].data;
                            dataArr.map(data => {
                                sum += data;
                            });
                            let percentage = (value * 100 / sum).toFixed(2) + "%";
                            return percentage;
                        },
                        color: 'white',
                        labels: {
                            title: {
                                font: {
                                    size: '16'
                                }
                            }
                        }
                    }
                }
            }
        });
    </script>
@endsection
