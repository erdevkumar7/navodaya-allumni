@extends('admin.layout')

@section('page_content')
    <div class="product-status mg-b-30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="product-status-wrap">
                        <h4>Products List</h4>
                        <div class="add-product">
                            <a href="product-edit.html">Add Product</a>
                        </div>
                        <table>
                            <tr>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone Number</th>
                                <th>JNV District</th>
                                <th>Passout Batch</th>
                                <th>Profession</th>
                                <th>Status</th>
                            </tr>

                            @foreach ($allAllumni as $allumni)
                                <tr>
                                    <td><img src="img/new-product/5-small.jpg" alt="" /></td>
                                    <td>{{$allumni->first_name}}</td>
                                 
                                    <td>{{$allumni->email}}</td>
                                    <td>{{$allumni->phone_number}}</td>
                                    <td>{{$allumni->district}}</td>
                                    <td>{{$allumni->passout_batch}}</td>
                                    <td>{{$allumni->profession}}</td>
                                    <td>
                                        <button class="pd-setting">Active</button>
                                    </td>
                                    {{-- <td>
                                        <button data-toggle="tooltip" title="Edit" class="pd-setting-ed"><i
                                                class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                                        <button data-toggle="tooltip" title="Trash" class="pd-setting-ed"><i
                                                class="fa fa-trash-o" aria-hidden="true"></i></button>
                                    </td> --}}
                                </tr>
                            @endforeach

                        </table>
                        <div class="custom-pagination">
                            <ul class="pagination">
                                <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#">Next</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
