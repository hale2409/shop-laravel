@extends('layouts.admin')
@section('title', 'Admin | Thêm san pham')
@section('css')
    <link href="{{asset('vendors/select2/select2.min.css')}}" rel="stylesheet" />
    <link rel="stylesheet" href="{{asset('admins/product/add/add.css')}}">
@endsection
@section('content')
    <div class="content-wrapper">
        @include('admin.partials.content-header',['name'=>'Product','key'=>'Add'])
        <div class="content">
            <div class="container-fluid">
                <form action="{{route('product.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="name">Ten san pham:</label>
                                <input type="text" class="form-control" name="name" value="" placeholder="Ten san pham">
                            </div>
                            <div class="form-group">
                                <label for="price">Giá sản phẩm:</label>
                                <input type="text" class="form-control" name="price" placeholder="Nhập giá sản phẩm" value="">
                            </div>
                            <div class="form-group">
                                <label for="sale_price">Giá sale (*):</label>
                                <input type="text" class="form-control" name="sale_price" placeholder="Nhập giá sale" value="">
                            </div>
                            <div class="form-group">
                                <label for="tags">Nhập tag cho sản phẩm:</label>
                                <select class="form-control tag_select2_choose" multiple="multiple">
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
                            </div>
                            <div class="form-group">
                                <label>Ảnh chi tiết</label>
                                <input type="file" multiple="" class="form-control-file" name="image_path[]">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="content">Nhập nội dung:</label>
                                <textarea name="content" class="form-control tinymce_editor_init" rows="10"></textarea>
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
