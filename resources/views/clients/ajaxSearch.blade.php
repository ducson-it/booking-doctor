@if ($allDoctorSearch->count() > 0)
    <div class="container">
        <div class="row d-flex home-search">
            @foreach ($allDoctorSearch as $key => $value)
                <a href="{{ route('detailDoctor', $value->id) }}">
                    <div class="row d-flex  m-3 itemDoctor">
                        <div class="col-6 text-center">
                        <img src="{{ asset('img/ducson.jpg') }}" alt="abc">
                        </div>
                        <div class="col-6">
                            <div>
                                <p> {{ $value->name }} </p>
                                <p> {{ $value->email }}</p>
                            </div>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
@else
    <div class="container text-center">
        <h1> No Data Found </h1>
    </div>
@endif
