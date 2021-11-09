<form method="post" action="<?php echo base_url('voucher/uploadCsv') ?>" enctype="multipart/form-data" style="float: left;width: 75%;margin: 18px;background-color: #FFF;padding: 32px;">
    <div class="form-group row">
        <label for="from" class="col-sm-2 col-form-label small_second">Upload CSV</label>
        <div class="col-md-8 col-sm-10">
            <input type="file" class="form-control" name="file" style="padding: 1px;">
        </div>
    </div>
    <button type="submit" class="btn_save" style="background-color: #ff7f27;color: #fff;padding: 10px 8px;font-size: 15px;border: 1px solid #ff7f27;border-radius: 3px;width: 17%;font-weight: 500;line-height: 1;">
        <i class="fa fa-cloud-download" aria-hidden="true"></i> Upload CSV
    </button>
</form>