<?php

namespace App\Http\Controllers\Admin;

use App\Model\Contract;
use App\Model\Invoice;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class InvoiceController extends Controller
{


    /**
     * Get All invoices
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        // get all invoices
        $invoices = Invoice::orderBy('id', 'DESC')
            ->join('admins', 'admins.id', '=', 'invoices.created_by')
            ->select('invoices.*', 'admins.username')
            ->get();;

        return view('admin.invoice.index', ['invoices' => $invoices]);
    }


    /**
     * View create Page
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $contracts = Contract::get();

        return view('admin.invoice.create', ['contracts' => $contracts]);
    }


    /**
     * Store Invoice in db
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {

        $this->validate($request, [
           'student' => 'required',
           'date' => 'required|date',
           'value' => 'required|numeric',
        ]);

        $contract = Contract::where('student_id', $request->input('student'))->first();

        if (!$contract) {
            Session::flash('error', 'Invalid Student Please Choose right student');
            return redirect()->back();
        }

        $invoice = new Invoice();
        $invoice->date = $request->input('date');
        $invoice->value = $request->input('value');
        $invoice->contract_id = $contract->id;
        $invoice->created_by = auth()->guard('admin')->user()->id;
        $invoice->active = 1;
        $invoice->save();

        Session::flash('success', 'Invoice Added Successfully');
        return redirect('admin/invoices');

    }


    /**
     * View page update invoice
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        // get data invoice by id
        $invoice = Invoice::find($id);
        // if invalid invoice by id
        if(!$invoice)
            abort(503);

        $contracts = Contract::get();

        return view('admin.invoice.edit', ['invoice' => $invoice, 'contracts' => $contracts]);
    }


    /**
     * update invoice
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        // get data invoice by id
        $invoice = Invoice::find($id);
        // if invalid invoice by id
        if(!$invoice)
            abort(503);

        $this->validate($request, [
            'student' => 'required',
            'date' => 'required|date',
            'value' => 'required|numeric',
        ]);

        $contract = Contract::where('student_id', $request->input('student'))->first();

        if (!$contract) {
            Session::flash('error', 'Invalid Student Please Choose right student');
            return redirect()->back();
        }

        $invoice->date = $request->input('date');
        $invoice->value = $request->input('value');
        $invoice->contract_id = $contract->id;
        $invoice->save();

        Session::flash('success', 'Invoice Updated Successfully');
        return redirect('admin/invoices');
    }


    /**
     * active invoice
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function active($id)
    {
        // get data invoice by id
        $invoice = Invoice::find($id);
        // if invalid invoice by id
        if(!$invoice)
            abort(503);

        $invoice->active = 1;
        $invoice->save();

        Session::flash('success', 'Invoice Activation Successfully');
        return redirect('admin/invoices');
    }


    /**
     * inactive invoice
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function inactive($id)
    {
        // get data invoice by id
        $invoice = Invoice::find($id);
        // if invalid invoice by id
        if(!$invoice)
            abort(503);

        $invoice->active = 0;
        $invoice->save();

        Session::flash('success', 'Invoice Inactivation Successfully');
        return redirect('admin/invoices');
    }

}
