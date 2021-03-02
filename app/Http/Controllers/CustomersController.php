<?php

namespace App\Http\Controllers;

use App\Models\administrator\CommentsLogos;
use App\Models\administrator\CommentsPlanners;
use App\Models\administrator\Logos;
use App\Models\administrator\Planners;
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
            ->select('logos.*','logos.id as logo_id','details_logo.*','brandings.*')
            ->get()
            ->toArray();

        return view('customers.show_my_logos', compact('customer', 'logos'));
    }
    public function show_my_planners($id)
    {
        $customer = User::where('id', '=', $id)->get()->toArray();
        $customer = $customer[0];
        $planners = Planners::join('details_planners', 'details_planners.planner_id', '=', 'planners.id')
            ->join('brandings', 'brandings.id', '=', 'details_planners.branding_id')
            ->where('brandings.customer_id', '=', $id)
            ->where('planners.type_id', '<>', '3')
            ->select('planners.*','planners.id as planner_id','details_planners.*','brandings.*')
            ->get()
            ->toArray();
            

        return view('customers.show_my_planners', compact('customer', 'planners'));
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
    public function store_my_comments_post(Request $request)
    {
        $new_comment = CommentsPlanners::create([
            'planner_id' => $request->get('id_logo'),
            'type' => $request->get('type'),
            'comment' => $request->get('comment'),
            'commentator_id' => auth()->user()->id,
        ]);

        $new_comment->save();

        return back()->with('success','Se guardó el comentario');
    }
    public function show_imagen_modal(Request $request)
    {
        header('Content-Type: application/json');
        $id = $request->id;

        $logo = Logos::where('id','=',$id)->select('path')->first();
        return $logo->path;
    }

    public function show_planner_modal(Request $request)
    {
        header('Content-Type: application/json');
        $id = $request->id;

        $planner = Planners::where('id','=',$id)->select('path')->first();
        return $planner->path;
    }
}
