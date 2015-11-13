<?php

namespace JobsArt\Http\Controllers\Admin\Modules\Post;

use Illuminate\Http\Request;
use JobsArt\Http\Requests;
use JobsArt\Http\Controllers\Controller;
use JobsArt\Repositories\Modules\Post\PostCatRepository;
use JobsArt\Services\Modules\Post\PostCatService;

class PostCatController extends Controller
{
    /**
     * @var PostCatRepository
     */
    private $repository;
    /**
     * @var PostCatService
     */
    private $service;

    /**
     * @param PostCatRepository $repository
     * @param PostCatService $service
     */
    public function __construct(PostCatRepository $repository, PostCatService $service)
    {
        $this->repository = $repository;
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $postCats = $this->repository->scopeQuery(function($query){
            return $query->whereRaw('postcats.status = "published" OR postcats.status = "unpublished"');
        })->paginate();

        return view('layouts.admin.modules.post.cat.index', compact('postCats'));
    }

    /**
     * Display a listing trash of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function trash()
    {
        $postCats = $this->repository->scopeQuery(function($query){
            return $query->where('status', '=', 'trashed');
        })->paginate();

        return view('layouts.admin.modules.post.cat.trash', compact('postCats'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('layouts.admin.modules.post.cat.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $this->service->create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $postCat = $this->repository->find($id);

        return view('layouts.admin.modules.post.cat.edit', compact('postCat'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        return $this->service->update($request->all(), $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @return Response
     */
    public function destroy(Request $request)
    {
        return $this->service->destroy($request->get('table_recordsId'));
    }
}
