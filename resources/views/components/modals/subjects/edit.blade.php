<div class="modal fade" id="modal-edit{{ $row->id }}" tabindex="-1" role="dialog" aria-labelledby="modal-edit{{ $row->id }}" aria-hidden="true">
    <div class="modal-dialog modal- modal-dialog-centered modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-body p-0">
                <div class="card bg-secondary border-0 mb-0">
                    <div class="card-body px-lg-5 py-lg-5">
                        <form role="form" action = {{ route('admin.'.$title.'.edit', $row->id) }} method="POST">
                            @csrf   
                            @method('PUT')
                            <div class="form-group mb-3">
                                <div class="input-group input-group-merge input-group-alternative">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"></span>
                                    </div>
                                    <input class="form-control" placeholder="Mã môn học" type="text" name="subject_id" value="{{$row->subject_id}}" style="color: black">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group input-group-merge input-group-alternative">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"></span>
                                    </div>
                                    <input class="form-control" placeholder="Tên môn học" type="text" name="name" value="{{$row->name}}" style="color: black">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group input-group-merge input-group-alternative" >
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"></span>
                                    </div>
                                    <input class="form-control" placeholder="Số tín chỉ" type="text" name="credit" value={{$row->credit}} style="color: black">
                                </div>
                            </div>
                            <div class="form-group">
                                <select class="form-control"  style="color: black" name="lecturer" data-toggle="select" data-live-search="true">
                                    <option value="" selected hidden>{{$row->lecturer_name}}</option>
                                    @foreach ($lecturers as $lecturer)
                                    <option value={{$lecturer->id}}>{{$lecturer->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <!-- <div class="form-group">
                                <div class="input-group input-group-merge input-group-alternative">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                                    </div>
                                </div>
                            </div> -->
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary my-4">Chỉnh sửa</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
