<?php

namespace App\Admin\Controllers;

use Encore\Admin\Layout\Content;
use Illuminate\Routing\Controller;
use App\Admin\Traits\HasResourceActions;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    use HasResourceActions;
	public $locale;
    /**
     * Create a new grid model instance.
     *
     * @param EloquentModel $model
     * @param Grid          $grid
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
        $this->locale = Helpers::getLocale();;
    }

    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Title';

    /**
     * Set description for following 4 action pages.
     *
     * @var array
     */
    protected $description = [
//        'index'  => 'Index',
//        'show'   => 'Show',
//        'edit'   => 'Edit',
//        'create' => 'Create',
    ];

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
    public function index($type = null,Content $content)
    {
        return $content
            ->title($this->title())
            ->description($this->description['index'] ?? trans('admin.list'))
            ->body($this->grid());
    }

    /**
     * Show interface.
     *
     * @param mixed   $id
     * @param Content $content
     *
     * @return Content
     */
    public function show($type, $id = null, Content $content)
    {
        return $content
            ->title($this->title())
            ->description($this->description['show'] ?? trans('admin.show'))
            ->body($this->detail($type,$id));
    }

    /**
     * Edit interface.
     *
     * @param mixed   $id
     * @param Content $content
     *
     * @return Content
     */
    public function edit($type,$id = null, Content $content)
    {
		
        return $content
            ->title($this->title())
            ->description($this->description['edit'] ?? trans('admin.edit'))
            ->body($this->form()->edit($id??$type));
    }

    /**
     * Create interface.
     *
     * @param Content $content
     *
     * @return Content
     */
    public function create($type = null,Content $content)
    {
		
        return $content
            ->title($this->title())
            ->description($this->description['create'] ?? trans('admin.create'))
            ->body($this->form());
    }


}
