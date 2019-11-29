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
<div id="tui-grid"></div>

<script>
    $(document).ready(function(){
        InitOrderGrid()
    })
</script>

<div class="modal in" tabindex="-1" role="dialog" id="tui-grid-detail-modal" aria-hidden="false">
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