<form method="post" action="https://book.webrez.com/v31/#/property/2100/location/0/redirect"
      class="d-lg-flex justify-content-lg-between align-items-lg-end mx-auto" id="checkInForm">
  <div class="datePickW">
    <label class="text-uppercase" for="checkInAndOut">Check in - check out</label>
    <input type="text" class="form-control" id="checkInAndOut" placeholder="Please choose…" value="" required>
  </div>

  <div class="selectW">
    <label class="text-uppercase" for="numberOfAdults">Adults</label>
    <select class="custom-select" name="adults" id="numberOfAdults">
      <option value="1" selected>1</option>
      <option value="2">2</option>
      <option value="3">3</option>
      <option value="4">4</option>
      <option value="5">5</option>
      <option value="6">6</option>
    </select>
  </div>
  <div class="selectW">
    <label class="text-uppercase" for="numberOfChildren">Children</label>
    <select class="custom-select" name="children" id="numberOfChildren">
      <option value="0" selected>0</option>
      <option value="1">1</option>
      <option value="2">2</option>
    </select>
  </div>
  <div>
    <button class="btn btn-primary text-uppercase mb-0 b-block w-100" type="submit">Check rates</button>
  </div>
</form>