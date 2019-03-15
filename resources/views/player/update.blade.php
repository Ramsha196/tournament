

@include('inc.header');

<div class="container">
    <div class="row">
        <div class="col-md-6">
            <form class="form-horizontal" method="POST" action="{{ route('updatePlayer', $player->id) }}">
                <fieldset>
                    <legend>Update Player</legend>

                    {{ csrf_field() }}
                    <div class="form-group">

                        <input type="text" class="form-control"  placeholder="Team Name" name="player_name" value="<?php echo $player->player_name; ?>">
                        <br>
                        <select name="team_id" id="">
                            <option disabled  value>Choose Team</option>

                            @foreach($team as $teams)

                                <option value="{{ $teams->id }}" {{ ($player->team_id==$teams->id)?'selected':'' }}>{{ $teams->team_name }}</option>
                            @endforeach
                        </select>
                    </div>

                </fieldset>
                <a href="{{ url('update') }}"> <button type="submit" class="btn btn-primary">Update</button></a>
                <a href="{{ url('/api/cms') }}" class="btn btn-primary">Back</a>
                </fieldset>
            </form>
        </div>
    </div>
</div>

@include('inc.footer')