<link rel="stylesheet" href="/packages/tui/tui-grid.css" />
<link rel="stylesheet" href="/packages/tui/tui-pagination.css" />
<link rel="stylesheet" href="/packages/tui/tui-date-picker/dist/tui-date-picker.css" />
<link rel="stylesheet" href="/packages/tui/tui-time-picker/dist/tui-time-picker.css" />
<script src="/packages/tui/tui-code-snippet.js"></script>
<script src="/packages/tui/tui-dom/dist/tui-dom.js"></script>
<script src="/packages/tui/tui-time-picker/dist/tui-time-picker.js"></script>
<script src="/packages/tui/tui-date-picker/dist/tui-date-picker.js"></script>
<script src="/packages/tui/tui-pagination.js"></script>
<script src="/packages/tui/tui-grid.js"></script>
<script src="/js/admin.order.js" data-exec-on-popstate></script>

<div style="min-height:40px">
    <div class="btn-group grid-select-all-btn" style="display:none">
        <span class="btn btn-sm btn-default hidden-xs"><span class="selected">5 items selected</span></span>
        <button type="button" class="btn btn-sm btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
            <span class="caret"></span>
            <span class="sr-only">Toggle Dropdown</span>
        </button>
        <ul class="dropdown-menu" role="menu">
            <li><a href="JavaScript:" class="grid-batch-delete">Batch delete </a></li>
        </ul>
    </div>
    <div class="btn-group pull-right">
        <a href="/admin/orders?_export_=all" target="_blank" class="btn btn-sm btn-twitter" title="Export"><i class="fa fa-download"></i><span class="hidden-xs"> Export</span></a>
    </div>
</div>
<div id="tui-grid"></div>

<script>
    $(document).ready(function(){
        InitOrderGrid()
    })
</script>

<div class="modal in" tabindex="-1" role="dialog" id="tui-grid-detail-modal" aria-hidden="false" data-keyboard="false">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Order Detail</h4>
            </div>
            <div class="modal-body">
                <div id="tui-grid-detail"></div>
            </div>
        </div>
<!-- /.modal-content -->
    </div>
<!-- /.modal-dialog -->
</div>