<?php

namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\Dashboard;
use Encore\Admin\Layout\Column;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Row;
use \App\Services\Analytics; 

class HomeController extends Controller
{
    public function index(Content $content)
    {
        $service = new Analytics();
        // print_r($service->last7day());
        // die;
        return $content
            ->title('Dashboard')
            ->description('Description...')
            // ->row(Dashboard::title())
            ->row(function (Row $row) {

                $row->column(12, function (Column $column) {
                    $service = new Analytics();
                    $column->append(view('admin.page.dashboard.sumary', [
                    ]));
                });
                $row->column(12, function (Column $column) {
                    $service = new Analytics();
                    $column->append(view('admin.page.dashboard.lineChart', [
                        'data' => $service->last12Month('Done')
                    ]));
                });
                $row->column(12, function (Column $column) {
                    $service = new Analytics();
                    $column->append(view('admin.page.dashboard.stackedBarChart', [
                        'data' => $service->last12Month2()
                    ]));
                });
                $row->column(12, function (Column $column) {
                    $service = new Analytics();
                    $column->append(view('admin.page.dashboard.last7dayChart', [
                    ]));
                });
                // $row->column(4, function (Column $column) {
                //     $column->append(Dashboard::extensions());
                // });

                // $row->column(4, function (Column $column) {
                //     $column->append(Dashboard::dependencies());
                // });
            });
    }
}
