<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;

/**
 * Class ReportsService
 * @package App\Services
 */
class ReportsService
{
    /**
     * Show all branches along with the highest balance at each branch. A branch with no customers should show 0 as the highest balance.
     *
     * @return array
     */
    public function getAllBranchesWithBalance(): array
    {
        return DB::select('
            SELECT b.name, COALESCE(s.sum, 0) as sum
            FROM branches b
                 LEFT JOIN
                 (
                     SELECT SUM(balance) as sum, branch_id
                     FROM users
                     GROUP BY branch_id
                 ) s
                 ON b.id = s.branch_id
        ');
    }
    /**
     * List just those branches that have more than two customers with a balance over 50,000.
     *
     * @return array
     */
    public function showBranchesWithRichCustomers(): array
    {
        return DB::select('
            SELECT b.name
            FROM branches b
            INNER JOIN
            (
                SELECT id, name, branch_id
                FROM users
                WHERE balance >= 50000
            ) s
            ON b.id = s.branch_id
            GROUP BY b.name
            HAVING COUNT(s.name) >= 2
        ');
    }
}
