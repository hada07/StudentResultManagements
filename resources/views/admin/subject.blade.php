@extends('layouts.admin_layout')
@section('title', 'subjects')
@section('content')
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="#">Học phần</a></li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-lg-6 col-5 text-right">
                        <button type="button" class="btn btn-neutral" data-toggle="modal"
                            data-target="#modal-add">
                            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="20" fill="currentColor"
                                class="bi bi-plus-circle" viewBox="0 0 16 16">
                                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                <path
                                    d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                            </svg>
                        </button>
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
                        <h3 class="mb-0">Học phần</h3>
                        @include('components.search')
                    </div>
                    <!-- Light table -->
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead>
                                <tr>
                                    <th scope="col" class="sort" data-sort="id">Mã môn học</th>
                                    <th scope="col" class="sort" data-sort="name">Tên môn học</th>
                                    <th scope="col" class="sort" data-sort="gender">Số tín chỉ</th>
                                    <th scope="col" class="sort" data-sort="gender">Giảng viên</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody class="list">
                                @foreach ($subjects as $subject)
                                    <tr>
                                        <td class="budget">
                                            {{ $subject->subject_id }}
                                        </td>
                                        <td class="budget">
                                            {{ $subject->name }}
                                        </td>
                                        <td class="budget">
                                            {{ $subject->credit }}
                                        </td>
                                        <td class="budget">
                                            {{ $subject->lecturer_name }}
                                        </td>
                                        <td>
                                            @include('components.AED', ['recordId' => $subject->id])
                                            @include('components.modals.subjects.add', ['row' => $subject])
                                            @include('components.modals.subjects.edit', ['row' => $subject])
                                            @include('components.modals.delete',['row' => $subject])
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- Card footer -->
                    {!! $subjects->links('components.pagination') !!}

                </div>
            </div>
        </div>
        <!-- Footer -->
    </div>
@endsection
