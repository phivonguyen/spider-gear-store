@extends('layout') @section('title', 'Contact') @section('body')

<!-- breadcrumb start -->
<div class="breadcrumb-main">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="breadcrumb-contain">
                    <div>
                        <h2>blog</h2>
                        <ul>
                            <li>
                                <a href="javascript:void(0)">home</a>
                            </li>
                            <li>
                                <i class="fa fa-angle-double-right"></i>
                            </li>
                            <li>
                                <a href="javascript:void(0)">blog</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb End -->

<!-- section start -->
<section class="section-big-py-space blog-page ratio2_3">
    <div class="custom-container">
        <div class="row">
            <!--Blog sidebar start-->
            <div class="col-xl-3 col-lg-4 col-md-5">
                <div class="blog-sidebar">
                    @foreach ($newBlog as $nB)
                    <div class="theme-card">
                        <h4>New Blog</h4>
                        <ul class="recent-blog">
                            <li>
                                <div class="media">
                                    <img src="{{ $nB->blogimage }}" alt="Image">
                                    <div class="media-body align-self-center">
                                        <h6>{{$nB -> title}}</h6>
                                        <p>0 hits</p>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    @endforeach
                    <div class="theme-card">
                        <h4>Sale Blog</h4>
                        @foreach($saleBlog as $sB)
                        <ul class="popular-blog">
                            <li>
                                <div class="media">
                                    <div class="blog-date">
                                        <span>{{$sB -> blog_id}} </span>
                                    </div>
                                    <div class="media-body align-self-center">
                                        <h6>{{$sB -> title}}</h6>
                                        <p>0 hits</p>
                                    </div>
                                </div>
                                <p>
                                    {{$sB -> content}}
                                </p>
                            </li>
                        </ul>
                        @endforeach
                    </div>
                </div>
            </div>
            <!--Blog sidebar start-->
            <!--Blog List start-->
            <div class="col-xl-9 col-lg-8 col-md-7 order-sec">
                @foreach ($blogs as $b)
                <div class="row blog-media">
                    <div class="col-xl-6">
                        <div class="blog-left">
                            <a href="{{ url("blog-detail/{$b->blog_id}") }}">
                                <img src="{{ $b->blogimage }}" alt="Image">
                            </a>
                            <div class="label-block">
                                <div class="date-label">{{$b -> updated_at}}</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="blog-right">
                            <div>
                                <a href="{{ url("blog-detail/{$b->blog_id}") }}"
                                    ><h4>
                                        {{ $b->title }}
                                    </h4></a
                                >
                                <ul class="post-social">
                                    @foreach ($userWithBlog as $user)
                                    <li>Posted By : {{ $user->first_name}}</li>
                                    @endforeach
                                    <li><i class="fa fa-heart"></i> 5 Hits</li>
                                    <li>
                                        <i class="fa fa-comments"></i>
                                        10 Comment
                                    </li>
                                </ul>
                                <p>
                                    {{ $b-> content}}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <!--Blog List start-->
        </div>
    </div>
</section>
<!-- Section ends -->
@endsection
