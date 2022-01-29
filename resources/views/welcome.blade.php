<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Search</title>
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
</head>

<body>
    <div class="nav">
        <h1 class="logo">KETCH</h1>
        <div class="search">
            <input class="searchbar" type="text" placeholder="   search" name="search" id="searchbox">

        </div>

    </div>
    <div class="info">
        <div class="filterlogo">
            <h5>FILTERS</h5>
        </div>

        <div class="extrainfo">
            <p class="result" id="result1"></p>
            <div class="dropdown">
                <button class="dropbtn">Sort By
                    <i style="float:right;margin-right:20px" class="fa fa-caret-down"></i>
                </button>
                <div class="dropdown-content">
                
                    <li class="sorting" value="1">Price : Low to High</li>
                    <li class="sorting" value="2">Price : High to Low</li>

                </div>
            </div>
        </div>
    </div>
    <div class="maininfo">

        <div class="sidenav">

            <div class="filter-option">
                <h6 style="margin-left:50px;margin-top:10px;margin-bottom:20px">Gender</h6>
                <div class="form-check" style="margin-left:50px;">
                    <input class="form-check-input searchType" type="checkbox" value="men" id="defaultCheck1">
                    <label class="form-check-label" for="defaultCheck1">
                        Men
                    </label>
                </div>
                <div class="form-check" style="margin-left:50px;margin-top:10px;margin-bottom:10px">
                    <input class="form-check-input searchType" type="checkbox" value="women" id="defaultCheck2">
                    <label class="form-check-label" for="defaultCheck2">
                        Women
                    </label>
                </div>
            </div>
            <div class="filter-option">
                <h6 style="margin-left:50px;margin-top:10px;margin-bottom:20px">Fit</h6>
                <div class="form-check" style="margin-left:50px;">
                    <input class="form-check-input searchType" type="checkbox" value="slim fit" id="defaultCheck1">
                    <label class="form-check-label" for="defaultCheck1">
                        Slim Fit
                    </label>
                </div>
                <div class="form-check" style="margin-left:50px;margin-top:10px;margin-bottom:10px">
                    <input class="form-check-input searchType" type="checkbox" value="regular fit" id="defaultCheck2">
                    <label class="form-check-label" for="defaultCheck2">
                        Regular Fit
                    </label>
                </div>
            </div>
            <div class="filter-option">
                <h6 style="margin-left:50px;margin-top:10px;margin-bottom:20px">Colors</h6>
                <div class="form-check" style="margin-left:50px;">
                    <input class="form-check-input searchType" type="checkbox" value="rust" id="defaultCheck1">
                    <label class="form-check-label" for="defaultCheck1">
                        Rust
                    </label>
                </div>
                <div class="form-check" style="margin-left:50px;">
                    <input class="form-check-input searchType" type="checkbox" value="black" id="defaultCheck1">
                    <label class="form-check-label" for="defaultCheck1">
                        Black
                    </label>
                </div>
                <div class="form-check" style="margin-left:50px;">
                    <input class="form-check-input searchType" type="checkbox" value="white" id="defaultCheck1">
                    <label class="form-check-label" for="defaultCheck1">
                        White
                    </label>
                </div>
                <div class="form-check" style="margin-left:50px;">
                    <input class="form-check-input searchType" type="checkbox" value="grey" id="defaultCheck1">
                    <label class="form-check-label" for="defaultCheck1">
                        Grey
                    </label>
                </div>
                <div class="form-check" style="margin-left:50px;">
                    <input class="form-check-input searchType" type="checkbox" value="charcoal" id="defaultCheck1">
                    <label class="form-check-label" for="defaultCheck1">
                        Charcoal
                    </label>
                </div>
                <div class="form-check" style="margin-left:50px;">
                    <input class="form-check-input searchType" type="checkbox" value="Brown" id="defaultCheck1">
                    <label class="form-check-label" for="defaultCheck1">
                        Brown
                    </label>
                </div>
                <div class="form-check" style="margin-left:50px;">
                    <input class="form-check-input searchType" type="checkbox" value="blue" id="defaultCheck1">
                    <label class="form-check-label" for="defaultCheck1">
                        Blue
                    </label>
                </div>
                <div class="form-check" style="margin-left:50px;">
                    <input class="form-check-input searchType" type="checkbox" value="red" id="defaultCheck1">
                    <label class="form-check-label" for="defaultCheck1">
                        Red
                    </label>
                </div>
                <div class="form-check" style="margin-left:50px;">
                    <input class="form-check-input searchType" type="checkbox" value="maroon" id="defaultCheck1">
                    <label class="form-check-label" for="defaultCheck1">
                        Maroon
                    </label>
                </div>
                <div class="form-check" style="margin-left:50px;">
                    <input class="form-check-input searchType" type="checkbox" value="green" id="defaultCheck1">
                    <label class="form-check-label" for="defaultCheck1">
                        Green
                    </label>
                </div>

            </div>
            <div class="filter-option">
                <h6 style="margin-left:50px;margin-top:10px;margin-bottom:20px">Price</h6>
                <div class="form-check" style="margin-left:50px;">
                    <input class="form-check-input searchType" type="checkbox" value="0" id="defaultCheck1">
                    <label class="form-check-label" for="defaultCheck1">
                        Rs. 0-500
                    </label>
                </div>
                <div class="form-check" style="margin-left:50px;margin-top:10px;margin-bottom:10px">
                    <input class="form-check-input searchType" type="checkbox" value="500" id="defaultCheck2">
                    <label class="form-check-label" for="defaultCheck2">
                        Rs. 500-1000
                    </label>
                </div>
                <div class="form-check" style="margin-left:50px;margin-top:10px;margin-bottom:10px">
                    <input class="form-check-input searchType" type="checkbox" value="1000" id="defaultCheck2">
                    <label class="form-check-label" for="defaultCheck2">
                        Rs. 1000-1500
                    </label>
                </div>
            </div>
            <div class="filter-option">
                <h6 style="margin-left:50px;margin-top:10px;margin-bottom:20px">Discount</h6>
                <div class="form-check" style="margin-left:50px;">
                    <input class="form-check-input searchType" type="checkbox" value="30" id="defaultCheck1">
                    <label class="form-check-label" for="defaultCheck1">
                        30% And Above
                    </label>
                </div>
                <div class="form-check" style="margin-left:50px;margin-top:10px;margin-bottom:10px">
                    <input class="form-check-input searchType" type="checkbox" value="40" id="defaultCheck2">
                    <label class="form-check-label" for="defaultCheck2">
                        40% And Above
                    </label>
                </div>
                <div class="form-check" style="margin-left:50px;margin-top:10px;margin-bottom:10px">
                    <input class="form-check-input searchType" type="checkbox" value="50" id="defaultCheck2">
                    <label class="form-check-label" for="defaultCheck2">
                        50% And Above
                    </label>
                </div>
                <div class="form-check" style="margin-left:50px;margin-top:10px;margin-bottom:10px">
                    <input class="form-check-input searchType" type="checkbox" value="60" id="defaultCheck2">
                    <label class="form-check-label" for="defaultCheck2">
                        60% And Above
                    </label>
                </div>
                <div class="form-check" style="margin-left:50px;margin-top:10px;margin-bottom:10px">
                    <input class="form-check-input searchType" type="checkbox" value="70" id="defaultCheck2">
                    <label class="form-check-label" for="defaultCheck2">
                        70% And Above
                    </label>
                </div>
                <div class="form-check" style="margin-left:50px;margin-top:10px;margin-bottom:10px">
                    <input class="form-check-input searchType" type="checkbox" value="80" id="defaultCheck2">
                    <label class="form-check-label" for="defaultCheck2">
                        80% And Above
                    </label>
                </div>
            </div>
        </div>

        <div class="searchresult">
            <div class="row" id="row1">


            </div>
        </div>
    </div>

    <script src="https://use.fontawesome.com/b45ad4cb7f.js"></script>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="{{asset('js/search.js')}}"></script>
</body>

</html>