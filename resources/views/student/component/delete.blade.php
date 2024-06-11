<button type="button" class="btn btn-sm btn-warning" data-toggle="modal"
data-target="#modal-notification{{$rowId}}">
<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
    fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
    <path
        d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
    <path fill-rule="evenodd"
        d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
</svg>
</button>
<div class="modal fade" id="modal-notification{{$rowId}}" tabindex="-1" role="dialog" aria-labelledby="modal-notification{{$rowId}}"
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

            <form action="{{route('subject.register.delete', $rowId)}}" method="POST" class="modal-footer">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-white">Có</button>
                <button type="button" class="btn btn-link text-white ml-auto" data-dismiss="modal">Không</button>
            </form>

        </div>
    </div>
</div>
