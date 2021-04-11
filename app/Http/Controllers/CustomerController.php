<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCustomerRequest;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class CustomerController extends Controller
{
    public function create(): Factory|View|Application
    {
        return view('customer.create');
    }

    /**
     * @param CreateCustomerRequest $request
     * @return RedirectResponse
     */
    public function store(CreateCustomerRequest $request): RedirectResponse
    {
        $password = Hash::make($request->post('password'));

        DB::insert('INSERT INTO users (name, email, password, balance, branch_id) VALUES ("' . $request->post('name') . '", "' . $request->post('email') . '", "' . $password . '", "' . $request->post('balance') . '", ' . $request->post('branch') . ')');

        return redirect()->route('dashboard')->with(['success' => 'Customer created!']);
    }
}
