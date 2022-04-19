<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SliderRequest;
use App\Models\Slider;
use App\Services\ImageService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SliderController extends Controller
{
    public function __invoke()
    {
        $sliders = Slider::where('user_id',Auth::id())
            ->orderBy('order')
            ->get();

        return view('admin.slider.index',compact('sliders'));
    }

    public function edit(Slider $slider)
    {
        return view('admin.slider.edit',compact('slider'));
    }

    public function update(Request $request, Slider $slider)
    {
        try {
            $slider->update($request->all());
            return redirect()->back()->with('success','Slider actualizado con exito');
        } catch (\Throwable $th) {
            return redirect()->back()->with('warning','Ha ocurrido un error');
        }
    }

    public function destroy(Slider $slider, ImageService $imageService)
    {
        try {
            $imageService->deleteImage($slider->image);
            $slider->delete();
            return redirect()->back()->with('success','Slider actualizado con exito');
        } catch (\Throwable $th) {
            return redirect()->back()->with('warning','Ha ocurrido un error');
        }
    }

    public function store(SliderRequest $request, ImageService $imageService)
    {
        try {
            if($request->has('image')){
                $path = $imageService->saveImageSlider($request->file('image'));
            }
            $userId = Auth::id();
            Slider::create([
                'name' => $request->name,
                'visible' => $request->visible,
                'content' => $request->content,
                'order' => $request->order,
                'image' => $path,
                'user_id' => $userId
            ]);

            return redirect()->back()->with('success','Slider guardado con exito');
        } catch (\Throwable $th) {
            return redirect()->back()->with('warning','Ha ocurrido un error');
        }
    }
}
