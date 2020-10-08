<?php

namespace App\Http\Controllers;

use App\Faq;
use App\Message;
use App\Portfolio;
use App\Subscirber;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index ()
    {
        $faqs = Faq::all();
        $portfolios = Portfolio::all();
        foreach ($portfolios as $portfolio) {
            $portfolio->images = json_decode($portfolio->images);
        }
        return view('frontend.index', compact('portfolios', 'faqs'));
    }

    public function portfolio ($id)
    {
        $portfolio = Portfolio::find($id);
        $portfolio->images = json_decode($portfolio->images);
        return view('frontend.portfolio', compact('portfolio'));
    }

    public function subscriberstore ()
    {
        $data = request()->validate([
            'email' => 'required|email',
            'status' => ''
        ]);
        Subscirber::create($data);
        return redirect()->back()->with('subscribe_success', 'You are now Subscribed.');
    }

    public function messagestore ()
    {
        $data = request()->validate([
            'name'      => 'required',
            'email'     => 'required|email',
            'subject'   => 'required',
            'message'   => 'required'
        ]);
        Message::create($data);
        return redirect()->back()->with('success', 'Message Send Succesfully');
    }
}
