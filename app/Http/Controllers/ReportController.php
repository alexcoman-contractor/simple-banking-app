<?php

namespace App\Http\Controllers;

use App\Services\ReportsService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

/**
 * Class ReportController
 * @package App\Http\Controllers
 */
class ReportController extends Controller
{
    /**
     * @param ReportsService $reportsService
     * @return Factory|View|Application
     */
    public function show(ReportsService $reportsService): Factory|View|Application
    {
        return view('report.show', [
            'firstReport' => $reportsService->getAllBranchesWithBalance(),
            'secondReport' => $reportsService->showBranchesWithRichCustomers()
        ]);
    }
}
