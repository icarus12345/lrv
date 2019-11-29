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
		    '   <a href="product/'+props.value+'/edit" type="button" class="btn btn-default" data-preview><i class="fa fa-pencil"></i></a>',
		    '   <ul class="dropdown-menu -dropdown-menu-right">',
		    '       <li><a href="product/'+props.value+'/edit" ><i class="fa fa-pencil"></i> Edit</a></li>',
		    '       <li><a href="JavaScript:" data-action="delete"><i class="fa fa-trash"></i> Delete</a></li>',
            '   </ul>',
		    '</div>'
		].join(''));
        const el = $el[0];
        this.el = el;
        $el.find('[data-action="delete"]').click(()=>{
            console.log(self)
            Helper.Encore_Admin_Grid_Actions_Delete({
                id: props.value,
                model: 'Product'
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


var InitGrid = () => {
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
        grid.addCellClassName(ev.rowKey,ev.columnName, 'tui-grid-cell-loading')
        $.ajax({
            method: 'PUT',
            url: 'product/' + row.id,
            data: data,
            complete: function(xhr, stat) {
                grid.removeCellClassName(ev.rowKey,ev.columnName,'tui-grid-cell-loading')
            },
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
                    url: '/api/admin/products',
                    method: 'GET',
                },
                createData: {
                    url: '/api/createData',
                    method: 'POST'
                },
                updateData: {
                    url: '/api/updateData',
                    method: 'PUT'
                },
                modifyData: {
                    url: '/api/modifyData',
                    method: 'PUT'
                },
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
                    name: 'price',
                    align: 'right'
                },
                {
                    name: 'discount',
                    align: 'right'
                },
                {
                    name: 'instock',
                    align: 'right'
                },
            ]
        },
        columnOptions: {
            frozenCount: 2,
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
                header: 'Name',
                name: 'name',
                filter: {
                    type: 'text'
                },
                sortable: true,
                minWidth: 180,
                // filter: {
                //     type: DropdownEditor
                // },
                
                onBeforeChange(ev) {
                    console.log('Before change:', ev);
                    //ev.stop();
                    //if(!ev.value) throw "Bla"

                },
                onAfterChange(ev) {
                    console.log('After change:', ev);
                    // setTimeout(()=>{
                    //     grid.startEditing(ev.rowKey,ev.columnName)
                    // }, 42)
                },
                editor: {
                    type: 'text',
                    options: {
                        attributes: {
                            required: "true",
                            pattern: ".{0,50}"
                        }
                    }
                },
                // validation: {
                //     required: true
                // }
            },
            
            {
                header: 'Category',
                name: 'category_id',
                sortable: true,
                
                width: 120,
                onBeforeChange(ev) {
                    console.log('Before change:' , ev);
                },
                onAfterChange: onCellUpdated,
                editor: {
                    type: DropdownEditor,
                    options: {
                        maxLength: 10
                    },
                    attributes: {
                        required: "true",
                    }
                },
                filter: {
                    type: 'list',//CategoryEditor
                    search: true,
                    source: categoryPromise,
                    // render: ()=>{
                    //     return ''
                    // }
                },
                renderer: {
                    type: CategoryRenderer,
                }
            },
            {
                header: 'Price',
                name: 'price',
                filter: {
                    type: 'text'
                },
                align: "right",
                sortable: true,
                width: 100,
                onBeforeChange(ev) {
                    console.log('Before change:' , ev);
                },
                onAfterChange: onCellUpdated,
                formatter: (props) => {
                    return new Intl.NumberFormat('vi-VN', {
                        maximumSignificantDigits: 2,
                        style: 'currency',
                        currency: 'VND',
                        // currencyDisplay: '$',
                    }).format(+props.value);
                },
                editor: {
                    type: 'text',//NumberEditor,
                    options: {
                        attributes: {
                            //type: 'number',
                            required: "true",
                            min: 0,
                            style:'text-align:right;',
                            // pattern: "[0-9.]{0,11}"
                            pattern: "^([1-9][0-9]{0,10}([.][0-9]{1,2})?)|^(0.[0-9]{1,2})|0"
                        }
                    }
                },
                // validation: {
                //     min: 0,
                //     max: 10000000,
                //     //validatorFn: value => value != 3
                // }
            },
            {
                header: 'Discount',
                name: 'discount',
                filter: {
                    type: 'text'
                },
                sortable: true,
                align: "right",
                width: 60,
                onBeforeChange(ev) {
                    console.log('Before change:' , ev);
                },
                onAfterChange: onCellUpdated,
                
                editor: {
                    type: 'text',//NumberEditor,
                    options: {
                        attributes: {
                            //type: 'number',
                            required: "true",
                            style:'text-align:right;',
                            //min: 0,
                            //max: 100,
                            pattern: "^([1-9][0-9]{0,1})|100|0"
                        }
                    }
                },
            },
            {
                header: 'Instock',
                name: 'instock',
                sortable: true,
                align: "right",
                width: 60,
                onBeforeChange(ev) {
                    console.log('Before change:' , ev);
                },
                onAfterChange: onCellUpdated,
                
                editor: {
                    type: 'text',//NumberEditor,
                    options: {
                        attributes: {
                            //type: 'number',
                            required: "true",
                            style:'text-align:right;',
                            //min: 0,
                            //max: 100,
                            pattern: "^(-?[1-9][0-9]{0,4}?)$|0"
                        }
                    }
                },
            },
            {
                header: 'Image',
                name: 'image',
                width: 60,
                onBeforeChange: function(ev) {
                    console.log('Before change:' , ev);
                },
                onAfterChange: onCellUpdated,
                formatter: (props) => {
                    return '<img src="' + props.value + '" height="30"/>';
                },
                editor: {
                    type: ImageEditor,
                    options: {

                    }
                },
                renderer: {
                    type: ImageRenderer,
                }
            },
            {
                header: 'Labels',
                name: 'labels',
                sortable: true,
                width: 100,
                onBeforeChange(ev) {
                    console.log('Before change:' , ev);
                },
                onAfterChange: onCellUpdated,
                formatter: 'listItemText',
                editor: {
                    type: 'checkbox',
                    options: {
                        listItems: [{
                                text: 'Hot',
                                value: 'hot'
                            },
                            {
                                text: 'New',
                                value: 'new'
                            },
                            {
                                text: 'Sale',
                                value: 'sale'
                            },
                        ]
                    }
                },
                copyOptions: {
                    useListItemText: true // when this option is used, the copy value is concatenated text
                }
            },
            {
                header: 'Rating',
                name: 'rating',
                sortable: true,
                minWidth: 80,
                width: 80,
                onBeforeChange: function(ev) {
                    console.log('Before change:' + ev);
                },
                onAfterChange: onCellUpdated,
                copyOptions: {
                    useListItemText: true
                },
                formatter: (props) => {
                    let v = Math.round(props.value)
                    return '★'.repeat(v) + '☆'.repeat(5-v);
                },
                editor: {
                    type: 'text',//NumberEditor,
                    options: {
                        attributes: {
                            //type: 'number',
                            required: "true",
                            //min: 0,
                            pattern: "[0-5]{1,1}"
                        },
                    }
                },
                filter: {
                    type: 'list',//CategoryEditor
                    source: [{
                        id: '1',
                        name: '★☆☆☆☆',
                    },{
                        id: '2',
                        name: '★★☆☆☆',
                    },{
                        id: '3',
                        name: '★★★☆☆',
                    },{
                        id: '4',
                        name: '★★★★☆',
                    },{
                        id: '5',
                        name: '★★★★★',
                    }],
                    // render: ()=>{
                    //     return ''
                    // }
                },
            },
            {
                header: 'Status',
                name: 'status',
                sortable: true,
                width: 80,
                //formatter: 'listItemText',
                onAfterChange: onCellUpdated,
                editor: {
                    type: 'select',//NumberEditor,
                    options: {
                        listItems: [{
                                text: 'Active',
                                value: 'Active'
                            },
                            {
                                text: 'InActive',
                                value: 'InActive'
                            },
                        ]
                    }
                },
                filter: {
                    type: 'select',//CategoryEditor
                    source: [{
                        id: 'Active',
                        name: 'Active',
                    },{
                        id: 'InActive',
                        name: 'InActive',
                    }],
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
				editor: {
					type: 'datePicker',
					options: {
						format: 'yyyy-MM-dd HH:mm A',
						timepicker: {
							layoutType: 'tab',
							inputType: 'spinbox'
						}
					}
				}
			},
            
        ]
    });
}