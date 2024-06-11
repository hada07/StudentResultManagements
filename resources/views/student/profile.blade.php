@extends('layouts.student_layout')
@section('title', 'Thông tin cá nhân')
@section('content')
    <div class="header pb-6 d-flex align-items-center mb-3">
        <!-- Mask -->
        <span class="mask bg-gradient-default opacity-8"></span>
        <!-- Header container -->
        <div class="container-fluid d-flex align-items-center">
            <div class="row">   
            </div>
        </div>
    </div>
    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col-xl-4 order-xl-2">
                <div class="card card-profile">
                    <img src="../assets/img/theme/img-1-1000x600.jpg" alt="Image placeholder" class="card-img-top">
                    <div class="row justify-content-center">
                        <div class="col-lg-3 order-lg-2">
                            <div class="card-profile-image">
                                @if (!Auth::user()->avatar)
                                <a href="" data-toggle="modal"
                                data-target="#modal-avatar">
                                    <img src="../images/default_avatar.png" class="rounded-circle" style="
                                    width: 140px;
                                    height: 140px;
                                ">
                                </a>
                                @else
                                <a href="" data-toggle="modal"
                                data-target="#modal-avatar">
                                    <img src={{"../".Auth::user()->avatar}} class="rounded-circle" style="
                                    width: 140px;
                                    height: 140px;
                                "></a>
                                @endif
                            </div>
                        </div>
                    </div>
                    @include('student.component.chooseAvatar')
                    <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
                        <div class="d-flex justify-content-between">
                            <a href="#!" class="btn btn-neutral" onclick="displayEdit();">Chỉnh sửa</a>
                            <a href="#!" class="btn btn-sm btn-primary" data-toggle="modal"
                            data-target="#modal-changePassword">Thay mật khẩu</a>
                            @include('student.component.changePassword')
                          </div>
                    </div>
                    <div class="card-body pt-0">
                        <div class="row">
                            <div class="col">
                                <div class="card-profile-stats d-flex justify-content-center">
                                    <h5 class="h3">
                                        {{ Auth::user()->name }}
                                    </h5>
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <div>
                                <span>Email: </span>
                                <span class="description">{{ Auth::user()->email }}</span>
                            </div>
                            <br />
                            <div class="h5 font-weight-300">
                                <i class="ni location_pin mr-2"></i>Address: {{ Auth::user()->address }}
                            </div>
                            <div class="h5 mt-4">
                                <i class="ni business_briefcase-24 mr-2"></i>Điện thoại liên hệ:
                                {{ Auth::user()->mobile }}
                            </div>
                            <div>
                                <i class="ni education_hat mr-2"></i>ĐẠI HỌC CÔNG NGHỆ
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="edit-profile" class="col-xl-8 order-xl-1" style="display: none">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">Chỉnh sửa trang cá nhân</h3>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action={{ route('student.post.profile', Auth::user()->id) }} method="POST" role="form">
                            @csrf
                            <h6 class="heading-small text-muted mb-4">Thông tin người dùng</h6>
                            <div class="pl-lg-4">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-username">Tên người dùng</label>
                                            <input type="text" id="input-username" class="form-control" name="name"
                                                placeholder="Username" value={{ Auth::user()->name }}>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-email">Email</label>
                                            <input type="email" id="input-email" class="form-control" name="email"
                                                placeholder="jesse@example.com" value={{ Auth::user()->email }}>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-first-name">Giới tính</label>
                                            <input type="password" id="input-first-name" class="form-control"
                                                name="gender" placeholder="Giới tính" value={{ Auth::user()->gender }}>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-last-name">Số điện thoại</label>
                                            <input type="text" id="input-last-name" class="form-control" name="mobile"
                                                placeholder="Số điện thoại" value={{ Auth::user()->mobile }}>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Address -->
                            <div class="pl-lg-4">
                                <div class="row">
                                <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-address">Địa chỉ</label>
                                            <input id="input-address" name="address" type="text" class="form-control"
                                                placeholder="Địa chỉ" value={{ Auth::user()->address }} />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="text-right float-right">
                                <button type="submit" class="btn btn-sm btn-primary">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function displayEdit() {
            document.getElementById('edit-profile').style.display = 'block';
        }
    </script>
@endsection
