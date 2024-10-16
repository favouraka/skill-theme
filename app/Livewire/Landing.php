<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\NewsletterSubscriber;

class Landing extends Component
{
    public $email = '';

    public array $key_features = [
        [
            'title' => 'Project, Hand-On, and Skill-based Learning Programs',
            'icon' => 'heroicon-o-check-badge',
            'body' => 'Offers courses and workshops focused on practical skills that help students and professionals excel in specific areas.'
        ],
        [
            'title' => 'Accessible to Underserved Communities',
            'icon' => 'heroicon-o-user-group',
            'body' => 'Provides education and overall support to marginalized groups or communities with limited access to quality education and or resources.'
        ],
        [
            'title' => 'Mentorship and Coaching',
            'icon' => 'heroicon-o-trophy',
            'body' => 'Connects learners with experienced professionals who provide guidance, feedback, and career advice, enhancing the learning experience.'
        ],
        [
            'title' => 'Flexible Learning Formats',
            'icon' => 'heroicon-o-document',
            'body' => 'Offers a variety of learning options such as in-person workshops, online courses, and self-paced learning, accommodating diverse learning styles and schedules.'
        ],
        [
            'title' => 'Partnerships with Local Businesses',
            'icon' => 'heroicon-o-link',
            'body' => 'Collaborates with companies and organizations to provide internships, apprenticeships, or job placement services, bridging the gap between learning and employment.'
        ],
        [
            'title' => 'Focus on Lifelong Learning',
            'icon' => 'heroicon-o-book-open',
            'body' => 'Encourages continuous learning and upskilling by offering courses tailored to different stages of life, from early career development to later-stage career shifts.'
        ]
    ];

    public function subscribeToNewsletter()
    {
        $validatedData = $this->validate([
            'email' => 'required|email|unique:newsletter_subscribers,email',
        ]);

        NewsletterSubscriber::create($validatedData);

        $this->reset('email');
        session()->flash('message', 'You have successfully subscribed to our newsletter!');
    }

    public function render()
    {
        return view('livewire.landing');
    }
}
