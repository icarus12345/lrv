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
<script src="/js/admin.product.js" data-exec-on-popstate></script>
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
</div>
<div id="tui-grid"></div>
<script>
    $(document).ready(function(){
        InitGrid()
    })
</script>
