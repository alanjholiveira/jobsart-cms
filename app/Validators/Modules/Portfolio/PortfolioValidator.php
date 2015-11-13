<?php

namespace JobsArt\Validators\Modules\Portfolio;


use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\LaravelValidator;

class PortfolioValidator extends LaravelValidator
{
    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            'cat_id'     =>  'required|integer',
            'title'  =>  'required|max:50',
            'details'  =>  'required|max:50',
            'client'  =>  'required',
            //'imagefile' =>  'required|image|mimes:jpeg,png|min:1|max:250',
            'link'  =>  'required',
        ],
        ValidatorInterface::RULE_UPDATE => [
            'cat_id'     =>  'required|integer',
            'title'  =>  'required|max:50',
            'details'  =>  'required|max:50',
            'client'  =>  'required',
            'imagefile' =>  'sometimes|image|mimes:jpeg,png|min:1|max:250',
            'link'  =>  'required',
        ]
    ];
}