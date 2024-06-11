@extends('layouts.admin_layout')
@section('title', 'results')
@section('content')
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="#">Kết quả</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--6">
        @if (count($results) > 0)
        <div class="row">
            <div class="col">
                <div class="card">
                    <!-- Card header -->
                    <div class="card-header border-0 d-flex justify-content-between bg-secondary">
                        <h3 class="mb-0">Kết quả học tập</h3>
                    </div>
                    <!-- Light table -->
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead>
                                <tr>
                                    <th scope="col">Chi tiết</th>
                                    <th scope="col" class="sort" data-sort="id">Mã sinh viên</th>
                                    <th scope="col" class="sort" data-sort="name">Tên sinh viên</th>
                                    <th scope="col" class="sort">Điểm</th>
                                    <th scope="col" class="sort">Xếp loại</th>
                                    {{-- <th scope="col" class="sort" data-sort="completion">Completion</th> --}}
                                </tr>
                            </thead>
                            <tbody class="list">
                                @foreach ($results as $result)
                                    <a href="#">
                                        <tr>
                                            <td class="text-left">
                                                <a class="btn btn-sm btn-icon-only text-light"
                                                    href={{ route('admin.resultDetail', $result->id) }} role="button">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                                                        fill="currentColor" class="bi bi-printer" viewBox="0 0 16 16">
                                                        <path d="M2.5 8a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z" />
                                                        <path
                                                            d="M5 1a2 2 0 0 0-2 2v2H2a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h1v1a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2v-1h1a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-1V3a2 2 0 0 0-2-2H5zM4 3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v2H4V3zm1 5a2 2 0 0 0-2 2v1H2a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-1v-1a2 2 0 0 0-2-2H5zm7 2v3a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1z" />
                                                    </svg>
                                                </a>
                                            </td>
                                            <td class="budget">
                                                {{ $result->student_id }}
                                            </td>
                                            <th scope="row">
                                                <div class="media align-items-center">
                                                    <a href="#" class="avatar rounded-circle mr-3">
                                                        @if (!$result->avatar)
                                                        <img src="../../../../studentManagement/public/images/default_avatar.png"
                                                            class="rounded-circle" style="
                                                        width: 40px;
                                                        height: 40px;
                                                    ">
                                                    @else
                                                        <img src={{ '../' . $result->avatar }} class="rounded-circle"
                                                            style="
                                                  width: 40px;
                                                  height: 40px;
                                              ">
                                                    @endif
                                                    </a>
                                                    <div class="media-body">
                                                        <span class="name mb-0 text-sm">{{ $result->student_name }}</span>
                                                    </div>
                                                </div>
                                            </th>
                                            <td class="budget">
                                                {{ $result->mark }}
                                            </td>
                                            @if ($result->mark >= 3.6)
                                                <td class="budget">
                                                    Xuất sắc
                                                </td>
                                            @elseif ($result->mark >= 3.2 && $result->mark < 3.6) <td
                                                    class="budget">
                                                    Giỏi
                                                    </td>
                                            @elseif ($result->mark >= 2.5 && $result->mark < 3.2) <td
                                                        class="budget">
                                                        Khá
                                                        </td>
                                             @else
                                                <td class="budget">
                                                    Trung bình
                                                </td>
                                            @endif
                                        </tr>
                                    </a>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {!! $results->links('components.pagination') !!}
                </div>
            </div>
        </div>
        @else
        <div class="row">
            <div class="col">
                <div class="card">
                    <!-- Card header -->
                    <div class="card-header border-0 d-flex justify-content-between bg-secondary">
                        <h3 class="mb-0">Chưa có kết quả của sinh viên nào</h3>
                    </div>
                </div>
            </div>
        </div>
        @endif
        <!-- Footer -->
    </div>
@endsection
