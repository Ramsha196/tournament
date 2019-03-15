@include('inc.header')

<div class="container">
    <div class="row">

        <legend>Teams in the Match</legend>
        <div class="row">
            
        </div>
        <table class="table table-striped table-hover">
            <thead>
            <tr>
                <th>ID</th>
                <th>Tournament Name</th>
                <th>Teams</th>

            </tr>
            </thead>
        
             <tbody>
            @if(count($team) > 0)
                @foreach($team as $value)
                    <tr>
                        <th >{{ $value->id }}</th>
                        <td>{{ $value->tournament_name }}</td>
                        <td>{{ $value->team_name }}</td>
                        
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
    </div>
</div>
@include('inc.footer');