<!DOCTYPE html>

<html>

<head>
  <title>Hello!</title>

  <link rel="stylesheet" href="css/all.min.css" />
  <link rel="stylesheet" href="css/bootstrap.min.css" />
  <link rel="stylesheet" href="css/style.css"/>
  <link rel="stylesheet" href="css/teacherassistant.css" />

</head>

<body>
    <div class="contentobjects">
    <div class="contentstudent">
                    <div class="search">
                        <div class="formsearchbtn input-group-addon" id="basic-addon1">Search<i class="searchicon fas fa-search"></i></div>
                        <div class="searchform">
                            <div class="container">
                                <div class="row">
                                    <div class="col word">
                                        <h5>Doctor</h5>
                                    </div>
                                    <div class="col word">
                                        <select>
                                            <option></option>
                                            <option>CS</option>
                                            <option>Buss</option>
                                        </select>
                                    </div>
                                    <div class="col word">
                                        <form>
                                            <button class="searchbtn btn  my-2 my-sm-0" type="submit">Search</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="container addstudent">
                        <button class="searchbtn addstudentbtn btn  my-2 my-sm-0" type="submit">Add New Teacherassistant</button>
                    </div>

                    <div class="sections">

                        <div class="container">
                            <div class="row">

                                <div class="col-xl-9">

                                    <div class="servicetable">
                                        <table class="table table-dark">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Teacherassistant_id</th>
                                                    <th scope="col">Name</th>
                                                    <th scope="col">Email</th>

                                                    <th scope="col" colspan="2">Operation</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <th scope="row">1</th>
                                                    <td>Mark</td>

                                                    <td>@mdo</td>
                                                    <td><i class='edit fas fa-edit' style='font-size:20px'></i> <i class="delete fas fa-trash" style='font-size:20px;margin-left:3px'></i></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">2</th>
                                                    <td>Jacob</td>

                                                    <td>@fat</td>
                                                    <td><i class='edit fas fa-edit' style='font-size:20px'></i> <i class="delete fas fa-trash" style='font-size:20px;margin-left:3px'></i></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">3</th>
                                                    <td>Larry</td>

                                                    <td>@twitter</td>
                                                    <td><i class='edit fas fa-edit' style='font-size:20px'></i> <i class="delete fas fa-trash" style='font-size:20px;margin-left:3px'></i></td>
                                                </tr>
                                            </tbody>
                                        </table>

                            </div>

                        </div>

                    </div>

                </div>
            </div>
        </div>

    </div>
    <!--Start OF STUDENT SHOWFORMS-->
    <div class="showform">

    <div class="section">

        <div class="container">
            <div class="row">

                 <div class="col-xl-6">

                     <div class="serviceform">
                          <i  class="exitt fas fa-window-close"></i>
                         <form action="">
                             <input type="text" placeholder="Name" class="form-control inputform" />
                             <input type="text" placeholder="Email" class="form-control inputform" />
                             <input type="text" placeholder="Teacherassistant_ID" class="form-control inputform" />

                             <input type="submit" class="btn btn-secondary inputbtn" value="Add" />
                         </form>
                     </div>

                </div>

            </div>

        </div>
    </div>

</div>
<!--END OF STUDENT SHOWFORMS-->

<!--START OF STUDENT EDITFORMS-->
<div class="editform">

    <div class="section">

        <div class="container">
            <div class="row">

                 <div class="col-xl-6">

                     <div class="serviceform">
                         <i  class="exit fas fa-window-close"></i>
                         <form action="">
                             <input type="text" placeholder="Name" class="form-control inputform" />
                             <input type="text" placeholder="Email" class="form-control inputform" />
                             <input type="text" placeholder="Teacherassistant_ID" class="form-control inputform" />
                             <input type="submit" class="btn btn-secondary inputbtn" value="Edit" />
                         </form>
                     </div>

                </div>

            </div>

        </div>
    </div>

</div>
<!--END OF STUDENT EDITFORMS-->








<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/teacherassistant.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>

</body>
</html>