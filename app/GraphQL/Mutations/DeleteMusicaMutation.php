<?php

declare(strict_types=1);

namespace App\GraphQL\Mutations;

use App\Models\Musica;
use Closure;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Mutation;
use Rebing\GraphQL\Support\SelectFields;

class DeleteMusicaMutation extends Mutation
{
    protected $attributes = [
        'name' => 'deleteMusica' 
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
                'description' => 'Representa o ID da música'
            ]
        ];
    }

    public function resolve($root, array $args, $context, ResolveInfo $resolveInfo, Closure $getSelectFields)
    {
        $musica = Musica::findOrFail($args['id']);



        return $musica->delete();
    }
}
