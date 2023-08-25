@extends('layout-admin') @section('title', 'Add Blog Comments') @section('body')


<div class="page-body">

    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-lg-6">
                    <div class="page-header-left">
                        <h3>Add Blogs
                            <small>Bigdeal Admin panel</small>
                        </h3>
                    </div>
                </div>
                <div class="col-lg-6">
                    <ol class="breadcrumb pull-right">
                        <li class="breadcrumb-item"><a href="index.html"><i data-feather="home"></i></a></li>
                        <li class="breadcrumb-item">Blogs</li>
                        <li class="breadcrumb-item active">Create Blogs</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid Ends-->

    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Blog Form</h5>
                    </div>
                    <div class="card-body">
                        <div class="btn-popup pull-right">
                            <a href="{{ route('blog-list.index')}}" class="btn btn-secondary">Blog List</a>
                        </div>
                        <div class="row product-adding">
                            <div class="col-xl-5">
                                <div class="add-product">
                                    <div class="row">
                                        <div class="col-xl-9 xl-50 col-sm-6 col-9">
                                            <img src="../assets/images/pro3/1.jpg" alt="" class="img-fluid image_zoom_1 blur-up lazyloaded">
                                        </div>
                                        <div class="col-xl-3 xl-50 col-sm-6 col-3">
                                            <ul class="file-upload-product">
                                                <li><div class="box-input-file"><input class="upload" type="file" name="blogimage"><i class="fa fa-plus"></i></div></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-7">
                                <form class="needs-validation add-product-form" novalidate="" action="{{ route('blog-list.store')}}" method="POST">
                                    @csrf
                                    <div class="form">
                                        <div class="form-group mb-3  row">
                                            <div class="col-xl-3 col-sm-4 mb-0">
                                                <label for="validationCustom01" >Blog Id :</label>
                                            </div>
                                            <div class="col-xl-8 col-sm-7">
                                                <input class="form-control " name="blog_id" id="validationCustom01" type="text" required="">
                                                <div class="valid-feedback">Nice!</div>
                                            </div>
                                        </div>
                                        <div class="form-group mb-3  row">
                                            <div class="col-xl-3 col-sm-4 mb-0">
                                                <label for="validationCustom01" >Title :</label>
                                            </div>
                                            <div class="col-xl-8 col-sm-7">
                                                <input class="form-control " name="title" id="validationCustom01" type="text" required="">
                                                <div class="valid-feedback">Looks good!</div>
                                            </div>
                                        </div>
                                        <div class="form-group mb-3  row">
                                            <div class="col-xl-3 col-sm-4 mb-0">
                                                <label for="validationCustom01" >Author :</label>
                                            </div>
                                            <div class="col-xl-8 col-sm-7">
                                                <input class="form-control " name="user_id" id="validationCustom01" type="text" required="">
                                                <div class="valid-feedback">Looks good!</div>
                                            </div>
                                        </div>
                                        <div class="form-group mb-3 row">
                                            <div class="col-xl-3 col-sm-4 mb-0">
                                                <label for="validationCustom02" >Content :</label>
                                            </div>
                                            <div class="col-xl-8 col-sm-7">
                                                <textarea  class="form-control"
                                            placeholder="Write Your Content"
                                            id="exampleFormControlTextarea1"
                                            rows="6" name ="content"></textarea>
                                                <div class="valid-feedback">Looks good!</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form">
                                        <div class="form-group row">
                                            <div class="col-xl-3 col-sm-4 mb-0">
                                                <label for="exampleFormControlSelect1" >Select Categories:</label>
                                            </div>
                                            <div class="col-xl-8 col-sm-7">
                                                <select class="form-control digits" id="category" name="b_category_id">
                                                    @foreach ($blog_categories as $b)
                                                    <option value="{{$b -> b_category_id}}">{{ $b -> name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="offset-xl-3 offset-sm-4">
                                        <button type="submit" class="btn btn-primary">Add</button>
                                        <button type="button" class="btn btn-light">Discard</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid Ends-->

</div>

@endsection

