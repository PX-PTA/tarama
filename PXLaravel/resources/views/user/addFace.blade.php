<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('User') }}
        </h2>
    </x-slot>

    <div class="row">
        <div class="col-md-4">
            <x-jet-section-title>
                <x-slot name="title">Create New Guest</x-slot>
                <x-slot name="description">Create new Guest</x-slot>
            </x-jet-section-title>
        </div>
        <div class="col-md-8">
            <div class="card shadow-sm">
                <form method="post" action="{{ route('user.addFace',$user->id) }} ">
                    @csrf
                    <div class="card-body">
                        <x-jet-input name="id" id="id" type="hidden" class="{{ $errors->has('name') ? 'is-invalid' : '' }}" wire:model.defer="state.name" autocomplete="id" value="{{$user->id}}" />
                        <div class="form-group">
                            <img id="blah" src="http://placehold.it/180"  alt="your image" />
                        </div>
                        <div class="form-group">
                            <x-jet-label for="name" value="{{ __('Id') }}" />
                            <x-jet-input name="id" id="id" type="text" class="{{ $errors->has('name') ? 'is-invalid' : '' }}" wire:model.defer="state.name" autocomplete="id" value="{{$user->id}}" disabled="disabled" />
                            <x-jet-input-error for="id" />
                        </div>
                        <div class="form-group">
                            <x-jet-label for="name" value="{{ __('Name') }}" />
                            <x-jet-input name="name" id="name" type="text" class="{{ $errors->has('name') ? 'is-invalid' : '' }}" wire:model.defer="state.name" autocomplete="name" value="{{$user->name}}" disabled="disabled" />
                            <x-jet-input-error for="name" />
                        </div>
                        <div class="form-group">
                            <x-jet-label for="email" value="{{ __('Email') }}" />
                            <x-jet-input name="email" id="email" type="email" class="{{ $errors->has('email') ? 'is-invalid' : '' }}" wire:model.defer="state.email" autocomplete="email" value="{{$user->email}}" disabled="disabled" />
                            <x-jet-input-error for="email" />
                        </div>  
                    </div>
                    <div class="card-footer d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary">
                            Add Face
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>