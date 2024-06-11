<div class="modal fade" id="modal-add" tabindex="-1" role="dialog" aria-labelledby="modal-add" aria-hidden="true">
    <div class="modal-dialog modal- modal-dialog-centered modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-body p-0">
                <div class="card bg-secondary border-0 mb-0">
                    <div class="card-body px-lg-5 py-lg-5">
                        <form role="form" action = {{ route('admin.'.$title.'.add') }} method="POST">
                            @csrf   
                            <div class="form-group mb-3">
                                <div class="input-group input-group-merge input-group-alternative">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"></span>
                                    </div>
                                    <input class="form-control" placeholder="Mã môn học" type="text" name="subject_id" style="color: black">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group input-group-merge input-group-alternative" >
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"></span>
                                    </div>
                                    <input class="form-control" placeholder="Tên môn học" type="text" name="name" style="color: black">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group input-group-merge input-group-alternative" >
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"></span>
                                    </div>
                                    <input class="form-control" placeholder="Số tín chỉ" type="text" name="credit" style="color: black">
                                </div>
                            </div>
                            <div class="form-group">
                                <select class="form-control"  style="color: black" name="lecturer" data-toggle="select" data-live-search="true">
                                    <option value="" selected hidden>Giảng viên</option>
                                    @foreach ($lecturers as $lecturer)
                                    <option value={{$lecturer->id}}>{{$lecturer->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary my-4">Thêm</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
