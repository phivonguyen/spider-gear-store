@extends('layout-admin') @section('title', 'Blog Comments') @section('body')

<div class="page-body">

    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-lg-6">
                    <div class="page-header-left">
                        <h3>List Blog Comments
                            <small>Bigdeal Admin panel</small>
                        </h3>
                    </div>
                </div>
                <div class="col-lg-6">
                    <ol class="breadcrumb pull-right">
                        <li class="breadcrumb-item"><a href="{{ route('/')}}"><i data-feather="home"></i></a></li>
                        <li class="breadcrumb-item">Blogs</li>
                        <li class="breadcrumb-item active">List Blog Comments</li>
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
                        <h5>Blog Comments Detail</h5>
                    </div>
                    <div class="card-body">
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
                                        <th scope="col">Blog's title</th>
                                        <th scope="col">Author</th>
                                        <th scope="col">Content</th>
                                        <th scope="col">Post date</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($blog_comments as $blog_comments)
                                    <tr>
                                        <td scope="row">{{ $blog_comments -> blog}}</td>
                                        <td scope="row">{{ $blog_comments -> author }}</td>
                                        <td scope="row">{{ $blog_comments -> content}}</td>
                                        <td scope="row">{{$blog_comments -> created_at}}</td>
                                        <td scope="row">
                                            <form action="{{route('blog-list.destroy',$blog_comments -> comment_id )}}" method="POST" onsubmit="return confirm('You really want to delete this comment?')">
                                                <input type="hidden" name="_method" value="DELETE" />
                                                {{ csrf_field() }}
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
