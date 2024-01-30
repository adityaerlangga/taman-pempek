<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\ProductCategory;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    // === START => LIST: FAST REPLACE TEXT ===
    // PRODUCT
    // Product
    // product
    // products
    // Produk
    // === END => LIST: FAST REPLACE TEXT ===

    private $photo_folder = "products";

    public function index()
    {
        $products = Product::where("product_is_deleted", 0)->get();

        return view("admin.products.index", compact('products'));
    }

    public function create()
    {
        $product_categories = ProductCategory::where("product_category_is_deleted", 0)->get();
        $data = [
            "product_categories" => $product_categories,
        ];
        return view("admin.products.create", $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            "product_category_code" => "required|max:255",
            "product_name" => "required|max:255",
            "product_price" => "required|numeric",
            "product_stock" => "required|numeric",
        ]);

        DB::beginTransaction();
        try {
            $product_code = generateFiledCode("PRODUCT");
            $photo_code = $request->product_image != null ? 'PRODUCT_IMG' : 'PRODUCT_IMG_AVATAR';

            $photoName = $this->photo_folder . "/" . generateFiledCode($photo_code) . ".jpg";
            $product_image_base64 = $request->input('product_image') ?? createAvatar($request->product_name);

            $product_image_substr = substr($product_image_base64, strpos($product_image_base64, ",") + 1);
            $image = base64_decode($product_image_substr);
            Storage::disk('public')->put($photoName, $image);

            Product::create([
                "product_code" => $product_code,
                "product_category_code" => $request->product_category_code,
                "product_name" => $request->product_name,
                "product_price" => $request->product_price,
                "product_stock" => $request->product_stock,
                "product_image" => $photoName,
                "product_description" => $request->product_description ?? null,
            ]);

            DB::commit();
            return redirect()->to('/products')->with('success', 'Produk berhasil ditambahkan');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Produk gagal ditambahkan! => ' . $e->getMessage());
        }
    }

    public function edit(string $product_code)
    {
        $product = Product::where("product_code", $product_code)
            ->where("product_is_deleted", 0)
            ->first();

        $product_categories = ProductCategory::where("product_category_is_deleted", 0)->get();

        $data = [
            "product" => $product,
            "product_categories" => $product_categories,
        ];

        if (!$product) {
            return redirect()->back()->with('error', 'Produk tidak ditemukan');
        }

        return view("admin.products.edit", $data);
    }

    public function update(Request $request)
    {
        $request->validate([
            "product_code" => "required|max:255",
            "product_category_code" => "required|max:255",
            "product_name" => "required|max:255",
            "product_price" => "required|numeric",
            "product_stock" => "required|numeric",
        ]);

        DB::beginTransaction();
        try {
            $product_code = $request->product_code;
            $product = Product::where("product_code", $product_code)
                ->where("product_is_deleted", 0)
                ->first();

            $photo_code = $request->product_image != null ? 'PRODUCT_IMG' : 'PRODUCT_IMG_AVATAR';

            $old_image = $product->product_image;
            $isOldImageAvatar = strpos($old_image, 'AVATAR');
            $photoName = $request->product_image == null && !$isOldImageAvatar ? $old_image : $this->photo_folder . "/" . generateFiledCode($photo_code) . ".jpg";

            $newImage = false;
            if ($request->product_image != null) {
                $product_image_base64 = $request->input('product_image');
                $newImage = true;
            } elseif ($request->product_image == null && $isOldImageAvatar) {
                $product_image_base64 = createAvatar($request->product_name);
                $newImage = true;
            }

            if ($newImage) {
                $product_image_substr = substr($product_image_base64, strpos($product_image_base64, ",") + 1);
                $image = base64_decode($product_image_substr);
                Storage::disk('public')->put($photoName, $image);
            } else {
                $photoName = $old_image;
            }

            $product->update([
                "product_category_code" => $request->product_category_code,
                "product_name" => $request->product_name,
                "product_price" => $request->product_price,
                "product_stock" => $request->product_stock,
                "product_image" => $photoName,
                "product_description" => $request->product_description ?? null,
            ]);

            DB::commit();
            return redirect()->to('/products')->with('success', 'Produk berhasil diperbarui');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Produk gagal diperbarui! => ' . $e->getMessage());
        }
    }

    public function delete(string $product_code)
    {
        $data = Product::where("product_code", $product_code)
            ->where("product_is_deleted", 0)
            ->first();

        if (!$data) {
            return redirect()->back()->with('error', 'Produk tidak ditemukan');
        }

        DB::beginTransaction();
        try {
            $data->update([
                "product_is_deleted" => 1,
            ]);

            DB::commit();
            return redirect()->back()->with('success', 'Produk berhasil dihapus');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Produk gagal dihapus! => ' . $e->getMessage());
        }
    }
}
