@extends('layout-admin') @section('title', 'Admin Blog') @section('body')

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
                                        <th scope="col">Category</th>
                                        <th scope="col">Title</th>
                                        <th scope="col">Content</th>
                                        <th scope="col">Post date</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($blogs as $blog)
                                    <tr>
                                        <td scope="row">{{ $blog -> blog_id}}</td>
                                        @foreach($userWithBlog as $user)
                                        <td scope="row">{{ $user -> first_name }} {{$user -> last_name}}</td>
                                        @endforeach
                                        <td scope="row">{{ $blog -> name}}</td>
                                        <td scope="row">{{ $blog -> title}}</td>
                                        <td scope="row">{{ substr($blog -> content, 0, 20)}}...</td>
                                        <td scope="row">{{ $blog -> updated_at->format('d-m-y')}}</td>
                                        <td scope="row">
                                            <form action="{{route('blog-list.destroy',$blog -> blog_id )}}" method="POST" onsubmit="return confirm('You really want to delete this blog?')">
                                                <input type="hidden" name="_method" value="DELETE" />
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                            <button class="btn btn-outline-warning">
                                                <a href="{{route('blog-list.edit',$blog -> blog_id)}}">Edit</a>
                                            </button>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    {{ $blogs->appends(request()->all())->links() }}
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid Ends-->

</div>

@endsection
