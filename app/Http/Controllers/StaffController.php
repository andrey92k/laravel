<?php

namespace App\Http\Controllers;

use App\Repositories\StaffRepository;
use Illuminate\Http\Request;

class StaffController extends Controller
{

    /**
     * @var StaffRepository
     */
    private $staffRepository;

    /**
     * StaffController constructor.
     * @param StaffRepository $staffRepository
     */
    public function __construct(StaffRepository $staffRepository)
    {
        $this->staffRepository = $staffRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $staffs = $this->staffRepository->getAllWithStaff($request);

        return view('staff', compact('staffs'));
    }

    /**
     * @param string $departmentSlug
     * @param Request $request
     * @return array|\Illuminate\Contracts\View\Factory|\Illuminate\View\View|mixed
     */
    public function showByDepartment(string $departmentSlug, Request $request)
    {
        $staffs = $this->staffRepository->getWithDepartment($departmentSlug, $request);
                       
        return view('staff', compact('staffs'));
    }
}
