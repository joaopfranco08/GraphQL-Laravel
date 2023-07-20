<?php

declare(strict_types=1);

namespace App\GraphQL\Queries;

use App\Models\Letra;
use Closure;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Query;
use Rebing\GraphQL\Support\SelectFields;

class LetraQuery extends Query
{
    protected $attributes = [
        'name' => 'letra'
    ];

    public function type(): Type
    {
        return GraphQL::type('Letra');
    }

    public function args(): array
    {
        return [
            'id' => [
                'name' => 'id',
                'type' => Type::id()
            ]
        ];
    }

    public function resolve($root, array $args, $context, ResolveInfo $resolveInfo, Closure $getSelectFields)
    {
        return Letra::findOrFail($args['id']);
    }
}
