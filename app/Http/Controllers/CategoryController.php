<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
class CategoryController extends Controller
{
    public function search(Request $request)
    {
        $search = $request->input('search', '');

        // Lọc theo tên danh mục
        $categories = DB::table('categori')
    ->whereRaw("name REGEXP ?", [implode('.*', str_split($search))])
    ->get();

        $childCategories = DB::table('child_categori')
    ->whereRaw("name REGEXP ?", [implode('.*', str_split($search))])
    ->get();

        // Trả về dữ liệu HTML để hiển thị danh mục
        $html = '';

        // Duyệt qua các danh mục cha
        foreach ($categories as $category) {
            $html .= '<tr>';
            $html .= '<td>' . $category->id . '</td>';
            $html .= '<td>' . $category->name . '</td>';
            $html .= '<td>' . ($category->trangthai == 1 ? 'Hiển thị' : 'Ẩn') . '</td>';
            $html .= '<td>Không có</td>'; // Vì đây là danh mục cha, nên không có danh mục cha
            $html .= '<td>' . $category->time . '</td>';
            $html .= '<td>';
            $html .= '<a href="' . route('admin.danhmuc.category.edit', $category->id) . '" class="btn btn-warning btn-sm">Sửa</a> ';
            $html .= '<form action="' . route('admin.danhmuc.category.destroy', $category->id) . '" method="POST" style="display:inline;">';
            $html .= csrf_field() . method_field('DELETE');
            $html .= '<button type="submit" class="btn btn-link text-danger p-0 m-0 align-baseline" onclick="return confirm(\'Bạn có chắc chắn muốn xóa?\')">Xóa</button>';
            $html .= '</form>';
            $html .= '</td>';
            $html .= '</tr>';
        }

        // Duyệt qua các danh mục con
        foreach ($childCategories as $child) {
            $html .= '<tr>';
            $html .= '<td>' . $child->id . '</td>';
            $html .= '<td>' . $child->name . '</td>';
            $html .= '<td>' . ($child->trangthai == 1 ? 'Hiển thị' : 'Ẩn') . '</td>';

            // Lấy tên danh mục cha bằng cách sử dụng DB Facade
            $parentCategory = DB::table('categori')->where('id', $child->parent_id)->first();
            $html .= '<td>' . ($parentCategory ? $parentCategory->name : 'Không có') . '</td>'; // Hiển thị tên danh mục cha
            $html .= '<td>' . $child->created_at . '</td>';
            $html .= '<td>';
            $html .= '<a href="' . route('admin.danhmuc.category.edit', $child->id) . '" class="btn btn-warning btn-sm">Sửa</a> ';
            $html .= '<form action="' . route('admin.danhmuc.category.destroy', $child->id) . '" method="POST" style="display:inline;">';
            $html .= csrf_field() . method_field('DELETE');
            $html .= '<button type="submit" class="btn btn-link text-danger p-0 m-0 align-baseline" onclick="return confirm(\'Bạn có chắc chắn muốn xóa?\')">Xóa</button>';
            $html .= '</form>';
            $html .= '</td>';
            $html .= '</tr>';
        }

        // Trả về HTML
        return response()->json(['html' => $html]);
    }
    public function create()
    {
        $categories = DB::table('categori')->get();
        return view('admin.danhmuc.addcategory', compact('categories'));
    }
    public function add()
    {
        return view('admin.danhmuc.addcategory');
    }
    public function category()
    {
        $categories = DB::table('categori')->get(); // Danh mục cha
        $childCategories = DB::table('child_categori')->get(); // Danh mục con

        // Truyền dữ liệu vào view
        return view('admin.danhmuc.category', compact('categories', 'childCategories'));
    }
    public function edit($id)
    {
        // 1. Tìm danh mục trong bảng `categori` (cha)
        $category = DB::table('categori')->where('id', $id)->first();
        if ($category) {
            // Lấy thêm danh sách cha khác (để hiển thị selectbox nếu cần)
            $parentCategories = DB::table('categori')->where('id', '!=', $category->id)->get();

            // Trả về view CHO CHA
            return view('admin.danhmuc.editcategory', [
                'category' => $category,      // Danh mục cha đang sửa
                'parentCategories' => $parentCategories,
                // KHÔNG truyền childCategory ở đây
            ]);
        }

        // 2. Nếu không có trong categori -> tìm danh mục con
        $childCategory = DB::table('child_categori')->where('id', $id)->first();
        if (!$childCategory) {
            abort(404, 'Không tìm thấy danh mục.');
        }

        // Lấy danh sách cha để hiển thị
        $parentCategories = DB::table('categori')->get();

        // Trả về view CHO CON
        return view('admin.danhmuc.editcategory', ['childCategory' => $childCategory, 'parentCategories' => $parentCategories,]);
    }
    public function storeAjax(Request $request)
    {
        // Xác thực dữ liệu đầu vào
        $request->validate([
            'item_name' => 'required|string|max:255|unique:categori,name|unique:child_categori,name', // Kiểm tra tên danh mục có bị trùng hay không
            'status' => 'required|boolean',
            'parent_id' => 'nullable|integer|exists:categori,id', // Kiểm tra nếu có chọn danh mục cha
        ]);

        // Kiểm tra nếu có parent_id thì insert vào bảng child_categori
        if ($request->filled('parent_id')) {
            // Insert dữ liệu vào bảng child_categori
            DB::table('child_categori')->insert([
                'name' => $request->item_name,
                'trangthai' => $request->status,
                'parent_id' => $request->parent_id,
                'created_at' => now(),
            ]);
        } else {
            // Nếu không có parent_id, insert vào bảng categori
            DB::table('categori')->insert([
                'name' => $request->item_name,
                'trangthai' => $request->status,
                'time' => now(),
            ]);
        }

        // Trả về phản hồi JSON sau khi thành công
        return response()->json([
            'success' => true,
            'message' => 'Danh mục đã được thêm thành công',
            'redirect_url' => route('admin.danhmuc.category'),
        ]);
    }
    public function destroy($id)
{
    // Kiểm tra xem có phải danh mục cha không
    $category = DB::table('categori')->where('id', $id)->first();
    if ($category) {
        // Kiểm tra xem danh mục cha có chứa danh mục con không
        $hasChildren = DB::table('child_categori')->where('parent_id', $id)->exists();
        if ($hasChildren) {
            return redirect()->route('admin.danhmuc.category')->with('error', 'Không thể xóa danh mục vì có danh mục con liên kết.');
        }

        // Xóa danh mục cha
        DB::table('categori')->where('id', $id)->delete();
    } else {
        // Nếu không phải danh mục cha, kiểm tra danh mục con
        $childCategory = DB::table('child_categori')->where('id', $id)->first();
        if ($childCategory) {
            DB::table('child_categori')->where('id', $id)->delete();
        }
    }

    return redirect()->route('admin.danhmuc.category')->with('success', 'Danh mục đã được xóa thành công.');
}
    public function update(Request $request, $id)
    {
        // Xác thực dữ liệu
        $request->validate([
            'item_name' => 'required|string|max:255',
            'status' => 'required|boolean',
            'parent_id' => 'nullable|integer|exists:categori,id',
        ]);

        // Kiểm tra tên trùng (trừ chính bản ghi đang cập nhật)
        $existingCategory = DB::table('categori')
            ->where('name', $request->item_name)
            ->where('id', '!=', $id)
            ->first();

        $existingChildCategory = DB::table('child_categori')
            ->where('name', $request->item_name)
            ->where('id', '!=', $id)
            ->first();

        if ($existingCategory || $existingChildCategory) {
            // CHỈNH SỬA: Dùng session('popupError') để hiện popup
            return redirect()
                ->back()
                ->with('popupError', 'Tên danh mục đã tồn tại.')
                ->withInput();
        }

        // 1. Xác định xem ID này đang nằm ở bảng categori hay child_categori
        $category = DB::table('categori')->where('id', $id)->first();
        if ($category) {
            // ======= Đây là bản ghi Cha trong categori =======
            if ($request->filled('parent_id')) {
                // => Muốn biến danh mục này thành con
                DB::table('categori')->where('id', $id)->delete();
                DB::table('child_categori')->insert([
                    'name' => $request->item_name,
                    'trangthai' => $request->status,
                    'parent_id' => $request->parent_id,
                    'created_at' => now(),
                ]);
            } else {
                // Giữ nguyên là cha
                DB::table('categori')->where('id', $id)->update([
                    'name' => $request->item_name,
                    'trangthai' => $request->status,
                    'time' => now(),
                ]);
            }
        } else {
            // ======= Không tìm thấy trong categori => thử child_categori =======
            $childCategory = DB::table('child_categori')->where('id', $id)->first();
            if (!$childCategory) {
                abort(404, 'Danh mục không tồn tại.');
            }

            // Đây là danh mục con
            if (!$request->filled('parent_id')) {
                // => Muốn chuyển thành cha
                DB::table('child_categori')->where('id', $id)->delete();
                DB::table('categori')->insert([
                    'name' => $request->item_name,
                    'trangthai' => $request->status,
                    'time' => now(),
                ]);
            } else {
                // Vẫn là con => update
                DB::table('child_categori')->where('id', $id)->update([
                    'name' => $request->item_name,
                    'trangthai' => $request->status,
                    'parent_id' => $request->parent_id,
                    'created_at' => now(),
                ]);
            }
        }

        // CHỈNH SỬA: Dùng session('popupSuccess') để hiện popup thành công
        return redirect()->route('admin.danhmuc.category')->with('popupSuccess', 'Danh mục đã được cập nhật thành công!');
    }
}