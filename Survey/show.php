<?php




?>
<!DOCTYPE html>
<html lang="en" >

<head>
    <meta charset="UTF-8">
    <title>BerryTeam Survey Form</title>
    <meta name="description" content="berrysurvey">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="CSS/main.css" type="text/css">
    <link rel="stylesheet" href="../Stylesheets/uniform.css">
    <link rel="stylesheet" type="text/css" href="../Stylesheets/navigation.css">
</head>
<body>
<? include '../includes/header-landing.php' ?>
<? include '../includes/navigation.php' ?>
<header>
    <h1 id="title" class="text-center p-3">BerryTeam Survey</h1>
</header>
<main class="mx-auto rounded p-2 container">
    <p id="description" class="text-center">Thank you for taking a minute to fill out this survey.</p>

    <form id="survey-form">
        <div class="form-group">
            <h5 id="select" class="text center">Please, select one answer.</h5>
        </div>

        <div class="form-group row">
            <label id="choices-label" class="col-6 col-form-label text-left" for="choices" value="<?= $title; ?>">
                In a typical day, how often do you feel stressed at work?:
            </label>
            <div class="col-6">
                <div>
                    <label for="choice-one" class="col-form-label form-check-label pb-0">
                        <input type="radio" class="form-check-input" id="optionA" name="choices" value="1">
                        Most of the Time
                    </label>
                </div>
                <div>
                    <label for="choice-two" class="col-form-label form-check-label pb-0">
                        <input type="radio" class="form-check-input" id="optionB" name="choices" value="2">
                        About Half of the Time
                    </label>
                </div>
                <div>
                    <label for="choice-three" class="col-form-label form-check-label pb-0">
                        <input type="radio" class="form-check-input" id="optionC" name="choices" value="3">
                        Once in a While
                    </label>
                </div>
            </div>
        </div>
    </form>

    <form id="survey-form">
        <div class="form-group row">
            <label id="choices-label" class="col-6 col-form-label text-left" for="choices">
                Does BerryTeam App helps you achive your work goals?:
            </label>
            <div class="col-6">
                <div>
                    <label for="choice-one" class="col-form-label form-check-label pb-0">
                        <input type="radio" class="form-check-input" id="optionA" name="choices" value="1">
                        Most of the Time
                    </label>
                </div>
                <div>
                    <label for="choice-two" class="col-form-label form-check-label pb-0">
                        <input type="radio" class="form-check-input" id="optionB" name="choices" value="2">
                        About Half of the Time
                    </label>
                </div>
                <div>
                    <label for="choice-three" class="col-form-label form-check-label pb-0">
                        <input type="radio" class="form-check-input" id="optionC" name="choices" value="3">
                        Once in a While
                    </label>
                </div>
            </div>
        </div>
    </form>

    <form id="survey-form">
        <div class="form-group row">
            <label id="choices-label" class="col-6 col-form-label text-left" for="choices">
                Does BerryTeam App works for you as you expected?:
            </label>
            <div class="col-6">
                <div>
                    <label for="choice-one" class="col-form-label form-check-label pb-0">
                        <input type="radio" class="form-check-input" id="optionA" name="choices" value="1">
                        Most of the Time
                    </label>
                </div>
                <div>
                    <label for="choice-two" class="col-form-label form-check-label pb-0">
                        <input type="radio" class="form-check-input" id="optionB" name="choices" value="2">
                        About Half of the Time
                    </label>
                </div>
                <div>
                    <label for="choice-three" class="col-form-label form-check-label pb-0">
                        <input type="radio" class="form-check-input" id="optionC" name="choices" value="3">
                        Once in a While
                    </label>
                </div>
            </div>
        </div>
    </form>

    <form id="survey-form">
        <div class="form-group row">
            <label id="choices-label" class="col-6 col-form-label text-left" for="choices">
                How satisfied are you with all the features offered by BerryTeam?:
            </label>
            <div class="col-6">
                <div>
                    <label for="choice-one" class="col-form-label form-check-label pb-0">
                        <input type="radio" class="form-check-input" id="optionA" name="choices" value="1">
                        Very Satisfied
                    </label>
                </div>
                <div>
                    <label for="choice-two" class="col-form-label form-check-label pb-0">
                        <input type="radio" class="form-check-input" id="optionB" name="choices" value="2">
                        Satisfied
                    </label>
                </div>
                <div>
                    <label for="choice-three" class="col-form-label form-check-label pb-0">
                        <input type="radio" class="form-check-input" id="optionC" name="choices" value="3">
                        Not Satisfied
                    </label>
                </div>
            </div>
        </div>
    </form>

    <form id="survey-form">
        <div class="form-group row">
            <label id="choices-label" class="col-6 col-form-label text-left" for="choices">
                How satisfied are you with the ability to integrate BerryTeam with other services?:
            </label>
            <div class="col-6">
                <div>
                    <label for="choice-one" class="col-form-label form-check-label pb-0">
                        <input type="radio" class="form-check-input" id="optionA" name="choices" value="1" >
                        Very Satisfied
                    </label>
                </div>
                <div>
                    <label for="choice-two" class="col-form-label form-check-label pb-0">
                        <input type="radio" class="form-check-input" id="optionB" name="choices" value="2">
                        Satisfied
                    </label>
                </div>
                <div>
                    <label for="choice-three" class="col-form-label form-check-label pb-0">
                        <input type="radio" class="form-check-input" id="optionC" name="choices" value="3">
                        Not satisfied
                    </label>
                </div>
            </div>
        </div>
        <form>

            <div class="form-group">
                <label id="text-label" class="col-6 col-form-label text-left" for="text-area">
                    Further comments:
                </label>
                <div class="col-6">
                    <textarea class="form-control" id="text-area" rows="3"></textarea>
                </div>
            </div>

            <div class="text-center">
                <input class="btn btn-primary" type="submit" id="submit">
            </div>
        </form>
</main>
</body>
</html>
