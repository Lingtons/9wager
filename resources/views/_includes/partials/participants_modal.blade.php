<div id="view" class="modal fade" role="dialog">
	<div class="modal-dialog">
						<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Bet Participants</h4>
			</div>
			<div class="modal-body">
			          @if (count($bet->bet_users))
          <table class="table table-bordered table-striped">
            <tr>
              <th>Sn</th>
              <th>Participants</th>
              <th>Sides</th>
            </tr>
            @foreach($bet->bet_users as $key=>$user)
            <tr>
              <td>{{$key+1}}</td>
              <td>{{$user->name}}</td>
              <td>{{$user->pivot->my_option}}</td>
            </tr>
            @endforeach
          </table>              
          @endif
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>