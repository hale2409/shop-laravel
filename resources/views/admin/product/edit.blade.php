@extends('layouts.admin')
@section('title', 'Admin | Thêm san pham')
@section('css')
    <link href="{{asset('vendors/select2/select2.min.css')}}" rel="stylesheet" />
    <link rel="stylesheet" href="{{asset('admins/product/add/add.css')}}">
@endsection
@section('content')
    <div class="content-wrapper">
        @include('admin.partials.content-header',['name'=>'Product','key'=>'edit'])
        <div class="content">
            <div class="container-fluid">
                <form action="{{route('product.update', ['id'=>$product->id])}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="name">Ten san pham:</label>
                                <input type="text" class="form-control" name="name" placeholder="Ten san pham" value="{{$product->name}}">
                            </div>
                            <div class="form-group">
                                <label for="price">Giá sản phẩm:</label>
                                <input type="text" class="form-control" name="price" placeholder="Nhập giá sản phẩm" value="{{$product->price}}">
                            </div>
                            <div class="form-group">
                                <label for="sale_price">Giá sale (*):</label>
                                <input type="text" class="form-control" name="sale_price" placeholder="Nhập giá sale" value="{{$product->sale_price}}">
                            </div>
                            <div class="form-group">
                                <label for="tags">Nhập tag cho sản phẩm:</label>
                                <select class="form-control tag_select2_choose" name="tags[]" multiple="multiple">
                                    @foreach ($product->tags as $tagItem)
                                        <option value="{{$tagItem->name}}" selected>{{$tagItem->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Chon danh mục cha</label>
                                <select class="form-control" name="category_id">
                                    <option value="0">Chọn danh mục cha</option>
                                    {!! $htmlOption !!}
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Ảnh đại điện</label>
                                <input type="file" class="form-control-file" name="feature_image_path">
                                <div class="col-md-12 conatiner_feature_image">
                                    <div class="row">
                                        <img class="product_feature_image" src="{{$product->feature_image_path}}" alt="">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Ảnh chi tiết</label>
                                <input type="file" multiple="" class="form-control-file" name="image_path[]">
                                <div class="col-md-12 container_image_detail">
                                    <div class="row">
                                        @foreach ($product->productImage as $productItem)
                                            <div class="col-md-3">
                                                <img class="image_detail_product" src="{{$productItem->image_path}}" alt="">
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="content">Nhập nội dung:</label>
                                <textarea name="contents" class="form-control tinymce_editor_init" rows="10">{{$product->content}}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="{{asset('vendors/select2/select2.min.js')}}"></script>
    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
    <script src="{{asset('admins/product/add/add.js')}}"></script>
@endsection
