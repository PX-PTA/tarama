<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('User') }}
        </h2>
    </x-slot>

    <div class="row">
        <div class="col-md-4">
            <x-jet-section-title>
                <x-slot name="title">Create New Cell</x-slot>
                <x-slot name="description">Create new Cell</x-slot>
            </x-jet-section-title>
        </div>
        <div class="col-md-8">
            <div class="card shadow-sm">
                <form method="post" action="{{ route('cell.store') }} ">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <x-jet-label for="name" value="{{ __('Name') }}" />
                            <x-jet-input name="name" id="name" type="text" class="{{ $errors->has('name') ? 'is-invalid' : '' }}" wire:model.defer="state.name" autocomplete="name" />
                            <x-jet-input-error for="name" />
                        </div>
                        <div class="form-group">
                            <label for="Description">Description</label>
                            <textarea name="desc" class="form-control" id="Description" rows="3"></textarea>
                            <x-jet-input-error for="desc" />
                        </div>    
                    </div>
                    <div class="card-footer d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary">
                            Create
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>    
</x-app-layout>