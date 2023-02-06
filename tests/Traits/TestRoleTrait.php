<?php

namespace Tests\Traits;

Trait TestRoleTrait
{
    private function generateRandomRole()
    {
        return fake()->randomElement(getSeededRoles())['name'];
    }
}