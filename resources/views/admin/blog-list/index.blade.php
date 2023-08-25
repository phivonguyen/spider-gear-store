@extends('layout-admin') @section('title', 'Add Blog Comments') @section('body')

<div class="page-body">

    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-lg-6">
                    <div class="page-header-left">
                        <h3>List Blogs
                            <small>Bigdeal Admin panel</small>
                        </h3>
                    </div>
                </div>
                <div class="col-lg-6">
                    <ol class="breadcrumb pull-right">
                        <li class="breadcrumb-item"><a href="index.html"><i data-feather="home"></i></a></li>
                        <li class="breadcrumb-item">Blogs</li>
                        <li class="breadcrumb-item active">List Blogs</li>
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
                        <h5>Blog Details</h5>
                    </div>
                    <div class="card-body">
                        <div class="btn-popup pull-right">
                            <a href="{{ route('blog-list.create')}}" class="btn btn-secondary">Create Blog</a>
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
                                        <th scope="col">Blog ID</th>
                                        <th scope="col">Author</th>
                                        <th scope="col">Title</th>
                                        <th scope="col">Content</th>
                                        <th scope="col">Post date</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($blogs as $blogs)
                                    <tr>
                                        <td scope="row">{{ $blogs -> blog_id}}</td>
                                        @foreach($userWithBlog as $user)
                                        <td scope="row">{{ $user -> first_name }} {{$user -> last_name}}</td>
                                        @endforeach
                                        <td scope="row">{{ $blogs -> title}}</td>
                                        <td scope="row">{{ substr($blogs -> content, 0, 20)}}...</td>
                                        <td scope="row">{{ $blogs -> updated_at}}</td>
                                        <td scope="row">
                                            <form action="{{route('blog-list.destroy',$blogs -> blog_id )}}" method="POST">
                                                <button class="btn btn-outline-warning">
                                                    <a href="{{route('blog-list.edit',$blogs -> blog_id)}}">Edit</a>
                                                </button>
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
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
