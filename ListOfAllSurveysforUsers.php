<?php
require_once 'dbConnection.php';
require_once 'Survey.php';
include_once 'main.html'
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootswatch/4.4.1/darkly/bootstrap.min.css">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>List of surveys for Users</title>
</head>
<body>
<main class="main">
<!-- Top buttons -->
<div .class="inline-block"><a class="btn btn-primary btn-lg" href="#" role="button">Create New Survey</a>
    
</div>


</div>

<!-- end Top Buttons -->
<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">Survey Name</th>
      <th scope="col">Description</th>
      <th scope="col">Take Survey</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($surveys as $survey) { ?>
        <tr>
            <td><?= $survey['surveyname'] ?></td>
            <td><?= $survey['description'] ?></td>
            <td>
                <form action="TakeSurvey.php" method="post">
                    <input type="hidden" name="id" value="<?= $survey['id'] ?>"/>
                    <input type="submit" class="button btn btn-primary" name="TakeSurvey" value="TakeSurvey"/>
                </form>
            </td>
           
        </tr>
    <?php } ?>
    </tbody>
</table>
</main>   
</body>
</html>