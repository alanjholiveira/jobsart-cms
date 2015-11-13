<?php

namespace JobsArt\Services\Modules\Portfolio;


use JobsArt\Repositories\Modules\Portfolio\PortfolioRepository;
use JobsArt\Validators\Modules\Portfolio\PortfolioValidator;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use Illuminate\Contracts\Filesystem\Factory as Storage;
use Illuminate\Filesystem\Filesystem;


class PortfolioService
{
    /**
     * @var PortfolioRepository
     */
    private $repository;
    /**
     * @var PortfolioValidator
     */
    private $validator;
    /**
     * @var Storage
     */
    private $storage;
    /**
     * @var Filesystem
     */
    private $filesystem;


    /**
     * @param PortfolioRepository $repository
     * @param PortfolioValidator $validator
     * @param Storage $storage
     * @param Filesystem $filesystem
     */
    public function __construct(PortfolioRepository $repository, PortfolioValidator $validator, Storage $storage, Filesystem $filesystem)
    {
        $this->repository = $repository;
        $this->validator = $validator;
        $this->storage = $storage;
        $this->filesystem = $filesystem;
    }

    /**
     * @param array $data
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function create(array $data)
    {
        try {
            $this->validator->with($data)->passesOrFail(ValidatorInterface::RULE_CREATE);

            $file = $data['imagefile'];
            $destination_path = public_path('uploads/portfolio/');
            $filename = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();

            $this->repository->create([
                'cat_id' => $data['cat_id'],
                'title' => $data['title'],
                'details' =>  $data['details'],
                'client' =>  $data['client'],
                'imagefile' => $filename,
                'link' =>  $data['link'],
                'status' => $data['status'],
            ]);

            $file->move($destination_path, $file->getClientOriginalName());

            return redirect()->route('admin.portfolio.index')->with('messagetext','Registro criado com sucesso!')->with('msgstatus','success');

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
            $this->validator->with($data)->passesOrFail(ValidatorInterface::RULE_UPDATE);

           $this->repository->update($data, $id);

            return redirect()->route('admin.portfolio.index')->with('messagetext','Registro atualizado com sucesso!')->with('msgstatus','success');

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
                if(!empty($del->imagefile)) {
                    if (file_exists(public_path() . '/uploads/portfolio/' . $del->imagefile)) {
                        $this->storage->disk('local_public')->delete('portfolio/' . $del->imagefile);
                    }
                }
                $del->delete();
            }
            return redirect()->route('admin.portfolio.index')
                ->with('messagetext','Registro deletado com sucesso.')->with('msgstatus','success');
        } else {
            return back()->with('messagetext','Nenhum registro excluído')->with('msgstatus','error');
        }
    }

}