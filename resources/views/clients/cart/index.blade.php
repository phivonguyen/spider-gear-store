@extends('layout') @section('title', 'Contact') @section('body')

<!-- breadcrumb start -->
<div class="breadcrumb-main">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="breadcrumb-contain">
                    <div>
                        <h2>cart</h2>
                        <ul>
                            <li>
                                <a href="javascript:void(0)">home</a>
                            </li>
                            <li>
                                <i class="fa fa-angle-double-right"></i>
                            </li>
                            <li>
                                <a href="javascript:void(0)">cart</a>
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
                        <div class="col-md-3">
                            <div class="cart-item-image text-center text-uppercase fs-5 fw-bold">
                                Image
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="cart-item-details text-center text-uppercase fs-5 fw-bold">
                                Info
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="cart-item-quantity text-center text-uppercase fs-5 fw-bold">
                                Quantity
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="cart-item-total text-center text-uppercase fs-5 fw-bold">
                                Total
                            </div>
                        </div>
                        <div class="col-md-1">
                            <div class="cart-item-action text-center text-uppercase fs-5 fw-bold">
                                Action
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                @if(count(Session::get('cartItemList')['data'] ?? $cartItemList['data'] ?? []) > 0)
                @foreach(Session::get('cartItemList')['data'] ?? $cartItemList['data'] ?? [] as $item)
                    <div class="cart-item mb-4"
                            data-cart-item-id="{{ $item->shopping_cart_item_id }}"
                            data-product-price="{{ $item->product->product_price }}">
                        <div class="row align-items-center text-center">
                            <div class="col-md-3">
                                <div class="cart-item-image">
                                    <img class="w-25" src="{{ $item->product->productimage[0]->img_binary }}" alt="Product Image" class="img-fluid" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="cart-item-details">
                                    <h4 class="cart-item-name fs-5">{{ $item->product->product_name }}</h4>
                                    <p class="cart-item-price fs-5">${{ $item->product->product_price }}</p>
                                    <!-- More item details here -->
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="cart-item-quantity">
                                    <div class="input-group quantity-boxer">
                                        <button class='btn decrease bg-dark text-white'>-</button>
                                        <input type="text"
                                            data-cart-item-id="{{ $item->shopping_cart_item_id }}"
                                            data-product-qty-instock={{ $item->product->qty_in_stock}}
                                            class="form-control" value="{{ $item->quantity }}"
                                            name="quantity" />
                                        <button class='btn increase bg-dark text-white'>+</button>
                                    </div>
                                    <p style="height: 10px" class="exceed-qty-message text-primary"></p>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="cart-item-total">
                                    <p class="fs-5">${{ $item->product->product_price *  $item->quantity }}</p>
                                </div>
                            </div>
                            <div class="col-md-1">
                                <div class="cart-item-action text-center">
                                    <a href="/delete/{{ $item->shopping_cart_item_id }}" class="btn btn-outline-dark"><i class="ti-close"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                @else
                <div class="col-lg-12 text-center">
                    <p class="fw-bold fs-2">Your Cart is Empty</p>
                </div>
                @endif
            </div>
        </div>
        <hr>
        @if(count(Session::get('cartItemList')['data'] ?? $cartItemList['data'] ?? []) > 0)
            <div class="row">
                <div class="col-lg-12 text-end pe-5">
                    <div class="cart-total total-div">
                        <h4 class="total-title">Total Price</h4>
                        <h2 class="total-price">
                            @if(Session::has('total'))
                                ${{ Session::get('total') }}
                            @endif</h2>
                    </div>

                    <div class="cart-buttons">
                        <a href="{{ url("products") }}" class="btn btn-normal">Continue Shopping</a>
                        <a href="{{ url("checkout") }}" class="btn btn-normal">Check Out</a>
                    </div>
                </div>
            </div>
        @endif

    </div>
</section>


{{-- <section class="cart-section section-big-py-space b-g-light">
    <div class="custom-container">
        <div class="row">
            <div class="col-sm-12">
                <table class="table cart-table table-responsive-xs">
                    <thead>
                        <tr class="table-head">
                            <th scope="col">image</th>
                            <th scope="col">product name</th>
                            <th scope="col">price</th>
                            <th scope="col">quantity</th>
                            <th scope="col">action</th>
                            <th scope="col">total</th>
                        </tr>
                    </thead>
                    @foreach($cartItemList['data'] as $item)

                        <tbody>
                            <tr>
                                <td>
                                    <a href="javascript:void(0)"
                                        ><img
                                            src="{{ $item->product->productimage[0]->img_binary }}"
                                            alt="cart"
                                            class=" "
                                    /></a>
                                </td>
                                <td>
                                    <a href="javascript:void(0)">{{ $item->product->product_name }}</a>
                                    <div class="mobile-cart-content">
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
                                            <h2 class="td-color">$63.00</h2>
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
                                    <h2>${{ $item->product->product_price }}</h2>
                                </td>
                                <td>
                                    <div class="qty-box">
                                        <div class="input-group">
                                            <button onclick="decreaseQty(this, '{{ $item->product->product_id }}')"
                                                class="decrease-btn"
                                            ></button>
                                            <input
                                                class="qty-adj form-control"
                                                type="number"
                                                value="{{ $item->quantity }}"
                                                name="quantity"
                                            />
                                            <button onclick="increaseQty(this, '{{ $item->product->product_id }}')"
                                                class="increase-btn"
                                            ></button>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <form action="{{ url("delete/$item->product_id") }}" method="POST">
                                        <button type="submit" class="icon btn btn-dark"
                                            ><i class="ti-close"></i
                                        ></button>
                                    </form>
                                </td>
                                <td>
                                    <h2 class="td-color">${{ $item->quantity * $item->product->product_price }}</h2>
                                </td>
                            </tr>
                        </tbody>

                    @endforeach
                </table>
                <table class="table cart-table table-responsive-md">
                    <tfoot>
                        <tr>
                            <td>total price :</td>
                            <td>
                                <h2>$6935.00</h2>
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
        <div class="row cart-buttons">
            <div class="col-12">
                <a href="{{ url("products") }}" class="btn btn-normal"
                    >continue shopping</a
                >
                <a href="{{ url("checkout") }}" class="btn btn-normal ms-3"
                    >check out</a
                >
            </div>
        </div>
    </div>
</section> --}}
<!--section end-->
<script>
    const quantityBoxers = document.querySelectorAll(".quantity-boxer");
    let isIncreseBtnPressed = false
    let isOnchanged = false
    let isExceed = false
    quantityBoxers.forEach(quantityBoxer => {
        const btnIncrease = quantityBoxer.querySelector('.increase')
        const btnDecrease = quantityBoxer.querySelector('.decrease')
        const inputQty = quantityBoxer.querySelector('input[type=text]')
        const exceedQtyMessage = quantityBoxer.nextElementSibling

        btnDecrease.addEventListener('click', (e) =>{
            let newValue = 0
            let oldValue = Number(inputQty.value)
            if(e.target.classList.contains('decrease') ){
                if(oldValue == 1){
                    return;
                }
                newValue = oldValue-1;
                isIncreseBtnPressed = false;
            }
            inputQty.value = newValue;
            let cartItemId = inputQty.dataset.cartItemId
            updateQty(cartItemId, newValue)
        })

        btnIncrease.addEventListener('click', (e) =>{
            let qtyInStock = Number(inputQty.dataset.productQtyInstock)
            let newValue = 0
            let oldValue = Number(inputQty.value)
            if(e.target.classList.contains('increase')){
                if(oldValue == qtyInStock){
                    exceedQtyMessage.textContent = `Exceed ${qtyInStock} in stock`
                    setTimeout(() => {
                        exceedQtyMessage.textContent = '';
                    }, 5000);
                    return;
                }
                newValue = oldValue+1;
                isIncreseBtnPressed = true;
            }

            inputQty.value = newValue;
            let cartItemId = inputQty.dataset.cartItemId
            updateQty(cartItemId, newValue)
        })


        let inputOldValue = inputQty.value;
        console.log(inputOldValue)
        inputQty.addEventListener('change', (e) =>{
            let qtyInStock = Number(inputQty.dataset.productQtyInstock)
            let newValue = Number(inputQty.value);
            if(newValue == 0){
                newValue=1
                inputQty.value = newValue
            }
            if(qtyInStock < newValue){
                exceedQtyMessage.textContent = `Exceed ${qtyInStock} in stock`
                setTimeout(() => {
                    exceedQtyMessage.textContent = '';
                }, 5000);
                inputQty.value = inputOldValue
                return;
            }
            inputOldValue = newValue
            isOnchanged = true
            let cartItemId = inputQty.dataset.cartItemId
            updateQty(cartItemId, newValue)
        })
    })

    async function updateQty(cartItemId, qty) {
        try {
            const response = await fetch(`/update?cartItemId=${cartItemId}&qty=${qty}`)
            const data = await response.json();
            updateCartDomHTML(cartItemId, qty)

        } catch (error) {
            console.error(error);
        }
    }

    function updateCartDomHTML(cartItemId, qty) {

        const itemChanged = document.querySelector(`div[data-cart-item-id="${cartItemId}"]`);
        const originalPrice = parseFloat(itemChanged.dataset.productPrice)
        const priceElement = itemChanged.querySelector('.cart-item-total p')

        let oldPrice = parseFloat(priceElement.innerText.slice(1))
        let newPrice = 0
        if(isIncreseBtnPressed){
            newPrice = (oldPrice + originalPrice).toFixed(2);
        }
        if(!isIncreseBtnPressed){
            newPrice = (oldPrice - originalPrice).toFixed(2);
        }
        if(isOnchanged){
            newPrice = (qty * originalPrice).toFixed(2);
            isOnchanged = false;
        }
        // update total for every row
        priceElement.innerText =  `\$${newPrice}`;

        // update total for a entire cart
        const totalDiv = document.querySelector('.total-div')
        const totalPriceH2 = totalDiv.querySelector('.total-price')
        const AllItemChanged = document.querySelectorAll('div[data-cart-item-id]')
        let totalCartPrice = 0
        AllItemChanged.forEach(ItemChanged => {
            const priceEle = ItemChanged.querySelector('.cart-item-total p')
            let price = Number(priceEle.innerText.slice(1))
            totalCartPrice += parseFloat(price)
        })
        totalPriceH2.innerText = `\$${totalCartPrice.toFixed(2)}`

        //update total for a quick small cart side
        const cartSmallSide = document.querySelector('.cart-small-side')
        const itemRow = cartSmallSide.querySelector(`li[data-cart-item-id="${cartItemId}"]`)
        const cartSmallQtyElement = itemRow.querySelector('.cart-small-qty')
        const cartSmallTotal = cartSmallSide.querySelector('.cart-small-total')
        cartSmallQtyElement.innerText = `x${qty}`;
        cartSmallTotal.innerText = `\$${totalCartPrice.toFixed(2)}`

    }
</script>

@endsection

