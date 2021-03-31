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
                <form method="get" action="{{ route('scan.create2') }} ">
                    @csrf
                    <div class="card-body text-center">    
                        <img src="{{asset('assets/image/face_template.jpg')}}" width="50%">
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