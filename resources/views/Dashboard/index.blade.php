@extends('layouts.base')

@section('content')
    <div class="container">


        {{-- {{ Session::get('key') }}
        {{ Cookie::get('key') }} --}}

        <div class="row mt-5 ">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h1 class="text-center"><i class="bi bi-receipt-cutoff text-success"></i></h1>
                        <h4 class="text-dark text-center">Invoices</h4>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h1 class="text-center"><i class="bi bi-people  text-danger"></i></h1>
                        <h4 class="text-dark text-center">Invoices</h4>
                    </div>
                </div>
            </div>


            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h1 class="text-center"><i class="bi bi-people  text-danger"></i></h1>
                        <h4 class="text-dark text-center">Invoices</h4>
                    </div>
                </div>
            </div>



            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h1 class="text-center"><i class="bi bi-people  text-danger"></i></h1>
                        <h4 class="text-dark text-center">Invoices</h4>
                    </div>
                </div>
            </div>
        </div>




    </div>
@endsection
