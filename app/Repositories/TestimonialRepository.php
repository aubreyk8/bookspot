<?php

namespace App\Repositories;

use App\Models\Testimonial;

/**
 * Class TestimonialRepository
 * @package App\Repositories
 */
class TestimonialRepository extends BaseRepository
{
    public string $prototype = Testimonial::class;
}
