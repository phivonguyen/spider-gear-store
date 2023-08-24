@extends('layout') @section('title', 'Contact') @section('body')
<!-- thank-you section start -->
<section class="section-big-py-space light-layout">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="success-text">
                    <i class="fa fa-check-circle" aria-hidden="true"></i>
                    <h2>thank you</h2>
                    <p>
                        Payment is successfully processsed and your order is on
                        the way
                    </p>
                    {{-- <p>Transaction ID:267676GHERT105467</p> --}}
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Section ends -->

<!-- order-detail section start -->
<section class="section-big-py-space mt--5 b-g-light">
    <div class="custom-container">
        <div class="row">
            <div class="col-lg-6">
                <div class="product-order">
                    <h3>your order details</h3>
                    @php
                        $totalPrice = 0;
                    @endphp
                    @foreach($orderDetails['data'] as $orderDetail)
                        <div class="row product-order-detail">
                            <div class="col-3 text-center">
                                <img
                                    src="{{ $orderDetail->product->productimage[0]->img_binary }}"
                                    alt=""
                                    class="img-fluid"
                                    style="width: 90px; height: 90px; object-fit:cover;"
                                />
                            </div>
                            <div class="col-3 order_detail">
                                <div>
                                    <h4>Product Name</h4>
                                    <h5>{{ $orderDetail->product->product_name }}</h5>
                                </div>
                            </div>
                            <div class="col-3 order_detail">
                                <div>
                                    <h4>quantity</h4>
                                    <h5>{{ $orderDetail->quantity }}</h5>
                                </div>
                            </div>
                            <div class="col-3 order_detail">
                                <div>
                                    <h4>price</h4>
                                    <h5>{{ $orderDetail->total }}</h5>
                                </div>
                            </div>

                            @php
                                $totalPrice += $orderDetail->total;
                            @endphp
                        </div>

                    @endforeach
                    {{-- <div class="row product-order-detail">
                        <div class="col-3">
                            <img
                                src="../assets/images/layout-4/product/2.jpg"
                                alt=""
                                class="img-fluid"
                            />
                        </div>
                        <div class="col-3 order_detail">
                            <div>
                                <h4>product name</h4>
                                <h5>cotton shirt</h5>
                            </div>
                        </div>
                        <div class="col-3 order_detail">
                            <div>
                                <h4>quantity</h4>
                                <h5>1</h5>
                            </div>
                        </div>
                        <div class="col-3 order_detail">
                            <div>
                                <h4>price</h4>
                                <h5>$555.00</h5>
                            </div>
                        </div>
                    </div> --}}
                    <div class="total-sec">
                        <ul>
                            <li>subtotal <span>${{ $orderDetails['data'][0]->order->total }}</span></li>
                            <li>shipping <span>$0</span></li>
                        </ul>
                    </div>
                    <div class="final-total">
                        <h3>total <span>${{ $orderDetails['data'][0]->order->total }}</span></h3>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="row order-success-sec">
                    <div class="col-sm-6">
                        <h4>summary</h4>
                        <ul class="order-detail">
                            <li>order ID: {{ $orderDetails['data'][0]->order->order_id }}</li>
                            <li>Order Date: {{ $orderDetails['data'][0]->order->created_at }}</li>
                            <li>Order Total: ${{  $orderDetails['data'][0]->order->total }}</li>
                        </ul>
                    </div>
                    <div class="col-sm-6">
                        <h4>shipping address</h4>
                        <ul class="order-detail">
                            <li>{{ $orderDetails['data'][0]->order->received_address }}</li>
                            <li>Contact No: {{ $orderDetails['data'][0]->order->phone }}</li>
                        </ul>
                    </div>
                    <div class="col-sm-12 payment-mode">
                        <h4>payment method</h4>
                        <p class="text-capitalize font-weight-bold">
                            {{ $orderDetails['data'][0]->order->payment_type }}
                        </p>
                    </div>
                    <div class="col-md-12">
                        <div class="delivery-sec">
                            <h3>expected date of delivery</h3>
                            <h2>{{ $orderDetails['data'][0]->order->created_at->addDays(3)->toDateString() }}</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Section ends -->
@endsection
