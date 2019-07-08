<?php

namespace Treina\Http\Controllers;

use Illuminate\Http\Request;

use Treina\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use Treina\Http\Requests\MetabolismCreateRequest;
use Treina\Http\Requests\MetabolismUpdateRequest;
use Treina\Repositories\MetabolismRepository;
use Treina\Validators\MetabolismValidator;

/**
 * Class MetabolismsController.
 *
 * @package namespace Treina\Http\Controllers;
 */
class MetabolismsController extends Controller
{
    /**
     * @var MetabolismRepository
     */
    protected $repository;

    /**
     * @var MetabolismValidator
     */
    protected $validator;

    /**
     * MetabolismsController constructor.
     *
     * @param MetabolismRepository $repository
     * @param MetabolismValidator $validator
     */
    public function __construct(MetabolismRepository $repository, MetabolismValidator $validator)
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
        $metabolisms = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $metabolisms,
            ]);
        }

        return view('metabolisms.index', compact('metabolisms'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  MetabolismCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(MetabolismCreateRequest $request)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $metabolism = $this->repository->create($request->all());

            $response = [
                'message' => 'Metabolism created.',
                'data'    => $metabolism->toArray(),
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
        $metabolism = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $metabolism,
            ]);
        }

        return view('metabolisms.show', compact('metabolism'));
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
        $metabolism = $this->repository->find($id);

        return view('metabolisms.edit', compact('metabolism'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  MetabolismUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(MetabolismUpdateRequest $request, $id)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $metabolism = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Metabolism updated.',
                'data'    => $metabolism->toArray(),
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
                'message' => 'Metabolism deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Metabolism deleted.');
    }
}
