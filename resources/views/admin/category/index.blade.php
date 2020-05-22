@extends('layouts.admin')
@section('title', 'Admin | Danh muc')
@section('content')

    <div class="content-wrapper">
        @include('admin.partials.content-header',['name'=>'Category','key'=>'List'])
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <a href="{{route('categories.create')}}" class="btn btn-success float-right">Add</a>
                    </div>
                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Tên danh muc</th>
                                <th scope="col">Ten SEO</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($categories as $key=>$category)
                                    <tr>
                                        <th>{{$key + 1}}</th>
                                        <td>{{$category->name}}</td>
                                        <td>{{$category->slug}}</td>
                                        <td>
                                            <a href="{{route('categories.edit', ['id'=>$category->id])}}" class="btn btn-default">Edit</a>
                                            <a href="{{route('categories.delete', ['id'=>$category->id])}}" class="btn btn-danger">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-12">{{$categories->links()}}</div>
                </div>
            </div>
        </div>
    </div>
@endsection
