<div class="modal" id="myModal">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
      
        <div class="modal-header">
          <h4 class="modal-title">Search Result</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <div class="modal-body">
        	<table class="table">
	            <thead class="thead-dark">
	              <th> username </th>
	              <th> location </th>
	              <th> skills </th>
	              <th> user_link </th>
	            </thead>
	            <?php foreach ( $results as $result ) : ?>
		        <tbody>
		          	<tr>
		          	  <td><?php echo $result['username']; ?></td>
					  <td><?php echo $result['location']; ?></td>
					  <td><?php echo $result['skills']; ?></td>
					  <td><?php echo $result['user_link']; ?></td>
					</tr>
				</tbody>
				<?php endforeach; ?>
			</table>
        </div>
      </div>
    </div>
  </div>