<?php

namespace JobsArt\Validators\Modules\SlideShow;


use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\LaravelValidator;

class SlideShowValidator extends LaravelValidator
{
    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            'title'     =>  'required|regex:/^[A-Za-z ]+$/',
            'subtitle'  =>  'required',
            'imagefile' =>  'required|image|mimes:jpeg,png|min:1|max:250'
        ],
        ValidatorInterface::RULE_UPDATE => [
            'title'     =>  'required|regex:/^[A-Za-z ]+$/',
            'subtitle'  =>  'required',
            'imagefile' =>  'sometimes|image|mimes:jpeg,png|min:1|max:250'
        ]
    ];
}