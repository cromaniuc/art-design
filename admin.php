<?php
           session_start();  
           if (isset($_SESSION['username'])){
                /*do nothing*/
           }else {
                header("Location: login.html"); 
           }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link href="dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="dist/css/main.css" rel="stylesheet">
    <script type='text/javascript' src='dist/js/knockout-3.4.0.js'></script>
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">

</head>
<body>

<div class="container my-custom-container">

    <fieldset class="form-group row">
        <legend>Salveaza imaginea in :</legend>
        <div class="radio">
            <label>
                <input data-bind="checked: saveMode" type="radio" name="optionsRadios" id="optionsPictura"
                       value="pictura">
                pictura
            </label>
        </div>
        <div class="radio">
            <label>
                <input data-bind="checked: saveMode" type="radio" name="optionsRadios" id="optionsDesign"
                       value="design">
                design
            </label>
        </div>
    </fieldset>
    <h2>Imagini</h2>
    <p><a class="btn btn-primary" data-bind="click: $root.add" href="#" title="edit"><i
            class="glyphicon glyphicon-ok-plus"></i> Adauga imagine</a></p>

    <table class="table table-striped table-bordered">
        <thead>
        <tr>
            <th>Titlu</th>
            <!-- ko if: $root.saveMode() === 'pictura' -->
            <th>Descriere</th>
            <th>Dimensiuni</th>
            <!-- /ko -->
            <th>Imagine</th>

            <th style="width: 100px; text-align:right;"/>
        </tr>
        </thead>
        <tbody data-bind=" template:{name:templateToUse, foreach: pagedList }"></tbody>
    </table>

    <!--<div class="pagination">
        <ul><li data-bind="css: { disabled: pageIndex() === 0 }"><a href="#" data-bind="click: previousPage">Previous</a></li></ul>
        <ul data-bind="foreach: allPages">
            <li data-bind="css: { active: $data.pageNumber === ($root.pageIndex() + 1) }"><a href="#" data-bind="text: $data.pageNumber, click: function() { $root.moveToPage($data.pageNumber-1); }"></a></li>
        </ul>
        <ul><li data-bind="css: { disabled: pageIndex() === maxPageIndex() }"><a href="#" data-bind="click: nextPage">Next</a></li></ul>
    </div>
-->
    <script id="itemsTmpl" type="text/html">
        <tr>
            <td data-bind="text: title"></td>

            <!-- ko if: $root.saveMode() === 'pictura' -->
            <td data-bind="text: description"></td>
            <td data-bind="text: dimensions"></td>
            <!-- /ko -->

            <td>Imagine</td>

            <td class="buttons">
                <a class="btn" data-bind="click: $root.edit" href="#" title="edit"><i
                        class="glyphicon glyphicon-edit"></i></a>
                <a class="btn" data-bind="click: $root.remove" href="#" title="remove"><i
                        class="glyphicon glyphicon-remove"></i></a>
            </td>
        </tr>
    </script>

    <script id="editTmpl" type="text/html">
        <tr>
            <td><input data-bind="value: title"/></td>

            <!-- ko if: $root.saveMode() === 'pictura' -->
            <td><input data-bind="value: description"/></td>
            <td><input data-bind="value: dimensions"/></td>
            <!-- /ko -->

            <td>
                <div class="form-group row">
                    <input
                            type="file" class="form-control-file"
                            data-bind="file: {data: content, name: $root.fileName, reader: $root.someReader}"
                    >
                </div>
            </td>
            <td class="buttons">
                <a class="btn btn-success" data-bind="click: $root.save" href="#" title="save"><span
                        class="glyphicon glyphicon-ok" aria-hidden="true"></span></a>
                <a class="btn" data-bind="click: $root.cancel" href="#" title="cancel"><i
                        class="glyphicon glyphicon-trash"></i></a>
            </td>
        </tr>
    </script>

    <a href = "logout.php" tite = "Logout">Logout</a>

</div>

 <div class="modal" style="display: none">
        <div class="center">
            <div class="loader">Loading...</div>
        </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.2.0/js/tether.min.js"></script>
<script src="dist/js/bootstrap.min.js"></script>


<script type="text/javascript" data-main="dist/js/initAdmin.js" src="dist/js/require.js"></script>


</body>
</html>