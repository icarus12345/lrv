<?php

namespace App\Admin\Extensions;
use Encore\Admin\Form;
use Illuminate\Support\Arr;
use DB;
class MForm extends Form
{
	
    public function update($id, $data = null)
    {

        $data = ($data) ?: request()->all();

        $isEditable = $this->isEditable($data);

        if (($data = $this->handleColumnUpdates($id, $data)) instanceof Response) {
            return $data;
        }

        /* @var Model $this->model */
        $builder = $this->model();

        if ($this->isSoftDeletes) {
            $builder = $builder->withTrashed();
        }

        $this->model = $builder->with($this->getRelations())->findOrFail($id);

        $this->setFieldOriginalValue();

        // Handle validation errors.
        
        if ($validationMessages = $this->validationMessages($data)) {

            if (\request()->ajax() && !\request()->pjax()) {
            	return response()->json(['errors' => Arr::dot($validationMessages->getMessages())], 422);
            }
            if (!$isEditable) {
                return back()->withInput()->withErrors($validationMessages);
            }
            return response()->json(['errors' => Arr::dot($validationMessages->getMessages())], 422);
        }

        if (($response = $this->prepare($data)) instanceof Response) {
            return $response;
        }

        DB::transaction(function () {
            $updates = $this->prepareUpdate($this->updates);

            foreach ($updates as $column => $value) {
                /* @var Model $this->model */
                $this->model->setAttribute($column, $value);
            }

            $this->model->save();

            $this->updateRelation($this->relations);
        });

        if (($result = $this->callSaved()) instanceof Response) {
            return $result;
        }

        if ($response = $this->ajaxResponse(trans('admin.update_succeeded'))) {
            return $response;
        }

        return $this->redirectAfterUpdate($id);
    }
}
