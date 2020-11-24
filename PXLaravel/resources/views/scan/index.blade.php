<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Admin') }}
        </h2>
    </x-slot>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card shadow bg-light">
                <div class="card-body bg-white px-5 py-3 border-bottom rounded-top">
                    <div>
                        <x-jet-application-logo style="width: 317px;" />
                    </div>
    
                    <h3 class="h3 my-4">
                        Welcome to your Jetstream application!
                    </h3>
    
                    <div class="text-muted">
                        {{$dataTable->table()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('scripts')
        {{$dataTable->scripts()}}
    @endpush
</x-app-layout>