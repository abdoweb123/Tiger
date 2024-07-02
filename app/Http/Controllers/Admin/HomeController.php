<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BasicController;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Modules\Category\Entities\Model;
use Modules\Client\Entities\Model as EntitiesModel;
use Modules\Product\Entities\Product;
use Modules\Service\Entities\Model as ServiceEntitiesModel;
use Modules\Subscriber\Entities\Model as SubscriberEntitiesModel;

class HomeController extends BasicController
{
    public function index(Request $request)
    {
        $categoriesCount=Model::count();
        $productsCount=Product::count();
        $clientsCount=EntitiesModel::count();
        $servicesCount=ServiceEntitiesModel::count();
        $subscribersCount=SubscriberEntitiesModel::count();
        $currentOrdersCount = DB::table('orders')->where('status', 1)->whereIn('follow', [0, 1, 2])->count();
        $previousOrdersCount = DB::table('orders')->where('status', 1)->whereIn('follow', [3])->count();
        

        
        $chartOrders = DB::table('orders')->whereMonth('created_at', '>=', Carbon::now()->subMonth()->month)->select([DB::raw('DATE(created_at) AS label'), DB::raw('(COUNT(*)) as y')])->groupBy('label')->get()->toarray();
        $chartChanges = DB::table('orders')->where('status', 1)->select(DB::raw('sum(net_total) as y'), DB::raw("DATE_FORMAT(created_at,'%M %Y') as label"))->groupBy('label')->orderBy('created_at')->get()->toarray();
        $chartUsers = EntitiesModel::whereNotNull('created_at')->whereMonth('created_at', '>=', Carbon::now()->subMonth()->month)->select([DB::raw('DATE(created_at) AS label'), DB::raw('(COUNT(*)) as y')])->groupBy('label')->get()->toarray();



        return view('Admin.home',compact(
            'categoriesCount','productsCount','clientsCount','servicesCount','subscribersCount','currentOrdersCount','previousOrdersCount','chartOrders','chartChanges','chartUsers'
        ));
    }
}
