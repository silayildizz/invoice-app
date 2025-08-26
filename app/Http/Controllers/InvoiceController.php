<?php

namespace App\Http\Controllers;

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
    public function update(Request $request, Invoice $invoice){
    $invoice->update([
        'type' => $request->input('type')
    ]);

    return redirect()->back()->with('success', 'Kategori güncellendi');
}

    public function store(Request $request){
        $request->validate([
            'invoice_number' =>['required','unique:invoices'],
            'customer' =>['nullable','string'],
            'amount' =>['nullable','string'],
            'status'=>['nullable','string'],
            'type'=>['required','string'],

        ]);


        Invoice ::create($request->only(['invoice_number','customer','amount','status','type']));
        return redirect()->route('invoices.index')->with('succes','invoices created thx');
        //return view('invoices.create');
    }
}
