<div class="venueForm">
    <?php echo form_open('memberController/add'); ?>
    <div class="form-group">
        <label>firstName:</label>
        <input type="text" name="fName" id="fName" class="form-control" placeholder="Enter firstName">
    </div>
    <div class="form-group">
        <label>lastname:</label>
        <input type="text" name="lName" id="lName" class="form-control" placeholder="Enter lastName">
    </div>

    <div class="form-group">
        <label for="name">EmailAddress:</label>
        <input type="text" name="emailAddress" id="emailAddress" class="form-control" placeholder="Enter emailAddress">
    </div>
    <div class="form-group">
        <label>telephoneNo:</label>
        <input type="text" name="telephoneNo" id="telephoneNo" class="form-control" placeholder="Enter telephoneNo">
    </div>
    <div class="form-group">
        <label>password:</label>
        <input type="text" name="password" id="password" class="form-control" placeholder="Enter password">
    </div>
    <div class="form-group">
        <label>knumber: (must be numerical)</label>
        <input type="text" name="kNumber" id="kNumber" class="form-control" placeholder="Enter k-Number">
    </div>
    
    <div class="form-group">
        <input type="submit" name="button" value="register" class="btn">
    </div>
    <?php echo form_close(); ?>
</div>