@extends('layouts.admin')
@section('title', 'Admin | Sản phẩm')
@section('css')
    <link rel="stylesheet" href="{{asset('admins/product/index/index.css')}}">
@endsection
@section('js')
    <script src="{{asset('vendors/sweetAlert2/sweetalert2@9.js')}}"></script>
    <script src="{{asset('admins/product/index/index.js')}}"></script>
@endsection
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
                                @foreach ($products as $key=>$productItem)
                                    <tr>
                                        <th>{{$key + 1}}</th>
                                        <td>
                                            <ul style="list-style: none">
                                                <li><i>Ten:</i> {{$productItem->name}}</li>
                                                <li><i>Gia:</i> {{number_format($productItem->price, 0, ',', '.')}} <b>VND</b></li>
                                                <li><i>Sale:</i> {{$productItem->sale_price}} <b>%</b></li>
                                            </ul>
                                        </td>
                                        <td>
                                            <img class="product_image_150_100" src="{{$productItem->feature_image_path}}" alt="">
                                        </td>
                                        <td>{{optional($productItem->category)->name}}</td>
                                        <td>
                                            <a href="{{route('product.edit',['id'=>$productItem->id])}}" class="btn btn-default">Edit</a>
                                            <a href="" data-url="{{route('product.delete',['id'=>$productItem->id])}}" class="btn btn-danger action_delete">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-12">{{$products->links()}}</div>
                </div>
            </div>
        </div>
    </div>
@endsection
