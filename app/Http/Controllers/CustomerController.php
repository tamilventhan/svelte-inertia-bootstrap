<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');

        $customers =Customer::query()->where('name','LIKE','%' . $search. '%')
                                    ->orwhere('email','LIKE','%' . $search. '%')
                                    ->orwhere('phone','LIKE','%' . $search. '%')
                                    ->paginate(10);

       return Inertia::render('customers/index',[
         'customers'=>$customers
       ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('customers/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCustomerRequest $request)
    {
        $customer= new Customer;
        $customer->name=$request->name;
        $customer->email=$request->email;
        $customer->phone=$request->phone;
        $customer->save();

        return redirect('/customers')->with('success','New customer created succesfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer)
    {
        return Inertia::render('customers/view',[
            'customer'=>$customer,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Customer $customer)
    {
        return Inertia::render('customers/edit',[
            'customer'=>$customer,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCustomerRequest $request, Customer $customer)
    {
        $customer->name=$request->name;
        $customer->email=$request->email;
        $customer->phone=$request->phone;
        $customer->save();

        return redirect('/customers')->with('success',' Customer updated succesfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
        $customer->delete();
        return redirect('/customers')->with('success',' customer deleted succesfully');
    }
}
