<?php

declare(strict_types=1);

namespace App\GraphQL\Mutations;

use App\Models\Letra;
use Closure;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Mutation;
use Rebing\GraphQL\Support\SelectFields;

class DeleteLetraMutation extends Mutation
{
    protected $attributes = [
        'name' => 'deleteLetra'
    ];

    public function type(): Type
    {
        return Type::boolean();
    }

    public function args(): array
    {
        return [
            'id' => [
                'type' => Type::id(),
                'description' => 'Representa o ID da Letra'
            ]
        ];
    }

    public function resolve($root, array $args, $context, ResolveInfo $resolveInfo, Closure $getSelectFields)
    {
        $letra = Letra::findOrFail($args['id']);
        return $letra->delete();
    }
}
