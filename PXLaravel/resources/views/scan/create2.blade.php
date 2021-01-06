<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('User') }}
        </h2>
    </x-slot>

    <div class="row">
        <div class="col-md-4">
            <x-jet-section-title>
                <x-slot name="title">Scan User</x-slot>
                <x-slot name="description">Scan User</x-slot>
            </x-jet-section-title>
        </div>
        <div class="col-md-8">
            <div class="card shadow-sm">
                <form method="post" action="{{ route('scan.store') }} ">
                    @csrf
                    <div class="card-body text-center">    
                        <div class="form-group">
                            <label for="user_id">User</label>
                            <select  class="form-control" name="user_id" required="required">
                                <option value=''>pick one</option>
                                @if($users->count() > 0)
                                    @foreach ($users as $user)
                                        <option value='{{$user->id}}'>{{$user->name}}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="prisoner_id">Prisoner</label>
                            <select  class="form-control" name="prisoner_id" required="required">
                                <option value=''>pick one</option>
                                @if($prisoners->count() > 0)
                                    @foreach ($prisoners as $prisoner)
                                        <option value='{{$prisoner->id}}'>{{$prisoner->name}}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary">
                            Scan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>    
</x-app-layout>