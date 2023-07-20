<?php

declare(strict_types=1);

namespace App\GraphQL\Mutations;

use App\Models\Album;
use Closure;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Mutation;
use Rebing\GraphQL\Support\SelectFields;

class UpdateAlbumMutation extends Mutation
{
    protected $attributes = [
        'name' => 'updateAlbum'
    ];

    public function type(): Type
    {
        return GraphQL::Type('Album');
    }

    public function args(): array
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
        ];
    }

    public function resolve($root, array $args, $context, ResolveInfo $resolveInfo, Closure $getSelectFields)
    {
        $album = Album::findOrFail($args['id']);

        $album -> update($args);

        return $album->refresh();
    }
}
