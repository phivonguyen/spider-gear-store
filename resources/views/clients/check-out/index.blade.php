@extends('layout') @section('title', 'Checkout') @section('body')

<!-- breadcrumb start -->
<div class="breadcrumb-main ">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="breadcrumb-contain">
                    <div>
                        <h2>checkout</h2>
                        <ul>
                            <li><a href="index.html">home</a></li>
                            <li><i class="fa fa-angle-double-right"></i></li>
                            <li><a href="javascript:void(0)">checkout</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb End -->

<!-- section start -->
<section class="section-big-py-space b-g-light">
    <div class="custom-container">
        <div class="checkout-page contact-page">
            <div class="checkout-form">
                <form action="{{ url("/checkout/add") }}" method="POST" id="checkoutForm">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-lg-6 col-sm-12 col-xs-12">
                            <div class="checkout-title">
                                <h3>Billing Details</h3></div>
                            <div class="theme-form">
                                <div class="row check-out ">
                                    <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                        <label>First Name</label>
                                        <input type="text" name="first_name" value="{{ Session::get('user_data.first_name') }}" placeholder="">
                                        <span style="height: 15px; display:inline-block" class="fname-error"></span>
                                    </div>
                                    <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                        <label>Last Name</label>
                                        <input type="text" name="last_name" value="{{ Session::get('user_data.last_name') }}" placeholder="">
                                        <span style="height: 15px; display:inline-block" class="lname-error"></span>
                                    </div>
                                    <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                        <label class="field-label">Phone</label>
                                        <input type="text" name="phone" value="{{ Session::get('user_data.phone') }}" placeholder="">
                                        <span style="height: 15px; display:inline-block" class="phone-error"></span>
                                    </div>
                                    <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                        <label class="field-label">Email Address</label>
                                        <input type="text" type="email" name="email" value="{{ Session::get('user_data.email') }}" placeholder="">
                                        <span style="height: 15px; display:inline-block" class="email-error"></span>
                                    </div>
                                    <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                        <label class="field-label">Country</label>
                                        <input type="text" name="country" value="{{ Session::get('user_data.country') }}" placeholder="">
                                        <span style="height: 15px; display:inline-block" class="country-error"></span>

                                    </div>
                                    <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                        <label class="field-label">Address</label>
                                        <input type="text" name="received_address" value="{{ Session::get('user_data.received_address') }}" placeholder="Street address">
                                        <span style="height: 15px; display:inline-block" class="address-error"></span>
                                    </div>
                                    <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                        <label class="field-label">Order's Description</label>
                                        <input type="text" name="order_description" value="{{ Session::get('user_data.order_description') }}" placeholder="">
                                        <span style="height: 15px; display:inline-block" class="des-error"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-12 col-xs-12">
                            <div class="checkout-details theme-form  section-big-mt-space">
                                <div class="order-box">
                                    <div class="title-box">
                                        <div>Product <span>Total</span></div>
                                    </div>
                                    <ul class="qty">
                                        @if(Session::has('cartItemList'))
                                            @foreach(Session::get('cartItemList')['data'] ?? $cartItemList['data'] ?? [] as $item)
                                            <li>{{ $item->product->product_name }} × {{ $item->quantity }} <span>${{ $item->quantity * $item->product->product_price }}</span></li>

                                            @endforeach
                                        @else
                                            <div class="col-lg-12">Your Cart is Empty</div>
                                        @endif
                                    </ul>
                                    <ul class="sub-total">
                                        <li>Subtotal <span class="count">
                                            @if(Session::has('total'))
                                                ${{ Session::get('total') }}
                                            @endif</span></li>
                                        <li>
                                            Discount (
                                            <span class="code-span">
                                                @if(Session::has('voucher'))
                                                    {{ Session::get('voucher')->code }}
                                                @endif
                                            </span>
                                            )
                                            <span class="discount-span count">
                                                @if(Session::has('voucher'))
                                                    @if(Session::get('voucher')->voucher_type == 'fixed')
                                                    -${{ Session::get('voucher')->voucher_discount }}
                                                    @else
                                                    -{{ Session::get('voucher')->voucher_discount }}%
                                                    @endif
                                                @endif
                                            </span>
                                            @if(Session::has('voucher'))
                                                <a href="{{ url('/checkout/deleteVoucher/' . Session::get('voucher')->code) }}">Remove</a>
                                            @endif
                                        </li>
                                        {{-- <li>Shipping
                                            <div class="shipping">
                                                <div class="shopping-option">
                                                    <input type="checkbox" name="free-shipping" id="free-shipping">
                                                    <label for="free-shipping">Free Shipping</label>
                                                </div>
                                                <div class="shopping-option">
                                                    <input type="checkbox" name="local-pickup" id="local-pickup">
                                                    <label for="local-pickup">Local Pickup</label>
                                                </div>
                                            </div>
                                        </li> --}}
                                    </ul>
                                    <ul class="total">
                                        @php

                                            $finalPrice = 0;
                                            if(Session::has('voucher') && Session::has('total')){
                                                if(Session::get('voucher')->voucher_type == 'fixed'){
                                                    $finalPrice = Session::get('total') - Session::get('voucher')->voucher_discount;
                                                }else{
                                                    $finalPrice = Session::get('total') - (Session::get('total')*Session::get('voucher')->voucher_discount/100);
                                                }
                                            }elseif(!Session::has('voucher') && Session::has('total')){
                                                $finalPrice = Session::get('total');
                                            }

                                            $finalPrice = number_format($finalPrice, 2, '.', '');
                                            @endphp
                                        <input type="hidden" name="final_price" value={{ $finalPrice }}>
                                        <li>Total <span class="total-span count">
                                            @if($finalPrice!=0)
                                                ${{$finalPrice}}
                                            @else
                                                @if(Session::has('total'))
                                                    ${{ Session::get('total') }}
                                                @endif
                                            @endif</span>
                                        </li>
                                    </ul>
                                </div>

                                <div class="pro-group">
                                    <div class="product-offer">
                                        <h6 class="product-title">
                                            <i class="fa fa-tags"></i>
                                            @if($vouchers)
                                                {{ count($vouchers) }}
                                            @endif offers Available
                                        </h6>
                                        <div class="offer-contain">
                                            <ul>
                                                @foreach($vouchers['data'] as $voucher)
                                                <li>
                                                    <span style="text-transform:none" class="code-lable">{{ $voucher->code }} </span>
                                                    <div>
                                                        <?php
                                                        $expireDateTime = $voucher->expire_date;
                                                        $expireDate = explode(' ', $expireDateTime)[0];

                                                        ?>
                                                        <h5 >Offer {{ $voucher->voucher_discount }} off | Expire Day: {{ $expireDate }}
                                                        </h5>
                                                        <p style="text-transform:none" >"Use code {{ $voucher->code }} to get
                                                            @if ($voucher->voucher_type == 'fixed')
                                                                {{ $voucher->voucher_discount }}$
                                                            @else
                                                                {{ $voucher->voucher_discount }}%
                                                            @endif
                                                            on off your order." </p>
                                                    </div>
                                                </li>
                                                @break
                                                @endforeach
                                            </ul>
                                            <ul class="offer-sider">
                                                @foreach($vouchers['data'] as $voucher)
                                                    @if($loop->index >= 1)
                                                    <li>
                                                        <span style="text-transform:none"  class="code-lable">{{ $voucher->code }}</span>
                                                        <div>
                                                            <?php
                                                            $expireDateTime = $voucher->expire_date;
                                                            $expireDate = explode(' ', $expireDateTime)[0];
                                                            ?>
                                                            <h5>Offer {{ $voucher->voucher_discount }} off | Expire Day: {{ $expireDate }}
                                                            </h5>
                                                            <p style="text-transform:none">"Use code {{ $voucher->code }} to get
                                                                @if ($voucher->voucher_type == 'fixed')
                                                                    {{ $voucher->voucher_discount }}$
                                                                @else
                                                                    {{ $voucher->voucher_discount }}%
                                                                @endif
                                                                on off your order." </p>
                                                        </div>
                                                    </li>
                                                    @endif
                                                @endforeach
                                            {{-- <li>
                                                <span class="code-lable">OFFER40</span>
                                                <div>
                                                    <h5>Bank Offer 40% Unlimited Cashback on bideal Axis BankCredit Card
                                                    </h5>
                                                    <p>Use code "OFFER40" Min. Cart Value $99 | Max. Discount $40
                                                    </p>
                                                </div>
                                            </li>
                                            <li>
                                                <span class="code-lable">OFFER10</span>
                                                <div>
                                                    <h5>Bank Offer10% off* with Axis Bank Buzz Credit Card
                                                    </h5>
                                                    <p>Use code "OFFER10" Min. Cart Value $99 | Max. Discount $10
                                                    </p>
                                                </div>
                                            </li>
                                            <li>
                                                <span class="code-lable">OFFER5</span>
                                                <div>
                                                    <h5> Bank Offer5% Unlimited Cashback on bideal sbi banck Credit Card
                                                    </h5>
                                                    <p>Use code "OFFER5" Min. Cart Value $99 | Max. Discount $5
                                                    </p>
                                                </div>
                                            </li> --}}
                                            </ul>
                                            <h5 class="show-offer">
                                                <span class="more-offer"
                                                    >show more offer</span
                                                ><span class="less-offer"
                                                    >less offer</span
                                                >
                                            </h5>
                                        </div>
                                    </div>
                                    <div class="mt-4 section-apply-code">
                                        @if(!Session::has('voucher'))
                                            @if(count(Session::get('cartItemList')['data'] ?? $cartItemList['data'] ?? []) > 0)
                                            <span>Apply voucher Code </span>
                                            <input type="text" name="voucher" placeholder="apply voucher">
                                            <button id="apply-btn" type="button" class="btn bg-dark text-white">Apply</button>
                                            @endif
                                        @endif
                                        @if (Session::has('voucher'))
                                            <p class="fs-6 text-primary">
                                                You have applied a voucher( {{ Session::get('voucher')->code }} )
                                            </p>
                                        @endif

                                    </div>
                                </div>

                                <div class="payment-box">
                                    <div class="upper-box">
                                        <div class="payment-options">
                                            <ul>
                                                <li>
                                                    <div class="radio-option">
                                                        <input  {{ Session::get('user_data.payment_type') == 'cod' ? 'checked' : ''}} type="radio" name="payment_type" value="cod" id="payment-1" checked="checked">
                                                        <label for="payment-1">Cash On Delivery<span class="small-text">Please send a check to Store Name, Store Street, Store Town, Store State / County, Store Postcode.</span></label>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="radio-option">
                                                        <input  {{ Session::get('user_data.payment_type') == 'vn_pay' ? 'checked' : ''}} type="radio" name="payment_type" value="vn_pay" id="payment-2">
                                                        <label for="payment-2">Vn Pay<span class="small-text">Please send a check to Store Name, Store Street, Store Town, Store State / County, Store Postcode.</span></label>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="radio-option paypal">
                                                        <input type="radio" name="payment_type" value="paypal" id="payment-3">
                                                        <label for="payment-3">PayPal</label>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    @if(count(Session::get('cartItemList')['data'] ?? $cartItemList['data'] ?? []) > 0)
                                    <div class="text-right">
                                        <button id="place-order-btn" type="submit" href="" class="btn-normal btn">
                                            Place Order
                                        </button>
                                    </div>
                                    @endif
                                    @if(Session::has('notification'))
                                    <p style="color: red; font-size: 18px; margin-top: 10px;">
                                        {{ Session::get('notification') }}
                                    </p>
                                    @endif
                                </div>

                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<!-- section end -->


<script>
    const applyBtn = document.querySelector('#apply-btn');
    const placeOrderBtn = document.querySelector('#place-order-btn');
    console.log(placeOrderBtn)
    const inputVoucher = document.querySelector("input[name='voucher']");
    // let appliedVouchers = []; // check 1 voucher cannot be applied twice

    if(applyBtn){
        applyBtn.addEventListener('click', (e)=>{
            e.preventDefault();
            let voucherCode = inputVoucher.value;

            // if (appliedVouchers.includes(voucherCode)) {
            //     alert("This voucher has already been applied.");
            //     return;
            // }
             applyVoucher(voucherCode);
            // appliedVouchers.push(voucherCode);
        })
    }

    async function applyVoucher(voucherCode) {
        try {
            const response = await fetch(`/checkout/applyVoucher?code=${voucherCode}`)
            const data = await response.json();
            console.log(data)
            updateCheckoutDomHTML(data)

        } catch (error) {
            console.error(error);
        }
    }

    placeOrderBtn.addEventListener("click", function(e) {
        event.preventDefault();

        if (!validateForm()) {
            return false;
        }

        // Thực hiện việc submit form
        checkoutForm.submit();
    });

    // document.getElementById("checkoutForm").addEventListener("submit", function(event) {
    //     event.preventDefault();

    //     if (!validateForm()) {
    //         return false;
    //     }

    //    this.submit();
    // });

    function updateCheckoutDomHTML({data, message, success}){
        const sectionApplyCode = document.querySelector('.section-apply-code');

        if(success){
            const discountSpan = document.querySelector('.discount-span')
            const totalSpan = document.querySelector('.total-span')
            const codeSpan = document.querySelector('.code-span')
            const inputHiddenFinalPrice = document.querySelector('input[type="hidden"][name="final_price"]');
            totalPrice = Number(totalSpan.innerText.slice(1))
            if(data.voucherType == 'fixed'){
                discountSpan.textContent = `-$${data.voucherDiscount}`
                totalPrice-=data.voucherDiscount
            }else{
                discountSpan.textContent = `-${data.voucherDiscount}%`
                totalPrice = totalPrice - totalPrice*20/100
            }

            totalSpan.textContent= `$${totalPrice.toFixed(2)}`
            codeSpan.textContent = `${data.code}`
            sectionApplyCode.innerHTML = `<p class="fs-6 text-primary">You have applied a voucher (${data.code})</p>`
            discountSpan.insertAdjacentHTML("afterend", `<a href="/checkout/deleteVoucher/${data.code}">Remove</a>`);
            inputHiddenFinalPrice.value = totalPrice.toFixed(2);
        }
        else{
            const firstEle = sectionApplyCode.firstElementChild
            firstEle.insertAdjacentHTML("afterend", `<span class="fs-6 text-primary"> | ${message}</span>`);
            setTimeout(() => {
                const addedSpan = firstEle.nextElementSibling;
                if (addedSpan) {
                    addedSpan.remove();
                }
            }, 3000);
        }
    }

    function validateForm() {

        let firstName = document.querySelector("input[name='first_name']").value;
        let lastName = document.querySelector("input[name='last_name']").value;
        let phone = document.querySelector("input[name='phone']").value;
        let email = document.querySelector("input[name='email']").value;
        let country = document.querySelector("input[name='country']").value;
        let receivedAddress = document.querySelector("input[name='received_address']").value;
        let orderDescription = document.querySelector("input[name='order_description']").value;

        let fNameErrorSpan = document.querySelector('.fname-error')
        let lNameErrorSpan = document.querySelector('.lname-error')
        let phoneErrorSpan = document.querySelector('.phone-error')
        let emailErrorSpan = document.querySelector('.email-error')
        let countryErrorSpan = document.querySelector('.country-error')
        let receivedAddressSpan = document.querySelector('.address-error')
        let orderDescriptionErrorSpan = document.querySelector('.des-error')

        let nameRegex = /^[a-zA-z]{1,40}$/;
        let phoneRegex = /^\d{10,}$/;
        let emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        let countryRegex = /^[A-Za-z\s]{1,40}$/;
        let receivedAddressRegex = /^[\w\\/\s]{1,40}$/;
        let orderDescriptionRegex = /^\w{1,40}$/;

        if (!nameRegex.test(firstName)) {
            fNameErrorSpan.textContent = "Please enter a valid first name (max 40 characters)."
            return false;
        }else{
            fNameErrorSpan.textContent = ""
        }

        if (!nameRegex.test(lastName)) {
            lNameErrorSpan.textContent = "Please enter a valid last name (max 40 characters)."
            return false;
        }else{
            lNameErrorSpan.textContent = ""
        }

        if (!phoneRegex.test(phone)) {
            phoneErrorSpan.textContent = "Please enter a valid phone number."
            return false;
        }else{
            phoneErrorSpan.textContent = ""
        }

        if (!emailRegex.test(email)) {
            emailErrorSpan.textContent = "Please enter a valid email address."
            return false;
        }else{
            emailErrorSpan.textContent=""
        }

        if (!countryRegex.test(country)) {
            countryErrorSpan.textContent = "Please enter a valid country name (max 40 characters)."
            return false;
        }else{
            countryErrorSpan.textContent=""
        }

        if (!receivedAddressRegex.test(receivedAddress)) {
            receivedAddressSpan.textContent = "Please enter a valid address name (max 40 characters)."
            return false;
        }else{
            receivedAddressSpan.textContent=""
        }

        if (!orderDescriptionRegex.test(orderDescription)) {
            orderDescriptionErrorSpan.textContent = "Max 40 characters"
            return false;
        }else{
            orderDescriptionErrorSpan.textContent=""
        }

        return true;
    }
</script>


<!-- checkout start -->
{{-- <section class="checkout-second section-big-py-space b-g-light">
    <div class="custom-container" id="grad1">
        <div class="row justify-content-center">
            <div class="col-md-11">
                <div class="checkout-box">
                    <div class="checkout-header">
                        <h2>chekout your product</h2>
                        <h4>Fill all form field to go to next step</h4>
                    </div>
                    <div class="checkout-body">
                        <form class="checkout-form">
                            <!-- chek menu bar -->
                            <ul class="menu-bar">
                                <li class="active" id="account">
                                    <div class="icon">
                                        <svg
                                            viewBox="-64 0 512 512"
                                            xmlns="http://www.w3.org/2000/svg"
                                        >
                                            <path
                                                d="m336 192h-16v-64c0-70.59375-57.40625-128-128-128s-128 57.40625-128 128v64h-16c-26.453125 0-48 21.523438-48 48v224c0 26.476562 21.546875 48 48 48h288c26.453125 0 48-21.523438 48-48v-224c0-26.476562-21.546875-48-48-48zm-229.332031-64c0-47.0625 38.269531-85.332031 85.332031-85.332031s85.332031 38.269531 85.332031 85.332031v64h-170.664062zm0 0"
                                            />
                                        </svg>
                                    </div>

                                    Account
                                </li>
                                <li id="personal">
                                    <div class="icon">
                                        <svg
                                            version="1.1"
                                            xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink"
                                            x="0px"
                                            y="0px"
                                            viewBox="0 0 512 512"
                                            style="
                                                enable-background: new 0 0 512
                                                    512;
                                            "
                                            xml:space="preserve"
                                        >
                                            <g>
                                                <g>
                                                    <path
                                                        d="M255.999,0c-74.443,0-135,60.557-135,135s60.557,135,135,135s135-60.557,135-135S330.442,0,255.999,0z"
                                                    />
                                                </g>
                                            </g>
                                            <g>
                                                <g>
                                                    <path
                                                        d="M478.48,398.68C438.124,338.138,370.579,302,297.835,302h-83.672c-72.744,0-140.288,36.138-180.644,96.68l-2.52,3.779V512h450h0.001V402.459L478.48,398.68z"
                                                    />
                                                </g>
                                            </g>
                                        </svg>
                                    </div>
                                    Personal
                                </li>
                                <li id="payment">
                                    <div class="icon">
                                        <svg
                                            enable-background="new 0 0 512 512"
                                            viewBox="0 0 512 512"
                                            xmlns="http://www.w3.org/2000/svg"
                                        >
                                            <g>
                                                <path
                                                    d="m512 163v-27c0-30.928-25.072-56-56-56h-400c-30.928 0-56 25.072-56 56v27c0 2.761 2.239 5 5 5h502c2.761 0 5-2.239 5-5z"
                                                />
                                                <path
                                                    d="m0 205v171c0 30.928 25.072 56 56 56h400c30.928 0 56-25.072 56-56v-171c0-2.761-2.239-5-5-5h-502c-2.761 0-5 2.239-5 5zm128 131c0 8.836-7.164 16-16 16h-16c-8.836 0-16-7.164-16-16v-16c0-8.836 7.164-16 16-16h16c8.836 0 16 7.164 16 16z"
                                                />
                                            </g>
                                        </svg>
                                    </div>

                                    Payment
                                </li>
                                <li id="confirm">
                                    <div class="icon">
                                        <svg
                                            version="1.1"
                                            xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink"
                                            x="0px"
                                            y="0px"
                                            width="352.62px"
                                            height="352.62px"
                                            viewBox="0 0 352.62 352.62"
                                            style="
                                                enable-background: new 0 0
                                                    352.62 352.62;
                                            "
                                            xml:space="preserve"
                                        >
                                            <g>
                                                <path
                                                    d="M337.222,22.952c-15.912-8.568-33.66,7.956-44.064,17.748c-23.867,23.256-44.063,50.184-66.708,74.664c-25.092,26.928-48.348,53.856-74.052,80.173c-14.688,14.688-30.6,30.6-40.392,48.96c-22.032-21.421-41.004-44.677-65.484-63.648c-17.748-13.464-47.124-23.256-46.512,9.18c1.224,42.229,38.556,87.517,66.096,116.28c11.628,12.24,26.928,25.092,44.676,25.704c21.42,1.224,43.452-24.48,56.304-38.556c22.645-24.48,41.005-52.021,61.812-77.112c26.928-33.048,54.468-65.485,80.784-99.145C326.206,96.392,378.226,44.983,337.222,22.952z M26.937,187.581c-0.612,0-1.224,0-2.448,0.611c-2.448-0.611-4.284-1.224-6.732-2.448l0,0C19.593,184.52,22.653,185.132,26.937,187.581z"
                                                />
                                            </g>
                                        </svg>
                                    </div>

                                    Finish
                                </li>
                            </ul>
                            <!-- chekout contian -->
                            <div class="checkout-fr-box">
                                <div class="form-card">
                                    <h3 class="form-title">
                                        Account Information
                                    </h3>
                                    <div class="form-group">
                                        <input
                                            type="email"
                                            name="email"
                                            placeholder="Email Id"
                                            class="form-control"
                                        />
                                    </div>
                                    <div class="form-group">
                                        <input
                                            type="text"
                                            name="uname"
                                            placeholder="UserName"
                                            class="form-control"
                                        />
                                    </div>
                                    <div class="form-group">
                                        <input
                                            type="password"
                                            name="pwd"
                                            placeholder="Password"
                                            class="form-control"
                                        />
                                    </div>
                                    <div class="form-group">
                                        <input
                                            type="password"
                                            name="cpwd"
                                            placeholder="Confirm Password"
                                            class="form-control"
                                        />
                                    </div>
                                </div>
                                <button
                                    type="button"
                                    name="next"
                                    class="btn btn-normal next action-button"
                                >
                                    next
                                </button>
                            </div>
                            <div class="checkout-fr-box">
                                <div class="form-card">
                                    <h3 class="form-title">
                                        Personal Information
                                    </h3>
                                    <div class="form-group">
                                        <input
                                            type="text"
                                            name="fname"
                                            placeholder="First Name"
                                            class="form-control"
                                        />
                                    </div>
                                    <div class="form-group">
                                        <input
                                            type="text"
                                            name="lname"
                                            placeholder="Last Name"
                                            class="form-control"
                                        />
                                    </div>
                                    <div class="form-group">
                                        <input
                                            type="text"
                                            name="phno"
                                            placeholder="Contact No."
                                            class="form-control"
                                        />
                                    </div>
                                </div>
                                <button
                                    type="button"
                                    name="previous"
                                    class="previous btn btn-normal"
                                >
                                    previous
                                </button>
                                <button
                                    type="button"
                                    name="next"
                                    class="btn btn-normal next action-button"
                                >
                                    next
                                </button>
                            </div>
                            <div class="checkout-fr-box">
                                <div class="form-card">
                                    <h3 class="form-title">
                                        Payment Information
                                    </h3>
                                    <ul class="payment-info">
                                        <li>
                                            <img
                                                src="../assets/images/checkout/payment-mathod/1.png"
                                                alt=""
                                                class="payment-mathod"
                                            />
                                        </li>
                                        <li>
                                            <img
                                                src="../assets/images/checkout/payment-mathod/2.png"
                                                alt=""
                                                class="payment-mathod"
                                            />
                                        </li>
                                        <li>
                                            <img
                                                src="../assets/images/checkout/payment-mathod/3.png"
                                                alt=""
                                                class="payment-mathod"
                                            />
                                        </li>
                                        <li>
                                            <img
                                                src="../assets/images/checkout/payment-mathod/4.png"
                                                alt=""
                                                class="payment-mathod"
                                            />
                                        </li>
                                    </ul>
                                    <div class="form-group">
                                        <label class="pay"
                                            >Card Holder Name*</label
                                        >
                                        <input
                                            type="text"
                                            name="holdername"
                                            placeholder=""
                                            class="form-control"
                                        />
                                    </div>
                                    <div class="form-group">
                                        <div class="small-group">
                                            <div>
                                                <label>Card Number*</label>
                                                <input
                                                    type="text"
                                                    name="cardno"
                                                    placeholder=""
                                                    class="form-control"
                                                />
                                            </div>
                                            <div class="small-sec">
                                                <label>CVC*</label>
                                                <input
                                                    type="password"
                                                    name="cvcpwd"
                                                    placeholder="***"
                                                    class="form-control"
                                                />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Expiry Date*</label>
                                        <div class="small-group">
                                            <select class="form-control">
                                                <option>Month</option>
                                                <option>January</option>
                                                <option>February</option>
                                                <option>March</option>
                                                <option>April</option>
                                                <option>May</option>
                                                <option>June</option>
                                                <option>July</option>
                                                <option>August</option>
                                                <option>September</option>
                                                <option>October</option>
                                                <option>November</option>
                                                <option>December</option>
                                            </select>
                                            <select class="form-control">
                                                <option>Year</option>
                                                <option>2021</option>
                                                <option>2020</option>
                                                <option>2021</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <button
                                    type="button"
                                    name="previous"
                                    class="previous btn btn-normal"
                                >
                                    previous
                                </button>
                                <button
                                    type="button"
                                    name="next"
                                    class="btn btn-normal next action-button"
                                >
                                    next
                                </button>
                            </div>
                            <div class="checkout-fr-box">
                                <div class="form-card">
                                    <div class="payment-success">
                                        <svg
                                            version="1.1"
                                            xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink"
                                            x="0px"
                                            y="0px"
                                            viewBox="0 0 344.963 344.963"
                                            style="
                                                enable-background: new 0 0
                                                    344.963 344.963;
                                            "
                                            xml:space="preserve"
                                        >
                                            <g>
                                                <path
                                                    d="M321.847,86.242l-40.026-23.11l-23.104-40.02h-46.213l-40.026-23.11l-40.026,23.11H86.239l-23.11,40.026L23.11,86.242v46.213L0,172.481l23.11,40.026v46.213l40.026,23.11l23.11,40.026h46.213l40.02,23.104l40.026-23.11h46.213l23.11-40.026l40.026-23.11v-46.213l23.11-40.026l-23.11-40.026V86.242H321.847z M156.911,243.075c-3.216,3.216-7.453,4.779-11.671,4.72c-4.219,0.06-8.455-1.504-11.671-4.72l-50.444-50.444c-6.319-6.319-6.319-16.57,0-22.889l13.354-13.354c6.319-6.319,16.57-6.319,22.889,0l25.872,25.872l80.344-80.35c6.319-6.319,16.57-6.319,22.889,0l13.354,13.354c6.319,6.319,6.319,16.57,0,22.889L156.911,243.075z"
                                                />
                                            </g>
                                        </svg>
                                        <h2>payment successful !</h2>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> --}}
<!-- checkout end -->

@endsection
