<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Dashboard') }}
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
                    Selamat Datang di Aplikasi TA Rama
                </h3>
            </div>
        </div>
    </div>
</div>

</x-app-layout>