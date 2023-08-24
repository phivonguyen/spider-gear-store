@extends('layout') @section('title', 'Contact') @section('body')

<!-- breadcrumb start -->
<div class="breadcrumb-main">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="breadcrumb-contain">
                    <div>
                        <h2>order-history</h2>
                        <ul>
                            <li><a href="index.html">home</a></li>
                            <li>
                                <i class="fa fa-angle-double-right"></i>
                            </li>
                            <li>
                                <a href="javascript:void(0)">order-history</a>
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
<section class="cart-section section-big-py-space bg-white">
    <div class="container-xxl">
        <div class="row">
            <div class="col-lg-12">
                <div class="cart-item mb-4">
                    <div class="row align-items-center">
                        <div class="col-md-2">
                            <div class="cart-item-image text-center text-uppercase fs-5 fw-bold">
                                ORDER ID
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="cart-item-details text-center text-uppercase fs-5 fw-bold">
                                ITEMS
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="cart-item-quantity text-center text-uppercase fs-5 fw-bold">
                                TOTAL
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="cart-item-total text-center text-uppercase fs-5 fw-bold">
                                ORDER PLACED
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="cart-item-action text-center text-uppercase fs-5 fw-bold">
                                STATUS
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="cart-item-action text-center text-uppercase fs-5 fw-bold">
                                ACTION
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                @if(count($orders) >0)
                @foreach ($orders as $order)
                <div class="cart-item mb-4 fs-5">
                    <div class="row align-items-center text-center">
                        <div class="col-md-2">
                            <div class="cart-item-image">
                                {{ $order->order_id }}
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="cart-item-details">
                                @foreach($order->orderdetail as $oDetail)
                                    <p>{{ $oDetail->product->product_name }} x {{ $oDetail->quantity }}</p>
                                @endforeach
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="cart-item-quantity">
                                <p class="fs-5">${{ $order->total }}</p>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="cart-item-total">
                                {{ $order->created_at }}
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="cart-item-action text-center">
                                {{ $order->order_status }}
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="cart-item-action text-center">
                                <a href="/checkoutProcessing/{{ $order->order_id }}">Cancel</a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                @else
                    <p>You don't have any orders yet</p>
                @endif
            </div>
        </div>
        <hr>
    </div>
</section>
<!--section end-->

<!--section start-->
{{-- <section class="cart-section order-history section-big-py-space">
    <div class="custom-container">
        <div class="row">
            <div class="col-sm-12">
                <table class="table cart-table table-responsive-xs">
                    <thead>
                        <tr class="table-head">
                            <th scope="col">Order ID</th>
                            <th scope="col">Items</th>
                            <th scope="col">total</th>
                            <th scope="col">order placed</th>
                            <th scope="col">status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <a href="javascript:void(0)"
                                    ><img
                                        src="../assets/images/product-sidebar/001.jpg"
                                        alt="product"
                                        class="img-fluid"
                                /></a>
                            </td>
                            <td>
                                <a href="javascript:void(0)"
                                    >order no:
                                    <span class="dark-data">15454841</span>
                                    <br />cotton shirt</a
                                >
                                <div class="mobile-cart-content row">
                                    <div class="col-xs-3">
                                        <div class="qty-box">
                                            <div class="input-group">
                                                <input
                                                    type="text"
                                                    name="quantity"
                                                    class="form-control input-number"
                                                    value="1"
                                                />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-3">
                                        <h4 class="td-color">$63.00</h4>
                                    </div>
                                    <div class="col-xs-3">
                                        <h2 class="td-color">
                                            <a
                                                href="javascript:void(0)"
                                                class="icon"
                                                ><i class="ti-close"></i
                                            ></a>
                                        </h2>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <h4>$63.00</h4>
                            </td>
                            <td>
                                <span>Size: L</span>
                                <br />
                                <span>Quntity: 1</span>
                            </td>
                            <td>
                                <div class="responsive-data">
                                    <h4 class="price">$63.00</h4>
                                    <span>Size: L</span>|<span>Quntity: 1</span>
                                </div>
                                <span class="dark-data">Delivered</span>
                                (jul 01, 2019)
                            </td>
                        </tr>
                    </tbody>
                    <tbody>
                        <tr>
                            <td>
                                <a href="javascript:void(0)"
                                    ><img
                                        src="../assets/images/product-sidebar/002.jpg"
                                        alt="product"
                                        class="img-fluid"
                                /></a>
                            </td>
                            <td>
                                <a href="javascript:void(0)"
                                    >order no:
                                    <span class="dark-data">15454841</span>
                                    <br />cotton shirt</a
                                >
                                <div class="mobile-cart-content row">
                                    <div class="col-xs-3">
                                        <div class="qty-box">
                                            <div class="input-group">
                                                <input
                                                    type="text"
                                                    name="quantity"
                                                    class="form-control input-number"
                                                    value="1"
                                                />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-3">
                                        <h4 class="td-color">$63.00</h4>
                                    </div>
                                    <div class="col-xs-3">
                                        <h2 class="td-color">
                                            <a
                                                href="javascript:void(0)"
                                                class="icon"
                                                ><i class="ti-close"></i
                                            ></a>
                                        </h2>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <h4>$63.00</h4>
                            </td>
                            <td>
                                <span>Size: L</span>
                                <br />
                                <span>Quntity: 1</span>
                            </td>
                            <td>
                                <div class="responsive-data">
                                    <h4 class="price">$63.00</h4>
                                    <span>Size: L</span>|<span>Quntity: 1</span>
                                </div>
                                <span class="dark-data">Delivered</span>
                                (jul 01, 2019)
                            </td>
                        </tr>
                    </tbody>
                    <tbody>
                        <tr>
                            <td>
                                <a href="javascript:void(0)"
                                    ><img
                                        src="../assets/images/product-sidebar/001.jpg"
                                        alt="product"
                                        class="img-fluid"
                                /></a>
                            </td>
                            <td>
                                <a href="javascript:void(0)"
                                    >order no:
                                    <span class="dark-data">15454841</span>
                                    <br />cotton shirt</a
                                >
                                <div class="mobile-cart-content row">
                                    <div class="col-xs-3">
                                        <div class="qty-box">
                                            <div class="input-group">
                                                <input
                                                    type="text"
                                                    name="quantity"
                                                    class="form-control input-number"
                                                    value="1"
                                                />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-3">
                                        <h4 class="td-color">$63.00</h4>
                                    </div>
                                    <div class="col-xs-3">
                                        <h2 class="td-color">
                                            <a
                                                href="javascript:void(0)"
                                                class="icon"
                                                ><i class="ti-close"></i
                                            ></a>
                                        </h2>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <h4>$63.00</h4>
                            </td>
                            <td>
                                <span>Size: L</span>
                                <br />
                                <span>Quntity: 1</span>
                            </td>
                            <td>
                                <div class="responsive-data">
                                    <h4 class="price">$63.00</h4>
                                    <span>Size: L</span>|<span>Quntity: 1</span>
                                </div>
                                <span class="dark-data">Delivered</span>
                                (jul 01, 2019)
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row cart-buttons">
            <div class="col-12 pull-right">
                <a href="javascript:void(0)" class="btn btn-normal btn-sm"
                    >show all orders</a
                >
            </div>
        </div>
    </div>
</section> --}}
<!--section end-->
@endsection
