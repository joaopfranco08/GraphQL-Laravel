<?php

declare(strict_types=1);

namespace App\GraphQL\Types;

use App\Models\Album;
use App\Models\Letra;
use App\Models\Musica;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\GraphQL as GraphQLGraphQL;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Type as GraphQLType;

class MusicaType extends GraphQLType
{
    protected $attributes = [
        'name' => 'Musica',
        'model' => Musica::class
    ];

    public function fields(): array
    {
        return [
            'id' => [
                'type' => Type::id(),
                'description' => 'Representa o ID da música'
            ],
            'name' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'Representa o nome da música'
            ],
            'albumID' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'Representa o ID do álbum referente à música'
            ],
            'album' => [
                'type' => GraphQL::type('Album'),
                'description' => 'Representa o álbum da música',
                'resolve' => function($root) {
                    return Album::findOrFail($root->albumID);
                }
            ],
            'letra' => [
                'type' => GraphQL::type('Letra'),
                'description' => 'Representa a letra da música',
                'resolve' => function($root) {
                    return Letra::where('musica', $root->name)->first();
                }
            ]
        ];
    }
}
