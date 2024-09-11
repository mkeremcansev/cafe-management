<?php

namespace Tests;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        $this->actingAs(User::factory()->create(['is_owner' => true]));
    }

    protected function getAccessiblePropertyForTesting(object $class, string $propertyName): mixed
    {
        return (fn () => $class->{$propertyName})->call($class);
    }
}
