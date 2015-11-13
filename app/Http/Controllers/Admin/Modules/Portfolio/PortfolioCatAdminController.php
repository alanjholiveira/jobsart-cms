<?php

namespace JobsArt\Http\Controllers\Admin\Modules\Portfolio;

use Illuminate\Http\Request;
use JobsArt\Http\Requests;
use JobsArt\Http\Controllers\Controller;
use JobsArt\Repositories\Modules\Portfolio\PortfolioCatRepository;
use JobsArt\Services\Modules\Portfolio\PortfolioCatService;

class PortfolioCatAdminController extends Controller
{
    /**
     * @var PortfolioCatRepository
     */
    private $repository;
    /**
     * @var PortfolioCatService
     */
    private $service;

    /**
     * @param PortfolioCatRepository $repository
     * @param PortfolioCatService $service
     */
    public function __construct(PortfolioCatRepository $repository, PortfolioCatService $service)
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
        $portfolioCats = $this->repository->scopeQuery(function($query){
            return $query->whereRaw('portfolio_cats.status = "published" OR portfolio_cats.status = "unpublished"');
        })->paginate();
        return view('layouts.admin.modules.portfolio.cat.index', compact('portfolioCats'));
    }

    /**
     * Display a listing trash of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function trash()
    {
        $portfolioCats = $this->repository->scopeQuery(function($query){
            return $query->where('status', '=', 'trash');
        })->paginate();

        return view('layouts.admin.modules.portfolio.cat.trash', compact('portfolioCats'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('layouts.admin.modules.portfolio.cat.create');
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
        $portfolioCat = $this->repository->find($id);

        return view('layouts.admin.modules.portfolio.cat.edit', compact('portfolioCat'));
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
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        return $this->service->destroy($request->get('table_recordsId'));
    }
}
