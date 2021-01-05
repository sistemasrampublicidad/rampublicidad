<?php

namespace App\Http\Controllers;

use App\Models\administrator\CommentsLogos;
use App\Models\administrator\Logos;
use App\Models\User;
use Illuminate\Http\Request;

class CustomersController extends Controller
{
    public function index(Request $request)
    {
        return view('customers.index');
    }
    public function show_my_logos($id)
    {
        $customer = User::where('id', '=', $id)->get()->toArray();
        $customer = $customer[0];
        $logos = Logos::join('details_logo', 'details_logo.logo_id', '=', 'logos.id')
            ->join('brandings', 'brandings.id', '=', 'details_logo.branding_id')
            ->where('brandings.customer_id', '=', $id)
            ->get()
            ->toArray();

        return view('customers.show_my_logos', compact('customer', 'logos'));
    }
    public function show_comments($id)
    {

        $customer = User::where('id', '=', auth()->user()->id)->get()->toArray();
        $customer = $customer[0];
        $logo = Logos::find($id);

        $comments = Logos::join('comments_logos', 'logos.id', '=', 'comments_logos.logo_id')
        ->join('users', 'comments_logos.commentator_id', '=', 'users.id')
            ->where('logos.id', '=', $id)
            ->orderBy('comments_logos.id', 'asc')
            ->get()
            ->toArray();

// dd($comments);

        return view('customers.show_comments', compact('customer', 'comments','logo'));
    }


    public function store_comments(Request $request)
    {
        $new_comment = CommentsLogos::create([
            'logo_id' => $request->get('id_logo'),
            'type' => $request->get('type'),
            'comment' => $request->get('comment'),
            'commentator_id' => auth()->user()->id,
        ]);

        $new_comment->save();

        return back()->with('success','Se guardó el comentario');
    }


    
}
