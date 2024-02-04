


<h1 class="text-center py-5 display-5 "><?= $data["h1"]  ?></h1>

<div class="container py-3">
  <div class="row g-4 justify-content-center"> <!-- g-4: gutter espacement entre les colonnes -->
    <div class="col-3">
      <div class="form-floating">
        <input type="text" class="form-control" id="floatingInputGrid" placeholder="login">
        <label for="floatingInputGrid">Login</label>
      </div>
    </div>
    <div class="col-3">
      <div class="form-floating">
      <input type="password" class="form-control" id="floatingInputGrid" placeholder="password">
        <label for="floatingInputGrid">Password</label>
      </div>
    </div>
  </div>

  <div class="row justify-content-center py-3">
    <input type="submit" value="connexion" class="bg-dark text-white rounded py-2 fs-4" style="width:150px">
  </div>


</div>

