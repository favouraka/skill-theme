<?php

namespace Tests\Feature;

use App\Livewire\Landing;
use App\Models\NewsletterSubscriber;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class NewsletterSignupTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_subscribe_to_newsletter()
    {
        Livewire::test(Landing::class)
            ->set('email', 'test@example.com')
            ->call('subscribeToNewsletter')
            ->assertHasNoErrors(['email'])
            ->assertSee('You have successfully subscribed to our newsletter!');

        $this->assertDatabaseHas('newsletter_subscribers', [
            'email' => 'test@example.com',
        ]);
    }

    /** @test */
    public function it_validates_email_format()
    {
        Livewire::test(Landing::class)
            ->set('email', 'invalid-email')
            ->call('subscribeToNewsletter')
            ->assertHasErrors(['email' => 'email']);
    }

    /** @test */
    public function it_prevents_duplicate_subscriptions()
    {
        NewsletterSubscriber::factory()->create(['email' => 'existing@example.com']);

        Livewire::test(Landing::class)
            ->set('email', 'existing@example.com')
            ->call('subscribeToNewsletter')
            ->assertHasErrors(['email' => 'unique']);
    }
}
