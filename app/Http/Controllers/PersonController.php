<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Person;
use Illuminate\Support\Facades\Redirect;

class PersonController extends Controller
{
    // update anh bang ajax
    public function update_image_person_ajax(Request $request){
        $get_image = $request -> file('file');
        $person_id = $request -> person_id;

        if($get_image){
            // xoa anh cu
            $person = Person::find($person_id);
            unlink('uploads/person/'.$person->image);

            // them anh moi
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('uploads/person/',$new_image);
            $person->image = $new_image;
            $person->save();
        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list = Person::orderBy('id', 'DESC')->get();
        return view('admincp.person.index',compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admincp.person.form');

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
        $person = new Person();
        $person->name = $data['name'];
        $person->slug = $data['slug'];
        $person->description = $data['description'];

        $get_image = $request->file('image');
        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_image = $name_image.rand(0,9999).'.'.$get_image->getClientOriginalExtension();
            $get_image -> move('uploads/person/', $new_image);
            $person->image = $new_image;
        }
        $person->save();
        toastr()->success('Thành Công','Thêm thông tin người viết thành công');
        return redirect()->back();
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
        $person = Person::find($id);
        $list = Person::orderBy('id', 'DESC')->get();
        return view('admincp.person.form',compact('list','person'));
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
        $data = $request->all();
        $person = Person::find($id);
        $person->name = $data['name'];
        $person->slug = $data['slug'];
        $person->description = $data['description'];

        $get_image = $request->file('image');
        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_image = $name_image.rand(0,9999).'.'.$get_image->getClientOriginalExtension();
            $get_image -> move('uploads/person/', $new_image);
            $person->image = $new_image;
        }
        $person->save();
        toastr()->success('Thành Công','Sửa thông tin người viết thành công');
        return redirect()->route('person.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $person = Person::find($id);
        //xoa anh
        if(file_exists('uploads/person/'.$person->image)){
            unlink('uploads/person/'.$person->image);
        }
        $person->delete();
        toastr()->success('Thành Công','Xóa bài viết thành công');
        return redirect()->back();
    }
}