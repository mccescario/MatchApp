<?php
    error_reporting(0);
    ini_set('display_errors', 0);
    include('app/Visualizer.php');
    include('app/connect.php');
    include('app/Builder.php');
    $tournament = $_POST['tournament_model_id'];
    $query = mysqli_query($con,"
        SELECT
        t.id, t.team_name
        FROM tioszfko_matchapp.team_participants tp
        left join tournament_models tm on tp.tournament_model_id = tm.id
        left join teams t on tp.team_id = t.id
        where tournament_model_id=$tournament");

    $default_teams = array();
    foreach($query as $data) {
        $default_teams[] = $data['team_name'];
    }
    $_POST['teams'] = $default_teams;
    $_POST['typeof'] = 1;

    if(!$_POST) {
        $_POST['teams'] = $default_teams;
        $_POST['typeof'] = 1;
    }

?>
<!DOCTYPE html>
<html lang="en">
   <head>
        <!-- <meta name="csrf-token" content="{{ csrf_token() }}"> -->
        <title>Tournament Brackets Generator</title>
        <link href="/bracket/assets/css/bootstrap.min.css" rel="stylesheet">
        <link href="/bracket/assets/css/bracketlyStyle.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Saira+Semi+Condensed:100,200,300,400,500,600&display=swap" rel="stylesheet">
        <script src="/bracket/documentation/assets/highlight.pack.js"></script>
        <link href="/bracket/documentation/assets/github.css" rel="stylesheet">
        <script>hljs.initHighlightingOnLoad();</script>
   </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="/player-dashboard">MatchApp</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                <!-- <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Football Visualizer
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="?data=fifa2014&type=football">FIFA World Cup 2014</a>
                        <a class="dropdown-item" href="?data=fifa2018&type=football">FIFA World Cup 2018</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    E-sport Visualizer
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="?data=major2013&type=e-sport">CS:GO Major 2013</a>
                    </div>
                </li> -->
                <li class="nav-item">
                    <a class="nav-link" href="?data=tournament&type=generator">Tournament Bracket Generator</a>
                </li>
                <!-- <li class="nav-item">
                    <a class="nav-link" href="./documentation/features.html">Features</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./documentation/index.html">Documentation</a>
                </li> -->
                </ul>
            </div>
        </nav>
        <div class="d-grid">
        <div class="grid-l">
            <?php if(isset($_GET['data']) && $_GET['type'] == 'generator') :?>
            <form method="post" id="team-list-generator">
                <h4>Generate tournament</h4>
                <br>
                Tournament: <br>
                <div class="control-group">

                    <select name="tournament_model_id" class="form-control">

                        <option value="<?php $_POST['tournament_model_id'] ?>" <?php if($_POST['tournament_model_id'] == 1){ echo 'selected'; } ?>><?php $_POST['team_id']?></option>



                    </select>
                    <div class="control__indicator"></div>
                </div>

                <div class="title">List of team/s</div>
                <div class="list" sortable-list="sortable-list">
                    <?php if(!empty($_POST['teams'])):?>
                    <?php foreach( $_POST['teams'] as $sKey => $iQty ):?>
                        <div class="list__item" sortable-item="sortable-item">
                        <div class="list__item-content">
                        <input autocomplete="off" class="list__item-input" name="teams[<?php echo $sKey; ?>]" id="<?php echo $sKey; ?>" type="text" placeholder="Team name" value="<?php echo $iQty ?>">
                        </div>
                        <div class="list__item-handle" sortable-handle="sortable-handle"></div>
                        </div>
                    <?php endforeach; ?>
                    <?php endif; ?>
                </div>
                <!-- <div class="control-group">
                    <label class="control control--radio">Seeded
                        <input value="1" <?php echo isset($_POST['typeof']) && $_POST['typeof'] == 1 ? ' checked' : '' ?> type="radio" name="typeof" checked="checked"/>
                        <div class="control__indicator"></div>
                    </label>
                </div> -->
                <div class="team-list-form-footer">
                    <button type="submit" class="btn btn-light">Generate bracket</button>
                </div>
            </form>

            <?php endif; ?>
        </div>
        <div class="grid-r">
        <!-- <h3>Winning Result</h3> -->
        <div class="app-container">
            <?php
                if(isset($_GET['type']) && $_GET['type'] == "generator") {
                    if(!empty($_POST['teams'])){
                        $names = array();
                        foreach( $_POST['teams'] as $sKey => $iQty ) {
                            if(!empty($iQty)){
                                array_push($names, $iQty);
                            }
                        }
                        $brackets = new Builder($names, $_POST['typeof']);
                        echo $brackets->RenderBrackets();
                    } else {
                        $brackets = new Builder($default_teams, $_POST['typeof']);
                        echo $brackets->RenderBrackets();
                    }

                ?>
        </div>
        <h3>Bracket Result</h3>
        <div class="app-container">
            <?php
                    //$file = 'http://localhost:8888/api/data-bracket/'.$tournament.'.json';
                    $file = './assets/json/major2013.json';
                    $json = file_get_contents($file);
                    $obj = json_decode($json);
                    $teams_d = array();
                    $teams_h = array();
                    $teams_a = array();

                    foreach($obj->matches as $match){
                        $teams_h["name"] = $match->team1;
                        $teams_h["score"] = $match->score1;

                        $teams_a["name"] = $match->team2;
                        $teams_a["score"] = $match->score2;

                        $teams_d[] = $teams_h;
                        $teams_d[] = $teams_a;
                    }
                    //Setting array
                    //1. Show All teams image
                    //2. Bronze match availabel and show it or dont show it true or false
                    //3. Bronze match availabel in list but we need correction true or false
                    $settings = array('image'=>false, 'bronze'=>false, 'nobronze' => false);
                    $brackets = new Visualizer($teams_d, $settings);
                    echo $brackets->RenderFromData();
                }
                ?>
        </div>
        </div>
        </div>
        <script src="/bracket/assets/js/jquery-3.4.1.min.js"></script>
        <script src="/bracket/assets/js/bootstrap.min.js"></script>
        <script src="/bracket/assets/js/jquery-ui.min.js"></script>
        <script src="/bracket/assets/js/jquery-multisortable.min.js"></script>
        <script src="/bracket/assets/js/bracketly.js"></script>

        <script>
            $(function() {
                var selectedTeam;
                $(".team-select-dorpdown").change(function(){
                    selectedTeam = $(this).val();
                });
                $(".score").on("change", function(){
                    if(selectedTeam == undefined && $(this).attr("data-team") == '') {
                        alert("Please select team first");
                        return false;
                    }
                    var num = $(this).attr("match-number");
                    var dTeam = ($(this).attr("data-team") ? $(this).attr("data-team") : selectedTeam);
                    var cTeam = ($(this).attr("team") == 'home' ? 'team1' : 'team2');
                    var sTeam = ($(this).attr("team") == 'home' ? 'score1' : 'score2');
                    var score = $(this).val();
                    var tournament = $("select[name='tournament_model_id'] option:selected").val();

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        type:'POST',
                        url:"/api/update-bracket",
                        data:{
                            num: num, tournament_model_id: tournament, team_col: cTeam, team_data: dTeam, score_col: sTeam, score_data: score, _token: '{!! csrf_token() !!}'
                        },
                        success:function(data){
                            console.log(data);
                        }
                    });

                });
            });
        </script>
    </body>
</html>
