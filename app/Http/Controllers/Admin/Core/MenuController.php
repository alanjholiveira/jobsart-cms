<?php

namespace JobsArt\Http\Controllers\admin;

use Illuminate\Http\Request;
use JobsArt\Http\Requests;
use JobsArt\Http\Controllers\Controller;
use JobsArt\Repositories\MenuAdminRepository;
use JobsArt\Services\MenuAdminService;

class MenuController extends Controller
{
    /**
     * @var MenuAdminRepository
     */
    private $menuAdminRepository;
    /**
     * @var MenuAdminService
     */
    private $menuAdminService;

    /**
     * @param MenuAdminRepository $menuAdminRepository
     * @param MenuAdminService $menuAdminService
     */
    public function __construct(MenuAdminRepository $menuAdminRepository, MenuAdminService $menuAdminService)
    {

        $this->menuAdminRepository = $menuAdminRepository;
        $this->menuAdminService = $menuAdminService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menus = $this->menuAdminRepository->paginate(10);

        return view('layouts.admin.menu.index', compact('menus'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
