@extends('layouts.base')
@section('content')
    <div class="container text-dark">
        <div class="card mt-5">
            <div class="card-body">
                <form action="{{ route('ubdate') }}"method="post">
                    @csrf
                    <div class="row mt-3">
                        <input type="hidden" name="id" value="{{ $Key['id']}}">

                        <div class="col">
                            <label class="form-label text-dark">:اسم المنتج </label>
                            <input type="text" name="ProductName" class="form-control text-dark"
                                value="{{ $Key['ProductName'] }}">
                        </div>

                    </div>
                    <div class="row mt-3">
                        <div class="col d-grid gap-2 col-6 mx-auto text-dark">
                            <button class="btn btn-success text-dark" type="submit">حفظ</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
