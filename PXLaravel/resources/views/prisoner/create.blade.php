<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('User') }}
        </h2>
    </x-slot>

    <div class="row">
        <div class="col-md-4">
            <x-jet-section-title>
                <x-slot name="title">Create New Prisoner</x-slot>
                <x-slot name="description">Create new Prisoner</x-slot>
            </x-jet-section-title>
        </div>
        <div class="col-md-8">
            <div class="card shadow-sm">
                <form method="post" action="{{ route('prisoner.store') }} ">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <x-jet-label for="name" value="{{ __('Name') }}" />
                            <x-jet-input required='required' name="name" id="name" type="text" class="{{ $errors->has('name') ? 'is-invalid' : '' }}" wire:model.defer="state.name" autocomplete="name" />
                            <x-jet-input-error for="name" />
                        </div> 
                        <div class="form-group">
                            <x-jet-label for="dob" value="Date Of Birth" />
                            <x-jet-input required='required' name="dob" id="dob" type="date" class="{{ $errors->has('dob') ? 'is-invalid' : '' }}" wire:model.defer="state.dob" />
                            <x-jet-input-error for="dob" />
                        </div> 
                        <div class="form-group">
                            <x-jet-label for="cell_id" value="Gender" />
                            <select required='required' class=" {{ $errors->has('gender') ? 'is-invalid' : '' }} form-control" name="cell_id">
                                <option value="">Cell</option>
                                @if($cells)
                                    @foreach($cells as $cell)
                                        <option value="{{$cell->id}}">{{$cell->name}}</option>
                                    @endforeach
                                @endif
                            </select>
                            <x-jet-input-error for="cell_id" />
                        </div> 
                        <div class="form-group">
                            <x-jet-label for="gender" value="Gender" />
                            <select required='required' class=" {{ $errors->has('gender') ? 'is-invalid' : '' }} form-control" name="gender">
                                <option value=''>Gender</option>
                                <option value='1'>Female</option>
                                <option value='2'>Male</option>
                            </select>
                            <x-jet-input-error for="gender" />
                        </div> 
                        <div class="form-group">
                            <label for="address">Address</label>
                            <textarea name="address" class="form-control" id="address" rows="3"></textarea>
                            <x-jet-input-error for="address" />
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