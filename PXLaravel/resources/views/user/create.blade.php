<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('User') }}
        </h2>
    </x-slot>

    <div class="row">
        <div class="col-md-4">
            <x-jet-section-title>
                <x-slot name="title">Create New User</x-slot>
                <x-slot name="description">Create new User</x-slot>
            </x-jet-section-title>
        </div>
        <div class="col-md-8">
            <div class="card shadow-sm">
                <form method="post" action="{{ route('user.store') }} ">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <x-jet-label for="name" value="{{ __('Name') }}" />
                            <x-jet-input name="name" id="name" type="text" class="{{ $errors->has('name') ? 'is-invalid' : '' }}" wire:model.defer="state.name" autocomplete="name" />
                            <x-jet-input-error for="name" />
                        </div>
                        <div class="form-group">
                            <x-jet-label for="email" value="{{ __('Email') }}" />
                            <x-jet-input name="email" id="email" type="email" class="{{ $errors->has('email') ? 'is-invalid' : '' }}" wire:model.defer="state.email" autocomplete="email" />
                            <x-jet-input-error for="email" />
                        </div>
                        <div class="form-group">
                            <x-jet-label for="role" value="{{ __('Role') }}" />
                            <select id="role_id" class="form-control {{ $errors->has('role_id') ? 'is-invalid' : '' }}" name="role_id">
                                <option value='3'>User</option>
                                <option value='2'>Admin</option>
                            </select>
                            <x-jet-input-error for="role" />
                        </div>
                        <div class="form-group">
                            <x-jet-label for="password" value="{{ __('Password') }}" />
                            <x-jet-input name="password" id="password" type="password" class="{{ $errors->has('password') ? 'is-invalid' : '' }}" wire:model.defer="state.password" autocomplete="none" />
                            <x-jet-input-error for="password" />
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