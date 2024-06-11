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
                            <li class="breadcrumb-item"><a href="#">Đăng ký môn học</a></li>
                        </ol>
                    </nav>
                </div>
                <div class="col-lg-6 col-5 text-right">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Page content -->
<div class="container-fluid mt--6">
    <form action={{ route('student.registerSubject') }} method="POST" enctype='multipart/form-data'>
    @csrf
    <div class="row">
        <div class="col">
            <div class="card">
                <!-- Card header -->
                <div class="card-header border-0 d-flex justify-content-between bg-secondary">
                    <h3 class="mb-0">Danh sách môn học</h3>
                    <input type="submit" value="Đăng ký ">
                </div>
                <!-- Light table -->
                <div class="table-responsive table-wrapper-scroll-y my-custom-scrollbar">
                    <table class="table align-items-center table-flush ">
                        <thead>
                            <tr>
                                <th></th>
                                <th scope="col" class="sort" data-sort="id">Mã môn học</th>
                                <th scope="col" class="sort" data-sort="name">Tên môn học</th>
                                <th scope="col" class="sort" data-sort="name">Số lượng đã đăng ký</th>
                                <th scope="col" class="sort" data-sort="gender">Số tín chỉ</th>
                                <th scope="col" class="sort" data-sort="gender">Giảng viên</th>
                            </tr>
                        </thead>
                        <tbody class="list">
                            @foreach ($subjects as $subject)
                                @if ($subject->registerQuantily >= $subject->quantily)
                                <tr style="background-color: yellow">
                                    <td data-toggle="tooltip" title="Môn học đã đủ người đăng ký">
                                        <input type="checkbox" disabled name="subject[]" value = {{ $subject->id }} />
                                    </td>
                                @elseif ($subject->isRegister == true)
                                <tr style="background-color: yellow" >
                                    <td data-toggle="tooltip" title="Bạn đã đăng ký môn học này">
                                        <input type="checkbox" disabled name="subject[]" value = {{ $subject->id }} />
                                    </td>
                                @else
                                <tr>
                                    <td>
                                        <input type="checkbox" name="subject[]" value = {{ $subject->id }} />
                                    </td>
                                @endif
                                    <td class="budget">
                                        {{ $subject->subject_id }}
                                    </td>
                                    <td class="budget">
                                        {{ $subject->name }}
                                    </td>
                                    <td class="budget">
                                        {{$subject->registerQuantily}}/{{ $subject->quantily }}
                                    </td>
                                    <td class="budget">
                                        {{ $subject->credit }}
                                    </td>
                                    <td class="budget">
                                        {{ $subject->lecturer_name }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    </form>
    @if (count($subjectRegisters) > 0) 
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
                                <th></th>
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
                                    <td>
                                        @include('student.component.delete', ['rowId' => $subjectRegister->study_id])
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
@endsection
