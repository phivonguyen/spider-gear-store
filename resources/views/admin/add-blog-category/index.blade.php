@extends('layout-admin') @section('title', 'Admin Blog Category') @section('body')

<div class="page-body">

    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-lg-6">
                    <div class="page-header-left">
                        <h3>Add Blog Category
                            <small>Bigdeal Admin panel</small>
                        </h3>
                    </div>
                </div>
                <div class="col-lg-6">
                    <ol class="breadcrumb pull-right">
                        <li class="breadcrumb-item"><a href="index.html"><i data-feather="home"></i></a></li>
                        <li class="breadcrumb-item">Blog Category</li>
                        <li class="breadcrumb-item active">Add Blog Category</li>
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
                        <h5>Blog Category Form</h5>
                    </div>
                    <div class="card-body">
                        <div class="btn-popup pull-right">
                            <a href="{{ route('category-list.index')}}" class="btn btn-secondary">Blog Category List</a>
                        </div>
                        <div class="row product-adding">
                            <div class="col-xl-5">
                                <div class="add-product">
                                    <form class="needs-validation add-product-form" novalidate="" action="{{ route('category-list.store')}}" method="POST">
                                        @csrf
                                </div>
                            </div>
                            <div class="col-xl-7">
                                    <div class="form">
                                        <div class="form-group mb-3  row">
                                            <div class="col-xl-3 col-sm-4 mb-0">
                                                <label for="validationCustom01" >Blog Category Id:</label>
                                            </div>
                                            <div class="col-xl-8 col-sm-7">
                                                <div class="input-row">
                                                    <input class="form-control " name="b_category_id" id="b_category_id" type="text" required="">
                                                    <div class="valid-feedback">Nice!</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group mb-3  row">
                                            <div class="col-xl-3 col-sm-4 mb-0">
                                                <label for="validationCustom01" >Name :</label>
                                            </div>
                                            <div class="col-xl-8 col-sm-7">
                                                <div class="input-row">
                                                    <input class="form-control " name="name" id="name" type="text" required="">
                                                    <div class="valid-feedback">Looks good!</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="offset-xl-3 offset-sm-4">
                                        <button type="submit" id="btn-register" class="btn btn-primary">Add</button>
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
