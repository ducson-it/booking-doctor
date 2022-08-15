@if ($allDoctorSearch->count() > 0)
    <div class="container">
        <div class="row d-flex">
            @foreach ($allDoctorSearch as $key => $value)
                <div class="itemDoctor d-flex">
                <img src="{{ asset('img/ducson.jpg') }}" alt="abc">
                    <div>
                        <p> {{ $value->name }} </p>
                        <p> {{ $value->email }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@else
    <div class="container text-center">
       <h1> No Data Found </h1>
    </div>
@endif
