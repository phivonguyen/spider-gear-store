@extends('layout') @section('title', 'Search') @section('body')
<!-- breadcrumb start -->
<div class="breadcrumb-main">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="breadcrumb-contain">
                    <div>
                        <h2>search</h2>
                        <ul>
                            <li><a href="index.html">home</a></li>
                            <li>
                                <i class="fa fa-angle-double-right"></i>
                            </li>
                            <li>
                                <a href="javascript:void(0)">search</a>
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
<section class="authentication-page section-big-pt-space b-g-light">
    <div class="custom-containe">
        <section class="search-block">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 offset-lg-3">
                        <form class="form-header">
                            <div class="input-group">
                                <input
                                    type="text"
                                    class="form-control"
                                    aria-label="Amount (to the nearest dollar)"
                                    placeholder="Search Products......"
                                />
                                <button class="btn btn-normal">
                                    <i class="fa fa-search"></i>Search
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
</section>
<!-- section end -->

<!-- product section start -->
<section class="section-big-py-space ratio_asos b-g-light">
    <div class="custom-container">
        <div class="row search-product related-pro1">
            <div class="col-xl-3 col-md-4 col-sm-6">
                <div class="product">
                    <div class="product-box">
                        <div class="product-imgbox">
                            <div class="product-front">
                                <img
                                    src="../assets/images/layout-2/product/1.jpg"
                                    class="img-fluid"
                                    alt="product"
                                />
                            </div>
                            <div class="product-back">
                                <img
                                    src="../assets/images/layout-2/product/a1.jpg"
                                    class="img-fluid"
                                    alt="product"
                                />
                            </div>
                        </div>
                        <div class="product-detail detail-center">
                            <div class="detail-title">
                                <div class="detail-left">
                                    <div class="rating-star">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                    <a href="">
                                        <h6 class="price-title">
                                            reader will be distracted.
                                        </h6>
                                    </a>
                                </div>
                                <div class="detail-right">
                                    <div class="check-price">$ 56.21</div>
                                    <div class="price">
                                        <div class="price">$ 24.05</div>
                                    </div>
                                </div>
                            </div>
                            <div class="icon-detail">
                                <button
                                    class="tooltip-top add-cartnoty"
                                    data-tippy-content="Add to cart"
                                >
                                    <i data-feather="shopping-cart"></i>
                                </button>
                                <a
                                    href="javascript:void(0)"
                                    class="add-to-wish tooltip-top"
                                    data-tippy-content="Add to Wishlist"
                                >
                                    <i data-feather="heart"></i>
                                </a>
                                <a
                                    href="javascript:void(0)"
                                    data-bs-toggle="modal"
                                    data-bs-target="#quick-view"
                                    class="tooltip-top"
                                    data-tippy-content="Quick View"
                                >
                                    <i data-feather="eye"></i>
                                </a>
                                <a
                                    href="compare.html"
                                    class="tooltip-top"
                                    data-tippy-content="Compare"
                                >
                                    <i data-feather="refresh-cw"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- product section end -->
@endsection
