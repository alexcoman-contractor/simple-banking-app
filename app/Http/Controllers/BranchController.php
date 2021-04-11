<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateBranchRequest;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;

/**
 * Class BranchController
 * @package App\Http\Controllers
 */
class BranchController extends Controller
{
    /**
     * @return Factory|View|Application
     */
    public function create(): Factory|View|Application
    {
        return view('branch.create');
    }

    /**
     * @param CreateBranchRequest $request
     * @return RedirectResponse
     */
    public function store(CreateBranchRequest $request): RedirectResponse
    {
        DB::insert('INSERT INTO branches (name, location_id) VALUES ("' . $request->post('name') . '", ' . $request->post('location') . ')');

        return redirect()->route('dashboard')->with(['success' => 'Branch created!']);
    }
}

