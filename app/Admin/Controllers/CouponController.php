<?php

namespace App\Admin\Controllers;

use App\Models\Coupon;
use App\Admin\Controllers\AdminController;
use App\Admin\Extensions\MForm;
use Encore\Admin\Layout\Content;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Encore\Admin\Layout\Column;
use Encore\Admin\Layout\Row;
use App\Admin\Extensions\Action\PopupEdit;
class CouponController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'App\Models\Coupon';

    
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        
        $grid = new Grid(new Coupon);
        $grid->column('id', __('Id'));
        $grid->column('code', __('Code'));
        $grid->column('expried', __('Expried'));
        $grid->column('value', __('Value'));
        $grid->column('type', __('Type'));
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));
		$grid->actions(function ($actions) {
			//$actions->disableDelete();
			//$actions->disableEdit();
			// add action
			$actions->add(new PopupEdit);
			$actions->add(new \App\Admin\Extensions\Action\CouponEdit);
        });
        return function($row) use ($grid){
            $row->column(12, $grid);
            // $form = $this->form();
            // $form->setView('admin.form-modal');
            // $row->column(12, $form);

            //$column = new Column('<div id="pjax-form-modal"></div>', 12);

            //$row->addColumn($column);
        };
    }



    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(Coupon::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('code', __('Code'));
        $show->field('expried', __('Expried'));
        $show->field('value', __('Value'));
        $show->field('type', __('Type'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new MForm(new Coupon);

        $form->text('code', __('Code'))
            ->rules('required|min:12|max:12')
            ->attribute([
                'required'=>'',
                'pattern'=>"[0-9A-Za-z]{12,12}"
            ]);
        $form->date('expried', __('Expried'))
            ->default(date('Y-m-d'));
        $form->decimal('value', __('Value'))
            ->default(0.00)
            ->attribute([
                'style' => 'width: 110px;',
                //'required'=>'',
                'pattern'=>"[0-9.]+"
            ]);
        $form->select('type', __('Type'))->options([
			'Discount'=>'Discount',
			'Complimentary'=>'Complimentary',
			'Cash'=>'Cash'
        ])->rules('required')
        ->attribute([
            'required'=>'',
        ]);
        $form->setView('admin.form-modal');
        
        return $form;
    }
}
