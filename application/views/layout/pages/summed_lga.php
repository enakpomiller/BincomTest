



<div class="container mt-4 mb-4">

    <h4> <?=$title?> </h4>

     <div class="row">
          <div class="col-md-4">
      <form action="<?=base_url('results/summed_lga')?>" method="POST">
              <div class="form-group">
                <select name="lga_name" class="form-control" value="<?=set_value('lga_name')?>">
                      <option> select </option>
                <?php foreach($all_lga as $lga ){?>
                  <option value="<?=$lga->lga_id?>"> <?=$lga->lga_name?> </option>
              <?php }?>
                  </select>
            </div>
         </div>
         <div class="col-md-6">
           <div class="form-group">
             <button type="submit" class="btn btn-primary"> search </button>
      </form>
         </div>
      </div>


</div>

    <?php if($_SESSION['msg_error']){ ?>
    <div class="alert alert-danger text-center w-100">  <?php    echo $_SESSION['msg_error']; ?> </div>
    <?php  }unset($_SESSION['msg_error']);  ?>

<?php if($total_score)  { ?>
<table  class="table table-striped">
    <thead>
        <tr>
            <th> S/N </th>
            <th>Polling  Unit Name</th>
            <th>Party</th>
            <th>Party Score</th>
        </tr>
    </thead>
    <tbody>

      <?php $counter =1; foreach($total_score as $row):?>
        <tr>
            <td> <?=$counter++?>  </td>
            <td><?=$row->polling_unit_name?></td>
            <td><?=$row->party_abbreviation?></td>
            <td> <?=$row->party_score?> </td>
        </tr>
      <?php endforeach ;?>


    </tbody>
</table>
<?php } ?>

</div>
