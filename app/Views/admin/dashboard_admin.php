<?= $this->include('layout/header') ?>

<form method="get" class="row mb-4">
  <div class="col-md-4">
    <label>Dari Tanggal</label>
    <input type="date" name="start" class="form-control" value="<?= esc($_GET['start'] ?? '') ?>">
  </div>
  <div class="col-md-4">
    <label>Sampai Tanggal</label>
    <input type="date" name="end" class="form-control" value="<?= esc($_GET['end'] ?? '') ?>">
  </div>
  <div class="col-md-4 d-flex align-items-end">
    <button type="submit" class="btn btn-primary">Filter</button>
  </div>
</form>


<?= $this->include('layout/footer') ?>
