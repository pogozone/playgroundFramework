<h1>Eine Pflanze pflegen und hegen.</h1>

<form action="/edit/<?php echo $plant['id']; ?>" method="POST">
    <input type="hidden" name="id" value="<?php echo $plant['id']; ?>">

    <div class="mb-3">
        <label for="form_name" class="form-label required">Name</label>
        <input type="text" id="form_name" name="name" required="required" class="form-control" value="<?php echo $plant['name']; ?>">
    </div>
    <div class="mb-3">
        <label for="form_description" class="form-label required">Description</label>
        <textarea id="form_description" name="description" class="form-control"><?php echo $plant['description']; ?></textarea>
    </div>
    <div class="mb-3">
        <label for="form_type" class="form-label required">Type</label>
        <select name="type" id="form_type" required="required">
            <option value="Baum"<?php if (isset($plant['type']) && $plant['type'] == 'Baum') echo " selected" ?>>Baum</option>
            <option value="Strauch"<?php if (isset($plant['type']) && $plant['type'] == 'Strauch') echo " selected" ?>>Strauch</option>
            <option value="Blume"<?php if (isset($plant['type']) && $plant['type'] == 'Blume') echo " selected" ?>>Blume</option>
        </select>
    </div>
    <div class="mb-3">
        <label for="form_month" class="form-label required">Month</label>
        <input type="text" id="form_month" name="name" required="required" class="form-control" value="<?php if (isset($plant['month'])) echo $plant['month']; ?>">
    </div>
    <div class="mb-3">
        <label for="form_year" class="form-label required">Year</label>
        <input type="text" id="form_year" name="year" required="required" class="form-control" value="<?php if (isset($plant['year'])) echo $plant['year']; ?>">
    </div>
    <div class="mb-3">
        <button type="submit" id="form_save" name="save" class="btn-primary btn">Submit</button>
    </div>
</form>

