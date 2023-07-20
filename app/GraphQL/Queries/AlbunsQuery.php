<?php

declare(strict_types=1);

namespace App\GraphQL\Queries;

use App\Models\Album;
use Closure;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Query;
use Rebing\GraphQL\Support\SelectFields;

class AlbunsQuery extends Query
{
    protected $attributes = [
        'name' => 'albuns'
    ];

    public function type(): Type
    {
        return Type::listOf(GraphQL::type('Album'));
    }

    public function resolve($root, array $args, $context, ResolveInfo $resolveInfo, Closure $getSelectFields)
    {
        return Album::all();
    }
}
