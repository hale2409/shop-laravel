@extends('layouts.admin')
@section('title', 'Admin | Menu')
@section('content')

    <div class="content-wrapper">
        @include('admin.partials.content-header',['name'=>'Menu','key'=>'List'])
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <a href="{{route('menus.create')}}" class="btn btn-success float-right">Add</a>
                    </div>
                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Tên menu</th>
                                <th scope="col">Ten SEO</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($menus as $key=>$menu)
                                <tr>
                                    <th>{{$key + 1}}</th>
                                    <td>{{$menu->name}}</td>
                                    <td>{{$menu->slug}}</td>
                                    <td>
                                        <a href="{{route('menus.edit', ['id'=>$menu->id])}}" class="btn btn-default">Edit</a>
                                        <a href="{{route('menus.delete', ['id'=>$menu->id])}}" class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-12">{{$menus->links()}}</div>
                </div>
            </div>
        </div>
    </div>
@endsection
