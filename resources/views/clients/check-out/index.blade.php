@extends('layout') @section('title', 'Contact') @section('body')

<!-- checkout start -->
<section class="checkout-second section-big-py-space b-g-light">
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
</section>
<!-- checkout end -->

@endsection
