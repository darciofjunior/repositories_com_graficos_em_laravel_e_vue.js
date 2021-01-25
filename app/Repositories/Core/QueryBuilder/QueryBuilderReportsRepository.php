<?php

namespace App\Repositories\Core\QueryBuilder;

use Illuminate\Support\Facades\DB;
use App\Repositories\Core\BaseQueryBuilderRepository;
use App\Repositories\Contracts\ReportsRepositoryInterface;

class QueryBuilderReportsRepository extends BaseQueryBuilderRepository implements ReportsRepositoryInterface 
{
    protected $table = 'orders';

    public function byMonths(int $year):array
    {
        $dataset =  $this->db
                    ->table($this->tb)
                    ->select(DB::raw('SUM(total) as sums'), DB::raw('MONTH(date) as month'))
                    ->groupBy(DB::raw('MONTH(date)'))
                    ->whereYear('date', $year)
                    ->pluck('sums')
                    ->toArray();
        return $dataset;
    }

    public function getDataYears():array
    {
        $dataset =  $this->db
                    ->table($this->tb)
                    ->select(
                        DB::raw('SUM(total) as sums'), 
                        DB::raw('EXTRACT(YEAR from date) as year')
                    )
                    ->groupBy(DB::raw('YEAR(date)'))
                    ->get();

        return [
            'labels' => $dataset->pluck('year'),
            'values' => $dataset->pluck('sums'),
        ];
    }

    public function getReportsMonthByYear(int $year):array
    {
        $dataset =  $this->db
                    ->table($this->tb)
                    ->select(
                        DB::raw('SUM(total) as sums'), 
                        DB::raw('EXTRACT(MONTH from date) as months')
                    )
                    ->groupBy(DB::raw('MONTH(date)'))
                    ->whereYear('date', $year)
                    ->get();

        return [
            'labels' => $dataset->pluck('months'),
            'values' => $dataset->pluck('sums'),
        ];
    }
}
