<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class EventRegistrationTest extends TestCase
{
    use RefreshDatabase;

    public function test_event_registration_page_loads_correctly(): void
    {
        $response = $this->get('/events/1');

        $response->assertStatus(200);
        $response->assertSee('Back to All Events');
    }

    public function test_user_can_register_for_an_event(): void
    {
        $this->post('/events/1/register', [
            'name' => 'John Doe',
            'email' => 'john@example.com',
        ]);

        $this->assertDatabaseHas('event_registrations', [
            'name' => 'John Doe',
            'email' => 'john@example.com',
        ]);
    }
}
