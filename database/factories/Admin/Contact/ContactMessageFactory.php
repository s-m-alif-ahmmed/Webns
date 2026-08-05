<?php

namespace Database\Factories\Admin\Contact;

use App\Models\Admin\Contact\ContactMessage;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Admin\Contact\ContactMessage>
 */
class ContactMessageFactory extends Factory
{
    protected $model = ContactMessage::class;

    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'email' => fake()->safeEmail(),
            'number' => fake()->numerify('017########'),
            'company_name' => fake()->company(),
            'subject' => fake()->sentence(),
            'message' => fake()->paragraph(),
            'note' => fake()->optional()->sentence(),
            'status' => fake()->randomElement(['UnRead', 'Read']),
        ];
    }
}
