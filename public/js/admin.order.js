var categoryPromise = window.categoryPromise || new Promise(function(resolve, reject) {
    $.ajax({
        method: 'GET',
        url: '/api/admin/categories/gid',
        success: function(rs) {
            resolve(rs)
        },
        error: function(request) {
            reject(request);
        }
    });
});


var ImageEditor = function(props) {
    let self = this;
    let $el = $([
        '<div class="tui-grid-editor-dropdown tui-grid-editor-file">',
        '   <button type="button" class="btn btn-default tui-grid-cell-thumb" data-preview data-action="upload"><i class="fa fa-upload"></i></button>',
        '   <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">',
        //'       Action',
        '       <span class="caret"></span>',
        '   </button>',
        '   <ul class="dropdown-menu">',
        '       <li><a href="JavaScript:" data-action="upload"><i class="fa fa-upload"></i> File Upload</a></li>',
        '       <li><a href="JavaScript:" data-action="browse"><i class="fa fa-folder-open"></i> Browse from Libraries</a></li>',
        '   </ul>',
        '   <input type="file" style="display: none;" />',
        '</div>'
    ].join(''));
    const el = $el[0];//document.createElement('input');
    const {
        maxLength
    } = props.columnInfo.editor.options;

    this.value = props.value;
    this.waiting = false;
    let fileInput = $el.find('[type="file"]');
    $el.find('[data-action="upload"]').click((e)=>{
        fileInput.click();
    });
    fileInput.on('change', (e)=>{
        var reader         = new FileReader();
        var file           = fileInput[0].files[0];
        reader.readAsDataURL(file);
        reader.onload =  (function (file) {
            return function (_file) {
                self.value = (_file.target.result);
                self.preview();
                self.finishEditing();
            }.bind(this);
        })(file);
    });
    $el.find('[data-action="browse"]').click((e)=>{
        self.waiting = true;
        CKFinder.config( { connectorPath: '/ckfinder/connector' } );
        CKFinder.modal( {
            chooseFiles: true,
            width: 800,
            height: 600,
            onInit: function( finder ) {
                finder.on( 'files:choose', function( evt ) {
                    self.waiting = false;
                    var file = evt.data.files.first();
                    self.value = (file.getUrl());
                    self.preview();
                    self.finishEditing();
                } );

                finder.on( 'file:choose:resizedImage', function( evt ) {
                    self.waiting = false;
                    self.value = (evt.data.resizedUrl);
                    self.preview();
                    self.finishEditing();
                } );
            }
        } );
    });
    this.el = el;
    this.previewEl = $el.find('[data-preview]');
        
    this.finishEditing = function() {
        this.EditingLayerInnerComp.finishEditing(true)
    }
    this.preview = function() {
        
        this.previewEl.css({
            backgroundImage: this.value?'url('+this.value+')':'none'
        })
    }
    this.getElement = function() {
        return this.el;
    }

    this.getValue = function() {
        return this.value;
    }

    this.mounted = function() {
        //this.el.select();
        $(this.el).find('.dropdown-toggle').focus()
    }
    this.preview()
}
NumberEditor = window.NumberEditor || class NumberEditor {
    constructor(props) {
        const el = document.createElement('input');
        //const { maxLength } = props.columnInfo.editor.options;

        el.type = 'number';
        el.value = String(props.value);

        this.el = el;
    }

    getElement() {
        return this.el;
    }

    getValue() {
        return this.el.value;
    }

    mounted() {
        this.el.select();
    }
}
CategoryEditor = window.CategoryEditor || class CategoryEditor {
    constructor(props) {
        const el = document.createElement('select');
        //const { maxLength } = props.columnInfo.editor.options;
        console.log(props.columnInfo.editor.options)
        categoryPromise.then((rs) => {
            let addOptions = (el, items, prefix) => {
                items.map((c) => {

                    if (c.children) {
                        var optgroup = document.createElement('optgroup');
                        optgroup.setAttribute('label', c.name);
                        this.el.appendChild(optgroup);

                        addOptions(optgroup, c.children, (prefix || '') + "　");
                    } else {
                        var option = document.createElement('option');
                        option.setAttribute('value', c.id);
                        option.innerText = (prefix || '') + c.name;
                        this.el.appendChild(option);
                    }
                })
            }
            addOptions(this.el, rs)
            el.value = String(props.value);
        })


        this.el = el;
    }

    getElement() {
        return this.el;
    }

    getValue() {
        return this.el.value;
    }

    mounted() {
        this.el.focus();

    }
}
DropdownEditor = window.DropdownEditor || class DropdownEditor {
    constructor(props) {
        let $el = $([
    		'<div class="tui-grid-editor-dropdown">',
		    '   <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">',
            '       <span>Action</span>',
		    '       <span class="caret"></span>',
            '   </button>',
		    '   <ul class="dropdown-menu">',
            '   </ul>',
		    '</div>'
        ].join(''));
        $el.find('>button').keypress((ev)=>{
            console.log(ev)
        })
        const el = $el[0];//document.createElement('input');
        categoryPromise.then((rs) => {
            let addOptions = ($el, items, level) => {
                items.map((c) => {

                    if (c.children) {
                        let li = $([
                            '<li>',
                            '   <div href="Javascript:" data-value="'+c.id+'"><span style="padding-left:'+((level || 0)*20)+'px">'+c.name+'</span></div>',
                            '</li>',
                        ].join(''));
                        $el.append(li)
                        addOptions($el, c.children, (level||0)+1);
                    } else {
                        let li = $([
                            '<li>',
                            '   <a href="Javascript:" data-value="'+c.id+'"><span style="padding-left:'+((level || 0)*20)+'px">'+c.name+'</span></a>',
                            '</li>',
                        ].join(''));
                        $el.append(li);
                    }
                })
            }
            addOptions($el.find('>ul'), rs)
            var selectedText = $el.find('a[data-value="'+props.value+'"]').text() || '---Select---'
            $el.find('a.active').removeClass('active')
            $el.find('a[data-value="'+props.value+'"]').addClass('active')
            $el.find('>button>span:first-child').text(selectedText);
            
            $el.find('a').unbind('click')
                .click(function(ev){
                    $el.find('a.active').removeClass('active');
                    $(this).addClass('active')
                    var selectedText = $(ev.target).text()
                    $el.find('>button>span:first-child').text(selectedText);
                    $el.trigger('change')
                    el.dispatchEvent(
                        new Event('change', {
                            bubbles: true,
                            cancelable: true,
                            view: window,
                    }));
                })
        })


// Dispatch it.
        
        this.el = el;
    }

    getElement() {
        return this.el;
    }

    getValue() {
        return $(this.el).find('a.active').data('value');
    }

    mounted() {
        $(this.el).find('>button').focus();
    }
}
ActionRenderer = window.ActionRenderer || class ActionRenderer {
    constructor(props) {
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
                grid.readData()
            })
        })
        //this.render(props);
    }

    getElement() {
        return this.el;
    }

    render(props) {
        //this.el.value = String(props.value);
    }

    mounted() {
        //this.el.select();
    }
}
CategoryRenderer = window.CategoryRenderer || class CategoryRenderer {
    constructor(props) {
        const el = document.createElement('div');
        //const { min, max } = props.columnInfo.renderer.options;

        //el.type = 'range';
        //el.min = String(min);
        //el.max = String(max);
        //el.disabled = true;
        el.classList.add('tui-grid-cell-content')
        this.el = el;
        this.render(props);
    }

    getElement() {
        return this.el;
    }

    render(props) {
        let self = this;

        function searchTree(element, matching) {
            if (element.id == matching) {
                return element;
            } else if (element.children != null) {
                var i;
                var result = null;
                for (i = 0; result == null && i < element.children.length; i++) {
                    result = searchTree(element.children[i], matching);
                }
                if (result) return result;
            } else if (element.length) {
                for (i = 0; result == null && i < element.length; i++) {
                    result = searchTree(element[i], matching);
                    if (result) return result;
                }
            }
            return null;
        }
        categoryPromise.then((rs) => {
            let selectedCategory = searchTree(rs, props.value)
            if (selectedCategory) self.el.innerHTML = selectedCategory.name;
            else self.el.innerHTML = '';
        })

    }
    mounted() {
        //this.el.select();
    }
}
var ImageRenderer = function(props) {
    var el = document.createElement('div');
    //const { min, max } = props.columnInfo.renderer.options;

    //el.type = 'range';
    //el.min = String(min);
    //el.max = String(max);
    //el.disabled = true;
    el.classList.add('tui-grid-cell-thumb')
    this.el = el;
    

    this.getElement = ()=> {
        return this.el;
    }

    this.render = (props)=> {
        if (props.value) {
            this.el.style.backgroundImage = 'url(' + props.value + ')';
        }
    }
    this.render(props);
}
var CurrencyFormatter = function(props){
    return new Intl.NumberFormat('vi-VN', {
        maximumSignificantDigits: 2,
        style: 'currency',
        currency: 'VND',
        // currencyDisplay: '$',
    }).format(+props.value);
}

var InitOrderGrid = () => {
    var onCellUpdated = (ev) => {
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
        NProgress.start()
        $.ajax({
            method: 'PUT',
            url: 'orders/' + row.id,
            data: data,
            success: function(rs) {
                //resolve(rs)
                NProgress.done();
                Helper.Resolver(rs);
            },
            error: function(request) {
                NProgress.done()
                Helper.Catcher(request)
            }
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
                var newSize = (window.innerHeight - 50 - 60 - 72 - 60 - 70) / 32
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
            frozenCount: 3,
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
                    type: ActionRenderer,
                }
            },{
                header: 'No',
                name: 'no',
                filter: {
                    type: 'text'
                },
                sortable: true,
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
                header: 'Status',
                name: 'status',
                sortable: true,
                width: 80,
                onAfterChange: onCellUpdated,
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
            ]
        },
        columns: [{
                header: 'Product',
                name: 'product_name',
                
            },{
                header: 'Color',
                width: 80,
                name: 'color',
            },{
                header: 'Size',
                width: 80,
                name: 'size',
            },{
                header: 'Qty',
                name: 'qty',
                width: 80,
                align: "right",
            },{
                header: 'Sale Price',
                name: 'price_with_discount',
                align: "right",
                width: 100,
                formatter: CurrencyFormatter
            },
            
        ]
    });
}