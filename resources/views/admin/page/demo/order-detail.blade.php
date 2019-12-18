<section class="invoice">
      <!-- title row -->
      <div class="row">
        <div class="col-xs-12">
          <h2 class="page-header">
            <i class="fa fa-globe"></i> {{$order->no}}
            <small class="pull-right">Date: {{$order->created_at}}</small>
          </h2>
        </div>
        <!-- /.col -->
      </div>
      <!-- info row -->
      <div class="row invoice-info">
        <div class="col-sm-4 invoice-col">
          Customer
          <address>
            <strong>{{$order->name}}</strong><br>
            {{$order->street_address}}<br>
            {{$order->city}}, {{$order->country}}<br>
            Phone: {{$order->phone}}<br>
            Email: {{$order->email}}
          </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
          <!-- To
          <address>
            <strong>John Doe</strong><br>
            795 Folsom Ave, Suite 600<br>
            San Francisco, CA 94107<br>
            Phone: (555) 539-1037<br>
            Email: john.doe@example.com
          </address> -->
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
          <b>Invoice #{{$order->no}}</b><br>
          <br>
          <b>Order ID:</b> 4F3S8J<br>
          <b>Payment Due:</b> 2/22/2014<br>
          <b>Account:</b> 968-34567
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- Table row -->
      <div class="row">
        <div class="col-xs-12 table-responsive">
          <table class="table table-striped">
            <thead>
            <tr>
              <th width="60">No.</th>
              <th>Product</th>
              <th width="100">Price</th>
              <th width="80">Qty</th>
              <th width="100">Subtotal</th>
            </tr>
            </thead>
            <tbody>
            @foreach($order->order_details as $stt => $od)
            <tr>
              <td>{{$stt + 1}}</td>
              <td>{{$od->product_name}}</td>
              <td>{!!$od->price_with_discount_format!!}</td>
              <td>{{$od->qty}}</td>
              <td class="text-right">{!!$od->amount_format!!}</td>
            </tr>
            @endforeach
            </tbody>
          </table>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <div class="row">
        <!-- accepted payments column -->
        <div class="col-xs-6">
          <p class="lead">Note:</p>
          <!-- <img src="../../dist/img/credit/visa.png" alt="Visa">
          <img src="../../dist/img/credit/mastercard.png" alt="Mastercard">
          <img src="../../dist/img/credit/american-express.png" alt="American Express">
          <img src="../../dist/img/credit/paypal2.png" alt="Paypal"> -->

          <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">{{$order->note}}</p>
        </div>
        <!-- /.col -->
        <div class="col-xs-6">
          <p class="lead">Amount Due 2/22/2014</p>

          <div class="table-responsive">
            <table class="table">
              <tbody><tr>
                <th style="width:50%">Subtotal:</th>
                <td>{{$order->amount}}</td>
              </tr>
              <tr>
                <th>Tax (10%)</th>
                <td>{{$order->tax_amount}}</td>
              </tr>
              <tr>
                <th>Shipping:</th>
                <td>{{$order->shiping_amount}}</td>
              </tr>
              <tr>
                <th>Discount:</th>
                <td>{{$order->discount_amount}}</td>
              </tr>
              <tr>
                <th>Total:</th>
                <td>{{$order->total_amount}}</td>
              </tr>
            </tbody></table>
          </div>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- this row will not appear when printing -->
      <div class="row no-print">
        <div class="col-xs-12">
          <a href="invoice-print.html" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
          <!-- <button type="button" class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> Submit Payment
          </button>
          <button type="button" class="btn btn-primary pull-right" style="margin-right: 5px;">
            <i class="fa fa-download"></i> Generate PDF
          </button> -->
        </div>
      </div>
      <br/>
                <ul class="timeline timeline-inverse">
                  @if($order->status == \App\Models\Order::STATUS_REQUESTED)
                    <li>
                      <i class="fa fa-check bg-green"></i>
                      <div class="timeline-item" style="border: none">
                        <button class="btn btn-default" onclick="ApproveOrder({{$order->id}})">Approve</button>
                      </div>
<script>
var ApproveOrder = (id) => {
    swal({
        title: "Are you sure to approve this order ?",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Confirm",
        showLoaderOnConfirm: true,
        cancelButtonText: "Cancel",
        preConfirm: function() {
            return new Promise(function(resolve, reject) {
                let data = {
                    pk: id,
                    name: 'status',
                    value: 'Approved',
                    _editable: 1,
                    _token: $.admin.token,
                }
                NProgress.start()
                $.ajax({
                    method: 'PUT',
                    url: '',
                    data: data,
                    complete: function(xhr, stat) {
                        NProgress.done();
                    },
                    success: function (data) {
                        resolve(data);
                    },
                    error: function(request) {
                        reject()
                        Helper.Catcher(request)
                    }
                });
            });
        }
    }).then(function(result) {
        var data = result.value;
        if (typeof data === 'object') {
            if (data.status) {
                swal(data.message, '', 'success');
                $.admin.reload();
            } else {
                swal(data.message, '', 'error');
            }
        }else{
            swal('Oops !', '', 'error');
        }
    });
}
</script>
                    </li>
                  @endif
                  @foreach($order->histories as $his)
                  <li>
                    @switch($his->type)
                        @case(\App\Models\Order::STATUS_PAID)
                            <i class="fa fa-money bg-blue"></i>
                            @break
                        @case(\App\Models\Order::STATUS_DONE)
                            <i class="fa fa-check bg-green"></i>
                            @break
                        @case(\App\Models\Order::STATUS_APPROVED)
                        <i class="fa fa-check bg-yellow"></i>
                        @break
                        @case(\App\Models\Order::STATUS_CANCELED)
                            <i class="fa fa-times bg-red"></i>
                            @break
                        @case(\App\Models\Order::STATUS_SHIPPING)
                            <i class="fa fa-truck bg-blue"></i>
                            @break
                        @default
                        <i class="fa fa-clock-o"></i>
                    @endswitch

                    <div class="timeline-item">
                      <span class="time"><i class="fa fa-clock-o"></i> {{$his->created_at}}</span>

                      <!-- <h3 class="timeline-header"><a href="#">Mina Lee</a> uploaded new photos</h3> -->

                      <div class="timeline-body">{{$his->message}}</div>
                    </div>
                  </li>
                  @endforeach

                  <li>
                    <i class="fa fa-clock-o bg-gray"></i>
                  </li>

                </ul>
    </section>
