<?php

namespace Modules\Product\Http\Controllers;

use App\Functions\Upload;
use App\Http\Controllers\BasicController;
use Illuminate\Http\Request;
use Modules\Category\Entities\Model as Category;
use Modules\Color\Entities\Model as Color;
use Modules\Product\Entities\Gallery;
use Modules\Product\Entities\Product;
use Modules\Product\Entities\ProductItem;
use Modules\Product\Http\Requests\ProductRequest;
use Modules\Size\Entities\Model as Size;

class ProductController extends BasicController
{
    public function changeNewCollection($id)
    {
        $product = Product::find($id);
        if ($product) {
            $product->new_collection = !$product->new_collection;
            $product->save();
            return response()->json(['success' => true, 'new_collection' => $product->new_collection]);
        }
        return response()->json(['success' => false]);
    }

    public function changeMostSelling($id)
    {
        $product = Product::find($id);
        if ($product) {
            $product->most_selling = !$product->most_selling;
            $product->save();
            return response()->json(['success' => true, 'most_selling' => $product->most_selling]);
        }
        return response()->json(['success' => false]);
    }

    public function index(Request $request)
    {
        $Products = Product::get();

        return view('product::products.index', compact('Products'));
    }

    public function create()
    {
        $Categories = Category::whereNull('parent_id')->with(['children' => function ($query) {
            $query->with(['Products', 'Parent'])->withCount('Products');
        }])->get();

        return view('product::products.create', compact('Categories'));
    }


    public function store(ProductRequest $request)
    {
        // Access the merged data
        $value = $request->input('key');

        $Product = Product::create($request->only('title_ar', 'title_en', 'short_desc_ar', 'short_desc_en', 'long_desc_ar', 'long_desc_en', 'price', 'discount_from', 'discount_to', 'discount_value', 'material', 'VAT'));
        $Product->update(['quantity' => $request->product_quantity]);

        $this->store_update($Product->id, $request);

        alert()->success(__('trans.addedSuccessfully'));

        return redirect()->route('admin.products.edit', $Product);
    }


    public function show($id)
    {
        return redirect()->route('admin.products.edit', ['product' => $id]);
    }

    public function edit($id)
    {
        $Product = Product::with(['Gallery', 'Categories'])->where('id', $id)->firstorfail();

        $ProductItems = ProductItem::where('product_id', $Product->id)->get();

        $Categories = Category::whereNull('parent_id')->with(['children' => function ($query) use ($id) {
            $query->with(['Parent', 'Products' => function ($query2) use ($id) {
                $query2->whereNot('products.id', $id);
            }])->withCount('Products');
        }])->get();
        $Categories = Category::whereNull('parent_id')->with(['children' => function ($query) {
            $query->with(['Products', 'Parent'])->withCount('Products');
        }])->get();

        $Colors = Color::Active()->get();

        return view('product::products.edit', compact('Product', 'Categories', 'ProductItems'));
    }


    public function update(ProductRequest $request, $id)
    {
        $Product = Product::where('id', $id)->firstOrFail();
        $Product->update($request->only('title_ar', 'title_en', 'short_desc_ar', 'short_desc_en', 'long_desc_ar', 'long_desc_en', 'price', 'discount_from', 'discount_to', 'discount_value', 'material', 'VAT'));
        $Product->update(['quantity' => $request->product_quantity]);

        $this->store_update($id, $request);

        alert()->success(__('trans.updatedSuccessfully'));

        return redirect()->back();
    }


    public function destroy($id)
    {
        $Product = Product::where('id', $id)->delete();
    }

    public function gallery(Request $request, $product_id, $color_id = null)
    {
        $Product = Product::with(["Gallery" => function ($q) use ($color_id) {
            $q->where('color_id', $color_id);
        }])->where('id', $product_id)->firstOrFail();

        if ($color_id) {
            $Color = Color::find($color_id);
            return view('product::products.gallery', compact('Product', 'Color'));
        } else {
            $Colors = Color::whereIn('id', function ($query) use ($Product) {
                $query->select('color_id')
                    ->from('product_item')
                    ->where('product_id', $Product->id)
                    ->get();
            })->get();

            return view('product::products.gallery', compact('Product', 'Colors'));
        }
    }


    public function post_gallery(Request $request)
    {

        $Product = Product::where('id', request('product_id'))->firstorfail();
        $product_item = ProductItem::where('product_id', request('product_id'))
            ->where('color_id', request('color_id'))->first();
        // test

        if ($request->old_gallery) {
            Upload::deleteImages($Product->Gallery()->where('color_id', request('color_id'))->whereNotIn('image', $request->old_gallery)->pluck('image')->toarray());
            $Product->Gallery()->where('color_id', request('color_id'))->whereNotIn('image', $request->old_gallery)->delete();
        }


        if ($request->hasFile('header')) {
            $galleryImage = $Product->Gallery()->where('color_id', request('color_id'))->first();

            if ($galleryImage) {
                Upload::deleteImages([$galleryImage->image]);
            }

            // Use the updateOrCreate method only if $galleryImage is not null
            if ($galleryImage) {
                $galleryImage->update([
                    'image' => Upload::UploadFile($request->header, 'Products'),
                ]);
            } else {
                // If $galleryImage is null, create a new gallery image
                $Product->Gallery()->create([
                    'color_id' => request('color_id'),
                    'image' => Upload::UploadFile($request->header, 'Products'),
                ]);
            }
        }

        if ($request->gallery) {
            foreach ($request->gallery as $gallery) {
                $Product->Gallery()->create([
                    'color_id' => request('color_id'),
                    'image' => Upload::UploadFile($gallery, 'Products'),
                ]);
            }
        }

        $product_item_gallery = $Product->Gallery()->where('color_id', request('color_id'))->first();
        $product_item->update(['gallery_id' => $product_item_gallery->id]);
        // dd($product_item_gallery);

        alert()->success(__('trans.updatedSuccessfully'));

        return back();
    }



    public function store_update($id, Request $request)
    {
        $Product = Product::where('id', $id)->first();

        $Product->Items()->delete();
        $colors = $request->colors;
        $parentSizes = $request->parent_sizes;
        $subSizes = $request->sub_sizes;
        $quantities = $request->quantity;
        // $galleryIds = $request->gallery_ids;
        $productColorSizes = [];
        foreach ($colors as $index => $colorId) {
            $productColorSizes[] = [
                'color_id' => $colorId,
                'parent_size_id' => $parentSizes[$index],
                'size_id' => $subSizes[$index],
                'quantity' => $quantities[$index],
                // 'gallery_id' => $galleryIds[$index],
            ];
        }
        $Product->Items()->createMany($productColorSizes);


        // if no children take the parent
        // Check if $request->categories is empty or contains only null values
        if (!isset($request->categories) || empty(array_filter($request->categories))) {
            // Use $request->categoryParent_id as the category ID
            $categoryIds = $request->categoryParent_id;
        } else {
            // Use $request->categories as the category ID
            $categoryIds = $request->categories;
        }
        $Product->Categories()->sync(array_filter((array) $categoryIds));


        if ($request->old_gallery) {
            Upload::deleteImages($Product->Gallery()->whereNotIn('image', $request->old_gallery)->pluck('image')->toarray());
            $Product->Gallery()->whereNotIn('image', $request->old_gallery)->delete();
        }


        if ($request->hasFile('header')) {
            $galleryImage = $Product->Gallery()->first();

            if ($galleryImage) {
                Upload::deleteImages([$galleryImage->image]);
            }

            // Use the updateOrCreate method only if $galleryImage is not null
            if ($galleryImage) {
                $galleryImage->update([
                    'image' => Upload::UploadFile($request->header, 'Products'),
                ]);
            } else {
                // If $galleryImage is null, create a new gallery image
                $Product->Gallery()->create([
                    'image' => Upload::UploadFile($request->header, 'Products'),
                ]);
            }
        }

        if ($request->gallery) {
            foreach ($request->gallery as $gallery) {
                $Product->Gallery()->create([
                    'image' => Upload::UploadFile($gallery, 'Products'),
                ]);
            }
        }
    }


    /*** To change product(product) to most_popular or not ***/
    public function changeMostPopular(Product $product)
    {
        if ($product->most_popular == '1') {
            $new_most_popular = '0';
        } else {
            $new_most_popular = '1';
        }

        $product->update(['most_popular' => $new_most_popular]);

        return response()->json(['most_popular' => $product->most_popular]);
    }


    /*** Get subCategories by ajax ***/
    public function getSubSizes(Request $request)
    {
        $parentSizeId = $request->input('parent_size_id');
        $subSizes = Size::where('parent_id', $parentSizeId)->get();

        return response()->json($subSizes);
    }
} //end of class
