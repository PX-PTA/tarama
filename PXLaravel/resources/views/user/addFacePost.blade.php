<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('User') }}
        </h2>
    </x-slot>

    <div class="row">
        <div class="col-md-4">
            <x-jet-section-title>
                <x-slot name="title">Wait Scanner</x-slot>
                <x-slot name="description">Wait Scanner</x-slot>
            </x-jet-section-title>
        </div>
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-body text-center">    
                    <img src="{{asset('assets/image/face_template.jpg')}}" width="50%">
                </div>
                <div class="card-footer d-flex justify-content-center">
                    <p>Wait For Scanner</p>
                </div>
            </div>
        </div>
    </div>
    <script>
        function loadDoc() {
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    data = JSON.parse(this.responseText);
                    console.log(data.is_add_face);
                    if(data.is_add_face == 0){
                        window.location.href = "/user";
                    }
                }
            };
            xhttp.open("GET", "/api/device/1", true);
            xhttp.send();
        }
        function sleep(milliseconds) {
            const date = Date.now();
            let currentDate = null;
            do {
                currentDate = Date.now();
            } while (currentDate - date < milliseconds);
        }

        setInterval(function() {
            loadDoc();
        }, 2 * 1000); // 60 * 1000 milsec
    </script>
</x-app-layout>