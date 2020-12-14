<?php

namespace App\DataTables;

use App\Models\Prisoner;
use App\Models\PrisonerCell;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class PrisonerDataTable extends DataTable
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
            ->editColumn('cell', function(Prisoner $prisoner) {
                $CellPrisoner = PrisonerCell::where('prisoner_id',$prisoner->id)->first();
                return 'Cell ' . $CellPrisoner->cell->name;
            })
            ->addColumn('action', function(Prisoner $prisoner) {
                return '<button type="button" class="btn btn-primary"><i class="fas fa-info-circle"></i></button>&nbsp<button type="button" class="btn btn-info"><i class="fas fa-edit"></i></button>&nbsp<button type="button" class="btn btn-danger"><i class="fas fa-user-times"></i></button>';
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Prisoner $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Prisoner $model)
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->setTableId('prisoner-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('Bfrtip')
                    ->orderBy(1)
                    ->buttons(
                        Button::make('create'),
                        Button::make('export'),
                        Button::make('print'),
                        Button::make('reset'),
                        Button::make('reload')
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
            Column::make('cell'),
            Column::computed('action')
                  ->exportable(false)
                  ->printable(false)
                  ->width(180)
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
        return 'Prisoner_' . date('YmdHis');
    }
}
