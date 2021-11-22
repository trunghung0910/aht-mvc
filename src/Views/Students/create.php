<h1>Create student</h1>
<form method='post' action='#'>
    <div class="form-group">
        <label for="title">Name</label>
        <input type="text" class="form-control" id="name" placeholder="Enter a name" name="name">
    </div>

    <div class="form-group">
        <label for="description">Date of Birth</label>
        <input type="date" class="form-control" id="birthdate" placeholder="Enter a description" name="birthdate">
    </div>
    <div class="form-group">
        <label>Sex</label>
        <select class="form-control select2" style="width: 100%;" name="sex">
            <option value="1">Nam</option>
            <option value="2">Nữ</option>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>