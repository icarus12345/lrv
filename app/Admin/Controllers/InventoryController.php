<?php

namespace App\Admin\Controllers;

use App\Models\Inventory;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class InventoryController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'App\Models\Inventory';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Inventory);

        $grid->column('id', __('Id'));
        $grid->column('warehouse.name', __('Warehouse'));
        $grid->column('product.name', __('Product'));
        $grid->column('qty', __('Qty'));
        $grid->column('status', __('Status'));
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));
        $grid->batchActions(function ($actions) {
            $actions->disableDelete();
        });
        $grid->actions(function ($actions) {
            $actions->disableDelete();
            $actions->disableEdit();
            // $actions->disableView();
        });
        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(Inventory::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('warehouse_id', __('Warehouse'))->as(function ($id) {
            $name = $this->warehouse->name;
            return "{$name}";
        });
        $show->field('product_id', __('Product'))->as(function ($id) {
            $name = $this->product->name;
            return "{$name}";
        });
        $show->field('qty', __('Qty'));
        $show->field('status', __('Status'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));
        $show->panel()
            ->tools(function ($tools) {
                $tools->disableEdit();
                $tools->disableDelete();
            });;
        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Inventory);

        $form->select2('warehouse_id', __('Warehouse id'))
            ->options(\App\Models\Warehouse::all()->pluck('name', 'id'));
        $form->select2('product_id', __('Product id'))
            ->options(\App\Models\Product::all()->pluck('name', 'id'));
        $form->text2('qty', __('Qty'));
        

        return $form;
    }
}
