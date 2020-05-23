@extends('layouts.admin')

@section('title', 'Admin | Them edit')
@section('css')
    <link rel="stylesheet" href="{{asset('admins/slider/add/add.css')}}">
@endsection

@section('content')
    <div class="content-wrapper">
        @include('admin.partials.content-header',['name'=>'Slider','key'=>'Add'])
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <form action="{{route('slider.update',['id'=>$slider->id])}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>Tên slider</label>
                                <input type="text" class="form-control" name="name" placeholder="Nhập tên slider" value="{{$slider->name}}">
                            </div>
                            <div class="form-group">
                                <label>Mo ta slider</label>
                                <textarea class="form-control" name="description" rows="4">{{$slider->description}}</textarea>
                            </div>
                            <div class="form-group">
                                <label>Hinh anh</label>
                                <input type="file" class="form-control" name="image_path">
                                <div class="col-md-4">
                                    <div class="row">
                                        <img class="image_slider" src="{{$slider->image_path}}" alt="" width="200px" height="200px">
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

