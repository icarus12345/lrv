<?php

namespace App\Admin\Traits;

trait HasResourceActions
{
    /**
     * Update the specified resource in storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update($type,$id = null)
    {
        return $this->form()->update($id??$type);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return mixed
     */
    public function store()
    {
        return $this->form()->store();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($type,$id = null)
    {
        return $this->form()->destroy($id??$type);
    }
}
