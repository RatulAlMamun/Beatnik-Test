<?php

namespace App\Http\Controllers;

use App\Portfolio;
use App\Portfolioimage;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $portfolios = Portfolio::all();
        return view('backend.portfolio', compact('portfolios'));
    }

    public function store ()
    {
        $data = request()->validate([
            'name'          => 'required',
            'category'      => 'required',
            'client'        => 'required',
            'url'           => 'required|url',
            'description'   => 'required',
            'images'        => 'required|array|max:3|min:3',
            'images.*'      => 'mimes:jpeg,jpg,png',
        ]);
        foreach ($data['images'] as $image) 
        {
            $name = rand() . '.' . $image->getClientOriginalExtension();
            $image->move('uploads/', $name);
            $images[] = $name;
        }
        $data['images'] = json_encode($images);
        Portfolio::create($data);
        return redirect()->back()->with('success', 'Portfolio Added Successfully');
    }

    public function edit (Request $request)
    {
        $data = request()->validate([
            'name'          => 'required',
            'category'      => 'required',
            'client'        => 'required',
            'url'           => 'required|url',
            'description'   => 'required',
            'images'        => 'array|max:3|min:3',
            'images.*'      => 'mimes:jpeg,jpg,png',
        ]);
        $oldimages = json_decode($request->oldimages, true);
        if (isset($data['images'])) {
            foreach ($oldimages as $image) {
                unlink('uploads/' . $image);
            }
            foreach ($data['images'] as $image) {
                $name = rand() . '.' . $image->getClientOriginalExtension();
                $image->move('uploads/', $name);
                $images[] = $name;
            }
            $data['images'] = json_encode($images);
        } else {
            $data['images'] = $request->oldimages;
        }
        Portfolio::where('id', $request->id)->update($data);
        return redirect()->back()->with('success', 'Portfolio Updated Successfully');
    }

    public function destroy($id)
    {
        $portfolio = Portfolio::find($id);
        $images = json_decode($portfolio->images, true);
        foreach ($images as $image) {
            unlink('uploads/' . $image);
        }
        Portfolio::where('id', $id)->delete();
        return redirect()->back()->with('success', 'Portfolio Deleted Successfully.');
    }
}
