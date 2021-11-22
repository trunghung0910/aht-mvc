<h1>Tasks</h1>
<div class="row col-md-12 centered">
    <table class="table table-striped custab">
        <thead>
        <a href="<?= WEBROOT . "Tasks/create" ?>" class="btn btn-primary btn-xs pull-right"><b>+</b> Add new task</a>
        <tr>
            <th>ID</th>
            <th>Task</th>
            <th>Description</th>
            <th class="text-center">Action</th>
        </tr>
        </thead>
        <?php

        foreach ($tasks as $key => $task):
            echo '<tr>';
            echo "<td>" . $task->id . "</td>";
            echo "<td>" . $task->title . "</td>";
            echo "<td>" . $task->description . "</td>";
            echo "<td class='text-center'>
                <a class='btn btn-info btn-xs' href=" . WEBROOT . "Tasks/edit/" . $task->id . " >
                <span class='glyphicon glyphicon-edit'></span> Edit</a> <a href=" . WEBROOT . "Tasks/delete/" . $task->id . " class='btn btn-danger btn-xs'><span class='glyphicon glyphicon-remove'></span> Del</a>
                </td>";
            echo "</tr>";
        endforeach;
        ?>
    </table>
</div>
