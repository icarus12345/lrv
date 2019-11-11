@extends('mail.master')

@section('content')
<table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
    <tr>
        <td
            style="padding: 0 20px 40px 20px; font-family: sans-serif; font-size: 15px; line-height: 20px; color: #555555;">
            <h1 style="font-size: 20px; text-align: center;">New Contact Request</h1>

            <p>
                You have new contact request from {{$request->name}}
            </p>

            

            <p style="font-weight: bold; margin-top: 25px;">Request Information</p>
            <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
                <tr style="border-top: 1px solid #efefef; font-size: 13px;">
                    <td style="padding: 5px 5px 5px 5px;color: #999;">Name</td>
                    <td style="padding: 5px 5px 5px 5px;text-align: right;">{{$request->name}}</td>
                </tr>
                <tr style="border-top: 1px solid #efefef; font-size: 13px;">
                    <td style="padding: 5px 5px 5px 5px;color: #999;">Email</td>
                    <td style="padding: 5px 5px 5px 5px;text-align: right;">{{$request->email}}</td>
                </tr>
                <tr style="border-top: 1px solid #efefef; font-size: 13px;">
                    <td style="padding: 5px 5px 5px 5px;color: #999;">Subject</td>
                    <td style="padding: 5px 5px 5px 5px;text-align: right;">{{$request->subject}}</td>
                </tr>
                <tr style="font-size: 13px;border-top: 1px solid #efefef;">
                    <td style="padding: 5px;color: #999;">Message</td>
					<td style="padding: 5px;text-align: right;">{{$request->message}}</td>
                </tr>
                
            </table>

            
        </td>
    </tr>
</table>
@endsection