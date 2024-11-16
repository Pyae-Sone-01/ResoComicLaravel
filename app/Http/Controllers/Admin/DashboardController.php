<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Traits\Admin\AdminRolePermission;

class DashboardController extends Controller
{
    use AdminRolePermission;

    public function index()
    {
        ## fake data
        $data = [
            "orderYear"      => [
                2020,
                2021,
                2022,
                2023,
                2024,
            ],
            "orderYearSale"  => [
                "2200.00",
                "680.00",
                "680.00",
                "40522.40",
                "77986.00",
            ],
            "orderMonth"     => [
                "Jan",
                "Feb",
                "Mar",
                "Apr",
                "May",
                "Jun",
                "Jul",
                "Aug",
                "Sep",
                "Oct",
                "Nov",
                "Dec",
            ],
            "orderMonthSale" => [
                0,
                0,
                "35516.00",
                0,
                "17810.00",
                0,
                "24660.00",
                0,
                0,
                0,
                0,
                0,
            ],
            "orderWeek"      => [
                "Sun",
                "Mon",
                "Tue",
                "Wed",
                "Thu",
                "Fri",
                "Sat",
            ],
            "orderWeekSale"  => [
                0,
                0,
                0,
                0,
                0,
                0,
                0,
            ],
            "deviceName"     => [
                "desktop",
            ],
            "userCount"      => [
                5,
            ],
            "colourCode"     => [
                "#009EF750",
            ],

        ];

        return view('admin.dashboard.index')->with($data);
    }
}
