<div class="col-12 mt-3 card">
    <div class="card-body">
        <table>
            <th class="col-3">
                Waktu
            </th>
            <th class="col-9">
                Kegiatan
            </th>

            <?php foreach ($log as $row) : ?>
                <tr>
                    <td> <?= date("d M Y, H:i", strtotime($row->datetime)); ?></td>
                    <td> <?= $row->log ?></td>
                </tr>
            <?php endforeach;  ?>
        </table>

    </div>
</div>