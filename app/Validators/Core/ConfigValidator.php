<?php

namespace JobsArt\Validators\Core;


use Prettus\Validator\LaravelValidator;

class ConfigValidator extends LaravelValidator
{

    protected $rules = [
        'cnf_appname'=>'required|min:2',
        'cnf_appdesc'=>'required|min:2',
        'cnf_comname'=>'required|min:2',
        'cnf_email'=>'required|email',
    ];

}