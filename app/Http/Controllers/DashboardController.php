<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function __invoke(Request $request): View
    {
        $user = $request->user();

        // ?period=month limits everything to the current month; anything else means all time
        $period = $request->query('period') === 'month' ? 'month' : 'all';

        // The logged-in user's transactions, optionally limited to this month.
        $scoped = fn () => $user->transactions()->when(
            $period === 'month',
            fn ($query) => $query
                ->whereDate('date', '>=', today()->startOfMonth()->toDateString())
                ->whereDate('date', '<=', today()->endOfMonth()->toDateString())
        );

        // One query: the database sums the amounts, so decimals stay exact.
        $totals = $scoped()->toBase()->selectRaw(<<<'SQL'
            COALESCE(SUM(CASE WHEN type = 'income' THEN amount END), 0) AS income,
            COALESCE(SUM(CASE WHEN type = 'expense' THEN amount END), 0) AS expense,
            COALESCE(SUM(CASE WHEN type = 'income' THEN amount ELSE -amount END), 0) AS balance,
            COUNT(*) AS count
        SQL)->first();

        $recent = $scoped()
            ->latest('date')
            ->latest('id')
            ->limit(5)
            ->get();

        return view('dashboard', [
            'totals' => $totals,
            'recent' => $recent,
            'period' => $period,
        ]);
    }
}