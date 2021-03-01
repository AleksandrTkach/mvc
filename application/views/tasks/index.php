<div class="coll w-100">
    <table class="table">
        <thead>
            <tr>
                <th> # </th>
                <th> Category </th>
                <th> Title </th>
                <th class="text-center"> Actions </th>
            </tr>
        </thead>
        <tbody>
            <?php if (count($tasks)):
                foreach ($tasks as $index => $task):
            ?>
                <tr>
                    <th><?php echo ++$index ?></th>
                    <td><?php echo $task['category'] ?></td>
                    <td><?php echo $task['title'] ?></td>
                    <td class="text-center">
                        <a class="btn py-0 px-1 btn-success" href="<?php echo'/tasks/update/'.$task['id'] ?>"> done </a>
                        <a class="btn py-0 px-1 btn-secondary" href="<?php echo'/tasks/'.$task['id'] ?>"> more </a>
                    </td>
                </tr>
            <?php endforeach;
                else:
            ?>
                <tr>
                    <td class="text-center" colspan="5"> List empty </td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>
