<?php

namespace App\Http\Controllers;

use App\Services\HomeService;
use Modules\Admin\Services\CustomerService;
use Modules\Admin\Services\Map\MapService;
use Modules\Admin\Services\ModuleImageService;
use Modules\Admin\Services\ModuleService;
use Modules\Admin\Services\PortfolioService;
use Modules\Admin\Services\ProcessService;
use Modules\Admin\Services\RecruitmentPositionService;
use Modules\Admin\Services\RecruitmentService;
use Modules\Admin\Services\ServiceService;
use Modules\Admin\Services\SliderService;

class HomeController extends Controller
{
    /**
     *
     * @var CustomerService            $customerService            CustomerService.
     * @var MapService                 $mapService                 MapService.
     * @var ModuleImageService         $moduleImageService         ModuleImageService.
     * @var ModuleService              $moduleService              ModuleService.
     * @var PortfolioService           $portfolioService           PortfolioService.
     * @var ProcessService             $processService             ProcessService.
     * @var RecruitmentPositionService $recruitmentPositionService RecruitmentPositionService.
     * @var RecruitmentService         $recruitmentService         RecruitmentService.
     * @var ServiceService             $serviceService             ServiceService.
     * @var SliderService              $sliderService              SliderService.
     */
    protected $customerService;
    protected $sliderService;
    protected $serviceService;
    protected $mapService;
    protected $portfolioService;
    protected $processService;
    protected $moduleService;
    protected $moduleImageService;
    protected $recruitmentService;
    protected $recruitmentPositionService;

    /**
     * Customer controller construct.
     *
     * @param CustomerService            $customerService            CustomerService.
     * @param SliderService              $sliderService              SliderService.
     * @param ServiceService             $serviceService             ServiceService.
     * @param MapService                 $mapService                 MapService.
     * @param PortfolioService           $portfolioService           PortfolioService.
     * @param ProcessService             $processService             ProcessService.
     * @param ModuleService              $moduleService              ModuleService.
     * @param ModuleImageService         $moduleImageService         ModuleImageService.
     * @param RecruitmentService         $recruitmentService         RecruitmentService.
     * @param RecruitmentPositionService $recruitmentPositionService RecruitmentPositionService.
     */
    public function __construct(
        CustomerService $customerService,
        SliderService $sliderService,
        ServiceService $serviceService,
        MapService $mapService,
        PortfolioService $portfolioService,
        ProcessService $processService,
        ModuleService $moduleService,
        ModuleImageService $moduleImageService,
        RecruitmentService $recruitmentService,
        RecruitmentPositionService $recruitmentPositionService
    )
    {
        $this->customerService = $customerService;
        $this->sliderService = $sliderService;
        $this->serviceService = $serviceService;
        $this->mapService = $mapService;
        $this->portfolioService = $portfolioService;
        $this->processService = $processService;
        $this->moduleService = $moduleService;
        $this->moduleImageService = $moduleImageService;
        $this->recruitmentService = $recruitmentService;
        $this->recruitmentPositionService = $recruitmentPositionService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return mixed
     */
    public function index()
    {
//        $sliders = $this->sliderService->getAll();
//        foreach ($sliders as $slider){
//            dd($slider->image_url);
//        }
        return view('home.index', [
            'customers' => $this->customerService->getAll(),
            'sliders' => $this->sliderService->getSliders(),
            'servicePCTop' => $this->serviceService->getServicePCTop(),
            'servicePCBottom' => $this->serviceService->getServicePCBottom(),
            'serviceMobile' => $this->serviceService->getServiceMobile(),
            'maps' => $this->mapService->getAll(),
            'portfolios' => $this->portfolioService->getAll(),
            'processes' => $this->processService->getAll(),
            'modules' => $this->moduleService->getAll(),
            'moduleImages' => $this->moduleImageService->getAll(),
            'recruitments' => $this->recruitmentService->getAll(),
            'recruitmentPositions' => $this->recruitmentPositionService->getAll(),
        ]);
    }
}
