<?php

namespace App\Livewire;

use App\Models\NewsletterSubscriber;
use Livewire\Component;
use Filament\Notifications\Notification;

class NewsletterSubscriptionForm extends Component
{
    public string $email = '';
    public bool $success = false;

    public function subscribe()
    {
        $this->validate([
            'email' => 'required|email|unique:newsletter_subscribers,email',
        ]);

        NewsletterSubscriber::create([
            'email' => $this->email,
        ]);

        $this->success = true;
        $this->email = '';

        Notification::make()
            ->title('Successfully subscribed to newsletter!')
            ->success()
            ->send();
    }

    public function render()
    {
        return view('livewire.newsletter-subscription-form');
    }
}
