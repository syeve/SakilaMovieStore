<?php
    // if not logged in, go back to login page
    session_start();
    if (!isset($_SESSION['username'])) {
        header("Location: index.php");
    }
    require_once("navbar.php");
?>

<!DOCTYPE html>
<html>

    <head>
        <title>Sakila Movie Store</title>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    </head>

    <body>
        <div class="card">
            <div class="card-body">
                <form method="POST" action="procaddmovie.php">
                    <div class="row">
                        <div class="col-sm-7">
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" class="form-control" name="title" id="title" placeholder="Title">
                            </div>
                        </div>
                    </div>
                    <br>

                    <div class="row">
                        <div class="col-sm-7">
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea class="form-control" name="description" id="description" rows="3"></textarea>
                            </div>
                        </div>
                    </div>
                    <br>

                    <div class="row">
                        <div class="col-sm-7">
                            <div class="form-group">
                                <label for="title">Year</label>
                                <input type="text" class="form-control" name="year" id="year" placeholder="Year">
                            </div>
                        </div>
                    </div>
                    <br>

                    <div class="row">
                        <div class="col-sm-7">
                            <div class="form-group">
                                <label for="title">Rental Duration</label>
                                <input type="text" class="form-control" name="rentalduration" id="rentalduration" placeholder="Duration">
                            </div>
                        </div>
                    </div>      
                    <br>

                    <div class="row">
                        <div class="col-sm-7"> 
                            <div class="form-group">
                                <label for="title">Length</label>
                                <input type="text" class="form-control" name="length" id="length" placeholder="Length">
                            </div>
                        </div>
                    </div>
                    <br>

                    <div class="row">
                        <div class="col-sm-7"> 
                            <!-- G, PG, PG-13, R, NC-17 -->
                            <label for="rating">Rating</label>
                            <select name="rating" class="form-select"">
                                <option selected>Rating</option>
                                <option value="G">G</option>
                                <option value="PG">PG</option>
                                <option value="PG-13">PG-13</option>
                                <option value="R">R</option>
                                <option value="NC-17">NC-17</option>
                            </select>
                        </div>
                    </div>
                    <br>

                    <div class="row">
                        <div class="col-sm-7"> 
                            <div class="form-group">
                                <label for="title">Replacement Cost</label>
                                <input type="text" class="form-control" name="replacementcost" id="replacementcost" placeholder="Replacement Cost">
                            </div>
                        </div>
                    </div>
                    <br>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
     </body>
</html>