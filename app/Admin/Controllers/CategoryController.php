<?php

namespace App\Admin\Controllers;


use Encore\Admin\Layout\Content;
use Illuminate\Routing\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Controllers\ModelForm;
use App\Models\Category;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    use HasResourceActions;
    use ModelForm;

    /**
     * Create a new grid model instance.
     *
     * @param EloquentModel $model
     * @param Grid          $grid
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'App\Models\Category';

    /**
     * Get content title.
     *
     * @return string
     */
    protected function title()
    {
        return $this->title;
    }

    /**
     * Index interface.
     *
     * @param Content $content
     *
     * @return Content
     */
    public function index(Content $content)
    {
        // dd(Category::tree(function($query){
        //     return $query->model->where('type',$this->request->type);
        // }));
        return $content
            ->title($this->title())
            ->description($this->description['index'] ?? trans('admin.list'))
            ->body(Category::treeByType($this->request->type));
    }

    /**
     * Show interface.
     *
     * @param mixed   $id
     * @param Content $content
     *
     * @return Content
     */
    public function show($id, Content $content)
    {
        return $content
            ->title($this->title())
            ->description($this->description['show'] ?? trans('admin.show'))
            ->body($this->detail($id));
    }

    /**
     * Edit interface.
     *
     * @param mixed   $id
     * @param Content $content
     *
     * @return Content
     */
    public function edit($id, Content $content)
    {
        return $content
            ->title($this->title())
            ->description($this->description['edit'] ?? trans('admin.edit'))
            ->body($this->form()->edit($id));
    }

    /**
     * Create interface.
     *
     * @param Content $content
     *
     * @return Content
     */
    public function create(Content $content)
    {
        return $content
            ->title($this->title())
            ->description($this->description['create'] ?? trans('admin.create'))
            ->body($this->form());
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Category);

        $grid->column('id', __('Id'));
        $grid->column('name', __('Name'));
        $grid->column('parent_id', __('Parent id'));
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(Category::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('name', __('Name'));
        $show->field('parent_id', __('Parent id'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        

        $form = new Form(new Category);

        $form->display('id', 'ID');
        $form->hidden('type')->value($this->request->type);

        $form->select('parent_id', trans('admin.parent_id'))->options(Category::selectOptions(function($query){
            return $query->where('type',$this->request->type);
        }));
        $form->text('name', trans('admin.title'))->rules('required');
        // $form->icon('icon', trans('admin.icon'))->default('fa-bars')->rules('required')->help($this->iconHelp());
        // $form->text('uri', trans('admin.uri'));
        // $form->multipleSelect('roles', trans('admin.roles'))->options($roleModel::all()->pluck('name', 'id'));
        // if ($form->model()->withPermission()) {
        //     $form->select('permission', trans('admin.permission'))->options($permissionModel::pluck('name', 'slug'));
        // }

        $form->display('created_at', trans('admin.created_at'));
        $form->display('updated_at', trans('admin.updated_at'));

        return $form;
    }

    /**
     * Help message for icon field.
     *
     * @return string
     */
    protected function iconHelp()
    {
        return 'For more icons please see <a href="http://fontawesome.io/icons/" target="_blank">http://fontawesome.io/icons/</a>';
    }
}
