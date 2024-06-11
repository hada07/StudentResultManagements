<div class="modal fade" id="modal-notification{{$row->id}}" tabindex="-1" role="dialog" aria-labelledby="modal-notification{{$row->id}}"
    aria-hidden="true">
    <div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
        <div class="modal-content bg-gradient-danger">

            <div class="modal-header">
                <h6 class="modal-title" id="modal-title-notification">Cảnh báo</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <div class="modal-body">

                <div class="py-3 text-center">
                    <i class="ni ni-bell-55 ni-3x"></i>
                    <h4 class="heading mt-4">Bạn chắc chắn muốn xóa nó?</h4>
                    <p>"Nếu xóa thì hãy chọn <b>Có</b></b>, ngược lại chọn <b>Không</b> để hủy"</p>
                </div>

            </div>

            <form action="{{route('admin.'.$title.'.delete', $row->id)}}" method="POST" class="modal-footer">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-white">Có</button>
                <button type="button" class="btn btn-link text-white ml-auto" data-dismiss="modal">Không</button>
            </form>

        </div>
    </div>
</div>
