<?php

namespace App\Repositories;

use App\Testimonial;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;

/**
 * Class TestimonialRepository
 * @package App\Repositories
 */
class TestimonialRepository implements Repository
{

    /**
     * @inheritDoc
     */
    public function list(string $needle = null, string $column = 'id', array $options = []): LengthAwarePaginator
    {
        return Testimonial::where($column, $needle)->paginate();
    }

    /**
     * @inheritDoc
     */
    public function find(string $needle, string $column = 'id', array $options = []): Model
    {
        return Testimonial::where($column, $needle)->get()->first();
    }

    /**
     * @inheritDoc
     */
    public function persist(array $inputs): Model
    {
        $testimonial = isset($inputs['id']) ? Testimonial::find($inputs['id']) : new Testimonial();
        $testimonial->fill($inputs);
        $testimonial->save();
    }

    /**
     * @inheritDoc
     */
    public function remove(int $id): void
    {
        $testimonial = Testimonial::findOrFail($id);
        $testimonial->delete();
    }
}
