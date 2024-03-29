<?php

namespace App\DataTables;

use App\Models\User;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class UsersDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addColumn('action', function(User $user) {
                $infoButton = '<a href="'.route('user.show',$user->id).'" type="button" class="btn btn-primary"><i class="fas fa-info-circle"></i></a>';
                $editButton = '<a href="'.route('user.edit',$user->id).'" type="button" class="btn btn-info"><i class="fas fa-edit"></i></a>';
                $deleteButton =  '<a href="'.route('user.delete',$user->id).'" type="button" class="btn btn-danger"><i class="fas fa-trash"></i></a>';
                $addFaceButton = '<a href="'.route('user.addFace',$user->id).'" type="button" class="btn btn-warning"><i style="color:white;" class="fas fa-user-circle"></i></a>';
                return $infoButton.'&nbsp'.$editButton.'&nbsp'.$deleteButton.'&nbsp'.$addFaceButton;
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\User $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(User $model)
    {
        return $model->where('role_id','>','2')->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->setTableId('users-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('Bfrtip')
                    ->orderBy(1)
                    ->buttons(
                        Button::make('create'),
                        Button::make('export')
                    );
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            Column::make('id'),
            Column::make('name'),
            Column::make('email'),
            Column::computed('action')
                  ->exportable(false)
                  ->printable(false)
                  ->width(210)
                  ->addClass('text-center'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Users_' . date('YmdHis');
    }
}
