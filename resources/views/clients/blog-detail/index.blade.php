@extends('layout') @section('title', 'Contact') @section('body')
<!-- breadcrumb start -->
<div class="breadcrumb-main">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="breadcrumb-contain">
                    <div>
                        <h2>blog detail</h2>
                        <ul>
                            <li>
                                <a href="javascript:void(0)">home</a>
                            </li>
                            <li>
                                <i class="fa fa-angle-double-right"></i>
                            </li>
                            <li>
                                <a href="javascript:void(0)">blog-detail</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb End -->

<!--section start-->
<section class="blog-detail-page section-big-py-space ratio2_3">
    <div class="container">
        <div class="row section-big-pb-space">
            <div class="col-sm-12 blog-detail">
                <div class="creative-card">
                    <img src="{{ $blog->blogimage }}" alt="Image">
                    <h3>
                        {{ $blog -> title}}
                    </h3>
                    <ul class="post-social">
                        <li>{{ $blog -> user_create_date}}</li>
                        @foreach ($userWithBlog as $user)
                        <li>Posted By : {{ $user->first_name}}</li>
                        @endforeach
                        <li><i class="fa fa-comments"></i> 10 Comment</li>
                    </ul>
                    <p>
                        {{$blog -> content}}
                    </p>
                </div>
            </div>
        </div>
        <div class="row section-big-pb-space">
            <div class="col-sm-12">
                <div class="creative-card">
                    @if (empty($blog_comments))
                        <p>No comment.</p>
                    @else
                    @foreach ($blog_comments as $blog_comments)
                    <ul class="comment-section">
                        <li>
                            <div class="media">
                                <img
                                    src="../assets/images/avtar/2.jpg"
                                    alt="Generic placeholder image"
                                />
                                <div class="media-body">
                                    <h6>
                                        @foreach ($userWithBlog_Comments as $user_comments)
                                        <li>User : {{ $user_comments-> first_name}}</li>
                                        @endforeach
                                        <span>{{ $blog_comments -> user_create_date}}</span>
                                    </h6>
                                            {{ $blog_comments -> content}}
                                    </p>
                                </div>
                            </div>
                        </li>
                    </ul>
                    @endforeach
                    @endif
                </div>
            </div>
        </div>
        <div class="row blog-contact">
            <div class="col-sm-12">
                <div class="creative-card">
                    <a href="{{ url("blog-comments/{$blog->blog_id}") }}">
                        <button class="btn btn-normal">
                            Post Comment
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
<!--Section ends-->
@endsection
