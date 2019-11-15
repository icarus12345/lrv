<?php

namespace App\Admin\Extensions\Action;

use Encore\Admin\Actions\RowAction;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Models\Coupon;

class CouponEdit extends RowAction
{
    public $name = 'Edit';
	
	public function form($model)
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
	
	
	protected function script()
    {
        $url = route('coupons.edit',['coupon'=>$this->getKey()]);
        $script = <<<SCRIPT
        console.log('AA');
        $('.grid-action-coupon-edit[data-id="{$this->getKey()}"]').on('click',(e)=>{
            let id = {$this->getKey()};

            $.ajax({
                method: "GET",
                url: "{$url}", 
                data: {
                    _token: LA.token
                }
                //container: '#pjax-form-modal'
            }).done((response)=>{
                let modal = $(response).find('#pjax-form-modal>div')
                $('body').append(modal)
                modal
                    .addClass('modal flex-modal')
                    .modal('show')
                console.log(event)
                $(response).find("script[data-exec-on-popstate]").each(function () {
                    $.globalEval(this.text || this.textContent || this.innerHTML || '');
                });
                modal.find('form').on('submit',(e)=>{
                    e.stopPropagation();
                    e.preventDefault();
                    let data = $(e.target).serializeJSON();
                    data._editable = true;
                    $.ajax({
                        url: '/admin/coupons/4',
                        method : 'POST',
                        data: data
                    }).done((response)=>{
                        console.log(response);
                    });
                })
            });
            
            
            //  $(document).on('submit', 'form', function(event) {
            //    var container = $(this).closest('[data-pjax-container]')
            //    $.pjax.submit(event, container)
            //  })
        });
SCRIPT;
        return $script;
    }

    public function render()
    {
        \Admin::script($this->script());
        $url = route('coupons.edit',['coupon'=>$this->getKey()]);
        return "<a href=\"JavaScript:\" class=\"grid-action-coupon-edit\" data-id=\"{$this->getKey()}\"><i class=\"fa fa-pencil\"></i>Edit</a>";
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