<?php

namespace App\Http\Controllers;

use App\Services\HomeService;

class HomeController extends Controller
{

    private $homeService;

    public function __construct(HomeService $homeService)
    {
        $this->homeService = $homeService;    
    }
    
    public function index()
    {
        $CountGroupskid = $this->homeService->countGroupskid();
        $CountGroupsAdult = $this->homeService->countGroupsAdult();
        $allCountGroups = $this->homeService->allCountGroups();
        $divisionGroupskid = $this->homeService->divisionGroupskid();
        $divisionGroupsAdult = $this->homeService->divisionGroupsAdult();

        $countGroupsPrice80 = $this->homeService->countGroupsPrice80();
        $countGroupsPrice120 = $this->homeService->countGroupsPrice120();
        $countGroupsPrice200 = $this->homeService->countGroupsPrice200();
        $divisionGroupsPrice80 = $this->homeService->divisionGroupsPrice80();
        $divisionGroupsPrice120 = $this->homeService->divisionGroupsPrice120();
        $divisionGroupsPrice200 = $this->homeService->divisionGroupsPrice200();

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