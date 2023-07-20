<?php

declare(strict_types=1);

namespace App\GraphQL\Types;

use App\Models\Album;
use App\Models\Musica;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Type as GraphQLType;

class AlbumType extends GraphQLType
{
    protected $attributes = [
        'name' => 'Album',
        'model' => Album::class
    ];

    public function fields(): array
    {
        return [
            'id' => [
                'type' => Type::id(),
                'description' => 'Representa o ID do álbum'
            ],
            'name' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'Representa o nome do álbum'
            ],
            'musicas' => [
                'type' => Type::listOf(GraphQL::type('Musica')),
                'resolve' => function($root) {
                    return Musica::all();
                }
            ]
        ];
    }
}
