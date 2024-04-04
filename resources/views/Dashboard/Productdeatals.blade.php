@extends('layouts.base')

@section('content')
    <div class="container d-flex justify-content-between">

        <div class="container">

            <div class="row m-5">

                <div class="col-12 col-sm-12 col-md-12">

                    <div class="card">

                        <div class="card-header">



                        </div>
                        <div class="card-body">

                            <a type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop"
                                style="margin-left: 200px;color:red;">
                                اضغط ! هنا الي الاضافه المنتج
                            </a>
                            <hr />


                            <!-- Error Messages Section -->
                            <div id="error-messages" class="mt-3">
                                <!-- Validation error messages will be displayed here -->
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                            </div>


                            <!-- Modal -->
                            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
                                tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content ">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5 text-success" id="staticBackdropLabel">اضافه</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">

                                            <form action="{{ route('CreateProduct_Deatals') }}" method="POST">
                                                @csrf
                                                <div class="row">
                                                    <div class="col">
                                                        <label for="Product">المنتج </label>

                                                        <select name="Product" id="Product" class="form-select">
                                                            @foreach ($product_details as $item)
                                                                <option value="{{ $item->product_id }}">
                                                                    {{ $item->ProductName }}
                                                                </option>
                                                            @endforeach
                                                        </select>

                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col">
                                                        <label for="color">لون المنتج</label>
                                                        <input type="text"
                                                            class="form-control @error('color') is-invalid @enderror"name="color">

                                                        @error('color')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>ادخل لون المنتج </strong>
                                                            </span>
                                                        @enderror


                                                    </div>


                                                    <div class="col">
                                                        <label for="price">سعر المنتج</label>
                                                        <input type="text"
                                                            class="form-control @error('price') is-invalid @enderror"
                                                            name="price">

                                                        @error('color')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>ادخل سعر المنتج </strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col">
                                                        <label for="qty"> الكمية</label>
                                                        <input type="text"
                                                            class="form-control @error('qty') is-invalid @enderror"
                                                            name="qty">
                                                        @error('qty')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>ادخل الكميه</strong>
                                                            </span>
                                                        @enderror

                                                    </div>
                                                    <div class="col">
                                                        <label for="description"> وصف المنتج</label>
                                                        <input type="text"
                                                            class="form-control @error('description') is-invalid @enderror"name="description">
                                                        @error('description')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>ادخل وصف المنتج </strong>
                                                            </span>
                                                        @enderror


                                                    </div>
                                                </div>




                                                <button type="submit" class="btn btn-info mt-3">حفظ</button>
                                                <button type="button" class="btn btn-secondary mt-3"
                                                    data-bs-dismiss="modal">الغاء</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>





                            <div class="row">
                                <div class="col">

                                    <form action="{{ route('Product_Deatals') }}" method="post">
                                        @csrf
                                        <label for="name" class=" mt-3"> البحث عن المنتج</label>
                                        <input type="text" name="name" class=" form-control mt-2 ">
                                        <button class="btn  btn-lg btn-dark  mt-2 " type="submit">البحث</button>
                                        <a href="{{ route('NotSearchproduct_details') }}"
                                            class="btn  btn-lg btn-dark  mt-2">جميع
                                            المنتجات</a>
                                    </form>
                                </div>
                            </div>



                            <hr />



                            <div class="table-responsive" id="proTeamScroll" tabindex="2"
                                style="height: 400px; overflow: hidden; outline: none;">
                                <table
                                    class="table table-striped  table-bordered table-hover align-content-center text-center">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>اسم المنتج</th>
                                            <th>لون منتج</th>
                                            <th>السعر</th>
                                            <th>الكميه</th>
                                            <th>الوصف</th>
                                            <th colspan="2">تعديل او الحذف </th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($product_details as $item)
                                            <tr>
                                                <td>
                                                    <p class="m-0 font-12  text-dark">
                                                        {{ $item->id }}
                                                    </p>
                                                </td>

                                                <td>
                                                    <p class="m-0 font-12 text-dark">

                                                        {{ $item->ProductName }}
                                                    </p>
                                                </td>

                                                <td>
                                                    <p class="m-0 font-12 text-dark">

                                                        {{ $item->color }}
                                                    </p>
                                                </td>

                                                <td>
                                                    <p class="m-0 font-12 text-dark">

                                                        {{ $item->price }}
                                                    </p>
                                                </td>


                                                <td>
                                                    <p class="m-0 font-12 text-dark">

                                                        {{ $item->qty }}
                                                    </p>
                                                </td>

                                                <td>
                                                    <p class="m-0 font-12 text-dark">

                                                        {{ $item->description }}
                                                    </p>
                                                </td>



                                                <td><a href="{{ route('delete', ['id' => $item->id]) }}"><i
                                                            class= "fa-solid fa-trash text-danger"aria-hidden="true"></i></a>
                                                </td>


                                                <td><a href="{{ route('Editproduct_details', ['id' => $item->id]) }}"><i
                                                            class="fa fa-edit text-success"aria-hidden="true"></i></a></td>


                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>













    <style>
        body {
            background-color: #f6f6f6;

        }

        .card {
            background-color: #fff;
            border-radius: 10px;
            border: none;
            position: relative;
            margin-bottom: 30px;
            box-shadow: 0 0.46875rem 2.1875rem rgba(90, 97, 105, 0.1), 0 0.9375rem 1.40625rem rgba(90, 97, 105, 0.1), 0 0.25rem 0.53125rem rgba(90, 97, 105, 0.12), 0 0.125rem 0.1875rem rgba(90, 97, 105, 0.1);
            margin-left: 160px;
        }

        .card .card-header {
            border-bottom-color: #f9f9f9;
            line-height: 30px;
            -ms-grid-row-align: center;
            align-self: center;
            width: 100%;
            padding: 10px 25px;
            display: flex;
            align-items: center;
        }

        .card .card-header,
        .card .card-body,
        .card .card-footer {
            background-color: transparent;
            padding: 20px 25px;
        }

        .card-header:first-child {
            border-radius: calc(.25rem - 1px) calc(.25rem - 1px) 0 0;
        }

        .card-header {
            padding: .75rem 1.25rem;
            margin-bottom: 0;
            background-color: rgba(0, 0, 0, .03);
            border-bottom: 1px solid rgba(0, 0, 0, .125);
        }

        .table:not(.table-sm) thead th {
            border-bottom: none;
            background-color: #e9e9eb;
            color: #666;
            padding-top: 15px;
            padding-bottom: 15px;
        }

        .table .table-img img {
            width: 35px;
            height: 35px;
            border-radius: 50%;
            border: 2px solid #bbbbbb;
            -webkit-box-shadow: 5px 6px 15px 0px rgba(49, 47, 49, 0.5);
            -moz-box-shadow: 5px 6px 15px 0px rgba(49, 47, 49, 0.5);
            -ms-box-shadow: 5px 6px 15px 0px rgba(49, 47, 49, 0.5);
            box-shadow: 5px 6px 15px 0px rgba(49, 47, 49, 0.5);
            text-shadow: 0 0 black;
        }

        .table .team-member-sm {
            width: 32px;
            -webkit-transition: all 0.25s ease;
            -o-transition: all 0.25s ease;
            -moz-transition: all 0.25s ease;
            transition: all 0.25s ease;
        }

        .table .team-member {
            position: relative;
            width: 30px;
            white-space: nowrap;
            border-radius: 1000px;
            vertical-align: bottom;
            display: inline-block;
        }

        .table .order-list li img {
            border: 2px solid #ffffff;
            box-shadow: 4px 3px 6px 0 rgba(0, 0, 0, 0.2);
        }

        .table .team-member img {
            width: 100%;
            max-width: 100%;
            height: auto;
            border: 0;
            border-radius: 1000px;
        }

        .rounded-circle {
            border-radius: 50% !important;
        }

        .table .order-list li+li {
            margin-left: -14px;
            background: transparent;
        }

        .avatar.avatar-sm {
            font-size: 12px;
            height: 30px;
            width: 30px;
        }

        .avatar {
            background: #6777ef;
            border-radius: 50%;
            color: #e3eaef;
            display: inline-block;
            font-size: 16px;
            font-weight: 300;
            margin: 0;
            position: relative;
            vertical-align: middle;
            line-height: 1.28;
            height: 45px;
            width: 45px;
        }

        .table .order-list li .badge {
            background: rgba(228, 222, 222, 0.8);
            color: #6b6f82;
            margin-bottom: 6px;
        }

        .badge {
            vertical-align: middle;
            padding: 7px 12px;
            font-weight: 600;
            letter-spacing: 0.3px;
            border-radius: 30px;
            font-size: 12px;
        }

        .progress-bar {
            display: -ms-flexbox;
            display: -webkit-box;
            display: flex;
            -ms-flex-direction: column;
            -webkit-box-orient: vertical;
            -webkit-box-direction: normal;
            flex-direction: column;
            -ms-flex-pack: center;
            -webkit-box-pack: center;
            justify-content: center;
            overflow: hidden;
            color: #fff;
            text-align: center;
            white-space: nowrap;
            background-color: #007bff;
            -webkit-transition: width .6s ease;
            transition: width .6s ease;
        }

        .bg-success {
            background-color: #54ca68 !important;
        }

        .bg-purple {
            background-color: #9c27b0 !important;
            color: #fff;
        }

        .bg-cyan {
            background-color: #10cfbd !important;
            color: #fff;
        }

        .bg-red {
            background-color: #f44336 !important;
            color: #fff;
        }

        .progress {
            -webkit-box-shadow: 0 0.4rem 0.6rem rgba(0, 0, 0, 0.15);
            box-shadow: 0 0.4rem 0.6rem rgba(0, 0, 0, 0.15);
        }
    </style>
@endsection
