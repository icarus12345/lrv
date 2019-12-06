
<div class="row">
    <div class="col-sm-3">
        <div class="box">
            <div class="box-header with-border">
                <h4 class="box-title">New Orders</h4>
                <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body" style="text-align: center;font-size:30px">
                {{\App\Services\Analytics::countNewOrder()}}
            </div>
            <!-- /.box-body -->
        </div>
    </div>
    <div class="col-sm-3">
        <div class="box">
            <div class="box-header with-border">
                <h4 class="box-title">Pending Orders</h4>
                <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body" style="text-align: center;font-size:30px">
                {{\App\Services\Analytics::countPendingOrder()}}
            </div>
            <!-- /.box-body -->
        </div>
    </div>
    <div class="col-sm-3">
        <div class="box">
            <div class="box-header with-border">
                <h4 class="box-title">Orders this month</h4>
                <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body" style="text-align: center;font-size:30px">
                {{\App\Services\Analytics::countOrderThisMonth()}}
            </div>
            <!-- /.box-body -->
        </div>
    </div>
    <div class="col-sm-3">
        <div class="box">
            <div class="box-header with-border">
                <h4 class="box-title">All Orders</h4>
                <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body" style="text-align: center;font-size:30px">
                {{\App\Services\Analytics::countOrder()}}
            </div>
            <!-- /.box-body -->
        </div>
    </div>
</div>