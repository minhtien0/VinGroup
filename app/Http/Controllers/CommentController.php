<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CommentController extends Controller
{
    // Hiển thị danh sách bình luận
    public function index()
    {
        // Lấy tất cả bình luận từ bảng `comment`
        $comments = DB::table('comment')->orderBy('id', 'desc')->get();

        // Gắn thêm danh sách ảnh từ bảng `img_comment` cho từng bình luận
        // Mỗi $comment là một stdClass -> có thể dùng map()
        $comments->transform(function ($cmt) {
            $cmt->images = DB::table('img_comment')
                ->where('binhluan', $cmt->id)
                ->get(); // Lấy tất cả ảnh của bình luận
            return $cmt;
        });

        return view('admin.comments.index', compact('comments'));
    }

    // Xoá bình luận
    public function destroy($id)
    {
        // Xoá ảnh liên quan trong bảng img_comment
        DB::table('img_comment')->where('binhluan', $id)->delete();

        // Xoá bình luận trong bảng comment
        DB::table('comment')->where('id', $id)->delete();

        return redirect()->route('comments.index')
            ->with('success', 'Xóa bình luận thành công!');
    }
}
