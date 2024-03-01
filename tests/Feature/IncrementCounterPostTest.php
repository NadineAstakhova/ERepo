<?php

use Tests\TestCase;

class IncrementCounterPostTest extends TestCase
{
    public function test_user_gets_a_validation_error_if_counter_does_not_exist(): void
    {
        $response = $this->json('POST', '/api/employee/1/counter/390');
        $response
            ->assertStatus(404);
    }

    public function test_user_gets_a_validation_error_if_counter_does_not_exist_in_team_employee(): void
    {
        $response = $this->json('POST', '/api/employee/5/counter/1');
        $response
            ->assertStatus(401);
    }
}
