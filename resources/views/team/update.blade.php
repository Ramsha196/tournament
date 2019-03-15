

@include('inc.header');

<div class="container">
    <div class="row">
        <div class="col-md-6">
            <form class="form-horizontal" method="POST" action="{{ route('updateTeam', $team->id) }}">
                <fieldset>
                    <legend>Update Team</legend>

                    {{ csrf_field() }}
                    <div class="form-group">

                        <input type="text" class="form-control"  placeholder="Team Name" name="team_name" value="<?php echo $team->team_name; ?>">
                    </div>

                </fieldset>
                <a href="{{ url('api/team/update') }}"> <button type="submit" class="btn btn-primary">Update</button></a>
                <a href="{{ url('/api/cms') }}" class="btn btn-primary">Back</a>
                </fieldset>
            </form>
        </div>
    </div>
</div>

@include('inc.footer')