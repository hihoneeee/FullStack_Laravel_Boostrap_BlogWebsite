<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Post;
use App\Models\Category;
use App\Models\Person;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redirect;

class PostController extends Controller
{
    public function generateTableOfContents($content)
    {
        $dom = new \DOMDocument();
        // Cài đặt mã hóa UTF-8 cho DOMDocument
        $dom->encoding = 'utf-8';

        // Sử dụng 'loadHTML' với tùy chọn LIBXML_HTML_NOIMPLIED để loại bỏ thẻ doctype và doctype declaration
        // Điều này giúp tránh việc thêm thẻ html, head và body tự động bởi DOMDocument.
        @$dom->loadHTML($content, LIBXML_HTML_NOIMPLIED);

        $toc = '<ul>';
        $previousLevel = 1;

        $elements = $dom->getElementsByTagName('*');

        foreach ($elements as $element) {
            if (preg_match('/h[1-6]/i', $element->nodeName)) {
                $currentLevel = (int)str_replace('h', '', strtolower($element->nodeName));

                if ($currentLevel > $previousLevel) {
                    for ($i = $previousLevel + 1; $i <= $currentLevel; $i++) {
                        $toc .= '<ul>';
                    }
                } elseif ($currentLevel < $previousLevel) {
                    for ($i = $currentLevel + 1; $i <= $previousLevel; $i++) {
                        $toc .= '</ul>';
                    }
                }

                // Sử dụng hàm htmlspecialchars để tránh mã hóa ký tự HTML đặc biệt
                $id = htmlspecialchars($element->nodeValue);
                $toc .= "<li><a href='#$id'>$id</a></li>";
                $previousLevel = $currentLevel;
            }
        }

        $toc .= '</ul>';

        return $toc;
    }
    // update post hot bang ajax
    public function select_post_hot(Request $request){
        $data = $request -> all();
        $post = post::find($data['post_id']);
        $post -> post_hot = $data['post_hot'];
        $post->save();
    }
    // update category bang ajax
    public function select_category(Request $request){
        $data = $request -> all();
        $post = Post::find($data['post_id']);
        $post -> category_id = $data['category_id'];
        $post->save();
    }

    // update anh bang ajax
    public function update_image_post_ajax(Request $request){
        $get_image = $request -> file('file');
        $post_id = $request -> post_id;

        if($get_image){
            // xoa anh cu
            $post = Post::find($post_id);
            unlink('uploads/post/'.$post->image);

            // them anh moi
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('uploads/post/',$new_image);
            $post->image = $new_image;
            $post->save();
        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list = Post::with('category','person')->orderBy('date_update', 'DESC')->get();
        $category = Category::pluck('title','id');
        $person = Person::pluck('name','id');
        return view('admincp.post.index',compact('list', 'category', 'person'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::pluck('title', 'id');
        $person = person::pluck('name', 'id');
        return view('admincp.post.form',compact('person','category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request -> all();
        $post = new post();
        $post->title = $data['title'];
        $post->slug = $data['slug'];
        $post->description = $data['description'];
        $post->meta = $data['meta'];
        $post->status = $data['status'];
        $post->tags = $data['tags'];
        $post->category_id = $data['category_id'];
        $post->person_id = $data['person_id'];
        $post->date_create = Carbon::now('Asia/Ho_Chi_Minh');
        $post->date_update = Carbon::now('Asia/Ho_Chi_Minh');

        $get_image = $request->file('image');
        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_image = $name_image.rand(0,9999).'.'.$get_image->getClientOriginalExtension();
            $get_image -> move('uploads/post/', $new_image);
            $post->image = $new_image;
        }
        $post->save();
        toastr()->success('Thành Công','Thêm bài viết thành công');
        return redirect()->route('post.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = post::find($id);
        $category = Category::pluck('title', 'id');
        $person = person::pluck('name', 'id');
        return view('admincp.post.form',compact('post','category','person'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request -> all();
        $post = post::find($id);

        $post->title = $data['title'];
        $post->slug = $data['slug'];
        $post->description = $data['description'];
        $post->status = $data['status'];
        $post->meta = $data['meta'];
        $post->category_id = $data['category_id'];
        $post->person_id = $data['person_id'];
        $post->tags = $data['tags'];
        $post->date_update = Carbon::now('Asia/Ho_Chi_Minh');

        $get_image = $request->file('image');
        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_image = $name_image.rand(0,9999).'.'.$get_image->getClientOriginalExtension();
            $get_image -> move('uploads/person/', $new_image);
            $post->image = $new_image;
        }
        $post->save();
        toastr()->success('Thành Công','Thêm bài viết thành công');
        return redirect()->route('post.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        //xoa anh
        if(file_exists('uploads/post/'.$post->image)){
            unlink('uploads/post/'.$post->image);
        }
        $post->delete();
        toastr()->success('Thành Công','Xóa bài viết thành công');
        return redirect()->back();
    }
}