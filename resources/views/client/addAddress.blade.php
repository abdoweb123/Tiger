@extends('client.layouts.layout')
@section('content')
    <div class="container my-lg-5 my-3  section-top">
        <div class="row profile" style="column-gap: 10px;">
            <div class="col-lg-3 ">
                <div class="nav flex-lg-column flex-row  nav-pills  px-4 py-5" id="v-pills-tab" role="tablist"
                    aria-orientation="vertical">
                    {{-- <button class="nav-link active my-1" id="v-pills-address-tab" data-bs-toggle="pill"
                        data-bs-target="#v-pills-address" type="button" role="tab" aria-controls="v-pills-address"
                        aria-selected="false">
                        <h6 class=" py-2 my-0 ">
                            Add address
                        </h6>
                    </button> --}}
                </div>
            </div>

            <div class="col-lg-8 col-12" style="min-height: 70vh;">
                <div class="row ">
                    <div class="col-12 ">
                        <div class="tab-content" id="v-pills-tabContent">
                            <!-- edit address -->
                            <div class="tab-pane fade show active" id="v-pills-address" role="tabpanel"
                                aria-labelledby="v-pills-address-tab" tabindex="0">
                                <form action="{{ route('Client.storeAddress') }}" method="post">
                                    @csrf
                                    <div class="row  my-5 p-2 gap-3 ">
                                        <h5 class="py-2">@lang('trans.addAddress')</h5>
                                        <div class="col-lg-5 col-12">
                                            <label for="" class="form-label fw-medium">@lang('trans.country')<span
                                                    class="red-label">*</span></label>
                                            <select
                                                class="form-select form-control rounded-1 bg-gray border-0 w-100 shipping-options"
                                                aria-label="Default select example" name="country_id" id="country"
                                                required oninvalid="this.setCustomValidity(@lang('trans.this_field_required'))"
                                                title="@lang('trans.this_field_required')">
                                                <option value="">@lang('trans.select_country')</option>
                                                @foreach ($countries as $country)
                                                    <option 
                                                        value="{{ $country->id }}">
                                                        {{ $country->title() }}</option>
                                                @endforeach
                                            </select>
                                            </select>
                                        </div>
                                        {{-- region --}}
                                        <div class="col-lg-5 col-12">
                                            <label for="" class="form-label fw-medium">@lang('trans.region')<span
                                                    class="red-label">*</span></label>
                                                <select
                                                    class="form-select form-control rounded-1 bg-gray border-0 w-100 shipping-options rigons"
                                                    aria-label="Default select example" name="region_id" id="region_id" required
                                                    oninvalid="this.setCustomValidity(@lang('trans.this_field_required'))"
                                                    title="@lang('trans.this_field_required')">
                                                    <option value="">@lang('trans.select_region')</option>
                                                    @foreach ($regions as $region)
                                                        <option value="{{ $region->id }}">{{ $region->title() }}</option>
                                                    @endforeach
                                                </select>
                                            </select>
                                        </div>
                                        {{-- region --}}
                                        <div class="col-lg-5 col-12">
                                            <label for="email" class="form-label fw-medium">@lang('trans.city') <span
                                                    class="red-label">*</span></label>
                                            <div class="input-group mb-3">
                                                <input type="text"
                                                    
                                                    name="city" required
                                                    oninvalid="this.setCustomValidity(@lang('trans.this_field_required'))"
                                                    title="@lang('trans.this_field_required')"
                                                    class="form-control rounded-1 bg-gray border-0">
                                            </div>
                                        </div>
                                        <div class="col-lg-5 col-12">
                                            <label for="email" class="form-label fw-medium">@lang('trans.block') </label>
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control rounded-1 bg-gray border-0"
                                                    name="block" id=""
                                                   
                                                    id="email">
                                            </div>
                                        </div>
                                        <div class="col-lg-5 col-12">
                                            <label for="email" class="form-label fw-medium">@lang('trans.apartment')</label>
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control rounded-1 bg-gray border-0"
                                                    id="email" name="apartment"
                                                    
                                                    required oninvalid="this.setCustomValidity(@lang('trans.this_field_required'))"
                                                    title="@lang('trans.this_field_required')">
                                            </div>
                                        </div>
                                        <div class="col-lg-5 col-12">
                                            <label for="email" class="form-label fw-medium">Street</label>
                                            <div class="input-group mb-3">
                                                <input type="text"name="street"
                                                    class="form-control rounded-1 bg-gray border-0"
                                                   
                                                    required oninvalid="this.setCustomValidity(@lang('trans.this_field_required'))"
                                                    title="@lang('trans.this_field_required')" id="email">
                                            </div>
                                        </div>
                                        <div class="col-lg-5 col-12">
                                            <label for="email" class="form-label fw-medium">road</label>
                                            <div class="input-group mb-3">
                                                <input type="text" name="road"
                                                    class="form-control rounded-1 bg-gray border-0" id="email"
                                                   
                                                    required oninvalid="this.setCustomValidity(@lang('trans.this_field_required'))"
                                                    title="@lang('trans.this_field_required')" id="email">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="px-0 d-flex align-items-center ">
                                                <input type="checkbox" id="check1" name="default" id="save"  >
                                                <label for="check1" class=" fw-semibold px-2">Set as default shipping
                                                    address
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 ">
                                        <div class="d-flex align-items-center my-3">
                                            <div class="d-flex gap-3 ">
                                                <button class="btn  btn-dark text-white px-lg-4 px-2 button-width save"
                                                    type="submit">

                                                    save
                                                </button>
                                                <a href="{{ route('Client.account') }}" class="btn btn-outline-dark border-dark px-lg-4 px-2 button-width cancel"
                                                    type="button">Cancel</a>

                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- end section edit address -->
                        </div>
                    </div>
                </div>
            </div>
            <div>
            </div>

        </div>
    </div>
@endsection

@push('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"
        integrity="sha512-X/YkDZyjTf4wyc2Vy16YGCPHwAY8rZJY+POgokZjQB2mhIRFJCckEGc6YyX9eNsPfn0PzThEuNs+uaomE5CO6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"
        integrity="sha512-XtmMtDEcNz2j7ekrtHvOVR4iwwaD6o/FUJe6+Zq+HgcCsk3kj4uSQQR8weQ2QVj1o0Pk6PwYLohm206ZzNfubg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/intl-tel-input@19.2.16/build/js/intlTelInput.min.js"></script>

    <script>
        if ($("details").click().attr("")) {
            $("summary span").text("Close details");
        } else if ($("details").click().attr("open")) {
            $("summary span").text("view details")
        }
    </script>


    <script src="https://unpkg.com/intl-tel-input@17.0.3/build/js/intlTelInput.js"></script>

    <script>
        var iti = window.intlTelInput(document.querySelector("#phone"), {
            separateDialCode: true,
            formatOnDisplay: false,
            utilsScript: "https://unpkg.com/intl-tel-input@17.0.3/build/js/utils.js",
            onlyCountries: @json(Countries()->pluck('country_code')),
            preferredCountries: ['sa']
        });
        window.iti = iti;

        iti.setCountry(
            "{{ old('country_code', isset(auth()->user()->country_code) ? auth()->user()->country_code : 'SA') }}");
        document.querySelector("#phone").addEventListener("countrychange", function() {
            document.getElementById("phone").value = '';
            document.getElementById("country_code").value = iti.getSelectedCountryData().iso2.toUpperCase();
            document.getElementById("phone_code").value = iti.getSelectedCountryData().dialCode;
        })
    </script>

    <script>
  
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
    </script>

    
@endpush

