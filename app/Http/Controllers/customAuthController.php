<?php

namespace App\Http\Controllers;

use App\Models\customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class customAuthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['customers'] = customer::paginate(6);   
        return view('auth.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('auth.register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $validator = Validator::make($request->all(),[
            'name'                  => 'required',
            'email'                 => 'required|email|unique:customers,email',
            'password'              => 'required|min:8|max:25|confirmed',
            'password_confirmation' => 'required|min:8|max:25',
            'term_and_condition'    => 'accepted',


        ]);


        if ($validator->fails())
        {
           return response()->json([
            'status'=> 400,
            'errors'=> $validator->messages()
           ]);
        }
        else
        {
        //     $customers                     = new customer;
        //     $customers->name               = $request->input('name');
        //     $customers->email              = $request->input('email');
        //     $customers->password           = Hash::make($request->input('password'));
        //     $customers->term_and_condition = $request->term_and_condition == 'on' ? 1 : 0;
        //     $customers->save();

        customer::create([
            'name'               => $request->name,
            'email'              => $request->email,
            'term_and_condition' => 1,
            'password'           => Hash::make($request->password),
        ]);
            return response()->json([
                'status' => 200,
                'message' => 'The customer Created Successfully'
            ]);
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $customer = customer::find($id);
        $created_at = $customer->created_at->format('d/m/Y');
        $updated_at = $customer->updated_at->format('d/m/Y');

        if ($customer) {
            return response()->json(['status'=>200,'customer'=>$customer,'created_at'=>$created_at,'updated_at'=>$updated_at]);
        } else {
            return response()->json(['status'=>404,'message'=>'Customer not found']);
        }
        
    }

    /**
     * storage file in our server
     * delete old file and replece it with new
     * time() 21312312312312.phg
     */





    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $customers = customer::find($id);

        if ($customers)
        {
            return response()->json([
                'status' => 200,
                'customers' => $customers
            ]);
        }
        else
        {
            return response()->json([
                'status' => 404,
                'message' => 'Data Not Found'
            ]);
        }
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(),[
        'name'                  => 'required',
        'email'                 => 'required|email|unique:customers,email,' . $id,


        ]);

        if ($validator->fails())
        {
           return response()->json([
            'status'=> 400,
            'errors'=> $validator->messages()
           ]);
        }
        else
        {
            $customer           = Customer::findOrFail($id);
            $customer->name     = $request->name;
            $customer->email    = $request->email;
            $customer->save();

            return response()->json([
                'status' => 200,
                'message' => 'The customer Created Successfully'
            ]);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $customer = customer::find($id);
        $customer->delete();
    }


    /**
     * login action method
     * 
     */
    public function loginAction(Request $request)
    {
        $data = [
            'email' => 'required|email',
            'password' => 'required',
        ];
        $customer = customer::where('email', $request->email)->first();
        if (Auth::attempt($data) && Hash::check($request->password, $customer->password)) {
            return redirect()->route('user');
        }
         else {
            $request->session()->flush('login_error', 'Invalid email or password.');
            return redirect()->route('customers.index');

        }
        
    }
}
