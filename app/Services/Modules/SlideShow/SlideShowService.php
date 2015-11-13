<?php

namespace JobsArt\Services\Modules\SlideShow;

use Intervention\Image\Facades\Image;

use JobsArt\Repositories\Modules\SlideShow\SlideShowRepository;
use Illuminate\Contracts\Filesystem\Factory as Storage;
use Illuminate\Filesystem\Filesystem;
use JobsArt\Validators\Modules\SlideShow\SlideShowValidator;

use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;


class SlideShowService
{

    /**
     * @var SlideShowRepository
     */
    private $repository;

    /**
     * @var SlideShowValidator
     */
    private $validator;

    /**
     * @var Filesystem
     */
    private $filesystem;

    /**
     * @var Storage
     */
    private $storage;

    /**
     * Construc
     * @param SlideShowRepository $repository
     * @param SlideShowValidator $validator
     * @param Filesystem $filesystem
     * @param Storage $storage
     */
    public function __construct(SlideShowRepository $repository, SlideShowValidator $validator, Filesystem $filesystem, Storage $storage)
    {
        $this->repository = $repository;
        $this->validator = $validator;
        $this->filesystem = $filesystem;
        $this->storage = $storage;
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

            $imagerize = Image::make($file);
            $destination_path = public_path('uploads/slideshow/');
            $imagerize->resize(1600,753);
            $extension = $file->getClientOriginalExtension();
            $filename = str_random(6) . '.' . $extension;

            $this->repository->create([
                'title' => $data['title'],
                'subtitle' =>  $data['subtitle'],
                'logoimage' =>  $data['logoimage'],
                'imagefile' => $filename,
                'status' => $data['status'],
            ]);

            $imagerize->save($destination_path . $filename);

            return redirect()->route('admin.slideshow.index')->with('messagetext','Registro criado com sucesso!')->with('msgstatus','success');

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

            $slide = $this->repository->find($id);


            if(!empty($data['imagefile']))
            {
                // Upload da imagem
                $file = $data['imagefile'];
                $imagerize = Image::make($file);
                $imagerize->resize(1600,753);
                $destination_path = public_path('uploads/slideshow/');
                $extension = $file->getClientOriginalExtension();
                $filename = str_random(6) . '.' . $extension;

                if(file_exists(public_path() . '/uploads/slideshow/' . $slide->imagefile)){
                    $this->storage->disk('local_public')->delete('slideshow/' . $slide->imagefile);
                }

            $slide->update([
                'imagefile' => $filename,
            ]);

            $imagerize->save($destination_path . $filename);

            }

            $slide->update([
                'title' => $data['title'],
                'subtitle' =>  $data['subtitle'],
                'logoimage' =>  $data['logoimage'],
                'status' => $data['status'],
            ]);

            return redirect()->route('admin.slideshow.index')->with('messagetext','Registro atualizado com sucesso!')->with('msgstatus','success');

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
                    if (file_exists(public_path() . '/uploads/slideshow/' . $del->imagefile)) {
                        $this->storage->disk('local_public')->delete('slideshow/' . $del->imagefile);
                    }
                }
                $del->delete();
            }
            return redirect()->route('admin.slideshow.index')
                ->with('messagetext','Registro deletado com sucesso.')->with('msgstatus','success');
        } else {
            return redirect()->route('admin.slideshow.index')
                ->with('messagetext','Nenhum registro excluído')->with('msgstatus','error');
        }
    }


}