@extends('layouts.admin')
@section('title', 'Admin | Sản phẩm')
@section('content')

    <div class="content-wrapper">
        @include('admin.partials.content-header',['name'=>'Product','key'=>'List'])
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <a href="{{route('product.create')}}" class="btn btn-success float-right">Add</a>
                    </div>
                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Sản phẩm</th>
                                <th scope="col">Hình ảnh</th>
                                <th scope="col">Danh mục</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th>1</th>
                                    <td>
                                        <ul style="list-style: none">
                                            <li>Ten: Iphone 4</li>
                                            <li>Gia: 50000 VND</li>
                                            <li>Sale: 3 %</li>
                                        </ul>
                                    </td>
                                    <td>Dien thoai</td>
                                    <td>
                                        <a href="" class="btn btn-default">Edit</a>
                                        <a href="" class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-12"></div>
                </div>
            </div>
        </div>
    </div>
@endsection
