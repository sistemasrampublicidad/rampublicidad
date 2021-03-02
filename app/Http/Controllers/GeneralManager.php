<?php

namespace App\Http\Controllers;

use App\Models\administrator\Brandings;
use App\Models\administrator\CommentsLogos;
use App\Models\administrator\CommentsPlanners;
use App\Models\administrator\DetailsLogos;
use App\Models\administrator\Logos;
use App\Models\administrator\DetailsPlanners;
use App\Models\administrator\Planners;
use App\Models\administrator\TypesLogos;
use App\Models\administrator\TypesPlanners;
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
            ->select('logos.*', 'logos.id as logo_id', 'details_logo.*', 'brandings.*')
            ->get()
            ->toArray();
        return view('general_manager.show_logos', compact('customer', 'logos'));
    }

    public function edit_logo($id)
    {
        $logo = Logos::join('details_logo', 'details_logo.logo_id', '=', 'logos.id')
            ->join('brandings', 'brandings.id', '=', 'details_logo.branding_id')
            ->where('logos.id', '=', $id)
            ->select('logos.*', 'logos.id as logo_id', 'details_logo.*', 'brandings.*')
            ->get()
            ->toArray();
        $logo = $logo[0];

        $customer = User::where('id', '=', $logo['customer_id'])->get()->toArray();
        $customer = $customer[0];

        return view('general_manager.edit_logo',  compact('customer', 'logo'));
    }

    public function update_logo(Request $request)
    {
        $logo = Logos::where('id', '=', $request->get('logo_id'))->get()->toArray();
        $logo = $logo[0];
        if ($request->file('image')) {
            $image = $request->file('image');
            $image->move('storage/administrator/uploads/logos/', $logo['path']);
            $logo_update = Logos::where('logos.id', '=', $request->get('logo_id'))
                ->join('details_logo', 'details_logo.logo_id', '=', 'logos.id')
                ->update([
                    'name' => $request->get('name'),
                    'description' => $request->get('description'),
                ]);
        } else {
            $logo_update = Logos::where('logos.id', '=', $request->get('logo_id'))
                ->join('details_logo', 'details_logo.logo_id', '=', 'logos.id')
                ->update([
                    'name' => $request->get('name'),
                    'description' => $request->get('description'),
                ]);
        }
        return redirect(route('show.logos', $request->get('customer')));
    }
    public function delete_logo($id)
    {
        $logo = Logos::where('id', '=', $id)->delete();

        return back()->with('success', 'Se eliminó el logo');
    }

    public function add_logo($id)
    {
        $customer = User::where('id', '=', $id)->get()->toArray();
        $customer = $customer[0];
        $types = TypesLogos::all();

        return view('general_manager.add_logo', compact('customer', 'types'));
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
                'type_id' => $request->get('type_logo'),
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
                'type_id' => $request->get('type_logo'),
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
            ->where('planners.type_id', '<>', '3')

            ->get()
            ->toArray();
        return view('general_manager.show_planners', compact('customer', 'planners'));
    }

    public function show_planners_posts($id)
    {
        $customer = User::where('id', '=', $id)->first();
        $planners = Planners::join('details_planners', 'details_planners.planner_id', '=', 'planners.id')
            ->join('brandings', 'brandings.id', '=', 'details_planners.branding_id')
            ->where('customer_id', '=', $id)
            ->where('type_id', '3')
            ->get()
            ->toArray();
        $comments = Planners::join('comments_planners', 'planners.id', '=', 'comments_planners.planner_id')
            ->join('users', 'comments_planners.commentator_id', '=', 'users.id')
            ->join('details_planners', 'details_planners.planner_id', '=', 'planners.id')
            ->join('brandings', 'brandings.id', '=', 'details_planners.branding_id')
            ->where('brandings.customer_id', '=', $id)
            ->select('brandings.customer_id as customer', 'planners.*', 'comments_planners.*', 'users.*')
            ->get()
            ->toArray();
        return view('general_manager.show_planners_posts', compact('customer', 'planners', 'comments'));
    }

    public function show_my_planners_posts($id)
    {
        $customer = User::where('id', '=', $id)->first();
        $planners = Planners::join('details_planners', 'details_planners.planner_id', '=', 'planners.id')
            ->join('brandings', 'brandings.id', '=', 'details_planners.branding_id')
            ->where('customer_id', '=', $id)
            ->where('type_id', '3')
            ->get()
            ->toArray();
        $comments = Planners::join('comments_planners', 'planners.id', '=', 'comments_planners.planner_id')
            ->join('users', 'comments_planners.commentator_id', '=', 'users.id')
            ->join('details_planners', 'details_planners.planner_id', '=', 'planners.id')
            ->join('brandings', 'brandings.id', '=', 'details_planners.branding_id')
            ->where('brandings.customer_id', '=', $id)
            ->select('brandings.customer_id as customer', 'planners.*', 'comments_planners.*', 'users.*')
            ->get()
            ->toArray();
        return view('general_manager.show_my_planners_posts', compact('customer', 'planners', 'comments'));
    }


    public function add_posts($id)
    {
        $customer = User::where('id', '=', $id)->first();
        return view('general_manager.add_posts', compact('customer'));
    }

    public function add_calendar($id)
    {
        $customer = User::where('id', '=', $id)->first();
        $types = TypesPlanners::all();
        return view('general_manager.add_planner', compact('customer', 'types'));
    }

    public function add_publicity($id)
    {
        $customer = User::where('id', '=', $id)->first();
        $types = TypesPlanners::all();
        return view('general_manager.add_planner', compact('customer', 'types'));
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
                'type_id' => $request->get('type'),
                'path' => $filename,
                'created_at' => $request->get('datepicker-here-time'),
            ]);
            $planner_save->save();

            $details_planner = new DetailsPlanners([
                'name' => $request->get('name'),
                'idea' => $request->get('idea'),
                'description' => $request->get('description'),
                'post_reason' => $request->get('post_reason'),
                'platform' => $request->get('platform'),
                'caption' => $request->get('caption'),
                'extension' => $extension,

                'planner_id' => $planner_save['id'],
                'branding_id' => $branding_save['id'],
            ]);
            $details_planner->save();


            return redirect(route('show.planners', $request->get('customer')));
        } else {
            $planner_save = new Planners([
                'employee_id' => $request->get('employee'),
                'type_id' => $request->get('type'),
                'path' => $filename,
                'created_at' => $request->get('datepicker-here-time'),

            ]);
            $planner_save->save();

            $details_planner = new DetailsPlanners([
                'planner_id' => $planner_save['id'],
                'branding_id' => $exist_branding[0]['id'],
                'idea' => $request->get('idea'),
                'name' => $request->get('name'),
                'description' => $request->get('description'),
                'post_reason' => $request->get('post_reason'),
                'platform' => $request->get('platform'),
                'caption' => $request->get('caption'),
                'extension' => $extension,

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



        if ($request->file('avatar')) {
            $logo = $request->file('avatar');
            $extension = $logo->getClientOriginalExtension();
            $filename = "cliente_" . $request->get('customer_id') . "logo." . $extension;
            $logo->move('storage/administrator/uploads/avatars/', $filename);

            if ($request->get('password') == '') {
                $customer_update = User::where('id', '=', $request->get('customer_id'))
                    ->update([
                        'name' => $request->get('name'),
                        'document' => $request->get('ruc'),
                        'email' => $request->get('email'),
                        'name_representative' => $request->get('name_representative'),
                        'phone_representative' => $request->get('phone_representative'),
                        'avatar' =>  $filename,
                        'website' => $request->get('website'),
                        'facebook' => $request->get('facebook'),
                        'instagram' => $request->get('instagram'),
                        'linkendin' => $request->get('linkendin')
                    ]);
            } else {
                $customer_update = User::where('id', '=', $request->get('customer_id'))
                    ->update([
                        'name' => $request->get('name'),
                        'document' => $request->get('ruc'),
                        'email' => $request->get('email'),
                        'name_representative' => $request->get('name_representative'),
                        'phone_representative' => $request->get('phone_representative'),
                        'avatar' =>  $filename,
                        'password' => Hash::make($request->get('password')),
                        'website' => $request->get('website'),
                        'facebook' => $request->get('facebook'),
                        'instagram' => $request->get('instagram'),
                        'linkendin' => $request->get('linkendin')
                    ]);
            }
        } else {
            $customer_update = User::where('id', '=', $request->get('customer_id'))
                ->update([
                    'name' => $request->get('name'),
                    'document' => $request->get('ruc'),
                    'email' => $request->get('email'),
                    'name_representative' => $request->get('name_representative'),
                    'phone_representative' => $request->get('phone_representative'),
                    'website' => $request->get('website'),
                    'facebook' => $request->get('facebook'),
                    'password' => Hash::make($request->get('password')),
                    'instagram' => $request->get('instagram'),
                    'linkendin' => $request->get('linkendin')
                ]);
        }

        return redirect(route('show.all_customers'));
    }
    public function store_customer(Request $request)
    {
        if ($request->file('avatar')) {
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
                'avatar' => $filename,
                'website' => $request->get('website'),
                'password' => Hash::make($request->get('password')),
                'role_id' => 4,
                'facebook' => $request->get('facebook'),
                'instagram' => $request->get('instagram'),
                'linkendin' => $request->get('linkendin')
            ]);

            $new_customer->save();
        } else {

            $new_customer = User::create([
                'name' => $request->get('name'),
                'document' => $request->get('ruc'),
                'email' => $request->get('email'),
                'name_representative' => $request->get('name_representative'),
                'phone_representative' => $request->get('phone_representative'),
                'website' => $request->get('website'),
                'password' => Hash::make($request->get('password')),
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

    public function download_logos($file_name)
    {
        $file_path = public_path('storage/administrator/uploads/logos/' . $file_name);
        return response()->download($file_path);
    }
    public function download_planners($file_name)
    {
        $file_path = public_path('storage/administrator/uploads/planners/' . $file_name);
        return response()->download($file_path);
    }


    public function show_comments($id)
    {



        $logo = Logos::find($id);

        $logo_show = Logos::join('details_logo', 'details_logo.logo_id', '=', 'logos.id')
            ->join('brandings', 'brandings.id', '=', 'details_logo.branding_id')
            ->where('logos.id', '=', $id)
            ->get()
            ->toArray();

        $comments = Logos::join('comments_logos', 'logos.id', '=', 'comments_logos.logo_id')
            ->join('users', 'comments_logos.commentator_id', '=', 'users.id')
            ->join('details_logo', 'details_logo.logo_id', '=', 'logos.id')
            ->join('brandings', 'brandings.id', '=', 'details_logo.branding_id')
            ->select('brandings.customer_id as customer', 'logos.*', 'comments_logos.*', 'users.*')
            ->get()
            ->toArray();

        $customer = User::where('id', '=', $logo_show[0]['customer_id'])->get()->toArray();
        $customer = $customer[0];

        return view('general_manager.show_comments', compact('customer', 'comments', 'logo'));
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

        return back()->with('success', 'Se guardó el comentario');
    }

    public function store_comments_posts_adm(Request $request)
    {
        $new_comment = CommentsPlanners::create([
            'planner_id' => $request->get('id_planner'),
            'type' => $request->get('type'),
            'comment' => $request->get('comment'),
            'commentator_id' => auth()->user()->id,
        ]);

        $new_comment->save();

        return back()->with('success', 'Se guardó el comentario');
    }
    public function show_all_planners()
    {
        $customer = User::where('id', '=', Auth()->id())->get()->toArray();
        $customer = $customer[0];
        $planners = Planners::join('details_planners', 'details_planners.planner_id', '=', 'planners.id')
            ->join('brandings', 'brandings.id', '=', 'details_planners.branding_id')
            ->where('status', '=', 'available')
            ->select('planners.*', 'planners.id as planner_id', 'details_planners.*', 'brandings.*')
            ->get()
            ->toArray();

        return view('general_manager.show_all_planners', compact('customer', 'planners'));
    }

    public function edit_planner($id)
    {
        $planner = Planners::join('details_planners', 'details_planners.planner_id', '=', 'planners.id')
            ->join('brandings', 'brandings.id', '=', 'details_planners.branding_id')
            ->where('planners.id', '=', $id)
            ->select('planners.*', 'planners.id as planner_id', 'details_planners.*', 'brandings.*')
            ->get()
            ->toArray();
        $planner = $planner[0];

        $customer = User::where('id', '=', $planner['customer_id'])->get()->toArray();
        $customer = $customer[0];

        return view('general_manager.edit_planner',  compact('customer', 'planner'));
    }
    public function edit_post($id)
    {
        $planner = Planners::join('details_planners', 'details_planners.planner_id', '=', 'planners.id')
            ->join('brandings', 'brandings.id', '=', 'details_planners.branding_id')
            ->where('planners.id', '=', $id)
            ->select('planners.*', 'planners.id as planner_id', 'details_planners.*', 'brandings.*')
            ->get()
            ->toArray();
        $planner = $planner[0];

        $customer = User::where('id', '=', $planner['customer_id'])->get()->toArray();
        $customer = $customer[0];

        return view('general_manager.edit_post',  compact('customer', 'planner'));
    }


    public function approved_post($id)
    {
        $planner = Planners::where('id', '=', $id)
            ->first();

        $detail = DetailsPlanners::where('planner_id', '=', $planner['id'])->first();
        $detail->is_approved = 'yes';
        $detail->save();

        return back()->with('success', 'Se aprobó el post');
    }

    public function update_planner(Request $request)
    {
        $planner = Planners::where('id', '=', $request->get('planner_id'))->get()->toArray();
        $planner = $planner[0];
        if ($request->file('image')) {
            $image = $request->file('image');
            $image->move('storage/administrator/uploads/planners/', $planner['path']);
            $planner_update = Planners::where('planners.id', '=', $request->get('planner_id'))
                ->join('details_planners', 'details_planners.planner_id', '=', 'planners.id')
                ->update([
                    'name' => $request->get('name'),
                    'description' => $request->get('description'),

                ]);
        } else {
            $planner_update = Planners::where('planners.id', '=', $request->get('planner_id'))
                ->join('details_planners', 'details_planners.planner_id', '=', 'planners.id')
                ->update([
                    'name' => $request->get('name'),
                    'description' => $request->get('description'),

                ]);
        }
        return redirect(route('show.all_planners', $request->get('customer')));
    }
    public function update_post(Request $request)
    {

        $planner = Planners::where('id', '=', $request->get('post_id'))->get()->toArray();
        $planner = $planner[0];
        if ($request->file('image')) {
            $image = $request->file('image');
            $image->move('storage/administrator/uploads/planners/', $planner['path']);
            $planner_update = Planners::where('planners.id', '=', $request->get('post_id'))
                ->join('details_planners', 'details_planners.planner_id', '=', 'planners.id')
                ->update([
                    'platform' => $request->get('platform'),
                    'post_reason' => $request->get('post_reason'),
                    'caption' => $request->get('caption'),
                    'idea' => $request->get('idea'),

                ]);
        } else {
            $planner_update = Planners::where('planners.id', '=', $request->get('post_id'))
                ->join('details_planners', 'details_planners.planner_id', '=', 'planners.id')
                ->update([
                    'platform' => $request->get('platform'),
                    'post_reason' => $request->get('post_reason'),
                    'caption' => $request->get('caption'),
                    'idea' => $request->get('idea'),

                ]);
        }
        return redirect(route('show.planners.posts', $request->get('customer')));
    }


    public function delete_planner($id)
    {
        $planner = Planners::where('id', '=', $id)->delete();
        return back()->with('success', 'Se eliminó el planner');
    }


    public function show_my_calendar(Request $request)
    {
        $planners = Planners::join('details_planners', 'details_planners.planner_id', '=', 'planners.id')
            ->join('brandings', 'brandings.id', '=', 'details_planners.branding_id')
            ->where('customer_id', '=', $request->get('id'))
            ->where('type_id', '3')
            ->get()
            ->toArray();



        // foreach($planners as $planner){
        //     if($planner['platform'] == 'instagram'){
        //         $planner['platform21'] = "gaaa";
        //     }elseif($planner['platform']  == 'facebook'){
        //         echo "ga2";

        //     }elseif($planner['platform']  == 'linkedin'){
        //         echo "ga3";

        //     }else{

        //     }
        // }

        for ($i = 0; $i < count($planners); $i++) {
            unset($planners[$i]['branding_id']);
            unset($planners[$i]['caption']);
            unset($planners[$i]['customer_id']);
            unset($planners[$i]['description']);
            unset($planners[$i]['extension']);
            unset($planners[$i]['id']);
            unset($planners[$i]['is_approved']);
            unset($planners[$i]['name']);
            unset($planners[$i]['employee_id']);
            unset($planners[$i]['planner_id']);
            unset($planners[$i]['path']);
            unset($planners[$i]['planner_id']);
            unset($planners[$i]['post_reason']);
            unset($planners[$i]['status']);
            unset($planners[$i]['type_id']);
            unset($planners[$i]['updated_at']);


            $planners[$i]['title'] = $planners[$i]['idea'];
            unset($planners[$i]['idea']);

            $planners[$i]['start'] = '2021-07-01';
            unset($planners[$i]['created_at']);
            $planners[$i]['textColor'] = '#ffffff';

            
            if ($planners[$i]['platform'] == 'instagram') {
                $planners[$i]['color'] = "red";
            } elseif ($planners[$i]['platform']  == 'facebook') {
                $planners[$i]['color'] = "blue";
            } elseif ($planners[$i]['platform']  == 'linkedin') {
                $planners[$i]['color'] = "blue";
            } else {
                
            }
            unset($planners[$i]['platform']);


        }

        /*
                title: 'All Day Event',
                description: 'Lorem ipsum 1...',
                start: '2021-07-01',
                color: '#3A87AD',
                textColor: '#ffffff',
        */

        return $planners;
    }
}
