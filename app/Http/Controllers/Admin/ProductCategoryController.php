<?php

namespace App\Http\Controllers\Admin;

use App\Models\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;

class ProductCategoryController extends Controller
{
    // === START => LIST: FAST REPLACE TEXT ===
    // PRODUCT_CATEGORY
    // ProductCategory
    // product_category
    // product_categories
    // === END => LIST: FAST REPLACE TEXT ===

    private $photo_folder = "product_categories";

    public function index()
    {
        $product_categories = ProductCategory::where("product_category_is_deleted", 0)->get();

        return view("admin.product_categories.index", compact('product_categories'));
    }

    public function create()
    {
        return view("admin.product_categories.create");
    }

    public function store(Request $request)
    {
        $request->validate([
            "product_category_name" => "required|max:255",
        ]);

        DB::beginTransaction();
        try {
            $product_category_code = generateFiledCode("PRODUCT_CATEGORY");
            $photo_code = $request->product_category_image != null ? 'PRODUCT_CATEGORY_IMG' : 'PRODUCT_CATEGORY_IMG_AVATAR';

            $photoName = $this->photo_folder . "/" . generateFiledCode($photo_code) . ".jpg";
            $product_category_image_base64 = $request->input('product_category_image') ?? createAvatar($request->product_category_name);

            $product_category_image_substr = substr($product_category_image_base64, strpos($product_category_image_base64, ",") + 1);
            $image = base64_decode($product_category_image_substr);
            Storage::disk('public')->put($photoName, $image);

            ProductCategory::create([
                "product_category_code" => $product_category_code,
                "product_category_name" => $request->product_category_name,
                "product_category_image" => $photoName,
                "product_category_description" => $request->product_category_description ?? null,
            ]);

            DB::commit();
            return redirect()->to('/product_categories')->with('success', 'Product Category successfully added');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Kategori Produk gagal ditambahkan! => ' . $e->getMessage());
        }
    }

    public function edit(string $product_category_code)
    {
        $product_category = ProductCategory::where("product_category_code", $product_category_code)
            ->where("product_category_is_deleted", 0)
            ->first();

        if (!$product_category) {
            return redirect()->back()->with('error', 'Kategori Produk tidak ditemukan');
        }

        return view("admin.product_categories.edit", compact('product_category'));
    }

    public function update(Request $request)
    {
        $request->validate([
            "product_category_name" => "required|max:255",
        ]);

        DB::beginTransaction();
        try {
            $product_category_code = $request->product_category_code;
            $product_category = ProductCategory::where("product_category_code", $product_category_code)
                ->where("product_category_is_deleted", 0)
                ->first();

            $photo_code = $request->product_category_image != null ? 'PRODUCT_CATEGORY_IMG' : 'PRODUCT_CATEGORY_IMG_AVATAR';

            $old_image = $product_category->product_category_image;
            $isOldImageAvatar = strpos($old_image, 'AVATAR');
            $photoName = $request->product_category_image == null && !$isOldImageAvatar ? $old_image : $this->photo_folder . "/" . generateFiledCode($photo_code) . ".jpg";

            $newImage = false;
            if ($request->product_category_image != null) {
                $product_category_image_base64 = $request->input('product_category_image');
                $newImage = true;
            } elseif ($request->product_category_image == null && $isOldImageAvatar) {
                $product_category_image_base64 = createAvatar($request->product_category_name);
                $newImage = true;
            }

            if ($newImage) {
                $product_category_image_substr = substr($product_category_image_base64, strpos($product_category_image_base64, ",") + 1);
                $image = base64_decode($product_category_image_substr);
                Storage::disk('public')->put($photoName, $image);
            } else {
                $photoName = $old_image;
            }

            $product_category->update([
                "product_category_name" => $request->product_category_name,
                "product_category_image" => $photoName,
                "product_category_description" => $request->product_category_description ?? null,
            ]);

            DB::commit();
            return redirect()->to('/product_categories')->with('success', 'Kategori Produk berhasil diperbarui');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Kategori Produk gagal diperbarui! => ' . $e->getMessage());
        }
    }

    public function delete(string $product_category_code)
    {
        $data = ProductCategory::where("product_category_code", $product_category_code)
            ->where("product_category_is_deleted", 0)
            ->first();

        if (!$data) {
            return redirect()->back()->with('error', 'Kategori Produk tidak ditemukan');
        }

        DB::beginTransaction();
        try {
            $data->update([
                "product_category_is_deleted" => 1,
            ]);

            DB::commit();
            return redirect()->back()->with('success', 'Kategori Produk berhasil dihapus');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Kategori Produk gagal dihapus! => ' . $e->getMessage());
        }
    }
}
