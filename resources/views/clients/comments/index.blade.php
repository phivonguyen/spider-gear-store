@extends('layout') @section('title', 'Blog Comments') @section('body')


<div class="breadcrumb-main">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="breadcrumb-contain">
                    <div>
                        <h2>blog comments</h2>
                        <ul>
                            <li>
                                <a href="javascript:void(0)">home</a>
                            </li>
                            <li>
                                <i class="fa fa-angle-double-right"></i>
                            </li>
                            <li>
                                <a href="javascript:void(0)">blog-comments</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb End -->
<div class="row blog-contact">
    <div class="col-sm-12">
        <div class="creative-card">
            <form class="theme-form" action="{{ route('blogComments.store',['id' => $blog->blog_id])}}" method="POST">
            @csrf
                <div class="row g-3">
                    <input type="hidden" name="blog_id" value="{{ $blog->blog_id }}">
                        <div class="col-md-12">
                        </div>
                        <div class="col-md-12">
                            @error('content')
                            <div class="error" style="color:red">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <label for="exampleFormControlTextarea1" >Comment</label>
                                            <textarea  class="form-control"
                                            placeholder="Write Your Comment"
                                            id="exampleFormControlTextarea1"
                                            rows="6" name ="content"></textarea>
                        </div>
                        <div class="col-md-12">
                            <button class="btn btn-normal" type="submit">
                                Post Comment
                            </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Section ends -->
@endsection
