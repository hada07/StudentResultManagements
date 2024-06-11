@extends('layouts.admin_layout')
@section('title', 'lecturers')
@section('content')
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="#">Giảng viên</a></li>
                                {{-- <li class="breadcrumb-item active" aria-current="page">Tables</li> --}}
                            </ol>
                        </nav>
                    </div>
                    <div class="col-lg-6 col-5 text-right">
                        <button type="button" class="btn btn-neutral" data-toggle="modal" data-target="#modal-add">
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
                        <h3 class="mb-0">Giảng viên</h3>
                        @include('components.search')
                    </div>
                    <!-- Light table -->
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead>
                                <tr>
                                    <th scope="col" class="sort" data-sort="id">Mã GV</th>
                                    <th scope="col" class="sort" data-sort="name">Họ và tên</th>
                                    <th scope="col" class="sort" data-sort="level">Trình độ</th>
                                    <th scope="col" class="sort" data-sort="mobile">Số điện thoại</th>
                                    <th scope="col" class="sort" data-sort="address">Địa chỉ</th>
                                    {{-- <th scope="col" class="sort" data-sort="completion">Completion</th> --}}
                                    <th scope="col"></th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody class="list">
                                @foreach ($lecturers as $lecturer)
                                    <tr>
                                        <td class="budget">
                                            {{ $lecturer->college_id }}
                                        </td>
                                        <th scope="row">
                                            <div class="media align-items-center">
                                                <a href="#" class="avatar rounded-circle mr-3">
                                                    @if (!$lecturer->avatar)
                                                        <img src="../../../../studentManagement/public/images/default_avatar.png"
                                                            class="rounded-circle" style="
                                                            width: 40px;
                                                            height: 40px;
                                                        ">
                                                    @else
                                                        <img src={{ '../' . $lecturer->avatar }} class="rounded-circle"
                                                            style="
                                                      width: 40px;
                                                      height: 40px;
                                                  ">
                                                    @endif
                                                </a>
                                                <div class="media-body">
                                                    <span class="name mb-0 text-sm">{{ $lecturer->name }}
                                                        @if ($lecturer->email)
                                                            <i class="ni ni-check-bold" style="color: green"></i>
                                                        @endif
                                                    </span> </span>
                                                </div>
                                            </div>
                                        </th>
                                        <td class="budget">
                                            {{ $lecturer->level }}
                                        </td>
                                        <td class="budget">
                                            {{ $lecturer->mobile }}
                                        </td>
                                        <td class="budget">
                                            {{ $lecturer->address }}
                                        </td>
                                        <td>
                                            @include('components.AED', ['recordId' => $lecturer->id])
                                            @include('components.modals.lecturers.add', ['row' => $lecturer])
                                            @include('components.modals.lecturers.edit', ['row' => $lecturer])
                                            @include('components.modals.delete',['row' => $lecturer])
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- Card footer -->
                    {!! $lecturers->links('components.pagination') !!}

                </div>
            </div>
        </div>
    </div>
@endsection
