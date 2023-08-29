@extends('layout') @section('title', 'Comments') @section('body')


<div class="breadcrumb-main">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="breadcrumb-contain">
                    <div>
                        <h2>comments</h2>
                        <ul>
                            <li>
                                <a href="javascript:void(0)">home</a>
                            </li>
                            <li>
                                <i class="fa fa-angle-double-right"></i>
                            </li>
                            <li>
                                <a href="javascript:void(0)">comments</a>
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
            <form class="theme-form" action="{{ route('comments.store',['id' => $product-> product_id])}}" method="POST">
            @csrf
                <div class="row g-3">
                    <input type="hidden" name="product_id" value="{{ $product-> product_id }}">
                        <div class="col-md-12">
                            <label for="exampleFormControlTextarea1" >Rating</label>
                            <input name="rating" type="text" value="" class="form-control" >
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
