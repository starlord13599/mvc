<?php
$billing = $this->getBillingAddress();
$billingStatus = ($billing->addressId) ? "Old" : "New";
$shipping = $this->getShippingAddress();
$shippingStatus = ($shipping->addressId) ? "Old" : "New";

?>
<form class="row g-3" method="POST" action="<?php echo $this->getUrl()->getUrl('add', 'Admin\Customer\Address'); ?> ">

    <h2 class="display-6">Billing Address</h2>

    <?php if ($billing->addressId) : ?>
        <input type="hidden" name="address[<?= $billingStatus ?>][billing][addressId]" value="<?= $billing->addressId  ?>">
    <?php endif; ?>

    <div class=" col-12">
        <label for="address" class="form-label">Address</label>
        <input type="text" name="address[<?= $billingStatus ?>][billing][address]" value="<?= $billing->address  ?>" class="form-control">
    </div>

    <div class="col-md-6">
        <label for="city" class="form-label">City</label>
        <input type="text" name="address[<?= $billingStatus ?>][billing][city]" value="<?= $billing->city  ?>" class="form-control">
    </div>
    <div class="col-md-4">
        <label for="state" class="form-label">State</label>
        <input type="text" name="address[<?= $billingStatus ?>][billing][state]" value="<?= $billing->state  ?>" class="form-control">
    </div>
    <div class="col-md-2">
        <label for="zip" class="form-label">Zip</label>
        <input type="text" name="address[<?= $billingStatus ?>][billing][zip]" value="<?= $billing->zip  ?>" class="form-control" id="zip">
    </div>
    <div class="col-12">
        <label for="country" class="form-label">Country</label>
        <input type="text" name="address[<?= $billingStatus ?>][billing][country]" value="<?= $billing->country  ?>" class="form-control">
    </div>


    <h2 class="display-6">Shipping Address</h2>

    <?php if ($shipping->addressId) : ?>
        <input type="hidden" name="address[<?= $shippingStatus ?>][shipping][addressId]" value="<?= $shipping->addressId  ?>">
    <?php endif; ?>

    <div class="col-12">
        <label for="address" class="form-label">Address</label>
        <input type="text" name="address[<?= $shippingStatus ?>][shipping][address]" value="<?= $shipping->address  ?>" class="form-control">
    </div>

    <div class="col-md-6">
        <label for="city" class="form-label">City</label>
        <input type="text" name="address[<?= $shippingStatus ?>][shipping][city]" value="<?= $shipping->city ?>" class="form-control">
    </div>
    <div class="col-md-4">
        <label for="state" class="form-label">State</label>
        <input type="text" name="address[<?= $shippingStatus ?>][shipping][state]" value="<?= $shipping->state  ?>" class="form-control">
    </div>
    <div class="col-md-2">
        <label for="zip" class="form-label">Zip</label>
        <input type="text" name="address[<?= $shippingStatus ?>][shipping][zip]" value="<?= $shipping->zip  ?>" class="form-control" id="zip">
    </div>
    <div class="col-12">
        <label for="country" class="form-label">Country</label>
        <input type="text" name="address[<?= $shippingStatus ?>][shipping][country]" value="<?= $shipping->country  ?>" class="form-control">
    </div>


    <div class="col-6">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>

</form>