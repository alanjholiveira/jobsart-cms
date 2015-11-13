<?php

namespace JobsArt\Validators\Modules\Portfolio;


use Prettus\Validator\LaravelValidator;

class PortfolioCatValidator extends LaravelValidator
{
    protected $rules = [
            'name'     =>  'required|regex:/^[A-Za-z ]+$/'
    ];
}