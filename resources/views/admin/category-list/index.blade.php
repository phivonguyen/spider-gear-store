@extends('layout-admin') @section('title', 'Admin Blog Category') @section('body')

<div class="page-body">

    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-lg-6">
                    <div class="page-header-left">
                        <h3>List Blog Categories
                            <small>Bigdeal Admin panel</small>
                        </h3>
                    </div>
                </div>
                <div class="col-lg-6">
                    <ol class="breadcrumb pull-right">
                        <li class="breadcrumb-item"><a href="index.html"><i data-feather="home"></i></a></li>
                        <li class="breadcrumb-item">Blog Categories</li>
                        <li class="breadcrumb-item active">List Blog Categories</li>
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
                        <h5>Blog Category List</h5>
                    </div>
                    <div class="card-body">
                        <div class="btn-popup pull-right">
                            <a href="{{ route('category-list.create')}}" class="btn btn-secondary">Create new Blog Category</a>
                        </div>
                        <div>
                            @if (Session::has('alert'))
                                <div class="alert alert-success">
                                    {{Session::get('alert')}}
                                </div>
                            @endif
                        </div>
                        <div id="" class="category-table order-table">
                            <table class="table table-bordered table-striped table-responsive">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">Category ID</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($blog_categories as $category)
                                    <tr>
                                        <td scope="row">{{ $category -> b_category_id}}</td>
                                        <td scope="row">{{ $category -> name}}</td>
                                        <td scope="row">
                                            <form action="{{route('category-list.destroy', $category -> b_category_id )}}" method="POST" onsubmit="return confirm('You really want to delete this blog?')">
                                                <input type="hidden" name="_method" value="DELETE" />
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                            <button class="btn btn-outline-warning">
                                                <a href="{{route('category-list.edit',$category -> b_category_id)}}">Edit</a>
                                            </button>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid Ends-->

</div>

@endsection
