

<div class="container mt-4 mb-4">


  <div class="row">

      <div class="col-md-4">
        <?php if($_SESSION['create']){ ?>
        <div class="alert alert-danger text-center w-100">  <?php    echo $_SESSION['create']; ?> </div>
      <?php  }unset($_SESSION['create']);  ?>
         <?php if($_SESSION['created']){ ?>
          <div class="alert alert-success text-center w-100">  <?php    echo $_SESSION['created']; ?> </div>
        <?php  }unset($_SESSION['created']);  ?>
        <h4> <?=$title?> </h4>
     <form action="<?=base_url('results/create_poll_unit')?>" method="post">
        <div class="mb-3">

          <label for="exampleFormControlInput1" class="form-label"> Party </label>
          <input type="text" name="party" class="form-control"  placeholder="name@example.com">
           <div class="text-danger">   <?=form_error('party')?></div>
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label"> Polling Unit s</label>
            <input type="text" name="polling_unit" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
            <div class="text-danger">   <?=form_error('polling_unit')?></div>
          </div>
          <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label"> Score </label>
            <input type="text" name="score" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
            <div class="text-danger">   <?=form_error('score')?></div>
          </div>

          <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label">LGA</label>
              <input type="text" name="lga" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
              <div class="text-danger">   <?=form_error('lga')?></div>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Ward</label>
                <input type="text" name="ward" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                <div class="text-danger">   <?=form_error('ward')?></div>
              </div>
          <button   class="form-control" style="background:#3c8dbc;color:white;" > Create </button>
      </div>

</form>

    </div>

</div>
