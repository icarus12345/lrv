@extends('mail.master')

@section('content')
<table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
    <tr>
        <td
            style="padding: 0 20px 40px 20px; font-family: sans-serif; font-size: 15px; line-height: 20px; color: #555555;">
            <h1 style="font-size: 20px; text-align: center;">New Order Request</h1>

            <p>
                You have new request from {{$order->full_name}}
            </p>

            <a href=""
                style="width: 40%;margin: 10px auto; text-align: center; display: block;padding: 15px 10px;background: #1DB47B;color: #fff;font-weight: bold;">
                View Detail
            </a>

            <p style="font-weight: bold; margin-top: 25px;">Customer Information</p>
            <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
                <tr style="border-top: 1px solid #efefef; font-size: 13px;">
                    <td style="padding: 5px 5px 5px 5px;color: #999;">Customer</td>
                    <td style="padding: 5px 5px 5px 5px;text-align: right;">{{$order->name}}</td>
                </tr>
                <tr style="border-top: 1px solid #efefef; font-size: 13px;">
                    <td style="padding: 5px 5px 5px 5px;color: #999;">Email</td>
                    <td style="padding: 5px 5px 5px 5px;text-align: right;">{{$order->email}}</td>
                </tr>
                <tr style="border-top: 1px solid #efefef; font-size: 13px;">
                    <td style="padding: 5px 5px 5px 5px;color: #999;">Phone</td>
                    <td style="padding: 5px 5px 5px 5px;text-align: right;">{{$order->phone}}</td>
                </tr>
                <tr style="font-size: 13px;border-top: 1px solid #efefef;">
                    <td style="padding: 5px;color: #999;">Company</td>
					<td style="padding: 5px;text-align: right;">{{$order->company}}</td>
                </tr>
                <tr style="font-size: 13px;border-top: 1px solid #efefef;">
                    <td style="padding: 5px;color: #999;">Address</td>
                    <td style="padding: 5px;text-align: right;">{{$order->street_address}}<br/>{{$order->other_address}}</td>
                </tr>
                <tr style="border-top: 1px solid #efefef;font-size: 13px;">
                    <td style="padding:  5px 5px 5px 5px;color: #999;">City</td>
                    <td style="padding:  5px 5px 5px 5px;text-align: right;">{{$order->city}}</td>
                </tr>
                <tr style="border-top: 1px solid #efefef;font-size: 13px;">
                    <td style="padding:  5px 5px 5px 5px;color: #999;">Country</td>
                    <td style="padding:  5px 5px 5px 5px;text-align: right;">{{$order->country}}</td>
                </tr>
                <tr style="border-top: 1px solid #efefef;font-size: 13px;">
                    <td style="padding:  5px 5px 5px 5px;color: #999;">State/City</td>
                    <td style="padding:  5px 5px 5px 5px;text-align: right;">{{$order->state_city}}</td>
                </tr>
                <tr style="border-top: 1px solid #efefef;font-size: 13px;">
                    <td style="padding:  5px 5px 5px 5px;color: #999;">Postcode/Zip</td>
                    <td style="padding:  5px 5px 5px 5px;text-align: right;">{{$order->postcode_zip}}</td>
                </tr>
            </table>

            <p style="font-weight: bold; margin-top: 25px;">Order Information</p>
            <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
                <tr style="border-top: 1px solid #efefef; font-size: 13px;">
                    <td style="padding: 5px 5px 5px 5px;color: #999;">Products</td>
                    <td style="padding: 5px 5px 5px 5px;color: #999;text-align: center;" width="120" colspan="2">Qty * Sale Price</td>
                    <td style="padding: 5px 5px 5px 5px;color: #999;text-align: right" width="100">Total</td>
                </tr>
                @foreach($order->order_details as $item)
                <tr style="font-size: 13px;border-top: 1px solid #efefef;">
                    <td style="padding: 5px 5px 5px 5px;">
                        <div>{{ $item->product->name}}</div>
                        @if($item->size || $item->color)
                        <span class="details">
                        @if($item->size){{$item->size}}, @endif
                        @if($item->color){{$item->color}}@endif
                        </span>
                        @endif
                    </td>
                    <td style="padding: 5px 5px 5px 5px;text-align: center;" colspan="2">{{$item->qty}}x{!!\App\Helpers::formatPrice($item->price_with_discount)!!}</td>
                    <td style="padding: 5px 5px 5px 5px;text-align: right;">{!! \App\Helpers::formatPrice($item->amount)!!}</td>
                </tr>
                @endforeach
                <tr style="font-size: 13px;border-top: 3px double #efefef;">
                    <td style="padding:5px;color: #999;font-weight: bold;">Subtotal</td>
                    <td style="padding: 5px;text-align: center;"></td>
                    <td style="padding: 5px;text-align: center;"></td>
                    <td style="padding: 5px;text-align: right;"><b>{!! \App\Helpers::formatPrice($order->amount)!!}</b></td>
                </tr>
                <tr style="font-size: 13px;border-top: 1px solid #efefef;">
                    <td style="padding:5px;color: #999;font-weight: bold;">Shiping</td>
                    <td style="padding: 5px;text-align: center;"></td>
                    <td style="padding: 5px;text-align: center;"></td>
                    <td style="padding: 5px;text-align: right;">
                        @if($order->flat_rate)
                        {!! \App\Helpers::formatPrice($order->ship_amount)!!}
                        @else
                        {!! \App\Helpers::formatPrice(0) !!}
                        @endif
                    </td>
                </tr>
                <tr style="font-size: 13px;border-top: 1px solid #efefef;">
                    <td style="padding:5px;color: #999;font-weight: bold;">Tax</td>
                    <td style="padding: 5px;text-align: center;"></td>
                    <td style="padding: 5px;text-align: center;"></td>
                    <td style="padding: 5px;text-align: right;">{!! \App\Helpers::formatPrice($order->tax_amount)!!}</td>
                </tr>
                <tr
                    style="border-top: 1px solid #efefef;font-size: 13px;background: #efefef; font-weight: bold;">
                    <td style="padding:5px;color: #999;">Billing Total</td>
                    <td style="padding: 5px;text-align: center;"></td>
                    <td style="padding: 5px;text-align: center;"></td>
                    <td style="padding: 5px;text-align: right;">{!! \App\Helpers::formatPrice($order->total_amount)!!}</td>
                </tr>
            
            </table>
        </td>
    </tr>
</table>
@endsection