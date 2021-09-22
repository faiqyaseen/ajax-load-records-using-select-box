<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    </style>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <header>
            <div class="row justify-content-center bg-warning">
                <div class="col-md-6">
                    <h3>AJAX LOAD RECORDS USING SELECT BOX IN PHP</h3>
                </div>
            </div>

        </header>
        <div class="row mt-2 bg-dark text-white p-5">
            <div class="form-group">
                <label>Select City:</label>
                <select class="form-control" id="cityBox">
                    <option value="">
                        <-- Select City -->
                    </option>
                </select>
            </div>
        </div>

        <div class="row mt-2 d-none" id="tableRow">
            <table class="table table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Age</th>
                        <th>City</th>
                    </tr>
                </thead>
                <tbody id="tableData">

                </tbody>
            </table>
        </div>
    </div>



    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function() {

            function loadCity(){
                var loadcity = "";
                $.ajax({
                    url : "load-city-fetch-data.php",
                    type : "POST",
                    data : {loadcity : loadcity},
                    dataType : "JSON",
                    success : function(data){
                        $.each(data, function(key, value){
                            $("#cityBox").append("<option value='"+value.city+"'>"+value.city+"</option>")
                        })
                    }
                })
            }
            loadCity()

            // LOAD DATA
            $("#cityBox").change(function(){
                var city = $(this).val();

                if(city == ""){
                    $("#tableRow").addClass("d-none")
                    $("#tableData").html("");
                }else{
                    $.ajax({
                    url : "load-city-fetch-data.php",
                    type : "POST",
                    data : {city : city},
                    success : function(data){
                        $("#tableRow").removeClass("d-none")
                        $("#tableData").html(data)
                    }
                })
                }
            })
        })
    </script>
</body>

</html>