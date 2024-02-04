
<div class="container py-3">
  <section class="carousel slide" id="diapo" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#diapo" data-bs-slide-to="0" class="active" aria-current="true"></button>
      <button type="button" data-bs-target="#diapo" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#diapo" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
            
    <div class="carousel-inner rounded">

      <?php foreach($data["diapositives"] as $key => $value) : ?>
        <div class="carousel-item <?= $key === 0 ? "active" : "" ?>">
          <img src="<?= $value ?>" alt="" class="d-block w-100">
        </div>
      <?php endforeach ?>                  

    </div>

    <button class="carousel-control-prev" type="button" data-bs-target="#diapo" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#diapo" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
  </section>


  <h1 class="display-2 py-3"><?= $data["h1"] ?></h1>


  <div class="row">

          <?php foreach($data["cards"] as $key => $value) : ?>
            <div class="col-3">
              <div class="card mb-3">
                <img src="<?= $value ?>" class="card-img-top " alt="...">
                <div class="card-body">
                  <h5 class="card-title">Lorem, ipsum.</h5>
                  <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Omnis perspiciatis ipsum, vel fugiat temporibus ipsa.</p>
                </div>
              </div>
            </div>
          <?php endforeach ?>
  </div>  
</div>