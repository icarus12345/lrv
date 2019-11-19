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
        var actionResolver = function (data) {

            var response = data;
                
            if (typeof response !== 'object') {
                return $.admin.swal({type: 'error', title: 'Oops!'});
            }
            if(response.status){
                toastr.success(response.message)
            }else if(response.errors){
                let messages = []
                for (var key in response.errors) {
                    messages.push(response.errors[key])
                }
                toastr.error(messages.join('<br/>'))
            }else if(response.message){
                toastr.warning(response.message)
            }else{

            }
            
        };
        
        var actionCatcher = function (request) {
            if (request && typeof request.responseJSON === 'object') {
                actionResolver(request.responseJSON)
            }
        };
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
                let form = modal.find('form');
                form.attr('pjax-container',null)
                modal.find('form button[type="submit"]').attr('type','button')
                    .click((e)=>{
                        form.addClass('was-validated');
                        if (form[0].checkValidity() === false) {
                            return;
                        }

                        
                        var process = new Promise(function (resolve,reject) {
                            let data = {}
                            //Object.assign(data, {
                            //    _token: $.admin.token,
                            //    _action: 'App_Admin_Extensions_Action_PopupEdit',
                            //});
                            
                            var formData = new FormData(form[0]);
                            for (var key in data) {
                                formData.append(key, data[key]);
                            }
                            
                            $.ajax({
                                method: 'POST',
                                url: form[0].action,
                                data: formData,
                                cache: false,
                                contentType: false,
                                processData: false,
                                success: function (data) {
                                    resolve(data);
                                    if (data.status === true) {
                                        modal.remove();
                                        $.admin.reload();
                                    }
                                },
                                error:function(request){
                                    reject(request);
                                }
                            });
                        });
                        process.then(actionResolver).catch(actionCatcher);
                        
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