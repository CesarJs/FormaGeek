<?php

namespace Treina\Http\Controllers;

use Illuminate\Http\Request;

use Treina\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use Treina\Http\Requests\DietCreateRequest;
use Treina\Http\Requests\DietUpdateRequest;
use Treina\Repositories\DietRepository;
use Treina\Validators\DietValidator;

/**
 * Class DietsController.
 *
 * @package namespace Treina\Models\Http\Controllers;
 */
class DietsController extends Controller
{
    /**
     * @var DietsRepository
     */
    protected $repository;

    /**
     * @var DietsValidator
     */
    protected $validator;

    /**
     * DietsController constructor.
     *
     * @param DietsRepository $repository
     * @param DietsValidator $validator
     */
    public function __construct(DietRepository $repository, DietValidator $validator)
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
        $diets = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $diets,
            ]);
        }

        return view('diets.index', compact('diets'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  DietsCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(DietsCreateRequest $request)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $diet = $this->repository->create($request->all());

            $response = [
                'message' => 'Diets created.',
                'data'    => $diet->toArray(),
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
        $diet = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $diet,
            ]);
        }

        return view('diets.show', compact('diet'));
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
        $diet = $this->repository->find($id);

        return view('diets.edit', compact('diet'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  DietsUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(DietsUpdateRequest $request, $id)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $diet = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Diets updated.',
                'data'    => $diet->toArray(),
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
                'message' => 'Diets deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Diets deleted.');
    }
}
