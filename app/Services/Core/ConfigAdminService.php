<?php

namespace JobsArt\Services\Core;


use Illuminate\Http\Request;
use JobsArt\Validators\Core\ConfigValidator;
use Prettus\Validator\Exceptions\ValidatorException;

class ConfigAdminService
{
    /**
     * @var ConfigValidator
     */
    private $validator;

    /**
     * @param ConfigValidator $validator
     */
    public function __construct(ConfigValidator $validator)
    {

        $this->validator = $validator;
    }


    /**
     * @param Request $request
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function update(Request $request)
    {
        try{
            $this->validator->with($request->all())->passesOrFail();

            $logo = '';
            $file = $request->file('logo');
            if(!is_null($file)){
                $destinationPath = public_path().'/assets/images/';
                $filename = $file->getClientOriginalName();
                $extension =$file->getClientOriginalExtension(); //if you need extension of the file
                $logo = 'backend-logo.'.$extension;
                $uploadSuccess = $file->move($destinationPath, $logo);
            }

            // File Setting.php
            $val  =		"<?php \n";
            $val .= 	"define('CNF_APPNAME','".$request->input('cnf_appname')."');\n";
            $val .= 	"define('CNF_APPDESC','".$request->input('cnf_appdesc')."');\n";
            $val .= 	"define('CNF_COMNAME','".$request->input('cnf_comname')."');\n";
            $val .= 	"define('CNF_EMAIL','".$request->input('cnf_email')."');\n";
            $val .= 	"define('CNF_METAKEY','".$request->input('cnf_metakey')."');\n";
            $val .= 	"define('CNF_METADESC','".$request->input('cnf_metadesc')."');\n";
            $val .= 	"define('CNF_GROUP','".CNF_GROUP."');\n";
            $val .= 	"define('CNF_ACTIVATION','".CNF_ACTIVATION."');\n";
            $val .= 	"define('CNF_MULTILANG','".(!is_null($request->input('cnf_multilang')) ? 1 : 0 )."');\n";
            $val .= 	"define('CNF_LANG','".$request->input('cnf_lang')."');\n";
            $val .= 	"define('CNF_REGIST','".CNF_REGIST."');\n";
            $val .= 	"define('CNF_FRONT','".CNF_FRONT."');\n";
            $val .= 	"define('CNF_RECAPTCHA','".CNF_RECAPTCHA."');\n";
            $val .= 	"define('CNF_THEME','".$request->input('cnf_theme')."');\n";
            $val .= 	"define('CNF_RECAPTCHAPUBLICKEY','".CNF_RECAPTCHAPUBLICKEY."');\n";
            $val .= 	"define('CNF_RECAPTCHAPRIVATEKEY','".CNF_RECAPTCHAPRIVATEKEY."');\n";
            $val .= 	"define('CNF_MODE','".(!is_null($request->input('cnf_mode')) ? 'production' : 'development' )."');\n";
            $val .= 	"define('CNF_LOGO','".($logo !=''  ? $logo : CNF_LOGO )."');\n";
            $val .= 	"define('CNF_ALLOWIP','".CNF_ALLOWIP."');\n";
            $val .= 	"define('CNF_RESTRICIP','".CNF_RESTRICIP."');\n";
            $val .= 	"?>";

            $filename = base_path() . '/setting.php';
            $fp = fopen($filename, "w+");
            fwrite($fp,$val);
            fclose($fp);

            return redirect()->route('admin.config.index')->with('messagetext','Configurações salva com sucesso!')->with('msgstatus','success');

        } catch (ValidatorException $e) {

            return redirect()->route('admin.config.index')->with('messagetext','Ocorreram os seguintes erros')->with('msgstatus','error')
                ->withErrors($e->getMessageBag());

//            return [
//                'erro' => true,
//                'message' => $e->getMessageBag()
//            ];
        }


    }

}