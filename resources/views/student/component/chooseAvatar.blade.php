<div class="modal fade" id="modal-avatar" tabindex="-1" role="dialog" aria-labelledby="modal-avatar" aria-hidden="true">
    <div class="modal-dialog modal- modal-dialog-centered modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-body p-0">
                <div class="card bg-secondary border-0 mb-0">
                    <div class="card-body px-lg-5 py-lg-5">
                        <form role="form" action={{ route('student.profile.avatar') }} method="POST" enctype="multipart/form-data" class="d-flex">
                            @csrf   
                            @method("PUT")
                            <input type="file" name="image"> 
                            <div class="text-center">
                                <input type="submit" value="Submit" class="btn btn-sm btn-primary">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>