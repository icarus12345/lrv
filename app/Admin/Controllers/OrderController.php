<?php

namespace App\Admin\Controllers;

use App\Models\Order;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
Use Encore\Admin\Widgets\Table;

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
        $grid->column('no', __('No'))
			->filter()
			->modal('OrderDetail', function ($model) {

				$order_details = $model->order_details()->take(10)->get()->map(function ($order_detail) {
					return $order_detail->only(['id', 'product_name', 'color','size','qty','price_with_discount']);
				});

				return new Table(['ID', 'Product', 'Color','Size','Qty','Price'], $order_details->toArray());
			});
        $grid->column('name', __('Customer'))
			->filter();
        $grid->column('company', __('Company'))
            ->filter()
            ->hide();
        $grid->column('email', __('Email'))
			->filter();
        $grid->column('street_address', __('Street address'))
			->filter();
        $grid->column('other_address', __('Other address'))
            ->filter()
            ->hide();
        $grid->column('state_city', __('State city'))
            ->filter()
            ->hide();
        $grid->column('country', __('Country'))
            ->filter()
            ->hide();
        $grid->column('city', __('City'))
            ->filter()
            ->hide();
        $grid->column('postcode_zip', __('Postcode zip'))
            ->filter()
            ->hide();
        $grid->column('phone', __('Phone'))
			->filter();
        $grid->column('coupon_code', __('Coupon Code'))
			->filter();
        $grid->column('amount', __('Amount'))
			->filter('range');
        $grid->column('tax_amount', __('Tax amount'))
			->filter('range');
        $grid->column('flat_rate', __('Flat rate'));
        $grid->column('ship_amount', __('Ship amount'));
        $grid->column('discount_amount', __('Discount amount'));
        $grid->column('total_amount', __('Total amount'))
			->filter('range');
        $grid->column('total_item', __('Total item'));
        $grid->column('currency', __('Currency'))
			->filter([
				'VND' => 'VND',
                'USD' => 'USD',
			]);
        
        //$grid->column('updated_at', __('Updated at'));
        $grid->column('status', __('Status'))
            ->editable('select', [
                'Requested' => 'Requested',
                'Approved' => 'Approved',
                'Unpaid' => 'Unpaid',
                'Paid' => 'Paid',
                'Shipping' => 'Shipping',
                'Done' => 'Done',
                'Canceled' => 'Canceled'
            ])->filter([
				'Requested' => 'Requested',
                'Approved' => 'Approved',
                'Unpaid' => 'Unpaid',
                'Paid' => 'Paid',
                'Shipping' => 'Shipping',
                'Done' => 'Done',
                'Canceled' => 'Canceled'
			]);
		$grid->column('created_at', __('Created at'))
            ->filter('range', 'datetime');
        $grid->fixColumns(4, -3);
        $grid->model()->orderBy('id', 'desc');
        $grid->disableCreateButton();
        $grid->actions(function ($actions) {
            // $actions->disableDelete();
            $actions->disableEdit();
        });
		$grid->filter(function($filter){

			// Remove the default id filter
			$filter->disableIdFilter();

			// Add a column filter
			$filter->where(function ($query) {

				$query->where('first_name', 'like', "%{$this->input}%")
					->orWhere('last_name', 'like', "%{$this->input}%");

			}, 'Full Name');
			

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
        $show->field('name', __('Full name'));
        $show->field('company', __('Company'));
        $show->field('email', __('Email'));
        $show->field('street_address', __('Street address'));
        $show->field('other_address', __('Other address'));
        $show->field('state_city', __('State city'));
        $show->field('country', __('Country'));
        $show->field('city', __('City'));
        $show->field('postcode_zip', __('Postcode zip'));
        $show->field('phone', __('Phone'));
        $show->field('coupon_code', __('Coupon Code'));
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
        $form->text('name', __('Full name'));
        $form->text('company', __('Company'));
        $form->email('email', __('Email'));
        $form->text('street_address', __('Street address'));
        $form->text('other_address', __('Other address'));
        $form->text('state_city', __('State city'));
        $form->text('country', __('Country'));
        $form->text('city', __('City'));
        $form->text('postcode_zip', __('Postcode zip'));
        $form->mobile('phone', __('Phone'));
        $form->number('coupon_code', __('Coupon Code'));
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
