<?php

namespace Modules\Country\Http\Controllers;

use App\Functions\Upload;
use App\Http\Controllers\BasicController;
use Illuminate\Http\Request;
use Modules\Country\app\Http\Requests\StoreCountryRequest;
use Modules\Country\app\Http\Requests\UpdateCountryRequest;
use Modules\Country\Entities\Country;
use Modules\Country\Entities\Region;
use Yajra\DataTables\Facades\DataTables;

class CountryController extends BasicController
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $countries = Country::latest();

            return DataTables::of($countries)
                ->addColumn('action', function ($Model) {
                    $data = '';
                    $data .= '<a style="color: #000;" href="'.route('admin.countries.show', $Model).'"><i class="fas fa-eye"></i></a>';

                    $data .= '<a style="color: #000;" href="'.route('admin.countries.edit', $Model).'"><i class="fa-solid fa-pen-to-square"></i></a>';

                    return $data;
                })
                ->editColumn('title_ar', function ($Country) {
                    return '<a href="'.route('admin.countries.show', $Country).'">'.$Country->title_ar.'</a>';
                })
                ->editColumn('title_en', function ($Country) {
                    return '<a href="'.route('admin.countries.show', $Country).'">'.$Country->title_en.'</a>';
                })
                ->editColumn('regions', function ($Country) {
                    return '<a href="'.route('admin.countries.show', $Country).'">'.__('trans.regions').'</a>';
                })
                ->editColumn('status', function ($Model) {
                    return '<input class="toggle" type="checkbox" onclick="toggleswitch('.$Model->id.',\'countries\')" '.($Model->status ? 'checked' : '').'>';
                })
                ->addColumn('image', function ($Model) {
                    return '<a class="image-popup-no-margins" href="'.image_path($Model['image']).'">
                        <img src="'.image_path($Model['image']).'" style="max-height: 150px;max-width: 150px">
                    </a>';
                })
                ->escapeColumns('action', 'checkbox', 'image')
                ->addIndexColumn()
                ->addColumn('checkbox', function ($Model) {
                    return '<input type="checkbox" class="DTcheckbox" value="'.$Model->id.'">';
                })
                ->toJson();
        }

        return view('country::countries.index');
    }


    public function create()
    {
        return view('country::countries.create');
    }


    public function store(StoreCountryRequest $request)
    {
        Country::latest()->create($request->validated());
        alert()->success(__('trans.addedSuccessfully'));

        return redirect()->back();
    }

    public function show(Country $Country)
    {
        if (request()->delivery_cost) {
            Region::where('country_id', $Country->id)->update([
                'delivery_cost' => request()->delivery_cost,
            ]);
        }

        return view('country::countries.show', compact('Country'));
    }

    public function edit(Country $Country)
    {
        return view('country::countries.edit', compact('Country'));
    }

    
    public function update(UpdateCountryRequest $request, Country $Country)
    {
        $Country->update($request->validated());
        alert()->success(__('trans.updatedSuccessfully'));

        return redirect()->back();
    }

    public function destroy(Country $Country)
    {
        $Country->delete();
    }
}
