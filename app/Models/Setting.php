<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $guarded = [];

    const LOGO_PATH = 'images/setting/';
    const WELCOME_IMAGE_PATH = 'images/setting/';

    protected function logo(): Attribute
    {
        return Attribute::make(
            get: function($logo){
                if($logo && file_exists($this->getlogoPath()))
                {
                    return asset(Setting::LOGO_PATH . $logo);
                }
                return '';
            },
        );
    }

    protected function welcomeImg(): Attribute
    {
        return Attribute::make(
            get: function($welcomeImg){
                if($welcomeImg && file_exists($this->getWelcomeImgPath()))
                {
                    return asset(Setting::WELCOME_IMAGE_PATH . $welcomeImg);
                }
                return '';
            },
        );
    }

    function getlogoPath(){
        if($this->getRawOriginal('logo'))
        {
            return public_path(Setting::LOGO_PATH . $this->getRawOriginal('logo'));
        }
        return '';
    }

    function getWelcomeImgPath(){
        if($this->getRawOriginal('welcome_img'))
        {
            return public_path(Setting::WELCOME_IMAGE_PATH . $this->getRawOriginal('welcome_img'));
        }
        return '';
    }
}
