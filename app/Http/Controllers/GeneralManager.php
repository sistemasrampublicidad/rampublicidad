<?php

namespace App\Http\Controllers;

use App\Models\administrator\Brandings;
use App\Models\administrator\CommentsLogos;
use App\Models\administrator\DetailsLogos;
use App\Models\administrator\DetailsPlanners;
use App\Models\administrator\Logos;
use App\Models\administrator\Planners;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Response;

class GeneralManager extends Controller
{
    public function index(Request $request)
    {
        $customers = User::where('role_id', '=', 4)->paginate(10);
        return view('general_manager.index', compact('customers'));
    }

    public function show($id)
    {
        $customer = User::where('id', '=', $id)->get()->toArray();
        $customer = $customer[0];

        return view('general_manager.show', compact('customer'));
    }

    public function show_logos($id)
    {
        $customer = User::where('id', '=', $id)->get()->toArray();
        $customer = $customer[0];
        $logos = Logos::join('details_logo', 'details_logo.logo_id', '=', 'logos.id')
            ->join('brandings', 'brandings.id', '=', 'details_logo.branding_id')
            ->where('customer_id', '=', $id)
            ->get()
            ->toArray();
        return view('general_manager.show_logos', compact('customer', 'logos'));
    }

    public function add_logo($id)
    {
        $customer = User::where('id', '=', $id)->get()->toArray();
        $customer = $customer[0];
        return view('general_manager.add_logo', compact('customer'));
    }

    public function store_logo(Request $request)
    {
        $logos = Logos::join('details_logo', 'details_logo.logo_id', '=', 'logos.id')
            ->join('brandings', 'brandings.id', '=', 'details_logo.branding_id')
            ->get()
            ->toArray();
        $customer = User::where('id', '=', $request->get('customer'))->get()->toArray();
        $customer = $customer[0];
        $logo = $request->file('image');
        $extension = $logo->getClientOriginalExtension();
        $logos = Logos::join('details_logo', 'details_logo.logo_id', '=', 'logos.id')
            ->join('brandings', 'brandings.id', '=', 'details_logo.branding_id')
            ->where('brandings.customer_id', '=', $request->get('customer'))
            ->get()
            ->toArray();
        $quantity_logos = count($logos) + 1;

        $filename = "cliente_" . $request->get('customer') . "_number" . $quantity_logos . "." . $extension;
        $logo->move('storage/administrator/uploads/logos/', $filename);

        $exist_branding = Brandings::where('customer_id', '=', $request->get('customer'))->get()->toArray();

        if (empty($exist_branding)) {
            $branding_save = new Brandings([
                'customer_id' => $request->get('customer')
            ]);
            $branding_save->save();

            $logo_save = new logos([
                'employee_id' => $request->get('employee'),
                'path' =>  $filename,
            ]);
            $logo_save->save();

            $details_logo = new DetailsLogos([
                'name' => $request->get('name'),
                'description' => $request->get('description'),
                'logo_id' => $logo_save['id'],
                'branding_id' => $branding_save['id'],
            ]);
            $details_logo->save();


            return redirect(route('show.logos', $request->get('customer')));
        } else {
            $logo_save = new logos([
                'employee_id' => $request->get('employee'),
                'path' => $filename,
            ]);
            $logo_save->save();
            $details_logo = new DetailsLogos([
                'logo_id' => $logo_save['id'],
                'branding_id' => $exist_branding[0]['id'],
                'name' => $request->get('name'),
                'description' => $request->get('description')
            ]);
            $details_logo->save();
            return redirect(route('show.logos', $request->get('customer')));

            //            return view('general_manager.show_logos',compact('customer','logos'))->with('success', 'Logo  guardado!');
        }
    }


    public function show_planners($id)
    {
        $customer = User::where('id', '=', $id)->first();
        $planners = Planners::join('details_planners', 'details_planners.planner_id', '=', 'planners.id')
            ->join('brandings', 'brandings.id', '=', 'details_planners.branding_id')
            ->where('customer_id', '=', $id)
            ->get()
            ->toArray();
        return view('general_manager.show_planners', compact('customer', 'planners'));
    }

    public function add_planner($id)
    {
        $customer = User::where('id', '=', $id)->first();
        return view('general_manager.add_planner', compact('customer'));
    }
    public function store_planner(Request $request)
    {

        $archivo_planner = $request->file('image');
        $extension = $archivo_planner->getClientOriginalExtension();

        $planners = Planners::join('details_planners', 'details_planners.planner_id', '=', 'planners.id')
            ->join('brandings', 'brandings.id', '=', 'details_planners.branding_id')
            ->where('brandings.customer_id', '=', $request->get('customer'))
            ->get()
            ->toArray();
        $quantity_planners = count($planners) + 1;

        $filename = "cliente_" . $request->get('customer') . "_number" . $quantity_planners . "." . $extension;
        $archivo_planner->move('storage/administrator/uploads/planners/', $filename);

        $exist_branding = Brandings::where('customer_id', '=', $request->get('customer'))->get()->toArray();
        if (empty($exist_branding)) {
            $branding_save = new Brandings([
                'customer_id' => $request->get('customer')
            ]);
            $branding_save->save();

            $planner_save = new Planners([
                'employee_id' => $request->get('employee'),
                'path' => $filename,
            ]);
            $planner_save->save();

            $details_planner = new DetailsPlanners([
                'name' => $request->get('name'),
                'description' => $request->get('description'),
                'planner_id' => $planner_save['id'],
                'branding_id' => $branding_save['id'],
            ]);
            $details_planner->save();


            return redirect(route('show.planners', $request->get('customer')));
        } else {
            $planner_save = new Planners([
                'employee_id' => $request->get('employee'),
                'path' => $filename,
            ]);
            $planner_save->save();

            $details_planner = new DetailsPlanners([
                'planner_id' => $planner_save['id'],
                'branding_id' => $exist_branding[0]['id'],
                'name' => $request->get('name'),
                'description' => $request->get('description')
            ]);


            $details_planner->save();

            return redirect(route('show.planners', $request->get('customer')));

            //            return view('general_manager.show_logos',compact('customer','logos'))->with('success', 'Logo  guardado!');
        }
    }

    public function show_all_logos()
    {
        $customer = User::where('id', '=', Auth()->id())->get()->toArray();
        $customer = $customer[0];
        $logos = Logos::join('details_logo', 'details_logo.logo_id', '=', 'logos.id')
            ->join('brandings', 'brandings.id', '=', 'details_logo.branding_id')
            ->where('status', '=', 'available')
            ->get()
            ->toArray();
        return view('general_manager.show_all_logos', compact('customer', 'logos'));
    }


    public function update_customer(Request $request)
    {
        $customer = User::where('id', '=', $request->get('customer_id'))->get()->toArray();
        $customer = $customer[0];

  

        if($request->file('avatar')){
            $logo = $request->file('avatar');
            $extension = $logo->getClientOriginalExtension();
            $filename = "cliente_" . $request->get('customer_id') . "logo." . $extension;
            $logo->move('storage/administrator/uploads/avatars/', $filename);
           
            $customer_update = User::where('id','=', $request->get('customer_id'))
            ->update([
                'name' => $request->get('name'),
                'document' => $request->get('ruc'),
                'email' => $request->get('email'),
                'name_representative' => $request->get('name_representative'),
                'phone_representative' => $request->get('phone_representative'),
                'avatar' =>  $filename,
                'password' =>Hash::make($request->get('password')),
                'website' => $request->get('website'),
                'facebook' => $request->get('facebook'),
                'instagram' => $request->get('instagram'),
                'linkendin' => $request->get('linkendin')
                ]);
    


        }else{
            $customer_update = User::where('id','=', $request->get('customer_id'))
            ->update([
                'name' => $request->get('name'),
                'document' => $request->get('ruc'),
                'email' => $request->get('email'),
                'name_representative' => $request->get('name_representative'),
                'phone_representative' => $request->get('phone_representative'),
                'website' => $request->get('website'),
                'facebook' => $request->get('facebook'),
                'password' =>Hash::make($request->get('password')),
                'instagram' => $request->get('instagram'),
                'linkendin' => $request->get('linkendin')
                ]);
            
        }

        return redirect(route('show.all_customers'));
    }
    public function store_customer(Request $request)
    {
        if($request->file('avatar')){
            $logo = $request->file('avatar');
            $extension = $logo->getClientOriginalExtension();
            $filename = "cliente_" . $request->get('customer_id') . "logo." . $extension;
            $logo->move('storage/administrator/uploads/avatars/', $filename);
           
            $new_customer = User::create([
                'name' => $request->get('name'),
                'document' => $request->get('ruc'),
                'email' => $request->get('email'),
                'name_representative' => $request->get('name_representative'),
                'phone_representative' => $request->get('phone_representative'),
                'avatar' =>$filename,
                'website' => $request->get('website'),
                'password' =>Hash::make($request->get('password')),
                'role_id' => 4,
                'facebook' => $request->get('facebook'),
                'instagram' => $request->get('instagram'),
                'linkendin' => $request->get('linkendin')
            ]);

            $new_customer->save();

        }else{

            $new_customer = User::create([
                'name' => $request->get('name'),
                'document' => $request->get('ruc'),
                'email' => $request->get('email'),
                'name_representative' => $request->get('name_representative'),
                'phone_representative' => $request->get('phone_representative'),
                'website' => $request->get('website'),
                'password' =>Hash::make($request->get('password')),
                'role_id' => 4,
                'facebook' => $request->get('facebook'),
                'instagram' => $request->get('instagram'),
                'linkendin' => $request->get('linkendin')
            ]);
            $new_customer->save();

        }

        return redirect(route('show.all_customers'));
    }

    public function show_all_customers()
    {
        $customer = User::where('id', '=', Auth()->id())->get()->toArray();
        $customer = $customer[0];


        $customers = User::where('status', '=', 'available')
            ->where('role_id', '=', '4')
            ->paginate(15);
        return view('general_manager.show_all_customers', compact('customer', 'customers'));
    }


    public function add_customer()
    {
        return view('general_manager.add_customer');
    }

    public function download($file_name) {
        $file_path = public_path('storage/administrator/uploads/logos/'.$file_name);
        return response()->download($file_path);
      }


      public function show_comments($id)
      {
          $customer = User::where('id', '=', auth()->user()->id)->get()->toArray();
          $customer = $customer[0];
          $logo = Logos::find($id);
  
          $comments = Logos::join('comments_logos', 'logos.id', '=', 'comments_logos.logo_id')
          ->join('users', 'comments_logos.commentator_id', '=', 'users.id')
              ->where('logos.id', '=', $id)
              ->get()
              ->toArray();
  
  // dd($comments);
  
          return view('general_manager.show_comments', compact('customer', 'comments','logo'));
      }
  


      public function store_comments_adm(Request $request)
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
