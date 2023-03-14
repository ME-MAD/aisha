<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use App\Services\ImageService;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    private $imageService;

    public function __construct(ImageService $imageService)
    {
        $this->imageService = $imageService;
    }

    public function index()
    {
        $setting = Setting::first();
        return view('pages.setting.index', [
            'setting' => $setting
        ]);
    }

    public function create()
    {
        return view('pages.setting.create');
    }

    public function store(Request $request,Setting $setting)
    {
        dd($request);

        $logo = $setting->getRawOriginal('logo');
        $welcome_img = $setting->getRawOriginal('welcome_img');

        if ($request->file('logo')) {
            $this->imageService->deleteImage(path: $setting->getLogoPath());

            $logo = $this->imageService->uploadImage(
                imageObject: $request->file('logo'),
                path: Setting::LOGO_PATH
            );
        }
        
        if ($request->file('welcome_img')) {
            $this->imageService->deleteImage(path: $setting->getWelcomeImagePath());

            $welcome_img = $this->imageService->uploadImage(
                imageObject: $request->file('welcome_img'),
                path: Setting::WELCOME_IMAGE_PATH
            );
        }

        $setting->update([
            'logo' => $logo,
            'welcome_text_1' => $request->welcome_text_1,
            'welcome_text_2' => $request->welcome_text_2,
            'welcome_btn_1' => $request->welcome_btn_1,
            'welcome_btn_2' => $request->welcome_btn_2,
            'welcome_img' => $welcome_img,
        ]);

    }
}
