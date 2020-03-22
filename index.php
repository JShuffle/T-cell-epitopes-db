<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/3/15
 * Time: 14:19
 */

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>T cell</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="front/bootstrap.css"  crossorigin="anonymous">
</head>
<body>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->

<header>
<div class="jumbotron p-3 p-md-5 text-white rounded bg-dark">
    <div class="col-md-6 px-0">
        <div class="row align-items-end">
            <h1 class="display-4 font-italic">TCED</h1>
            <p class="lead">&nbsp;&nbsp;&nbsp;A T-Cell Epitope Database.</p>
        </div>
    </div>
</div>
</header>

<div class="container">
    <form action="result.php" method="post">
        <div class="row">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" id="dropbox">ALL</button>

                    <div class="dropdown-menu">
                        <p class="dropdown-item" id="all">ALL</p>
                        <p class="dropdown-item" id="an">Antigen Name</p>
                        <p class="dropdown-item" id="ncbiid">NCBI ID</p>
                        <p class="dropdown-item" id="bd">Browse Data</p>
                    </div>
                    <input type="text" name="search" value="ALL" id="change" style="display:none"/>
                </div>
                <input type="text" class="form-control" placeholder="e.g:KRAS" aria-label="" aria-describedby="basic-addon2" name="keyword">
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="submit">Go!</button>
                </div>
            </div>
        </div>
    </form>
</div>

<br>
<div class="container">
    <div class="row mb-2">
        <div class="col-md-6" style="padding-left: 0;padding-right: 0;">
            <div class="card flex-md-row mb-4 box-shadow h-md-250">
                <div class="card-body d-flex flex-column align-items-start">
                    <strong class="d-inline-block mb-2 text-primary">Data</strong>
                    <h3 class="mb-0">
                        <p class="text-dark">Data source</p>
                    </h3>
                    <div class="mb-1 text-muted">Apr 9</div>
                    <p class="card-text mb-auto">Our data are collected from database <strong>TANTIGEN: Tumor T-cell Antigen Database</strong>.</p>
                    <br>
                    <a href="http://cvc.dfci.harvard.edu/tadb/index.php">Link</a>
                </div>
            </div>
        </div>
        <div class="col-md-6" style="padding-left: 0;padding-right: 0;">
            <div class="card flex-md-row mb-4 box-shadow h-md-250">
                <div class="card-body d-flex flex-column align-items-start">
                    <strong class="d-inline-block mb-2 text-success">Instruction</strong>
                    <h3 class="mb-0">
                        <p class="text-dark">Help & Documentation</p>
                    </h3>
                    <div class="mb-1 text-muted">Apr 9</div>
                    <p class="card-text mb-auto">This is the instruction of TCED and how did we do our homework.</p>
                    <br>
                    <a href="howdidwedoourhomework.html">Continue reading</a>
                </div>
            </div>
        </div>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <span class="text-muted">Copyright @ 生信一拖三</span>
    </div>
</footer>

<style>
    /*
 * Footer
 */

    .dropdown-item{
        cursor:pointer;
    }

    html {
        position: relative;
        min-height: 100%;
    }
    body {
        margin-bottom: 60px; /* Margin bottom by footer height */
    }
    .footer {
        position: absolute;
        bottom: 0;
        width: 100%;
        height: 60px; /* Set the fixed height of the footer here */
        line-height: 60px; /* Vertically center the text there */
        background-color: #f5f5f5;
    }
    .container {
        width: auto;
        max-width: 800px;
        padding: 0 15px;
    }

    /* Custom page CSS

    -------------------------------------------------- */
    /* Not required for template or sticky footer method. */




</style>
<script src="front/jquery-3.3.1.min.js" crossorigin="anonymous"></script>
<script src="front/popper.js" crossorigin="anonymous"></script>
<script src="front/bootstrap.min.js" crossorigin="anonymous"></script>

<script type="text/javascript">
    $(function(){
//button
        $("#all").click(function(){
//用时间测试
            $("#dropbox").html("ALL");
            $("#change").val("ALL");
        });
        $("#an").click(function(){
//用时间测试
            $("#dropbox").html("Antigen Name");
            $("#change").val("Antigen Name");
        });
//input
        $("#ncbiid").click(function(){
//用时间测试
            $("#dropbox").html("NCBI ID");
            $("#change").val("NCBI ID");
        });
        $("#bd").click(function(){
//用时间测试
            $("#dropbox").html("Browse Data");
            $("#change").val("Browse Data");
        })
    })
</script>
</body>


</html>
