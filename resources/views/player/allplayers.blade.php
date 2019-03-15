@include('inc.header')

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
        <div>
         <a href='{{ url("player") }}' class="btn btn-primary"> Add Player</a>
         </div>
        <br>
         <br>
        <table class="table table-striped table-hover">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
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
</div>
@include('inc.footer');