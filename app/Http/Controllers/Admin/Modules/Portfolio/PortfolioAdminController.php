<?php

namespace JobsArt\Http\Controllers\Admin\Modules\Portfolio;

use Illuminate\Http\Request;
use JobsArt\Http\Requests;
use JobsArt\Http\Controllers\Controller;
use JobsArt\Repositories\Modules\Portfolio\PortfolioCatRepository;
use JobsArt\Repositories\Modules\Portfolio\PortfolioRepository;
use JobsArt\Services\Modules\Portfolio\PortfolioService;


class PortfolioAdminController extends Controller
{

    /**
     * @var PortfolioRepository
     */

    private $repository;

    /**
     * @var PortfolioService
     */
    private $service;


    /**
     * @param PortfolioRepository $repository
     * @param PortfolioService $service
     */
    public function __construct(PortfolioRepository $repository, PortfolioService $service)
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
        $portfolios = $this->repository->scopeQuery(function($query){
            return $query->whereRaw('portfolios.status = "published" OR portfolios.status = "unpublished"');
        })->paginate();
        return view('layouts.admin.modules.portfolio.index', compact('portfolios'));
    }

    /**
     * Display a listing trash of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function trash()
    {
        $portfolios = $this->repository->scopeQuery(function($query){
            return $query->where('status', '=', 'trash');
        })->paginate();

        return view('layouts.admin.modules.portfolio.trash', compact('portfolios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param PortfolioCatRepository $portfolioCatRepository
     * @return \Illuminate\Http\Response
     */
    public function create(PortfolioCatRepository $portfolioCatRepository)
    {
        $categories = $portfolioCatRepository->all(['name', 'id']);
//        $categories = $portfolioCatRepository->scopeQuery(function($query){
//            return $query->where('status', '=', 'published');
//        })->all();

        return view('layouts.admin.modules.portfolio.create', compact('categories'));
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
     * @param PortfolioCatRepository $portfolioCatRepository
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(PortfolioCatRepository $portfolioCatRepository, $id)
    {
        $categories = $portfolioCatRepository->all(['name', 'id']);
        $portfolio = $this->repository->find($id);

        return view('layouts.admin.modules.portfolio.edit', compact('portfolio', 'categories'));
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
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        return $this->service->destroy($request->get('table_recordsId'));
    }
}
