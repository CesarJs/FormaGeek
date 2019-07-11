<?php

namespace Treina\Http\Controllers;

use Illuminate\Http\Request;

use Treina\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use Treina\Http\Requests\MeasureCreateRequest;
use Treina\Http\Requests\MeasureUpdateRequest;
use \Treina\Repositories\MeasureRepository;
use \Treina\Validators\MeasureValidator;

/**
 * Class MeasuresController.
 *
 * @package namespace Treina\Models\Http\Controllers;
 */
class MeasuresController extends Controller
{
    /**
     * @var MeasuresRepository
     */
    protected $repository;

    /**
     * @var MeasuresValidator
     */
    protected $validator;

    /**
     * MeasuresController constructor.
     *
     * @param MeasuresRepository $repository
     * @param MeasuresValidator $validator
     */
    public function __construct(MeasureRepository $repository,  MeasureValidator $validator)
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
        $measures = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $measures,
            ]);
        }

        return view('measures.index', compact('measures'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  MeasuresCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(MeasureCreateRequest $request)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);
            $data= $request->all();
            unset($data['_token']);
            $data['user_id']=\Auth::user()->id;
            $measure = $this->repository->create($data);

            $response = [
                'message' => 'Medida cadastrada com sucesso!',
                'data'    => $measure->toArray(),
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
        $measure = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $measure,
            ]);
        }

        return view('measures.show', compact('measure'));
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
        $measure = $this->repository->find($id);

        return view('measures.edit', compact('measure'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  MeasuresUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(MeasuresUpdateRequest $request, $id)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $measure = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Measures updated.',
                'data'    => $measure->toArray(),
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
                'message' => 'Measures deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Measures deleted.');
    }
}
