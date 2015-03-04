<html>
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Grade to SGPA Calculator">
    <meta name="keywords" content="Grade, SGPA, calculator, PU Grade to SGPA calculator, Grade to SGPA calculator, Pokhara University Grade to SGPA Calculator">
    <meta name="author" content="Sameer Gurung">
<title>Grade to SGPA Converter</title>
<link rel="stylesheet" type="text/css" href="bootstrap.min.css">

<style>

</style>
</head>
<body>
<div id="fb-root"></div>
<script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.0";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>

<nav class="navbar navbar-default">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="http://www.greenfeetsoft.com/grade-to-sgpa/index.php">Grade to SGPA Converter</a>
        </div>

        <!--<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="active"><a href="#">Link <span class="sr-only">(current)</span></a></li>
                <li><a href="#">Link</a></li>

            </ul>

        </div>-->
    </div>
</nav>

<div class="container">
    <div class="col-md-9">
        <h2>Welcome to Grade to SGPA calculator !!!</h2>
        <div>
            <a class="twitter-share-button"
               href="https://twitter.com/share">
                Tweet
            </a>
            <div class="fb-like" data-href="http://www.greenfeetsoft.com/grade-to-sgpa/index.php" data-layout="standard" data-action="like" data-show-faces="false" data-share="true"></div>
        </div>

        <h3>Enter the number of subjects</h3>
        <form action="index.php" method="POST" class="form-inline">
            <div class="form-group">
                <label for="number" class="control-label"> No of subjects:</label>

                <input type="text" name="number"  class="form-control">
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-success">Submit</button>
            </div>

        </form>

        <?php
        if(isset($_POST['number'])){
            $number = $_POST['number'];
            if(!empty($number)){
                echo "<h2>The number of subjects entered is: ".$number."</h2>";
                $number_of_subjects = $number;
            }else{
                echo "<span class='text-danger'>Please enter the number of subjects !!!</span>";
            }
        }
        ?>

        <?php
        if(!empty($number_of_subjects)){
            ?>
            <form action="index.php" method="POST" class="form-inline">
                <div class="form-group">
                    <div class="">
                <?php
                for($i=1; $i<=$number_of_subjects; $i++){
                    echo 'Subject '.$i.'&nbsp;&nbsp;<select class="form-control" name="'.$i.'">
			<option value="4">A</option>
			<option value="3.7">A-</option>
			<option value="3.3">B+</option>
			<option value="3">B</option>
			<option value="2.7">B-</option>
			<option value="2.3">C+</option>
			<option value="2">C</option>
			<option value="1.7">C-</option>
			<option value="1.3">D+</option>
			<option value="1.0">D</option>
		</select>';
                    echo '&nbsp;&nbsp;Credit hours: &nbsp;&nbsp;<select class="form-control" name="hr'.$i.'">
			<option value="1">1</option>
			<option value="2">2</option>
			<option value="3">3</option>
			<option value="4">4</option>
			<option value="5">5</option>
			<option value="6">6</option>
		</select>
		';
                    echo'<br><br>';
                }

                ?>

                <input type="text" name="value_of_i" value="<?php echo --$i;?>" hidden>
                <input type="submit" value="Submit" id="second" class="btn btn-success">
                    </div>
                </div>
            </form>
        <?php
        }

        if(isset($_POST['value_of_i'])){
            $value_of_i = $_POST['value_of_i'];
            if(!empty($value_of_i)){
                $credit_hours_total = 0;
                $grade_mul_credit_tot = 0;
                for($j=1; $j<=$value_of_i; $j++){

                    $grade_mul_credit = $_POST[$j]*$_POST["hr".$j];
                    $grade_mul_credit_tot = $grade_mul_credit_tot + $grade_mul_credit;
                    $credit_hours_total = $credit_hours_total + $_POST["hr".$j];

                }

                $sgpa = $grade_mul_credit_tot/$credit_hours_total;
                $final = round($sgpa,2);

                echo "<br>";

                echo "<h3>Your SGPA is:".$final."</h3>";
                echo "<h3>Your evalution:</h3> ";
                $a = floatval($final);

                if($a>3.7){
                    echo "<h3>Outstanding !!!</h3>";
                }elseif ($a>3.3) {
                    echo "<h3>Excellent !!!</h3>";
                }elseif($a>3.0){
                    echo "<h3>Very Good !!!</h3>";
                }elseif($a>2.7){
                    echo "<h3>Good !</h3>";
                }elseif($a>1.7){
                    echo "<h3>Fair</h3>";
                }elseif($a>=1.0){
                    echo "<h3>Poor</h3>";
                }else{
                    echo "<h3>Fail</h3>";
                }

            }
        }

        ?>
    </div>
    <div class="col-md-3">
        <div >

                <img src="img/sameer-grade-calc.png" class="img-responsive img-circle img-thumbnail">


            <h3>About developer:</h3>
            <h3>Sameer Gurung</h3>
            <h3>Developer at:</h3>
            <h3><a href="http://www.greenfeetsoft.com" target="_blank">Green Feet Software Solutions</a></h3>
            <a class="twitter-mention-button"
               href="https://twitter.com/intent/tweet?screen_name=smrgrg2541">
                Tweet to @twitterdev
            </a>
        </div>
    </div>
</div>

<script type="text/javascript" src="js/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script>
    window.twttr=(function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],t=window.twttr||{};if(d.getElementById(id))return;js=d.createElement(s);js.id=id;js.src="https://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);t._e=[];t.ready=function(f){t._e.push(f);};return t;}(document,"script","twitter-wjs"));
</script>
</body>
</html>