<?php

namespace Tests\Feature;

use App\Models\Event;
use App\Models\EventRegistration;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class EventRegistrationTest extends TestCase
{
    use RefreshDatabase;

    public function test_event_registration_page_loads_correctly(): void
    {
        $event = Event::factory()->create();
        $response = $this->get('/events/' . $event->id);

        $response->assertStatus(200);
        $response->assertSee('Back to All Events');
    }

    public function test_user_can_register_for_an_event(): void
    {
        $event = Event::factory()->create();

        $response = $this->post('/events/' . $event->id . '/register', [
            'name' => 'John Doe',
            'email' => 'john@example.com',
        ]);

        $response->assertStatus(302); // Assuming a redirect after successful registration

        $this->assertDatabaseHas('event_registrations', [
            'event_id' => $event->id,
            'name' => 'John Doe',
            'email' => 'john@example.com',
        ]);
    }

    public function test_can_register_for_event_api()
    {
        $event = Event::factory()->create();

        $response = $this->postJson('/api/events/' . $event->id . '/register', [
            'name' => 'John Doe',
            'email' => 'john@example.com',
        ]);

        $response->assertStatus(201);

        $this->assertDatabaseHas('event_registrations', [
            'event_id' => $event->id,
            'name' => 'John Doe',
            'email' => 'john@example.com',
        ]);
    }
}
