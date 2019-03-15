<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.css')  }}">

  <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css')  }}"> 
  <script type="text/javascript" src="{{ asset('js/bootstrap.js') }}"></script>
  <script type="text/javascript" src=" {{ asset('js/jquery-3.1.0.js') }}"></script>
<style>
body {font-family: Arial;}

/* Style the tab */
.tab {
  overflow: hidden;
  border: 1px solid #ccc;
  background-color: black;
}

/* Style the buttons inside the tab */
.tab button {
  background-color: inherit;
  color: white;
  float: left;
  border: none;
  outline: none;
  cursor: pointer;
  padding: 14px 16px;
  transition: 0.3s;
  font-size: 17px;
}

/* Change background color of buttons on hover */
.tab button:hover {
  background-color: #ddd;
}

/* Create an active/current tablink class */
.tab button.active {
  background-color: black;
  color: red;
}

/* Style the tab content */
.tabcontent {
  display: none;
  padding: 6px 12px;
  border: 1px solid #ccc;
  border-top: none;
}
</style>
</head>
<body>

<h2>Sportz CMS</h2>

<div class="tab">
  <button class="tablinks" onclick="openCity(event, 'Team')" id="defaultOpen">Team</button>
  <button class="tablinks" onclick="openCity(event, 'Player')">Player</button>
  <button class="tablinks" onclick="openCity(event, 'Match')">Match</button>
</div>

<div id="Team" class="tabcontent">
  <div>
         <a href='{{ url("team") }}' class="btn btn-primary"> Add Team</a>
         </div>
         <br>
  <table class="table table-striped table-hover">
            <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>

            @if(count($teams) > 0)
                @foreach($teams as $team)

                    <tr>
                        <th >{{ $team->id }}</th>
                        <td>{{ $team->team_name }}</td>

                        <td style="display: flex; align-items: center">
                            <a href='{{ url("api/score/teamscores/{$team->id}") }}' class="btn btn-success"> Read</a>   &nbsp&nbsp
                            <a href='{{ url("api/team/list_by_id/{$team->id}") }}' class="btn btn-success"> Update</a>   &nbsp&nbsp



                            <form method="post" action="/api/team/delete/{{ $team->id }}">
                                <div class="form-group">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">


                                    <input name="id" class="form-control" type="hidden" value="{{ $team->id }}">
                                    <div class="form-group" style="margin-top: 15px">
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </div>
                            </form>

                        </td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
</div>

<div id="Player" class="tabcontent">
    <div>
         <a href='{{ url("player") }}' class="btn btn-primary"> Add Player</a>
    </div>
         <br>
 <table class="table table-striped table-hover">
            <thead>
            <tr>
                <th>ID</th>
                <th>Player Name</th>
                <th>Team Name</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
                
            @if(count($player) > 0)
                @foreach($player as $value)

                    <tr>
                        <th >{{ $value->id }}</th>
                        <td>{{ $value->player_name }}</td>
                        <td>{{ (isset($value->teams->team_name))?$value->teams->team_name:'no team' }}</td>

                        <td>
                           
                            <a href='{{ url("api/player/list_by_id/{$value->id}") }}' class="btn btn-success"> Update</a>
                            <form method="post" action="/api/player/delete/{{ $value->id }}">
                                <div class="form-group">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">


                                    <input name="id" class="form-control" type="hidden" value="{{ $value->id }}">
                                    <div class="form-group" style="margin-top: 15px">
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </div>
                            </form>
                        </td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
</div>

<div id="Match" class="tabcontent">
 <div> <a href='{{ url("tournament") }}' class="btn btn-primary"> Add Match</a>
            </div>
         <br>
<br>        <table class="table table-striped table-hover">
            <thead>
            <tr>
                <th>ID</th>
                <th>Match Name</th>
                <th>Action</th>
            </tr>
            </thead>
        
             <tbody>
            @if(count($tournament) > 0)
                @foreach($tournament as $value)
 
                    <tr>
                        <th >{{ $value->id }}</th>
                        <td>{{ $value->tournament_name }}</td>
                        <td>
                            <a href='{{ url("api/score/score_by_tournament/{$value->id}") }}' class="btn btn-primary"> Read</a>
                            <a href='{{ url("api/tournament/list_by_id/{$value->id}") }}' class="btn btn-success"> Update</a>
                            <a href='{{ url("api/score/tournament_id/{$value->id}") }}' class="btn btn-success"> Add Score</a>
                           
                            <form method="post" action="/api/tournament/delete/{{ $value->id }} ">

                                <div class="form-group">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
 
                                    <input name="id" class="form-control" type="hidden" value="{{ $value->id }}">
                                    <div class="form-group" style="margin-top: 15px">
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </div>
                            </form>
                        </td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
</div>

<script>
function openCity(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
</script>
   
</body>
</html>