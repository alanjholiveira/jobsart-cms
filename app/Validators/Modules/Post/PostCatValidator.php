<?php

namespace JobsArt\Validators\Modules\Post;


use Prettus\Validator\LaravelValidator;

class PostCatValidator extends LaravelValidator
{
    protected $rules = [
            'name'     =>  'required|regex:/^[A-Za-z ]+$/',
            'description'     =>  'required|max:255',
    ];
}