@extends('layouts.admin')
@section('title', 'Admin | Slider')
@section('content')

    <div class="content-wrapper">
        @include('admin.partials.content-header',['name'=>'Slider','key'=>'list'])
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <a href="{{route('slider.create')}}" class="btn btn-success float-right">Add</a>
                    </div>
                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Tên slider</th>
                                <th scope="col">Description</th>
                                <th scope="col">Hinh anh</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($sliders as $key=>$slider)
                                <tr>
                                    <th scope="row">{{$key + 1}}</th>
                                    <td>{{$slider->name}}</td>
                                    <td style="width: 500px">{{$slider->description}}</td>
                                    <td>
                                        <img class="image_slider_150_100" src="{{$slider->image_path}}" alt="" width="150px" height="100px">
                                    </td>
                                    <td>
                                        <a href="{{route('slider.edit',['id'=>$slider->id])}}" class="btn btn-default">Edit</a>
                                        <a href="" data-url="{{route('slider.delete',['id'=>$slider->id])}}" class="btn btn-danger action_delete">Delete</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-12"></div>
                </div>
            </div>
        </div>
    </div>
@endsection
