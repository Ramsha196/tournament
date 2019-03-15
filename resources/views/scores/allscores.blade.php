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
  <a href="{{ url('api/cms')}} "><button class="tablinks" onclick="openCity(event, 'Team')">Team</button></a>
  <a href="{{ url('api/cms')}} "><button class="tablinks" onclick="openCity(event, 'Player')">Player</button></a>
  <a href="{{ url('api/cms')}} "><button class="tablinks" onclick="openCity(event, 'Match')">Match</button></a>
</div>

<div class="container">
    <div class="row">

        <legend>All Players</legend>
        <div class="row">
            <div class="col-md-6 col-lg-6">
                @if(session('info'))
                    <div class="col-mg-6 alert alert-success">
                        {{ session('info') }}
                    </div>
                @endif
            </div>
        </div>
        <table class="table table-striped table-hover">
            <thead>
            <tr>
                <th>ID</th>
                <th>Match Name</th>    
                <th>Player Name</th>
                <th>Team Name</th>
                <th>No of Scores</th>
                
            </tr>
            </thead>
        
             <tbody>
            @if(count($score) > 0)
                @foreach($score as $value)
 
                    <tr>
                        <th >{{ $value->id }}</th>
                        <td>{{ $value->tournaments->tournament_name }}</td>
                        <td>{{ $value->player->player_name }}</td>
                       <td>{{ $value->player->teams->team_name }}</td>
                        <td>{{ $value->no_of_scores }}</td>
                        
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
    </div>
</div>

</body>
</html>

