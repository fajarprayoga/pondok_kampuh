<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Images;
use App\Models\Size;
use Illuminate\Support\Str;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

use function App\Helpers\rupiah;

class ProductController extends Controller
{
    public function index()
    {
        $product = Product::all();
        $category = Category::all();
        return view('product.index', ['categories' => $category, 'products' => $product, 'rupiah' => rupiah()]);
        // return dd($product);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:3|unique:products',
            'category' => 'required',
            'price' => 'required',
            'status' => 'required',
            'stock' => 'required',
            'description' => 'required|min:10|max:1000',
            'image' => 'required'
        ]);

        $product = Product::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'category_id' => $request->category,
            'price' => $request->price,
            'status' => $request->status,
            'stock' => $request->stock,
            'description' => $request->description,
        ]);

        if(!empty($product)){
            $size= Size::create([
                'name' => 'S',
                'product_id'=> $product->id,
                'stock' => $request->S == null ? 0 : $request->S
            ]); 
            $size= Size::create([
                'name' => 'M',
                'product_id'=> $product->id,
                'stock' => $request->M == null ? 0 : $request->M
            ]); 
            $size= Size::create([
                'name' => 'L',
                'product_id'=> $product->id,
                'stock' => $request->L == null ? 0 : $request->L
            ]); 
            $size= Size::create([
                'name' => 'XL',
                'product_id'=> $product->id,
                'stock' => $request->XL == null ? 0 : $request->XL
            ]); 
            $size= Size::create([
                'name' => 'AllSize',
                'product_id'=> $product->id,
                'stock' => $request->AllSize == null ? 0 : $request->AllSize
            ]); 
        }

        if(!empty($product)){
            $images = $request->image;
            $total_image =  count($request->image);
            for($i = 0 ; $i<$total_image; $i++){
                // menyimpan gambar ke dalam folder images-product bersifat public yang terletak di folder storage/app/public
                $image_path = $images[$i]->store('images-product', 'public');
                //menyimpan nama gambar ke dalam databse image product
                DB::insert('insert into images (product_id, name) values (?,?)', [$product->id, $image_path]);
            }
            return redirect()->back()->with('success', 'Product is Added'); 
        }
    }


    public function update(Request $request, $id)
    {
        // mencari product dengan id
        $product = Product::findOrfail($id);

        $this->validate($request, [
            'name' => 'required|min:3|unique:products,name,' . $id,
            'category' => 'required',
            'price' => 'required',
            'status' => 'required',
            'stock' => 'required',
            'description' => 'required|min:10|max:1000',
            // 'image' => 'required' 
        ]);

        $data = [
            "name" => $request->name,
            "category" => $request->category,
            "price" => $request->price,
            'stock' => ($request->S + $request->M + $request->L + $request->XL + $request->AllSize ),
            "description" => $request->description,
            "slug" => Str::slug($request->name),
            'status' => $request->status,
        ];

        if($request->image){

            $images = $request->image;
            $total_image =  count($request->image);
        
            // mengambil data gambar jika ada
            $image = Images::where('product_id', $product->id)->get();
            for ($i=0; $i < count($image); $i++) { 
                //hapus file gambar di dalam folder
                Storage::delete('public/'. $image[$i]->name);
                // hapus data gambar pada database
                $image[$i]->delete();
            }   

            // menyimpan data pada folder
            for($i = 0 ; $i<$total_image; $i++){
                //simpan cover di dalam folder book-covers dan bersifat public
                $image_path = $images[$i]->store('images-product', 'public');
                //simpan data cover kedalam model
                DB::insert('insert into images (product_id,name) values (?, ?)', [$product->id, $image_path]);
              }
        }

        $product->update($data);

        if(!empty($product)){
            $sizeS = Size::where('product_id', $product->id)->where('name', 'S')->first();
            $sizeS->update([
                'name' => 'S',
                'product_id'=> $product->id,
                'stock' => $request->S == null ? 0 : $request->S
            ]);

            $sizeM = Size::where('product_id', $product->id)->where('name', 'M')->first();
            $sizeM->update([
                'name' => 'M',
                'product_id'=> $product->id,
                'stock' => $request->M == null ? 0 : $request->M
            ]);

            $sizeL = Size::where('product_id', $product->id)->where('name', 'L')->first();
            $sizeL->update([
                'name' => 'L',
                'product_id'=> $product->id,
                'stock' => $request->L == null ? 0 : $request->L
            ]);

            $sizeXL = Size::where('product_id', $product->id)->where('name', 'XL')->first();
            $sizeXL->update([
                'name' => 'XL',
                'product_id'=> $product->id,
                'stock' => $request->XL == null ? 0 : $request->XL
            ]);

            $sizeAllSize = Size::where('product_id', $product->id)->where('name', 'AllSize')->first();
            $sizeAllSize->update([
                'name' => 'AllSize',
                'product_id'=> $product->id,
                'stock' => $request->AllSize == null ? 0 : $request->AllSize
            ]);
        }
        return redirect()->back()->with('success', 'Product is updated');
    }

    public function destroy($id)
    {
        $image = Images::where('product_id', $id)->get();
        for ($i=0; $i < count($image); $i++) { 
            //hapus file pada folder
            Storage::delete('public/'. $image[$i]->name);
            // hapus file yang tersimpan di database 
            $image[$i]->delete();
        }   
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect()->back()->with('success', 'Product is deleted');
    }
}
