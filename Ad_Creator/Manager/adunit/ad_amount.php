<form method="post" >
<div class="col-lg-9">
<div class="card">
    <div class="card-header">
        <strong>Refill your ads here</strong>
    </div>
    <div class="card-body card-block">
        <div class="form-group">
            <label>Ad Unit Name</label>
            <input class="au-input au-input--full" type="text"  readonly name="unit_name" value="<?php echo $_GET['amount']; ?>" id="unit_name"  placeholder="Unit Name">
        </div>
        <div class="form-group">
            <label>Amount</label>
            <input class="au-input au-input--full" type="text" name="amount" value="<?php echo @$_POST['amount']?>"   placeholder="Enter your amount here">
        </div>
        <span class="error"><?php echo @$err;?></span>
    </div>
    <div class="card-footer">
        <div class="form-actions form-group">
            <button type="submit"  name="btnAdAmount" class="btn btn-success btn-sm">Add Amount</button>
        </div>
        </div>
    </div>
</div>
</div>
</form>

