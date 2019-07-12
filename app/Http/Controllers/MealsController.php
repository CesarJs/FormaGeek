<?php

namespace Treina\Http\Controllers;

use Illuminate\Http\Request;

use Treina\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use Treina\Http\Requests\MealCreateRequest;
use Treina\Http\Requests\MealUpdateRequest;
use Treina\Repositories\MealRepository;
use Treina\Validators\MealValidator;

/**
 * Class MealsController.
 *
 * @package namespace Treina\Http\Controllers;
 */
class MealsController extends Controller
{
    /**
     * @var MealRepository
     */
    protected $repository;

    /**
     * @var MealValidator
     */
    protected $validator;

    /**
     * MealsController constructor.
     *
     * @param MealRepository $repository
     * @param MealValidator $validator
     */
    public function __construct(MealRepository $repository, MealValidator $validator)
    {
        $this->repository = $repository;
        $this->validator  = $validator;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
        $meals = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $meals,
            ]);
        }

        return view('meals.index', compact('meals'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  MealCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(MealCreateRequest $request)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $meal = $this->repository->create($request->all());

            $response = [
                'message' => 'Meal created.',
                'data'    => $meal->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->back()->with('message', $response['message']);
        } catch (ValidatorException $e) {
            if ($request->wantsJson()) {
                return response()->json([
                    'error'   => true,
                    'message' => $e->getMessageBag()
                ]);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $meal = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $meal,
            ]);
        }

        return view('meals.show', compact('meal'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $meal = $this->repository->find($id);

        return view('meals.edit', compact('meal'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  MealUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(MealUpdateRequest $request, $id)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $meal = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Meal updated.',
                'data'    => $meal->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->back()->with('message', $response['message']);
        } catch (ValidatorException $e) {

            if ($request->wantsJson()) {

                return response()->json([
                    'error'   => true,
                    'message' => $e->getMessageBag()
                ]);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleted = $this->repository->delete($id);

        if (request()->wantsJson()) {

            return response()->json([
                'message' => 'Meal deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Meal deleted.');
    }
}
