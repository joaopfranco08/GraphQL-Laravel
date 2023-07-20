<?php

declare(strict_types=1);

namespace App\GraphQL\Queries;

use App\Models\Musica;
use Closure;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Query;
use Rebing\GraphQL\Support\SelectFields;

class MusicasQuery extends Query
{
    protected $attributes = [
        'name' => 'musicas'
    ];

    public function type(): Type
    {
        return Type::listOf(GraphQL::type('Musica'));
    }

    public function resolve($root, array $args, $context, ResolveInfo $resolveInfo, Closure $getSelectFields)
    {
        return Musica::all();
    }
}
