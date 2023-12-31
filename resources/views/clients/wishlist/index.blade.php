@extends('layout') @section('title', "Wishlist") @section('body')
<!--section start-->
<section class="wishlist-section section-big-py-space b-g-light">
    <div class="custom-container">
        <div class="row">
            <div class="col-sm-12">
                <table class="table cart-table table-responsive-xs">
                    <thead>
                        <tr class="table-head">
                            <th scope="col">image</th>
                            <th scope="col">product name</th>
                            <th scope="col">price</th>
                            <th scope="col">availability</th>
                            <th scope="col">action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <a href="javascript:void(0)"
                                    ><img
                                        src="../assets/images/layout-2/product/1.jpg"
                                        alt="product"
                                        class="img-fluid"
                                /></a>
                            </td>
                            <td>
                                <a href="javascript:void(0)">cotton shirt</a>
                                <div class="mobile-cart-content">
                                    <div class="col-xs-3">
                                        <p>in stock</p>
                                    </div>
                                    <div class="col-xs-3">
                                        <h2 class="td-color">$63.00</h2>
                                    </div>
                                    <div class="col-xs-3">
                                        <h2 class="td-color">
                                            <a
                                                href="javascript:void(0)"
                                                class="icon me-1"
                                                ><i class="ti-close"></i> </a
                                            ><a
                                                href="javascript:void(0)"
                                                class="cart"
                                                ><i class="ti-shopping-cart"></i
                                            ></a>
                                        </h2>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <h2>$63.00</h2>
                            </td>
                            <td>
                                <p>in stock</p>
                            </td>
                            <td>
                                <a href="javascript:void(0)" class="icon me-3"
                                    ><i class="ti-close"></i> </a
                                ><a href="javascript:void(0)" class="cart"
                                    ><i class="ti-shopping-cart"></i
                                ></a>
                            </td>
                        </tr>
                    </tbody>
                    <tbody>
                        <tr>
                            <td>
                                <a href="javascript:void(0)"
                                    ><img
                                        src="../assets/images/layout-2/product/2.jpg"
                                        alt="product"
                                        class="img-fluid"
                                /></a>
                            </td>
                            <td>
                                <a href="javascript:void(0)">cotton shirt</a>
                                <div class="mobile-cart-content">
                                    <div class="col-xs-3">
                                        <p>in stock</p>
                                    </div>
                                    <div class="col-xs-3">
                                        <h2 class="td-color">$63.00</h2>
                                    </div>
                                    <div class="col-xs-3">
                                        <h2 class="td-color">
                                            <a
                                                href="javascript:void(0)"
                                                class="icon me-1"
                                                ><i class="ti-close"></i> </a
                                            ><a
                                                href="javascript:void(0)"
                                                class="cart"
                                                ><i class="ti-shopping-cart"></i
                                            ></a>
                                        </h2>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <h2>$63.00</h2>
                            </td>
                            <td>
                                <p>in stock</p>
                            </td>
                            <td>
                                <a href="javascript:void(0)" class="icon me-3"
                                    ><i class="ti-close"></i> </a
                                ><a href="javascript:void(0)" class="cart"
                                    ><i class="ti-shopping-cart"></i
                                ></a>
                            </td>
                        </tr>
                    </tbody>
                    <tbody>
                        <tr>
                            <td>
                                <a href="javascript:void(0)"
                                    ><img
                                        src="../assets/images/layout-1/product/3.jpg"
                                        alt="product"
                                        class="img-fluid"
                                /></a>
                            </td>
                            <td>
                                <a href="javascript:void(0)">cotton shirt</a>
                                <div class="mobile-cart-content">
                                    <div class="col-xs-3">
                                        <p>in stock</p>
                                    </div>
                                    <div class="col-xs-3">
                                        <h2 class="td-color">$63.00</h2>
                                    </div>
                                    <div class="col-xs-3">
                                        <h2 class="td-color">
                                            <a
                                                href="javascript:void(0)"
                                                class="icon me-1"
                                                ><i class="ti-close"></i> </a
                                            ><a
                                                href="javascript:void(0)"
                                                class="cart"
                                                ><i class="ti-shopping-cart"></i
                                            ></a>
                                        </h2>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <h2>$63.00</h2>
                            </td>
                            <td>
                                <p>in stock</p>
                            </td>
                            <td>
                                <a href="javascript:void(0)" class="icon me-3"
                                    ><i class="ti-close"></i> </a
                                ><a href="javascript:void(0)" class="cart"
                                    ><i class="ti-shopping-cart"></i
                                ></a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row wishlist-buttons">
            <div class="col-12">
                <a href="javascript:void(0)" class="btn btn-normal"
                    >continue shopping</a
                >
                <a href="javascript:void(0)" class="btn btn-normal"
                    >check out</a
                >
            </div>
        </div>
    </div>
</section>
<!--section end-->
@endsection
