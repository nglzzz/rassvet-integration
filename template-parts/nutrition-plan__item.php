<div class="nutrition-plan__item">
    <div>
        <label><b><?php echo $item['eatingName'] ?></b></label>
        <time><?php echo $item['eatingTime'] ?></time>
    </div>
    <table>
        <thead>
            <tr>
                <th>Продукт/блюдо</th>
                <th>Кол-во</th>
                <th>Вес</th>
                <th>Ккал</th>
                <th>БЖУ</th>
                <th>Рецепт</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($item['foods'] as $food) : ?>
                <tr>
                    <td><?php echo $food['title'] ?></td>
                    <td><?php echo $food['unit'] ?></td>
                    <td> <?php echo $food['mass'] ?> <?php echo $food['unit'] ?></td>
                    <td><?php echo $food['energy'] ?></td>
                    <td><?php echo $food['protein'] . '/' . $food['fat'] . '/' . $food['carbohydrate'] ?></td>
                    <td><?php echo $food['type'] ?></td>
                </tr>
            <?php endforeach; ?>
    </table>
    </tbody>
</div>