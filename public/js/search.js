var search_name = [];
var search_data = {
    gender: null,
    fit: null,
    color: null,
    price: null,
    discount: null,
    
};
var start_flag = 21;
var fit = [];
var color = [];
var discount = [];
var gender = [];
var price = [];
var sort="";
function search(searchname) {
    var len = searchname.length;
    var store = searchname[len - 1];
    localStorage.setItem("dress", store);
    $.ajax({
        url: "/search",
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        type: "post",
        data: {
            name: searchname,
        },
        success: function (res) {
            $("#row1").empty();

            if (res) {
                $.each(res, function (index, value) {
                    $("#row1").append(
                        "" +
                            '<div class="card custom-card col-lg-3">' +
                            '<img class="card-img-top"' +
                            'src="https://getketchadmin.getketch.com/product/' +
                            value.sku +
                            "" +
                            "/300/" +
                            value.image +
                            '"' +
                            'alt="Card image cap">' +
                            '<div class="card-body">' +
                            '<h6 class="card-title">' +
                            value.brand +
                            "</h6>" +
                            '<p class="text" style="color:#696969">' +
                            value.name +
                            "</p>" +
                            '<p class="text">Size:' +
                            value.size +
                            "</p>" +
                            '<p class="text">' +
                            value.selling_price +
                            '&nbsp;<del style="color:#696969">' +
                            value.price +
                            '</del>&nbsp;<span style="color:red">(' +
                            value.discount +
                            "% Off)</span></p>" +
                            "</div>" +
                            "</div>"
                    );
                });
            }
        },
    });
}
function load() {
    searchname = localStorage.getItem("dress");
    $.ajax({
        url: "/load",
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        type: "post",
        data: {
            name: searchname,
            start: start_flag,
            
        },
        success: function (res) {
            if (res) {
                $.each(res, function (index, value) {
                    $("#row1").append(
                        "" +
                            '<div class="card custom-card col-lg-">' +
                            '<img class="card-img-top"' +
                            'src="https://getketchadmin.getketch.com/product/' +
                            value.sku +
                            "" +
                            "/300/" +
                            value.image +
                            '"' +
                            'alt="Card image cap">' +
                            '<div class="card-body">' +
                            '<h6 class="card-title">' +
                            value.brand +
                            "</h6>" +
                            '<p class="text" style="color:#696969">' +
                            value.name +
                            "</p>" +
                            '<p class="text">Size:' +
                            value.size +
                            "</p>" +
                            '<p class="text">' +
                            value.selling_price +
                            '&nbsp;<del style="color:#696969">' +
                            value.price +
                            '</del>&nbsp;<span style="color:red">(' +
                            value.discount +
                            "% Off)</span></p>" +
                            "</div>" +
                            "</div>"
                    );
                });
            }
            start_flag += 20;
        },
    });
}
function combination(searchdata,sorting) {
    searchname = localStorage.getItem("dress");

    $.ajax({
        url: "/filter",
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        type: "post",
        data: {
            name: searchname,
            filters: searchdata,
            sort:sorting
        },
        success: function (res) {
          console.log(res)
            $("#row1").empty();
            $("#result1").text(`showing ${res[1]} result`);
            if (res[0]) {
                $.each(res[0], function (index, value) {
                    $("#row1").append(
                        "" +
                            '<div class="card custom-card col-lg-3">' +
                            '<img class="card-img-top"' +
                            'src="https://getketchadmin.getketch.com/product/' +
                            value.sku +
                            "" +
                            "/300/" +
                            value.image +
                            '"' +
                            'alt="Card image cap">' +
                            '<div class="card-body">' +
                            '<h6 class="card-title">' +
                            value.brand +
                            "</h6>" +
                            '<p class="text" style="color:#696969">' +
                            value.name +
                            "</p>" +
                            '<p class="text">Size:' +
                            value.size +
                            "</p>" +
                            '<p class="text">' +
                            value.selling_price +
                            '&nbsp;<del style="color:#696969">' +
                            value.price +
                            '</del>&nbsp;<span style="color:red">(' +
                            value.discount +
                            "% Off)</span></p>" +
                            "</div>" +
                            "</div>"
                    );
                });
            }
        },
    });
}
$("#searchbox").keyup(function () {
    search_name.push($(this).val());
    search(search_name);
});
$(document).ready(function () {
    $(window).scroll(function () {
        var position = $(window).scrollTop();
        var bottom = $(document).height() - $(window).height();

        if (position >= bottom) {
            load(search_name, start_flag);
        }
    });
});
$('.sorting').click(function(){
    sort=$(this).val();
    combination(search_data,sort)
})
$('input[type="checkbox"]').click(function () {
    if ($(this).prop("checked") == true) {
        let val = $(this).val();
        switch (val) {
            case "men":
                gender.push(val);
                search_data.gender = gender;
                break;
            case "women":
                gender.push(val);
                search_data.gender = gender;
                break;
            case "slim fit":
                fit.push(val);
                search_data.fit = fit;
                break;
            case "regular fit":
                fit.push(val);
                search_data.fit = fit;
                break;
            case "0":
                price.push(val);
                search_data.price = price;
                break;
            case "500":
                price.push(val);
                search_data.price = price;
                break;
            case "1000":
                price.push(val);
                search_data.price = price;
                break;
            case "rust":
                color.push(val);
                search_data.color = color;
                break;
            case "black":
                color.push(val);
                search_data.color = color;
                break;
            case "white":
                color.push(val);
                search_data.color = color;
                break;
            case "grey":
                color.push(val);
                search_data.color = color;
                break;
            case "charcoal":
                color.push(val);
                search_data.color = color;
                break;
            case "Brown":
                color.push(val);
                search_data.color = color;
                break;
            case "blue":
                color.push(val);
                search_data.color = color;
                break;
            case "red":
                color.push(val);
                search_data.color = color;
                break;
            case "maroon":
                color.push(val);
                search_data.color = color;
                break;
            case "green":
                color.push(val);
                search_data.color = color;
                break;
            case "30":
                discount.push(val);
                search_data.discount = discount;
                break;
            case "40":
                discount.push(val);
                search_data.discount = discount;
                break;
            case "50":
                discount.push(val);
                search_data.discount = discount;
                break;
            case "60":
                discount.push(val);
                search_data.discount = discount;
                break;
            case "70":
                discount.push(val);
                search_data.discount = discount;
                break;
            case "80":
                discount.push(val);
                search_data.discount = discount;
                break;
        }

        combination(search_data);
    } else {
        var check = $(this).val();
        switch (check) {
            case "men":
                gender.forEach(function (value, index) {
                    if (check == value) {
                        gender.splice(index, 1);
                    }
                });
                if (gender.length == 0) {
                    search_data.gender = null;
                } else {
                    search_data.gender = gender;
                }
                break;
            case "women":
                gender.forEach(function (value, index) {
                    if (check == value) {
                        gender.splice(index, 1);
                    }
                });
                if (gender.length == 0) {
                    search_data.gender = null;
                } else {
                    search_data.gender = gender;
                }
                break;
            case "slim fit":
                fit.forEach(function (value, index) {
                    if (check == value) {
                        fit.splice(index, 1);
                    }
                });
                if (fit.length == 0) {
                    search_data.fit = null;
                } else {
                    search_data.fit = fit;
                }
                break;
            case "regular fit":
                fit.forEach(function (value, index) {
                    if (check == value) {
                        fit.splice(index, 1);
                    }
                });
                if (fit.length == 0) {
                    search_data.fit = null;
                } else {
                    search_data.fit = fit;
                }
                break;
            case "0":
                price.forEach(function (value, index) {
                    if (check == value) {
                        price.splice(index, 1);
                    }
                });
                if (price.length == 0) {
                    search_data.price = null;
                } else {
                    search_data.price = price;
                }
                break;
            case "500":
                price.forEach(function (value, index) {
                    if (check == value) {
                        price.splice(index, 1);
                    }
                });
                if (price.length == 0) {
                    search_data.price = null;
                } else {
                    search_data.price = price;
                }
                break;
            case "1000":
                price.forEach(function (value, index) {
                    if (check == value) {
                        price.splice(index, 1);
                    }
                });
                if (price.length == 0) {
                    search_data.price = null;
                } else {
                    search_data.price = price;
                }
                break;
            case "rust":
                color.forEach(function (value, index) {
                    if (check == value) {
                        color.splice(index, 1);
                    }
                });
                if (color.length == 0) {
                    search_data.color = null;
                } else {
                    search_data.price = color;
                }
                break;
            case "black":
                color.forEach(function (value, index) {
                    if (check == value) {
                        color.splice(index, 1);
                    }
                });
                if (color.length == 0) {
                    search_data.color = null;
                } else {
                    search_data.price = color;
                }
                break;
            case "white":
                color.forEach(function (value, index) {
                    if (check == value) {
                        color.splice(index, 1);
                    }
                });
                if (color.length == 0) {
                    search_data.color = null;
                } else {
                    search_data.price = color;
                }
                break;
            case "grey":
                color.forEach(function (value, index) {
                    if (check == value) {
                        color.splice(index, 1);
                    }
                });
                if (color.length == 0) {
                    search_data.color = null;
                } else {
                    search_data.price = color;
                }
                break;
            case "charcoal":
                color.forEach(function (value, index) {
                    if (check == value) {
                        color.splice(index, 1);
                    }
                });
                if (color.length == 0) {
                    search_data.color = null;
                } else {
                    search_data.price = color;
                }
                break;
            case "Brown":
                color.forEach(function (value, index) {
                    if (check == value) {
                        color.splice(index, 1);
                    }
                });
                if (color.length == 0) {
                    search_data.color = null;
                } else {
                    search_data.price = color;
                }
                break;
            case "blue":
                color.forEach(function (value, index) {
                    if (check == value) {
                        color.splice(index, 1);
                    }
                });
                if (color.length == 0) {
                    search_data.color = null;
                } else {
                    search_data.price = color;
                }
                break;
            case "red":
                color.forEach(function (value, index) {
                    if (check == value) {
                        color.splice(index, 1);
                    }
                });
                if (color.length == 0) {
                    search_data.color = null;
                } else {
                    search_data.price = color;
                }
                break;
            case "maroon":
                color.forEach(function (value, index) {
                    if (check == value) {
                        color.splice(index, 1);
                    }
                });
                if (color.length == 0) {
                    search_data.color = null;
                } else {
                    search_data.price = color;
                }
                break;
            case "green":
                color.forEach(function (value, index) {
                    if (check == value) {
                        color.splice(index, 1);
                    }
                });
                if (color.length == 0) {
                    search_data.color = null;
                } else {
                    search_data.price = color;
                }
                break;
            case "30":
                discount.forEach(function (value, index) {
                    if (check == value) {
                        discount.splice(index, 1);
                    }
                });
                if (discount.length == 0) {
                    search_data.discount = null;
                } else {
                    search_data.discount = discount;
                }
                break;
            case "40":
                discount.forEach(function (value, index) {
                    if (check == value) {
                        discount.splice(index, 1);
                    }
                });
                if (discount.length == 0) {
                    search_data.discount = null;
                } else {
                    search_data.discount = discount;
                }
                break;
            case "50":
                discount.forEach(function (value, index) {
                    if (check == value) {
                        discount.splice(index, 1);
                    }
                });
                if (discount.length == 0) {
                    search_data.discount = null;
                } else {
                    search_data.discount = discount;
                }
                break;
            case "60":
                discount.forEach(function (value, index) {
                    if (check == value) {
                        discount.splice(index, 1);
                    }
                });
                if (discount.length == 0) {
                    search_data.discount = null;
                } else {
                    search_data.discount = discount;
                }
                break;
            case "70":
                discount.forEach(function (value, index) {
                    if (check == value) {
                        discount.splice(index, 1);
                    }
                });
                if (discount.length == 0) {
                    search_data.discount = null;
                } else {
                    search_data.discount = discount;
                }
                break;
            case "80":
                discount.forEach(function (value, index) {
                    if (check == value) {
                        discount.splice(index, 1);
                    }
                });
                if (discount.length == 0) {
                    search_data.discount = null;
                } else {
                    search_data.discount = discount;
                }
                break;
        }

        // search_data.forEach(function (value, index) {
        //     if (check == value) {
        //         search_data.splice(index, 1);
        //     }
        // });

        combination(search_data);
    }
});
