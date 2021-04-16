@extends('layout_admin.main')
@section('main-conten')
<div class="page-header" style=" background-color: #FAFAFA;box-shadow: 0px 5px 20px 0px rgba(0, 0, 0, 0.1);">
    <div class="container-fluid">
        <h2 class="h5 no-margin-bottom">Chỉnh sửa slide ảnh</h2>
    </div>
</div>

<div class="container">
    <div class="row d-flex justify-content-center align-items-center">
        <div class="col-md-10">
            <form action="./save-edit-slide?id={{$slide->id}}" method="POST" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Tiêu đề : </label>
                            <input type="text" name="title" placeholder="Tiêu đề" class="form-control" value="{{$slide->title}}">
                            @if(isset($titleErr))
                            <span class="text-danger mt-1">{{$titleErr}}</span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="">Ảnh slide : </label>
                            <input type="file" name="image" placeholder="Ảnh slide" class="form-control" value="{{$slide->image}}">
                            @if(isset($imageErr))
                            <span class="text-danger mt-1">{{$imageErr}}</span>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Đường dẫn slide : </label>
                            <input type="text" name="link" placeholder="Đường dẫn slide ảnh" class="form-control" value="{{$slide->link}}">
                            @if(isset($linkErr))
                            <span class="text-danger mt-1">{{$linkErr}}</span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="">Trạng thái : </label>
                            <select name="active" class="form-control">
                                <option value="">Chọn trạng thái</option>
                                 @if($slide->active == 0 )
                                 <option value="0" selected >no active</option>
                                 <option value="1">active</option>
                                 @elseif($slide->active == 1)
                                 <option value="0">no active</option>
                                 <option value="1" selected>active</option>
                                 @else
                                 <option value="0">no active</option>
                                 <option value="1">active</option>
                                 @endif
                            </select>

                            @if(isset($activeErr))
                            <span class="text-danger mt-1">{{$activeErr}}</span>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="row d-flex justify-content-center align-items-center">
                    <input type="submit" value="Lưu" name="luu" class="btn btn-outline-danger mr-3">
                    <a href="./list-slide" class="btn btn-outline-info">Hủy</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection