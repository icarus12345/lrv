<?php

namespace App\Admin\Extensions\Action;

use Encore\Admin\Actions\RowAction;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Models\Coupon;

class PopupEdit extends RowAction
{
    public $name = 'Coupon Edit';
	
	public function form()
	{	
		$id = ($this->getKey());
		$row = ($this->getRow());
		
		$this->text('code', __('Code'))
			->rules('required|min:12|max:12')
			->value($row->code);
        $this->date('expried', __('Expried'))
			->value($row->expried);
        $this->text('value', __('Value'))
			->inputmask(['alias' => 'decimal'])
			->rules('required|numeric|min:0')
			->value($row->value);
        $this->select('type', __('Type'))
			->options([
				'Discount'=>'Discount',
				'Complimentary'=>'Complimentary',
				'Cash'=>'Cash'
			])
			->value($row->type)
			->rules('required');
	}
	
    public function handle(Model $model, Request $request)
    {
		try {
			if($model->fill($request->all())->save()){
				return $this->response()->success('Success message.')->refresh();
			}else{
				return $this->response()->error('Fail to update.');
			}
		} catch (Exception $e) {
			return $this->response()->error('Generating error: '.$e->getMessage());
		}
    }

}