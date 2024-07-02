<div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab" tabindex="0">
    <div class="row py-2">
        <div class="col-12">
            <div class="row profile-login justify-content-center" style="column-gap: 10px;">
                <div class="col-12 ">
                    <div class="nav flex-row  nav-pills  py-5 justify-content-center" id="v-pills-tab" role="tablist"
                        aria-orientation="vertical">
                        <button
                            class="nav-link active my-1 border border-3 border-end-0 border-start-0 border-top-0 rounded-0"
                            id="v-pills-currentorder-tab" data-bs-toggle="pill" data-bs-target="#v-pills-currentorder"
                            type="button" role="tab" aria-controls="v-pills-currentorder" aria-selected="true">
                            <div class="row">
                                <div class=" col-12 d-flex flex-column justify-content-center text-center">
                                    <h6
                                        class="fw-bold  py-2 my-0 text-uppercase text-black px-lg-5 border-0 position-static">
                                        current orders
                                    </h6>
                                </div>
                            </div>
                        </button>
                        <button class="nav-link my-1 border border-3 border-end-0 border-start-0 border-top-0 rounded-0"
                            id="v-pills-lastorder-tab" data-bs-toggle="pill" data-bs-target="#v-pills-lastorder"
                            type="button" role="tab" aria-controls="v-pills-lastorder" aria-selected="false">
                            <div class="row">
                                <div class="col-12 d-flex flex-column justify-content-center text-center">
                                    <h6
                                        class="fw-bold py-2 my-0 text-uppercase text-black px-lg-5 text-nowrap border-0 position-static">
                                        last orders
                                    </h6>

                                </div>
                            </div>
                        </button>
                    </div>
                </div>

                <div class=" col-12 " style="min-height: 70vh;">
                    <div class="row ">
                        <div class="col-12 ">
                            <div class="tab-content" id="v-pills-tabContent">
                                {{-- current orders --}}
                                <div class="tab-pane fade show active" id="v-pills-currentorder" role="tabpanel"
                                    aria-labelledby="v-pills-currentorder-tab" tabindex="0">
                                    @if ($Orders->count() > 0)
                                        @foreach ($Orders as $order)
                                            @if (!(($order->status == 1 && $order->follow == 3) || $order->status == 2))
                                                <div class="col-12 data-route" data-order_id="{{ $order->id }}">
                                                    <div class="accordion rounded-2 border border-2  accordion-flush mb-2"
                                                        id="accordionFlushExample">
                                                        <div class="accordion-item ">
                                                            <h2 class="accordion-header ">
                                                                <a class="accordion-button collapsed text-black fw-bold  my-2 w-100 p-3 rounded d-flex align-items-center phoneButton"
                                                                    type="button" data-bs-toggle="collapse"
                                                                    data-bs-target="#flush-collapseOne"
                                                                    aria-expanded="false"
                                                                    aria-controls="flush-collapseOne">
                                                                    Order number #{{ $order->id }}
                                                                </a>
                                                            </h2>
                                                            <div id="flush-collapseOne"
                                                                class="accordion-collapse collapse"
                                                                data-bs-parent="#accordionFlushExample">
                                                                <div class="accordion-body">
                                                                    <div style="overflow-x:auto;">

                                                                        <table class="table product-details">
                                                                            <thead class="bg-gray">
                                                                                <tr>
                                                                                    <th scope="col">Order number</th>
                                                                                    <th scope="col">Order status
                                                                                    </th>
                                                                                    <th scope="col">Order date
                                                                                    </th>
                                                                                    <th scope="col">Total

                                                                                    </th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                <tr class="text-center">
                                                                                    <td scope="col">
                                                                                        {{ $order->id }}
                                                                                    </td>
                                                                                    @if ($order->status == 0 && $order->follow == 0)
                                                                                        <td scope="col"
                                                                                            class="fw-semibold text-success">
                                                                                            @lang('trans.New')
                                                                                        </td>
                                                                                    @elseif($order->status == 1 && $order->follow == 1)
                                                                                        <td scope="col"
                                                                                            class="fw-semibold text-success">
                                                                                            @lang('trans.In Progress')</td>
                                                                                        @elseif($order->status == 1 && $order->follow == 2)
                                                                                        <td scope="col"
                                                                                            class="fw-semibold text-success">
                                                                                            @lang('trans.order_onway')</td>
                                                                                    @endif
                                                                                    <td scope="col">
                                                                                        {{ \Carbon\Carbon::parse($order->created_at)->format('F j, Y') }}
                                                                                    </td>
                                                                                    <td scope="col">
                                                                                        {{ Country()->currancy_code_en }}
                                                                                        {{ number_format(Country()->currancy_value * $order->net_total, Country()->decimals, '.', '') }}
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                    {{-- <div class="p-2 my-4 shadow">
                                                                        <div
                                                                            class="row justify-content-center align-items-center">
                                                                            <div class="col-12 col-md-6">
                                                                                <div class="row justify-content-center align-items-center"
                                                                                    style="font-size: 14px;">
                                                                                    <div
                                                                                        class="col-4 d-flex align-items-center justify-content-center">
                                                                                        <img src="assets/imgs/products/Frame 13.png"
                                                                                            class="img-fluid w-75"
                                                                                            alt="">
                                                                                    </div>
                                                                                    <div class="col-8">
                                                                                        <div class="">
                                                                                            <span
                                                                                                class="font-weight-bold d-block ">Nike
                                                                                                Downshifter 12 for
                                                                                                men
                                                                                                with
                                                                                                multiple
                                                                                                colors (1X)</span>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-12 col-md-6">
                                                                                <div
                                                                                    class="row mt-2 align-items-center">
                                                                                    <div
                                                                                        class="col-6 text-secondary font-weight-bold d-block ">
                                                                                        <div class=" "><span
                                                                                                class="title-details">size</span><span>42</span>
                                                                                        </div>
                                                                                        <span class=" "><span
                                                                                                class="title-details">Material</span><span>Plastic</span></span>
                                                                                        <span
                                                                                            class="d-flex align-items-center"><span
                                                                                                class="title-details">color</span><span>
                                                                                                <div class="mx-1 rounded-circle"
                                                                                                    style="height: 10px; width:10px; background-color: red;">
                                                                                                </div>
                                                                                            </span><span>red</span>
                                                                                    </div></span>

                                                                                    <div class="col-6">
                                                                                        <span
                                                                                            class="font-weight-bold d-block  text-secondary">Price</span>
                                                                                        <span>10000.00</span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div> --}}
                                                                    <div class="summary--section hide-content">
                                                                        <div class="p-2 my-4 shadow order-items-container">
                                                                        </div>
                                                                    </div>
                                                                    

                                                                    <div class="">
                                                                        <div class="container">
                                                                            <div
                                                                                class="sub-total d-flex justify-content-between my-2">
                                                                                <span> Subtotal :</span>
                                                                                <span id="subTotal"></span>
                                                                            </div>
                                                                            <div
                                                                                class="sub-total d-flex justify-content-between my-2">
                                                                                <span>@lang('trans.Vat'):</span>
                                                                                <span id="vat"></span>
                                                                            </div>
                                                                            <div
                                                                                class="sub-total  justify-content-between my-2 shippingCountainer">
                                                                                <span>shipping</span>
                                                                                <span id="shipping"></span>
                                                                            </div>
                                                                            <div
                                                                                class="sub-total d-flex justify-content-between my-2 bg-gray p-2">
                                                                                <span>@lang('trans.TOTAL')</span>
                                                                                <span class="total"
                                                                                    id="total"></span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <details class="description">
                                                                        <summary class=" my-4 fw-semibold">
                                                                            <span class="text-decoration-underline">
                                                                                view details
                                                                            </span>
                                                                        </summary>
                                                                        <div class="gy-3  text-secondary  row">
                                                                            <span class="col-12 paymentImage">
                                                                                Payment Method: <span
                                                                                    id="paymentImage"></span>
                                                                            </span>
                                                                            <span class="col-12 shipping-detail">
                                                                                <span class="shipping-detail"
                                                                                    id="country"></span>
                                                                                <span class="shipping-detail"
                                                                                    id="addressDetails"></span>
                                                                            </span>
                                                                        </div>
                                                                    </details>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach
                                    @else
                                        <h2>no new order </h2>
                                    @endif
                                </div>
                                {{-- current orders --}}
                                
                                {{-- last orders --}}
                                <div class="tab-pane fade" id="v-pills-lastorder" role="tabpanel"
                                    aria-labelledby="v-pills-lastorder-tab" tabindex="0">
                                    <div class="row">
                                        @if ($Orders->count() > 0)
                                            @foreach ($Orders as $order)
                                                @if (($order->status == 1 && $order->follow == 3) || $order->status == 2)
                                                    <div class="col-12 data-route"
                                                        data-order_id="{{ $order->id }}">
                                                        <div class="accordion rounded-2 border border-2  accordion-flush mb-2"
                                                            id="accordionFlushExample">
                                                            <div class="accordion-item ">
                                                                <h2 class="accordion-header ">
                                                                    <a class="accordion-button collapsed text-black fw-bold  my-2 w-100 p-3 rounded d-flex align-items-center phoneButton"
                                                                        type="button" data-bs-toggle="collapse"
                                                                        data-bs-target="#flush-collapseOne"
                                                                        aria-expanded="false"
                                                                        aria-controls="flush-collapseOne">
                                                                        Order number #{{ $order->id }}
                                                                    </a>
                                                                </h2>
                                                                <div id="flush-collapseOne"
                                                                    class="accordion-collapse collapse"
                                                                    data-bs-parent="#accordionFlushExample">
                                                                    <div class="accordion-body">
                                                                        <div style="overflow-x:auto;">

                                                                            <table class="table product-details">
                                                                                <thead class="bg-gray">
                                                                                    <tr>
                                                                                        <th scope="col">Order number
                                                                                        </th>
                                                                                        <th scope="col">Order status
                                                                                        </th>
                                                                                        <th scope="col">Order date
                                                                                        </th>
                                                                                        <th scope="col">Total

                                                                                        </th>
                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody>
                                                                                    <tr class="text-center">
                                                                                        <td scope="col">
                                                                                            {{ $order->id }}
                                                                                        </td>
                                                                                        @if ($order->status == 1 && $order->follow == 3)
                                                                                            <td scope="col"
                                                                                                class="fw-semibold text-success">
                                                                                                @lang('trans.Delieverd')</td>
                                                                                        @else
                                                                                            <td scope="col"
                                                                                                class="fw-semibold text-success">
                                                                                                @lang('trans.Canceled')</td>
                                                                                        @endif
                                                                                        <td scope="col">
                                                                                            {{ \Carbon\Carbon::parse($order->created_at)->format('F j, Y') }}
                                                                                        </td>

                                                                                        <td scope="col">
                                                                                            {{ Country()->currancy_code_en }}
                                                                                            {{ number_format(Country()->currancy_value * $order->net_total, Country()->decimals, '.', '') }}
                                                                                        </td>

                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                                        <div class="p-2 my-4 shadow">
                                                                            <div
                                                                                class="row justify-content-center align-items-center">
                                                                                <div class="col-12 col-md-6">
                                                                                    <div class="row justify-content-center align-items-center"
                                                                                        style="font-size: 14px;">
                                                                                        <div
                                                                                            class="col-4 d-flex align-items-center justify-content-center">
                                                                                            <img src="assets/imgs/products/Frame 13.png"
                                                                                                class="img-fluid w-75"
                                                                                                alt="">
                                                                                        </div>
                                                                                        <div class="col-8">
                                                                                            <div class="">
                                                                                                <span
                                                                                                    class="font-weight-bold d-block ">Nike
                                                                                                    Downshifter 12 for
                                                                                                    men
                                                                                                    with
                                                                                                    multiple
                                                                                                    colors (1X)</span>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-12 col-md-6">
                                                                                    <div
                                                                                        class="row mt-2 align-items-center">
                                                                                        <div
                                                                                            class="col-6 text-secondary font-weight-bold d-block ">
                                                                                            <div class=" "><span
                                                                                                    class="title-details">size</span><span>42</span>
                                                                                            </div>
                                                                                            <span class=" "><span
                                                                                                    class="title-details">Material</span><span>Plastic</span></span>
                                                                                            <span
                                                                                                class="d-flex align-items-center"><span
                                                                                                    class="title-details">color</span><span>
                                                                                                    <div class="mx-1 rounded-circle"
                                                                                                        style="height: 10px; width:10px; background-color: red;">
                                                                                                    </div>
                                                                                                </span><span>red</span>
                                                                                        </div></span>

                                                                                        <div class="col-6">
                                                                                            <span
                                                                                                class="font-weight-bold d-block  text-secondary">Price</span>
                                                                                            <span>10000.00</span>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="">
                                                                            <div class="container">
                                                                                <div
                                                                                    class="sub-total d-flex justify-content-between my-2 price-row">
                                                                                    <span> Subtotal :</span>
                                                                                    <span id="subTotal"></span>
                                                                                </div>
                                                                                <div
                                                                                    class="sub-total d-flex justify-content-between my-2 price-row couponInfo">
                                                                                    <span>@lang('trans.Coupon'):</span>
                                                                                    <span id="coupon"></span>
                                                                                </div>
                                                                                <div
                                                                                    class="sub-total d-flex justify-content-between my-2 price-row">
                                                                                    <span>@lang('trans.Vat'):</span>
                                                                                    <span id="vat"></span>
                                                                                </div>
                                                                                <div
                                                                                    class="sub-total d-flex justify-content-between my-2 price-row couponInfo">
                                                                                    <span>@lang('trans.Sub Total after coupon')</span>
                                                                                    <span
                                                                                        id="sub_total_after_coupon"></span>
                                                                                </div>
                                                                                <div class="sub-total  justify-content-between my-2 bg-gray p-2 price-row shippingCountainer">
                                                                                    <span>@lang('trans.SHIPPING')</span>
                                                                                    <span id="shipping"></span>
                                                                                </div>
                                                                                <div
                                                                                    class="sub-total d-flex justify-content-between my-2 bg-gray p-2 price-row">
                                                                                    <span>@lang('trans.TOTAL')</span>
                                                                                    <span class="total"
                                                                                        id="total"></span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <details class="description">
                                                                            <summary class=" my-4 fw-semibold">
                                                                                <span
                                                                                    class="text-decoration-underline">
                                                                                    view details
                                                                                </span>
                                                                            </summary>
                                                                            <div class="gy-3  text-secondary  row">
                                                                                <span class="col-12 paymentImage">
                                                                                    Payment Method: <span
                                                                                        id="paymentImage"></span>
                                                                                </span>
                                                                                <span class="col-12 shipping-detail">
                                                                                    <span class="shipping-detail"
                                                                                        id="country"></span>
                                                                                    <span class="shipping-detail"
                                                                                        id="addressDetails"></span>
                                                                                </span>
                                                                            </div>
                                                                        </details>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                @endif
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                                {{-- last orders --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div>
            </div>
        </div>
    </div>
</div>
