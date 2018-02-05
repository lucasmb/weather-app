
<div class="container-fluid">
      <div class="row">
        <div class="col-md-6">
		<div class="row mt-3">
		<div class="table_fw col-md-6 ">
		    <table class="table table-hover">
		      <thead>
		        <tr>
		          <th scope="col">#</th>
		          <th scope="col">date</th>
		          <th scope="col">weather</th>
		          <th scope="col">temp</th>
		          <th scope="col">humidity</th>
		          <th scope="col">pressure</th>
		        </tr>
		      </thead>
		      <tbody>		   
        	<? foreach($w_data->list as $row) :?>
				<tr class="" >
				  <td> - </td>
				  <td><?=date('Y-m-d H:i:s', $row->dt)?></td>
				  <td><?=current($row->weather)->main?></td>
				  <td><?=$row->main->temp?> C &deg;</td>
				  <td><?=$row->main->humidity?> %</td>
				  <td><?=$row->main->pressure?> hPa</td>
				</td>
				</tr>
			<? endforeach ;?>
		  </tbody>
		   </table> 
        </div>
      </div>
</div>