<?php

declare(strict_types=1);

namespace App\GraphQL\Types;

use App\Models\Musica;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Type as GraphQLType;

class LetraType extends GraphQLType
{
    protected $attributes = [
        'name' => 'Letra',
        'model' => Letra::class
    ];

    public function fields(): array
    {
        return [
            'id' => [
                'type' => Type::id(),
                'description' => 'Representa o ID da letra'
            ],
            'text' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'Representa o texto da letra da música'
            ],
            'musica' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'Representa a música referente à letra',
            ]
        ];
    }
}
