<?php

namespace Treina\Http\Controllers;

use Illuminate\Http\Request;

use Treina\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use Treina\Http\Requests\FoodCreateRequest;
use Treina\Http\Requests\FoodUpdateRequest;
use Treina\Repositories\FoodRepository;
use Treina\Validators\FoodValidator;

/**
 * Class FoodsController.
 *
 * @package namespace Treina\Models\Http\Controllers;
 */
class FoodsController extends Controller
{
    /**
     * @var FoodsRepository
     */
    protected $repository;

    /**
     * @var FoodsValidator
     */
    protected $validator;

    /**
     * FoodsController constructor.
     *
     * @param FoodsRepository $repository
     * @param FoodsValidator $validator
     */
    public function __construct(FoodRepository $repository, FoodValidator $validator)
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
        $foods = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $foods,
            ]);
        }

        return view('foods.index', compact('foods'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  FoodsCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(FoodCreateRequest $request)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);
            $data= $request->all();
            unset($data['_token']);
            $data['user_id']=\Auth::user()->id;
            $food = $this->repository->create($data);

            $response = [
                'message' => 'Alimento adicionado com sucesso!',
                'data'    => $food->toArray(),
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
        $food = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $food,
            ]);
        }

        return view('foods.show', compact('food'));
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
        $food = $this->repository->find($id);

        return view('foods.edit', compact('food'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  FoodsUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(FoodsUpdateRequest $request, $id)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $food = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Foods updated.',
                'data'    => $food->toArray(),
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
                'message' => 'Foods deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Foods deleted.');
    }
}
