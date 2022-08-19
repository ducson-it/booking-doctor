@extends('layouts.layout_client_master')

@section('content')
    <div class="container">
        <div class="card-body">
            <div class="e-profile">
                <div class="row">
                    <div class="col-12 col-sm-auto mb-3">
                        <div class="mx-auto" style="width: 140px;">
                            <div class="d-flex justify-content-center align-items-center rounded"
                                style="height: 140px; background-color: rgb(233, 236, 239);"> <span
                                    style="color: rgb(166, 168, 170); font: bold 8pt Arial;">140x140</span></div>
                        </div>
                    </div>
                    <div class="col d-flex flex-column flex-sm-row justify-content-between mb-3">
                        <div class="text-center text-sm-left mb-2 mb-sm-0">
                            <h4 class="pt-sm-2 pb-1 mb-0 text-nowrap">John Smith</h4>
                            <p class="mb-0">@johnny.s</p>
                            <div class="mt-2"> <input type="file" name="image" class="btn btn-primary"></div>
                        </div>
                        <div class="text-center text-sm-right"> <span class="badge badge-secondary">administrator</span>
                            <div class="text-muted"><small>Joined 09 Dec 2017</small></div>
                        </div>
                    </div>
                </div>
                <div class="tab-content pt-3">
                    <form class="form" novalidate="">
                        <div class="row">
                            <div class="col">
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group"> <label>Username</label> <input class="form-control"
                                                type="text" name="username" placeholder="johnny.s" value="johnny.s">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group"> <label>Email</label> <input class="form-control"
                                                type="text" placeholder="user@example.com"></div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group"> <label>Address</label> <input class="form-control"
                                                type="text" name="address" placeholder="John Smith" value="John Smith">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group"> <label>Phone</label> <input class="form-control"
                                                type="text" name="phone" placeholder="johnny.s" value="johnny.s">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col mb-3">
                                        <div class="form-group"> <label>About</label>
                                            <textarea class="form-control" rows="5" placeholder="My Bio"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col d-flex justify-content-end"> <button class="btn btn-primary" type="submit">Save
                                    Changes</button></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
<textarea name=text id="text" cols="30" rows="10"></textarea>
    <script src={{ url('ckeditor/ckeditor.js') }}></script>
    <script>
    CKEDITOR.replace( 'text', {
        filebrowserBrowseUrl: '{{ route('ckfinder_browser') }}',

    } );
    </script>
    @include('ckfinder::setup')
