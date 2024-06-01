<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Expense;
use Illuminate\Support\Facades\Validator;

class ExpenseController extends Controller
{
    public function index()
    {
        $expenses = Expense::all();
        return view('expenses', compact('expenses'));
    }

    public function create()
    {
        return view('expenses.expenses_create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'description' => 'required',
            'amount' => 'required',
            'category' => 'required',
            'date' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->route('expenses.create')
                ->withErrors($validator)
                ->withInput();
        }
        Expense::create([
            'description' => $request->description,
            'amount' => $request->amount,
            'category' => $request->category,
            'date' => $request->date,
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('expenses');
    }

    public function edit($id)
    {
        $expense = Expense::find($id);
        return view('expenses.expenses_edit', compact('expense'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'description' => 'required',
            'amount' => 'required',
            'category' => 'required',
            'date' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->route('expenses.edit', $id)
                ->withErrors($validator)
                ->withInput();
        }

        $expense = Expense::find($id);
        $expense->update($request->all());

        return redirect()->route('expenses');
    }

    public function destroy($id)
    {
        $expense = Expense::find($id);
        $expense->delete();

        return redirect()->route('expenses');
    }
}
