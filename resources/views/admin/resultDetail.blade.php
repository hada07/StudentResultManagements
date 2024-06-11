@extends('layouts.admin_layout')
@section('title', 'resultDetails')
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
                                <li class="breadcrumb-item active" aria-current="page">Sinh viên</li>
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
                    <div class="card-header border-0">
                        <h3 class="mb-0">{{$resultDetails[0]->student_name}}</h3>
                    </div>
                    <!-- Light table -->
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col" class="sort">Mã MH</th>
                                    <th scope="col" class="sort" data-sort="gender">Môn học</th>
                                    <th scope="col" class="sort">Số TC</th>
                                    <th scope="col" class="sort">Điểm hệ 10</th>
                                    <th scope="col" class="sort">Điểm chữ</th>
                                    <th scope="col" class="sort">Điểm hệ 4</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody class="list">
                                @foreach ($resultDetails as $resultDetail)
                                    <tr>
                                        <td class="budget">
                                            {{ $resultDetail->subject_id }}
                                        </td>
                                        <td class="budget">
                                            {{ $resultDetail->subject_name }}
                                        </td>
                                        <td class="budget">
                                            {{ $resultDetail->credit }}
                                        </td>
                                        <td class="budget">
                                            {{ $resultDetail->mark }}
                                        </td>
                                        <td class="budget">
                                            {{ $resultDetail->mark_char }}
                                        </td>
                                        <td class="budget">
                                            {{ $resultDetail->mark_4 }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- Card footer -->
                    {!! $resultDetails->links('components.pagination') !!}

                </div>
            </div>
        </div>
        <!-- Footer -->
    </div>
@endsection
