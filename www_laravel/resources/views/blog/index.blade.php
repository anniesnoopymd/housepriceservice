@extends('blog.scaffold')

@section('content')
<div class="well">
    @include('blog.alert')
    <h4>Leave a Comment:</h4>
    <form class="form-horizontal" role="form" method="POST" action="{{ route('message.store') }}">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <label class="col-sm-2">煞氣ㄉ姓名:</label>
        <div class="col-sm-10">
            <input type="name" name="name" placeholder="請輸入姓名" value="{{ old('name') }}" class="form-control">
        </div>
        <label class="col-sm-2">弱弱ㄉemail:</label>
        <div class="col-sm-10">
            <input type="email" name="email" placeholder="請輸入email" value="{{ old('email') }}" class="form-control">
        </div>
        <label class="col-sm-2">青菜打:</label>
        <div class="col-sm-10">
            <textarea class="form-control" rows="5" name="content" placeholder="請輸入留言內容">{{ old('content') }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

<hr>

<!-- Posted Comments -->

<!-- Comment -->
@if(isset($Messages) && count($Messages) > 0)
@foreach($Messages as $Message)
<div class="media">
    <a class="pull-left" href="#">
        <img class="media-object" src="http://placehold.it/64x64" alt="">
    </a>
    <div class="media-body">
        <h4 class="media-heading">{{ $Message->name }} ( {{ $Message->email }} )</h4>
        {{ $Message->content }}
        <h4>
            <small>{{ $Message->created_at }}</small>
            <span class="editpart">
                <a href="{{ route('message.edit', $Message->id )}}" class="edit" data-toggle="modal" data-target="#editModal"><i class="glyphicon glyphicon-pencil"></i>編輯</a>
                <a href="{{ route('message.destroy', $Message->id )}}"><i class="glyphicon glyphicon-remove"></i>刪除</a>
            </span>
        </h4>
    </div>
</div>
@endforeach
@else
<div class="media">
    目前沒有任何留言
</div>
@endif

<!-- modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- remote load -->
        </div>
    </div>
</div>
<!-- /.modal -->
@stop