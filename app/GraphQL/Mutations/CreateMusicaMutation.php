<?php

declare(strict_types=1);

namespace App\GraphQL\Mutations;

use App\Models\Musica;
use Closure;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Mutation;
use Rebing\GraphQL\Support\SelectFields;

class CreateMusicaMutation extends Mutation
{
    protected $attributes = [
        'name' => 'createMusica'
    ];

    public function type(): Type
    {
        return GraphQL::type('Musica');
    }

    public function args(): array
    {
        return [
            'name' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'Representa o nome da música'
            ],
            'albumID' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'Representa o ID do álbum referente à música'
            ]
        ];
    }

    public function resolve($root, array $args, $context, ResolveInfo $resolveInfo, Closure $getSelectFields)
    {
        return Musica::create($args);
    }
}
