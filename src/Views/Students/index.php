<h1>Students</h1>
<div class="row col-md-12 centered">
    <table class="table table-striped custab">
        <thead>
        <a href="<?= WEBROOT . "Students/create" ?>" class="btn btn-primary btn-xs pull-right"><b>+</b> Add new students</a>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Date of Birth</th>
            <th>Sex</th>
            <th class="text-center">Action</th>
        </tr>
        </thead>
        <?php

        foreach ($students as $key => $student):
            echo '<tr>';
            echo "<td>" . $student->id . "</td>";
            echo "<td>" . $student->name . "</td>";
            echo "<td>" . $student->birthdate . "</td>";
            if ($student->sex == 1) {
                echo "<td>" . "Nam" . "</td>";
            } else {
                echo "<td>" . "Nữ" . "</td>";
            }
            echo "<td class='text-center'>
                <a class='btn btn-info btn-xs' href=" . WEBROOT . "Students/edit/" . $student->id . " >
                <span class='glyphicon glyphicon-edit'></span> Edit</a> <a href=" . WEBROOT . "Students/delete/" . $student->id . " class='btn btn-danger btn-xs'><span class='glyphicon glyphicon-remove'></span> Del</a>
                </td>";
            echo "</tr>";
        endforeach;
        ?>
    </table>
</div>
