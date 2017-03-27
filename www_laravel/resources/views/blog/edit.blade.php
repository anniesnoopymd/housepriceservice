<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h4 class="modal-title">編輯留言</h4>

</div>
<div class="modal-body">
    <form class="form-horizontal" role="form" method="POST" action="{{ route('message.update', $Message->id) }}">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <label class="col-sm-2">姓名:</label>
        <div class="col-sm-10">
            <input type="name" name="name" placeholder="請輸入姓名"  value="{{ $Message->name }}" class="form-control">
        </div>
        <label class="col-sm-2">email:</label>
        <div class="col-sm-10">
            <input type="email" name="email" placeholder="請輸入email"  value="{{ $Message->email }}" class="form-control">
        </div>
        <label class="col-sm-2">留言:</label>
        <div class="col-sm-10">
            <textarea class="form-control" rows="5" name="content" placeholder="請輸入留言內容">{{ $Message->content }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

<script type="text/javascript">
    $(document).on("hidden.bs.modal", function (e) {
        $(e.target).removeData("bs.modal").find(".modal-content").empty();
    });
</script>