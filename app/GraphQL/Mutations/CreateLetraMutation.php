<?php

declare(strict_types=1);

namespace App\GraphQL\Mutations;

use App\Models\Letra;
use Closure;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Mutation;
use Rebing\GraphQL\Support\SelectFields;

class CreateLetraMutation extends Mutation
{
    protected $attributes = [
        'name' => 'createLetra'
    ];

    public function type(): Type
    {
        return GraphQL::type('Letra');
    }

    public function args(): array
    {
        return [
            'text' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'Representa o texto da letra'
            ],
            'musica' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'Representa o nome da música'
            ],
        ];
    }

    public function resolve($root, array $args, $context, ResolveInfo $resolveInfo, Closure $getSelectFields)
    {
        return Letra::create($args);
    }
}
