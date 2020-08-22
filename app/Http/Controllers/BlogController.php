<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use DataTables;
use App\Blog;

class BlogController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index','show']);
    }

    public function index(Blog $blog)
    {
        $blogs= Blog::all();

        return view('blog.index',compact('blogs','blog'));
    } 

    public function create(Blog $blog)
    {
        return view('blog.create',compact('blog'));
    }

    public function store(Request $request)
    {
        $blog = Blog::create($this->validatedData());
        $this->updateImage($blog);
        return redirect('/bloglist');
    }

    public function show(Blog $blog)
    {
        return view('blog.show',compact('blog'));
    }

    public function edit(Blog $blog)
    {
        return view('blog.edit',compact('blog'));
    }

    public function update(Blog $blog)
    {
        $blog->update($this->validatedData());
        $this->updateImage($blog);
        return redirect('/bloglist'.$blog->id);
    }

    public function destroy(Blog $blog)
    {
        $blog->delete();
        return redirect('/bloglist');            
    }

    private function validatedData()
    {
        return request()->validate([
            'title'=>'required|Min:3',   
            'description'=>'required',
            'subtitle' => ''
        ]);
    }

    private function updateImage($blog)
    {
        if(request()->hasfile('image'))
        {
            request()->validate([
            'image' => 'file|image|max:15000'
            ]);
        }
        if(request()->has('image'))
        {
            $file = request()->image;
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('uploads/blogs/',$filename);
            $blog->update([
                'image' => $filename
            ]);
            
        }
    }
}
