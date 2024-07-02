{{-- <li class="nav-item @if(str_contains(Route::currentRouteName(), 'orders')) active @endif">
    <a class="collapsed" href="{{ route('admin.orders.index') }}">
        <span class="icon text-center">
            <i style="width: 20px;" class="fa-solid fa-arrow-up-wide-short mx-2"></i>
        </span>
        <span class="text">{{ __('trans.orders') }}</span>
    </a>
</li> --}}

<li class="nav-item @if(str_contains(Route::currentRouteName(), 'orders')) active @endif">
    <a class="collapsed" href="#0" class="" data-bs-toggle="collapse" data-bs-target="#orders" aria-controls="orders" aria-expanded="true" aria-label="Toggle navigation">
        <span class="icon text-center">
            <i style="width: 20px;" class="fa-solid fa-list-check mx-2"></i>
        </span>
        
        <style>
            .new_orders {
              height: 25px;
              width: 26px;
              background-color: red;
              border-radius: 50%;
              display: inline-block;
            }
            .current_orders {
              height: 25px;
              min-width: 26px;
              background-color: #000;
              border-radius: 50px;
              display: inline-block;
            }
            .previous_orders {
              height: 25px;
              background-color: green;
              border-radius: 50px;
              display: inline-block;
            }
        </style>
        @php($new = \Modules\Order\Entities\Model::where('status',0)->where('follow',0)->when(auth()->user()?->branch_id, function ($query) { return $query->where('branch_id', auth()->user()?->branch_id); })->count())
        @php($current = \Modules\Order\Entities\Model::where('status',1)->whereIn('follow', [0,1,2])->when(auth()->user()?->branch_id, function ($query) { return $query->where('branch_id', auth()->user()?->branch_id); })->count())
        @php($previous = \Modules\Order\Entities\Model::where('status',1)->whereIn('follow', [3])->when(auth()->user()?->branch_id, function ($query) { return $query->where('branch_id', auth()->user()?->branch_id); })->count())
        @php($declined = \Modules\Order\Entities\Model::where('status',2)->when(auth()->user()?->branch_id, function ($query) { return $query->where('branch_id', auth()->user()?->branch_id); })->count())
        @php($order_history = \Modules\Order\Entities\Model::where('status',5)->when(auth()->user()?->branch_id, function ($query) { return $query->where('branch_id', auth()->user()?->branch_id); })->count())
        <span class="text row d-flex justify-content-center align-items-center">
            <span class="w-50">
                {{ __('trans.orders') }}
            </span>
            <span class="w-50 text-start">
                <span class="current_orders text-center text-white">
                    {{ $current }}
                </span>
                <span class="new_orders text-center text-white">
                    {{ $new }}
                </span>
            </span>
        </span>
    </a>
    <ul id="orders" class="dropdown-nav mx-4 collapse" style="">
        <li class="row d-flex justify-content-center align-items-center">
            <span class="w-75">
                <a href="{{ route('admin.orders', ['method' => 'new']) }}">@lang('trans.newOrders')</a>
            </span>
            <span class="w-25 text-start">
                <span class="new_orders text-center text-white">
                    {{ $new }}
                </span>
            </span>
        </li>
        <li class="row d-flex justify-content-center align-items-center">
            <span class="w-75">
                <a href="{{ route('admin.orders', ['method' => 'current']) }}">@lang('trans.currentOrders')</a>
            </span>
            <span class="w-25 text-start">
                <span class="current_orders text-center text-white">
                    {{ $current }}
                </span>
            </span>
        </li>
        <li class="row d-flex justify-content-center align-items-center">
            <span class="w-75">
                <a href="{{ route('admin.orders', ['method' => 'previous']) }}">@lang('trans.previousOrders')</a>
            </span>
            <span class="w-25 text-start">
                <span class="current_orders text-center text-white px-2">
                    {{ $previous }}
                </span>
            </span>
        </li>
        <li class="row d-flex justify-content-center align-items-center">
            <span class="w-75">
                <a href="{{ route('admin.orders', ['method' => 'declined']) }}">@lang('trans.declinedOrders')</a>
            </span>
            <span class="w-25 text-start">
                <span class="current_orders text-center text-white px-2">
                    {{ $declined }}
                </span>
            </span>
        </li>
        <li class="row d-flex justify-content-center align-items-center">
            <span class="w-75">
                <a href="{{ route('admin.orders', ['method' => 'order_history']) }}">@lang('trans.order_history')</a>
            </span>
            <span class="w-25 text-start">
                <span class="current_orders text-center text-white px-2">
                    {{ $order_history }}
                </span>
            </span>
        </li>
        
    </ul>
</li>