<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Person;
use App\Models\Post;
use App\Models\Info;


class IndexController extends Controller
{

    public function timkiem(){
        if(isset($_GET['search'])){
        $search = $_GET['search'];
        $info = Info::find(1);
        $category = Category::orderBy('position', 'ASC')->where('status', 1)->get();
        $post = Post::orwhere('title','LIKE','%'.$search.'%')->orwhere('person_id','LIKE','%'.$search.'%')->orderBy('date_update','DESC')->paginate(10);
        $meta_title = 'Tìm kiếm: '.$search.' | Thông tin về '.$search;
        $meta_description = 'Tất cả những thông tin về từ khóa: '.$search;
        $meta_image = url('/uploads/logo.jpg');
        return view('pages.search', compact('search','category', 'info','meta_title', 'meta_description','meta_image', 'post'));
        }else{
            return redirect()->to('/');
        }
    }

    public function home(){
        $category = Category::orderBy('position', 'ASC')->where('status', 1)->get();
        $person = Person::all();
        $info = Info::find(1);

        $meta_image = url('/uploads/logo/'. $info->image);
        $meta_title = $info->title;
        $meta_description = $info->description;

        $post_new = Post::where('status',1)->orderBy('date_update', 'DESC')->paginate(1);

        $category_home = Category::with(['post' => function ($post) {
            $post->where('status', 1)->orderby('date_update', 'DESC');
        }])->orderBy('position', 'ASC')->get();
        return view('pages.home', compact('category_home','category','post_new','meta_image','meta_title','meta_description','info','person'));
    }

    public function category($slug){
        $cate_slug = Category::where('slug', $slug)->first();
        $category = Category::orderBy('position', 'ASC')->where('status', 1)->get();
        $info = Info::find(1);
        $meta_title = 'Danh bài viết '.$cate_slug->title.' mới nhất 2023';
        $meta_description = $cate_slug->description;
        $meta_image = url('/uploads/logo/logo902.jpg');

        $post = Post::where('category_id', $cate_slug->id)->orderBy('id','DESC')->paginate(10);
        return view('pages.category', compact('cate_slug', 'category', 'post','meta_image','meta_title','meta_description','info'));
    }

    public function post($slug, Request $request){
        $post = Post::with('category','person')->where('slug', $slug)->where('status', 1)->first();
        $person = Person::all();

        $info = Info::find(1);
        $meta_title = 'Bài viết '.$post->title;
        $meta_description = $post->description;
        $meta_image = url('/uploads/movie/'.$post->image);

        $category = Category::orderBy('position', 'ASC')->where('status', 1)->get();
        $related = post::with('category')->where('category_id', $post->category->id)->orderByRaw("RAND()")->whereNotIn('slug',[$slug])->paginate(2);
        return view('pages.post', compact('category','post','related','meta_image','meta_title','meta_description','info'));
    }

    public function mucluc($id){
        $post = Post::find($id);
        return view('pages.include.mucluc', compact('post'));
    }

    public function person($slug, Request $request){
        $person_slug = Person::where('slug', $slug)->first();
        $person = Person::all();
        $category = Category::orderBy('position', 'ASC')->where('status', 1)->get();

        $info = Info::find(1);
        $meta_title = 'Tác Giả '.$person_slug->name;
        $meta_description = $person_slug->description;
        $meta_image = url('/uploads/person/'.$person_slug->image);
        $post = Post::where('person_id', $person_slug->id)->orderBy('id','DESC')->paginate(10);
        return view('pages.person', compact('person_slug', 'person', 'post','meta_image','meta_title','meta_description','info','category'));
    }
}