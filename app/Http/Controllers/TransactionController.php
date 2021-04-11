<?php

namespace App\Http\Controllers;

use App\Http\Requests\SendMoneyToCustomerRequest;
use App\Models\Transaction;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

/**
 * Class TransactionController
 * @package App\Http\Controllers
 */
class TransactionController extends Controller
{
    /**
     * @return Factory|View|Application
     */
    public function create(): Factory|View|Application
    {
        return view('transaction.create');
    }

    /**
     * @param SendMoneyToCustomerRequest $request
     * @return RedirectResponse
     */
    public function store(SendMoneyToCustomerRequest $request): RedirectResponse
    {
        (new Transaction())->sendMoneyToCustomer(
            $request->post('customer'),
            $request->post('value')
        );

        return redirect()->route('dashboard')->with(['success' => 'Money sent!']);
    }
}
