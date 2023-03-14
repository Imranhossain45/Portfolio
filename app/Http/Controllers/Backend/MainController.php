<?php

namespace App\Http\Controllers\Backend;

use App\Models\Main;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class MainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $activeMain = Main::where('status', 'publish')->get();
        $draftMain = Main::where('status', 'draft')->get();
        $trashMain = Main::onlyTrashed()->orderBy('id', 'desc')->get();
        return view('backend.service.index', compact('activeMain', 'draftMain', 'trashMain'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.main.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $photo = $request->file('photo');
        /* $resume = $request->file('resume'); */
        $request->validate([
            'sub_title' => 'required',
            'title'     => 'required',
            'photo'     => 'required|mimes:png,jpg,jpeg|max:2000',

        ]);

        if ($photo) {
            $photoName = uniqid() . '.' . $photo->getClientOriginalExtension();
            Image::make($photo)->save(public_path('storage/main/' . $photoName));
        }
        Main::create([
            'sub_title' => $request->sub_title,
            'title'     => $request->title,
            'photo'     => $photoName,

        ]);
        return back()->with('success', 'Main Section Added Successful!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Main  $main
     * @return \Illuminate\Http\Response
     */
    public function show(Main $main)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Main  $main
     * @return \Illuminate\Http\Response
     */
    public function edit(Main $main)
    {
        return view('backend.main.edit', compact('main'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Main  $main
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Main $main)
    {
        $photo = $request->file('photo');
        $request->validate([
            'sub_title' => 'required',
            'title'     => 'required',
            'photo'     => 'required|mimes:png,jpg,jpeg|max:2000',
        ]);
        if ($photo) {
            $path = public_path('storage/main/' . $main->photo);
            if (file_exists($path)) {
                unlink($path);
            }

            $photoName = uniqid() . '.' . $photo->getClientOriginalExtension();
            Image::make($photo)->save(public_path('storage/main/' . $photoName));
        }
        $main->sub_title = $request->sub_title;
        $main->sub_title = $request->sub_title;
        $main->photo     = $photoName;
        $main->save();

        return redirect(route('backend.main.index'))->with('success', 'Main Section Edited!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Main  $main
     * @return \Illuminate\Http\Response
     */
    public function destroy(Main $main)
    {
        //
    }
}
