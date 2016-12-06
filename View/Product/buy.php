<h3>Buy <?php echo $data['buy']['title'] ?></h3>
<h4>For price <?php echo $data['buy']['price'] ?> $</h4>
<img src="<?php echo $data['buy']['image'] ?>" alt="<?php echo $data['buy']['image'] ?>" class="img-thumbnail"
     width="150">

<h3>Buy and delivery details</h3>

<form class="form-group" method="post">
    <label for="exampleInputName">Name</label>
    <input name="name" type="text" class="form-control" id="exampleInputName" placeholder="Name" required>

    <label for="exampleInputLastName">Last Name</label>
    <input name="lastName" type="text" class="form-control" id="exampleInputLastName" placeholder="Last Name" required>

    <label for="exampleInputEmail">Email</label>
    <input name="email" type="email" class="form-control" id="exampleInputEmail" placeholder="Email required">

    <h3>Delivery address</h3>

    <label for="exampleInputCity">City</label>
    <input name="city" type="text" class="form-control" id="exampleInputCity" placeholder="City" required>

    <label for="exampleInputAddress">Address</label>
    <input name="address" type="text" class="form-control" id="exampleInputAddress" placeholder="Address" required>

    <label for="exampleInputPhoneNumber">Phone Number</label>
    <input name="phoneNumber" type="text" class="form-control" id="exampleInputPhoneNumber" placeholder="Phone Number" required>

    <h4>Choose Pay method</h4>

    <select name="payMethod" class="form-control">
        <option value="Visa">Visa</option>
        <option value="MaterCard">Master Card</option>
        <option value="Cash">Cash</option>
    </select>

    <input name="price" type="hidden" value="<?php echo $data['buy']['price']?>">
    <input name="productId" type="hidden" value="<?php echo $data['buy']['id']?>">

    <input name="action" type="hidden" value="makeOrder">
    <button type="submit" class="btn btn-default">Order</button>
</form>