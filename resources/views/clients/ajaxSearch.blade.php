@if ($allDoctorSearch->count() > 0)
<div class="container">
    <h3 style="font-size:26px ;margin-top:30px ; margin-bottom:40px ;font-weight: bold;">Kết quả tìm kiếm</h3>
    <div class="row d-flex" id="search_doctor">
        @foreach ($allDoctorSearch as $key => $value)
        <div class="itemDoctor d-flex">
            <img src="{{ asset('img/ducson.jpg') }}" alt="abc">
            <div>
                <h2 style="font-size:24px ;padding-left:190px ;font-weight: bold;padding-top: 20px;">Thông tin bác sĩ</h2>
                <p class="info-doctor"> {{ $value->name }} </p>
                <p class="info-doctor"> {{ $value->email }}</p>
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