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
                                    <form class="needs-validation add-product-form" novalidate="" action="{{ route('blog-list.store')}}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                    <div class="row">
                                        <div class="container">
                                            <div class="form-upload">
                                                <div class="form-upload__preview"></div>
                                                <div class="form-upload__field">
                                                        <label class="form-upload__title" for="upload">Upload
                                                            <input class="form-upload__control js-form-upload-control" id="upload" multiple="true" type="file" name="blogimage" accept=".webp">
                                                        </label>
                                                    <button class="btn btn-dark btn-clear ml-3">Clear</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-7">
                                    <div class="form">
                                        <div class="form-group mb-3  row">
                                            <div class="col-xl-3 col-sm-4 mb-0">
                                                <label for="validationCustom01" >Blog Id :</label>
                                            </div>
                                            <div class="col-xl-8 col-sm-7">
                                                <div class="input-row">
                                                    <input class="form-control " name="blog_id" id="blog_id" type="text" required="">
                                                    <div class="valid-feedback">Nice!</div>
                                                    <small>Error message</small>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group mb-3  row">
                                            <div class="col-xl-3 col-sm-4 mb-0">
                                                <label for="validationCustom01" >Title :</label>
                                            </div>
                                            <div class="col-xl-8 col-sm-7">
                                                <div class="input-row">
                                                    <input class="form-control " name="title" id="title" type="text" required="">
                                                    <div class="valid-feedback">Looks good!</div>
                                                    <small>Error message</small>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group mb-3  row">
                                            <div class="col-xl-3 col-sm-4 mb-0">
                                                <label for="validationCustom01" >Author :</label>
                                            </div>
                                            <div class="col-xl-8 col-sm-7">
                                                <div class="input-row">
                                                    <input class="form-control " name="user_id" id="author" type="text" required="">
                                                    <div class="valid-feedback">Looks good!</div>
                                                    <small>Error message</small>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group mb-3 row">
                                            <div class="col-xl-3 col-sm-4 mb-0">
                                                <label for="validationCustom02" >Content :</label>
                                            </div>
                                            <div class="col-xl-8 col-sm-7">
                                                <div class="input-row">
                                                    <textarea  class="form-control" placeholder="Write Your Content" id="content" rows="6" name ="content"></textarea>
                                                    <div class="valid-feedback">Looks good!</div>
                                                    <small>Error message</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form">
                                        <div class="form-group row">
                                            <div class="col-xl-3 col-sm-4 mb-0">
                                                <label for="exampleFormControlSelect1" >Select Categories:</label>
                                            </div>
                                            <div class="col-xl-8 col-sm-7">
                                                <div class="input-row">
                                                    <select class="form-control digits" id="category" name="b_category_id">
                                                        @foreach ($blog_categories as $b)
                                                        <option value="{{$b -> b_category_id}}">{{ $b -> name}}</option>
                                                        @endforeach
                                                    </select>
                                                    <small>Error message</small>
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

<script>
    (function( $ ) {
    $.fn.attachmentUploader = function() {
    const uploadControl = $(this).find('.js-form-upload-control');
    const btnClear = $(this).find('.btn-clear');
    $(uploadControl).on('change', function(e) {
        const preview = $(this).closest('.form-upload').children('.form-uploadpreview');
        const files   = e.target.files;

    function previewUpload(file) {
        if ( /.(jpe?g|png|gif)$/i.test(file.name) ) {
            var reader = new FileReader();
            reader.addEventListener('load', function () {
            const html =
                    '<div class="form-uploaditem">' +
                    '<div class="form-uploaditem-thumbnail" style="background-image: url(' + this.result + ')"></div>' +
                    '<p class="form-uploaditem-name">' + file.name + '</p>' +
                    '</div>';
            preview.append( html );
            btnClear.show()
        }, false);
            reader.readAsDataURL(file);
        } else {
            alert('Please upload image only');
            uploadControl.val('');
        }
    }

    [].forEach.call(files, previewUpload);

    btnClear.on('click', function() {
        $('.form-upload__item').remove();
        uploadControl.val('');
        $(this).hide()
    })
    })
}
})( jQuery )

$('.form-upload').attachmentUploader();
</script>

<script>
const blogIdEle = document.getElementById('blog_id');
const titleEle = document.getElementById('title');
const authorEle = document.getElementById('author');
const contentEle = document.getElementById('content');
const categoryEle = document.getElementById('category');

const btnRegister = document.getElementById('btn-register');
const inputEles = document.querySelectorAll('.input-row');

btnRegister.addEventListener('click', function () {
    Array.from(inputEles).map((ele) =>
        ele.classList.remove('success', 'error')
    );
    let isValid = checkValidate();

    if (isValid) {
        alert('Nice blog!');
    }
});

function checkValidate() {
    let blogIdEle = blogIdEle.value;
    let titleEle = titleEle.value;
    let authorEle = authorEle.value;
    let contentEle = contentEle.value;
    let categoryEle = categoryEle.value;

    let isCheck = true;

    if (blogIdEle == '') {
        setError(blogIdEle, 'Blog Id do not be blank');
        isCheck = false;
    } else {
        setSuccess(blogIdEle);
    }

    if (titleEle == '') {
        setError(titleEle, 'Title do not be blank');
        isCheck = false;
    } else {
        setSuccess(titleEle);
    }

    if (authorEle == '') {
        setError(authorEle, 'Author do not be blank');
        isCheck = false;
    } else {
        setSuccess(authorEle);
    }

    if (contentEle == '') {
        setError(contentEle, 'Content do not be blank');
        isCheck = false;
    } else {
        setSuccess(contentEle);
    }

    if (categoryEle == '') {
        setError(categoryEle, 'Category do not be blank');
        isCheck = false;
    } else {
        setSuccess(categoryEle);
    }


    return isCheck;
}

function setSuccess(ele) {
    ele.parentNode.classList.add('success');
}

function setError(ele, message) {
    let parentEle = ele.parentNode;
    parentEle.classList.add('error');
    parentEle.querySelector('small').innerText = message;
}

</script>

@endsection

