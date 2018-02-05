<? foreach($table_data as $row) :?>
	<tr class="" data-id=<?=$row['id']?>>
	  <td><?=$row['id']?></td>
	  <td><?=$row['city_name']?></td>
	  <td><?=$row['time']?></td>
	  <td><button type="button" data-lat=<?=$row['lat']?> data-lng=<?=$row['lng']?> class="get_w btn btn-primary">Get Weather</button></td>
	  <td><button type="button" data-id=<?=$row['id']?> class="remove_row btn btn-danger ">X</button></td>
	</td>
	</tr>
<? endforeach ;?>