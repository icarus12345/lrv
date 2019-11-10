<?php

namespace App\Admin\Controllers;

use App\Models\Order;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class OrderController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'App\Models\Order';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Order);

        $grid->column('id', __('Id'));
        $grid->column('no', __('No'));
        $grid->column('full_name', __('Customer'));
        $grid->column('company', __('Company'));
        $grid->column('email', __('Email'));
        $grid->column('street_address', __('Street address'));
        $grid->column('other_address', __('Other address'));
        $grid->column('state_city', __('State city'));
        $grid->column('country', __('Country'));
        $grid->column('city', __('City'));
        $grid->column('postcode_zip', __('Postcode zip'));
        $grid->column('phone', __('Phone'));
        $grid->column('coupon_id', __('Coupon id'));
        $grid->column('amount', __('Amount'));
        $grid->column('tax_amount', __('Tax amount'));
        $grid->column('flat_rate', __('Flat rate'));
        $grid->column('ship_amount', __('Ship amount'));
        $grid->column('discount_amount', __('Discount amount'));
        $grid->column('total_amount', __('Total amount'));
        $grid->column('total_item', __('Total item'));
        $grid->column('currency', __('Currency'));
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));
        $grid->column('status', __('Status'))
            ->editable('select', [
                'Requested' => 'Requested',
                'Approved' => 'Approved',
                'Unpaid' => 'Unpaid',
                'Paid' => 'Paid',
                'Shipping' => 'Shipping',
                'Done' => 'Done',
                'Canceled' => 'Canceled'
            ]);
        $grid->fixColumns(4, -2);
        $grid->model()->orderBy('id', 'desc');
        $grid->disableCreateButton();
        $grid->actions(function ($actions) {
            // $actions->disableDelete();
            $actions->disableEdit();
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
        $show = new Show(Order::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('user_id', __('User id'));
        $show->field('first_name', __('First name'));
        $show->field('last_name', __('Last name'));
        $show->field('company', __('Company'));
        $show->field('email', __('Email'));
        $show->field('street_address', __('Street address'));
        $show->field('other_address', __('Other address'));
        $show->field('state_city', __('State city'));
        $show->field('country', __('Country'));
        $show->field('city', __('City'));
        $show->field('postcode_zip', __('Postcode zip'));
        $show->field('phone', __('Phone'));
        $show->field('coupon_id', __('Coupon id'));
        $show->field('amount', __('Amount'));
        $show->field('tax_amount', __('Tax amount'));
        $show->field('flat_rate', __('Flat rate'));
        $show->field('ship_amount', __('Ship amount'));
        $show->field('discount_amount', __('Discount amount'));
        $show->field('total_amount', __('Total amount'));
        $show->field('total_item', __('Total item'));
        $show->field('currency', __('Currency'));
        $show->field('status', __('Status'));
        $show->order_details('OrderDetail', function ($order_detail) {

            //$order_detail->resource('/admin/order_detail');

            $order_detail->id();
            $order_detail->product_name('Product');
            $order_detail->color('Color');
            $order_detail->size('Size');
            $order_detail->qty('Qty');
            $order_detail->price_with_discount('Sale Price');
            // $order_detail->created_at();
            // $order_detail->updated_at();
            $order_detail->disableCreateButton();
            $order_detail->disableActions();
            $order_detail->disableRowSelector();
            
        });
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));
        $show->panel()
            ->tools(function ($tools) {
                $tools->disableEdit();
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
        $form = new Form(new Order);

        $form->number('user_id', __('User id'));
        $form->text('first_name', __('First name'));
        $form->text('last_name', __('Last name'));
        $form->text('company', __('Company'));
        $form->email('email', __('Email'));
        $form->text('street_address', __('Street address'));
        $form->text('other_address', __('Other address'));
        $form->text('state_city', __('State city'));
        $form->text('country', __('Country'));
        $form->text('city', __('City'));
        $form->text('postcode_zip', __('Postcode zip'));
        $form->mobile('phone', __('Phone'));
        $form->number('coupon_id', __('Coupon id'));
        $form->decimal('amount', __('Amount'))->default(0.00);
        $form->decimal('tax_amount', __('Tax amount'))->default(0.00);
        $form->switch('flat_rate', __('Flat rate'));
        $form->decimal('ship_amount', __('Ship amount'))->default(0.00);
        $form->decimal('discount_amount', __('Discount amount'))->default(0.00);
        $form->decimal('total_amount', __('Total amount'))->default(0.00);
        $form->number('total_item', __('Total item'));
        $form->text('currency', __('Currency'));
        $form->text('status', __('Status'))->default('Requested');

        return $form;
    }
}
