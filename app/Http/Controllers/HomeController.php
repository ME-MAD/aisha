<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Services\HomeService;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(HomeService $homeService)
    {

        $CountGroupskid = $homeService->countGroupskid();
        $CountGroupsAdult = $homeService->countGroupsAdult();
        $allCountGroups = $homeService->allCountGroups();
        $divisionGroupskid = $homeService->divisionGroupskid();
        $divisionGroupsAdult = $homeService->divisionGroupsAdult();

        $countGroupsPrice80 = $homeService->countGroupsPrice80();
        $countGroupsPrice120 = $homeService->countGroupsPrice120();
        $countGroupsPrice200 = $homeService->countGroupsPrice200();
        $divisionGroupsPrice80 = $homeService->divisionGroupsPrice80();
        $divisionGroupsPrice120 = $homeService->divisionGroupsPrice120();
        $divisionGroupsPrice200 = $homeService->divisionGroupsPrice200();

        // dump($countGroupsPrice80);
        // dump($countGroupsPrice120);
        // dd($divisionGroupsPrice80);

        return view('pages.home', [
            'CountGroupskid' => $CountGroupskid,
            'CountGroupsAdult' => $CountGroupsAdult,
            'allCountGroups' => $allCountGroups,
            'divisionGroupskid' => $divisionGroupskid,
            'divisionGroupsAdult' => $divisionGroupsAdult,
            'countGroupsPrice80' => $countGroupsPrice80,
            'countGroupsPrice120' => $countGroupsPrice120,
            'countGroupsPrice200' => $countGroupsPrice200,
            'divisionGroupsPrice80' => $divisionGroupsPrice80,
            'divisionGroupsPrice120' => $divisionGroupsPrice120,
            'divisionGroupsPrice200' => $divisionGroupsPrice200,
        ]);
    }
}