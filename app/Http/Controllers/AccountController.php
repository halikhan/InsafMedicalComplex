<?php
// app/Http/Controllers/AccountController.php
namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function index(Request $request)
    {
        // Search functionality
        $search = $request->input('search');
        $accounts = Account::where('account_number', 'like', "%{$search}%")
            ->orWhere('account_name', 'like', "%{$search}%")
            ->orWhere('account_type', 'like', "%{$search}%")
            ->paginate(10);

        return view('admin.accounts.index', compact('accounts', 'search'));
    }

    public function create()
    {
        return view('admin.accounts.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'account_number' => 'required|unique:accounts',
            'account_type' => 'required|in:ASSETS,LIABILITIES,EQUITY,INCOME,EXPENSES',
            'account_name' => 'required',
            'opening_date' => 'required|date',
        ]);

        Account::create($validated);
        return redirect()->route('accounts.index')->with('message', 'Account created successfully!');
    }

    public function edit(Account $account)
    {
        return view('admin.accounts.edit', compact('account'));
    }

    public function update(Request $request, Account $account)
    {
        $validated = $request->validate([
            'account_number' => 'required|unique:accounts,account_number,' . $account->id,
            'account_type' => 'required|in:ASSETS,LIABILITIES,EQUITY,INCOME,EXPENSES',
            'account_name' => 'required',
            'opening_date' => 'required|date',
        ]);

        $account->update($validated);
        return redirect()->route('accounts.index')->with('message', 'Account updated successfully!');
    }

    public function destroy(Account $account)
    {
        $account->delete();
        return redirect()->route('accounts.index')->with('message', 'Account deleted successfully!');
    }
}
