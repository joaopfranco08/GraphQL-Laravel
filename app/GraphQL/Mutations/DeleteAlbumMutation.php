<?php

declare(strict_types=1);

namespace App\GraphQL\Mutations;

use App\Models\Album;
use Closure;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Mutation;
use Rebing\GraphQL\Support\SelectFields;

class DeleteAlbumMutation extends Mutation
{
    protected $attributes = [
        'name' => 'deleteAlbum'
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
                'description' => 'Representa o ID do álbum'
            ]
        ];
    }

    public function resolve($root, array $args, $context, ResolveInfo $resolveInfo, Closure $getSelectFields)
    {
        $album = Album::findOrFail($args['id']);
        return $album->delete();
    }
}
