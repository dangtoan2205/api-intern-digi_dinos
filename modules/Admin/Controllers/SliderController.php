<?php

namespace Modules\Admin\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\Admin\Requests\SliderRequest;
use Modules\Admin\Resources\SliderResource;
use Modules\Admin\Services\SliderService;
use Modules\Admin\Models\Slider;

class SliderController extends Controller
{
    /**
     * @var \Modules\Admin\Services\SliderService $sliderService SliderService.
     */
    protected $sliderService;
    
    /**
     * Slider controller construct.
     *
     * @param SliderService $sliderService SliderService.
     */
    public function __construct(
        SliderService $sliderService
    )
    {
        $this->sliderService = $sliderService;
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request Request param from FE.
     * @return mixed
     */
    public function index(Request $request)
    {
        try {
            $data = $request->all();
            $sliders = $this->sliderService->list($data);
            $result = SliderResource::collection($sliders);
            return response()->success($result);
        } catch (DDException $ex) {
            LogHelper::logTrace($ex);

            return response()->failure($ex->getMessage());
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param SliderRequest $request Request.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(SliderRequest $request)
    {
        $slider = $this->sliderService->createSlider($request);
        if ($slider) {
            $data = [
                'mess' => 'Create Successfully',
            ];
            return response()->json($data, 200);
        } else {
            return response()->json(['messer' => 'Create Failed']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param Slider $slider Slider.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Slider $slider)
    {
        try {
            $result = new SliderResource($slider);

            return response()->success($result);
        } catch (DDException $ex) {
            LogHelper::logTrace($ex);

            return response()->failure($ex->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param SliderRequest $request Request.
     * @param mixed         $id      ID of the resource to update.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(SliderRequest $request, $id)
    {
        $slider = $this->sliderService->editSlider($id, $request);

        if ($slider) {
            $data = [
                'mess' => 'Update Successfully',
            ];
            return response()->json($data, 200);
        } else {
            return response()->json(['messer' => 'Update Failed']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  mixed $id ID.
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $slider = $this->sliderService->destroySlider($id);
        if ($slider) {
            $data = [
                'mess' => 'Delete successfully',
            ];
            return response()->json($data, 200);
        } else {
            return response()->json(['mess' => 'Delete Failed']);
        }
    }
}
