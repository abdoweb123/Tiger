@extends('client.layouts.layout')

@section('content')
    {{-- content --}}
    <div class="container my-lg-5 my-3  section-top">
        <div class="row align-items-center py-2">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="index.html">
                            shop now
                        </a></li>
                    <li class="breadcrumb-item"><a href="allProducts.html">
                            cart
                        </a></li>
                    <li class="breadcrumb-item fw-semibold" aria-current="page">
                        checkout
                        </a></li>
                </ol>
            </nav>
        </div>
        <h4 class=" py-3 mb-0 fw-semibold d-flex gap-2 align-items-center">Checkout</h4>

        <div class="row py-2 justify-content-between">
            <div class="col-lg-7 col-12 ">
                <form id="myForm" action="{{ route('Client.submit') }}" method="POST">
                    @csrf
                    {{-- delivery methodes --}}
                    <div class="row table-row py-2">
                        <h6 class="">Shipping Method</h6>
                        <div class="col-12">
                            <div class="bg-gray p-2 rounded-1">
                                @foreach (Deliveries() as $key => $Delivery)
                                    <div class="form-check py-2">
                                        <input class="form-check-input save-input delivery" type="radio"
                                            {{ $Delivery->id == 1 ? 'checked' : '' }} value="{{ $Delivery->id }}"
                                            id="delivery{{ $Delivery->id }}" name="delivery_id">
                                        <label class="form-check-label" for="delivery{{ $Delivery->id }}"
                                            class="form-check-label save-label">
                                            {{ $Delivery->title() }}
                                        </label>
                                    </div>
                                @endforeach
                            </div>

                        </div>
                    </div>
                    {{-- delivery methodes --}}



                    {{-- avilable address --}}
                    @if ($addresses->count() > 0)
                        <h6 class=" shipping addres">Your Address</h6>
                        <div class="row table-row py-2 addres">
                            <div class="col-12">
                                <div class="bg-gray p-2 rounded-1">
                                    @foreach ($addresses as $address)
                                        <div class="form-check py-2 addres">
                                            {{-- address --}}
                                            <input type="radio" {{ $address->default == 1 ? 'checked' : '' }}
                                                class="form-check-input save-input radioAddress" value="{{ $address->id }}"
                                                id="address{{ $address->id }}" name="address_id" />
                                                
                                            <label for="address{{ $address->id }}"
                                                class="form-check-label save-label">{{ $address->country->title() }} ,
                                                {{ $address->road }} , {{ $address->region->title() }}</label>
                                            {{-- address --}}
                                        </div>
                                    @endforeach
                                </div>

                            </div>
                        </div>
                        {{-- avilable address --}}
                    @else
                        {{-- add address  --}}
                        <div class="row table-row py-2 addres">
                            <h6 class="">@lang('trans.addAddress')</h6>

                            <div class="col-lg-6 col-12 addres">
                                <label for="" class="form-label fw-medium">@lang('trans.country')<span
                                        class="red-label">*</span></label>
                                <select class="form-select form-control rounded-1 bg-gray border-0 w-100 shipping-options"
                                    aria-label="Default select example" name="country_id" id="country" required
                                    oninvalid="this.setCustomValidity(@lang('trans.this_field_required'))" title="@lang('trans.this_field_required')">
                                    {{-- <option value="">@lang('trans.select_country')</option> --}}
                                    @foreach ($countries as $country)
                                    <option {{ Country()->id == $country->id ? 'selected' : '' }}
                                        value="{{ $country->id }}">
                                        {{ $country->title() }}</option>
                                    @endforeach
                                </select>
                            </div>

                            {{-- region --}}
                            <div class="col-lg-6 col-12 addres">
                                <label for="" class="form-label fw-medium">@lang('trans.region')<span
                                        class="red-label">*</span></label>
                                <select
                                    class="form-select form-control rounded-1 bg-gray border-0 w-100 shipping-options rigons"
                                    aria-label="Default select example" name="region_id" id="region_id" required
                                    oninvalid="this.setCustomValidity(@lang('trans.this_field_required'))" title="@lang('trans.this_field_required')">
                                    {{-- <option value="">@lang('trans.select_region')</option> --}}
                                    @foreach ($regions as $region)
                                        <option value="{{ $region->id }}">{{ $region->title() }}</option>
                                    @endforeach
                                </select>

                            </div>
                            {{-- region --}}

                            <div class="col-lg-6 col-12 input-name addres">
                                <label for="email" class="form-label fw-medium">@lang('trans.city') <span
                                        class="red-label">*</span></label>
                                <div class="input-group mb-3">
                                    <input type="text" name="city" required
                                        oninvalid="this.setCustomValidity(@lang('trans.this_field_required'))" title="@lang('trans.this_field_required')"
                                        class="form-control rounded-1 bg-gray border-0">
                                </div>
                            </div>

                            <div class="col-lg-6 col-12 input-name addres">
                                <label for="block" class="form-label fw-medium">@lang('trans.block') </label>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control rounded-1 bg-gray border-0" name="block"
                                        id="" id="email">
                                </div>
                            </div>

                            <div class="col-lg-6 col-12 input-name addres">
                                <label for="apartment" class="form-label fw-medium">@lang('trans.apartment')</label>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control rounded-1 bg-gray border-0" id="email"
                                        name="apartment" required oninvalid="this.setCustomValidity(@lang('trans.this_field_required'))"
                                        title="@lang('trans.this_field_required')">
                                </div>
                            </div>

                            <div class="col-lg-6 col-12 input-name addres">
                                <label for="street" class="form-label fw-medium">Street</label>
                                <div class="input-group mb-3">
                                    <input type="text"name="street" class="form-control rounded-1 bg-gray border-0"
                                        required oninvalid="this.setCustomValidity(@lang('trans.this_field_required'))"
                                        title="@lang('trans.this_field_required')" id="email">
                                </div>
                            </div>

                            <div class="col-lg-6 col-12 addres">
                                <label for="email" class="form-label fw-medium">road</label>
                                <div class="input-group mb-3">
                                    <input type="text" name="road" class="form-control rounded-1 bg-gray border-0"
                                        id="email" required oninvalid="this.setCustomValidity(@lang('trans.this_field_required'))"
                                        title="@lang('trans.this_field_required')" id="email">
                                </div>
                            </div>

                            <div class="col-12 addres">
                                <div class="px-0 d-flex align-items-center ">
                                    <input type="checkbox" id="check1" name="default" id="save">
                                    <label for="check1" class=" fw-semibold px-2">@lang('trans.Save this information for next time')
                                    </label>
                                </div>
                            </div>
                        </div>
                        {{-- add address  --}}
                    @endif


                    {{-- payment --}}
                    <div class="row table-row py-2">
                        <h6 class="">Payment Method</h6>
                        <div class="col-12">
                            <div class="bg-gray p-2 rounded-1">
                                @foreach (Payments() as $Payment)
                                    <div class="form-check py-2">
                                        <input class="form-check-input" type="radio" name="payment_id"
                                            value="{{ $Payment->id }}" id="flexRadioDefault1">
                                        <label class="form-check-label" for="flexRadioDefault1">
                                            <span><img src="{{ $Payment->image }}" width="40" height="26"
                                                    alt="{{ $Payment->title() }}" /></span>
                                            <span>{{ $Payment->title() }}</span>
                                        </label>
                                    </div>
                                @endforeach
                            </div>

                        </div>
                    </div>
                    {{-- payment --}}


            </div>

            <div class="col-lg-4 col-12">
                <div class="row">
                    <div class=" bg-gray col-12 py-3 rounded-1">
                        <div class="bg-white p-3 rounded-1">
                            <div class="border-bottom">
                                {{-- <p class="d-flex justify-content-between summary">
                                    <span>@lang('trans.subTotal')</span>
                                    <span>{{ $subTotalCart }} {{ Country()->currancy_code }} </span>
                                </p> --}}
                                <p class="d-flex justify-content-between summary order-summary">
                                    <span>@lang('trans.subTotal')</span>
                                    <span class="">
                                        <input name="sub_total" id="subTotal" class="amount border-0 w-auto"
                                            value="{{ $subTotalCart }}" readonly placeholder="{{ $subTotalCart }}"
                                            style="direction: rtl;" />
                                        <span class="amount text-uppercase">{{ Country()->currancy_code }}</span>
                                    </span>
                                </p>

                                <p class=" justify-content-between summary order-summary couponInfo"
                                    style="display:none">
                                    <span>@lang('trans.Coupon')</span>
                                    <span class="">
                                        <input name="coupon" id="coupon" class="amount border-0 w-auto"
                                            value="{{ number_format(0, Country()->decimals, '.', '') }}" readonly
                                            placeholder="" style="direction: rtl;" />
                                        <span class="amount text-uppercase">{{ Country()->currancy_code }}</span>
                                    </span>
                                </p>

                                <p class=" justify-content-between order-summary couponInfo" style="display:none">
                                    <span>after coupon</span>
                                    <span class="">
                                        <input name="sub_total_after_coupon" id="sub_total_after_coupon"
                                            class="amount border-0 w-auto" value="0" readonly placeholder=""
                                            style="direction: rtl;" />
                                        <span class="amount text-uppercase">{{ Country()->currancy_code }}</span>
                                    </span>
                                </p>
                                <p class="d-flex justify-content-between order-summary">
                                    <span>@lang('trans.vat')({{ setting('vat') }}%)</span>

                                    <span class="">
                                        <input name="vat" id="vat" class="amount border-0 w-auto"
                                            value="{{ $vat }}" readonly placeholder="{{ $vat }}"
                                            style="direction: rtl;" />
                                        <span class="amount text-uppercase">{{ Country()->currancy_code }}</span>
                                    </span>
                                </p>

                                <p class="">
                                    <span class="order-summary" id="shipping">
                                        <span class="name">@lang('trans.SHIPPING')</span>
                                        <span class="">
                                            <input id="charge_cost" name="charge_cost" class="amount border-0 w-auto"
                                                readonly value="0" placeholder="0" style="direction: rtl;" />
                                            <span class="amount text-uppercase">{{ Country()->currancy_code }}</span>
                                        </span>
                                    </span>
                                </p>

                            </div>

                            <p class="d-flex justify-content-between summary py-2">
                                <span class="fw-bold">Net Total</span>
                                <span class="">
                                    <input id="total" class="amount total border-0 w-auto" name="net_total"
                                        value="{{ $total }}" readonly placeholder="{{ $total }}"
                                        style="direction: rtl;" />
                                    <span class="amount text-uppercase">{{ Country()->currancy_code }}</span>
                                </span>
                            </p>
                        </div>

                        <div class="w-100 my-3" >
                            <label for="code" class="form-label ">Enter your coupon</label>
                            <div class="input-group mb-3">
                                <input value="" name="code" class="form-control rounded-1 " id="code"
                                    type="text" placeholder="@lang('trans.Coupon code')" />
                                <button id="applay" class="btn btn-dark px-4 py-2 w-auto">Apply</button>
                            </div>
                        </div>

                        <div class=" w-100 d-flex flex-column align-items-center">
                            <button type="submit"
                                class="btn btn-dark px-4 btn m-auto border border-1 border-dark rounded-3 gap-2 my-2 w-50 py-2">Place
                                Order</button>
                            <a href="{{ route('Client.home') }}"
                                class="text-black text-decoration-underline text-center  m-auto  gap-2 my-2  py-2">Continue
                                shopping</a>
                        </div>

                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>
    {{-- content --}}
@endsection


@push('js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function() {
            $('#myForm').submit(function(e) {
                // Prevent the default form submission
                e.preventDefault();
                if ($('#applay').prop("disabled")) {
                    // Submit the form
                    this.submit();
                } else {
                    console.log('applay');
                    // Set the value of the input field to null
                    $('#code').val('');
                    // Submit the form
                    this.submit();
                }



            });
        });
    </script>

    <script>
        $(document).ready(function() {
            function getInailDeliveryCost() {
                var inialRegion = $('.rigons').val();
                var address_id = $('input[name="address_id"]:checked').val();
                console.log("Initial Region:",inialRegion);
                console.log("Address ID:", address_id);
                $.ajax({
                    url: '{{ route('Client.getInailDeliveryCost') }}',
                    type: "POST",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        inialRegion: inialRegion,
                        address_id: address_id
                       
                    },
                    success: function(data) {
                        $('#shipping input').val(data.inailDeliveryCostForSelectedCurrancy);
                        $('#total').val(data.totalAfterShipping);
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
            }
            // Initially hide or show shipping divs based on the default selected delivery method
            if ($('.delivery:checked').val() == 2) {
                console.log("delivery is pickup");
                $('.addres').hide();
                $('#shipping').hide();
                $('#shipping input').val(0);

            } else {
                console.log("avilible address or add new");
                $('.addres').show();
                $('#shipping').show();
                getInailDeliveryCost()
            }

            // Add change event listener to delivery radio inputs
            $('.delivery').change(function() {
                // Check if the selected delivery method is 2 (or any other value you need)
                if ($(this).val() == 2) {
                    // Hide shipping divs
                    $('.addres').hide();
                    $('#shipping').hide();
                    $('#shipping input').val(0);
                    $.ajax({
                        url: '{{ route('Client.getTotalBeforShipping') }}',
                        type: "POST",
                        data: {
                            "_token": "{{ csrf_token() }}",
                        },
                        success: function(data) {
                            $('#total').val(data);
                        },
                        error: function(error) {
                            console.log(error);
                        }
                    });
                } else {
                    // Show shipping divs
                    $('.addres').show();
                    $('#shipping').show();
                    getInailDeliveryCost()
                }
            });
            $('#country').on('change', function() {
                var country_id = $(this).val();

                $.ajax({
                    url: '{{ route('Client.getRigons') }}',
                    type: "POST",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        country_id: country_id
                    },
                    success: function(data) {
                        // console.log(data);
                        $('.rigons').empty();
                        // $('.rigons').append(
                        //     '<option value="" disable="true"  selected="true">@lang('trans.city')</option>'
                        // );
                        $.each(data, function(index, villagesObj) {
                            $('.rigons').append(
                                `<option value="${ villagesObj.id}" >${villagesObj["title_{{ lang() }}"] }</option>`
                            );
                        })
                        getInailDeliveryCost()
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
            })
            $('.rigons').on('change', function() {
                var region_id = $(this).val();

                $.ajax({
                    url: '{{ route('Client.getDeliveryCost') }}',
                    type: "POST",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        region_id: region_id
                    },
                    success: function(data) {
                        $('#shipping input').val(data.DeliveryCost);
                        $('#total').val(data.totalAfterShipping);
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
            })
            $('.radioAddress').on('change', function() {
                var address_id = $('input[name="address_id"]:checked').val();

                $.ajax({
                    url: '{{ route('Client.getDeliveryCost') }}',
                    type: "POST",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        address_id: address_id
                    },
                    success: function(data) {
                        $('#shipping input').val(data.DeliveryCost);
                        $('#total').val(data.totalAfterShipping);
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
            })
            $('#applay').prop("disabled", false);
            $('#code').prop("readonly", false);
            $('#applay').on('click', function(event) {
                event.preventDefault()
                // $('.applay').hide()
                var code = $('#code').val();
                var subTotal = $('#subTotal').val();
                var vat = $('#vat').val();
                var charge_cost = $('#charge_cost').val();

                if (code =="") {
                    return false
                } else {
                    $.ajax({
                        url: "{{ route('Client.applayCode') }}",
                        type: "POST",
                        data: {
                            code: code,
                            subTotal: subTotal,
                            charge_cost: charge_cost,
                            vat: vat,
                            "_token": "{{ csrf_token() }}",
                        },

                        success: function(data) {
                            if (data.status) {
                                // $('#shipping input').val(data.charge_cost);
                                $('.couponInfo').css('display', "flex")
                                $('#total').val(data.total);
                                $('#sub_total_after_coupon').val(data.subTotalAfterCoupon);
                                $('#coupon').val(data.couponValue);
                                $('#vat').val(data.vat);
                                // $('#vat').val(data.vat);
                                Swal.fire({
                                    icon: 'success',
                                    title: data.message,
                                    text: data.message,
                                    showConfirmButton: false,
                                    timer: 1500
                                });
                                $('#applay').prop("disabled", true)
                                $('#code').prop("readonly", true)
                            } else {
                                // $('#shipping input').val(data.charge_cost);
                                $('#total').val(data.total);
                                $('#sub_total_after_coupon').val(data.subTotalAfterCoupon);
                                $('#coupon').val(data.couponValue);
                                $('#vat').val(data.vat);
                                // $('#vat').val(data.vat);
                                Swal.fire({
                                    icon: 'error',
                                    title: data.message,
                                    text: data.message,
                                    showConfirmButton: false,
                                    timer: 1500
                                });

                                $('#applay').prop("disabled", false)
                                $('#code').prop("readonly", false)
                            }


                        },
                        error: function(xhr, status, error) {
                            // Handle errors
                            // console.log(5)
                            console.log(error);
                        }
                    })
                }

            })
        });
    </script>
@endpush
