<?php

namespace App\Http\Controllers;

use App\Faq;
use App\Message;
use App\Subscirber;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('backend.home');
    }

    public function faqindex ()
    {
        $faqs = Faq::all();
        return view('backend.faq', compact('faqs'));
    }

    public function faqstore()
    {
        $data = request()->validate([
            'question' => 'required',
            'answer'   => 'required',
        ]);
        Faq::create($data);
        return redirect()->back()->with('success', 'FAQ Added Successfully');
    }

    public function faqedit(Request $request)
    {
        $data = request()->validate([
            'question' => 'required',
            'answer'   => 'required',
        ]);
        Faq::where('id', $request->id)->update($data);
        return redirect()->back()->with('success', 'FAQs Updated Successfully');
    }

    public function faqdestroy($id)
    {
        Faq::where('id', $id)->delete();
        return redirect()->back()->with('success', 'FAQs Deleted Successfully.');
    }

    public function subscriber ()
    {
        $subscribers = Subscirber::all();
        foreach ($subscribers as $subscriber) {
            if ($subscriber->status == 1) {
                $subscriber->status = "Subscribed";
            } else {
                $subscriber->status = "Unsubscribed";
            }
        }
        return view('backend.subscriber', compact('subscribers'));
    }

    public function messageindex ()
    {
        $messages = Message::all();
        return view('backend.message', compact('messages'));
    }
}
