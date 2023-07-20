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

class LetrasQuery extends Query
{
    protected $attributes = [
        'name' => 'letras'
    ];

    public function type(): Type
    {
        return Type::listOf(GraphQL::type('Letra'));
    }

    public function resolve($root, array $args, $context, ResolveInfo $resolveInfo, Closure $getSelectFields)
    {
        return Letra::all();
    }
}
