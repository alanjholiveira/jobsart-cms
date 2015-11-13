<?php

namespace JobsArt\Services\Modules\Portfolio;


use JobsArt\Repositories\Modules\Portfolio\PortfolioCatRepository;
use JobsArt\Validators\Modules\Portfolio\PortfolioCatValidator;
use Prettus\Validator\Exceptions\ValidatorException;


class PortfolioCatService
{
    /**
     * @var PortfolioCatRepository
     */
    private $repository;
    /**
     * @var PortfolioCatValidator
     */
    private $validator;


    /**
     * @param PortfolioCatRepository $repository
     * @param PortfolioCatValidator $validator
     */
    public function __construct(PortfolioCatRepository $repository, PortfolioCatValidator $validator)
    {

        $this->repository = $repository;
        $this->validator = $validator;
    }

    /**
     * @param array $data
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function create(array $data)
    {
        try {
            $this->validator->with($data)->passesOrFail();

            $this->repository->create($data);

            return redirect()->route('admin.portfolio.cat.index')->with('messagetext','Registro criado com sucesso!')->with('msgstatus','success');

        } catch(ValidatorException $e) {
            return back()->withInput()->with('messagetext','Ocorreram os seguintes erros:')->with('msgstatus','error')->withErrors($e->getMessageBag());
        }
    }

    /**
     * @param array $data
     * @param $id
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function update(array $data, $id)
    {

        try {
            $this->validator->with($data)->passesOrFail();

           $this->repository->update($data, $id);

            return redirect()->route('admin.portfolio.cat.index')->with('messagetext','Registro atualizado com sucesso!')->with('msgstatus','success');

        } catch(ValidatorException $e) {
            return back()->withInput()->with('messagetext','Ocorreram os seguintes erros:')->with('msgstatus','error')->withErrors($e->getMessageBag());
        }
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        if(count($id) >= 1){
            foreach($id as $ids){
                $del = $this->repository->find($ids);
                $del->delete();
            }
            return redirect()->route('admin.portfolio.cat.index')
                ->with('messagetext','Registro deletado com sucesso.')->with('msgstatus','success');
        } else {
            return back()->with('messagetext','Nenhum registro excluído')->with('msgstatus','error');
        }
    }


}