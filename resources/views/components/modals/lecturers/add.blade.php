<div class="modal fade" id="modal-add" tabindex="-1" role="dialog" aria-labelledby="modal-add" aria-hidden="true">
    <div class="modal-dialog modal- modal-dialog-centered modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-body p-0">
                <div class="card bg-secondary border-0 mb-0">
                    <div class="card-body px-lg-5 py-lg-5">
                        <form role="form" action = {{ route('admin.lecturers.add') }} method="POST">
                            @csrf   
                            <div class="form-group mb-3">
                                <div class="input-group input-group-merge input-group-alternative">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"></span>
                                    </div>
                                    <input class="form-control" placeholder="Mã giảng viên" type="text" name="college_id">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group input-group-merge input-group-alternative">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"></span>
                                    </div>
                                    <input class="form-control" placeholder="Name" type="text" name="name">
                                </div>
                            </div>
                            <!-- <div class="form-group">
                                <select class="form-control" data-toggle="select" title="Simple select" data-live-search="true" data-live-search-placeholder="Search ...">
                                    <option>Alerts</option>
                                    <option>Badges</option>
                                    <option>Buttons</option>
                                    <option>Cards</option>
                                    <option>Forms</option>
                                    <option>Modals</option>
                                </select>
                                </div>
                            </div> -->
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
