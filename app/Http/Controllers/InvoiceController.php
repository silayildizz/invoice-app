<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;
use App\Models\Invoice;

class InvoiceController extends Controller
{
    public function index(){
        $invoices = Invoice::all();
        return view('invoices.index', compact('invoices'));
    }
    public function show($id){
        $invoices= Invoice::findOrFail($id);
        return view('invoices.show',compact('invoices'));
    }
    public function create(){
        return view('invoices.create');

    }
    public function destroy(Invoice $invoice){
        $invoice ->delete();
        return redirect()->route('invoices.index')->with('success','invoice is deleted');

    }
    public function pay(Invoice $invoice)
{
    $invoice->update(['status' => 'paid']);
    return redirect()->back()->with('success', 'Fatura ödendi.');
}

    public function update(Request $request, Invoice $invoice){
    $invoice->update([
        'type' => $request->input('type')
    ]);

    return redirect()->back()->with('success', 'Kategori güncellendi');
}

    public function store(Request $request){
        $data = $request->validate([
            'invoice_number' =>['required','unique:invoices'],
            'customer' =>['nullable','string'],
            'email'=>['nullable','email'],
            'amount' =>['nullable','numeric'],
            'status'=>['nullable','string'],
            'type'=>['required','string'],

        ]);
        // user_id'yi email'e göre ekle
        $user = User::where('email', $data['email'])->first();
        $data['user_id'] = $user ? $user->id : null;

        Invoice::create($data);

        return redirect()->route('invoices.index')->with('success', 'Invoice created successfully.');
    }
}
