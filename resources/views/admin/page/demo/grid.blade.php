<link rel="stylesheet" href="/packages/tui/tui-grid.css" />
<link rel="stylesheet" href="/packages/tui/tui-pagination.css" />
<script src="/packages/tui/tui-code-snippet.js"></script>
<script src="/packages/tui/tui-pagination.js"></script>
<script src="/packages/tui/tui-grid.js"></script>
<div id="tui-grid"></div>

<script>
    /* eslint-disable */
const categoryPromise = new Promise(function(resolve, reject) {
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


class ImageEditor {
    constructor(props) {
    	let $el = $([
    		'<div class="btn-group">',
		  //'<button type="button" class="btn btn-default">Action</button>',
		  '<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">',
		  	'Action',
		    '<span class="caret"></span>',
		  '</button>',
		  '<ul class="dropdown-menu">',
		    '<li><a href="#">Action</a></li>',
		    '<li><a href="#">Another action</a></li>',
		    '<li><a href="#">Something else here</a></li>',
		    '<li role="separator" class="divider"></li>',
		    '<li><a href="#">Separated link</a></li>',
		  '</ul>',
		'</div>'
		].join(''));
        const el = $el[0];//document.createElement('input');
        const {
            maxLength
        } = props.columnInfo.editor.options;

        //el.value = String(props.value);

        this.el = el;
    }

    getElement() {
        return this.el;
    }

    getValue() {
        return '',this.el.value;
    }

    mounted() {
        //this.el.select();
    }
}
class NumberEditor {
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
class CategoryEditor {
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
class CategoryRenderer {
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
}
class ImageRenderer {
    constructor(props) {
        const el = document.createElement('div');
        //const { min, max } = props.columnInfo.renderer.options;

        //el.type = 'range';
        //el.min = String(min);
        //el.max = String(max);
        //el.disabled = true;
        el.classList.add('tui-grid-cell-thumb')
        this.el = el;
        this.render(props);
    }

    getElement() {
        return this.el;
    }

    render(props) {
        if (props.value) {
            this.el.style.backgroundImage = 'url(' + props.value + ')';
        }
    }
}
const grid = new tui.Grid({
    el: document.getElementById('tui-grid'),
    rowHeight: 32,
    minRowHeight: 32,
    rowHeaders: ['rowNum'],
    scrollX: false,
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
        perPage: 10
    },
    columns: [{
            header: 'Name',
            name: 'name',
            filter: {
                type: 'text',
                showApplyBtn: true,
                showClearBtn: true
            },
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
            validation: {
                required: true
            }
        },
        {
            header: 'Category',
            name: 'category_id',
            width: 120,
            onBeforeChange(ev) {
                console.log('Before change:' + ev);
            },
            onAfterChange(ev) {
                console.log('After change:' + ev);
            },
            editor: {
                type: CategoryEditor,
                options: {
                    maxLength: 10
                },
                attributes: {
                    required: "true",
                }
            },
            renderer: {
                type: CategoryRenderer,
            }
        },
        {
            header: 'Price',
            name: 'price',
            width: 100,
            onBeforeChange(ev) {
                console.log('Before change:' + ev);
            },
            onAfterChange(ev) {
                console.log('After change:' + ev);
            },
            formatter: (props) => {
                return new Intl.NumberFormat('vi-VN', {
                    maximumSignificantDigits: 2,
                    style: 'currency',
                    currency: 'VND',
                    // currencyDisplay: '$',
                }).format(+props.value);
            },
            editor: {
                type: 'text',NumberEditor,
                options: {
                    attributes: {
                    	type: 'number',
                        required: "true",
                        min: 0,
                        pattern: "[0-9.]{0,11}"
                    }
                }
            },
            validation: {
                min: 0,
                max: 10000000,
                //validatorFn: value => value != 3
            }
        },
        {
            header: 'Image',
            name: 'image',
            width: 60,
            onBeforeChange: function(ev) {
                console.log('Before change:' + ev);
            },
            onAfterChange: function(ev) {
                console.log('After change:' + ev);
            },
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
            header: 'Genre',
            name: 'genreCode',
            onBeforeChange(ev) {
                console.log('Before change:' + ev);
            },
            onAfterChange(ev) {
                console.log('After change:' + ev);
            },
            formatter: 'listItemText',
            editor: {
                type: 'checkbox',
                options: {
                    listItems: [{
                            text: 'Pop',
                            value: '1'
                        },
                        {
                            text: 'Rock',
                            value: '2'
                        },
                        {
                            text: 'R&B',
                            value: '3'
                        },
                        {
                            text: 'Electronic',
                            value: '4'
                        },
                        {
                            text: 'etc.',
                            value: '5'
                        }
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
            minWidth: 80,
            width: 80,
            onBeforeChange: function(ev) {
                console.log('Before change:' + ev);
            },
            onAfterChange: function(ev) {
                console.log('After change:' + ev);
            },
            copyOptions: {
                useListItemText: true
            },
            formatter: 'listItemText',
            editor: {
                type: 'text',NumberEditor,
                options: {
                    listItems: [{
                            text: '★☆☆☆☆',
                            value: '1'
                        },
                        {
                            text: '★★☆☆☆',
                            value: '2'
                        },
                        {
                            text: '★★★☆☆',
                            value: '3'
                        },
                        {
                            text: '★★★★☆',
                            value: '4'
                        },
                        {
                            text: '★★★★★',
                            value: '5'
                        }
                    ]
                }
            },
            validation: {
                min: 0,
                max: 5,
                //validatorFn: value => value != 3
            }
        }
    ]
});

  //grid.resetData(gridData);
</script>