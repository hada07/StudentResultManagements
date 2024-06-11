@extends('layouts.student_layout')
@section('title', 'subject register')
@section('content')
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="#">Môn học đăng ký</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col">
                <div class="card">
                    <!-- Card header -->
                    <div class="card-header border-0 d-flex justify-content-between bg-secondary">
                        <h3 class="mb-0">Môn học đã đăng ký</h3>
                    </div>
                    <!-- Light table -->
                    <div class="table-responsive table-wrapper-scroll-y my-custom-scrollbar">
                        <table class="table align-items-center table-flush ">
                            <thead>
                                <tr>
                                    <th scope="col" class="sort" data-sort="id">Mã môn học</th>
                                    <th scope="col" class="sort" data-sort="name">Tên môn học</th>
                                    <th scope="col" class="sort" data-sort="gender">Số tín chỉ</th>
                                    <th scope="col" class="sort" data-sort="gender">Giảng viên</th>
                                    <th scope="col" class="sort" data-sort="gender">Trạng thái</th>
                                </tr>
                            </thead>
                            <tbody class="list">
                                @foreach ($subjectRegisters as $subjectRegister)
                                    <tr>
                                        <td class="budget">
                                            {{ $subjectRegister->subject_id }}
                                        </td>
                                        <td class="budget">
                                            {{ $subjectRegister->subject_name }}
                                        </td>
                                        <td class="budget">
                                            {{ $subjectRegister->credit }}
                                        </td>
                                        <td class="budget">
                                            {{ $subjectRegister->lecturer_name }}
                                        </td>
                                        @if ($subjectRegister->mark)
                                            @if ($subjectRegister->mark > 4)
                                                <td>Đã hoàn thành</td>
                                            @else
                                                <td>Chưa đạt chỉ tiêu(nợ)</td>
                                            @endif
                                        @else
                                            <td>Đăng ký mới</td>
                                        @endif
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>  
        <!-- Footer -->
    </div>
@endsection
