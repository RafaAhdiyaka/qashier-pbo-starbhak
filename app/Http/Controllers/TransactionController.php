<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index(){
        $transactions = Transaction::paginate(5);
        return view('transaction.table', compact('transactions'));
    }

    public function create(){
        return view('transaction.add');
    }

    public function store(Request $request){
        $this->validate($request, [
            'no_meja' => 'required',
            'menu_id' => 'required',
            'qty' => 'required',
            'subtotal' => 'required',
        ]);
    
        Transaction::create($request->all());
        return redirect()->route('transaction');
    }

    public function edit($id){
        $transactions = Transaction::find($id);
        return view('transaction.formedit', compact('transactions'));
    }

    public function update(Request $request, $id){
        $transactions = Transaction::find($id);
        $transactions->update($request->all());
        return redirect()->route('transaction');
    }

    public function destroy($id){
        $transactions = Transaction::find($id);
        $transactions->delete();
        return redirect()->route('transaction');
    }
}
