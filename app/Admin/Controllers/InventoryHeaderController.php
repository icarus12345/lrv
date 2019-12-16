<?php

namespace App\Admin\Controllers;

use App\Models\InventoryHeader;
use App\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class InventoryHeaderController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Inventories';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new InventoryHeader);

        $grid->column('id', __('Id'));
        $grid->column('document_no', __('Document no'));
        $grid->column('title', __('Title'));
        $grid->column('posting_date', __('Posting date'));
        $grid->column('created_admin.name', __('Created by'));
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
        $show = new Show(InventoryHeader::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('document_no', __('Document no'));
        $show->field('title', __('Title'));
        $show->field('posting_date', __('Posting date'));
        $show->lines('Detail', function ($grid) {

            $grid->resource('/admin/inventory_lines');
        
            $grid->id();
            $grid->column('product.name', 'Product');
            $grid->column('warehouse.name', 'Warehouse');
            $grid->qty();
            $grid->disableTools();
            $grid->disableFilter();
            $grid->disableCreateButton();
            $grid->disableRowSelector();
            $grid->disableExport();
            $grid->disableActions();
        });
        $show->field('created_by', __('Created by'))->as(function ($admin_id) {
            $admin_name = $this->created_admin->name;
            return "{$admin_name}";
        });
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
        $form = new Form(new InventoryHeader);
        
        $form->text2('document_no', __('Document no'));
        $form->text2('title', __('Title'));
        $form->date2('posting_date', __('Posting date'))->default(date('Y-m-d'));
        $form->hasMany2('lines','Detail', function (Form\NestedForm $form) {
                $form->select2('warehouse_id', __('Warehouse'))
                    ->options(\App\Models\Warehouse::all()->pluck('name', 'id'));
                $form->select2('product_id', __('Product'))
                    ->options(\App\Models\Product::all()->pluck('name', 'id'));
                $form->text2('qty');
            })
            ->setFieldWidth([null,null,100])
            ->mode('table');
        return $form;
    }
}
