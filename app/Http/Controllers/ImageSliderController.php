<?php

namespace App\Http\Controllers;

use App\Models\ImageSlider;
use Illuminate\Http\Request;

class ImageSliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "عکس های اسلایدر وبسایت";
        $imagesSlider = ImageSlider::orderBy('id', 'DESC')->get();
        return view('back.pages.imageSlider.imagesSlider', compact('title','imagesSlider'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "ساخت عکس های اسلایدر وبسایت";
        return view('back.pages.imageSlider.newImageSlider',compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'url' => ['required'],
            'image' => ['required'],
        ]);

        $article = ImageSlider::create($request->all());

        session()->flash('success', ' اسلاید با موفقیت ایجاد شد.');
        return redirect(route('imagesSlider.show.admin.panel'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ImageSlider  $imageSlider
     * @return \Illuminate\Http\Response
     */
    public function show(ImageSlider $imageSlider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ImageSlider  $imageSlider
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $imageSlider = ImageSlider::findOrFail($id);

        $title = "ویرایش عکس های اسلایدر وبسایت";
        return view('back.pages.imageSlider.editImageSlider', compact('imageSlider', 'title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ImageSlider  $imageSlider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $imageSlider = ImageSlider::findOrFail($id);

        $request->validate([
            'url' => ['required'],
            'alt' => ['required'],
        ]);

        $imageSlider->update($request->all());

        session()->flash('success', 'تغییرات با موفقیت انجام شد.');
        return redirect(route('imagesSlider.show.admin.panel'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ImageSlider  $imageSlider
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $imageSlider = ImageSlider::findOrFail($id);

        $imageSlider->delete();

        session()->flash('success', 'اسلاید با موفقیت حذف شد.');
        return redirect(route('imagesSlider.show.admin.panel'));
    }

    public function editStatus($id)
    {
        $imageSlider = ImageSlider::findOrFail($id);


        if ($imageSlider->status == 0) {
            $imageSlider->status = 1;
        }else{
            $imageSlider->status = 0;
        }

        $imageSlider->update();

        session()->flash('success', 'وضعیت با موفقیت تغییر کرد.');
        return redirect(route('imagesSlider.show.admin.panel'));
    }
}
