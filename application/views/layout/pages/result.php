



<body>
  <div class="container mt-4">
    <table id="myTable" class="display">
        <thead>
            <tr>
                <th> S/N </th>
                <th>Polling  Unit Name</th>
                <th>Polling  Unit Number</th>
                <th>Party</th>
                <th>Party Score</th>
            </tr>
        </thead>
        <tbody>
          <?php $counter =1; foreach($results as $row):?>
            <tr>
                <td> <?=$counter++?>  </td>
                <td><?=$row->polling_unit_name?></td>
                <td><?=$row->polling_unit_number?></td>
                <td><?=$row->party_abbreviation?></td>
                <td> <?=$row->party_score?> </td>
            </tr>
          <?php endforeach ;?>

        </tbody>
    </table>

  </div>
