<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Navodaya Allumni</title>

</head>

<body>


    <div class="container h-100">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">MAAN(NAVOTSAV-3.0)</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Allumni</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Dropdown
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#">Action</a></li>
                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                        </li>
                    </ul>
                    <form class="d-flex">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>
                </div>
            </div>
        </nav>


        <div class="row d-flex justify-content-center align-items-center h-100">
            <form action="{{ route('user.registerNavodayanFormSubmit') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="col">
                    <div class="card card-registration my-4">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <div class="row g-0">
                            <div class="col-xl-6 d-none d-xl-block">
                                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-registration/img4.webp"
                                    alt="Sample photo" class="img-fluid"
                                    style="border-top-left-radius: .25rem; border-bottom-left-radius: .25rem;" />
                            </div>
                            <div class="col-xl-6">
                                <div class="card-body p-md-5 text-black">
                                    <h3 class="mb-5 text-uppercase">Allumni registration form</h3>

                                    <div class="row">
                                        <div class="col-md-6 mb-4">
                                            <div class="form-outline">
                                                {{-- <label class="form-label" for="form3Example1m">First name</label> --}}
                                                <input type="text" id="form3Example1m" placeholder="First Name"
                                                    name="first_name" class="form-control" />
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-4">
                                            <div class="form-outline">
                                                {{-- <label class="form-label" for="form3Example1n">Last name</label> --}}
                                                <input type="text" id="form3Example1n" placeholder="Last Name"
                                                    name="last_name" class="form-control" />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-outline mb-4">
                                        {{-- <label class="form-label" for="form3Example97">Email ID</label> --}}
                                        <input type="text" id="form3Example97" class="form-control" name="email"
                                            placeholder="Email" />
                                        <input type="hidden" value="Dev@123" name="password">
                                    </div>

                                    <div class="row">

                                        <div class="col-md-6 mb-4">
                                            <div class="form-outline">
                                                {{-- <label class="form-label" for="mobile_number">Mobile Number</label> --}}
                                                <input type="text" id="phone_number" name="phone_number"
                                                    placeholder="Phone Number" class="form-control" />
                                            </div>
                                        </div>

                                        <div class="col-md-6 mb-4">
                                            <input type="text" id="city" name="city"
                                                placeholder="Current City" class="form-control" />
                                        </div>

                                    </div>


                                    <div class="d-md-flex justify-content-start align-items-center mb-4 py-2">
                                        <h6 class="mb-0 me-4">Gender: </h6>
                                        <div class="form-check form-check-inline mb-0 me-4">
                                            <input class="form-check-input" type="radio" name="gender"
                                                id="maleGender" value="male" />
                                            <label class="form-check-label" for="maleGender">Male</label>
                                        </div>
                                        <div class="form-check form-check-inline mb-0 me-4">
                                            <input class="form-check-input" type="radio" name="gender"
                                                id="femaleGender" value="female" />
                                            <label class="form-check-label" for="femaleGender">Female</label>
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-md-6 mb-4">
                                            <label for="inputState4" class="form-label">Your JNV State</label>
                                            <select id="inputState4" class="form-select" name="state">
                                                <option value="" selected> --- Select State --- </option>
                                                <option value="madhyapradesh"> Madhya Pradesh </option>
                                                <option value="other"> Other </option>
                                            </select>
                                        </div>

                                        <div class="col-md-6 mb-4">
                                            <label for="inputDistrict4" class="form-label">Your JNV District</label>
                                            <select id="inputDistrict4" class="form-select" name="district">
                                                <option value="" selected> --- Select District --- </option>
                                                <option value="indore">Indore</option>
                                                <option value="dewas">Dewas</option>
                                                <option value="ujjain">Ujjain</option>
                                                <option value="sehore"> Sehore </option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row">                                     
                                        <div class="col-md-6 mb-4">
                                            <label for="inputBatch4" class="form-label">Passout Batch</label>
                                            <select id="inputBatch4" class="form-select" name="passout_batch">
                                                <option value="" selected> --- Select Batch --- </option>
                                                <option value="2024">2024</option>
                                                <option value="2023">2023</option>
                                                <option value="2022">2022</option>
                                                <option value="2021">2021</option>
                                                <option value="2020">2020</option>
                                                <option value="2019">2019</option>
                                            </select>
                                        </div>

                                        <div class="col-md-6 mb-4">
                                            <label class="form-label" for="Profession">Profession</label>
                                            <select id="Profession" class="form-select" name="profession">
                                                <option value="" selected> --- Select Profession --- </option>
                                                <option value="student">Student</option>
                                                <option value="bussiness">Bussiness</option>
                                                <option value="self-Employeed">Self-Employeed</option>
                                                <option value="doctor">Doctor</option>
                                                <option value="enginner">Enginner</option>
                                                <option value="Govt-Employee">Govt. Employee</option>
                                                <option value="other">Other</option>
                                            </select>
                                        </div>
                                    </div>

                          

                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="ProfessionSp">Profession
                                            Specification</label>
                                        <input type="text" id="ProfessionSp" class="form-control"
                                            name="profession_specification" />
                                    </div>

                                    <div class="d-flex justify-content-end pt-3">
                                        <button type="submit" data-mdb-button-init data-mdb-ripple-init
                                            class="btn btn-warning btn-lg ms-2">Submit</button>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

</body>

</html>
