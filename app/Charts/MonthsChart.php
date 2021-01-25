<?php

declare(strict_types = 1);

namespace App\Charts;

use App\Enum\Enum;
use App\Repositories\Contracts\ReportsRepositoryInterface;
use Chartisan\PHP\Chartisan;
use ConsoleTVs\Charts\BaseChart;
use Illuminate\Http\Request;

class MonthsChart extends BaseChart
{
    /**
     * Determines the chart name to be used on the
     * route. If null, the name will be a snake_case
     * version of the class name.
     */
    public ?string $name = 'months_chart';

    /**
     * Determines the name suffix of the chart route.
     * This will also be used to get the chart URL
     * from the blade directrive. If null, the chart
     * name will be used.
     */
    public ?string $routeName = 'months_chart';

    /**
     * Determines the prefix that will be used by the chart
     * endpoint.
     */
    public ?string $prefix = 'some_prefix';

    /**
     * Determines the middlewares that will be applied
     * to the chart endpoint.
     */
    public ?array $middlewares = ['auth'];

    /**
     * Handles the HTTP request for the given chart.
     * It must always return an instance of Chartisan
     * and never a string or an array.
     */

    private $repository;

    public function __construct(ReportsRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function handler(Request $request): Chartisan
    {
        return Chartisan::build()
            ->labels(Enum::months())
            ->dataset('2018', $this->repository->byMonths(2018))
            ->dataset('2019', $this->repository->byMonths(2019));
    }
}
