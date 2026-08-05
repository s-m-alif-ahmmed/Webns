<?php

namespace Database\Factories\Admin\Faq;

use App\Models\Admin\Faq\Faq;
use App\Models\Admin\Faq\FaqImage;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Admin\Faq\FaqImage>
 */
class FaqImageFactory extends Factory
{
    protected $model = FaqImage::class;

    public function definition(): array
    {
        return [
            'faq_id' => Faq::factory(),
            'image' => 'admin/images/faq/faq-images/default.jpg',
        ];
    }
}
