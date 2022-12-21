<?php

namespace Tests;

use Mcamara\LaravelLocalization\LaravelLocalization;

class TestCaseWithTransLationsSetUp extends TestCase
{
    protected function refreshApplicationWithLocale($locale)
    {
        self::tearDown();
        putenv(LaravelLocalization::ENV_ROUTE_KEY . '=' . $locale);
        self::setUp();
    }

    protected function tearDown() : void
    {
        putenv(LaravelLocalization::ENV_ROUTE_KEY);
        parent::tearDown();
    }
}