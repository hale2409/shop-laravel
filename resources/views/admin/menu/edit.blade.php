@extends('layouts.admin')
@section('title', 'Admin | Danh muc')
@section('content')

@section('content')
    <div class="content-wrapper">
        @include('admin.partials.content-header',['name'=>'Menu','key'=>'Edit'])
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <form action="{{route('menus.update', ['id'=>$menuFollowIdEdit->id])}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label>Tên menu</label>
                                <input type="text" class="form-control" name="name" placeholder="Nhập tên menu" value="{{$menuFollowIdEdit->name}}">
                            </div>
                            <div class="form-group">
                                <label>Chon menu cha</label>
                                <select class="form-control" name="parent_id">
                                    <option value="0">Chọn menu cha</option>
                                    {!! $optionHtml !!}
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

