<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use Illuminate\Support\Facades\Auth;


class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Customer $customers)
    {
       
    
        // tüm müşterileri çek
        $customers = Customer::all();

        // customers.index blade'ine gönder
        return view('customers.index', compact('customers'));
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
            
        return view('customers.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Customer $customer)
    {// 1) Validasyon
        $data = $request->validate([
        'name'  => 'required|string|max:255',
        'email' => 'nullable|email',
        'phone' => 'nullable|string|max:30',
    ]);

    // 2) Kayıt (Customer modelinde $fillable tanımlı olmalı)


    // 3) Başarılı olursa listeye geri dön ve mesaj göster
    return redirect()
        ->route('customers.index')
        ->with('success', 'Müşteri başarıyla eklendi.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id){

        $customer = \App\Models\Customer::findOrFail($id);
        return view('customers.show', compact('customer'));
       
    }

    /*
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
         return view('customers.edit', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Customer $customer ,string $id)
    {
         $data = $request->validate([
            'name'    => ['required','string','max:120'],
            'email'   => ['nullable','email'],
            'phone'   => ['nullable','string','max:20'],
            'address' => ['nullable','string','max:255'],
        ]);

        $customer->update($data);

        return redirect()
            ->route('customers.index')
            ->with('success', 'Müşteri güncellendi.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id, Customer $customer)
    {
        $customer->delete();

        return redirect()
            ->route('customers.index')
            ->with('success', 'Müşteri silindi.');
    }
}
