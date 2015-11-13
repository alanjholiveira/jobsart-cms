<?php

namespace JobsArt\Entities\Modules\Post;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Post extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
        'title',
        'permalink',
        'image',
        'content',
        'status',
        'target',
        'featured',
        'publish_start',
        'publish_end',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'type',
        'hits',
        'extras',

        //Verificar abaixo ser será necessario a criação do atributo na tabela/migrate.
        'created_by',
        'updated_by'
    ];

}
