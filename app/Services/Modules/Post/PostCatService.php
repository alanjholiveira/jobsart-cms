<?php

namespace JobsArt\Services\Modules\Post;


use JobsArt\Repositories\Modules\Post\PostCatRepository;
use JobsArt\Validators\Modules\Post\PostCatValidator;
use Prettus\Validator\Exceptions\ValidatorException;


class PostCatService
{
    /**
     * @var PostCatRepository
     */
    private $repository;
    /**
     * @var PostCatValidator
     */
    private $validator;


    /**
     * @param PostCatRepository $repository
     * @param PostCatValidator $validator
     */
    public function __construct(PostCatRepository $repository, PostCatValidator $validator)
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

            if(empty($data['alias'])){
                $alias = str_slug($data['name'], '-');
            } else {
                $alias = str_slug($data['alias'], '-');
            }

            $this->repository->create([
                'name' => $data['name'],
                'alias' =>  $alias,
                'description' =>  $data['description'],
                'status' => $data['status'],
            ]);

            return redirect()->route('admin.post.cat.index')->with('messagetext','Registro criado com sucesso!')->with('msgstatus','success');

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

            if(empty($data['alias'])){
                $alias = str_slug($data['name'], '-');
            } else {
                $alias = str_slug($data['alias'], '-');
            }

            $this->repository->update([
                'name' => $data['name'],
                'alias' =>  $alias,
                'description' =>  $data['description'],
                'status' => $data['status'],
            ], $id);

            return redirect()->route('admin.post.cat.index')->with('messagetext','Registro atualizado com sucesso!')->with('msgstatus','success');

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
            return redirect()->route('admin.post.cat.index')
                ->with('messagetext','Registro deletado com sucesso.')->with('msgstatus','success');
        } else {
            return back()->with('messagetext','Nenhum registro excluído')->with('msgstatus','error');
        }
    }

}