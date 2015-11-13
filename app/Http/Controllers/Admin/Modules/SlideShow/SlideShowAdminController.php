<?php

namespace JobsArt\Http\Controllers\Admin\Modules\SlideShow;


use JobsArt\Entities\Modules\Slideshow;
use Illuminate\Http\Request;

use JobsArt\Http\Requests;
use JobsArt\Http\Controllers\Controller;
use JobsArt\Repositories\Modules\SlideShow\SlideShowRepository;

use JobsArt\Services\Core\PdfService;
use JobsArt\Services\Modules\SlideShow\SlideShowService;



class SlideShowAdminController extends Controller
{

    /**
     * @var SlideShowRepository
     */
    private $repository;

    /**
     * @var SlideShowService
     */
    private $service;

    /**
     * @var PdfService
     */
    private $pdfService;

    /**
     * @param SlideShowRepository $repository
     * @param SlideShowService $service
     * @param PdfService $pdfService
     */
    public function __construct(SlideShowRepository $repository, SlideShowService $service, PdfService $pdfService)
    {
        $this->repository = $repository;
        $this->service = $service;
        $this->pdfService = $pdfService;
    }


    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {

        $slides = $this->repository->scopeQuery(function($query){
            return $query->whereRaw('slideshow.status = "published" OR slideshow.status = "unpublished"');
        })->paginate();

        return view('layouts.admin.slideshow.index', compact('slides'));
    }

    /**
     * Display a listing trash of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function trash()
    {
        $slides = $this->repository->scopeQuery(function($query){
            return $query->where('status', '=', 'trash');
        })->paginate();

        return view('layouts.admin.slideshow.trash', compact('slides'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('layouts.admin.slideshow.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
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
        $slide = $this->repository->find($id);

        return view('layouts.admin.slideshow.edit', compact('slide'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return  Response
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

    /**
     * Create File Pdf
     *
     * @return \Illuminate\Http\Response
     */
    public function createPdf()
    {
        $slides = $this->repository->all();
        return $this->pdfService->downloadPdf('reports.users', $slides, 'slideshow');
    }

    /**
     * Create view Pdf
     *
     * @return \Illuminate\Http\Response
     */
    public function viewPdf()
    {
        $slides = $this->repository->all();
        return $this->pdfService->viewPdf('reports.users', $slides);
    }

}
