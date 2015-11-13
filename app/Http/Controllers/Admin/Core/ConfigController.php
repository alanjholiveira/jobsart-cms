<?php

namespace JobsArt\Http\Controllers\Admin\Core;

use Illuminate\Http\Request;

use JobsArt\Http\Requests;
use JobsArt\Http\Controllers\Controller;
use JobsArt\Services\Core\ConfigAdminService;


class ConfigController extends Controller
{
    /**
     * @var ConfigAdminService
     */
    private $configService;

    /**
     * @param ConfigAdminService $configService
     */
    public function __construct(ConfigAdminService $configService)
    {
        $this->configService = $configService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['active'] = '';
        $data = $this->data;
        return view('layouts.admin.config.index', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function update(Request $request)
    {
        $this->configService->update($request);

        return redirect()->route('admin.config.index');
    }


}
