<?php

namespace Modules\Ipayu\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Ipayu\Entities\CreditCard;
use Modules\Ipayu\Http\Requests\CreateCreditCardRequest;
use Modules\Ipayu\Http\Requests\UpdateCreditCardRequest;
use Modules\Ipayu\Repositories\CreditCardRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;

class CreditCardController extends AdminBaseController
{
    /**
     * @var CreditCardRepository
     */
    private $creditcard;

    public function __construct(CreditCardRepository $creditcard)
    {
        parent::__construct();

        $this->creditcard = $creditcard;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //$creditcards = $this->creditcard->all();

        return view('ipayu::admin.creditcards.index', compact(''));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('ipayu::admin.creditcards.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateCreditCardRequest $request
     * @return Response
     */
    public function store(CreateCreditCardRequest $request)
    {
        $this->creditcard->create($request->all());

        return redirect()->route('admin.ipayu.creditcard.index')
            ->withSuccess(trans('core::core.messages.resource created', ['name' => trans('ipayu::creditcards.title.creditcards')]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  CreditCard $creditcard
     * @return Response
     */
    public function edit(CreditCard $creditcard)
    {
        return view('ipayu::admin.creditcards.edit', compact('creditcard'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  CreditCard $creditcard
     * @param  UpdateCreditCardRequest $request
     * @return Response
     */
    public function update(CreditCard $creditcard, UpdateCreditCardRequest $request)
    {
        $this->creditcard->update($creditcard, $request->all());

        return redirect()->route('admin.ipayu.creditcard.index')
            ->withSuccess(trans('core::core.messages.resource updated', ['name' => trans('ipayu::creditcards.title.creditcards')]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  CreditCard $creditcard
     * @return Response
     */
    public function destroy(CreditCard $creditcard)
    {
        $this->creditcard->destroy($creditcard);

        return redirect()->route('admin.ipayu.creditcard.index')
            ->withSuccess(trans('core::core.messages.resource deleted', ['name' => trans('ipayu::creditcards.title.creditcards')]));
    }
}
