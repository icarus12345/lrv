
var CurrencyFormatter = function(props){
    return new Intl.NumberFormat('vi-VN', {
        maximumSignificantDigits: Math.max(1, (+props.value).toString().length-2),
        style: 'currency',
        currency: 'VND',
        // currencyDisplay: '$',
    }).format(+props.value);
}
function ProductDropdownEditor(props){
    let self = this;
    self.selectedItem = null;
    var columnInfo = props.columnInfo;
    var display_field = columnInfo.display_field;
    var grid = props.grid;
    let $el = $([
        '<div class="tui-grid-editor-dropdown">',
        '   <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">',
        '       <span></span>',
        '       <span class="caret"></span>',
        '   </button>',
        '   <ul class="dropdown-menu tui-grid-cell-editor-contain">',
        '       <li class="tui-grid-dropdown-filter"><input type="text" placeholder="Search"/></li>',
        '   </ul>',
        '</div>'
    ].join(''));
    
    var el = $el[0];
    
    $el.find('input').on('keydown',(ev)=>{
        var keycode = ev.keyCode;
        switch(keycode){
            case 13:
                var item = $el.find('li.active').data('item')
                if(item) {
                    self.setSelectedItem(item)
                    self.handleChange();
                }
                break;
            case 38:
                ev.stopPropagation();
                ev.preventDefault();
                var prevEl
                if($el.find('li.active').length == 1){
                    prevEl = $el.find('li.active').prev();
                    if(prevEl && prevEl.hasClass('tui-grid-dropdown-filter')) prevEl = null;
                }else{
                    prevEl = $el.find('li:last-child');
                }
                if(prevEl && prevEl.length == 1){
                    $el.find('li.active').removeClass('active');
                    prevEl.addClass('active')
                    //self.setSelectedItem(prevEl.data('item'))
                }
                break;
            case 40:
                ev.stopPropagation();
                ev.preventDefault();
                var nextEl
                if($el.find('li.active').length == 1){
                    nextEl = $el.find('li.active').next();
                }else{
                    nextEl = $el.find('li:nth-child(2)');
                }
                if(nextEl && nextEl.length == 1){
                    $el.find('li.active').removeClass('active');
                    nextEl.addClass('active')
                    //self.setSelectedItem(nextEl.data('item'))
                }
                break;
            default:
                console.log(keycode)
                
        }
    })
    $el.find('input').on('input',(ev)=>{
        loadData()
    })
    $el.find('input').on('click  mouseup mousedown',(ev)=>{
        ev.stopPropagation();
        ev.preventDefault();
        ev.target.focus()
        return false;
    })
    $el.find('>button').keypress((ev)=>{
        console.log(ev)
    })
    $el.on('show.bs.dropdown', function () {
        setTimeout(()=>{$el.find('input')[0].focus()}, 120)
        console.log('show.bs.dropdown')
    })
    $el.on('hide.bs.dropdown', function () {
        console.log('hide.bs.dropdown')
    })
    var ajaxTimer, ajax;
    function loadData() {
        
        if(ajaxTimer) {
            clearTimeout(ajaxTimer);
            if(ajax) ajax.abort();
        }
        ajaxTimer = setTimeout(()=>{
            $el.find('>ul>li:not(:first-child)').remove();
            $el.find('>ul').append('<li class="tui-grid-searching">Searching...</li>');
            var value = $el.find('input').val();
            if(value == ''){
                productPromise.then((data)=>{
                    var items = data.contents;
                    renderItem(items);
                })
                return;
            }
            ajax = $.ajax({
                method: 'GET',
                url: '/api/admin/products',
                data: {
                    filter:[{
                        column: 'name',
                        value: value
                    }],
                    id: props.value
                },
                success: function(rs) {
                    var source = (rs.data.contents)
                    renderItem(source)
                },
                error: function(request) {
                    //reject(request);
                }
            })
        }, 800);
    }
    self.handleChange = ()=>{
        $el.trigger('change')
        el.dispatchEvent(
            new Event('change', {
                bubbles: true,
                cancelable: true,
                view: window,
        }));
    }
    function renderItem(items){
        $el.find('>ul>li:not(:first-child)').remove();
        let addOptions = ($el, items, level) => {
            items.map((c) => {

                if(c.id == props.value){
                    $el.find('>button>span:first-child').text(c.name);
                }
                let li = $([
                    '<li data-value="'+c.id+'">',
                    '   <a href="Javascript:"><span>'+c.name+'</span></a>',
                    '</li>',
                ].join(''));
                $el.append(li);
                li.data('item',c)
            })
            $el.find('li')
                .unbind('click')
                .click(function(ev){
                    $el.find('li.active').removeClass('active');
                    $(this).addClass('active')
                    self.setSelectedItem($(this).data('item'))
                    self.handleChange();
                })
            
        }
        if(items.length>0){
            addOptions($el.find('>ul'), items)
            $el.find('li.active').removeClass('active')
            if(self.selectedItem){
                $el.find('li[data-value="'+self.selectedItem.id+'"]').addClass('active')
            }
        }else{
            $el.find('>ul').append('<li class="tui-grid-searching">No data to display.</li>');
        }
        
    }
    var productPromise = new Promise(function(resolve, reject) {
        $.ajax({
            method: 'GET',
            url: '/api/admin/products',
            data: {
                id: props.value
            },
            success: function(rs) {
                resolve(rs.data)
            },
            error: function(request) {
                reject(request);
            }
        });
    });
    productPromise.then((data)=>{
        console.log(props,'props')
        var items = data.contents;
        self.setSelectedItem(data.selected);
        renderItem(items);
    })

    this.setSelectedItem = (item)=>{
        self.selectedItem = item;
        if(self.selectedItem){
            $el.find('>button>span:first-child').text(self.selectedItem.name);
        } else {
            $el.find('>button>span:first-child').text('Choose:');
        }
    }

    // Dispatch it.
        
    this.el = el;

    this.getElement = function() {
        return this.el;
    }

    this.getValue = function() {
        return self.selectedItem?self.selectedItem.id:null;
    }
    this.getData = function() {
        return self.selectedItem;
    }
    this.mounted = function() {
        $(this.el).find('>button').focus();
        var row = grid.getRow(props.rowKey)
        var displayText = row[display_field];
        $el.find('>button>span:first-child').text(displayText || 'Choose:');
        console.log(display_field,displayText,row,'sssss');
    }
}
var InitOrderGrid = () => {
    var onCellUpdated = (ev) => {
        return new Promise(function(resolve, reject){
            let row = grid.getRow(ev.rowKey)
            // let params = {}
            // params[ev.columnName] = ev.value;
            let data = {
                pk: row.id,
                name: ev.columnName,
                value: ev.value,
                _editable: 1,
                _token: $.admin.token,
            }
            grid.addCellClassName(ev.rowKey,ev.columnName, 'tui-grid-cell-loading')
            // NProgress.start()
            $.ajax({
                method: 'PUT',
                url: 'orders/' + row.id,
                data: data,
                complete: function(xhr, stat) {
                    grid.removeCellClassName(ev.rowKey,ev.columnName,'tui-grid-cell-loading')
                    resolve();
                },
                success: function(rs) {
                    //resolve(rs)
                    // NProgress.done();
                    Helper.Resolver(rs);
                },
                error: function(request) {
                    // NProgress.done()
                    Helper.Catcher(request)
                }
            });
        });
    }
    window.grid = new tui.Grid({
        el: document.getElementById('tui-grid'),
        rowHeight: 32,
        minRowHeight: 32,
        rowHeaders: [{
            type: 'rowNum',
            renderer: {
                type: function(props){
                    var itemsPerPage = props.grid.getPagination()._options.itemsPerPage;
                    var currentPage = props.grid.getPagination().getCurrentPage()
                    var start = currentPage*itemsPerPage - itemsPerPage
                    var el = document.createElement('span');
                    el.innerHTML = +props.formattedValue + start
                    this.el = el;
                    this.getElement = ()=> {
                        return this.el;
                    }
                
                    this.render = (props)=>{
                        el.innerHTML = +props.formattedValue + start
                    }
                }
            }
        },{
            type: 'checkbox',
            align: 'center',
            header: `
                <label for="all-checkbox" class="checkbox">
                    <input type="checkbox" id="all-checkbox" class="hidden-input" name="_checked" />
                    <span class="custom-input"></span>
                </label>
            `,
            renderer: {
                type: function(props) {
                    const { grid, rowKey } = props;
            
                    const label = document.createElement('label');
                    label.className = 'checkbox';
                    label.setAttribute('for', String(rowKey));
            
                    const hiddenInput = document.createElement('input');
                    hiddenInput.className = 'hidden-input';
                    hiddenInput.id = String(rowKey);
            
                    const customInput = document.createElement('span');
                    customInput.className = 'custom-input';
            
                    label.appendChild(hiddenInput);
                    label.appendChild(customInput);
            
                    hiddenInput.type = 'checkbox';
                    hiddenInput.addEventListener('change', () => {
                    if (hiddenInput.checked) {
                        grid.check(rowKey);
                    } else {
                        grid.uncheck(rowKey);
                    }
                    });
            
                    this.el = label;
            
                    
                    
                    this.getElement = function() {
                        return this.el;
                    }
                    
                    this.render = function(props) {
                        const hiddenInput = this.el.querySelector('.hidden-input');
                        const checked = Boolean(props.value);
                        
                        hiddenInput.checked = checked;
                    }
                    this.render(props);
                }
            }
        }],
        scrollX: true,
        scrollY: false,
        data: {
            api: {
                readData: {
                    url: '/api/admin/orders',
                    method: 'GET',
                },
                // createData: {
                //     url: '/api/createData',
                //     method: 'POST'
                // },
                // updateData: {
                //     url: '/api/updateData',
                //     method: 'PUT'
                // },
                // modifyData: {
                //     url: '/api/modifyData',
                //     method: 'PUT'
                // },
                deleteData: {
                    url: '/api/deleteData',
                    method: 'DELETE'
                }
            },
        },
        pageOptions: {
            perPage: (function(){
                var pageSize = 10;
                var newSize = Math.floor((window.innerHeight - 50 - 60 - 72 - 60 - 72) / 32)
                return Math.max(pageSize, newSize);
            }())
        },
        useClientSort: false,
        header: {
            // height: 100,
            filterRow: true,
            align: 'left',
            columns: [
                {
                    name: '_checked',
                    align: 'center'
                },{
                    name: 'amount',
                    align: 'right'
                },
                {
                    name: 'tax_amount',
                    align: 'right'
                },
                {
                    name: 'ship_amount',
                    align: 'right'
                },
                {
                    name: 'discount_amount',
                    align: 'right'
                },
                {
                    name: 'total_amount',
                    align: 'right'
                },
                {
                    name: 'total_item',
                    align: 'right'
                },
                {
                    name: 'flat_rate',
                    align: 'center'
                },
            ]
        },
        columnOptions: {
            frozenCount: 4,
            // frozenBorderWidth: 2,
            // minWidth: 300
        },
        columns: [{
                header: '#',
                name: 'id',
                className: "tui-grid-cell-action",
                width: 60,
                align: 'center',
                renderer: {
                    type: function(props) {
                        let self = this;
                        let $el = $([
                            '<div class="tui-grid-action-dropdown">',
                            '   <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">',
                            //'       Action',
                            '       <span class="glyphicon glyphicon-option-vertical"></span>',
                            '   </button>',
                            // '   <a href="orders/'+props.value+'/edit" type="button" class="btn btn-default" data-preview><i class="fa fa-pencil"></i></a>',
                            '   <a href="orders/'+props.value+'" type="button" class="btn btn-default" data-preview><i class="fa fa-eye"></i></a>',
                            '   <ul class="dropdown-menu -dropdown-menu-right">',
                            // '       <li><a href="orders/'+props.value+'/edit" ><i class="fa fa-pencil"></i> Edit</a></li>',
                            '       <li><a href="orders/'+props.value+'" ><i class="fa fa-eye"></i> Show</a></li>',
                            '       <li><a href="JavaScript:" data-action="delete"><i class="fa fa-trash"></i> Delete</a></li>',
                            '   </ul>',
                            '</div>'
                        ].join(''));
                        const el = $el[0];
                        this.el = el;
                        $el.find('[data-action="delete"]').click(()=>{
                            Helper.Encore_Admin_Grid_Actions_Delete({
                                id: props.value,
                                model: 'Order'
                            },()=>{
                                grid.reloadData()
                            })
                        })
                        //this.render(props);
                    
                        this.getElement = function() {
                            return this.el;
                        }
                    
                        this.render = function(props) {
                            //this.el.value = String(props.value);
                        }
                    
                        this.mounted = function() {
                            //this.el.select();
                        }
                    },
                }
            },{
                header: 'No',
                name: 'no',
                // filter: {
                //     type: 'text'
                // },
                // sortable: true,
                width: 100,
                renderer: {
                    type: function (props){
                        const { grid, rowKey } = props;
                
                        const el = document.createElement('a');
                        el.classList.add('tui-grid-cell-content')
                        el.onclick = (ev)=>{
                            console.log('Show Model',props)
                            var rowKey = props.rowKey;
                            var rowData = props.grid.getRow(rowKey)
                            $('#tui-grid-detail-modal').modal('show')
                            InitOrderDetailGrid(rowData.id)
                        }
                
                        this.el = el;
                        this.getElement = function() {
                            return this.el;
                        }
                
                        this.render = function (props) {
                            el.href = 'JavaScript:'
                            el.innerHTML = props.value
                        }
                        this.render(props);
                    }
                }
            },{
                header: 'Total Amount',
                name: 'total_amount',
                filter: {
                    type: 'text'
                },
                align: "right",
                sortable: true,
                width: 100,
                formatter: CurrencyFormatter
            
            },{
                header: 'Status',
                name: 'status',
                sortable: true,
                width: 80,
                //onAfterChange: onCellUpdated,
                onCellUpdate: onCellUpdated,
                editor: {
                    type: 'select',//NumberEditor,
                    options: {
                        listItems: [
                            {text: 'Requested', value: 'Requested'},
                            {text: 'Approved', value: 'Approved'},
                            {text: 'Unpaid', value: 'Unpaid'},
                            {text: 'Paid', value: 'Paid'},
                            {text: 'Shipping', value: 'Shipping'},
                            {text: 'Done', value: 'Done'},
                            {text: 'Canceled', value: 'Canceled'}
                        ]
                    }
                },
                filter: {
                    type: 'select',//CategoryEditor
                    source: [
                        {id: 'Requested', name: 'Requested'},
                        {id: 'Approved', name: 'Approved'},
                        {id: 'Unpaid', name: 'Unpaid'},
                        {id: 'Paid', name: 'Paid'},
                        {id: 'Shipping', name: 'Shipping'},
                        {id: 'Done', name: 'Done'},
                        {id: 'Canceled', name: 'Canceled'}
                    ],
                    // render: ()=>{
                    //     return ''
                    // }
                },
            },{
                header: 'Customer',
                name: 'name',
                filter: {
                    type: 'text'
                },
                sortable: true,
                width: 180,
            },{
                header: 'Company',
                name: 'company',
                filter: {
                    type: 'text'
                },
                sortable: true,
                width: 120,
            },{
                header: 'Email',
                name: 'email',
                filter: {
                    type: 'text'
                },
                sortable: true,
                width: 200,
            },{
                header: 'Street Address',
                name: 'street_address',
                filter: {
                    type: 'text'
                },
                sortable: true,
                width: 280,
            },{
                header: 'State City',
                name: 'state_city',
                filter: {
                    type: 'text'
                },
                sortable: true,
                width: 100,
            },{
                header: 'Country',
                name: 'country',
                filter: {
                    type: 'text'
                },
                sortable: true,
                width: 100,
            },{
                header: 'City',
                name: 'city',
                filter: {
                    type: 'text'
                },
                sortable: true,
                width: 100,
            },{
                header: 'Postcode/Zip',
                name: 'postcode_zip',
                filter: {
                    type: 'text'
                },
                sortable: true,
                width: 100,
            },{
                header: 'Phone',
                name: 'phone',
                filter: {
                    type: 'text'
                },
                sortable: true,
                width: 100,
            },{
                header: 'Coupon Code',
                name: 'coupon_code',
                filter: {
                    type: 'text'
                },
                sortable: true,
                width: 100,
            },{
                header: 'Amount',
                name: 'amount',
                filter: {
                    type: 'text'
                },
                align: "right",
                sortable: true,
                width: 100,
                formatter: CurrencyFormatter
            },{
                header: 'Tax Amount',
                name: 'tax_amount',
                filter: {
                    type: 'text'
                },
                align: "right",
                sortable: true,
                width: 100,
                formatter: CurrencyFormatter
            },{
                header: 'Ship Amount',
                name: 'ship_amount',
                filter: {
                    type: 'text'
                },
                align: "right",
                sortable: true,
                width: 100,
                formatter: CurrencyFormatter
            },{
                header: 'Flat Rate',
                name: 'flat_rate',
                filter: {
                    type: 'checkbox'
                },
                align: "center",
                sortable: true,
                width: 60,
                renderer: {
                    type: function (props){
                        const { grid, rowKey } = props;
                
                        const label = document.createElement('label');
                        label.className = 'checkbox';
                        label.setAttribute('for', String(rowKey));
                
                        const hiddenInput = document.createElement('input');
                        hiddenInput.className = 'hidden-input';
                        hiddenInput.id = String(rowKey);
                
                        const customInput = document.createElement('span');
                        customInput.className = 'custom-input';
                
                        label.appendChild(hiddenInput);
                        label.appendChild(customInput);
                
                        hiddenInput.type = 'checkbox';
                        hiddenInput.addEventListener('change', () => {
                        if (hiddenInput.checked) {
                            console.log('^^')
                            //grid.check(rowKey);
                        } else {
                            console.log('^^')
                            //grid.uncheck(rowKey);
                        }
                        });
                
                        this.el = label;
                
                        
                
                        this.getElement = function() {
                            return this.el;
                        }
                
                        this.render = function (props) {
                            const hiddenInput = this.el.querySelector('.hidden-input');
                            
                        }
                        this.render(props);
                        const checked = Boolean(props.value);
                    
                            hiddenInput.checked = checked;
                    }
                }
            },{
                header: 'Discount Amount',
                name: 'discount_amount',
                filter: {
                    type: 'text'
                },
                align: "right",
                sortable: true,
                width: 100,
                formatter: CurrencyFormatter
            
            },{
                header: 'Total Item',
                name: 'total_item',
                filter: {
                    type: 'text'
                },
                align: "right",
                sortable: true,
                width: 80,
            },{
                header: 'Currency',
                name: 'currency',
                filter: {
                    type: 'text'
                },
                sortable: true,
                width: 60,
            },
            
            
            
            {
				header: 'Created',
                name: 'created_at',
                width: 140,
                filter: {
                    type: 'date'
                },
			},
            
        ]
    });
    var onCheckedChange = function(ev){
        setTimeout(()=>{
            var checkedRows = grid.getCheckedRows();
            if(checkedRows.length){
                $('.grid-select-all-btn').show();
                $('.grid-select-all-btn>span>span').text(checkedRows.length + ' items');

            }else{
                $('.grid-select-all-btn').hide();

            }
        },42)
    }
    grid.on('check', onCheckedChange);
    grid.on('uncheck', onCheckedChange);
    grid.on('checkAll', onCheckedChange);
    grid.on('uncheckAll', onCheckedChange);
    $('.grid-batch-delete').click(()=>{
        swal({
            title: "Are you sure to delete this item ?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Confirm",
            showLoaderOnConfirm: true,
            cancelButtonText: "Cancel",
            preConfirm: function() {
                return new Promise(function(resolve, reject) {
                    NProgress.start()
                    var checkedIds = grid.getCheckedRows().map((row)=>row.id);
                    $.ajax({
                        method: 'post',
                        url: 'product/' + checkedIds.join(),
                        data: {
                            _method:'delete',
                            _token: LA.token
                        },
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
                    grid.reloadData()
                } else {
                    swal(data.message, '', 'error');
                }
            }else{
                swal('Oops !', '', 'error');
            }
        });
    })
}

var InitOrderDetailGrid = (id) => {
    if(window.gridDetail) gridDetail.destroy()
    window.gridDetail = new tui.Grid({
        el: document.getElementById('tui-grid-detail'),
        rowHeight: 32,
        minRowHeight: 32,
        rowHeaders: [{
            type: 'rowNum',
        }],
        scrollX: false,
        scrollY: false,
        data: {
            api: {
                readData: {
                    url: '/api/admin/orders-detail/'+id,
                    method: 'GET',
                },
            },
        },
        header: {
            align: 'left',
            height: 36,
            columns: [
                {
                    name: 'qty',
                    align: 'right'
                },
                {
                    name: 'price_with_discount',
                    align: 'right'
                },
                {
                    name: 'amount',
                    align: 'right'
                },
            ]
        },
        summary: {
			height: 32,
			position: 'bottom', // or 'top'
			columnContent: {
				amount: {
					template: function(valueMap) {
                        var value = new Intl.NumberFormat('vi-VN', {
                            maximumSignificantDigits: Math.max(1,valueMap.sum.toString().length-2),
                            style: 'currency',
                            currency: 'VND',
                            // currencyDisplay: '$',
                        }).format(+valueMap.sum);
						return `Σ: ${value}`;
					}
				}
			}
		},
        columns: [{
                header: 'Product',
                name: 'product_id',
                display_field: 'product_name',
                onBeforeChange: (ev)=>{
                },
                onAfterChange: (ev)=>{
                    var editor = ev.editor;
                    gridDetail.setValue(ev.rowKey,'product_name',editor.getData().name)
                },
                editor: {
                    // type: 'combobox',//
                    type: ProductDropdownEditor,
                    options: {
                        source: {
                            api : '/api/admin/products'
                        },
                        search: true
                    }
                },
            },{
                header: 'Color',
                width: 50,
                name: 'color',
                // editor: {type: 'image'}
            },{
                header: 'Size',
                width: 50,
                name: 'size',
            },{
                header: 'Qty',
                name: 'qty',
                width: 50,
                align: "right",
                editor: {
                    type: 'text',
                    options: {
                        attributes: {
                            //type: 'number',
                            required: "true",
                            style:'text-align:right;',
                            //min: 0,
                            //max: 100,
                            pattern: "^([1-9][0-9]{0,4})"
                        }
                    }
                },
                onAfterChange: (ev)=>{
                    var row = gridDetail.getRow(ev.rowKey)
                    var amount = row.price_with_discount * ev.value;
                    gridDetail.setValue(ev.rowKey,'amount', amount)
                },
            },{
                header: 'Sale Price',
                name: 'price_with_discount',
                align: "right",
                width: 100,
                formatter: CurrencyFormatter
            },{
                header: 'Amount',
                name: 'amount',
                align: "right",
                width: 100,
                formatter: function(props){
                    var row = props.row;
                    var value = row.qty * row.price_with_discount;
                    return new Intl.NumberFormat('vi-VN', {
                        maximumSignificantDigits: Math.max(1,value.toString().length-2),
                        style: 'currency',
                        currency: 'VND',
                        // currencyDisplay: '$',
                    }).format(+value);
                }
            },
            
        ]
    });
}