<h1>Edit student</h1>
<form method='post' action='#'>
    <div class="form-group">
        <label for="title">Name</label>
        <input type="text" class="form-control" id="name" placeholder="Enter a title" name="name"
               value="<?php if (isset($student["name"])) {
                   echo $student["name"];
               } ?>">
    </div>

    <div class="form-group">
        <label for="description">Date of Birth</label>
        <input type="date" class="form-control" id="birthdate" placeholder="Enter a description" name="birthdate"
               value="<?php if (isset($student["birthdate"])) {
                   echo $student["birthdate"];
               } ?>">
    </div>
    <div class="form-group">
        <label>Sex</label>
        <select class="form-control select2" style="width: 100%;" name="sex">
            <option <?= $student["sex"] == 1 ? "selected" : "" ?> value="1">Nam</option>
            <option <?= $student["sex"] == 2 ? "selected" : "" ?> value="2">Nữ</option>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>